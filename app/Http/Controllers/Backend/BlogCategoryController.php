<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('blogs_categories')->orderBy('created_at', 'desc')->paginate(10);
        return view('backend.blog_category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:blogs_categories,name'
        ]);

        DB::table('blogs_categories')->insert([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['success' => true, 'message' => 'Category created successfully.']);
    }

    public function show($id)
    {
        $category = DB::table('blogs_categories')->where('id', $id)->first();
        return response()->json($category);
    }

    public function edit($id)
    {
        $category = DB::table('blogs_categories')->where('id', $id)->first();
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:blogs_categories,name,' . $id
        ]);

        DB::table('blogs_categories')->where('id', $id)->update([
            'name' => $request->name,
            'slug' =>  Str::slug($request->name),
            'updated_at' => now(),
        ]);

        return response()->json(['success' => true, 'message' => 'Category updated successfully.']);
    }

    public function destroy($id)
    {
        DB::table('blogs_categories')->where('id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'Category deleted successfully.']);
    }
}
