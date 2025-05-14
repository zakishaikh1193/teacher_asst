<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\SEO;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class FrontEndController extends Controller
{
    //
    public function home1()
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
        $section5 = DB::table('cases')->select('id', 'title', 'client', 'date', 'listing_image', 'slug', 'icon')->orderBy('id', 'desc')->where('status', 'published')->take(3)->get();
        $section5C = DB::table('home1')
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

        $testimonials = Testimonial::oldest()->get();

        $section4about = DB::table('about')->where('section', 'section-4')->first();

        // section10   
        $section10 = DB::table('home1')
            ->where('section_name', 'section-10')
            ->where('content_key', 'section10')
            ->first();

        $section3contact = DB::table('contacts')->where('section', 'section-3')->get()->first();

        // section12  
        $section12 = DB::table('home1')
            ->where('section_name', 'section-12')
            ->where('content_key', 'section12')
            ->first();


        $section12Blogs = DB::table('blogs')->join('blogs_categories', 'blogs.category_id', '=', 'blogs_categories.id')
            ->select(
                'blogs.id',
                'blogs.title',
                'blogs.slug',
                'blogs.listing_image',
                'blogs.category_id',
                'blogs.meta_description',
                'blogs.created_at',
                'blogs.updated_at',
                'blogs_categories.name as category_name'
            )->where('status', 'published')->orderBy('blogs.id', 'desc')->take(3)->get();

        // section13   
        $section13 = DB::table('home1')
            ->where('section_name', 'section-13')
            ->where('content_key', 'section13')
            ->first();

        $data = [
            'header' => 1,
            'seo' => $seo,

            'slider1content' => $slider1content,
            'slider1image' => $slider1image,
            'slider2content' => $slider2content,
            'slider2image' => $slider2image,

            'section2' => $section2content,
            'section3' => $section3,
            'section4' => $section4,
            'section5' => $section5, // cases     
            'section5C' => $section5C, // cases       
            'section6' => $section6,
            'section7' => $section7,
            'section8' => $section8,
            'testimonials' => $testimonials,

            'section4about' => $section4about,

            'section10' => $section10,
            'section3contact' => $section3contact,

            'section12' => $section12,
            'section12Blogs' => $section12Blogs,

            'section13' => $section13,
        ];

        // echo "<pre>";
        // print_r($data);
        // die; 
        // , ['seo' => $seoData, 'data' => $data] 
        return view('frontend/home-1', $data);
    }

    public function home2()
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

        $latestServices = DB::table('services')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get(['heading', 'url', 'image', 'description1']);

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
        // $testimonials7 = DB::table('faq')->where('section', 'section-2-testimonial')->get()->first();
        $testimonials7 = DB::table('testimonials')->orderBy('created_at', 'desc')->get();

        $section8 = DB::table('home2')
            ->where('section_name', 'section-8')
            ->where('content_key', 'blogs')
            ->first();

        $section8blogs = DB::table('blogs')
            ->select('listing_image', 'slug', 'title', 'content', 'id', 'meta_title', 'meta_description', 'created_at')
            ->where('status', 'published')
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        $section9 = DB::table('home2')
            ->where('section_name', 'section-9')
            ->where('content_key', 'partners')
            ->first();

        // $teamMembers = DB::table('team')->orderBy('name')->get();
        $teamMembers = DB::table('team')->orderBy('id', 'asc')->get();

        $section10 = DB::table('home2')
            ->where('section_name', 'section-10')
            ->where('content_key', 'createValues')
            ->first();

        $section11 = DB::table('home2')
            ->where('section_name', 'section-11')
            ->where('content_key', 'sectionContact')
            ->first();

        $data = [
            'header'  => 2,
            'seo' => $seo,
            'section1S1' => $section1S1,
            'section1S2' => $section1S2,
            'section2' => $section2,

            'section3' => $section3,
            'latestServices' => $latestServices,

            'section4' => $section4,
            'section5' => $section5,

            'section6' => $section6,
            'section7' => $section7,
            'testimonials7' => $testimonials7,

            'teamMembers' => $teamMembers,

            'section8' => $section8,
            'section8blogs' => $section8blogs,

            'section9' => $section9,
            'section10' => $section10,
            'section11' => $section11,
        ];

        return view('frontend/home-2', $data);
    }

    public function home3()
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

        $section9blogs = DB::table('blogs')
            ->select('listing_image', 'slug', 'title', 'content', 'id', 'meta_title', 'meta_description', 'created_at')
            ->where('status', 'published')
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        $section10 = DB::table('home3')
            ->where('section_name', 'section-10')
            ->where('content_key', 'partners10')
            ->first();

        $data = [
            'header' => 3,
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
            'section9blogs' => $section9blogs,
            'section10' => $section10,
        ];
        // echo "<pre>";
        // print_r($section2);
        // die;

        return view('frontend/home-3')->with($data);
    }

    public function servicesByCategory($slug)
    {
        // Fetch the category by slug
        $category = DB::table('service_categories')->where('slug', $slug)->first();

        // Fetch services based on the selected category or all services if no category is selected
        $servicesListing = DB::table('services')
            ->when($category, function ($query) use ($category) {
                return $query->where('category_id', $category->id); // Filter by category ID
            })
            ->select('id', 'seo', 'url', 'heading', 'image', 'description1')
            ->get();

        // SEO metadata
        $seoData = [
            'title'         => 'Services - My Website',
            'description'   => 'Explore the various services we offer.',
            'keywords'      => 'services, offerings, categories',
        ];

        // Data to pass to the view
        $data = [
            'header' => 1,
            'servicesListing' => $servicesListing,
            'category' => $category,
        ];

        // echo "<pre>"; 
        // print_r($category->title); 
        // die; 

        return view('frontend.services-1', $data);
    }

    public function services1()
    {
        $servicesListing = DB::table('services')->select('id', 'seo', 'url', 'heading', 'image', 'description1')->get();

        // SEO metadata
        $seoData = [
            'title'         => 'Home Page - My Website',
            'description'   => 'This is the home page of my website, where you can find great content.',
            'keywords'      => 'home, my website, content',
        ];
        $data = [
            'header'         => 1,
        ];
        return view('frontend/services-1', ['servicesListing' => $servicesListing]);
    }

    public function services2()
    {
        // Fetch all categories from the database
        $categories = DB::table('service_categories')->orderBy('title')->get();

        $section2 = DB::table('about')->where('section', 'section-2')->first();
        // Pass categories to the view
        return view('frontend.services-2', compact('categories', 'section2'));
    }

    // servicesDetail 
    public function servicesDetail($url)
    {
        // Fetch service details by URL
        $serviceDetail = DB::table('services')->where('url', $url)->first();

        if (!$serviceDetail) {
            abort(404); // Show 404 if service not found
        }

        return view('frontend.services-detail', compact('serviceDetail'));
    }

    public function about()
    {
        $seo = SEO::where('page_name', 'about')->first();
        $section1 = DB::table('about')->where('section', 'section-1')->first(); // Fetch a single section
        $section2 = DB::table('about')->where('section', 'section-2')->first();

        $section3 = DB::table('about')->where('section', 'section-3')->first();
        $testimonials = Testimonial::oldest()->get();

        $section4 = DB::table('about')->where('section', 'section-4')->first();

        $section5 = DB::table('about')->where('section', 'section-5')->first();
        $teams = DB::table('team')->get()->toArray();

        $section6 = DB::table('about')->where('section', 'section-6')->first();

        $data = [
            'header' => 1,
            'seo' => $seo,
            'section1' => $section1,
            'section2' => $section2,
            'section3' => $section3,
            'testimonials' => $testimonials,

            'section4' => $section4,
            'section5' => $section5,
            'teams' => $teams,
            'section6' => $section6,
        ];

        return view('frontend/about')->with($data);
    }

    public function team()
    {
        $seo = SEO::where('page_name', 'team')->first();
        $teams = DB::table('team')->get()->toArray();
        $section3 = DB::table('faq')->where('section', 'section-2-team')->get()->first();

        $data = [
            'header' => 1,
            'seo' => $seo,
            'teams' => $teams,
            'section3' => $section3,
        ];

        return view('frontend/team')->with($data);
    }

    public function testimonials()
    {
        // $testimonials = Testimonial::latest()->get();
        $testimonials = Testimonial::oldest()->get();

        $seo = SEO::where('page_name', 'testimonials')->first();
        $section3 = DB::table('faq')->where('section', 'section-2-testimonial')->get()->first();

        $data = [
            'header' => 1,
            'seo' => $seo,
            'testimonials' => $testimonials,
            'section3' => $section3,
        ];

        return view('frontend/testimonials')->with($data);
    }

    public function faq()
    {
        $seo = SEO::where('page_name', 'faqs')->first();
        $section1 = DB::table('faq')->where('section', 'section-1')->get()->first();
        $section2 = DB::table('faq')->where('section', 'section-2')->get()->first();
        $section3 = DB::table('faq')->where('section', 'section-3')->get()->first();

        $data = [
            'header' => 1,
            'seo' => $seo,
            'section1' => $section1,
            'section2' => $section2,
            'section3' => $section3,
        ];

        return view('frontend/faq')->with($data);
    }

    public function blogs()
    {
        // SEO metadata
        $seoData = [
            'title'         => 'Home Page - My Website',
            'description'   => 'This is the home page of my website, where you can find great content.',
            'keywords'      => 'home, my website, content',
        ];

        $data = [
            'header'         => 1,
            'seo' => $seoData,

        ];
        return view('frontend/blog')->with($data);
    }


    // blog
    public function frontendBlogs(Request $request)
    {
        $perPage = 6;
        $page = $request->input('page', 1);
        $offset = ($page - 1) * $perPage;

        $query = DB::table('blogs')
            ->join('blogs_categories', 'blogs.category_id', '=', 'blogs_categories.id')
            ->select('blogs.*', 'blogs_categories.name as category_name')
            ->where('status', 'published')
            ->orderBy('created_at', 'desc');

        $total = $query->count();

        $blogs = $query->offset($offset)->limit($perPage)->get();

        $html = '';

        foreach ($blogs as $blog) {
            $blog->tags = json_decode($blog->tags ?? '[]');
            $html .= view('frontend.partials.blogCard', compact('blog'))->render();
        }

        return response()->json([
            'html' => $html,
            'hasMore' => ($offset + $perPage) < $total,
        ]);
    }

    // blog
    public function blogDetail($slug)
    {
        $blog = DB::table('blogs')
            ->join('blogs_categories', 'blogs.category_id', '=', 'blogs_categories.id')
            ->select('blogs.*', 'blogs_categories.name as category_name')
            ->where('blogs.slug', $slug)
            ->where('blogs.status', 'published')
            ->first();

        if (!$blog) {
            abort(404);
        }

        $blog->tags = json_decode($blog->tags ?? '[]');

        $latestPosts = DB::table('blogs')
            ->join('blogs_categories', 'blogs.category_id', '=', 'blogs_categories.id')
            ->select('blogs.id', 'blogs.title', 'blogs.slug', 'blogs.featured_image', 'blogs_categories.name as category_name')
            ->where('blogs.status', 'published')
            ->where('blogs.slug', '!=', $slug)
            ->orderBy('blogs.created_at', 'desc')
            ->limit(3)
            ->get();

        $categories = DB::table('blogs_categories')->get();

        // Fetch tags from all published blogs
        $allTagsRaw = DB::table('blogs')
            ->where('status', 'published')
            ->pluck('tags'); // returns a collection of JSON strings
        $allTags = collect();

        foreach ($allTagsRaw as $tagJson) {
            $decoded = json_decode($tagJson, true);
            if (is_array($decoded)) {
                $allTags = $allTags->merge($decoded);
            }
        }

        $uniqueTags = $allTags->unique()->take(6)->values();
        // Fetch tags end from all published blogs

        return view('frontend.blog-details', [
            'blog' => $blog,
            'latestPosts' => $latestPosts,
            'categories' => $categories,
            'tags' => $uniqueTags,
            'seo' => [
                'title' => $blog->meta_title ?? $blog->title,
                'description' => $blog->meta_description ?? '',
                'keywords' => $blog->meta_keywords ?? '',
            ]
        ]);
    }

    // blog 
    public function blogsByCategory(Request $request, $id)
    {
        $category = DB::table('blogs_categories')->where('id', $id)->first();
        if (!$category) abort(404);

        $blogs = DB::table('blogs')
            ->join('blogs_categories', 'blogs.category_id', '=', 'blogs_categories.id')
            ->select('blogs.*', 'blogs_categories.name as category_name')
            ->where('blogs.status', 'published')
            ->where('blogs.category_id', $id)
            ->orderBy('blogs.created_at', 'desc')
            ->paginate(3); // Adjust page size

        if ($request->ajax()) {
            $html = '';
            foreach ($blogs as $blog) {
                $html .= view('frontend.partials.blog-card2', compact('blog'))->render();
            }
            return response()->json(['html' => $html, 'nextPage' => $blogs->nextPageUrl()]);
        }

        $latestPosts = DB::table('blogs')
            ->join('blogs_categories', 'blogs.category_id', '=', 'blogs_categories.id')
            ->select(
                'blogs.id',
                'blogs.title',
                'blogs.slug',
                'blogs.featured_image',
                'blogs.created_at',
                'blogs_categories.name as '
            )
            ->where('blogs.status', 'published')
            ->orderBy('blogs.created_at', 'desc')
            ->limit(3)
            ->get();

        $categories = DB::table('blogs_categories')->get();

        // Fetch tags from all published blogs
        $allTagsRaw = DB::table('blogs')
            ->where('status', 'published')
            ->pluck('tags'); // returns a collection of JSON strings
        $allTags = collect();

        foreach ($allTagsRaw as $tagJson) {
            $decoded = json_decode($tagJson, true);
            if (is_array($decoded)) {
                $allTags = $allTags->merge($decoded);
            }
        }

        $uniqueTags = $allTags->unique()->take(6)->values();
        // Fetch tags end from all published blogs


        return view('frontend.blog-sidebar', [
            'blogs' => $blogs,
            'sidebarTitle' => $category->name,
            'latestPosts' => $latestPosts,
            'categories' => $categories,
            'tags' => $uniqueTags,
            'activeCategory' => $id,
            'selectedTag' => null
        ]);
    }

    // blog
    public function blogsByTag(Request $request, $tag)
    {
        // Convert slug to normal string (dash to space, capitalize words)
        $readableTag = Str::of($tag)->replace('-', ' ')->title();

        $blogs = DB::table('blogs')
            ->join('blogs_categories', 'blogs.category_id', '=', 'blogs_categories.id')
            ->select('blogs.*', 'blogs_categories.name as category_name')
            ->where('blogs.status', 'published')
            ->whereJsonContains('blogs.tags', $readableTag)
            ->orderBy('blogs.created_at', 'desc')
            ->paginate(3); // Use pagination here

        if ($request->ajax()) {
            $html = '';
            foreach ($blogs as $blog) {
                $html .= view('frontend.partials.blog-card2', compact('blog'))->render();
            }
            return response()->json(['html' => $html, 'nextPage' => $blogs->nextPageUrl()]);
        }

        $latestPosts = DB::table('blogs')
            ->where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $categories = DB::table('blogs_categories')->get();

        // Fetch tags from all published blogs
        $allTagsRaw = DB::table('blogs')
            ->where('status', 'published')
            ->pluck('tags'); // returns a collection of JSON strings
        $allTags = collect();

        foreach ($allTagsRaw as $tagJson) {
            $decoded = json_decode($tagJson, true);
            if (is_array($decoded)) {
                $allTags = $allTags->merge($decoded);
            }
        }
        $uniqueTags = $allTags->unique()->take(6)->values();
        // Fetch tags end from all published blogs

        return view('frontend.blog-sidebar', [
            'blogs' => $blogs,
            'sidebarTitle' => $readableTag, 
            'latestPosts' => $latestPosts,
            'tags' => $uniqueTags,
            'categories' => $categories,
            'activeCategory' => null,
            'selectedTag' => $tag
        ]);
    }

    // blog
    public function blogSearch(Request $request)
    {
        $query = $request->input('query');

        $blogs = DB::table('blogs')
            ->join('blogs_categories', 'blogs.category_id', '=', 'blogs_categories.id')
            ->select('blogs.*', 'blogs_categories.name as category_name')
            ->where('blogs.status', 'published')
            ->where(function ($q) use ($query) {
                $q->where('blogs.title', 'like', "%$query%")
                    ->orWhere('blogs.content', 'like', "%$query%")
                    ->orWhere('blogs.meta_description', 'like', "%$query%");
            })
            ->orderBy('blogs.created_at', 'desc')
            ->paginate(3); // or 6 based on your design 

        // 🔄 Handle AJAX for Load More
        if ($request->ajax()) {
            $html = '';
            foreach ($blogs as $blog) {
                $html .= view('frontend.partials.blog-card2', compact('blog'))->render();
            }

            return response()->json([
                'html' => $html,
                'nextPage' => $blogs->nextPageUrl()
                    ? $blogs->nextPageUrl() . '&query=' . urlencode($query)
                    : null
            ]);
        }

        // 📰 Standard non-AJAX page load
        $latestPosts = DB::table('blogs')
            ->join('blogs_categories', 'blogs.category_id', '=', 'blogs_categories.id')
            ->select('blogs.id', 'blogs.title', 'blogs.slug', 'blogs.featured_image', 'blogs_categories.name as category_name')
            ->where('blogs.status', 'published')
            ->orderBy('blogs.created_at', 'desc')
            ->limit(3)
            ->get();

        $categories = DB::table('blogs_categories')->get();

        // 🔖 Get 6 unique tags
        $allTagsRaw = DB::table('blogs')->where('status', 'published')->pluck('tags');
        $allTags = collect();
        foreach ($allTagsRaw as $tagJson) {
            $decoded = json_decode($tagJson, true);
            if (is_array($decoded)) {
                $allTags = $allTags->merge($decoded);
            }
        }
        $uniqueTags = $allTags->unique()->take(6)->values();

        return view('frontend.blog-sidebar', [
            'blogs' => $blogs,
            'sidebarTitle' => 'Search Results for: ' . $query,
            'latestPosts' => $latestPosts,
            'categories' => $categories,
            'tags' => $uniqueTags,
            'searchQuery' => $query,
        ]);
    }


    // public function cases()
    // {
    //     // SEO metadata
    //     $seoData = [
    //         'title'         => 'Home Page - My Website',
    //         'description'   => 'This is the home page of my website, where you can find great content.',
    //         'keywords'      => 'home, my website, content',
    //     ];
    //     $data = [
    //         'header'         => 1,
    //     ];
    //     return view('frontend/cases'); 
    // }

    // cases   
    public function cases(Request $request)
    {
        $cases = DB::table('cases')
            ->where('status', 'published')
            ->orderBy('date', 'desc')
            ->paginate(6); // Adjust as needed

        if ($request->ajax()) {
            $html = '';
            foreach ($cases as $case) {
                $html .= view('frontend.partials.case-card', compact('case'))->render();
            }
            return response()->json([
                'html' => $html,
                'nextPage' => $cases->nextPageUrl()
            ]);
        }

        return view('frontend.cases', compact('cases'));
    }


    // public function casesDetails()
    // {
    //     // SEO metadata
    //     $seoData = [
    //         'title'         => 'Home Page - My Website',
    //         'description'   => 'This is the home page of my website, where you can find great content.',
    //         'keywords'      => 'home, my website, content',
    //     ];
    //     $data = [
    //         'header'         => 1,
    //     ];
    //     return view('frontend/cases-details');
    // }

    public function casesDetail($slug)
    {
        $case = DB::table('cases')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->first();

        if (!$case) {
            abort(404);
        }

        // Get category names for this case
        $categoryNames = DB::table('case_category_map')
            ->join('cases_categories', 'case_category_map.category_id', '=', 'cases_categories.id')
            ->where('case_category_map.case_id', $case->id)
            ->pluck('cases_categories.name')
            ->toArray();

        $case->categories = $categoryNames;

        // Get 3 more random published cases, excluding current one
        $moreCases = DB::table('cases')
            ->where('status', 'published')
            ->where('id', '!=', $case->id)
            ->orderBy(DB::raw('RAND()'))
            ->limit(3)
            ->get();

        return view('frontend.cases-details', compact('case', 'moreCases'));
    }



    public function contact()
    {
        $seo = SEO::where('page_name', 'contact')->first();
        $section1 = DB::table('contacts')->where('section', 'section-1')->get()->first();
        $section2 = DB::table('contacts')->where('section', 'section-2')->get()->first();
        $section3 = DB::table('contacts')->where('section', 'section-3')->get()->first();

        $data = [
            'header' => 1,
            'seo' => $seo,
            'section1' => $section1,
            'section2' => $section2,
            'section3' => $section3,
        ];
        return view('frontend/contact')->with($data);
    }
}
