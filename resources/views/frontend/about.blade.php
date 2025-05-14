@extends('frontend.layouts.app')

@section('seo_title', e($seo['title'] ?? 'Legato Design '))
@section('seo_description', e($seo['meta_description'] ?? 'Legato Design '))
@section('seo_keywords', e($seo['keywords'] ?? 'Legato Design '))

@section('frontent-css')
    <style>
        /* .odometer-wrapper {
                                display: inline-flex;
                                align-items: baseline;
                                gap: 4px;
                                white-space: nowrap;
                            }

                            .odometer-suffix {
                                font-size: inherit;
                                line-height: 1;
                            } */

        .odometer-wrapper {
            display: inline-flex;
            align-items: baseline;
            gap: 4px;
            white-space: nowrap;
        }

        .odometer-suffix {
            font-size: inherit;
            line-height: 1;
            display: inline-block;
        }
    </style>
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
                    <li>About</li>
                </ul>
                <h2>About</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->


    @if (isset($section1) && $section1->active == 1)
        <!--About Start-->
        <section class="about">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="about__img-box">
                            <div class="about-img">
                                @if (isset($section1->image1) && !empty($section1->image1))
                                    <img src="{{ asset('uploads/about/' . $section1->image1) }}" alt="">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="about__right">
                            <h2 class="about__title">
                                {{ isset($section1->header) && !empty($section1->header) ? $section1->header : '' }}
                            </h2>
                            <div class="about__icon-box">
                                @if ($section1->image2)
                                    <img src="{{ asset('uploads/about/' . $section1->image2) }}" alt="">
                                @else
                                    <div class="about__icon">
                                        <span class="icon-data-analytics"></span>
                                    </div>
                                @endif

                                <div class="about__icon-text">
                                    <p>{{ isset($section1->title) && !empty($section1->title) ? $section1->title : '' }}
                                    </p>
                                </div>
                            </div>
                            <p class="about__right-text">
                                {{ isset($section1->description) && !empty($section1->description) ? $section1->description : '' }}
                            </p>

                            @php
                                $addInfoS1 =
                                    isset($section1->additional_info) && !empty($section1->additional_info)
                                        ? json_decode($section1->additional_info, true)
                                        : '';
                            @endphp

                            <div class="listen__progress-wrap">
                                <div class="listen__progress">
                                    <div class="listen__progress-box">
                                        <div class="circle-progress"
                                            data-options='{ "value": 0.9,"thickness": 3,"emptyFill": "#f2f4f8","lineCap": "square", "size": 112, "fill": { "color": "#3c72fc" } }'>
                                        </div><!-- /.circle-progress -->
                                        <span>{{ isset($addInfoS1['progress_per'][0]) && !empty($addInfoS1['progress_per'][0]) ? $addInfoS1['progress_per'][0] : '' }}</span>
                                    </div>
                                    <div class="listen__progress-content">
                                        <h3>{{ isset($addInfoS1['progress_title'][0]) && !empty($addInfoS1['progress_title'][0]) ? $addInfoS1['progress_title'][0] : '' }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="listen__progress">
                                    <div class="listen__progress-box">
                                        <div class="circle-progress"
                                            data-options='{ "value": 0.5,"thickness": 3,"emptyFill": "#f2f4f8","lineCap": "square", "size": 112, "fill": { "color": "#3c72fc" } }'>
                                        </div><!-- /.circle-progress -->
                                        <span>{{ isset($addInfoS1['progress_per'][1]) && !empty($addInfoS1['progress_per'][1]) ? $addInfoS1['progress_per'][1] : '' }}</span>
                                    </div><!-- /.about-five__progress-box -->
                                    <div class="listen__progress-content">
                                        <h3>
                                            {{ isset($addInfoS1['progress_title'][1]) && !empty($addInfoS1['progress_title'][1]) ? $addInfoS1['progress_title'][1] : '' }}
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <div class="about__phone-contact">
                                <div class="about__phone-contact-icon">
                                    {{-- <span class="icon-phone-ringing"></span> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2zm-2 0l-8 4.99L4 6zm0 12H4V8l8 5l8-5z" />
                                    </svg>
                                </div>
                                <div class="about__phone-contact-text">
                                    <p>{{ isset($addInfoS1['q_title']) && !empty($addInfoS1['q_title']) ? $addInfoS1['q_title'] : '' }}
                                    </p>
                                    <a
                                        href="mailto:{{ isset($addInfoS1['q_num']) && !empty($addInfoS1['q_num']) ? $addInfoS1['q_num'] : '' }}">
                                        {{ isset($addInfoS1['q_num']) && !empty($addInfoS1['q_num']) ? $addInfoS1['q_num'] : '' }}
                                    </a>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--About End-->
    @endif


    @if (isset($section2) && $section2->active == 1)
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

                    @if (!empty($section2->additional_info))
                        @php
                            $providers = json_decode($section2->additional_info, true);
                        @endphp
                        <div class="swiper-wrapper">
                            @foreach ($providers['partners'] ?? [] as $index => $provider)
                                <div class="swiper-slide">
                                    <img src="{{ asset('uploads/about/' . $provider['icon']) }}" alt="">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <!--Brand Three End-->
    @endif



    @if (isset($section3) && $section3->active == 1)
        <!--Testimonials One Start-->
        <section class="testimonials-one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="testimonials-one__left">
                            <div class="section-title text-left">
                                <h2 class="section-title__title">
                                    {{ isset($section3->header) && !empty($section3->header) ? $section3->header : '' }}
                                </h2>
                                <span class="section-title__tagline">
                                    {{ isset($section3->title) && !empty($section3->title) ? $section3->title : '' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @isset($testimonials)
                        <div class="col-xl-8">
                            <div class="testimonials-one__right">
                                <div class="testimonials-one__carousel owl-theme owl-carousel">
                                    @foreach ($testimonials as $testimonial)
                                        <!--Testimonials One Single-->
                                        <div class="testimonials-one__single">
                                            <p class="testimonials-one__text">{{ $testimonial->message }}</p>
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
                    @endisset
                </div>
            </div>
        </section>
        <!--Testimonials One End-->
    @endif

    @if (isset($section4) && $section4->active == 1)
        <!--Counters One Start-->
        <section class="counters-one counter-page">
            <div class="counters-one-bg"
                style="background-image: url({{ asset('assets/frontend/assets/images/backgrounds/counter-one-bg.jpg') }})">
            </div>

            @php
                $S4counts = [];
                if (isset($section4) && !empty($section4->additional_info)) {
                    $dataSection4 = json_decode($section4->additional_info, true);
                    $S4counts = $dataSection4['counts'] ?? [];
                }
            @endphp
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
                        <h3 class="odometer-wrapper">
                            <span class="odometer"
                                data-count="{{ isset($S4counts[0]['count']) && !empty($S4counts[0]['count']) ? $S4counts[0]['count'] : '' }}">
                                00</span>
                            <span class="odometer-suffix"></span>
                        </h3>
                        <p class="counter-one__text">
                            {{ isset($S4counts[1]['label']) && !empty($S4counts[1]['label']) ? $S4counts[1]['label'] : '' }}
                        </p>
                    </li>

                    <li class="counter-one__single">
                        <div class="counter-one__icon">
                            @if (isset($S4counts[1]['icon']) && !empty($S4counts[1]['icon']))
                                <img src="{{ asset('uploads/about/' . $S4counts[1]['icon']) }}" alt=""
                                    width="100">
                            @endif
                        </div>
                        {{-- <h3 class="odometer"
                            data-count="{{ isset($S4counts[1]['count']) && !empty($S4counts[1]['count']) ? $S4counts[1]['count'] : '' }}">
                            00</h3> --}}
                        <h3 class="odometer-wrapper">
                            <span class="odometer"
                                data-count="{{ isset($S4counts[1]['count']) && !empty($S4counts[1]['count']) ? $S4counts[1]['count'] : '' }}">
                                00</span>
                            <span class="odometer-suffix"></span>
                        </h3>
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
                        {{-- <h3 class="odometer"
                            data-count="{{ isset($S4counts[2]['count']) && !empty($S4counts[2]['count']) ? $S4counts[2]['count'] : '' }}">
                            00</h3> --}}
                        <h3 class="odometer-wrapper">
                            <span class="odometer"
                                data-count="{{ isset($S4counts[2]['count']) && !empty($S4counts[2]['count']) ? $S4counts[2]['count'] : '' }}">
                                00</span>
                            <span class="odometer-suffix"></span>
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
                        {{-- <h3 class="odometer"
                            data-count="{{ isset($S4counts[3]['count']) && !empty($S4counts[3]['count']) ? $S4counts[3]['count'] : '' }}">
                            00</h3> --}}
                        <h3 class="odometer-wrapper">
                            <span class="odometer"
                                data-count="{{ isset($S4counts[3]['count']) && !empty($S4counts[3]['count']) ? $S4counts[3]['count'] : '' }}">
                                00</span>
                            <span class="odometer-suffix"></span>
                        </h3>
                        <p class="counter-one__text">
                            {{ isset($S4counts[3]['label']) && !empty($S4counts[3]['label']) ? $S4counts[3]['label'] : '' }}
                        </p>
                    </li>
                </ul>
            </div>
        </section>
        <!--Counters One Start-->
    @endif

    @php
        $selectedTeamIds =
            isset($section5->additional_info) && !empty($section5->additional_info)
                ? json_decode($section5->additional_info, true)
                : [];

        $selectedTeamIds =
            isset($selectedTeamIds['team_ids']) && !empty($selectedTeamIds['team_ids'])
                ? $selectedTeamIds['team_ids']
                : [];
    @endphp

    @if (isset($section5) && $section5->active == 1)
        <!--Team One Start-->
        @isset($teams)
            <section class="team-one">
                <div class="team-one__container">
                    <div class="section-title text-center">
                        <h2 class="section-title__title">Meet the team</h2>
                        <span class="section-title__tagline">People that bring you results</span>
                    </div>
                    <div class="row">
                        @foreach ($teams as $team)
                            @if (in_array($team->id, $selectedTeamIds))
                                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0ms"
                                    data-wow-duration="1500ms">
                                    <!--Team One Single-->
                                    <div class="team-one__single">
                                        <div class="team-one__img">
                                            {{-- <img src="{{ asset('assets/frontend/assets/images/team/team-1-1.jpg') }}"
                                            alt=""> --}}
                                            <img src="{{ asset('/uploads/team/' . $team->image) }}" alt="">
                                            <div class="team-one__hover-content">
                                                <h3 class="team-one__name">{{ $team->name }}</h3>
                                                <p class="team-one__title">{{ $team->designation }}</p>
                                            </div>
                                            <div class="team-one__bottom">
                                                <div class="team-one__btn-box">
                                                    <a href="{{ $team->button_url }}"
                                                        class="team-one__btn">{{ $team->button_name }}</a>
                                                </div>
                                                <div class="team-one__social">
                                                    @if (isset($team->twitter))
                                                        <a href="{{ $team->twitter }}"><i class="fab fa-twitter"></i></a>
                                                    @endif
                                                    @if (isset($team->facebook))
                                                        <a href="{{ $team->facebook }}" class="clr-fb"><i
                                                                class="fab fa-facebook"></i></a>
                                                    @endif
                                                    @if (isset($team->instagram))
                                                        <a href="{{ $team->instagram }}" class="clr-ins"><i
                                                                class="fab fa-instagram"></i></a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
            <!--Team One End-->
        @endisset
    @endif

    @if (isset($section4) && $section4->active == 1)
        <!--CTA Two Start-->
        <section class="cta-two">
            <div class="cta-two-bg"
                style="background-image: url({{ asset('assets/frontend/assets/images/backgrounds/cta-two-bg.png') }})">
            </div>
            <div class="cta-two-bg-overly"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cta-two__inner">
                            <h2 class="cta-two__title">
                                {{ isset($section6->header) && !empty($section6->header) ? $section6->header : '' }}</h2>
                            <p class="cta-two__text">
                                {{ isset($section6->title) && !empty($section6->title) ? $section6->title : '' }}</p>

                            @php
                                $S6add =
                                    isset($section6->additional_info) && !empty($section6->additional_info)
                                        ? json_decode($section6->additional_info, true)
                                        : [];
                            @endphp

                            <ul class="list-unstyled cta-two__icon-box">

                                @if (isset($S6add['btn1url']) && !empty($S6add['btn1url']))
                                    <li>
                                        <a
                                            href="{{ isset($S6add['btn1url']) && !empty($S6add['btn1url']) ? $S6add['btn1url'] : '' }}">
                                            <div class="cta-two__icon">
                                                <span class="icon-group"></span>
                                            </div>
                                        </a>
                                    </li>
                                @endif

                                @if (isset($S6add['btn2url']) && !empty($S6add['btn2url']))
                                    <li>
                                        <a
                                            href="{{ isset($S6add['btn2url']) && !empty($S6add['btn2url']) ? $S6add['btn2url'] : '' }}">
                                            <div class="cta-two__icon">
                                                <span class="icon-consulting-1"></span>
                                            </div>
                                        </a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--CTA Two End-->
    @endif

@endsection

@section('frontent-js')

@endsection
