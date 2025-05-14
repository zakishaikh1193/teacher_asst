<?php

namespace App\Http\Controllers;

use App\Exports\RegistrationExport;
use App\Mail\RegistrationNotification;
use App\Services\ZeptoMailService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('backend.registrations.index');
    }

    public function getData(Request $request)
    {
        $columns = [
            0 => 'full_name',
            1 => 'school_name',
            2 => 'designation',
            3 => 'preferred_month',
            4 => 'estimated_participants',
            5 => 'created_at'
        ];

        $totalData = DB::table('registrations')->count();
        $totalFiltered = $totalData;

        $limit  = $request->input('length');
        $start  = $request->input('start');
        $orderColumnIndex = $request->input('order.0.column');
        $order = $columns[$orderColumnIndex] ?? 'created_at'; // fallback to created_at
        $dir    = $request->input('order.0.dir', 'asc');

        $query = DB::table('registrations');

        // Filtering
        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('school_name', 'like', "%{$search}%")
                    ->orWhere('designation', 'like', "%{$search}%")
                    ->orWhere('preferred_month', 'like', "%{$search}%");
            });

            $totalFiltered = $query->count();
        }

        // Sorting & Pagination
        $data = $query
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();

        $json_data = [
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => [],
        ];

        foreach ($data as $row) {
            // $json_data['data'][] = [
            //     $row->full_name,
            //     $row->school_name,
            //     '<span class="badge bg-primary">' . e($row->designation) . '</span>',
            //     $row->preferred_month,
            //     $row->estimated_participants,
            //     \Carbon\Carbon::parse($row->created_at)->format('Y-m-d H:i'),
            //     '<a href="#" class="btn btn-sm btn-outline-secondary">View</a>'
            // ];

            $createdIST = Carbon::parse($row->created_at)->setTimezone('Asia/Kolkata')->format('Y-m-d H:i:s');

            $json_data['data'][] = [
                $row->full_name,
                $row->school_name,
                '<span class="badge bg-primary">' . e($row->designation) . '</span>',
                $row->preferred_month,
                $row->estimated_participants,
                $createdIST,
                '<a href="#" class="btn btn-sm btn-outline-secondary view-btn" 
                data-id="' . $row->id . '" 
                data-name="' . e($row->full_name) . '"
                data-school="' . e($row->school_name) . '"
                data-designation="' . e($row->designation) . '"
                data-email="' . e($row->email) . '"
                data-phone="' . e($row->mobile_number) . '"
                data-month="' . e($row->preferred_month) . '"
                data-count="' . e($row->estimated_participants) . '"
                data-notes="' . e($row->additional_notes) . '"
                data-created="' . $createdIST . '"
                data-bs-toggle="modal" 
                data-bs-target="#viewModal">View</a>'
            ];
        }

        return response()->json($json_data);
    }

    public function exportFullData($type)
    {
        $data = DB::table('registrations')->get();

        if ($type === 'csv') {
            return Excel::download(new RegistrationExport($data), 'registrations_full.csv', \Maatwebsite\Excel\Excel::CSV);
        }

        if ($type === 'excel') {
            return Excel::download(new RegistrationExport($data), 'registrations_full.xlsx');
        }

        abort(404);
    }

    // submitRegistration 
    // public function submitRegistration(Request $request)
    // {
    //     $request->validate([
    //         'full_name' => 'required|string|max:255',
    //         'school_name' => 'required|string|max:255',
    //         'designation' => 'required|string|max:255',
    //         'email' => 'required|email|unique:registrations,email',
    //         'mobile_number' => 'required|string|max:255',
    //         'preferred_month' => 'required|string|max:255',
    //         'estimated_participants' => 'required|integer',
    //         'additional_notes' => 'nullable|string',
    //     ]);

    //     try {
    //         // Insert into database
    //         $id = DB::table('registrations')->insertGetId([
    //             'full_name' => $request->full_name,
    //             'school_name' => $request->school_name,
    //             'designation' => $request->designation,
    //             'email' => $request->email,
    //             'mobile_number' => $request->mobile_number,
    //             'preferred_month' => $request->preferred_month,
    //             'estimated_participants' => $request->estimated_participants,
    //             'additional_notes' => $request->additional_notes,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);

    //         // Send email  
    //         Mail::to('adarsh.byline@gmail.com')
    //             // ->cc([
    //             //     'bhanwar@bylinelearning.com', 
    //             //     'ankur@bylinelearning.com',
    //             // ])
    //             // ->bcc('adarsh.byline@gmail.com')
    //             ->send(new RegistrationNotification($request->all()));

    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'Thank you! Your interest has been submitted successfully.',
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'Something went wrong. Please try again later.',
    //         ], 500);
    //     }
    // }

    public function submitRegistration(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'school_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'email' => 'required|email|unique:registrations,email',
            'mobile_number' => 'nullable|string|max:20',
            'preferred_month' => 'required|string|max:20',
            'estimated_participants' => 'required|integer|min:1',
            'additional_notes' => 'nullable|string|max:1000',
        ]);

        try {
            $id = DB::table('registrations')->insertGetId([
                'full_name' => $validated['full_name'],
                'school_name' => $validated['school_name'],
                'designation' => $validated['designation'],
                'email' => $validated['email'],
                'mobile_number' => $validated['mobile_number'] ?? null,
                'preferred_month' => $validated['preferred_month'],
                'estimated_participants' => $validated['estimated_participants'],
                'additional_notes' => $validated['additional_notes'] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $registerConfig = config('mailconfig.registration');
            // $mail = Mail::to($registerConfig['to']);
            // if (!empty($registerConfig['cc'])) {
            //     $mail->cc($registerConfig['cc']);
            // }
            // if (!empty($registerConfig['bcc'])) {
            //     $mail->bcc($registerConfig['bcc']);
            // }
            // $mail->send(new RegistrationNotification($validated));

            try {
                $response = ZeptoMailService::sendMail(
                    $registerConfig['to'],
                    $registerConfig['cc'] ?? [],
                    $registerConfig['bcc'] ?? [],
                    $registerConfig['subject'] ?? 'Registration Notification',
                    view('emails.registration', ['details' => $validated])->render()
                );

                if (isset($response['request_id'])) {
                    Log::info('Registration email sent successfully to ' . json_encode($registerConfig['to']));
                } else {
                    Log::error('Failed to send registration email', [
                        'response' => $response,
                        'to' => $registerConfig['to'],
                        'cc' => $registerConfig['cc'] ?? [],
                        'bcc' => $registerConfig['bcc'] ?? [],
                        'data' => $validated
                    ]);
                }
            } catch (\Exception $e) {
                Log::error('Exception while sending registration email: ' . $e->getMessage(), [
                    'to' => $registerConfig['to'],
                    'cc' => $registerConfig['cc'] ?? [],
                    'bcc' => $registerConfig['bcc'] ?? [],
                    'data' => $validated
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Thank you! Your interest has been submitted successfully.',
            ]);
        } catch (\Exception $e) {
            Log::error('Registration failed: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);

            // return response()->json([ 
            //     'status' => 'error',
            //     'message' => 'Something went wrong. Please try again later.',
            // ], 500);
        }
    }

    // public function sendTestEmail()
    // {
    //     $toEmail = 'adarsh.byline@gmail.com';
    //     $toName = 'Receiver Name';
    //     $subject = 'Test Email';
    //     $htmlBody = '<div><b>Hello! This is a test email sent using ZeptoMail API in Laravel 12.</b></div>';

    //     $response = ZeptoMailService::sendMail($toEmail, $toName, $subject, $htmlBody);

    //     if (isset($response['request_id'])) {
    //         return 'Email sent successfully!';
    //     } else {
    //         return 'Failed to send email. Error: ' . json_encode($response);
    //     }
    // }
}
