<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SEO;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();

        $seo = SEO::where('page_name', 'testimonials')->first();
        $section3 = DB::table('faq')->where('section', 'section-2-testimonial')->get()->first();

        $data = [
            'seo' => $seo,
            'testimonials' => $testimonials,
            'section3' => $section3,
        ];
        // echo "<pre>"; 
        // print_r($data);
        // die; 
        return view('backend.testimonials.testimonials')->with($data);
    }

    public function create()
    {
        return view('backend.testimonials.create');
    }

    // public function store(Request $request)
    // { 
    //     $request->validate([  
    //         'name' => 'required|string|max:255',
    //         'designation' => 'required|string|max:255',
    //         'message' => 'required|string',
    //         'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
    //     ]); 

    //     $imagePath = null;
    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->extension();
    //         $destinationPath = public_path('uploads/testimonials');
    //         $image->move($destinationPath, $imageName);
    //         $imagePath = 'uploads/testimonials/' . $imageName;
    //     }

    //     Testimonial::create([
    //         'name' => $request->name,
    //         'designation' => $request->designation,
    //         'message' => $request->message,
    //         'image' => $imageName,
    //     ]);

    //     // return redirect()->route('backend.testimonials.index')->with('success', 'Testimonial added successfully!');
    //     return redirect()->back()->with('success', 'Testimonial added successfully!');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'message' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $destinationPath = public_path('uploads/testimonials');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $image->move($destinationPath, $imageName);
            $imagePath = 'uploads/testimonials/' . $imageName;
        }

        $testimonial = Testimonial::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'message' => $request->message,
            'image' => $imageName, // Fix: Store correct image path
        ]);

        return response()->json([
            'id' => $testimonial->id,
            'name' => $testimonial->name,
            'designation' => $testimonial->designation,
            'message' => $testimonial->message,
            'image' => asset('uploads/testimonials/' . $testimonial->image) // Return full asset URL
        ]);
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('backend.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'message' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($testimonial->image && File::exists(public_path($testimonial->image))) {
                File::delete(public_path($testimonial->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $destinationPath = public_path('uploads/testimonials');
            $image->move($destinationPath, $imageName);
            $testimonial->image = 'uploads/testimonials/' . $imageName;
        }

        $testimonial->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'message' => $request->message,
            'image' => $testimonial->image,
        ]);

        return redirect()->route('dashboard.testimonials.index')->with('success', 'Testimonial updated successfully!');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->image && File::exists(public_path($testimonial->image))) {
            File::delete(public_path($testimonial->image));
        }
        $testimonial->delete();

        // return redirect()->route('backend.testimonials.index')->with('success', 'Testimonial deleted successfully!');
        return redirect()->back()->with('success', 'Testimonial deleted successfully!');
    }
}
