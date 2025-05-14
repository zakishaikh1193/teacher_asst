<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CasesController extends Controller
{
    public function index()
    {
        return view('backend.cases.index');
    }

    // public function data(Request $request)
    // {

    //     $start = $request->input('start');
    //     $length = $request->input('length');
    //     $search = $request->input('search.value');

    //     $query = DB::table('cases');

    //     if (!empty($search)) {
    //         $query->where('title', 'like', "%{$search}%");
    //     }

    //     $total = $query->count();
    //     $cases = $query->offset($start)->limit($length)->get();

    //     $data = [];
    //     foreach ($cases as $case) {
    //         $statusBadge = $this->getStatusBadge($case->status);

    //         $data[] = [
    //             $case->id,
    //             $case->title,
    //             $statusBadge,
    //             $case->slug,
    //             '<a href="' . route('dashboard.cases.edit', $case->id) . '" class="btn btn-warning btn-sm">Edit</a>
    //              <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(' . $case->id . ')">Delete</button>
    //              <form id="delete-form-' . $case->id . '" action="' . route('dashboard.cases.destroy', $case->id) . '" method="POST" style="display:none;">
    //                 ' . csrf_field() . method_field('DELETE') . ' 
    //              </form>'
    //         ];
    //     }

    //     return response()->json([
    //         'data' => $data,
    //         'recordsTotal' => $total,
    //         'recordsFiltered' => $total,
    //     ]);
    // }

    public function data(Request $request)
    {
        $start = $request->input('start');
        $length = $request->input('length');
        $search = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir');

        // Map column index to actual column names
        $columns = ['id', 'title', 'status', 'slug']; // index 4 is actions (non-sortable)

        $query = DB::table('cases');

        // Search filter
        if (!empty($search)) {
            $query->where('title', 'like', "%{$search}%");
        }

        // Apply sorting only on sortable columns
        if (isset($columns[$orderColumnIndex])) {
            $query->orderBy($columns[$orderColumnIndex], $orderDirection);
        } else {
            $query->orderBy('id', 'desc'); // default sort
        }

        $total = $query->count();
        $cases = $query->offset($start)->limit($length)->get();

        $data = [];
        foreach ($cases as $case) {
            $statusBadge = $this->getStatusBadge($case->status);

            $data[] = [
                $case->id,
                $case->title,
                $statusBadge,
                $case->slug,
                '<a href="' . route('dashboard.cases.edit', $case->id) . '" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">    <iconify-icon icon="lucide:edit"></iconify-icon></a>
             <button type="button" class="btn delete-btn w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center" onclick="confirmDelete(' . $case->id . ')"> <iconify-icon icon="mingcute:delete-2-line"></iconify-icon></button>
             <form id="delete-form-' . $case->id . '" action="' . route('dashboard.cases.destroy', $case->id) . '" method="POST" style="display:none;"> 
                ' . csrf_field() . method_field('DELETE') . '  
             </form>'
            ];
        }

        return response()->json([
            'data' => $data,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
        ]);
    }



    //  Helper function for Bootstrap status badges
    private function getStatusBadge($status)
    {
        switch ($status) {
            case 'published':
                return '<span class="badge bg-success">Published</span>';
            case 'draft':
                return '<span class="badge bg-secondary">Draft</span>';
            case 'archived':
                return '<span class="badge bg-danger">Archived</span>';
            default:
                return '<span class="badge bg-dark">Unknown</span>';
        }
    }

    public function create()
    {
        $categories = DB::table('cases_categories')->get();
        return view('backend.cases.add', compact('categories'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'slug' => 'required|unique:cases,slug',
    //         'status' => 'required',
    //         'description' => 'nullable',
    //         'categories' => 'nullable|array'
    //     ]);

    //     $id = DB::table('cases')->insertGetId([
    //         'title' => $request->title,
    //         'slug' => $request->slug,
    //         'status' => $request->status,
    //         'description' => $request->description,
    //         'created_at' => now(),
    //         'updated_at' => now()
    //     ]);

    //     foreach ($request->categories ?? [] as $cat) {
    //         DB::table('case_category_map')->insert([
    //             'case_id' => $id,
    //             'category_id' => $cat,
    //             'created_at' => now(),
    //             'updated_at' => now()
    //         ]);
    //     }

    //     return redirect()->route('dashboard.cases.index')->with('success', 'Case created.');
    // }

    // Store New Case
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:cases,slug',
            'status' => 'required',
            'description' => 'nullable',
            'client' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'main_image' => 'nullable|image|max:4048',
            'listing_image' => 'nullable|image|max:4048',
            'logo_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:512',
            'share_links' => 'nullable|string',
            'categories' => 'nullable|array'
        ]);

        $mainImagePath = null;
        $listingImagePath = null;
        $logoIconPath = null;

        // // Handle Image Upload to `public/uploads/cases/`
        // $imagePath = null;
        // if ($request->hasFile('main_image')) {
        //     $image = $request->file('main_image');
        //     $imageName = time() . '_' . $image->getClientOriginalName();
        //     $destinationPath = public_path('uploads/cases');
        //     $image->move($destinationPath, $imageName);
        //     // $imagePath = 'uploads/cases/' . $imageName;
        //     $imagePath = $imageName;
        // }

        // Upload main_image
        if ($request->hasFile('main_image')) {
            $mainImage = $request->file('main_image');
            $mainImageName = time() . '_main_' . $mainImage->getClientOriginalName();
            $mainImage->move(public_path('uploads/cases'), $mainImageName);
            $mainImagePath = $mainImageName;
        }

        //  Upload listing_image
        if ($request->hasFile('listing_image')) {
            $listingImage = $request->file('listing_image');
            $listingImageName = time() . '_listing_' . $listingImage->getClientOriginalName();
            $listingImage->move(public_path('uploads/cases'), $listingImageName);
            $listingImagePath = $listingImageName;
        }

        // Upload logo_icon
        if ($request->hasFile('logo_icon')) {
            $logoIcon = $request->file('logo_icon');
            $logoIconName = time() . '_logo_' . $logoIcon->getClientOriginalName();
            $logoIcon->move(public_path('uploads/cases'), $logoIconName);
            $logoIconPath = $logoIconName;
        }


        // Insert into Cases Table
        $caseId = DB::table('cases')->insertGetId([
            'title' => $request->title,
            'slug' => $request->slug,
            'status' => $request->status,
            'description' => $request->description,
            'client' => $request->client,
            'date' => $request->date,
            'main_image' => $mainImagePath,
            'listing_image' => $listingImagePath,
            'icon' => $logoIconPath,
            'share_links' => $request->share_links,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Insert Categories into Pivot Table
        foreach ($request->categories ?? [] as $cat) {
            DB::table('case_category_map')->insert([
                'case_id' => $caseId,
                'category_id' => $cat,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect()->route('dashboard.cases.index')->with('success', 'Case created successfully.');
    }

    public function edit($id)
    {
        $case = DB::table('cases')->where('id', $id)->first();
        $categories = DB::table('cases_categories')->get();
        $selected = DB::table('case_category_map')->where('case_id', $id)->pluck('category_id')->toArray();
        return view('backend.cases.add', compact('case', 'categories', 'selected'));
    }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'slug' => "required|unique:cases,slug,$id",
    //         'status' => 'required',
    //         'description' => 'nullable',
    //         'categories' => 'nullable|array'
    //     ]);

    //     DB::table('cases')->where('id', $id)->update([
    //         'title' => $request->title,
    //         'title' => isset($request->client) && !empty($request->client) ? $request->client : 'null',
    //         'date' => isset($request->date) && !empty($request->date) ? $request->date : 'null',
    //         'slug' => $request->slug,
    //         'status' => $request->status,
    //         'description' => $request->description,
    //         'updated_at' => now()
    //     ]);

    //     DB::table('case_category_map')->where('case_id', $id)->delete();
    //     foreach ($request->categories ?? [] as $cat) {
    //         DB::table('case_category_map')->insert([
    //             'case_id' => $id,
    //             'category_id' => $cat,
    //             'created_at' => now(),
    //             'updated_at' => now()
    //         ]);
    //     }

    //     return redirect()->route('cases.index')->with('success', 'Case updated.');
    // }

    // Update Case
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => "required|unique:cases,slug,$id",
            'status' => 'required',
            'description' => 'nullable',
            'client' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'main_image' => 'nullable|image|max:4048',
            'listing_image' => 'nullable|image|max:4048',
            'logo_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:512',
            'share_links' => 'nullable|string', 
            'categories' => 'nullable|array' 
        ]);

        // Fetch Existing Image Path
        // $imagePath = DB::table('cases')->where('id', $id)->value('main_image');
        $existing = DB::table('cases')->where('id', $id)->select('main_image', 'listing_image', 'icon')->first();
        $mainImagePath = $existing->main_image;
        $listingImagePath = $existing->listing_image;

        $logoIconPath = $existing->icon;

        // // Handle Image Upload
        // if ($request->hasFile('main_image')) {
        //     // Delete old image if exists
        //     if ($imagePath && File::exists(public_path($imagePath))) {
        //         File::delete(public_path($imagePath));
        //     }

        //     // Upload new image
        //     $image = $request->file('main_image');
        //     $imageName = time() . '_' . $image->getClientOriginalName();
        //     $destinationPath = public_path('uploads/cases');
        //     $image->move($destinationPath, $imageName);
        //     // $imagePath = 'uploads/cases/' . $imageName;
        //     $imagePath = $imageName;
        // }

        // Upload new main_image
        if ($request->hasFile('main_image')) {
            if ($mainImagePath && File::exists(public_path('uploads/cases/' . $mainImagePath))) {
                File::delete(public_path('uploads/cases/' . $mainImagePath));
            }
            $image = $request->file('main_image');
            $imageName = time() . '_main_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/cases'), $imageName);
            $mainImagePath = $imageName;
        }

        //  Upload new listing_image
        if ($request->hasFile('listing_image')) {
            if ($listingImagePath && File::exists(public_path('uploads/cases/' . $listingImagePath))) {
                File::delete(public_path('uploads/cases/' . $listingImagePath));
            }
            $image = $request->file('listing_image');
            $imageName = time() . '_listing_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/cases'), $imageName);
            $listingImagePath = $imageName;
        }

        if ($request->hasFile('logo_icon')) {
            if ($logoIconPath && File::exists(public_path('uploads/cases/' . $logoIconPath))) {
                File::delete(public_path('uploads/cases/' . $logoIconPath));
            }

            $logo = $request->file('logo_icon');
            $logoName = time() . '_logo_' . $logo->getClientOriginalName();
            $logo->move(public_path('uploads/cases'), $logoName);
            $logoIconPath = $logoName;
        }


        // Update Case Record
        DB::table('cases')->where('id', $id)->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'status' => $request->status,
            'description' => $request->description,
            'client' => $request->client,
            'date' => $request->date,
            'main_image' => $mainImagePath,
            'listing_image' => $listingImagePath,
            'icon' => $logoIconPath,
            'share_links' => $request->share_links,
            'updated_at' => now()
        ]);

        // Update Categories
        DB::table('case_category_map')->where('case_id', $id)->delete();
        foreach ($request->categories ?? [] as $cat) {
            DB::table('case_category_map')->insert([
                'case_id' => $id,
                'category_id' => $cat,
                'created_at' => now(),
                'updated_at' => now()
            ]); 
        }

        return redirect()->route('dashboard.cases.index')->with('success', 'Case updated successfully.');
    }


    // public function destroy($id)
    // {
    //     DB::table('case_category_map')->where('case_id', $id)->delete();
    //     DB::table('cases')->where('id', $id)->delete();
    //     return redirect()->route('cases.index')->with('success', 'Case deleted.');
    // }

    // Delete Case
    public function destroy($id)
    {
        // Fetch image path
        $imagePath = DB::table('cases')->where('id', $id)->value('main_image');

        // Delete image if exists
        if ($imagePath && File::exists(public_path($imagePath))) {
            File::delete(public_path($imagePath));
        }

        // Delete Case Categories
        DB::table('case_category_map')->where('case_id', $id)->delete();

        // Delete Case
        DB::table('cases')->where('id', $id)->delete();

        return redirect()->route('dashboard.cases.index')->with('success', 'Case deleted successfully.');
    }
}
