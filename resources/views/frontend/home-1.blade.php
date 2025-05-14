@extends('frontend.layouts.app')

@section('seo_title', e($seo['title'] ?? 'Legato Design '))
@section('seo_description', e($seo['meta_description'] ?? 'Legato Design '))
@section('seo_keywords', e($seo['keywords'] ?? 'Legato Design '))

@section('frontent-css')
@endsection

@section('content')

    <section class="main-slider">
        <div class="swiper-container thm-swiper__slider"
            data-swiper-options='{"slidesPerView": 1, "loop": true,
            "effect": "fade",
            "pagination": {
                "el": "#main-slider-pagination",
                "type": "bullets",
                "clickable": true
            },
            "navigation": { 
                "nextEl": "#main-slider__swiper-button-next",
                "prevEl": "#main-slider__swiper-button-prev"
            },
            "autoplay": { 
                "delay": 5000
            }}'>
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="image-layer"
                        @if ($slider1image) style="background-image: url('{{ asset('uploads/home1/' . $slider1image) }}')" @endif>
                    </div>
                    <!-- <div class="image-layer-overlay"></div> -->
                    <div class="main-slider-shape-1"></div>
                    <div class="main-slider-shape-2"></div>
                    <div class="main-slider-shape-3"></div>
                    <div class="main-slider-shape-4"></div>
                    <div class="main-slider-shape-5"></div>
                    <!-- /.image-layer -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="main-slider__content">
                                    <p>{{ $slider1content['title'] ?? '' }}</p>
                                    <h2>{!! $slider1content['heading'] ?? '' !!}</h2>
                                    <a href="{{ $slider1content['button_url'] ?? '' }}"
                                        class="thm-btn">{{ $slider1content['button_name'] ?? '' }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="image-layer"
                        @if ($slider2image) style="background-image: url({{ asset('uploads/home1/' . $slider2image) }})" @endif>
                    </div>
                    <!-- <div class="image-layer-overlay"></div> -->
                    <div class="main-slider-shape-1"></div>
                    <div class="main-slider-shape-2"></div>
                    <div class="main-slider-shape-3"></div>
                    <div class="main-slider-shape-4"></div>
                    <div class="main-slider-shape-5"></div>
                    <!-- /.image-layer -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="main-slider__content">
                                    <p>{{ $slider2content['title'] ?? '' }}</p>
                                    <h2>{!! $slider2content['heading'] ?? '' !!}</h2>
                                    <a href="{{ $slider2content['button_url'] ?? '' }}"
                                        class="thm-btn">{{ $slider2content['button_name'] ?? '' }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- If we need navigation buttons -->
            <div class="main-slider__nav">
                <div class="swiper-button-prev" id="main-slider__swiper-button-next"><span
                        class="main-slider__next-text">Next</span><i class="icon-right-arrow icon-left-arrow"></i>
                </div>
                <div class="swiper-button-next" id="main-slider__swiper-button-prev"><span
                        class="main-slider__prev-text">Prev</span><i class="icon-right-arrow"></i>
                </div>
            </div>
        </div>
    </section>

    @if (isset($section2['active']) && $section2['active'] == 1)
        <!--Real World Start-->
        <section class="real-world">
            <div class="real-world-shape wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms"
                style="background-image: url({{ asset('assets/frontend/assets/images/shapes/real-world-shape.png') }})">
            </div>
            <div class="container">
                <div class="section-title text-center">
                    <h2 class="section-title__title">{{ $section2['title'] ?? '' }}</h2>
                    <span class="section-title__tagline">{{ $section2['heading'] ?? '' }}</span>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 d-flex wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <!--Real World Single-->
                        <div class="real-world__single">
                            <h2 class="real-world__title"><a
                                    href="{{ $section2['services'][0]['button_url'] ?? '' }}">{{ $section2['services'][0]['title'] ?? '' }}
                                </a>
                            </h2>
                            <a href="{{ $section2['services'][0]['button_url'] ?? '' }}"
                                class="real-world__btn">{{ $section2['services'][0]['button_name'] ?? '' }}</a>
                            {{-- <div class="real-world__icon-box">
                            <span class="icon-wealth"></span>
                        </div> --}}
                            @if (!empty($section2['services'][0]['image']))
                                <div class="real-world__icon-box">
                                    <img src="{{ asset('uploads/home1/' . $section2['services'][0]['image']) }}"
                                        class="img-fluid" style="max-height: 80px;">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 d-flex  wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <!--Real World Single-->
                        <div class="real-world__single">
                            <h2 class="real-world__title"><a
                                    href="{{ $section2['services'][1]['button_url'] ?? '' }}">{{ $section2['services'][1]['title'] ?? '' }}
                                </a>
                            </h2>
                            <a href="{{ $section2['services'][1]['button_url'] ?? '' }}"
                                class="real-world__btn">{{ $section2['services'][1]['button_name'] ?? '' }}</a>
                            {{-- <div class="real-world__icon-box"> 
                            <span class="icon-data-analytics"></span>  
                        </div> --}}
                            @if (!empty($section2['services'][1]['image']))
                                <div class="real-world__icon-box">
                                    <img src="{{ asset('uploads/home1/' . $section2['services'][1]['image']) }}"
                                        class="img-fluid" style="max-height: 80px;">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 d-flex  wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <!--Real World Single-->
                        <div class="real-world__single">
                            <h2 class="real-world__title"><a
                                    href="{{ $section2['services'][2]['button_url'] ?? '' }}">{{ $section2['services'][2]['title'] ?? '' }}
                                </a>
                            </h2>
                            <a href="{{ $section2['services'][2]['button_url'] ?? '' }}"
                                class="real-world__btn">{{ $section2['services'][2]['button_name'] ?? '' }}</a>
                            @if (!empty($section2['services'][2]['image']))
                                <div class="real-world__icon-box">
                                    <img src="{{ asset('uploads/home1/' . $section2['services'][2]['image']) }}"
                                        class="img-fluid" style="max-height: 80px;">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Real World Start-->
    @endif

    @php
        $partnerSection3 = [
            'active' => false,
            'partners' => [],
        ];

        if ($section3 && $section3->content_value) {
            $decoded = json_decode($section3->content_value, true);
            $partnerSection3['active'] = $section3->active ?? 0;
            $partnerSection3['partners'] = $decoded['partners'] ?? [];
        }
    @endphp
    @if (isset($partnerSection3['active']) && $partnerSection3['active'] == 1)
        <!--Brand One Start-->
        <section class="brand-one">
            <div class="container">
                <h4 class="brand-one__title">Meet the partners</h4>
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
                        @if (isset($partnerSection3['partners']) && !empty($partnerSection3['partners']))
                            @foreach ($partnerSection3['partners'] as $index => $partner)
                                <div class="swiper-slide">
                                    <img src="{{ asset('uploads/home1/' . $partner['icon']) }}" alt="">
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </section>
        <!--Brand One End-->
    @endif



    @php
        $section4Content = [
            'active' => false,
            'title' => '',
            'youtube' => '',
            'short_desc' => '',
            'about' => [
                'title' => '',
                'service_1' => ['name' => '', 'percent' => ''],
                'service_2' => ['name' => '', 'percent' => ''],
            ],
            'contact' => ['question' => '', 'number' => ''],
            'images' => [null, null],
            'cards' => [['title' => '', 'desc' => ''], ['title' => '', 'desc' => '']],
        ];

        if ($section4 && $section4->content_value) {
            $decoded = json_decode($section4->content_value, true);
            $section4Content = array_merge($section4Content, $decoded);
            $section4Content['active'] = $section4->active ?? 0;
        }
    @endphp

    @if (isset($section4Content['active']) && $section4Content['active'] == 1)
        <!--Welcome One Start-->
        <section class="welcome-one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="welcome-one__left">
                            <div class="welcome-one__img-box">
                                <div class="welcome-one__img-1">
                                    @if (!empty($section4Content['images'][0]))
                                        <img src="{{ asset('uploads/home1/' . $section4Content['images'][0]) }}"
                                            alt="">
                                    @endif
                                </div>
                                <div class="welcome-one__img-2">
                                    @if (!empty($section4Content['images'][1]))
                                        <img src="{{ asset('uploads/home1/' . $section4Content['images'][1]) }}"
                                            alt="">
                                    @endif
                                </div>

                                @if (isset($section4Content['youtube']) && !empty($section4Content['youtube']))
                                    <a href="{{ $section4Content['youtube'] }}"
                                        class="welcome-one__video-btn video-popup">
                                        <div class="welcome-one__video-btn-icon">
                                            <i class="fa fa-play"></i>
                                            <span class="ripple"></span>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="welcome-one__right">
                            <h2 class="welcome-one__title"> {{ $section4Content['title'] ?? '' }} </h2>
                            <p class="welcome-one__text"> {{ $section4Content['short_desc'] ?? '' }} </p>
                            <p class="welcome-one__text-two"> {{ $section4Content['about']['title'] ?? '' }} </p>
                            <div class="welcome-one__progress">
                                <div class="welcome-one__progress-single">
                                    <div class="bar">
                                        <div class="bar-inner count-bar" data-percent="88%">
                                            <div class="count-text">
                                                {{ $section4Content['about']['service_1']['percent'] . '%' ?? '' }}</div>
                                        </div>
                                    </div>
                                    <h4 class="welcome-one__progress-title">
                                        {{ $section4Content['about']['service_1']['name'] ?? '' }}</h4>
                                </div>
                                <div class="welcome-one__progress-single">
                                    <div class="bar">
                                        <div class="bar-inner count-bar" data-percent="68%">
                                            <div class="count-text">
                                                {{ $section4Content['about']['service_2']['percent'] . '%' ?? '' }}</div>
                                        </div>
                                    </div>
                                    <h4 class="welcome-one__progress-title">
                                        {{ $section4Content['about']['service_2']['name'] ?? '' }}</h4>
                                </div>
                            </div>
                            <div class="welcome-one__call">
                                <div class="welcome-one__call-icon">  
                                    {{-- <span class="icon-phone-ringing"></span> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                        viewBox="0 0 24 24"> 
                                        <path fill="currentColor"
                                            d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2zm-2 0l-8 4.99L4 6zm0 12H4V8l8 5l8-5z" />
                                    </svg>
                                </div>
                                <div class="welcome-one__call-text">
                                    <p>{{ $section4Content['contact']['question'] ?? '' }}</p>
                                    <a href="mailto:{{ $section4Content['contact']['number'] ?? '' }}">{{ $section4Content['contact']['number'] ?? '' }}</a>
                                </div>
                            </div>
                            <div class="welcome-one__big-text">{{ $section4Content['name'] ?? '' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Welcome One End--> 

        <!--Two Boxes Start-->
        <section class="two-boxes">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="two-boxes__single">
                            <div class="two-boxes__single-content">
                                <div class="two-boxes__count">
                                    <span></span>
                                </div>
                                <div class="two-boxes__content">
                                    <h3 class="two-boxes__title">{{ $section4Content['cards'][0]['title'] ?? '' }}</h3>
                                    <p class="two-boxes__text">{{ $section4Content['cards'][0]['desc'] ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="two-boxes__single">
                            <div class="two-boxes__single-content">
                                <div class="two-boxes__count">
                                    <span></span>
                                </div>
                                <div class="two-boxes__content">
                                    <h3 class="two-boxes__title">{{ $section4Content['cards'][1]['title'] ?? '' }}</h3>
                                    <p class="two-boxes__text">{{ $section4Content['cards'][1]['desc'] ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Two Boxes End-->
    @endif

    @if (isset($section5C) && $section5C->active)

        @php
            $section5Content = isset($section5C) ? json_decode($section5C->content_value, true) : null;
        @endphp

        <!-- Cases One Start-->
        <section class="cases-one">
            <div class="container">
                <div class="section-title text-center">
                    <h2 class="section-title__title">{{ $section5C->title ?? '' }}</h2>
                    <span class="section-title__tagline">{{ $section5Content['smtitle'] ?? '' }}</span>
                </div>
                <div class="row">

                    @if (isset($section5) && !empty($section5))
                        @foreach ($section5 as $cases)
                            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <!--Cases One Single-->
                                <div class="cases-one__single">
                                    <div class="cases-one__img-box">
                                        <div class="cases-one__img">
                                            <img src="{{ asset('uploads/cases/' . $cases->listing_image) }}"
                                                alt="">
                                        </div>
                                        <div class="cases-one__content">
                                            <div class="cases-one__icon">
                                                {{-- <span class="icon-mobile-analytics"></span> --}}
                                                @if (isset($cases->icon))
                                                    <img src="{{ asset('uploads/cases/' . $cases->icon) }}"
                                                        width="64" height="64" alt="Logo Icon">
                                                @endif
                                            </div>

                                            <p class="cases-one__tagline">{{ $cases->client ?? 'Strategy' }}</p>
                                            <h2 class="cases-one__tilte"><a
                                                    href="{{ route('cases.detail', $cases->slug) }}">{{ $cases->title }}</a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
        <!--Cases One End-->
    @endif

    @php
        $section6content =
            isset($section6->content_value) && !empty($section6->content_value)
                ? json_decode($section6->content_value, true)
                : [];
    @endphp

    @if (isset($section6->active) && $section6->active == 1)
        <!--Our Mission Start-->
        <section class="our-mission">
            <div class="our-mission-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url(@if (!empty($section6->image)) {{ asset('uploads/home1/' . $section6->image) }} @endif)">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="our-mission__inner">
                            <h2 class="our-mission__title">
                                {!! $section6->title ?? '' !!}
                            </h2>
                            <a href="{{ $section6content['button_url'] ?? '' }}"
                                class="thm-btn our-mission__btn">{{ $section6content['button_name'] ?? '' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Our Mission End-->
    @endif


    @php
        $section7Content = $section7 ? json_decode($section7->content_value, true) : null;
    @endphp

    @if (isset($section7) && $section7->active == 1)
        <!--Faq One Start-->
        <section class="faq-one">
            <div class="container">
                <div class="section-title text-center">
                    <h2 class="section-title__title">{{ $section7Content['title'] ?? '' }}</h2>
                    <span class="section-title__tagline">{{ $section7Content['smTitle'] ?? '' }}</span>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="faq-one__left">
                            <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                @for ($i = 0; $i < 4; $i++)
                                    <div class="accrodion {{ $i == 0 ? 'active' : '' }}">
                                        <div class="accrodion-title">
                                            <h4><span>.</span> {{ $section7Content['questions'][$i]['title'] ?? '' }}</h4>
                                        </div>
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p> {{ $section7Content['questions'][$i]['description'] ?? '' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="faq-one__right">
                            <div class="faq-one__img">
                                @if (!empty($section7->image))
                                    <img src="{{ asset('uploads/home1/' . $section7->image) }}" alt="">
                                @endif
                            </div>
                            <div class="faq-one__bottom">
                                <div class="faq-one__list-box">
                                    <ul class="list-unstyled faq-one__list">
                                        @if (isset($section7Content['points'][0]) && !empty($section7Content['points'][0]))
                                            @for ($i = 0; $i < 5; $i++)
                                                <li>
                                                    <div class="icon">
                                                        <span class="icon-tick"></span>
                                                    </div>
                                                    <div class="text">
                                                        <p>{{ $section7Content['points'][$i] ?? '' }}</p>
                                                    </div>
                                                </li>
                                            @endfor
                                        @endif
                                    </ul>
                                </div>
                                <div class="faq-one__experience-box">
                                    <h2> {{ $section7Content['yearsOfExpCount'] ?? '' }} </h2>
                                    <p> {!! $section7Content['yearsOfExpText'] ?? '' !!} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Faq One End-->
    @endif

    @if (!empty($section8) && $section8->active == 1)
        <!--Testimonials One Start-->
        <section class="testimonials-one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="testimonials-one__left">
                            <div class="section-title text-left">
                                <h2 class="section-title__title">{{ $section8->title ?? '' }}</h2>
                                @php
                                    $section8Content = $section8 ? json_decode($section8->content_value, true) : null;
                                @endphp
                                <span class="section-title__tagline">{{ $section8Content['smtitle'] ?? '' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="testimonials-one__right">
                            <div class="testimonials-one__carousel owl-theme owl-carousel">
                                @foreach ($testimonials as $testimonial)
                                    <!--Testimonials One Single-->
                                    <div class="testimonials-one__single">
                                        <p class="testimonials-one__text">{{ $testimonial->message }} </p>
                                        <div class="testimonials-one__client-info">
                                            <h5 class="testimonials-one__client-name">{{ $testimonial->name }}</h5>
                                            <p class="testimonials-one__client-title">{{ $testimonial->designation }}</p>
                                        </div>
                                        <div class="testimonials-one__client-img">
                                            <img src="{{ asset('uploads/testimonials/' . $testimonial->image) }}"
                                                alt="">
                                        </div>
                                        <div class="testimonials-one__quote"></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Testimonials One End-->
    @endif


    @if (isset($section4about) && $section4->active == 1)
        @php
            $S4counts = [];
            if (isset($section4about) && !empty($section4about->additional_info)) {
                $dataSection4 = json_decode($section4about->additional_info, true);
                $S4counts = $dataSection4['counts'] ?? [];
            }
        @endphp

        @if (isset($section4about) && $section4about->active == 1)
            <!--Counters One Start-->
            <section class="counters-one">
                <div class="counters-one-bg"
                    style="background-image: url({{ asset('assets/frontend/assets/images/backgrounds/counter-one-bg.jpg') }})">
                </div>
                <div class="container">
                    <ul class="counters-one__box list-unstyled">
                        <li class="counter-one__single">
                            <div class="counter-one__icon">
                                {{-- <span class="icon-video"></span> --}}
                                @if (isset($S4counts[0]['icon']) && !empty($S4counts[0]['icon']))
                                    <img src="{{ asset('uploads/about/' . $S4counts[0]['icon']) }}" alt=""
                                        width="100">
                                @endif
                            </div>
                            <h3 class="odometer"
                                data-count="{{ isset($S4counts[0]['count']) && !empty($S4counts[0]['count']) ? $S4counts[0]['count'] : '' }}">
                                00</h3>
                            <p class="counter-one__text">
                                {{ isset($S4counts[1]['label']) && !empty($S4counts[1]['label']) ? $S4counts[1]['label'] : '' }}
                            </p>
                        </li>
                        <li class="counter-one__single">
                            <div class="counter-one__icon">
                                {{-- <span class="icon-help"></span> --}}
                                @if (isset($S4counts[1]['icon']) && !empty($S4counts[1]['icon']))
                                    <img src="{{ asset('uploads/about/' . $S4counts[1]['icon']) }}" alt=""
                                        width="100">
                                @endif
                            </div>
                            <h3 class="odometer"
                                data-count="{{ isset($S4counts[1]['count']) && !empty($S4counts[1]['count']) ? $S4counts[1]['count'] : '' }}">
                                00</h3>
                            <p class="counter-one__text">
                                {{ isset($S4counts[1]['label']) && !empty($S4counts[1]['label']) ? $S4counts[1]['label'] : '' }}
                            </p>
                        </li>
                        <li class="counter-one__single">
                            <div class="counter-one__icon">
                                {{-- <span class="icon-customer-review"></span> --}}
                                @if (isset($S4counts[2]['icon']) && !empty($S4counts[2]['icon']))
                                    <img src="{{ asset('uploads/about/' . $S4counts[2]['icon']) }}" alt=""
                                        width="100">
                                @endif
                            </div>
                            <h3 class="odometer" data-count="990">
                                {{ isset($S4counts[2]['count']) && !empty($S4counts[2]['count']) ? $S4counts[2]['count'] : '' }}
                            </h3>
                            <p class="counter-one__text">
                                {{ isset($S4counts[2]['label']) && !empty($S4counts[2]['label']) ? $S4counts[2]['label'] : '' }}
                            </p>
                        </li>
                        <li class="counter-one__single">
                            <div class="counter-one__icon">
                                {{-- <span class="icon-consultant"></span> --}}
                                @if (isset($S4counts[3]['icon']) && !empty($S4counts[3]['icon']))
                                    <img src="{{ asset('uploads/about/' . $S4counts[3]['icon']) }}" alt=""
                                        width="100">
                                @endif
                            </div>
                            <h3 class="odometer"
                                data-count="{{ isset($S4counts[3]['count']) && !empty($S4counts[3]['count']) ? $S4counts[3]['count'] : '' }}">
                                00</h3>
                            <p class="counter-one__text">
                                {{ isset($S4counts[3]['label']) && !empty($S4counts[3]['label']) ? $S4counts[3]['label'] : '' }}
                            </p>
                        </li>
                    </ul>
                </div>
            </section>
            <!--Counters One End-->
        @endif

    @endif

    @php
        $section10Content = $section10 ? json_decode($section10->content_value, true) : null;
    @endphp

    @if (isset($section10) && $section10->active == 1)
        <!--Financial Advice Start-->
        <section class="financial-advice">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">

                        @php
                            $card1 = $section10Content['cards']['card1'] ?? null;
                            $card2 = $section10Content['cards']['card2'] ?? null;
                            $card3 = $section10Content['cards']['card3'] ?? null;
                        @endphp

                        <div class="financial-advice__box tabs-box">
                            <ul class="tab-btns tab-buttons clearfix list-unstyled">
                                <li data-tab="#business" class="tab-btn"><span>{{ $card1['title'] ?? '' }}</span></li>
                                <li data-tab="#financial" class="tab-btn active-btn">
                                    <span>{{ $card2['title'] ?? '' }}</span>
                                </li>
                                <li data-tab="#gobal" class="tab-btn"><span>{{ $card3['title'] ?? '' }}</span></li>
                            </ul>

                            <div class="tabs-content">

                                <div class="tab " id="business">
                                    <div class="financial-advice__content">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4">
                                                <div class="financial-advice__single-1">
                                                    <ul class="list-unstyled financial-advice__list-box">
                                                        <li>
                                                            <div class="financial-advice__icon">
                                                                <span class="icon-checkmark"></span>
                                                            </div>
                                                            <div class="financial-advice__list-box-content">
                                                                <h3 class="finalcial-advice__list-box-title">
                                                                    {{ $card1['point1'] ?? '' }}</h3>
                                                                <p class="finalcial-advice__list-box-text">
                                                                    {{ $card1['point1_text'] ?? '' }}
                                                                </p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="financial-advice__icon">
                                                                <span class="icon-checkmark"></span>
                                                            </div>
                                                            <div class="financial-advice__list-box-content">
                                                                <h3 class="finalcial-advice__list-box-title">
                                                                    {{ $card1['point2'] ?? '' }}</h3>
                                                                <p class="finalcial-advice__list-box-text">
                                                                    {{ $card1['point2_text'] ?? '' }}</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-4">
                                                @php
                                                    $point1List = $card1['points'] ?? [];
                                                @endphp
                                                <div class="financial-advice__single-1 financial-advice__single-2">
                                                    <p class="financial-advice_-desc"> {{ $card1['description'] ?? '' }}
                                                    </p>
                                                    <ul class="list-unstyled financial-advice__list-box-2">
                                                        @for ($i = 0; $i < 4; $i++)
                                                            <li> {{ $point1List[$i] ?? '' }} </li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <div class="financial-advice__single-1 financial-advice__single-3">
                                                    <div class="financial-advice__img">
                                                        @if (!empty($card1['image']))
                                                            <img src="{{ asset('uploads/home1/' . $card1['image']) }}"
                                                                alt="">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab active-tab" id="financial">
                                    <div class="financial-advice__content">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4">
                                                <div class="financial-advice__single-1">
                                                    <ul class="list-unstyled financial-advice__list-box">
                                                        <li>
                                                            <div class="financial-advice__icon">
                                                                <span class="icon-checkmark"></span>
                                                            </div>
                                                            <div class="financial-advice__list-box-content">
                                                                <h3 class="finalcial-advice__list-box-title">
                                                                    {{ $card2['point1'] ?? '' }} </h3>
                                                                <p class="finalcial-advice__list-box-text">
                                                                    {{ $card2['point1_text'] ?? '' }}</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="financial-advice__icon">
                                                                <span class="icon-checkmark"></span>
                                                            </div>
                                                            <div class="financial-advice__list-box-content">
                                                                <h3 class="finalcial-advice__list-box-title">
                                                                    {{ $card2['point2'] ?? '' }}</h3>
                                                                <p class="finalcial-advice__list-box-text">
                                                                    {{ $card2['point2_text'] ?? '' }}</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <div class="financial-advice__single-1 financial-advice__single-2">
                                                    <p class="financial-advice_-desc"> {{ $card2['description'] ?? '' }}
                                                    </p>
                                                    <ul class="list-unstyled financial-advice__list-box-2">
                                                        @php
                                                            $point2List = $card2['points'] ?? [];
                                                        @endphp
                                                        @for ($i = 0; $i < 4; $i++)
                                                            <li>{{ $point2List[$i] ?? '' }}</li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <div class="financial-advice__single-1 financial-advice__single-3">
                                                    <div class="financial-advice__img">
                                                        @if (!empty($card2['image']))
                                                            <img src="{{ asset('uploads/home1/' . $card2['image']) }}"
                                                                alt="">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab" id="gobal">
                                    <div class="financial-advice__content">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4">
                                                <div class="financial-advice__single-1">
                                                    <ul class="list-unstyled financial-advice__list-box">
                                                        <li>
                                                            <div class="financial-advice__icon">
                                                                <span class="icon-checkmark"></span>
                                                            </div>
                                                            <div class="financial-advice__list-box-content">
                                                                <h3 class="finalcial-advice__list-box-title">
                                                                    {{ $card3['point1'] ?? '' }}</h3>
                                                                <p class="finalcial-advice__list-box-text">
                                                                    {{ $card3['point1_text'] ?? '' }}</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="financial-advice__icon">
                                                                <span class="icon-checkmark"></span>
                                                            </div>
                                                            <div class="financial-advice__list-box-content">
                                                                <h3 class="finalcial-advice__list-box-title">
                                                                    {{ $card3['point2'] ?? '' }}</h3>
                                                                <p class="finalcial-advice__list-box-text">
                                                                    {{ $card3['point2_text'] ?? '' }}</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <div class="financial-advice__single-1 financial-advice__single-2">
                                                    <p class="financial-advice_-desc">{{ $card3['description'] ?? '' }}
                                                    </p>
                                                    <ul class="list-unstyled financial-advice__list-box-2">
                                                        @php
                                                            $point3List = $card3['points'] ?? [];
                                                        @endphp
                                                        @for ($i = 0; $i < 4; $i++)
                                                            <li>{{ $point3List[$i] ?? '' }}</li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <div class="financial-advice__single-1 financial-advice__single-3">
                                                    <div class="financial-advice__img">
                                                        @if (!empty($card3['image']))
                                                            <img src="{{ asset('uploads/home1/' . $card3['image']) }}"
                                                                alt="">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Financial Advice End-->
    @endif

    @if (isset($section3contact) && $section3contact->active == 1)
        <!--Google Map Start-->
        <section class="google-map">
            {{-- <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1876.2880523709039!2d73.76721485723222!3d18.562747832699586!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bfc066a39cef%3A0x95be42397463880c!2sTeerth%20Technospace!5e0!3m2!1sen!2sin!4v1740133504899!5m2!1sen!2sin"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" class="google-map__one"></iframe> --}}
            <iframe
                src="{{ isset($section3contact->description) && !empty($section3contact->description) ? $section3contact->description : '' }}"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" class="google-map__one"></iframe>
        </section>
        <!--Google Map End-->
    @endif

    @php
        $section12Blog = $section12Blogs ? json_decode($section12Blogs, true) : null;
    @endphp
    @if (isset($section12) && $section12->active == 1)
        <!--News One Start-->
        <section class="news-one">
            <div class="container">
                <div class="section-title text-center">
                    <h2 class="section-title__title">{{ $section12->title ?? '' }}</h2>
                    @php
                        $section8Content = $section8 ? json_decode($section8->content_value, true) : null;
                    @endphp
                    <span class="section-title__tagline">{{ $section8Content['smtitle'] ?? '' }}</span>
                </div>
                <div class="row">

                    @if (isset($section12Blog) && !empty($section12Blog))
                        @foreach ($section12Blog as $blog)
                            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <!--News One Single-->
                                <div class="news-one__single">
                                    <div class="news-one__img">
                                        <img src="{{ asset('uploads/blogs/' . $blog['listing_image']) }}"
                                            alt="">
                                        <a href="{{ url('blog/' . $blog['slug']) }}">
                                            <span class="news-one__plus"></span>
                                        </a>
                                    </div>
                                    <div class="news-one__content">
                                        <ul class="list-unstyled news-one__meta">
                                            <li><a href="#"><i class="far fa-user-circle"></i> by Admin</a></li>
                                            <li><span>/</span></li>
                                            <li><a href="#"><i class="far fa-comments"></i> 0 Comments</a>
                                            </li>
                                        </ul>
                                        <h3 class="news-one__title">
                                            <a href="{{ url('blog/' . $blog['slug']) }}">{{ $blog['title'] }}</a>
                                        </h3>
                                        <p class="news-one__text">
                                            {{ \Illuminate\Support\Str::limit($blog['meta_description'], 100) }}</p>
                                        <a href="{{ url('blog/' . $blog['slug']) }}" class="news-one__btn">Read More</a>
                                        <div class="news-one__date-box">
                                            <p>{{ \Carbon\Carbon::parse($blog['created_at'])->format('d M') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
        <!--News One End-->
    @endif

    @if (isset($section13) && $section13->active == 1)
        <!--CTA One Start-->
        <section class="cta-one">
            <div class="cta-one-bg"
                style="background-image: url({{ asset('assets/frontend/assets/images/backgrounds/cta-one-bg.png') }})">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cta-one__inner">
                            <div class="cta-one__left">
                                <h2 class="cta-one__title">{!! $section13->title !!}</h2>
                            </div>
                            @php
                                $section13contact = $section13 ? json_decode($section13->content_value, true) : null;
                            @endphp
                            <div class="cta-one__right">
                                <a href="{{ $section13contact['button_url'] }}"
                                    class="thm-btn cta-one__btn">{{ $section13contact['button_name'] }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--CTA One End-->
    @endif

@endsection

@section('frontent-js')

@endsection
