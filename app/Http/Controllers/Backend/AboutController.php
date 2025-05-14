<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SEO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class AboutController extends Controller
{
    public function index()
    {
        $seo = SEO::where('page_name', 'about')->first();
        $section1 = DB::table('about')->where('section', 'section-1')->first(); // Fetch a single section
        $section2 = DB::table('about')->where('section', 'section-2')->first();
        $section3 = DB::table('about')->where('section', 'section-3')->first();
        $section4 = DB::table('about')->where('section', 'section-4')->first();
        $section5 = DB::table('about')->where('section', 'section-5')->first();
        $section5Team = DB::table('team')->select('id', 'name', 'designation', 'image')->get()->toArray();
        $section6 = DB::table('about')->where('section', 'section-6')->first();

        $data = [
            'seo' => $seo,
            'section1' => $section1,
            'section2' => $section2,
            'section3' => $section3,
            'section4' => $section4,
            'section5' => $section5,
            'section5Team' => $section5Team,
            'section6' => $section6,
        ];

        // echo "<pre>";
        // print_r($data);
        // die;

        return view('backend.about.about')->with($data);
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
            case 'section-4':
                return $this->saveSectionFour($request);
            case 'section-5':
                return $this->saveSectionFive($request);
            case 'section-6':
                return $this->saveSectionSix($request);
            default:
                return response()->json(['status' => 'error', 'message' => 'Invalid section'], 400);
        }
    }

    private function saveSectionOne(Request $request)
    {
        $request->validate([
            'section_name' => 'required|string',
            'id' => 'nullable|exists:about,id',
            'heading' => 'required|string|max:255',
            // 'title' => 'required|string|max:256',
            // 'description' => 'required|string',
            // 'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'faq_header' => 'nullable|string|max:255',
            // 'faq_description' => 'nullable|string',
            // 'active' => 'nullable|boolean', 
        ]);


        try {
            $image1Name = null;
            $image2Name = null;
            $timestamp = now()->format('YmdHis');

            // Handle image1 upload
            // Handle image1 upload
            if ($request->hasFile('image1')) {
                $image1 = $request->file('image1');
                $image1Name = $timestamp . '_' . uniqid() . '.' . $image1->getClientOriginalExtension();
                $image1->move(public_path('uploads/about'), $image1Name);
            }

            // Handle image2 upload
            if ($request->hasFile('image2')) {
                $image2 = $request->file('image2');
                $image2Name = $timestamp . '_' . uniqid() . '.' . $image2->getClientOriginalExtension();
                $image2->move(public_path('uploads/about'), $image2Name);
            }
            // echo "<pre>";
            // print_r($request->all());
            // die; 

            $data = [
                'section' => $request->section_name,
                'header' => $request->heading,
                'title' => $request->title,
                'description' => $request->description,
                'additional_info' => json_encode([
                    'progress_title' => $request->progress_title,
                    'progress_per' => $request->progress_per,
                    'q_title' => $request->q_title,
                    'q_num' => $request->q_num,
                ]),
                'active' => $request->has('active') ? 1 : 0,
                'updated_at' => now(),
            ];

            // If images were uploaded, save filenames
            if ($image1Name) {
                $data['image1'] = $image1Name;
            }

            if ($image2Name) {
                $data['image2'] = $image2Name;
            }

            if ($request->id) {
                // Update existing record
                DB::table('about')->where('id', $request->id)->update($data);
            } else {
                // Insert new record 
                $data['created_at'] = now();
                DB::table('about')->insert($data);
            }

            return response()->json(['status' => 'success', 'message' => ucfirst($request->section_name) . ' saved successfully!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An error occurred while saving. ' . $e->getMessage()], 500);
        }
    }


    public function saveSectionTwo(Request $request)
    {
        $request->validate([
            'section_name' => 'required|string',
            'id' => 'nullable|exists:about,id',
            'name' => 'nullable|array',
            'icon' => 'nullable|array',
            'icon.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $providers = [];
            $timestamp = now()->format('YmdHis');

            // Retrieve existing data if ID is provided
            $existingData = $request->id ? DB::table('about')->where('id', $request->id)->first() : null;
            $existingProviders = $existingData ? json_decode($existingData->additional_info, true) : [];

            if ($request->has('name')) {
                foreach ($request->name as $index => $name) {
                    $iconName = null;

                    // If an icon is uploaded, process it
                    if ($request->hasFile("icon.$index")) {
                        $icon = $request->file("icon.$index");
                        $iconName = $timestamp . '_' . uniqid() . '.' . $icon->getClientOriginalExtension();
                        $icon->move(public_path('uploads/about'), $iconName);
                    }
                    // If no new icon is uploaded, keep the old one (if exists)
                    elseif (!empty($existingProviders['partners'][$index]['icon'])) {
                        $iconName = $existingProviders['partners'][$index]['icon'];
                    }

                    $providers[] = [
                        'name' => $name,
                        'icon' => $iconName,
                    ];
                }
            }

            $data = [
                'section' => $request->section_name,
                'header' => isset($request->title) && !empty($request->title) ? $request->title : 'partners',
                'additional_info' => json_encode(['partners' => $providers]),
                'active' => $request->has('active') ? 1 : 0,
                'updated_at' => now(),
            ];

            if ($request->id) {
                DB::table('about')->where('id', $request->id)->update($data);
            } else {
                $data['created_at'] = now();
                DB::table('about')->insert($data);
            }

            return response()->json(['status' => 'success', 'message' => ucfirst($request->section_name) . ' saved successfully!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An error occurred while saving. ' . $e->getMessage()], 500);
        }
    }

    public function saveSectionThree(Request $request)
    {
        $request->validate([
            'section_name' => 'required|string',
            'id' => 'nullable|exists:about,id',
            'header' => 'required|string|max:255',
        ]);

        try {
            $data = [
                'section' => $request->section_name,
                'header' => isset($request->header) && !empty($request->header) ? $request->header : '',
                'title' => isset($request->title) && !empty($request->title) ? $request->title : '',
                'active' => $request->has('active') ? 1 : 0,
                'updated_at' => now(),
            ];

            if ($request->id) {
                DB::table('about')->where('id', $request->id)->update($data);
            } else {
                $data['created_at'] = now();
                DB::table('about')->insert($data);
            }

            return response()->json(['status' => 'success', 'message' => ucfirst($request->section_name) . ' saved successfully!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An error occurred while saving. ' . $e->getMessage()], 500);
        }
    }

    public function saveSectionFour(Request $request)
    {
        // Validate the inputs. Notice that we use 'label' and 'count' for clarity.
        $request->validate([
            'section_name' => 'required|string',
            'id' => 'nullable|exists:about,id',
            'label' => 'required|array',
            'label.*' => 'required|string',
            'count' => 'required|array',
            'count.*' => 'required|string',
            'icon' => 'nullable|array',
            'icon.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // echo "<pre>";
        // print_r($request->all());
        // die;     

        try {
            $entries = [];
            $timestamp = now()->format('YmdHis');

            // Retrieve existing additional_info if updating an existing record.
            $existingData = $request->id ? DB::table('about')->where('id', $request->id)->first() : null;
            $existingEntries = $existingData ? json_decode($existingData->additional_info, true) : [];

            // Loop through each label (and corresponding count)
            foreach ($request->label as $index => $label) {
                $countValue = isset($request->count[$index]) ? $request->count[$index] : null;
                $iconName = null;

                // If a new icon file is uploaded, handle the file upload.
                if ($request->hasFile("icon.$index")) {
                    $icon = $request->file("icon.$index");
                    $iconName = $timestamp . '_' . uniqid() . '.' . $icon->getClientOriginalExtension();
                    $icon->move(public_path('uploads/about'), $iconName);
                }
                // Otherwise, if there is an existing icon for this entry, preserve it.
                elseif (!empty($existingEntries['counts'][$index]['icon'])) {
                    $iconName = $existingEntries['counts'][$index]['icon'];
                }

                $entries[] = [
                    'label' => $label,
                    'count' => $countValue,
                    'icon' => $iconName,
                ];
            }

            $data = [
                'section'         => $request->section_name,
                // You can set a header if needed, here we default to 'count'
                'header'          => isset($request->title) && !empty($request->title) ? $request->title : 'count',
                'additional_info' => json_encode(['counts' => $entries]),
                'active'          => $request->has('active') ? 1 : 0,
                'updated_at'      => now(),
            ];

            if ($request->id) {
                DB::table('about')->where('id', $request->id)->update($data);
            } else {
                $data['created_at'] = now();
                DB::table('about')->insert($data);
            }

            return response()->json(['status' => 'success', 'message' => ucfirst($request->section_name) . ' saved successfully!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An error occurred while saving. ' . $e->getMessage()], 500);
        }
    }

    public function saveSectionFive(Request $request)
    {
        $request->validate([
            'section_name' => 'required|string',
            'id' => 'nullable|exists:about,id',
            'header' => 'required|string|max:255',
        ]);

        try {
            $data = [
                'section' => $request->section_name,
                'header' => isset($request->header) && !empty($request->header) ? $request->header : '',
                'title' => isset($request->title) && !empty($request->title) ? $request->title : '',
                'additional_info' => isset($request->team_ids) && !empty($request->team_ids) ? json_encode(['team_ids' => $request->team_ids]) : [],
                'active' => $request->has('active') ? 1 : 0,
                'updated_at' => now(),
            ];

            if ($request->id) {
                DB::table('about')->where('id', $request->id)->update($data);
            } else {
                $data['created_at'] = now();
                DB::table('about')->insert($data);
            }

            return response()->json(['status' => 'success', 'message' => ucfirst($request->section_name) . ' saved successfully!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An error occurred while saving. ' . $e->getMessage()], 500);
        }
    }

    public function saveSectionSix(Request $request)
    {
        $request->validate([
            'section_name' => 'required|string',
            'id' => 'nullable|exists:about,id',
            'header' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        // echo "<pre>";
        // print_r($request->all());
        // die;

        try {
            $image1Name = null;
            $timestamp = now()->format('YmdHis');

            if ($request->hasFile('image1')) {
                $image1 = $request->file('image1');
                $image1Name = $timestamp . '_' . uniqid() . '.' . $image1->getClientOriginalExtension();
                $image1->move(public_path('uploads/about'), $image1Name);
            }

            $data = [
                'section' => $request->section_name,
                'header' => isset($request->header) && !empty($request->header) ? $request->header : '',
                'title' => isset($request->title) && !empty($request->title) ? $request->title : '',
                'additional_info' => json_encode([
                    'btn1url' => $request->btn1url,
                    'btn2url' => $request->btn2url,
                ]),
                'active' => $request->has('active') ? 1 : 0,
                'updated_at' => now(),
            ];

            // If images were uploaded, save filenames
            if ($image1Name) {
                $data['image1'] = $image1Name;
            }

            if ($request->id) {
                DB::table('about')->where('id', $request->id)->update($data);
            } else {
                $data['created_at'] = now();
                DB::table('about')->insert($data);
            }

            return response()->json(['status' => 'success', 'message' => ucfirst($request->section_name) . ' saved successfully!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An error occurred while saving. ' . $e->getMessage()], 500);
        }
    }
}
