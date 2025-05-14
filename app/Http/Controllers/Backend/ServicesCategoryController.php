<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ServicesCategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('service_categories')->latest()->paginate(10);
        return view('backend.services_category.index', compact('categories'));
    }

    public function list(Request $request)
    {
        $columns = ['id', 'title', 'slug', 'icon', 'image'];

        $totalData = DB::table('service_categories')->count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $orderColumnIndex = $request->input('order.0.column');
        $orderColumn = $columns[$orderColumnIndex] ?? 'id';
        $orderDir = $request->input('order.0.dir', 'asc');

        $query = DB::table('service_categories');

        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%");
        }

        $totalFiltered = $query->count();

        $categories = $query->orderBy($orderColumn, $orderDir)
            ->offset($start)
            ->limit($limit)
            ->get();

        $data = [];

        foreach ($categories as $category) {
            $nestedData = [];
            $nestedData['id'] = $category->id;
            $nestedData['title'] = $category->title;
            $nestedData['slug'] = $category->slug;
            $nestedData['icon'] = $category->icon ? '<img src="' . asset('uploads/services_category/' . $category->icon) . '" class="radius-8" width="60">' : '-';
            $nestedData['image'] = $category->image
                ? '<img src="' . asset('uploads/services_category/' . $category->image) . '" class="radius-8" width="60">'
                : '-';
            $nestedData['action'] = '
            <a href="' . route('service-categories.edit', $category->id) . '" 
               class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
               <iconify-icon icon="lucide:edit"></iconify-icon>
            </a>
            <a href="#" data-id="' . $category->id . '" 
               class="delete-btn w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
               <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
            </a>';

            $data[] = $nestedData;
        }

        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $totalData,
            "recordsFiltered" => $totalFiltered,
            "data" => $data,
        ]);
    }


    public function create()
    {
        return view('backend.services_category.create');
    }

    public function store(Request $request)
    {
        // 1. Validate input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:service_categories,slug',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'icon' => 'nullable|image|mimes:jpg,png,jpeg|max:1024',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error_messages', $validator->errors()->all())
                ->withInput();
        }

        // 2. Create upload folder if it doesn't exist
        $uploadPath = public_path('uploads/services_category');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '_image.' . $request->image->extension();
            $request->image->move($uploadPath, $imageName);
            $imagePath = $imageName; // Just the name, not full path
        }

        $iconPath = null;
        if ($request->hasFile('icon')) {
            $iconName = time() . '_icon.' . $request->icon->extension();
            $request->icon->move($uploadPath, $iconName);
            $iconPath = $iconName; // Just the name, not full path
        }

        // 4. Insert into DB using Query Builder
        DB::table('service_categories')->insert([
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
            'icon' => $iconPath,
            'image' => $imagePath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('service-categories.index')->with('success', 'Category created successfully!');
    }

    public function edit($id)
    {
        $serviceCategory = DB::table('service_categories')->where('id', $id)->first();
        if (!$serviceCategory) {
            abort(404);
        }
        return view('backend.services_category.edit', compact('serviceCategory'));
    }

    public function update(Request $request, $id)
    {
        // 1. Validate 
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:service_categories,slug,' . $id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'icon' => 'nullable|image|mimes:jpg,png,jpeg|max:1024',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error_messages', $validator->errors()->all())
                ->withInput();
        }

        // 2. Fetch the existing record
        $existing = DB::table('service_categories')->where('id', $id)->first();
        if (!$existing) {
            return redirect()->back()->with('error_messages', ['Category not found']);
        }

        $uploadPath = public_path('uploads/services_category');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // 3. Handle image upload
        $imageName = $existing->image;
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($existing->image && File::exists($uploadPath . '/' . $existing->image)) {
                File::delete($uploadPath . '/' . $existing->image);
            }
            $imageName = time() . '_image.' . $request->image->extension();
            $request->image->move($uploadPath, $imageName);
        }

        // 4. Handle icon upload
        $iconName = $existing->icon;
        if ($request->hasFile('icon')) {
            if ($existing->icon && File::exists($uploadPath . '/' . $existing->icon)) {
                File::delete($uploadPath . '/' . $existing->icon);
            }
            $iconName = time() . '_icon.' . $request->icon->extension();
            $request->icon->move($uploadPath, $iconName);
        }

        // 5. Update DB using Query Builder
        DB::table('service_categories')->where('id', $id)->update([
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
            'image' => $imageName,
            'icon' => $iconName,
            'updated_at' => now(),
        ]);

        return redirect()->route('service-categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $category = DB::table('service_categories')->where('id', $id)->first();

        if (!$category) {
            return response()->json(['success' => false, 'message' => 'Category not found.'], 404);
        }

        // Delete icon and image if exists
        $uploadPath = public_path('uploads/services_category');

        if ($category->image && File::exists($uploadPath . '/' . $category->image)) {
            File::delete($uploadPath . '/' . $category->image);
        }

        if ($category->icon && File::exists($uploadPath . '/' . $category->icon)) {
            File::delete($uploadPath . '/' . $category->icon);
        }

        DB::table('service_categories')->where('id', $id)->delete();

        return response()->json(['success' => 'Category deleted successfully.']);
    }
}
