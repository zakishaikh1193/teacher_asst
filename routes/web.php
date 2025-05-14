<?php

use App\Http\Controllers\Assessment\QuizController;
use App\Http\Controllers\Assessment\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CasesController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FaqsController;
use App\Http\Controllers\Backend\Home2Controller;
use App\Http\Controllers\Backend\Home3Controller;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\ServicesCategoryController;
use App\Http\Controllers\Backend\ServicesController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\FrontEnd\FrontEndController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MediaFileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SEOController;
use App\Http\Controllers\WebsiteContactController;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use function PHPSTORM_META\registerArgumentsSet;

// Route::get('/', function () {
//     return view('welcome');
// }); 

//***************************************************************************************************//
//***************************************** FrontEnd Pages *****************************************//

Route::get('/', [FrontEndController::class, 'home1'])->name('home1');
// Route::get('/home-2', [FrontEndController::class, 'home2'])->name('home2');  
// Route::get('/home-3', [FrontEndController::class, 'home3'])->name('home3');

Route::get('category/{slug}', [FrontEndController::class, 'servicesByCategory'])->name('category.services');
Route::get('/solutions-listing', [FrontEndController::class, 'services1'])->name('services-1'); // services1  /// solutions-listing

Route::get('/solutions', [FrontEndController::class, 'services2'])->name('solutions'); //services-2 

Route::get('/services/{url}', [FrontEndController::class, 'servicesDetail'])->name('services.show');

Route::get('/about', [FrontEndController::class, 'about'])->name('about');
// Route::get('/team', [FrontEndController::class, 'team'])->name('team');    
Route::get('/testimonials', [FrontEndController::class, 'testimonials'])->name('testimonials');
Route::get('/faq', [FrontEndController::class, 'faq'])->name('faq');

Route::get('/blogs', [FrontEndController::class, 'blogs'])->name('blogs.page');  // blog page 
Route::get('/load-blogs', [FrontEndController::class, 'frontendBlogs'])->name('blogs.load'); // blog listing page
Route::get('/blog/{slug}', [FrontEndController::class, 'blogDetail'])->name('blogs.detail'); // blog detail page
Route::get('/blogs/search', [FrontEndController::class, 'blogSearch'])->name('blogs.search'); // blog search
Route::get('/blogs/category/{id}', [FrontEndController::class, 'blogsByCategory'])->name('blogs.byCategory'); // get blog by category
Route::get('/blogs/tag/{tag}', [FrontEndController::class, 'blogsByTag'])->name('blogs.byTag'); // get blog by the tag 

// Route::get('/cases', [FrontEndController::class, 'cases']);
Route::get('/case-studies', [FrontEndController::class, 'cases'])->name('cases.index');

// Route::get('/cases-details', [FrontEndController::class, 'casesDetails']); 
Route::get('/case-studies/{slug}', [FrontEndController::class, 'casesDetail'])->name('cases.detail');

Route::get('/contact', [FrontEndController::class, 'contact'])->name('contact');

Route::post('/website-contact/store', [WebsiteContactController::class, 'store'])->name('website_contact.store');
// Route::post('/send-contact-mail', [MailController::class, 'website_contact.store']);

Route::get('/terms-of-use', function () {
    return view('frontend.terms_of_use');
})->name('terms-of-use');

Route::get('/privacy-polity', function () {
    return view('frontend.privacy_policy');
})->name('privacy-polity');

// event registrations     
Route::post('/submit-registration', [RegistrationController::class, 'submitRegistration'])->name('registration.submit');

