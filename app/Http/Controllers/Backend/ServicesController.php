<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    //
    // Display a listing of services
    public function index()
    {
        return  view('backend.services.index');
    }

    // public function getServices(Request $request)
    // {
    //     $columns = ['id', 'heading', 'image'];

    //     // Get the total count of records
    //     $totalData = DB::table('services')->count();
    //     $totalFiltered = $totalData;

    //     // Get request parameters for pagination
    //     $limit = $request->input('length'); // Number of records per page
    //     $start = $request->input('start');  // Offset
    //     $orderColumn = $columns[$request->input('order.0.column')]; // Sorting column
    //     $orderDir = $request->input('order.0.dir'); // Sorting direction (asc/desc)

    //     // Fetch data from DB
    //     $query = DB::table('services');

    //     if (!empty($request->input('search.value'))) {
    //         $search = $request->input('search.value');
    //         $query->where('heading', 'LIKE', "%{$search}%");
    //     }

    //     $totalFiltered = $query->count(); // Update filtered count after search
    //     $services = $query->offset($start)
    //         ->limit($limit)
    //         ->orderBy($orderColumn, $orderDir)
    //         ->get();

    //     // Format data for DataTables
    //     $data = [];
    //     foreach ($services as $service) {
    //         $nestedData = [];
    //         $nestedData['id'] = $service->id;
    //         $nestedData['heading'] = $service->heading;
    //         $nestedData['image'] = '<img src="' . asset('uploads/services/' . $service->image) . '" alt="" class="radius-8" width="50">';
    //         $nestedData['action'] = '   
    //             <a href="' . route('dashboard.services.edit', $service->id) . '" 
    //                class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
    //                <iconify-icon icon="lucide:edit"></iconify-icon>
    //             </a> 
    //             <a href="javascript:void(0)" onclick="deleteService(' . $service->id . ')" 
    //                class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
    //                <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
    //             </a>';

    //         $data[] = $nestedData;
    //     }

    //     // Return JSON response
    //     return response()->json([
    //         "draw" => intval($request->input('draw')),
    //         "recordsTotal" => $totalData,
    //         "recordsFiltered" => $totalFiltered,
    //         "data" => $data
    //     ]);
    // }

    // public function getServices(Request $request)
    // {
    //     // Define the columns that can be sorted and searched
    //     $columns = ['id', 'heading', 'image'];

    //     // Get total number of records
    //     $totalData = DB::table('services')->count();
    //     $totalFiltered = $totalData;

    //     // Get pagination and ordering parameters from DataTable request
    //     $limit = $request->input('length'); // Number of records per page
    //     $start = $request->input('start');  // Offset
    //     $orderColumnIndex = $request->input('order.0.column'); // Column index for ordering
    //     $orderColumn = $columns[$orderColumnIndex] ?? 'id'; // Column name
    //     $orderDir = $request->input('order.0.dir', 'asc'); // Sorting direction (asc/desc)

    //     // Start query
    //     $query = DB::table('services');

    //     // Handle search input
    //     if (!empty($request->input('search.value'))) {
    //         $search = $request->input('search.value');
    //         $query->where('heading', 'LIKE', "%{$search}%");
    //     }

    //     // Count after filtering
    //     $totalFiltered = $query->count();

    //     // Apply pagination, ordering, and get the result
    //     $services = $query->orderBy($orderColumn, $orderDir)
    //         ->offset($start)
    //         ->limit($limit)
    //         ->get();

    //     // Format data for DataTables
    //     $data = [];
    //     foreach ($services as $service) {
    //         $nestedData = [];
    //         $nestedData['id'] = $service->id;
    //         $nestedData['heading'] = $service->heading;
    //         $nestedData['image'] = '<img src="' . asset('uploads/services/' . $service->image) . '" alt="" class="radius-8" width="120">';
    //         $nestedData['action'] = '
    //             <a href="' . route('dashboard.services.edit', $service->id) . '" 
    //                class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
    //                <iconify-icon icon="lucide:edit"></iconify-icon>
    //             </a> 
    //             <button onclick="deleteService(' . $service->id . ')"  
    //                class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
    //                <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
    //             </button>';

    //         $data[] = $nestedData;
    //     }

    //     // Return JSON response for DataTables
    //     return response()->json([
    //         "draw" => intval($request->input('draw')),
    //         "recordsTotal" => $totalData,
    //         "recordsFiltered" => $totalFiltered,
    //         "data" => $data
    //     ]);
    // }

    // public function getServices(Request $request)
    // {
    //     $columns = ['id', 'heading', 'image'];

    //     $totalData = DB::table('services')->count();
    //     $totalFiltered = $totalData;

    //     $limit = $request->input('length');
    //     $start = $request->input('start');
    //     $orderColumnIndex = $request->input('order.0.column');
    //     $orderColumn = $columns[$orderColumnIndex] ?? 'id';
    //     $orderDir = $request->input('order.0.dir', 'asc');

    //     $query = DB::table('services');

    //     if (!empty($request->input('search.value'))) {
    //         $search = $request->input('search.value');
    //         $query->where('heading', 'LIKE', "%{$search}%");
    //     }

    //     $totalFiltered = $query->count();

    //     $services = $query->orderBy($orderColumn, $orderDir)
    //         ->offset($start)
    //         ->limit($limit)
    //         ->get();

    //     $data = [];
    //     foreach ($services as $service) {
    //         $nestedData = [];
    //         $nestedData['id'] = $service->id;
    //         $nestedData['heading'] = $service->heading;
    //         $nestedData['image'] = '<img src="' . asset('uploads/services/' . $service->image) . '" alt="" class="radius-8" width="100">';
    //         $nestedData['action'] = '
    //             <a href="' . route('dashboard.services.edit', $service->id) . '" 
    //             class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
    //             <iconify-icon icon="lucide:edit"></iconify-icon>
    //             </a>    
    //             <a href="#" data-id="' . $service->id . '" 
    //                 class="delete-btn w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
    //                 <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
    //             </a>';

    //         $data[] = $nestedData;
    //     }

    //     return response()->json([
    //         "draw" => intval($request->input('draw')),
    //         "recordsTotal" => $totalData,
    //         "recordsFiltered" => $totalFiltered,
    //         "data" => $data
    //     ]);
    // }

    public function getServices(Request $request)
    {
        $columns = ['id', 'heading', 'image', 'category_id'];

        $totalData = DB::table('services')->count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $orderColumnIndex = $request->input('order.0.column');
        $orderColumn = $columns[$orderColumnIndex] ?? 'id';
        $orderDir = $request->input('order.0.dir', 'asc');

        $query = DB::table('services')
            ->leftJoin('service_categories', 'services.category_id', '=', 'service_categories.id')
            ->select('services.*', 'service_categories.title as category_name');

        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');
            $query->where('services.heading', 'LIKE', "%{$search}%");
        }

        $totalFiltered = $query->count();

        $services = $query->orderBy($orderColumn, $orderDir)
            ->offset($start)
            ->limit($limit)
            ->get();

        $data = [];
        foreach ($services as $service) {
            $nestedData = [];
            $nestedData['id'] = $service->id;
            $nestedData['heading'] = $service->heading;
            $nestedData['image'] = '<img src="' . asset('uploads/services/' . $service->image) . '" alt="" class="radius-8" width="100">';
            $nestedData['category'] = $service->category_name ?? '-'; // Display category name, or dash if none
            $nestedData['action'] = '
            <a href="' . route('dashboard.services.edit', $service->id) . '" 
            class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
            <iconify-icon icon="lucide:edit"></iconify-icon>
            </a>    
            <a href="#" data-id="' . $service->id . '" 
                class="delete-btn w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
            </a>';

            $data[] = $nestedData;
        }

        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $totalData,
            "recordsFiltered" => $totalFiltered,
            "data" => $data
        ]);
    }



    public function add()
    {
        $categories = DB::table('service_categories')->orderBy('title')->get();
        return  view('backend.services.add', compact('categories'));
    }

    // Store a newly created service in storage 
    public function store(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'seo_title' => 'required|string|max:255',
            'seo_desc' => 'required|string',
            'seo_key' => 'nullable|string',

            'heading' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'description1' => 'required|string',

            'add_title' => 'nullable|string|max:255',
            'add_desc' => 'nullable|string',
            'add_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'add_point' => 'nullable|array',

            'description2' => 'nullable|string',

            'add2_title.*' => 'nullable|string|max:255',
            'add2_description.*' => 'nullable|string',
            'add2_icon.*' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'category_id' => 'required|exists:service_categories,id',
        ]);

        // // Return with errors if validation fails
        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->with('error_messages', $validator->errors()->all())
                ->withInput();
        }

        // echo "<pre>";
        // print_r($request->all());
        // die;
        // Ensure the directory exists
        $uploadPath = public_path('uploads/services');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true); // Create the directory with full permissions
        }

        // Handle file uploads to public/uploads/services/
        $imagePath = $request->file('image') ? $this->uploadImage($request->file('image')) : null;
        $addImagePath = $request->file('add_image') ? $this->uploadImage($request->file('add_image')) : null;
        $add2Icons = [];

        if ($request->hasFile('add2_icon')) {
            foreach ($request->file('add2_icon') as $icon) {
                $add2Icons[] = $this->uploadImage($icon);
            }
        }

        // Insert service data using Query Builder
        DB::table('services')->insert([
            'seo' => json_encode([
                'title' => $request->seo_title,
                'description' => $request->seo_desc,
                'keywords' => $request->seo_key,
            ]),
            'url' => Str::slug($request->heading),
            'heading' => $request->heading,
            'image' => $imagePath,
            'description1' => $request->description1,
            'additional_info1' => json_encode([
                'title' => $request->add_title,
                'description' => $request->add_desc,
                'image' => $addImagePath,
                'add_point' => $request->add_point,
            ]),
            'description2' => $request->description2,
            'additional_info2' => json_encode([
                'icons' => $add2Icons,
                'add2_title' => $request->add2_title,
                'add2_description' => $request->add2_description,
            ]),
            'category_id' => $request->category_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Service saved successfully!');
    }

    // Function to handle image uploads to public/uploads/services/
    private function uploadImage($image)
    {
        $filename = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads/services'), $filename);
        // return 'uploads/services/' . $filename;
        return $filename;
    }


    public function edit($id)
    {
        $service = DB::table('services')->where('id', $id)->first();

        if (!$service) {
            return redirect()->route('dashboard.services.index')->with('error', 'Service not found.');
        }

        // Fetch all service categories for the dropdown
        $categories = DB::table('service_categories')->orderBy('title')->get();

        // Return the edit view with the service and categories data
        return view('backend.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'seo_title' => 'required|string|max:255',
            'seo_desc' => 'required|string',
            'seo_key' => 'nullable|string',

            'heading' => 'required|string|max:255|unique:services,heading,' . $id,
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'description1' => 'required|string',

            'add_title' => 'nullable|string|max:255',
            'add_desc' => 'nullable|string',
            'add_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'add_point' => 'nullable|array',

            'description2' => 'nullable|string',

            'add2_title.*' => 'nullable|string|max:255',
            'add2_description.*' => 'nullable|string',
            'add2_icon.*' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'category_id' => 'required|exists:service_categories,id',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->with('error_messages', $validator->errors()->all())
                ->withInput();
        }

        // echo "<pre>";
        // print_r($request->all());
        // die;

        // Retrieve the existing service
        $service = DB::table('services')->where('id', $id)->first();

        if (!$service) {
            return redirect()->back()->with('error', 'Service not found.');
        }

        // Ensure the directory exists
        $uploadPath = public_path('uploads/services');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Handle images: Keep existing if not replaced
        $imagePath = $service->image;
        if ($request->hasFile('image')) {
            // Delete old image
            if ($service->image && file_exists(public_path('uploads/services/' . $service->image))) {
                unlink(public_path('uploads/services/' . $service->image));
            }
            // Upload new image
            $imagePath = $this->uploadImage($request->file('image'));
        }

        $addImagePath = json_decode($service->additional_info1)->image ?? null;
        if ($request->hasFile('add_image')) {
            if ($addImagePath && file_exists(public_path('uploads/services/' . $addImagePath))) {
                unlink(public_path('uploads/services/' . $addImagePath));
            }
            $addImagePath = $this->uploadImage($request->file('add_image'));
        }

        // Handle additional icons update (if new images are provided, replace existing ones)
        // $existingIcons = json_decode($service->additional_info2)->icons ?? [];
        // $add2Icons = [];

        // if ($request->hasFile('add2_icon')) { 
        //     foreach ($request->file('add2_icon') as $index => $icon) {
        //         // Delete old icon if it exists
        //         if (isset($existingIcons[$index]) && file_exists(public_path('uploads/services/' . $existingIcons[$index]))) {
        //             unlink(public_path('uploads/services/' . $existingIcons[$index]));
        //         }
        //         // Upload new icon
        //         $add2Icons[] = $this->uploadImage($icon);
        //     }
        // } else {
        //     $add2Icons = $existingIcons; // Keep existing icons if not updated
        // }

        $existingIcons = json_decode($service->additional_info2)->icons ?? [];
        $add2Icons = $existingIcons; // Start with existing icons

        if ($request->hasFile('add2_icon')) {
            foreach ($request->file('add2_icon') as $index => $icon) {
                // Delete old icon only if a new one is provided for that position
                if (!empty($existingIcons[$index]) && file_exists(public_path('uploads/services/' . $existingIcons[$index]))) {
                    unlink(public_path('uploads/services/' . $existingIcons[$index]));
                }

                // Replace only the specific index with the new uploaded icon
                $add2Icons[$index] = $this->uploadImage($icon);
            }
        }



        // Update service in database
        DB::table('services')->where('id', $id)->update([
            'seo' => json_encode([
                'title' => $request->seo_title,
                'description' => $request->seo_desc,
                'keywords' => $request->seo_key,
            ]),
            'url' => Str::slug($request->heading),
            'heading' => $request->heading,
            'image' => $imagePath,
            'description1' => $request->description1,
            'additional_info1' => json_encode([
                'title' => $request->add_title,
                'description' => $request->add_desc,
                'image' => $addImagePath,
                'add_point' => $request->add_point,
            ]),
            'description2' => $request->description2,
            'additional_info2' => json_encode([
                'icons' => $add2Icons,
                'add2_title' => $request->add2_title,
                'add2_description' => $request->add2_description,
            ]),
            'category_id' => $request->category_id,
            'updated_at' => now(),
        ]);

        return redirect()->route('dashboard.services.index')->with('success', 'Service updated successfully!');
    }

    // Remove the specified service from storage
    public function destroy($id)
    {
        // Find the service by ID
        $service = DB::table('services')->where('id', $id)->first();

        // Check if the service exists
        if (!$service) {
            return response()->json(['error' => 'Service not found!'], 404);
        }

        // Remove the image file from public/uploads/services/ if it exists
        if ($service->image && file_exists(public_path($service->image))) {
            unlink(public_path($service->image)); // Delete the file
        }

        // Delete the service from the database
        DB::table('services')->where('id', $id)->delete();

        return response()->json(['success' => 'Service deleted successfully!']);
    }
}
