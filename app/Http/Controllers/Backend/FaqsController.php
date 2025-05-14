<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SEO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqsController extends Controller
{
    public function index()
    {
        $seo = SEO::where('page_name', 'faqs')->first();
        $section1 = DB::table('faq')->where('section', 'section-1')->get()->first();
        $section2 = DB::table('faq')->where('section', 'section-2')->get()->first();
        $section3 = DB::table('faq')->where('section', 'section-3')->get()->first();

        $data = [
            'seo' => $seo,
            'section1' => $section1,
            'section2' => $section2,
            'section3' => $section3,
        ];

        // echo "<pre>";
        // print_r($data);
        // die;
        return view("backend.faq.faqs")->with($data);
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
            case 'section-2-testimonial':
                return $this->saveSectionTwoTestimonial($request);
            case 'section-2-team': 
                return $this->saveSectionTwoTeam($request);
            default:
                return response()->json(['status' => 'error', 'message' => 'Invalid section'], 400);
        } 
    }

    private function saveSectionOne(Request $request)
    {
        $request->validate([
            'section_name' => 'required',
            'id' => 'nullable|exists:faq,id',
            'title' => 'required|string|max:255',
            // 'short_description' => 'required|string',
            // 'active' => 'nullable|boolean',
        ]);

        try {
            if ($request->id) {
                // Update existing record using Query Builder
                DB::table('faq')
                    ->where('id', $request->id)
                    ->update([
                        // 'header' => $request->title,
                        // 'description' => $request->short_description,
                        'additional_info' => json_encode([
                            'faq_header' => $request->faq_header,
                            'faq_description' => $request->faq_description,
                        ]),
                        'active' => $request->has('active') ? 1 : 0,
                        'updated_at' => now() // Ensure timestamps are updated
                    ]);
            } else {
                // Create a new entry using Query Builder
                DB::table('faq')->insert([
                    'section' => $request->section_name,
                    'header' => $request->title,
                    // 'description' => $request->short_description,
                    'additional_info' => json_encode([
                        'faq_header' => $request->faq_header,
                        'faq_description' => $request->faq_description,
                    ]),
                    'active' => $request->has('active') ? 1 : 0,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            return response()->json(['status' => 'success', 'message' =>  ucfirst($request->section_name) . ' saved successfully!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An error occurred while saving.'], 500);
        }
    }

    private function saveSectionTwo(Request $request)
    {
        $request->validate([
            'section_name' => 'required',
            'id' => 'nullable|exists:faq,id',
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            // 'active' => 'nullable|boolean',
        ]);

        try {
            if ($request->id) {
                // Update existing record using Query Builder
                DB::table('faq')
                    ->where('id', $request->id)
                    ->update([
                        'header' => $request->title,
                        'description' => $request->short_description,
                        'active' => $request->has('active') ? 1 : 0,
                        'updated_at' => now() // Ensure timestamps are updated
                    ]);
            } else {
                // Create a new entry using Query Builder
                DB::table('faq')->insert([
                    'section' => $request->section_name,
                    'header' => $request->title,
                    'description' => $request->short_description,
                    'active' => $request->has('active') ? 1 : 0,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            return response()->json(['status' => 'success', 'message' =>  ucfirst($request->section_name) . ' saved successfully!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An error occurred while saving.'], 500);
        }
    }

    private function saveSectionThree(Request $request)
    {


        $request->validate([
            'section_name' => 'required',
            'id' => 'nullable|exists:faq,id',
            'title' => 'required|string|max:255',
            // 'short_description' => 'required|string', 
            // 'active' => 'nullable|boolean',
        ]);


        try {
            if ($request->id) {
                // Update existing record using Query Builder
                DB::table('faq')
                    ->where('id', $request->id)
                    ->update([
                        'header' => $request->title,
                        'additional_info' => json_encode([
                            'btn_name' => $request->btn_name,
                            'btn_url' => $request->btn_url,
                        ]),
                        'active' => $request->has('active') ? 1 : 0,
                        'updated_at' => now() // Ensure timestamps are updated
                    ]);
            } else {
                // Create a new entry using Query Builder
                DB::table('faq')->insert([
                    'section' => $request->section_name,
                    'header' => $request->title,
                    'additional_info' => json_encode([
                        'btn_name' => $request->btn_name,
                        'btn_url' => $request->btn_url,
                    ]),
                    'active' => $request->has('active') ? 1 : 0,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            return response()->json(['status' => 'success', 'message' =>  ucfirst($request->section_name) . ' saved successfully!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An error occurred while saving.'], 500);
        }
    }

    private function saveSectionTwoTestimonial(Request $request)
    {

        $request->validate([
            'section_name' => 'required',
            'id' => 'nullable|exists:faq,id',
            'title' => 'required|string|max:255',
            // 'short_description' => 'required|string', 
            // 'active' => 'nullable|boolean',
        ]);

        try {
            if ($request->id) {
                // Update existing record using Query Builder
                DB::table('faq')
                    ->where('id', $request->id)
                    ->update([
                        'header' => $request->title,
                        'additional_info' => json_encode([
                            'btn_name' => $request->btn_name,
                            'btn_url' => $request->btn_url,
                        ]),
                        'active' => $request->has('active') ? 1 : 0,
                        'updated_at' => now() // Ensure timestamps are updated
                    ]);
            } else {
                // Create a new entry using Query Builder
                DB::table('faq')->insert([
                    'section' => $request->section_name,
                    'header' => $request->title,
                    'additional_info' => json_encode([
                        'btn_name' => $request->btn_name,
                        'btn_url' => $request->btn_url,
                    ]),
                    'active' => $request->has('active') ? 1 : 0,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            return response()->json(['status' => 'success', 'message' =>  ucfirst($request->section_name) . ' saved successfully!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An error occurred while saving.'], 500);
        }
    }

    private function saveSectionTwoTeam(Request $request)
    {

        $request->validate([
            'section_name' => 'required',
            'id' => 'nullable|exists:faq,id',
            'title' => 'required|string|max:255',
            // 'short_description' => 'required|string', 
            // 'active' => 'nullable|boolean',
        ]);

        try {
            if ($request->id) {
                // Update existing record using Query Builder
                DB::table('faq')
                    ->where('id', $request->id)
                    ->update([
                        'header' => $request->title,
                        'additional_info' => json_encode([
                            'btn_name' => $request->btn_name,
                            'btn_url' => $request->btn_url,
                        ]),
                        'active' => $request->has('active') ? 1 : 0,
                        'updated_at' => now() // Ensure timestamps are updated
                    ]);
            } else {
                // Create a new entry using Query Builder
                DB::table('faq')->insert([
                    'section' => $request->section_name,
                    'header' => $request->title,
                    'additional_info' => json_encode([
                        'btn_name' => $request->btn_name,
                        'btn_url' => $request->btn_url,
                    ]),
                    'active' => $request->has('active') ? 1 : 0,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            return response()->json(['status' => 'success', 'message' =>  ucfirst($request->section_name) . ' saved successfully!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An error occurred while saving.'], 500);
        }
    } 
}