//**************************************************************************************************//
//***************************************** BackEnd Pages *****************************************//
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); // dashboard base url

    // Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard/settings', [SettingController::class, 'index'])->name('dashboard.settings.index');
    Route::post('/dashboard/settings', [SettingController::class, 'update'])->name('dashboard.settings.update');
    // }    

    Route::get('/dashboard/home-1', [HomeController::class, 'index'])->name('dashboard.home-1');
    Route::post('/home1/section-handle', [HomeController::class, 'handleSection'])->name('home1.section.handle');

    Route::get('/dashboard/home-2', [Home2Controller::class, 'index'])->name('dashboard.home-2');
    Route::post('/home2/section-handle', [Home2Controller::class, 'handleSection'])->name('home2.section.handle');

    Route::get('/dashboard/home-3', [Home3Controller::class, 'index'])->name('dashboard.home-3');
    Route::post('/home3/section-handle', [Home3Controller::class, 'handleSection'])->name('home3.section.handle');

    Route::prefix('service-categories')->group(function () {
        Route::get('/', [ServicesCategoryController::class, 'index'])->name('service-categories.index');
        Route::get('list', [ServicesCategoryController::class, 'list'])->name('service-categories.list');
        Route::get('create', [ServicesCategoryController::class, 'create'])->name('service-categories.create');
        Route::post('store', [ServicesCategoryController::class, 'store'])->name('service-categories.store');
        Route::get('{id}/edit', [ServicesCategoryController::class, 'edit'])->name('service-categories.edit');
        Route::put('{id}', [ServicesCategoryController::class, 'update'])->name('service-categories.update');
        Route::delete('{id}', [ServicesCategoryController::class, 'destroy'])->name('service-categories.destroy');
    });

    // services     
    Route::get('/dashboard/services', [ServicesController::class, 'index'])->name('dashboard.services.index');  // index page
    Route::get('/dashboard/services/list', [ServicesController::class, 'getServices'])->name('dashboard.services.list'); /// get the data 
    Route::get('/dashboard/services/add', [ServicesController::class, 'add'])->name('dashboard.services.add'); // get add page
    Route::post('/dashboard/services/store', [ServicesController::class, 'store'])->name('dashboard.services.store'); // store the new record
    Route::get('/dashboard/services/edit/{id}', [ServicesController::class, 'edit'])->name('dashboard.services.edit'); // for the edit page
    Route::put('/dashboard/services/{id}', [ServicesController::class, 'update'])->name('dashboard.services.update'); // update the service the page
    Route::delete('/dashboard/services/delete/{id}', [ServicesController::class, 'destroy'])->name('dashboard.services.delete'); /// delete

    // Route::get('/dashboard/testimonials', [TestimonialController::class, 'index'])->name('dashboard.testimonials'); // faq page
    // Route::post('/dashboard/testimonials', [TestimonialController::class, 'handleSection']); // faq sections          
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::resource('testimonials', TestimonialController::class);
    });

    Route::get('/dashboard/about', [AboutController::class, 'index'])->name('dashboard.about'); // about page 
    Route::post('/dashboard/about', [AboutController::class, 'handleSection']); // about sections                   

    Route::get('/dashboard/team', [TeamController::class, 'index'])->name('dashboard.team'); // team page 
    Route::post('/dashboard/team', [TeamController::class, 'handleSection'])->name('dashboard.team'); // team sections                    

    Route::get('/dashboard/faq', [FaqsController::class, 'index'])->name('dashboard.faq'); // faq page
    Route::post('/dashboard/faq', [FaqsController::class, 'handleSection']); // faq sections  

    // cases  
    // Route::match(['get', 'post'], '/dashboard/categories', [CategoriesController::class, 'handleCategory'])->name('dashboard.categories');
    Route::get('case-categories', [CategoriesController::class, 'index'])->name('case-categories.index');
    Route::get('case-categories/create', [CategoriesController::class, 'create'])->name('case-categories.create');
    Route::post('case-categories', [CategoriesController::class, 'store'])->name('case-categories.store');

    Route::get('case-categories/{id}/edit', [CategoriesController::class, 'edit'])->name('case-categories.edit');
    Route::put('case-categories/{id}', [CategoriesController::class, 'update'])->name('case-categories.update');
    Route::delete('case-categories/{id}', [CategoriesController::class, 'destroy'])->name('case-categories.destroy');

    // Route::get('/dashboard/cases', [CasesController::class, 'index'])->name('dashboard.cases'); // List cases
    // Route::post('/dashboard/cases', [CasesController::class, 'handleSection']); // Handle sections
    Route::get('/dashboard/cases', [CasesController::class, 'index'])->name('dashboard.cases.index');
    Route::get('/dashboard/cases/data', [CasesController::class, 'data'])->name('dashboard.cases.data');
    Route::get('/dashboard/cases/create', [CasesController::class, 'create'])->name('dashboard.cases.create');
    Route::post('/dashboard/cases', [CasesController::class, 'store'])->name('dashboard.cases.store');
    Route::get('/dashboard/cases/{id}/edit', [CasesController::class, 'edit'])->name('dashboard.cases.edit');
    Route::put('/dashboard/cases/{id}', [CasesController::class, 'update'])->name('dashboard.cases.update');
    Route::delete('/dashboard/cases/{id}', [CasesController::class, 'destroy'])->name('dashboard.cases.destroy');

    Route::prefix('dashboard')->group(function () {
        Route::resource('blog-categories', BlogCategoryController::class);
    });
    // Route::resource('/dashboard/blog-categories', BlogCategoryController::class); 

    Route::prefix('dashboard')->group(function () {
        Route::resource('blogs', BlogController::class);

        // Define the custom route for 'data'
        Route::get('blogs/data', [BlogController::class, 'data'])->name('dashboard.blogs.data');
        Route::resource('blogs', BlogController::class)->except(['show']);
    });

    Route::get('/dashboard/contact', [ContactController::class, 'index'])->name('dashboard.contact'); // contact page
    Route::post('/dashboard/contact', [ContactController::class, 'handleSection']); // contact sections     

    Route::get('/website-contact', [WebsiteContactController::class, 'index'])->name('website_contact.index');
    Route::get('/website-contact/data', [WebsiteContactController::class, 'getContacts'])->name('website_contact.data');

    // media files 
    Route::get('/media', [MediaFileController::class, 'index'])->name('media.index');
    Route::post('/media/upload', [MediaFileController::class, 'upload'])->name('media.upload');
    Route::get('/media/list', [MediaFileController::class, 'list'])->name('media.list');
    Route::delete('/media/delete/{id}', [MediaFileController::class, 'delete'])->name('media.delete');

    Route::post('/seo', [SEOController::class, 'setSEO']); // Set or update SEO data  

    Route::prefix('registrations')->group(function () {
        Route::get('/', [RegistrationController::class, 'index'])->name('registrations.index');
        Route::get('/data', [RegistrationController::class, 'getData'])->name('registrations.data');

        // web.php
        Route::get('/registrations/export/{type}', [RegistrationController::class, 'exportFullData'])->name('registrations.export');
    });

    Route::get('/enrollments', [CoursesController::class, 'enrollments'])->name('enroll.index'); /// enroll form
    Route::get('/enrollments-get', [CoursesController::class, 'enrollmentsGet'])->name('enroll.get'); /// enroll form

    Route::get('enrolls/{id}/view', [CoursesController::class, 'enrollmentView'])->name('enrolls.show');

    Route::get('enrolls/export/{type}', [CoursesController::class, 'export'])->name('enrolls.export');
});
//**************************************************************************************************//
//***************************************** Other URL *****************************************//  
Route::get('/seo/{page_name}', [SEOController::class, 'getSEO']); // Get SEO for a page

