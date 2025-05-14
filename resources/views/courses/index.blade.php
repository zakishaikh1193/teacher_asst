 @extends('courses.layouts.app')

 @section('courses-css')
 @endsection

 @section('courses')
     <section class="main-slider-one" id="home">
         <div class="main-slider-one__carousel eduhive-owl__carousel eduhive-owl__carousel--basic-nav owl-carousel owl-theme"
             data-owl-options='{
                "items": 1,
                "margin": 0,
                "animateIn": "fadeIn",
                "animateOut": "fadeOut",
                "loop": true,
                "smartSpeed": 1000,
                "nav": false,
                "dots": false,
                "autoplay": true,
                "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"]
                }'>
             <div class="main-slider-one__item">
                 <div class="container">
                     <div class="row gutter-y-60 align-items-center">
                         <div class="main-slider-one__col-content">
                             <div class="main-slider-one__content">
                                 <img src="{{ asset('assets/courses/assets/images/shapes/main-slider-shape-1-1.png') }}"
                                     alt="shape" class="main-slider-one__content__shape slider-image">
                                 <p class="main-slider-one__sub-title">The Pathway to Education</p><!-- /.sub-title -->
                                 <h2 class="main-slider-one__title">
                                     Learn New <span class="main-slider-one__title__shape">Skills Online</span> <br>
                                     With Top <span class="main-slider-one__title__text">instructors</span>
                                 </h2><!-- /.title -->
                                 <div class="main-slider-one__description">
                                     <p class="main-slider-one__text">There Are Many Variations Of Passages Of Lorem Ipsum
                                         Available, But The Majority Have Suffered Alteration In Some.</p><!-- /.text -->
                                 </div><!-- /.description -->
                                 {{-- <div class="main-slider-one__button">
                                     <a href="courses.html" class="main-slider-one__btn-1 eduhive-btn">
                                         <span>find course</span>
                                         <span class="eduhive-btn__icon">
                                             <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                         </span>
                                     </a> 
                                     <a href="about.html" class="main-slider-one__btn-2 eduhive-btn eduhive-btn--border">
                                         <span>About us</span>
                                         <span class="eduhive-btn__icon">
                                             <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                         </span>
                                     </a>  
                                 </div>  --}}
                             </div><!-- /.main-slider-one__content -->
                         </div><!-- /.main-slider-one__col-content -->
                         <div class="main-slider-one__col-image">
                             <div class="main-slider-one__image">
                                 <div class="main-slider-one__image__left">
                                     <div class="main-slider-one__image__one">
                                         <div class="main-slider-one__image__one__inner">
                                             <img src="{{ asset('assets/courses/assets/images/main-slider/hero-section-s1.jpg') }}"
                                                 alt="slider image" class="slider-image">
                                         </div><!-- /.main-slider-one__image__one__inner -->
                                         <div class="total-student">
                                             <div class="total-student__inner">
                                                 <div class="total-student__image">
                                                     <img src="{{ asset('assets/courses/assets/images/main-slider/u1.jpg') }}"
                                                         alt="student" class="slider-image">
                                                     <img src="{{ asset('assets/courses/assets/images/main-slider/u2.jpg') }}"
                                                         alt="student" class="slider-image">
                                                 </div><!-- /.total-student__image -->
                                                 <h4 class="total-student__text count-box">
                                                     <span class="count-text" data-stop="20"
                                                         data-speed="1500">0</span><span>k+ <br> Enrolled</span>
                                                 </h4><!-- /.total-student__text -->
                                             </div><!-- /.total-student__inner -->
                                         </div><!-- /.total-student -->
                                     </div><!-- /.main-slider-one__image__one -->
                                 </div><!-- /.main-slider-one__image__left -->
                                 <div class="main-slider-one__image__right">
                                     <div class="main-slider-one__image__two">
                                         <img src="{{ asset('assets/courses/assets/images/main-slider/hero-s2.jpg') }}"
                                             alt="slider image" class="slider-image">
                                     </div><!-- /.main-slider-one__image__two -->
                                     <div class="main-slider-one__image__three">
                                         <img src="{{ asset('assets/courses/assets/images/main-slider/hero-s3.jpg') }}"
                                             alt="slider image" class="slider-image">
                                     </div><!-- /.main-slider-one__image__three -->
                                 </div><!-- /.main-slider-one__image__right -->
                                 <img src="{{ asset('assets/courses/assets/images/shapes/main-slider-shape-1-3.png') }}"
                                     alt="shape" class="main-slider-one__image__shape-one slider-image">
                                 <img src="{{ asset('assets/courses/assets/images/shapes/main-slider-shape-1-4.png') }}"
                                     alt="shape" class="main-slider-one__image__shape-two slider-image">
                                 <img src="{{ asset('assets/courses/assets/images/shapes/main-slider-shape-1-5.png') }}"
                                     alt="shape" class="main-slider-one__image__shape-three slider-image">
                                 <div class="main-slider-one__image__shape-four"></div>
                                 <!-- /.main-slider-one__image__shape -->
                             </div><!-- /.main-slider-one__image -->
                         </div><!-- /.main-slider-one__col-image -->
                     </div><!-- /.row gutter-y-60 -->
                 </div><!-- /.container -->
                 <div class="main-slider-one__shape-one"></div><!-- /.main-slider-one__shape-one -->
                 <div class="main-slider-one__shape-two"></div><!-- /.main-slider-one__shape-two -->
                 <div class="main-slider-one__shape-three"></div><!-- /.main-slider-one__shape-three -->
                 <img src="{{ asset('assets/courses/assets/images/shapes/main-slider-shape-1-2.png') }}" alt="shape"
                     class="main-slider-one__shape-four slider-image">
             </div><!-- /.main-slider-one__item -->

         </div><!-- /.main-slider-one__carousel -->
     </section><!-- /.main-slider-one -->

     <section class="course-category section-space mt-2 pt-3">
         <div class="container">
             <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                 <h6 class="sec-title__tagline">our category</h6>
                 <h3 class="sec-title__title">our <span class="sec-title__title__text">Top</span> <span
                         class="sec-title__title__shape">Categories</span></h3>
             </div>
             <div class="row gutter-y-30  justify-content-center">
                 @if (isset($data) && !empty($data))
                     <div class="col-xl-3 col-lg-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                         <div class="course-category__card course-category__card--1">
                             <div class="course-category__card__inner">
                                 <div class="course-category__card__bg"
                                     style="background-image: url(assets/images/course-category/course-category-card-bg-1-1.jpg);">
                                 </div>
                             </div>
                             <div class="course-category__card__content">
                                 <div class="course-category__card__icon-box">
                                     <span class="course-category__card__icon">
                                         {{-- <i class="icon-briefcase"></i> --}}
                                         <img src="{{ $baseUrl . 'public/' . $data['image'] }}" width="46"
                                             alt="">
                                     </span>
                                 </div>
                                 <a href="/courses/{{ $data['title_url'] }}" class="stretched-link">
                                     <h4 class="course-category__card__title">{{ $data['title'] ?? '' }}</h4>
                                 </a>
                             </div>
                         </div>
                     </div>
                 @endif
             </div>
         </div>
         <div class="course-category__shape-one"></div>
         <div class="course-category__shape-two"></div>
     </section>
 @endsection

 @section('courses-js')
 @endsection
