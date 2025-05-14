@extends('frontend.layouts.app')

@section('seo_title', e($seo['title'] ?? 'Legato Design '))
@section('seo_description', e($seo['meta_description'] ?? 'Legato Design '))
@section('seo_keywords', e($seo['keywords'] ?? 'Legato Design '))

@section('frontent-css')
@endsection

@section('content')

    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header__bg"></div><!-- /.page-header__bg -->
        <div class="page-header-shape-1"></div><!-- /.page-header-shape-1 -->
        <div class="page-header-shape-2"></div><!-- /.page-header-shape-2 -->
        <div class="page-header-shape-3"></div><!-- /.page-header-shape-3 -->
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><span>/</span></li>
                    <li>Solutions</li>
                </ul>
                <h2>Solutions</h2> 
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Industries Start-->
    <section class="industries">
        <div class="container">
            <ul class="list-unstyled industries__content-box industries__content-box--service-page ">
                @if (isset($categories) && !empty($categories))
                    @foreach ($categories as $index => $category)
                        <li class="industries__single wow fadeInUp" data-wow-delay="{{ $index * 300 }}ms"
                            data-wow-duration="1500ms">
                            <div class="industries__icon">
                                {{-- <span class="icon-bank"></span> --}}
                                <img src="{{ asset('uploads/services_category/' . $category->icon) }}" class="img-fluid"
                                    width="65" height="65"> 
                            </div>
                            <h3 class="industries__title"> 
                                <a href="{{ url('category/' . $category->slug) }}">
                                    {{ $category->title }}
                                </a>
                            </h3>
                            <p class="industries__text">
                                {{ \Illuminate\Support\Str::limit($category->description ?? 'No description available.', 200, '...') }}
                            </p>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </section>
    <!--Industries End-->

    <!--Brand Three-->
    <section class="brand-three">
        <div class="container">
            <div class="thm-swiper__slider swiper-container"
                data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
							"0": {
								"spaceBetween": 30,
								"slidesPerView": 2
							},
							"375": {
								"spaceBetween": 30,
								"slidesPerView": 2
							},
							"575": {
								"spaceBetween": 30,
								"slidesPerView": 3
							},
							"767": {
								"spaceBetween": 50,
								"slidesPerView": 4
							},
							"991": {
								"spaceBetween": 50,
								"slidesPerView": 5
							},
							"1199": {
								"spaceBetween": 100,
								"slidesPerView": 5
							} 
						}}'>
                <div class="swiper-wrapper">
                    {{-- <div class="swiper-slide">
                        <img src="{{ asset('assets/frontend/assets/images/brand/brand-3-1.png') }}" alt="">
                    </div><!-- /.swiper-slide --> --}}
                    @if (!empty($section2->additional_info))
                        @php
                            $providers = json_decode($section2->additional_info, true);
                        @endphp

                        @foreach ($providers['partners'] ?? [] as $index => $provider)
                            <div class="swiper-slide">
                                <img src="{{ asset('uploads/about/' . $provider['icon']) }}" alt="">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--Brand Three End-->


    {{-- <!--Real World Start-->
    <section class="real-world real-world--service-page">
        <div class="real-world-shape wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms"
            style="background-image: url({{ asset('assets/frontend/assets/images/shapes/real-world-shape.png') }})">
        </div>
        <div class="container">
            <div class="section-title text-center">
                <h2 class="section-title__title">real-world experience</h2>
                <span class="section-title__tagline">The best business consulting firm you can count on!</span>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <!--Real World Single-->
                    <div class="real-world__single">
                        <h2 class="real-world__title"><a href="business-growth.html">wealth <br> Management</a>
                        </h2>
                        <a href="business-growth.html" class="real-world__btn">Read More</a>
                        <div class="real-world__icon-box">
                            <span class="icon-wealth"></span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <!--Real World Single-->
                    <div class="real-world__single">
                        <h2 class="real-world__title"><a href="audit-marketing.html">audit <br> marketing</a></h2>
                        <a href="audit-marketing.html" class="real-world__btn">Read More</a>
                        <div class="real-world__icon-box">
                            <span class="icon-data-analytics"></span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <!--Real World Single-->
                    <div class="real-world__single">
                        <h2 class="real-world__title"><a href="financial-advice.html">Finance <br> consulting</a>
                        </h2>
                        <a href="financial-advice.html" class="real-world__btn">Read More</a>
                        <div class="real-world__icon-box">
                            <span class="icon-report"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Real World Start-->

    <!--Largest Business Start-->
    <section class="largest-business">
        <div class="largest-business__layer-outer">
            <div class="largest-business__layer-outer-left"
                style="background-image: url({{ asset('assets/frontend/assets/images/backgrounds/largest-business-left-bg.jpg') }})">
            </div>
            <div class="largest-business__layer-outer-right"
                style="background-image: url({{ asset('assets/frontend/assets/images/resources/largest-business-img.jpg') }})">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-12">
                    <div class="largest-business__left">
                        <h2 class="largest-business__title">The Largest Business Expert</h2>
                        <ul class="list-unstyled largest-business__list-box">
                            <li>
                                <div class="largest-business__icon">
                                    <span class="icon-checkmark"></span>
                                </div>
                                <div class="largest-business__list-box-content">
                                    <h3 class="largest-business__list-box-title">Highest Success Rates</h3>
                                    <p class="largest-business__list-box-text">Lorem Ipsum nibh vel velit auctor
                                        aliqu. Aenean sollic tudin, lorem is simply free text quis bibendum.</p>
                                </div>
                            </li>
                            <li>
                                <div class="largest-business__icon">
                                    <span class="icon-checkmark"></span>
                                </div>
                                <div class="largest-business__list-box-content">
                                    <h3 class="largest-business__list-box-title">We build experience</h3>
                                    <p class="largest-business__list-box-text">Lorem Ipsum nibh vel velit auctor
                                        aliqu. Aenean sollic tudin, lorem is simply free text quis bibendum.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Largest Business End-->

    <!--Services Two Start-->
    <section class="services-two">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="services-two__top-left">
                        <div class="section-title text-left">
                            <h2 class="section-title__title">Services we offer</h2>
                            <span class="section-title__tagline">We're here to help during market volatility</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="services-two__top-right">
                        <p class="services-two__top-right-text">There are many variations of passages of Lorem Ipsum
                            available, but the majority have suffered alteration in some form, by injected humour,
                            or randomised.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <!--Services Two Single-->
                    <div class="services-two__single">
                        <div class="services-two__icon">
                            <span class="icon-creative-1"></span>
                        </div>
                        <h3 class="services-two__title"><a href="consumer-product.html">Consumer <br> product</a>
                        </h3>
                        <p class="services-two__text">Lorem ipsum is are many variations of pass of majority.</p>
                        <a href="consumer-product.html" class="services-two__arrow">
                            <span class="icon-right-arrow1"></span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <!--Services Two Single-->
                    <div class="services-two__single">
                        <div class="services-two__icon">
                            <span class="icon-analysis"></span>
                        </div>
                        <h3 class="services-two__title"><a href="audit-marketing.html">audit <br> marketing</a>
                        </h3>
                        <p class="services-two__text">Lorem ipsum is are many variations of pass of majority.</p>
                        <a href="audit-marketing.html" class="services-two__arrow">
                            <span class="icon-right-arrow1"></span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <!--Services Two Single-->
                    <div class="services-two__single">
                        <div class="services-two__icon">
                            <span class="icon-business"></span>
                        </div>
                        <h3 class="services-two__title"><a href="banking-advising.html">banking <br> advising</a>
                        </h3>
                        <p class="services-two__text">Lorem ipsum is are many variations of pass of majority.</p>
                        <a href="banking-advising.html" class="services-two__arrow">
                            <span class="icon-right-arrow1"></span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="900ms" data-wow-duration="1500ms">
                    <!--Services Two Single-->
                    <div class="services-two__single">
                        <div class="services-two__icon">
                            <span class="icon-global"></span>
                        </div>
                        <h3 class="services-two__title"><a href="marketing-rule.html">marketing <br> rules</a>
                        </h3>
                        <p class="services-two__text">Lorem ipsum is are many variations of pass of majority.</p>
                        <a href="marketing-rule.html" class="services-two__arrow">
                            <span class="icon-right-arrow1"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Services Two End--> --}}

@endsection

@section('frontent-js')

@endsection