//******************************************************************************************// 
//***************************************** Login *****************************************// 

// Auth routes
// Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);  

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//********  Login END  ********//  

//********************************************************************************************* //
//***************************************** Event *****************************************// 

Route::get('/event', function () {
    return view('event/event');
});

// Language switcher route 
Route::get('/locale/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'ar'])) {
        session()->put('locale', $lang);
    }
    return redirect()->back();
});


Route::get('/check-locale', function () { // remove
    return session('locale', 'not set');
});
//***************************************** END Event *****************************************// 

//***************************************** Courses *****************************************// 

Route::get('/courses', [CoursesController::class, 'index'])->name('courses.index'); // courses landing page 
Route::get('/courses/{slug}', [CoursesController::class, 'show'])->name('courses.show'); // Show single course by title URL
Route::get('/course-detail/{slug}', [CoursesController::class, 'courseDetail'])->name('courses.detail'); // Show single course by title URL

Route::post('/courses/{slug}/enroll', [CoursesController::class, 'enroll'])->name('courses.enroll'); /// enroll form
//***************************************** END Courses *****************************************// 

Route::get('/cache-clear', function () {
    Artisan::call('optimize:clear');
    return 'All caches (route, config, view, app) have been cleared!';
});

//***************************************** quiz *****************************************// 
// Route::get('/assessment-reg', function () {
//     return view('assessment/registration');
// });   

Route::prefix('assessment')->group(function () {
    Route::get('/register', [RegisterController::class, 'showForm'])->name('assessment.register');
    Route::post('/register', [RegisterController::class, 'submitForm']);

    Route::get('/quiz', [QuizController::class, 'showQuiz'])->name('assessment.quiz');
    Route::post('/quiz/submit', [QuizController::class, 'submitQuiz'])->name('assessment.quiz.submit');

    Route::get('/result', [QuizController::class, 'showResult'])->name('assessment.result');
    // Route::get('/result', [QuizController::class, 'suggestCourse'])->name('assessment.result');
    Route::get('/assessment/report/download', [QuizController::class, 'downloadPdf'])->name('assessment.report.download');

    Route::get('/assessment/download-report', [QuizController::class, 'downloadReport'])->name('assessment.download'); // rm 
    Route::post('/chart/upload', [QuizController::class, 'uploadChart'])->name('chart.upload'); // rm    
});  
//***************************************** end quiz *****************************************//   