<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SEO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $seo = SEO::where('page_name', 'contact')->first();
        $section1 = DB::table('contacts')->where('section', 'section-1')->get()->first();
        $section2 = DB::table('contacts')->where('section', 'section-2')->get()->first();
        $section3 = DB::table('contacts')->where('section', 'section-3')->get()->first();

        $data = [
            'seo' => $seo,
            'section1' => $section1,
            'section2' => $section2,
            'section3' => $section3,
        ];
        // echo "<pre>";
        // print_r($data);
        // die;
        return view("backend.contact.contact")->with($data);
    }

    public function handleSection(Request $request)
    {
        switch ($request->section_name) {
            case 'section-1':
                return $this->saveSectionOne($request);
            case 'section-2':
                return $this->saveSectionTwo($request);
            case 'section-3':
                return $this->saveSectionThree($request);
            default:
                return response()->json(['status' => 'error', 'message' => 'Invalid section'], 400);
        }
    }

    private function saveSectionOne(Request $request)
    {
        $request->validate([
            'id' => 'nullable|exists:contacts,id',
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            // 'active' => 'nullable|boolean',
        ]);

        try {
            if ($request->id) {
                // Update existing record using Query Builder
                DB::table('contacts')
                    ->where('id', $request->id)
                    ->update([
                        'header' => $request->title,
                        'description' => $request->short_description,
                        'active' => $request->has('active') ? 1 : 0,
                        'updated_at' => now() // Ensure timestamps are updated
                    ]);
            } else {
                // Create a new entry using Query Builder
                DB::table('contacts')->insert([
                    'section' => 'section-1',
                    'header' => $request->title,
                    'description' => $request->short_description,
                    'active' => $request->has('active') ? 1 : 0,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            return response()->json(['status' => 'success', 'message' => 'Section 1 saved successfully!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An error occurred while saving.'], 500);
        }
    }

    /**
     * Save data for Section 2
     */
    private function saveSectionTwo(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // die;

        $request->validate([
            'section_name' => 'required',
            'id' => 'nullable|exists:contacts,id',
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            // 'active' => 'nullable|boolean',
        ]);

        try {
            if ($request->id) {
                // Update existing record using Query Builder
                DB::table('contacts')
                    ->where('id', $request->id)
                    ->update([
                        'header' => $request->title,
                        'description' => $request->short_description,
                        'additional_info' => json_encode([
                            'country' => $request->country,
                            'address' => $request->address,
                            'email' => $request->email,
                            'phone' => $request->phone,
                        ]),
                        'active' => $request->has('active') ? 1 : 0,
                        'updated_at' => now() // Ensure timestamps are updated
                    ]);
            } else {
                // Create a new entry using Query Builder
                DB::table('contacts')->insert([
                    'section' => $request->section_name,
                    'header' => $request->title,
                    'description' => $request->short_description,
                    'additional_info' => json_encode([
                        'country' => $request->country,
                        'address' => $request->address,
                        'email' => $request->email,
                        'phone' => $request->phone,
                    ]),
                    'active' => $request->has('active') ? 1 : 0,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            return response()->json(['status' => 'success', 'message' => ucfirst($request->section_name) . ' saved successfully!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An error occurred while saving.'], 500);
        }
    }

    /**
     * Save data for Section 3
     */
    private function saveSectionThree(Request $request)
    {
        $request->validate([
            'section_name' => 'required',
            'id' => 'nullable|exists:contacts,id',
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            // 'active' => 'nullable|boolean',   
        ]);

        try {
            if ($request->id) {
                // Update existing record using Query Builder
                DB::table('contacts')
                    ->where('id', $request->id)
                    ->update([
                        'header' => $request->title,
                        'description' => $request->short_description,
                        'active' => $request->has('active') ? 1 : 0,
                        'updated_at' => now() // Ensure timestamps are updated
                    ]);
            } else {
                // Create a new entry using Query Builder
                DB::table('contacts')->insert([
                    'section' => $request->section_name,
                    'header' => $request->title,
                    'description' => $request->short_description,
                    'active' => $request->has('active') ? 1 : 0,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            return response()->json(['status' => 'success', 'message' => ucfirst($request->section_name) . ' saved successfully!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An error occurred while saving.'], 500);
        }
    }
}
