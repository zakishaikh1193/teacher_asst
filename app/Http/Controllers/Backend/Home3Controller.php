<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SEO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Home3Controller extends Controller
{
    public function index()
    {
        $seo = SEO::where('page_name', 'home-3')->first();

        $section1S1 = DB::table('home3')
            ->where('section_name', 'section-1')
            ->where('content_key', 'slider-1')
            ->first();

        $section1S2 = DB::table('home3')
            ->where('section_name', 'section-1')
            ->where('content_key', 'slider-2')
            ->first();

        $section2 = DB::table('home3')
            ->where('section_name', 'section-2')
            ->where('content_key', 'S2Services')
            ->first();

        $section3 = DB::table('home3')
            ->where('section_name', 'section-3')
            ->where('content_key', 'section3')
            ->first();

        $section4 = DB::table('home3')
            ->where('section_name', 'section-4')
            ->where('content_key', 'Services4offer')
            ->first();

        $section5 = DB::table('home3')
            ->where('section_name', 'section-5')
            ->where('content_key', 'section5')
            ->first();

        $section6 = DB::table('home3')
            ->where('section_name', 'section-6')
            ->where('content_key', 'financialGoals')
            ->first();

        $section7 = DB::table('home3')
            ->where('section_name', 'section-7')
            ->where('content_key', 'section7')
            ->first();

        $section8 = DB::table('home3')
            ->where('section_name', 'section-8')
            ->where('content_key', 'sectionContact')
            ->first();

        $section9 = DB::table('home3')
            ->where('section_name', 'section-9')
            ->where('content_key', 'blogs9')
            ->first();

        $section10 = DB::table('home3')
            ->where('section_name', 'section-10')
            ->where('content_key', 'partners10')
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
            'section8' => $section8,
            'section9' => $section9,
            'section10' => $section10,
        ];

        // echo "<pre>"; 
        // print_r($data);   
        // die; 
        return view('backend.home.home_3', $data);
    }

    // handle the section here
    public function handleSection(Request $request)
    {
        $section = $request->section_name;

        switch ($section) {
            case 'section-1':
                return $this->saveSectionOne($request);
            case 'section-2':
                return $this->saveSection2($request);
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
        $existing = DB::table('home3')
            ->where('section_name', $section)
            ->where('content_key', $contentKey)
            ->first();

        $imagePath = $existing->image ?? null;
        // $imagePath = null; 
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName(); // or use Str::random() 
            $destinationPath = public_path('uploads/home3');

            // Ensure the directory exists 
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            // $imagePath = 'uploads/home3/' . $filename; // Save relative path
            $imagePath =  $filename; // Save relative path
        }

        try {
            DB::table('home3')->updateOrInsert(
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

    // section 2 services
    protected function saveSection2(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'section_name' => 'required|string',
                'content_key' => 'required|string',
                'title.*' => 'nullable|string|max:255',
                'sm_desc.*' => 'nullable|string|max:500',
                'button_url.*' => 'nullable|url|max:500',
                'image.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'bottom_title' => 'nullable|string|max:255',
                'bottom_title2' => 'nullable|string|max:500',
                'bottom_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
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

            // Get existing content to preserve old images
            $existing = DB::table('home3')
                ->where('section_name', $section)
                ->where('content_key', $contentKey)
                ->first();

            $oldContent = $existing ? json_decode($existing->content_value, true) : [];
            $oldServices = $oldContent['services'] ?? [];

            // Prepare top service cards (3 total)
            $titles = $request->input('title', []);
            $smDescs = $request->input('sm_desc', []);
            $urls = $request->input('button_url', []);
            $images = $request->file('image', []);
            $services = [];

            for ($i = 0; $i < 3; $i++) {
                $imageFile = $images[$i] ?? null;
                $filename = $oldServices[$i]['image'] ?? null;

                if ($imageFile) {
                    $filename = time() . '_s2_' . $imageFile->getClientOriginalName();
                    $imageFile->move(public_path('uploads/home3'), $filename);
                }

                $services[] = [
                    'title' => $titles[$i] ?? '',
                    'sm_desc' => $smDescs[$i] ?? '',
                    'button_url' => $urls[$i] ?? '',
                    'image' => $filename
                ];
            }

            // Handle bottom service block
            $bottomTitle = $request->input('bottom_title');
            $bottomDesc = $request->input('bottom_title2');
            $bottomImgFile = $request->file('bottom_img');

            $bottomImage = $oldServices[3]['image'] ?? null;
            if ($bottomImgFile) {
                $bottomImage = time() . '_s2_bottom_' . $bottomImgFile->getClientOriginalName();
                $bottomImgFile->move(public_path('uploads/home3'), $bottomImage);
            }

            $services[] = [
                'title' => $bottomTitle,
                'sm_desc' => $bottomDesc,
                'image' => $bottomImage
            ];

            $data = [
                'services' => $services
            ];

            $active = $request->has('active') ? 1 : 0;

            DB::table('home3')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey
                ],
                [
                    'active' =>  $active,
                    'content_value' => json_encode($data),
                    'updated_at' => now()
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Home3 Section 2 (Services) saved successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while saving Section 2.',
                'error_detail' => $e->getMessage()
            ], 500);
        }
    }

    // section 3 
    protected function saveSection3(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'section_name' => 'required|string',
                'content_key' => 'required|string',
                'main_heading' => 'nullable|string|max:255',
                'subheading' => 'nullable|string|max:255',
                'category.*' => 'nullable|string|max:255',
                'case_title.*' => 'nullable|string|max:255',
                'case_desc.*' => 'nullable|string|max:1000',
                'icon.*' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
                'card_image.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed.',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $section = $request->input('section_name');
            $contentKey = $request->input('content_key');

            // Get previous data to retain icons/images if not re-uploaded
            $existing = DB::table('home3')
                ->where('section_name', $section)
                ->where('content_key', $contentKey)
                ->first();

            $oldData = $existing ? json_decode($existing->content_value, true) : [];
            $oldCards = $oldData['cards'] ?? [];

            $titles = $request->input('case_title', []);
            $categories = $request->input('category', []);
            $descs = $request->input('case_desc', []);
            $case_url = $request->input('case_url', []);
            $icons = $request->file('icon', []);
            $cardImages = $request->file('card_image', []);

            $cards = [];

            foreach ($titles as $i => $title) {
                $iconName = $oldCards[$i]['icon'] ?? null;
                $cardImgName = $oldCards[$i]['image'] ?? null;

                // Upload icon
                if (!empty($icons[$i])) {
                    $iconFile = $icons[$i];
                    $iconName = time() . '_icon_' . $iconFile->getClientOriginalName();
                    $iconFile->move(public_path('uploads/home3'), $iconName);
                }

                // Upload card image
                if (!empty($cardImages[$i])) {
                    $imgFile = $cardImages[$i];
                    $cardImgName = time() . '_card_' . $imgFile->getClientOriginalName();
                    $imgFile->move(public_path('uploads/home3'), $cardImgName);
                }

                $cards[] = [
                    'category' => $categories[$i] ?? '',
                    'title' => $title,
                    'desc' => $descs[$i] ?? '',
                    'case_url' => $case_url[$i] ?? '',
                    'icon' => $iconName,
                    'image' => $cardImgName,
                ];
            }
            // Set active flag
            $active = $request->has('active') ? 1 : 0;
            $data = [
                'active' => $active,
                'main_heading' => $request->input('main_heading'),
                'subheading' => $request->input('subheading'),
                'cards' => $cards,
            ];


            DB::table('home3')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey,
                ],
                [
                    'content_value' => json_encode($data),
                    'updated_at' => now(),
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section 3 (Case Studies) saved successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error saving Section 3.',
                'error_detail' => $e->getMessage(),
            ], 500);
        }
    }


    // section 4 
    protected function saveSection4(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'section_name' => 'required|string',
                'content_key' => 'required|string',
                'title1' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'shortDesc' => 'nullable|string|max:1000',
                'title.*' => 'nullable|string|max:255',
                'sm_desc.*' => 'nullable|string|max:500',
                'button_url.*' => 'nullable|url|max:500',
                'image.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
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

            // Fetch existing content to preserve images
            $existing = DB::table('home3')
                ->where('section_name', $section)
                ->where('content_key', $contentKey)
                ->first();

            $oldContent = $existing ? json_decode($existing->content_value, true) : [];
            $oldServices = $oldContent['services'] ?? [];

            $titles = $request->input('title', []);
            $descs = $request->input('sm_desc', []);
            $urls = $request->input('button_url', []);
            $images = $request->file('image', []);
            $services = [];

            for ($i = 0; $i < 4; $i++) {
                $imageFile = $images[$i] ?? null;
                $imageName = $oldServices[$i]['image'] ?? null;

                if ($imageFile) {
                    $imageName = time() . "_s4_" . $imageFile->getClientOriginalName();
                    $imageFile->move(public_path('uploads/home3'), $imageName);
                }

                $services[] = [
                    'title' => $titles[$i] ?? '',
                    'sm_desc' => $descs[$i] ?? '',
                    'button_url' => $urls[$i] ?? '',
                    'image' => $imageName,
                ];
            }

            $data = [
                'active' => $request->input('active') === 'true' ? 1 : 0,
                'title1' => $request->input('title1'),
                'heading' => $request->input('heading'),
                'shortDesc' => $request->input('shortDesc'),
                'services' => $services,
            ];

            DB::table('home3')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey,
                ],
                [
                    'content_value' => json_encode($data),
                    'updated_at' => now()
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section 4 (Services We Offer) saved successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while saving Section 4.',
                'error_detail' => $e->getMessage()
            ], 500);
        }
    }

    // section 5  
    protected function saveSection5(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'section_name' => 'required|string',
                'content_key' => 'required|string',
                'title' => 'nullable|string|max:255',
                'button_name' => 'nullable|string|max:255',
                'button_url' => 'nullable|url|max:500',
                'bg_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
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

            // Get existing data to preserve image
            $existing = DB::table('home3')
                ->where('section_name', $section)
                ->where('content_key', $contentKey)
                ->first();

            $oldContent = $existing ? json_decode($existing->content_value, true) : [];
            $bgImage = $oldContent['bg_image'] ?? null;

            // Handle background image
            if ($request->hasFile('bg_image')) {
                $file = $request->file('bg_image');
                $bgImage = time() . '_bg_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/home3'), $bgImage);
            }

            $data = [
                'active' => $request->input('active') === 'true' ? 1 : 0,
                'title' => $request->input('title'),
                'button_name' => $request->input('button_name'),
                'button_url' => $request->input('button_url'),
                'bg_image' => $bgImage,
            ];

            DB::table('home3')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey,
                ],
                [
                    'content_value' => json_encode($data),
                    'updated_at' => now()
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section 5 saved successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while saving Section 5.',
                'error_detail' => $e->getMessage()
            ], 500);
        }
    }

    // section 6  
    protected function saveSection6(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'section_name' => 'required|string',
                'content_key' => 'required|string',
                'title' => 'nullable|string|max:255',
                'shortTitle' => 'nullable|string|max:255',
                'description' => 'nullable|string|max:1000',
                'box_text' => 'nullable|string|max:255',
                'points.*' => 'nullable|string|max:255',
                'card_image.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
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

            // Fetch existing content to preserve old images
            $existing = DB::table('home3')
                ->where('section_name', $section)
                ->where('content_key', $contentKey)
                ->first();

            $oldContent = $existing ? json_decode($existing->content_value, true) : [];

            // Handle card image (only first element)
            $cardImage = $oldContent['card_image'] ?? null;
            $uploadedCard = $request->file('card_image')[0] ?? null;
            if ($uploadedCard) {
                $cardImage = time() . '_card_' . $uploadedCard->getClientOriginalName();
                $uploadedCard->move(public_path('uploads/home3'), $cardImage);
            }

            // Handle icon image
            $iconImage = $oldContent['icon'] ?? null;
            if ($request->hasFile('icon')) {
                $iconFile = $request->file('icon');
                $iconImage = time() . '_icon_' . $iconFile->getClientOriginalName();
                $iconFile->move(public_path('uploads/home3'), $iconImage);
            }

            $data = [
                'active' => $request->input('active') === 'true' ? 1 : 0,
                'title' => $request->input('title'),
                'shortTitle' => $request->input('shortTitle'),
                'description' => $request->input('description'),
                'card_image' => $cardImage,
                'icon' => $iconImage,
                'box_text' => $request->input('box_text'),
                'points' => $request->input('points', [])
            ];

            DB::table('home3')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey,
                ],
                [
                    'content_value' => json_encode($data),
                    'updated_at' => now()
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section 6 (Financial Goals) saved successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while saving Section 6.',
                'error_detail' => $e->getMessage()
            ], 500);
        }
    }

    // section 7
    protected function saveSection7(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'section_name' => 'required|string',
                'content_key' => 'required|string',
                'title' => 'nullable|string|max:255',
                'points_title.*' => 'nullable|string|max:255',
                'points_desc.*' => 'nullable|string|max:1000',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed.',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $section = $request->input('section_name');
            $contentKey = $request->input('content_key');

            // Get old content for image preservation
            $existing = DB::table('home3')
                ->where('section_name', $section)
                ->where('content_key', $contentKey)
                ->first();

            $oldContent = $existing ? json_decode($existing->content_value, true) : [];
            $image = $oldContent['image'] ?? null;

            // Handle image upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $image = time() . '_section6_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/home3'), $image);
            }

            // Build points array
            $titles = $request->input('points_title', []);
            $descs = $request->input('points_desc', []);
            $points = [];

            foreach ($titles as $index => $pointTitle) {
                $points[] = [
                    'title' => $pointTitle,
                    'desc' => $descs[$index] ?? '',
                ];
            }

            // Final data
            $data = [
                'active' => $request->input('active') === 'true' ? 1 : 0,
                'title' => $request->input('title'),
                'points' => $points,
                'image' => $image,
            ];

            DB::table('home3')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey,
                ],
                [
                    'content_value' => json_encode($data),
                    'updated_at' => now(),
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section 7 saved successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while saving Section 6.',
                'error_detail' => $e->getMessage(),
            ], 500);
        }
    }

    // section 8
    protected function saveSection8(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'section_name' => 'required|string',
                'content_key' => 'required|string',
                'title1' => 'nullable|string|max:255',
                'button_name' => 'nullable|string|max:255',
                'button_url' => 'nullable|url|max:500',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed.',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $section = $request->input('section_name');
            $contentKey = $request->input('content_key');

            $data = [
                'active' => $request->input('active') === 'true' ? 1 : 0,
                'title1' => $request->input('title1'),
                'button_name' => $request->input('button_name'),
                'button_url' => $request->input('button_url'),
            ];

            DB::table('home3')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey,
                ],
                [
                    'content_value' => json_encode($data),
                    'updated_at' => now(),
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section 8 (Contact Section) saved successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while saving Section 8.',
                'error_detail' => $e->getMessage(),
            ], 500);
        }
    }

    // section 9 
    protected function saveSection9(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'section_name' => 'required|string',
                'content_key' => 'required|string',
                'title' => 'nullable|string|max:255',
                'smTitle' => 'nullable|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed.',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $section = $request->input('section_name');
            $contentKey = $request->input('content_key');

            $data = [
                'active' => $request->input('active') === 'true' ? 1 : 0,
                'title' => $request->input('title'),
                'smTitle' => $request->input('smTitle'),
            ];

            DB::table('home3')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey,
                ],
                [
                    'content_value' => json_encode($data),
                    'updated_at' => now(),
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section 9 (Blogs) saved successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while saving Section 9.',
                'error_detail' => $e->getMessage(),
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
                'name.*' => 'nullable|string|max:255',
                'url.*' => 'nullable|url|max:500',
                'icon.*' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed.',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $section = $request->input('section_name');
            $contentKey = $request->input('content_key');

            // Fetch previous content to preserve icons
            $existing = DB::table('home3')
                ->where('section_name', $section)
                ->where('content_key', $contentKey)
                ->first();

            $oldContent = $existing ? json_decode($existing->content_value, true) : [];
            $oldPartners = $oldContent['partners'] ?? [];

            $names = $request->input('name', []);
            $urls = $request->input('url', []);
            $icons = $request->file('icon', []);
            $partners = [];

            foreach ($names as $i => $name) {
                $icon = $oldPartners[$i]['icon'] ?? null;

                if (!empty($icons[$i])) {
                    $uploaded = $icons[$i];
                    $icon = time() . '_partner_' . $uploaded->getClientOriginalName();
                    $uploaded->move(public_path('uploads/home3'), $icon);
                }

                $partners[] = [
                    'name' => $name,
                    'url' => $urls[$i] ?? '',
                    'icon' => $icon,
                ];
            }

            $data = [
                'active' => $request->input('active') === 'true' ? 1 : 0,
                'partners' => $partners,
            ];

            DB::table('home3')->updateOrInsert(
                [
                    'section_name' => $section,
                    'content_key' => $contentKey,
                ],
                [
                    'content_value' => json_encode($data),
                    'updated_at' => now(),
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Section 10 (Partners) saved successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while saving Section 10.',
                'error_detail' => $e->getMessage(),
            ], 500);
        }
    }
}
