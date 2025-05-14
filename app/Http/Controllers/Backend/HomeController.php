<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SEO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Exceptions;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $seo = SEO::where('page_name', 'home-1')->first();

        // section 1 
        $slider1 = DB::table('home1')
            ->where('section_name', 'section-1')
            ->where('content_key', 'slider-1')
            ->first();
        $slider1content = $slider1 ? json_decode($slider1->content_value, true) : [];
        $slider1image = $slider1->image ?? null;

        $slider2 = DB::table('home1')
            ->where('section_name', 'section-1')
            ->where('content_key', 'slider-2')
            ->first();
        $slider2content = $slider2 ? json_decode($slider2->content_value, true) : [];
        $slider2image = $slider2->image ?? null;
        // end section 1

        // section 2 
        $section2 = DB::table('home1')
            ->where('section_name', 'section-2')
            ->where('content_key', 'services')
            ->first();

        $section2content = [
            'title' => '',
            'heading' => '',
            'active' => 0,
            'services' => [
                ['title' => '', 'button_name' => '', 'button_url' => '', 'image' => ''],
                ['title' => '', 'button_name' => '', 'button_url' => '', 'image' => ''],
                ['title' => '', 'button_name' => '', 'button_url' => '', 'image' => ''],
            ]
        ];

        if ($section2 && $section2->content_value) {
            $decoded = json_decode($section2->content_value, true);
            $section2content['title'] = $decoded['title'] ?? '';
            $section2content['heading'] = $decoded['heading'] ?? '';
            $section2content['active'] = $section2->active ?? 0;
            $section2content['services'] = array_replace_recursive($section2content['services'], $decoded['services'] ?? []);
        }
        // end section2   

        // section3
        $section3 = DB::table('home1')
            ->where('section_name', 'section-3')
            ->where('content_key', 'partners')
            ->first();

        // section4   
        $section4 = DB::table('home1')
            ->where('section_name', 'section-4')
            ->where('content_key', 'about')
            ->first();

        // section5     
        $section5 = DB::table('home1')
            ->where('section_name', 'section-5')
            ->where('content_key', 'section5')
            ->first();

        // section6 
        $section6 = DB::table('home1')
            ->where('section_name', 'section-6')
            ->where('content_key', 'section6')
            ->first();

        // section7
        $section7 = DB::table('home1')
            ->where('section_name', 'section-7')
            ->where('content_key', 'section7')
            ->first();

        // section 8   
        $section8 = DB::table('home1')
            ->where('section_name', 'section-8')
            ->where('content_key', 'section8')
            ->first();

        // section10   
        $section10 = DB::table('home1')
            ->where('section_name', 'section-10')
            ->where('content_key', 'section10')
            ->first();

        // section12  
        $section12 = DB::table('home1')
            ->where('section_name', 'section-12')
            ->where('content_key', 'section12')
            ->first();

        // section13   
        $section13 = DB::table('home1')
            ->where('section_name', 'section-13')
            ->where('content_key', 'section13')
            ->first();

        $data = [
            'seo' => $seo,
            'slider1content' => $slider1content,
            'slider1image' => $slider1image,
            'slider2content' => $slider2content,
            'slider2image' => $slider2image,

            'section2' => $section2content,
            'section3' => $section3,
            'section4' => $section4,
            'section5' => $section5,
            'section6' => $section6,
            'section7' => $section7,
            'section8' => $section8,
            'section10' => $section10,

            'section12' => $section12,

            'section13' => $section13,
        ];

        // echo "<pre>";    
        // print_r($data);  
        // die;   
        return view('backend.home.home_1', $data);
    }

    public function handleSection(Request $request)
    {
        $section = $request->section_name;

        switch ($section) {
            case 'section-1':
                return $this->saveSectionOne($request);
            case 'section-2':
                return $this->saveSectionTwo($request);
            case 'section-3':
                return $this->saveSectionThree($request);
            case 'section-4':
                return $this->saveSectionFour($request);
            case 'section-5':
                return $this->saveSection5($request);
            case 'section-6':
                return $this->saveSectionSix($request);
            case 'section-7':
                return $this->saveSectionSeven($request);
            case 'section-8':
                return $this->saveSection8($request);
                // case 'section-9': 
                //     return $this->saveSection9($request); 
            case 'section-10':
                return $this->saveSectionTen($request);
                // case 'section-11':
                //     return $this->saveSection11($request);
            case 'section-12':
                return $this->saveSection12($request);
            case 'section-13':
                return $this->saveSection13($request);

            default:
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid section specified.',
                ], 400);;
        }
    }

    // section 1
    protected function saveSectionOne(Request $request)
    {
        $section = $request->input('section_name');
        $contentKey = $request->input('content_key');

        // Validate input 
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'button_name' => 'required|string|max:100',
            'button_url' => 'required|url',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // optional
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = [
            'title' => $request->input('title'),
            'heading' => $request->input('heading'),
            'button_name' => $request->input('button_name'),
            'button_url' => $request->input('button_url'),
        ];

        // Get previous image (if any)
        $existing = DB::table('home1')
            ->where('section_name', $section)
            ->where('content_key', $contentKey)
            ->first();

        $imagePath = $existing->image ?? null;
        // $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName(); // or use Str::random()
            $destinationPath = public_path('uploads/home1');

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            // $imagePath = 'uploads/home1/' . $filename; // Save relative path
            $imagePath =  $filename; // Save relative path
        }

        try {
            DB::table('home1')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey
                ],
                [
                    'title' => $data['title'],
                    'content_value' => json_encode($data),
                    'image' => $imagePath,
                    'active' => true,
                    'updated_at' => now()
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section data saved successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        }
    }

    // section 2
    protected function saveSectionTwo(Request $request)
    {

        $section = $request->input('section_name');
        $contentKey = $request->input('content_key') ?? 'services';

        // Validate the form 
        $validator = Validator::make($request->all(), [
            'title1' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'title.*' => 'required|string|max:255',
            'button_name.*' => 'nullable|string|max:100',
            'button_url.*' => 'nullable|url',
            'image.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        // Static content
        $static = [
            'title1' => $request->input('title1'),
            'heading' => $request->input('heading'),
        ];

        // Check for previous content to retain old image if not replaced
        $existing = DB::table('home1')
            ->where('section_name', $section)
            ->where('content_key', $contentKey)
            ->first();

        $existingServices = [];
        if ($existing) {
            $decoded = json_decode($existing->content_value, true);
            $existingServices = $decoded['services'] ?? [];
        }

        // Array fields
        $serviceTitles = $request->input('title', []);
        $buttonNames = $request->input('button_name', []);
        $buttonUrls = $request->input('button_url', []);
        $images = $request->file('image', []);

        $services = [];
        for ($i = 0; $i < count($serviceTitles); $i++) {
            $title = $serviceTitles[$i] ?? null;
            $button = $buttonNames[$i] ?? null;
            $url = $buttonUrls[$i] ?? null;
            $existingImage = $existingServices[$i]['image'] ?? null;
            $newImagePath = $existingImage;

            if (!empty($images[$i])) {
                $file = $images[$i];
                $filename = time() . '_' . $file->getClientOriginalName();
                $destinationPath = public_path('uploads/home1');

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $file->move($destinationPath, $filename);
                $newImagePath = $filename;
            }

            $services[] = [
                'title' => $title,
                'button_name' => $button,
                'button_url' => $url,
                'image' => $newImagePath,
            ];
        }

        try {
            DB::table('home1')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey,
                ],
                [
                    'title' => $static['title1'],
                    'content_value' => json_encode([
                        'title' => $static['title1'],
                        'heading' => $static['heading'],
                        'services' => $services
                    ]),
                    'active' => $request->has('active') ? 1 : 0,
                    'updated_at' => now()
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section 2 (Services) saved successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        }
    }

    // section 3 
    protected function saveSectionThree(Request $request)
    {
        $section = $request->input('section_name');      // should be 'section-3'
        $contentKey = $request->input('content_key');    // should be 'partners'

        // Validate partner array inputs
        $validator = Validator::make($request->all(), [
            'name.*' => 'required|string|max:100',
            'url.*' => 'nullable|url|max:255',
            'icon.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        // Get previous data to preserve old icons
        $existing = DB::table('home1')
            ->where('section_name', $section)
            ->where('content_key', $contentKey)
            ->first();

        $oldPartners = [];
        if ($existing && $existing->content_value) {
            $decoded = json_decode($existing->content_value, true);
            $oldPartners = $decoded['partners'] ?? [];
        }

        // Build partner array
        $names = $request->input('name', []);
        $urls = $request->input('url', []);
        $icons = $request->file('icon', []);

        $partners = [];
        for ($i = 0; $i < count($names); $i++) {
            $name = $names[$i];
            $url = $urls[$i] ?? null;
            $existingIcon = $oldPartners[$i]['icon'] ?? null;
            $iconPath = $existingIcon;

            if (!empty($icons[$i])) {
                $file = $icons[$i];
                $filename = time() . '_' . $file->getClientOriginalName();
                $destinationPath = public_path('uploads/home1');

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $file->move($destinationPath, $filename);
                $iconPath = $filename;
            }

            $partners[] = [
                'name' => $name,
                'url' => $url,
                'icon' => $iconPath,
            ];
        }

        // Set active flag
        $active = $request->has('active') ? 1 : 0;

        try {
            DB::table('home1')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey
                ],
                [
                    'title' => 'Meet the Partners',
                    'content_value' => json_encode(['partners' => $partners]),
                    'active' => $active,
                    'updated_at' => now()
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Partner section saved successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        }
    }

    //section 4
    protected function saveSectionFour(Request $request)
    {
        $section = $request->input('section_name');       // should be 'section-4'
        $contentKey = $request->input('content_key');     // should be 'about'

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'short_desc' => 'required|string|max:500',
            'name' => 'nullable|string|max:10',
            'youtube' => 'nullable|url',
            'about-title' => 'nullable|string|max:255',
            'about-s1' => 'nullable|string|max:100',
            'about-s1-per' => 'nullable|numeric|max:100',
            'about-s2' => 'nullable|string|max:100',
            'about-s2-per' => 'nullable|numeric|max:100',
            'contact-q' => 'nullable|string|max:255',
            'contact-no' => 'nullable|string|max:50',
            'cardTitle.*' => 'nullable|string|max:255',
            'cardDesc.*' => 'nullable|string|max:255',
            'image.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        // Get previous content
        $existing = DB::table('home1')
            ->where('section_name', $section)
            ->where('content_key', $contentKey)
            ->first();

        $oldImages = [];
        if ($existing && $existing->content_value) {
            $decoded = json_decode($existing->content_value, true);
            $oldImages = $decoded['images'] ?? [];
        }

        // Upload or preserve images
        $imageFiles = $request->file('image', []);
        $images = [];

        for ($i = 0; $i < 2; $i++) {
            if (!empty($imageFiles[$i])) {
                $file = $imageFiles[$i];
                $filename = time() . '_' . $file->getClientOriginalName();
                $destinationPath = public_path('uploads/home1');

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $file->move($destinationPath, $filename);
                $images[] = $filename;
            } else {
                $images[] = $oldImages[$i] ?? null;
            }
        }

        // Prepare content structure
        $data = [
            'title' => $request->input('title'),
            'name' => $request->input('name'),
            'youtube' => $request->input('youtube'),
            'short_desc' => $request->input('short_desc'),
            'about' => [
                'title' => $request->input('about-title'),
                'service_1' => [
                    'name' => $request->input('about-s1'),
                    'percent' => $request->input('about-s1-per')
                ],
                'service_2' => [
                    'name' => $request->input('about-s2'),
                    'percent' => $request->input('about-s2-per')
                ]
            ],
            'contact' => [
                'question' => $request->input('contact-q'),
                'number' => $request->input('contact-no')
            ],
            'images' => $images,
            'cards' => [
                [
                    'title' => $request->input('cardTitle')[0] ?? '',
                    'desc' => $request->input('cardDesc')[0] ?? ''
                ],
                [
                    'title' => $request->input('cardTitle')[1] ?? '',
                    'desc' => $request->input('cardDesc')[1]  ?? ''
                ]
            ]
        ];

        $active = $request->has('active') ? true : 0;

        try {
            DB::table('home1')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey
                ],
                [
                    'title' => $data['title'],
                    'content_value' => json_encode($data),
                    'image' => null, // optional field if needed
                    'active' => $active,
                    'updated_at' => now()
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section 4 (About) saved successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        }
    }

    //section 5   
    protected function saveSection5(Request $request)
    {
        $section = $request->input('section_name');
        $contentKey = $request->input('content_key');

        // Validate input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'smTitle' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        $active = $request->has('active') ? 1 : 0;

        try {
            DB::table('home1')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey,
                ],
                [
                    'title' => $request->input('title'),
                    'content_value' => json_encode(['smtitle' => $request->input('smTitle')]),
                    'active' =>  $active,
                    'updated_at' => now(),
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section 5 data saved successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        }
    }

    //section 6 
    protected function saveSectionSix(Request $request)
    {
        $section = $request->input('section_name');
        $contentKey = $request->input('content_key');

        // Validate input 
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'button_name' => 'required|string|max:100',
            'button_url' => 'required|url',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8000', // optional
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = [
            'title' => $request->input('title'),
            'button_name' => $request->input('button_name'),
            'button_url' => $request->input('button_url'),
        ];

        // Get previous image (if any)
        $existing = DB::table('home1')
            ->where('section_name', $section)
            ->where('content_key', $contentKey)
            ->first();

        $imagePath = $existing->image ?? null;
        // $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName(); // or use Str::random()
            $destinationPath = public_path('uploads/home1');

            // Ensure the directory exists 
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            // $imagePath = 'uploads/home1/' . $filename; // Save relative path
            $imagePath =  $filename; // Save relative path
        }

        $active = $request->has('active') ? 1 : 0;

        try {
            DB::table('home1')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey
                ],
                [
                    'title' => $data['title'],
                    'content_value' => json_encode($data),
                    'image' => $imagePath,
                    'active' => $active,
                    'updated_at' => now()
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section data saved successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        }
    }

    // Section 7 
    protected function saveSectionSeven(Request $request)
    {
        $section = $request->input('section_name');
        $contentKey = $request->input('content_key');

        // Validate input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'smTitle' => 'nullable|string|max:255',
            'queTitle' => 'array|min:1',
            'queTitle.*' => 'nullable|string|max:255',
            'queDesc' => 'array|min:1',
            'queDesc.*' => 'nullable|string',
            'points' => 'array|min:1',
            'points.*' => 'nullable|string|max:255',
            'yearsOfExpCount' => 'nullable|string|max:50',
            'yearsOfExpText' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        // Prepare the data for content_value (JSON)
        $data = [
            'title' => $request->input('title'),
            'smTitle' => $request->input('smTitle'),
            'questions' => [],
            'points' => array_filter($request->input('points', [])),
            'yearsOfExpCount' => $request->input('yearsOfExpCount'),
            'yearsOfExpText' => $request->input('yearsOfExpText'),
        ];

        $queTitles = $request->input('queTitle', []);
        $queDescs = $request->input('queDesc', []);
        foreach ($queTitles as $index => $qTitle) {
            $data['questions'][] = [
                'title' => $qTitle ?? '',
                'description' => $queDescs[$index] ?? '',
            ];
        }

        // Fetch existing record
        $existing = DB::table('home1')
            ->where('section_name', $section)
            ->where('content_key', $contentKey)
            ->first();


        $imagePath = $existing->image ?? null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('uploads/home1');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $imagePath = $filename;
        }

        $active = $request->has('active') ? true : 0;

        try {
            DB::table('home1')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey,
                ],
                [
                    'title' => $data['title'],
                    'content_value' => json_encode($data),
                    'image' => $imagePath,
                    'active' =>  $active,
                    'updated_at' => now(),
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section 7 data saved successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        }
    }

    // Section 8  
    protected function saveSection8(Request $request)
    {
        $section = $request->input('section_name');
        $contentKey = $request->input('content_key');

        // Validate input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'smTitle' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        $active = $request->has('active') ? 1 : 0;

        try {
            DB::table('home1')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey,
                ],
                [
                    'title' => $request->input('title'),
                    'content_value' => json_encode(['smtitle' => $request->input('smTitle')]),
                    'active' =>  $active,
                    'updated_at' => now(),
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section 8 data saved successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        }
    }


    // section 10   
    // protected function saveSectionTen(Request $request)
    // {
    //     $section = $request->input('section_name');
    //     $contentKey = $request->input('content_key');

    //     // Validate general inputs
    //     $validator = Validator::make($request->all(), [
    //         'title' => 'required|string|max:255',

    //         // Image validation
    //         'point1_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    //         'point2_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    //         'point3_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'Validation failed.',
    //             'errors' => $validator->errors(),
    //         ], 422);
    //     }

    //     $cards = [];

    //     for ($i = 1; $i <= 3; $i++) {
    //         $cardKey = "card{$i}";
    //         $imageField = "point{$i}_image";
    //         $card = [
    //             'title' => $request->input("point{$i}_title"),
    //             'point1' => $request->input("point{$i}_p1"),
    //             'point1_text' => $request->input("point{$i}_p1text"),
    //             'point2' => $request->input("point{$i}_p2"),
    //             'point2_text' => $request->input("point{$i}_p2text"),
    //             'description' => $request->input("point{$i}_desc"),
    //             'points' => $request->input("point{$i}_p", []),
    //             'image' => null,
    //         ];

    //         // Handle image upload
    //         if ($request->hasFile($imageField)) {
    //             $file = $request->file($imageField);
    //             $filename = time() . "_{$imageField}_" . $file->getClientOriginalName();
    //             $destination = public_path('uploads/home1');
    //             if (!file_exists($destination)) {
    //                 mkdir($destination, 0755, true);
    //             }
    //             $file->move($destination, $filename);
    //             $card['image'] = $filename;
    //         }

    //         $cards[$cardKey] = $card;
    //     }

    //     // echo "<pre>"; 
    //     // print_r($cards);
    //     // die;

    //     $finalData = [
    //         'title' => $request->input('title'),
    //         'cards' => $cards,
    //     ];

    //     // // Check existing record
    //     // $existing = DB::table('home1')
    //     //     ->where('section_name', $section)
    //     //     ->where('content_key', $contentKey)
    //     //     ->first();  

    //     try {
    //         DB::table('home1')->updateOrInsert(
    //             [
    //                 'section_name' => $section,
    //                 'content_key' => $contentKey
    //             ],
    //             [
    //                 'title' => $finalData['title'],
    //                 'content_value' => json_encode($finalData),
    //                 'active' => $request->has('active'),
    //                 'updated_at' => now(),
    //             ]
    //         );

    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'Section 10 data saved successfully.',
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'Database error: ' . $e->getMessage(),
    //         ], 500);
    //     }
    // }

    // section 10   
    protected function saveSectionTen(Request $request)
    {
        $section = $request->input('section_name');
        $contentKey = $request->input('content_key');

        // Validate
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'point1_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'point2_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'point3_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Get existing record
        $existing = DB::table('home1')
            ->where('section_name', $section)
            ->where('content_key', $contentKey)
            ->first();

        // Decode existing images
        $oldImages = [];
        if ($existing && $existing->content_value) {
            $decoded = json_decode($existing->content_value, true);
            if (isset($decoded['cards'])) {
                foreach ($decoded['cards'] as $cardKey => $card) {
                    $oldImages[$cardKey] = $card['image'] ?? null;
                }
            }
        }

        $cards = [];

        for ($i = 1; $i <= 3; $i++) {
            $cardKey = "card{$i}";
            $imageField = "point{$i}_image";

            // Use old image if new one not uploaded
            $imagePath = $oldImages[$cardKey] ?? null;

            if ($request->hasFile($imageField)) {
                $file = $request->file($imageField);
                $filename = time() . "_{$imageField}_" . $file->getClientOriginalName();
                $destination = public_path('uploads/home1');
                if (!file_exists($destination)) {
                    mkdir($destination, 0755, true);
                }
                $file->move($destination, $filename);
                $imagePath = $filename;
            }

            $cards[$cardKey] = [
                'title' => $request->input("point{$i}_title"),
                'point1' => $request->input("point{$i}_p1"),
                'point1_text' => $request->input("point{$i}_p1text"),
                'point2' => $request->input("point{$i}_p2"),
                'point2_text' => $request->input("point{$i}_p2text"),
                'description' => $request->input("point{$i}_desc"),
                'points' => $request->input("point{$i}_p", []),
                'image' => $imagePath,
            ];
        }

        $finalData = [
            'title' => $request->input('title'),
            'cards' => $cards,
        ];

        try {
            DB::table('home1')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey,
                ],
                [
                    'title' => $finalData['title'],
                    'content_value' => json_encode($finalData),
                    'active' => $request->has('active'),
                    'updated_at' => now(),
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section 10 data saved successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        }
    }

    // section 11

    // section 12 
    protected function saveSection12(Request $request)
    {
        $section = $request->input('section_name');
        $contentKey = $request->input('content_key');

        // Validate input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'smTitle' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        $active = $request->has('active') ? 1 : 0;

        try {
            DB::table('home1')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey,
                ],
                [
                    'title' => $request->input('title'),
                    'content_value' => json_encode(['smtitle' => $request->input('smTitle')]),
                    'active' =>  $active,
                    'updated_at' => now(),
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section 12 data saved successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        }
    }

    // section 13  
    protected function saveSection13(Request $request)
    {
        $section = $request->input('section_name');
        $contentKey = $request->input('content_key');

        // Validate input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'button_name' => 'nullable|string|max:255',
            'button_url' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = [
            'button_name' => $request->input('button_name') ?? '',
            'button_url' => $request->input('button_url') ?? '',
        ];

        $active = $request->has('active') ? 1 : 0;

        try {
            DB::table('home1')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey,
                ],
                [
                    'title' => $request->input('title'),
                    'content_value' => json_encode($data),
                    'active' =>  $active,
                    'updated_at' => now(),
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section 13 data saved successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        }
    }
}
