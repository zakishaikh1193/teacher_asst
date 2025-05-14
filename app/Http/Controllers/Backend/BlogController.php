<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        return view('backend.blogs.index');
    }

    // public function show(Request $request)
    // {
    //     $start = $request->input('start');
    //     $length = $request->input('length');
    //     $search = $request->input('search.value');

    //     $query = DB::table('blogs')
    //         ->join('blogs_categories', 'blogs.category_id', '=', 'blogs_categories.id')
    //         ->select('blogs.*', 'blogs_categories.name as category_name');

    //     if (!empty($search)) {
    //         $query->where('blogs.title', 'like', "%{$search}%");
    //     }

    //     $total = $query->count();
    //     $blogs = $query->offset($start)->limit($length)->get();

    //     $data = [];
    //     foreach ($blogs as $blog) {
    //         $tags = json_decode($blog->tags ?? '[]', true);
    //         $tagBadges = collect($tags)->map(fn($tag) => "<span class='badge bg-info me-1'>{$tag}</span>")->implode(' ');

    //         $data[] = [
    //             'id' => $blog->id,
    //             'title' => $blog->title,
    //             'category_name' => $blog->category_name,
    //             'tags' => $tagBadges,
    //             'status' => $this->getStatusBadge($blog->status),
    //             'actions' => '
    //                 <a href="' . route('blogs.edit', $blog->id) . '" class="btn btn-warning btn-sm">Edit</a>

    //                 <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(' . $blog->id . ')">Delete</button>
    //                 <form id="delete-form-' . $blog->id . '" action="' . route('blogs.destroy', $blog->id) . '" method="POST" style="display:none;">
    //                     ' . csrf_field() . method_field('DELETE') . ' 
    //                 </form>'
    //         ];
    //     }

    //     return response()->json([
    //         'data' => $data,
    //         'recordsTotal' => $total,
    //         'recordsFiltered' => $total,
    //     ]);
    // }

    public function show(Request $request)
    {
        $start = $request->input('start');
        $length = $request->input('length');
        $search = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir');

        // Map DataTable index to DB column names
        $columns = [
            'blogs.id',
            'blogs.title',
            'blogs_categories.name', // category_name
            'blogs.tags',
            'blogs.status'
        ];

        $query = DB::table('blogs')
            ->join('blogs_categories', 'blogs.category_id', '=', 'blogs_categories.id')
            ->select('blogs.*', 'blogs_categories.name as category_name');

        if (!empty($search)) {
            $query->where('blogs.title', 'like', "%{$search}%");
        }

        // Apply sorting if index is valid
        if (isset($columns[$orderColumnIndex])) {
            $query->orderBy($columns[$orderColumnIndex], $orderDirection);
        } else {
            $query->orderBy('blogs.id', 'desc');
        }

        $total = $query->count();
        $blogs = $query->offset($start)->limit($length)->get();

        $data = [];
        foreach ($blogs as $blog) {
            $tags = json_decode($blog->tags ?? '[]', true);
            $tagBadges = collect($tags)->map(fn($tag) => "<span class='badge bg-info me-1'>{$tag}</span>")->implode(' ');

            $data[] = [
                'id' => $blog->id,
                'title' => $blog->title,
                'category_name' => $blog->category_name,
                'tags' => $tagBadges,
                'status' => $this->getStatusBadge($blog->status),
                'actions' => '
                <a href="' . route('blogs.edit', $blog->id) . '" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center"><iconify-icon icon="lucide:edit"></iconify-icon></a>
                <button type="button" class="btn delete-btn w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center" onclick="confirmDelete(' . $blog->id . ')"><iconify-icon icon="mingcute:delete-2-line"></iconify-icon></button>
                <form id="delete-form-' . $blog->id . '" action="' . route('blogs.destroy', $blog->id) . '" method="POST" style="display:none;">
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



    // public function show($id)
    // {
    //     return response()->json(['message' => 'Not implemented'], 404);
    // }


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
        $categories = DB::table('blogs_categories')->get();
        return view('backend.blogs.create', compact('categories'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:blogs',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'listing_image' => 'nullable|image|max:2048',
            'status' => 'required'
        ]);

        // Convert tags to JSON, remove extra spaces
        $tags = json_encode(array_map('trim', explode(',', $request->tags)));

        // $imagePath = null;
        // if ($request->hasFile('featured_image')) {
        //     $image = $request->file('featured_image');
        //     $imageName = time() . '_' . $image->getClientOriginalName();
        //     $destinationPath = public_path('uploads/blogs');
        //     $image->move($destinationPath, $imageName);
        //     // $imagePath = 'uploads/blogs/' . $imageName;
        //     $imagePath =  $imageName;
        // }

        $featuredImagePath = null;
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $imageName = time() . '_featured_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/blogs'), $imageName);
            $featuredImagePath = $imageName;
        }

        $listingImagePath = null;
        if ($request->hasFile('listing_image')) {
            $image = $request->file('listing_image');
            $imageName = time() . '_listing_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/blogs'), $imageName);
            $listingImagePath = $imageName;
        }

        DB::table('blogs')->insert([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'tags' => $tags,
            'featured_image' => $featuredImagePath,
            'listing_image' => $listingImagePath,
            'status' => $request->status,

            'meta_title' => isset($request->meta_title) && !empty($request->meta_title) ? $request->meta_title : null,
            'meta_description' => isset($request->meta_description) && !empty($request->meta_description) ? $request->meta_description : null,
            'meta_keywords' => isset($request->meta_keywords) && !empty($request->meta_keywords) ? $request->meta_keywords : null,

            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog added.');
    }


    public function edit($id)
    {
        $blog = DB::table('blogs')->where('id', $id)->first();
        $categories = DB::table('blogs_categories')->get(); // Fetch all categories
        return view('backend.blogs.update', compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => "required|unique:blogs,slug,$id",
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'listing_image' => 'nullable|image|max:2048',
            'status' => 'required',
        ]);

        // Convert tags to JSON, remove extra spaces
        $tags = json_encode(array_map('trim', explode(',', $request->tags)));

        // Retrieve existing blog
        $blog = DB::table('blogs')->where('id', $id)->first();
        $featuredImagePath = $blog->featured_image;
        $listingImagePath = $blog->listing_image;

        // Handle image upload
        // if ($request->hasFile('featured_image')) {
        //     if ($imagePath && File::exists(public_path('uploads/blogs/' . $imagePath))) {
        //         File::delete(public_path('uploads/blogs/' . $imagePath));
        //     }

        //     $image = $request->file('featured_image');
        //     $imageName = time() . '_' . $image->getClientOriginalName();
        //     $destinationPath = public_path('uploads/blogs');
        //     $image->move($destinationPath, $imageName);
        //     $imagePath = $imageName; // Save only filename
        // }

        // Handle Featured Image Upload
        if ($request->hasFile('featured_image')) {
            if ($featuredImagePath && File::exists(public_path('uploads/blogs/' . $featuredImagePath))) {
                File::delete(public_path('uploads/blogs/' . $featuredImagePath));
            }

            $image = $request->file('featured_image');
            $imageName = time() . '_featured_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/blogs'), $imageName);
            $featuredImagePath = $imageName;
        }

        // Handle Listing Image Upload
        if ($request->hasFile('listing_image')) {
            if ($listingImagePath && File::exists(public_path('uploads/blogs/' . $listingImagePath))) {
                File::delete(public_path('uploads/blogs/' . $listingImagePath));
            }

            $image = $request->file('listing_image');
            $imageName = time() . '_listing_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/blogs'), $imageName);
            $listingImagePath = $imageName;
        }

        // Update blog
        DB::table('blogs')->where('id', $id)->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'tags' => $tags,
            'featured_image' => $featuredImagePath,
            'listing_image' => $listingImagePath,
            'status' => $request->status,

            'meta_title' => $request->meta_title ?: null,
            'meta_description' => $request->meta_description ?: null,
            'meta_keywords' => $request->meta_keywords ?: null,

            'updated_at' => now(),
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog updated.');
    }

    public function destroy($id)
    {
        // Retrieve the blog post by its ID
        $blog = DB::table('blogs')->where('id', $id)->first();

        if (!$blog) {
            return redirect()->route('blogs.index')->with('error', 'Blog not found.');
        }

        // Delete the featured image if it exists
        if ($blog->featured_image && File::exists(public_path('uploads/blogs/' . $blog->featured_image))) {
            File::delete(public_path('uploads/blogs/' . $blog->featured_image));
        }

        // Delete the blog post from the database
        DB::table('blogs')->where('id', $id)->delete();

        // Redirect back with a success message
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
