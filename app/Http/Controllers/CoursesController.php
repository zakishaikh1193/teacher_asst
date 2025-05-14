<?php

namespace App\Http\Controllers;

use App\Exports\EnrollsExport;
use App\Services\ZeptoMailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class CoursesController extends Controller
{
    public function index()
    {
        $base_url_API = config('openapi.base_url_API');
        $base_url = config('openapi.base_url');
        // $response =  Http::withoutVerifying()
        //     ->get($base_url_API . 'categories/6');
        $slug = 'assessment-strategies';
        $response = Http::withoutVerifying()->get($base_url_API . 'categories/slug/' . $slug);

        $data = $response->json(); // convert to array    

        return view('courses/index', ['data' => $data['data'], 'baseUrl' => $base_url]);
    }

    public function show($slug)
    {
        $base_url = config('openapi.base_url');
        $base_url_API = config('openapi.base_url_API');
        $response = Http::withoutVerifying()->get($base_url_API . 'categories/slug/' . $slug);
        $data = $response->json();
        $courses = null;
        if ($data['success'] == 1) {
            $response = Http::withoutVerifying()->get($base_url_API . 'courses/by-category/' . $data['data']['id']);
            $courses = $response->json();
        }
        // echo "<pre>";
        // echo "test"; 
        // print_r($data);
        // print_r($courses);
        // die; 
        // Check if data found 
        if (empty($data)) {
            abort(404); // show 404 if course not found
        }

        return view('courses.courses-listing')->with(['data' => $data, 'courses' => $courses, 'baseUrl' => $base_url]);
    }

    public function courseDetail($slug)
    {
        $base_url = config('openapi.base_url');
        $base_url_API = config('openapi.base_url_API');
        $response = Http::withoutVerifying()->get($base_url_API . 'course/slug/' . $slug);

        $data = $response->json(); // convert to array     

        // echo "<pre>";
        // print_r($data);
        // die; 

        return view('courses/course-detail', $data);
    }

    // public function enroll(Request $request, $slug)
    // {
    //     // 1. validate all fields
    //     $data = $request->validate([
    //         'full_name'    => 'required|string|max:255',
    //         'school_name'  => 'required|string|max:255',
    //         'designation'  => 'required|string|max:255',
    //         'email'        => 'required|email|max:255',
    //         'phone'        => 'required|string|max:20',
    //         'category_id'  => 'required|integer',
    //         // 'slug'         => 'required|string', 
    //         'course_title' => 'required|string|max:255',
    //     ]);

    //     // 2. Fetch category via API 
    //     $base_url_API = config('openapi.base_url_API');
    //     $response = Http::withoutVerifying()->get($base_url_API . 'categories/' . $data['category_id']);

    //     if (! $response->successful()) {
    //         return response()->json([
    //             'message' => 'Error fetching category details.'
    //         ], 500); 
    //     }

    //     // assume API returns { data: { id: ..., name: "...", ... } }
    //     $categoryPayload = $response->json('data') ?? $response->json();
    //     $categoryName    = $categoryPayload['title'] ?? 'Unknown';

    //     // 3. Insert into enrolls table via query builder
    //     DB::table('enrolls')->insert([
    //         'full_name'    => $data['full_name'],
    //         'school_name'  => $data['school_name'],
    //         'designation'  => $data['designation'],
    //         'email'        => $data['email'],
    //         'phone'        => $data['phone'],
    //         'slug'         => $slug ?? '',
    //         'category'     => $categoryName,
    //         'course_title' => $data['course_title'],
    //         'created_at'   => now(),
    //         'updated_at'   => now(),
    //     ]);



    //     return response()->json([
    //         'message' => 'Success! Your registration is locked in.'
    //     ]);
    // }

    public function enroll(Request $request, $slug)
    {
        // 1. Validate all fields
        $data = $request->validate([
            'full_name'    => 'required|string|max:255',
            'school_name'  => 'required|string|max:255',
            'designation'  => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone'        => 'required|string|max:20',
            'category_id'  => 'required|integer',
            'course_title' => 'required|string|max:255',
        ]);

        try {
            // 2. Fetch category name via API
            $base_url_API = config('openapi.base_url_API');
            $response = Http::withoutVerifying()->get($base_url_API . 'categories/' . $data['category_id']);

            if (! $response->successful()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error fetching category details.'
                ], 500);
            }

            $categoryPayload = $response->json('data') ?? $response->json();
            $categoryName = $categoryPayload['title'] ?? 'Unknown';

            // 3. Insert into enrolls table
            DB::table('enrolls')->insert([
                'full_name'    => $data['full_name'],
                'school_name'  => $data['school_name'],
                'designation'  => $data['designation'],
                'email'        => $data['email'],
                'phone'        => $data['phone'],
                'slug'         => $slug ?? '',
                'category'     => $categoryName,
                'course_title' => $data['course_title'],
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);

            // 4. Send Notification Email
            try {
                $enrollConfig = config('mailconfig.enroll'); // Make sure you define this in config/mailconfig.php

                $to = $enrollConfig['to'] ?? null;
                $cc = $enrollConfig['cc'] ?? [];
                $bcc = $enrollConfig['bcc'] ?? [];
                $subject = $enrollConfig['subject'] ?? 'New Enrollment Notification';
                $htmlBody = view('emails.enroll', ['details' => $data, 'category_name' => $categoryName])->render();

                $response = ZeptoMailService::sendMail($to, $cc, $bcc, $subject, $htmlBody);

                if (isset($response['request_id'])) {
                    Log::info('Enrollment email sent successfully to ' . json_encode($to));
                } else {
                    Log::error('Failed to send enrollment email.', [
                        'response' => $response,
                        'to' => $to,
                        'cc' => $cc,
                        'bcc' => $bcc, 
                        'data' => $data,
                    ]);
                }
            } catch (\Exception $e) {
                Log::error('Exception while sending enrollment email: ' . $e->getMessage(), [
                    'to' => $to,
                    'cc' => $cc,
                    'bcc' => $bcc,
                    'data' => $data,
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Success! Your registration is locked in.'
            ]);
        } catch (\Exception $e) {
            Log::error('Enroll Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }


    /// backend side listing page 
    public function enrollments()
    {
        return view('backend.courses.enrollments');
    }

    /// for the datatable
    public function enrollmentsGet(Request $request)
    {
        $columns = [
            0 => 'full_name',
            1 => 'school_name',
            2 => 'designation',
            3 => 'category',
            4 => 'course_title',
            5 => 'created_at',
        ];

        $totalData = DB::table('enrolls')->count();
        $totalFiltered = $totalData;

        $limit  = $request->input('length');
        $start  = $request->input('start');
        $orderColumnIndex = $request->input('order.0.column');
        $order = $columns[$orderColumnIndex] ?? 'created_at'; // fallback to created_at
        $dir    = $request->input('order.0.dir', 'asc');

        $query = DB::table('enrolls');

        // Filtering
        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('school_name', 'like', "%{$search}%")
                    ->orWhere('designation', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%")
                    ->orWhere('course_title', 'like', "%{$search}%");
            });

            $totalFiltered = $query->count();
        }

        // Sorting & Pagination
        $data = $query
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();

        // Format Data for Frontend
        $json_data = [
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => [],
        ];

        foreach ($data as $row) {
            $nestedData = [];
            $nestedData['full_name'] = $row->full_name;
            $nestedData['school_name'] = $row->school_name;
            $nestedData['designation'] = $row->designation;
            $nestedData['category'] = $row->category;
            $nestedData['course_title'] = $row->course_title;
            $nestedData['created_at'] = $row->created_at ? date('d-m-Y', strtotime($row->created_at)) : '';

            $nestedData['action'] = '<button class="btn btn-sm btn-primary view-btn" data-id="' . $row->id . '">View</button>';

            $json_data['data'][] = $nestedData;
        }

        return response()->json($json_data);
    }

    // popup form 
    public function enrollmentView($id)
    {
        $enroll = DB::table('enrolls')->where('id', $id)->first();

        if (!$enroll) {
            return response()->json(['success' => false, 'message' => 'Enroll not found.'], 404);
        }

        return response()->json(['success' => true, 'data' => $enroll]);
    }

    // export data 
    public function export($type)
    {
        if ($type === 'excel') {
            return Excel::download(new EnrollsExport, 'enrolls.xlsx');
        }

        abort(404); // or handle other formats
    }
}
