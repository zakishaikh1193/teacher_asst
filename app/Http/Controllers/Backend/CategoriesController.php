<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = DB::table('cases_categories')->get();
        return view('backend.cases.categories', compact('categories'));
    }

    public function create()
    {
        return view('backend.cases.categories_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:cases_categories,slug',
        ]);

        DB::table('cases_categories')->insert([
            'name' => $request->name,
            'slug' => $request->slug,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('case-categories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = DB::table('cases_categories')->where('id', $id)->first();
        return view('backend.cases.categories_edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:cases_categories,slug,' . $id,
        ]);

        DB::table('cases_categories')->where('id', $id)->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'updated_at' => now(),
        ]);

        return redirect()->route('case-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('cases_categories')->where('id', $id)->delete();
        return redirect()->route('case-categories.index')->with('success', 'Category deleted successfully.');
    }
}
