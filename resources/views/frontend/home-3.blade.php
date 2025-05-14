@extends('frontend.layouts.app')

@section('seo_title', e($seo['title'] ?? 'Legato Design '))
@section('seo_description', e($seo['meta_description'] ?? 'Legato Design '))
@section('seo_keywords', e($seo['keywords'] ?? 'Legato Design '))

@section('frontent-css')
@endsection

@section('content')

    <section class="main-slider main-slider-three">
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
                "delay": 5000000   
            }}'>
            <div class="swiper-wrapper">

                @php
                    $slider1 = isset($section1S1->content_value) ? json_decode($section1S1->content_value, true) : [];
                @endphp
                <div class="swiper-slide">
                    <div class="image-layer"
                        style="background-image: url({{ isset($section1S1->image) && !empty(isset($section1S1->image)) ? asset('uploads/home3/' . $section1S1->image) : '' }})">
                    </div>
                    <!-- /.image-layer -->
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6"></div>
                            <div class="col-xl-6">
                                <div class="main-slider__content">
                                    <p>{{ $slider1['title'] ?? '' }}</p>
                                    <h2>{{ $slider1['heading'] ?? '' }}</h2>
                                    <a href="{{ $slider1['button_url'] ?? '' }}"
                                        class="thm-btn">{{ $slider1['button_name'] ?? '' }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @php
                    $slider2 = isset($section1S2->content_value) ? json_decode($section1S2->content_value, true) : [];
                @endphp
                <div class="swiper-slide">
                    <div class="image-layer"
                        style="background-image: url({{ isset($section1S2->image) && !empty(isset($section1S2->image)) ? asset('uploads/home3/' . $section1S2->image) : '' }})">
                    </div>
                    <!-- /.image-layer -->
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6"></div>
                            <div class="col-xl-6">
                                <div class="main-slider__content">
                                    <p>{{ $slider2['title'] ?? '' }}</p>
                                    <h2>{{ $slider2['heading'] ?? '' }}</h2>
                                    <a href="{{ $slider2['button_url'] ?? '' }}"
                                        class="thm-btn">{{ $slider2['button_name'] ?? '' }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- If we need navigation buttons -->
            <div class="main-slider__nav main-slider-three__nav">
                <div class="swiper-button-prev" id="main-slider__swiper-button-next"><span
                        class="main-slider__next-text">Next</span><i class="icon-right-arrow icon-left-arrow"></i>
                </div>
                <div class="swiper-button-next" id="main-slider__swiper-button-prev"><span
                        class="main-slider__prev-text">Prev</span><i class="icon-right-arrow"></i>
                </div>
            </div>
        </div>
    </section>

    @if (isset($section2->active) && $section2->active == 1)
        <!--Feature Start-->
        <section class="feature">
            <div class="feature-bg"
                style="background-image: url({{ asset('assets/frontend/assets/images/backgrounds/feature-bg.jpg') }})">
            </div>
            <div class="container">
                @php
                    $S2Content = isset($section2->content_value) ? json_decode($section2->content_value, true) : '';
                @endphp

                <div class="row">

                    @for ($sCount = 0; $sCount < 3; $sCount++)
                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <!--Feature Single-->
                            <div class="feature__single">
                                <div class="feature__content">
                                    <h3 class="feature__title"><a
                                            href="{{ $S2Content['services'][$sCount]['button_url'] ?? '' }}">{{ $S2Content['services'][$sCount]['title'] ?? '' }}</a>
                                    </h3>
                                    <p class="feature__text">{{ $S2Content['services'][$sCount]['sm_desc'] ?? '' }}</p>
                                    <a href="{{ $S2Content['services'][$sCount]['button_url'] ?? '' }}"
                                        class="feature__btn">Read More</a>
                                </div>
                                <div class="feature__img">
                                    <img src="{{ asset('uploads/home3/' . $S2Content['services'][$sCount]['image']) }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    @endfor

                </div>
                <div class="row">
                    <div class="col-xl-12 wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <div class="feature-bottom">
                            <div class="feature-bottom__contact">
                                <div class="feature-bottom__call">
                                    <img src="{{ asset('uploads/home3/' . $S2Content['services'][$sCount]['image']) }}"
                                        alt="">
                                    <div class="feature-bottom__icon">
                                        <span class="icon-phone-ringing"></span>
                                    </div>
                                </div>
                                <div class="feature-bottom__content-box">
                                    <p class="feature-bottom__tagline">{{ $S2Content['services'][$sCount]['title'] ?? '' }}
                                    </p>
                                    <h5 class="feature-bottom-desc"> {{ $S2Content['services'][$sCount]['sm_desc'] ?? '' }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Feature End-->
    @endif

    @php
        $section3Content = [];

        if (isset($section3) && $section3->content_value) {
            $section3Content = json_decode($section3->content_value, true);
        }
    @endphp

    @if (isset($section3Content['active']) && !empty($section3Content['active']))
        <!--Cases Two Start-->
        <section class="cases-two">
            <div class="container">
                <div class="section-title text-center">
                    <h2 class="section-title__title">{{ $section3Content['main_heading'] ?? '' }}</h2>
                    <span class="section-title__tagline">{{ $section3Content['subheading'] ?? '' }}</span>
                </div>
                <div class="row">
                    @for ($i = 0; $i < 2; $i++)
                        @php $card = $section3Content['cards'][$i] ?? [] @endphp
                        <div class="col-xl-6 col-lg-6 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <!--Cases Two Sinlge-->
                            <div class="cases-two__single">
                                <div class="casees-two__img-box">
                                    <div class="cases-two__img">
                                        <img src="{{ asset('uploads/home3/' . $card['image']) }}" alt="">
                                    </div>
                                    <div class="cases-two__content">
                                        <div class="cases-two__icon-box-details">
                                            <div class="cases-two__icon">
                                                {{-- @if (!empty($card['icon']))
                                                    <img src="{{ asset('uploads/home3/' . $card['icon']) }}"
                                                        class="img-fluid" style="max-height: 50px;">
                                                @else --}}
                                                <span class="icon-mobile-analytics"></span>
                                                {{-- @endif --}}
                                            </div>
                                            <p class="cases-two__tagline">{{ $card['category'] ?? '' }}</p>
                                            <h2 class="cases-two__tilte">
                                                <a href="{{ $card['case_url'] ?? '' }}">{!! $card['title'] ?? '' !!}</a>
                                            </h2>
                                        </div>
                                        <div class="cases-two__text-box">
                                            <p class="cases-two__text-bottom">{{ $card['desc'] ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
        <!--Cases Two End-->
    @endif

    @php
        $S4Content = [];
        if ($section4 && $section4->content_value) {
            $S4Content = json_decode($section4->content_value, true);
        }
    @endphp

    @if (isset($S4Content['active']) && !empty($S4Content['active']))
        <!--Services Two Start-->
        <section class="services-two">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="services-two__top-left">
                            <div class="section-title text-left">
                                <h2 class="section-title__title">{{ $S4Content['title1'] ?? '' }}</h2>
                                <span class="section-title__tagline">{{ $S4Content['heading'] ?? '' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="services-two__top-right">
                            <p class="services-two__top-right-text"> {{ $S4Content['shortDesc'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @php
                        $services = $S4Content['services'] ?? [];
                    @endphp

                    @for ($sCount = 0; $sCount < 4; $sCount++)
                        @php
                            $service = $services[$sCount] ?? [
                                'title' => '',
                                'sm_desc' => '',
                                'button_url' => '',
                                'image' => '',
                            ];
                        @endphp
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0ms"
                            data-wow-duration="1500ms">
                            <div class="services-two__single">
                                <div class="services-two__icon">
                                    @if (!empty($service['image']))
                                        <img src="{{ asset('uploads/home3/' . $service['image']) }}" class="img-fluid"
                                            style="max-height: 80px;">
                                    @endif
                                    {{-- <span class="icon-creative-1"></span> --}}
                                </div>
                                <h3 class="services-two__title"><a
                                        href="{{ $service['button_url'] }}">{!! $service['title'] !!}</a>
                                </h3>
                                <p class="services-two__text">{{ $service['sm_desc'] }}</p>
                                <a href="{{ $service['button_url'] }}" class="services-two__arrow">
                                    <span class="icon-right-arrow1"></span>
                                </a>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
        <!--Services Two End-->
    @endif


    @php
        $section5Content = [];
        if ($section5 && $section5->content_value) {
            $section5Content = json_decode($section5->content_value, true);
        }
    @endphp

    @if (isset($section5Content['active']) && !empty($section5Content['active']))
        <!--Our Mission Start-->
        <section class="our-mission">
            <div class="our-mission-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url('{{ asset('uploads/home3/' . $section5Content['bg_image']) }}')">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="our-mission__inner">
                            <h2 class="our-mission__title">{!! $section5Content['title'] ?? '' !!} </h2>
                            <a href="{{ $section5Content['button_url'] ?? '' }}"
                                class="thm-btn our-mission__btn">{{ $section5Content['button_name'] ?? '' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Our Mission End-->
    @endif

    @php
        $section6Content = [];
        if (isset($section6) && $section6->content_value) {
            $section6Content = json_decode($section6->content_value, true);
        }
    @endphp
    @if (isset($section6Content['active']) && !empty($section6Content['active']))
        <!--Financial Start-->
        <section class="financial">
            <div class="container">
                <div class="section-title text-left">
                    <h2 class="section-title__title">{{ $section6Content['title'] ?? '' }}</h2>
                    <span class="section-title__tagline">{{ $section6Content['shortTitle'] ?? '' }}</span>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="financial__left">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="financial__left-img-box">
                                        <div class="financial__left-img">
                                            @if (!empty($section6Content['card_image']))
                                                {{-- <img src="{{ asset('assets/frontend/assets/images/resources/financial-left-img-1.jpg') }}"
                                                    alt=""> --}}
                                                <img src="{{ asset('uploads/home3/' . $section6Content['card_image']) }}"
                                                    alt="">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="financial__left-img-box">
                                        <div class="financial__left-img mar-b-0">
                                            @if (!empty($section6Content['icon']))
                                                {{-- <img src="{{ asset('assets/frontend/assets/images/resources/financial-left-img-2.jpg') }}"
                                                    alt=""> --}}
                                                <img src="{{ asset('uploads/home3/' . $section6Content['icon']) }}"
                                                    alt="">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="financial__left-note-box">
                                <h2 class="financial__left-note-title">{!! $section6Content['box_text'] ?? '' !!}</h2>
                            </div>
                        </div>
                    </div>
                    @php
                        $points = $section6Content['points'] ?? [];
                    @endphp
                    <div class="col-xl-6 col-lg-6">
                        <div class="financial__right">
                            <div class="financial__right-content">
                                <p class="financial__right-text">{{ $section6Content['description'] ?? '' }} </p>
                                <ul class="list-unstyled financial__right__list">
                                    @for ($i = 0; $i < 4; $i++)
                                        <li>{{ $points[$i] ?? '' }}</li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Financial End-->
    @endif



    @php
        $section7Content = [];
        if (isset($section7) && $section7->content_value) {
            $section7Content = json_decode($section7->content_value, true);
        }
    @endphp
    @if (isset($section7Content['active']) && !empty($section7Content['active']))
        <!--Reasons Start-->
        <section class="reasons">
            <div class="container">
                <div class="reasons-bg"></div>
                <div class="row">
                    <div class="col-xl-5 col-lg-6">
                        <div class="reasons__left">
                            <h2 class="reasons__title">{{ $section7Content['title'] ?? '' }}</h2>
                            <ul class="list-unstyled reasons__list-box">
                                @php
                                    $points = $section7Content['points'] ?? [];
                                @endphp
                                @for ($Ci = 0; $Ci < 3; $Ci++)
                                    <li>
                                        <div class="reasons__icon">
                                            <span class="icon-tick"></span>
                                        </div>
                                        <div class="reasons__content">
                                            <h4 class="reasons__content-title">{{ $points[$Ci]['title'] ?? '' }} </h4>
                                            <p class="reasons__content-text">{{ $points[$Ci]['desc'] ?? '' }}</p>
                                        </div>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <div class="reasons__img-box">
                            <div class="reasons__img">
                                <img src="{{ asset('uploads/home3/' . $section7Content['image']) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Reasons End-->
    @endif

    @php
        $section8Content = [];
        if (isset($section8) && $section8->content_value) {
            $section8Content = json_decode($section8->content_value, true);
        }
    @endphp
    @if (isset($section8Content['active']) && !empty($section8Content['active']))
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
                                <h2 class="cta-one__title">{!! $section8Content['title1'] ?? '' !!}</h2>
                            </div>
                            <div class="cta-one__right">
                                <a href="{{ $section8Content['button_url'] ?? '' }}"
                                    class="thm-btn cta-one__btn">{{ $section8Content['button_name'] ?? '' }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--CTA One End-->
    @endif


    @php
        $section9Content = [];
        if (isset($section9) && $section9->content_value) {
            $section9Content = json_decode($section9->content_value, true);
        }
    @endphp
    @if (isset($section9Content['active']) && !empty($section9Content['active']))
        <!--News One Start-->
        <section class="news-one">
            <div class="container">
                <div class="section-title text-center">
                    <h2 class="section-title__title">{{ $section9Content['title'] ?? '' }}</h2>
                    <span class="section-title__tagline">{{ $section9Content['smTitle'] ?? '' }}</span>
                </div>
                <div class="row">

                    @if (isset($section9blogs) && !empty($section9blogs))
                        @foreach ($section9blogs as $blog)
                            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="news-one__single">
                                    <div class="news-one__img">
                                        <img src="{{ asset('uploads/blogs/' . $blog->listing_image) ?? asset('assets/frontend/assets/images/blog/news-page-1.jpg') }}"
                                            alt="{{ $blog->title }}">
                                        <a href="{{ url('blog/' . $blog->slug) }}">
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
                                            <a href="{{ url('blog/' . $blog->slug) }}">{{ $blog->title }}</a>
                                        </h3>
                                        <p class="news-one__text"> {!! \Illuminate\Support\Str::limit($blog->meta_description, 80) !!}</p>
                                        <a href="{{ url('blog/' . $blog->slug) }}" class="news-one__btn">Read More</a>
                                        <div class="news-one__date-box">
                                            <p>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M') }}</p>
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

    @php
        $partnerSection10 = [];
        if (isset($section10) && $section10->content_value) {
            $partnerSection10 = json_decode($section10->content_value, true);
        }
    @endphp

    @if (isset($partnerSection10['active']) && !empty($partnerSection10['active']))
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
                        @php
                            $partners =
                                isset($section10) && !empty($section10->content_value)
                                    ? json_decode($section10->content_value, true)
                                    : [];
                        @endphp
                        @if (isset($partners) && !empty($partners['partners']))
                            @foreach ($partners['partners'] as $index => $partner)
                                <div class="swiper-slide">
                                    <img src="{{ asset('uploads/home3/' . $partner['icon']) }}" alt="">
                                </div><!-- /.swiper-slide -->
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </section>
        <!--Brand Three End-->
    @endif

@endsection

@section('frontent-js')

@endsection
