<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CasesController extends Controller
{
    // Show Cases List
    public function index()
    {
        $cases = DB::table('cases')
            ->select('cases.*', DB::raw('GROUP_CONCAT(cases_categories.name) as category_names'))
            ->leftJoin('case_category_map', 'cases.id', '=', 'case_category_map.case_id')
            ->leftJoin('cases_categories', 'case_category_map.category_id', '=', 'cases_categories.id')
            ->groupBy('cases.id')
            ->get();

        $categories = DB::table('cases_categories')->get();

        return view('backend.cases.index', compact('cases', 'categories'));
    }


    // Handle Different Sections
    public function handleSection(Request $request)
    {
        switch ($request->section_name) {
            case 'add':
                return $this->store($request);
            case 'update':
                return $this->update($request, $request->case_id);
            case 'delete':
                return $this->delete($request->case_id);
            default:
                return redirect()->route('dashboard.cases')->with('error', 'Invalid section');
        }
    }

    // Show Add Form
    public function create()
    {
        $categories = DB::table('cases_categories')->get();
        return view('backend.cases.add', compact('categories'));
    }

    // Store Case 
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'client' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'description' => 'nullable|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $imagePath = null;
        if ($request->hasFile('main_image')) {
            $imagePath = $request->file('main_image')->store('cases', 'public');
        }

        $caseId = DB::table('cases')->insertGetId([
            'title' => $request->title,
            'client' => $request->client,
            'date' => $request->date,
            'description' => $request->description,
            'main_image' => $imagePath,
            'status' => 'published',
            'slug' => Str::slug($request->title),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        foreach ($request->categories as $categoryId) {
            DB::table('case_category')->insert([
                'case_id' => $caseId,
                'category_id' => $categoryId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('dashboard.cases')->with('success', 'Case created successfully!');
    }

    // Show Edit Form
    public function edit($id)
    {
        $case = DB::table('cases')->where('id', $id)->first();
        $categories = DB::table('categories')->get();
        $selectedCategories = DB::table('case_category')->where('case_id', $id)->pluck('category_id')->toArray();

        return view('dashboard.cases.edit', compact('case', 'categories', 'selectedCategories'));
    }

    // Update Case
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'client' => 'nullable|string|max:255',
    //         'date' => 'nullable|date',
    //         'description' => 'nullable|string',
    //         'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'categories' => 'required|array',
    //         'categories.*' => 'exists:categories,id',
    //     ]);

    //     if ($request->hasFile('main_image')) {
    //         $imagePath = $request->file('main_image')->store('cases', 'public');
    //         DB::table('cases')->where('id', $id)->update(['main_image' => $imagePath]);
    //     }

    //     DB::table('cases')->where('id', $id)->update([
    //         'title' => $request->title,
    //         'client' => $request->client,
    //         'date' => $request->date,
    //         'description' => $request->description,
    //         'status' => 'published',
    //         'updated_at' => now(),
    //     ]);

    //     DB::table('case_category')->where('case_id', $id)->delete();
    //     foreach ($request->categories as $categoryId) {
    //         DB::table('case_category')->insert([
    //             'case_id' => $id,
    //             'category_id' => $categoryId,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);
    //     }

    //     return redirect()->route('dashboard.cases')->with('success', 'Case updated successfully!');
    // }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'client' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'description' => 'nullable|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:512', 
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);

        if ($request->hasFile('main_image')) {
            $imagePath = $request->file('main_image')->store('cases', 'public');
            DB::table('cases')->where('id', $id)->update(['main_image' => $imagePath]);
        }

        
        DB::table('cases')->where('id', $id)->update([
            'title' => $request->title,
            'client' => $request->client,
            'date' => $request->date,
            'description' => $request->description,
            'status' => 'published',
            'updated_at' => now(),
        ]);

        DB::table('case_category')->where('case_id', $id)->delete();
        foreach ($request->categories as $categoryId) {
            DB::table('case_category')->insert([
                'case_id' => $id,
                'category_id' => $categoryId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('dashboard.cases')->with('success', 'Case updated successfully!');
    }

    // Delete Case
    public function delete($id)
    {
        DB::table('cases')->where('id', $id)->delete();
        DB::table('case_category')->where('case_id', $id)->delete();
        return redirect()->route('dashboard.cases')->with('success', 'Case deleted successfully!');
    }
}
