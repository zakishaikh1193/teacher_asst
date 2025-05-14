<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SEO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Home2Controller extends Controller
{
    public function index()
    {
        $seo = SEO::where('page_name', 'home-2')->first();

        $section1S1 = DB::table('home2')
            ->where('section_name', 'section-1')
            ->where('content_key', 'slider-1')
            ->first();

        $section1S2 = DB::table('home2')
            ->where('section_name', 'section-1')
            ->where('content_key', 'slider-2')
            ->first();

        $section2 = DB::table('home2')
            ->where('section_name', 'section-2')
            ->where('content_key', 'industries')
            ->first();

        $section3 = DB::table('home2')
            ->where('section_name', 'section-3')
            ->where('content_key', 'section3')
            ->first();

        $section4 = DB::table('home2')
            ->where('section_name', 'section-4')
            ->where('content_key', 'section4')
            ->first();

        $section5 = DB::table('home2')
            ->where('section_name', 'section-5')
            ->where('content_key', 'casses')
            ->first();

        $section6 = DB::table('home2')
            ->where('section_name', 'section-6')
            ->where('content_key', 'team_selection')
            ->first();

        $section7 = DB::table('home2')
            ->where('section_name', 'section-7')
            ->where('content_key', 'testimonials')
            ->first();

        $section8 = DB::table('home2')
            ->where('section_name', 'section-8')
            ->where('content_key', 'blogs')
            ->first();

        $section9 = DB::table('home2')
            ->where('section_name', 'section-9')
            ->where('content_key', 'partners')
            ->first();

        $teamMembers = DB::table('team')->orderBy('name')->get();

        $section10 = DB::table('home2')
            ->where('section_name', 'section-10')
            ->where('content_key', 'createValues')
            ->first();

        $section11 = DB::table('home2')
            ->where('section_name', 'section-11')
            ->where('content_key', 'sectionContact')
            ->first();

        $data = [
            'seo' => $seo,
            'section1S1' => $section1S1,
            'section1S2' => $section1S2,
            'section2' => $section2,
            'section3' => $section3,
            'section4' => $section4,
            'section5' => $section5,
            'section6' => $section6,
            'section7' => $section7,
            'teamMembers' => $teamMembers,
            'section8' => $section8,
            'section9' => $section9,
            'section10' => $section10,
            'section11' => $section11,
        ];

        // echo "<pre>"; 
        // print_r($data); 
        // die; 
        return view('backend.home.home_2', $data);
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
                return $this->saveSection3($request);
            case 'section-4':
                return $this->saveSection4($request);
            case 'section-5':
                return $this->saveSection5($request);
            case 'section-6':
                return $this->saveSection6($request);
            case 'section-7':
                return $this->saveSection7($request);
            case 'section-8':
                return $this->saveSection8($request);
            case 'section-9':
                return $this->saveSection9($request);
            case 'section-10':
                return $this->saveSection10($request);
            case 'section-11':
                return $this->saveSection11($request);
            default:
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid section specified.',
                ], 400);;
        }
    }

    // Section 1 Slider 
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
        $existing = DB::table('home2')
            ->where('section_name', $section)
            ->where('content_key', $contentKey)
            ->first();

        $imagePath = $existing->image ?? null;
        // $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName(); // or use Str::random()
            $destinationPath = public_path('uploads/home2');

            // Ensure the directory exists 
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            // $imagePath = 'uploads/home2/' . $filename; // Save relative path
            $imagePath =  $filename; // Save relative path
        }

        try {
            DB::table('home2')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey
                ],
                [
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

    // Section 2 - Industries 
    // section 2
    protected function saveSectionTwo(Request $request)
    {
        $section = $request->input('section_name');
        $contentKey = $request->input('content_key') ?? 'services';

        // Validate the form    
        $validator = Validator::make($request->all(), [
            'title1' => 'required|string|max:255',
            'heading' => 'nullable|string|max:255',
            'shortDesc' => 'nullable|string|max:255',
            'title.*' => 'nullable|string|max:255',
            'sm_desc.*' => 'nullable|string|max:100',
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
            'shortDesc' => $request->input('shortDesc'),
        ];

        // Check for previous content to retain old image if not replaced
        $existing = DB::table('home2')
            ->where('section_name', $section)
            ->where('content_key', $contentKey)
            ->first();

        $existingServices = [];
        if ($existing) {
            $decoded = json_decode($existing->content_value, true);
            $existingServices = $decoded['services'] ?? [];
        }

        // print_r($request->input('sm_desc'));

        // Array fields
        $serviceTitles = $request->input('title', []);
        $sm_desc = $request->input('sm_desc', []);
        $buttonUrls = $request->input('button_url', []);
        $images = $request->file('image', []);


        $services = [];
        for ($i = 0; $i < count($serviceTitles); $i++) {
            $title = $serviceTitles[$i] ?? null;
            $sm_descData = $sm_desc[$i] ?? null;
            $url = $buttonUrls[$i] ?? null;
            $existingImage = $existingServices[$i]['image'] ?? null;
            $newImagePath = $existingImage;

            if (!empty($images[$i])) {
                $file = $images[$i];
                $filename = time() . '_' . $file->getClientOriginalName();
                $destinationPath = public_path('uploads/home2');

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $file->move($destinationPath, $filename);
                $newImagePath = $filename;
            }

            $services[] = [
                'title' => $title,
                'sm_desc' => $sm_descData,
                'button_url' => $url,
                'image' => $newImagePath,
            ];
        }

        try {
            DB::table('home2')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey,
                ],
                [
                    'content_value' => json_encode([
                        'title' => $static['title1'],
                        'heading' => $static['heading'],
                        'shortDesc' => $static['shortDesc'],
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

    // section 3 services   
    protected function saveSection3(Request $request)
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
            DB::table('home2')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey,
                ],
                [
                    'content_value' => json_encode([
                        'title' => $request->input('title'),
                        'smTitle' => $request->input('smTitle'),
                    ]),
                    'active' =>  $active,
                    'updated_at' => now(),
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section 3 data saved successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        }
    }
    // end the section 3 

    //section 4  
    protected function saveSection4(Request $request)
    {
        $section = $request->input('section_name');
        $contentKey = $request->input('content_key');

        // Validate input 
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'points_title.*' => 'nullable|string|max:255',
            'points_desc.*' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5000', // optional
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        // Get previous image (if any)
        $existing = DB::table('home2')
            ->where('section_name', $section)
            ->where('content_key', $contentKey)
            ->first();

        $imagePath = $existing->image ?? null;
        // $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName(); // or use Str::random()
            $destinationPath = public_path('uploads/home2');

            // Ensure the directory exists 
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            // $imagePath = 'uploads/home2/' . $filename; // Save relative path
            $imagePath =  $filename; // Save relative path
        }

        $active = $request->has('active') ? 1 : 0;

        // echo "<pre>";
        // print_r($request->all());
        // die;

        try {
            DB::table('home2')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey
                ],
                [
                    'content_value' => json_encode([
                        'title' => $request->input('title'),
                        'points_title' => $request->input('points_title'),
                        'points_desc' => $request->input('points_desc'),
                    ]),
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
    // end section 4  

    // section 5 
    protected function saveSection5(Request $request)
    {
        $section = $request->input('section_name');
        $contentKey = $request->input('content_key');

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'short_desc' => 'required|string|max:500',
            'heading' => 'nullable|string|max:255',
            'small_heading' => 'nullable|string|max:255',
            'youtube' => 'nullable|url',
            'service_1' => 'nullable|string|max:100',
            'service_1_per' => 'nullable|numeric|max:100',
            'service_2' => 'nullable|string|max:100',
            'service_2_per' => 'nullable|numeric|max:100',
            'cardTitle.*' => 'nullable|string|max:255',
            'cardDesc.*' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        // Get previous content
        $existing = DB::table('home2')
            ->where('section_name', $section)
            ->where('content_key', $contentKey)
            ->first();

        $oldImages = [];
        if ($existing && $existing->content_value) {
            $decoded = json_decode($existing->content_value, true);
            $oldImages = $decoded['images'] ?? [];
        }

        $image = $request->file('image');
        $filename = null;

        if ($image) {
            $filename = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('uploads/home2');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $image->move($destinationPath, $filename);
        } else {
            // Preserve old image if no new image uploaded
            $filename = $oldImages[0] ?? null;
        }

        $cards = [];
        $titles = $request->input('cardTitle', []);
        $descs = $request->input('cardDesc', []);

        foreach ($titles as $i => $title) {
            $cards[] = [
                'title' => $title,
                'desc' => $descs[$i] ?? ''
            ];
        }

        $data = [
            'heading' => $request->input('heading'),
            'small_heading' => $request->input('small_heading'),
            'title' => $request->input('title'),
            'youtube' => $request->input('youtube'),
            'short_desc' => $request->input('short_desc'),
            'about' => [
                'service_1' => [
                    'name' => $request->input('service_1'),
                    'percent' => $request->input('service_1_per')
                ],
                'service_2' => [
                    'name' => $request->input('service_2'),
                    'percent' => $request->input('service_2_per')
                ]
            ],
            'images' => [$filename],
            'cards' => $cards
        ];

        $active = $request->has('active') ? true : 0;


        try {
            DB::table('home2')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey
                ],
                [
                    'content_value' => json_encode($data),
                    'active' => $active,
                    'updated_at' => now(),
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section 5 (Experience Cases) saved successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        }
    }

    // section 6 
    protected function saveSection6(Request $request)
    {
        try {
            // Validate request
            $validator = Validator::make($request->all(), [
                'selected_team_members' => 'array',
                'selected_team_members.*' => 'exists:team,id',
                'section_name' => 'required|string',
                'content_key' => 'required|string',
                'title' => 'required|string',
                'short_title' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed.',
                    'errors' => $validator->errors()
                ], 422);
            }

            $teamIds = $request->input('selected_team_members', []);

            // Prepare data to save (only IDs and titles)
            $data = [
                'selected_ids' => $teamIds,
                'title' => $request->input('title'),
                'short_title' => $request->input('short_title'),
            ];

            $active = $request->has('active') ? true : 0;

            DB::table('home2')->updateOrInsert(
                [
                    'section_name' => $request->input('section_name'),
                    'content_key' => $request->input('content_key')
                ],
                [
                    'content_value' => json_encode($data),
                    'active' =>  $active,
                    'updated_at' => now()
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Selected team members saved successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong while saving data.',
                'error_detail' => $e->getMessage()
            ], 500);
        }
    }

    protected function saveSection7(Request $request)
    {
        try {
            // Validate request
            $validator = Validator::make($request->all(), [
                'section_name' => 'required|string',
                'content_key' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed.',
                    'errors' => $validator->errors(),
                ], 422);
            }

            // Extract data
            $section = $request->input('section_name');
            $contentKey = $request->input('content_key');
            $active = $request->has('active') ? 1 : 0;



            // Save to DB
            DB::table('home2')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey
                ],
                [
                    'active' => $active,
                    'updated_at' => now()
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section 7 (Testimonials) saved successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while saving Section 7.',
                'error_detail' => $e->getMessage(),
            ], 500);
        }
    }

    // section 8 
    protected function saveSection8(Request $request)
    {
        try {
            // Validate request
            $validator = Validator::make($request->all(), [
                'section_name' => 'required|string',
                'content_key' => 'required|string',
                'title' => 'required|string',
                'smTitle' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed.',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Prepare data to save (only IDs and titles) 
            $data = [
                'title' => $request->input('title'),
                'smTitle' => $request->input('smTitle'),
            ];

            $active = $request->has('active') ? true : 0;

            DB::table('home2')->updateOrInsert(
                [
                    'section_name' => $request->input('section_name'),
                    'content_key' => $request->input('content_key')
                ],
                [
                    'content_value' => json_encode($data),
                    'active' =>  $active,
                    'updated_at' => now()
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Selected team members saved successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong while saving data.',
                'error_detail' => $e->getMessage()
            ], 500);
        }
    }

    // section 9 - partners 
    protected function saveSection9(Request $request)
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
        $existing = DB::table('home2')
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
                $destinationPath = public_path('uploads/home2');

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
            DB::table('home2')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey
                ],
                [
                    'title' => $request->input('title'),
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

    // section 10
    protected function saveSection10(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'section_name' => 'required|string',
                'content_key' => 'required|string',
                'card_title.*' => 'nullable|string|max:255',
                'card_image.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'title' => 'nullable|string|max:255',
                'icon_title' => 'nullable|string|max:255',
                'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'description1' => 'nullable|string|max:1000',
                'description2' => 'nullable|string|max:1000',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed.',
                    'errors' => $validator->errors()
                ], 422);
            }

            $section = $request->input('section_name');
            $contentKey = $request->input('content_key');

            // Get existing data from DB to preserve old images/icons
            $existing = DB::table('home2')
                ->where('section_name', $section)
                ->where('content_key', $contentKey)
                ->first();

            $oldContent = $existing ? json_decode($existing->content_value, true) : [];

            // Handle card images (preserve existing if no new upload)
            $cardTitles = $request->input('card_title', []);
            $cardImages = $request->file('card_image', []);
            $cards = [];

            foreach ($cardTitles as $index => $title) {
                $filename = $oldContent['cards'][$index]['image'] ?? null;

                if (!empty($cardImages[$index])) {
                    $file = $cardImages[$index];
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/home2'), $filename);
                }

                $cards[] = [
                    'title' => $title,
                    'image' => $filename
                ];
            }

            // Handle icon (preserve existing if no new upload)
            $iconFilename = $oldContent['icon'] ?? null;
            if ($request->hasFile('icon')) {
                $iconFile = $request->file('icon');
                $iconFilename = time() . '_icon_' . $iconFile->getClientOriginalName();
                $iconFile->move(public_path('uploads/home2'), $iconFilename);
            }

            // Build content array
            $data = [
                'active' => $request->input('active') === 'true' ? 1 : 0,
                'cards' => $cards,
                'title' => $request->input('title'),
                'icon' => $iconFilename,
                'icon_title' => $request->input('icon_title'),
                'description1' => $request->input('description1'),
                'description2' => $request->input('description2'),
            ];

            DB::table('home2')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey
                ],
                [
                    'content_value' => json_encode($data),
                    'updated_at' => now()
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section 10 content saved successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while saving Section 10.',
                'error_detail' => $e->getMessage()
            ], 500);
        }
    }

    protected function saveSection11(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'section_name' => 'required|string',
                'content_key' => 'required|string',
                'title1' => 'nullable|string|max:255',
                'title2' => 'nullable|string|max:255',
                'bg_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
                // 'button_name1' => 'nullable|string|max:255',
                'button_url1' => 'nullable|url|max:500',
                // 'button_name2' => 'nullable|string|max:255',
                'button_url2' => 'nullable|url|max:500',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed.',
                    'errors' => $validator->errors()
                ], 422);
            }

            $section = $request->input('section_name');
            $contentKey = $request->input('content_key');

            // Retrieve old data to preserve image if not re-uploaded
            $existing = DB::table('home2')
                ->where('section_name', $section)
                ->where('content_key', $contentKey)
                ->first();

            $oldContent = $existing ? json_decode($existing->content_value, true) : [];
            $bgImage = $oldContent['bg_image'] ?? null;

            if ($request->hasFile('bg_image')) {
                $file = $request->file('bg_image');
                $bgImage = time() . '_bg_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/home2'), $bgImage);
            }

            $data = [
                'active' => $request->input('active') === 'true' ? 1 : 0,
                'title1' => $request->input('title1'),
                'title2' => $request->input('title2'),
                'bg_image' => $bgImage,
                'button_1' => $request->input('button_url1'),
                'button_2' => $request->input('button_url2')
            ];

            DB::table('home2')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey
                ],
                [
                    'content_value' => json_encode($data),
                    'updated_at' => now()
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section 11 (Contact Section) saved successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while saving Section 11.',
                'error_detail' => $e->getMessage()
            ], 500);
        }
    }
}
