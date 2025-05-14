<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Services\ZeptoMailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class WebsiteContactController extends Controller
{
    //
    public function index()
    {
        return view('backend.contact.index'); // Ensure you have a corresponding Blade file
    }

    public function getContacts(Request $request)
    {
        $columns = ['id', 'name', 'email', 'message', 'created_at']; // Column index map

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $search = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column', 0);
        $orderDir = $request->input('order.0.dir', 'asc');
        $orderBy = $columns[$orderColumnIndex] ?? 'id';

        $query = DB::table('website_contact')
            ->select('id', 'name', 'email', 'message', 'created_at');

        // Apply search filter
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('message', 'like', "%{$search}%");
            });
        }

        // Get total records before filtering
        $totalRecords = DB::table('website_contact')->count();

        // Get filtered records count
        $filteredRecords = $query->count();

        // Apply ordering, pagination 
        $contacts = $query->orderBy($orderBy, $orderDir)
            ->offset($start)
            ->limit($length)
            ->get();

        // Format data for DataTables 
        $data = [];
        foreach ($contacts as $contact) {
            $data[] = [
                'id' => $contact->id,
                'name' => e($contact->name),
                'email' => e($contact->email),
                'message' => nl2br(e($contact->message)), // Preserve line breaks
                'created_at' => $contact->created_at ? date('Y-m-d H:i:s', strtotime($contact->created_at)) : '',
            ];
        }

        return response()->json([
            'data' => $data,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords, // Correctly count filtered results
        ]);
    }

    /// frontend form store 
    // public function store(Request $request)
    // {
    //     // Validation 
    //     $request->validate([
    //         'name' => 'required|min:3',
    //         'email' => 'required|email',
    //         'message' => 'required|min:5',
    //     ]);

    //     // Save to database
    //     $contactId = DB::table('website_contact')->insertGetId([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'message' => $request->message,
    //         'created_at' => now(),
    //         'updated_at' => now()
    //     ]);


    //     // Send Email to Admin
    //     Mail::to('adarsh.byline@gmail.com')->send(new ContactMail($request->all()));

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Your message has been sent successfully!'
    //     ]);
    // } 

    public function store(Request $request)
    {
        // 1. Verify reCAPTCHA token with Google
        $recaptchaToken = $request->input('g-recaptcha-response');
        $secret = env('RECAPTCHA_SECRET_KEY');

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secret,
            'response' => $recaptchaToken,
            'remoteip' => $request->ip()
        ]);

        $result = $response->json();
        if (!$result['success'] || $result['score'] < 0.5) {
            return response()->json([
                'success' => false,
                'message' => 'reCAPTCHA verification failed.',
            ], 422);
        }

        // 1. Validate Request Data
        $validated = $request->validate([
            'name'    => 'required|string|min:3|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'message' => 'required|string|min:3',
        ]);

        // 2. Save to Database
        DB::table('website_contact')->insert([
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'phone'      => $validated['phone'] ?? null,
            'message'    => $validated['message'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // php artisan tinker 
        //    Mail::raw('Testing Office365', function($msg) { $msg->to('adarsh.byline@gmail.com')->subject('Test Mail'); });

        // 3. Prepare Email Data 
        $contactData = [
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'phone'   => $validated['phone'] ?? 'N/A',
            'message' => $validated['message'],
            'subject' => 'New Contact Form Submission from ' . $validated['name'],
        ];

        try {
            $contactConfig = config('mailconfig.contact_us'); // Fetch from your config file

            $to = $contactConfig['to'] ?? null;
            $cc = $contactConfig['cc'] ?? []; 
            $bcc = $contactConfig['bcc'] ?? [];
            $subject = $contactConfig['subject'] ?? 'New Contact Message';
            $htmlBody = view('emails.contact', ['data' => $contactData])->render(); // Blade view for email body

            $response = ZeptoMailService::sendMail($to, $cc, $bcc, $subject, $htmlBody);

            if (isset($response['request_id'])) {
                return response()->json([
                    'success' => true,
                    'message' => 'Your message has been sent successfully!',
                ]);
            } else {
                Log::error('Contact email failed to send.', [
                    'error' => $response,
                    'data' => $contactData,
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Message saved, but failed to send email.',
                ], 500);
            }
        } catch (\Exception $e) {
            Log::error('Exception while sending contact email.', [
                'error' => $e->getMessage(),
                'data' => $contactData,
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Message saved, but failed to send email.',
            ], 500);
        } 
    }
 
    // // 4. Send Email with Error Handling
    // try {
    //     Mail::to('contact.byline@bylinelearning.com')
    //         ->cc([
    //             'bhanwar@bylinelearning.com',
    //             'ankur@bylinelearning.com',
    //         ])->bcc('adarsh.byline@gmail.com') // BCC recipient (hidden from others)
    //         ->send(new ContactMail($contactData));
    // } catch (\Exception $e) {
    //     Log::error('Contact email failed to send.', [
    //         'error' => $e->getMessage(),
    //         'data' => $contactData,
    //     ]);

    //     return response()->json([
    //         'success' => false,
    //         'message' => 'Message saved, but failed to send email.',
    //     ], 500);
    // }

    // return response()->json([
    //     'success' => true,
    //     'message' => 'Your message has been sent successfully!'
    // ]); 
}
