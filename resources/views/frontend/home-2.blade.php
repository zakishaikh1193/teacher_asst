@extends('frontend.layouts.app')

@section('seo_title', e($seo['title'] ?? 'Legato Design '))
@section('seo_description', e($seo['meta_description'] ?? 'Legato Design '))
@section('seo_keywords', e($seo['keywords'] ?? 'Legato Design '))

@section('frontent-css')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.min.css" rel="stylesheet">
@endsection

@section('content')

    <section class="main-slider main-slider-two">
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
                @php
                    $slider1 = isset($section1S1->content_value) ? json_decode($section1S1->content_value, true) : [];
                @endphp
                <div class="swiper-slide">
                    <div class="image-layer"
                        style="background-image: url({{ isset($section1S1->image) && !empty(isset($section1S1->image)) ? asset('uploads/home2/' . $section1S1->image) : '' }})">
                    </div>
                    <div class="image-layer-overlay"></div>
                    <div class="main-slider-two-shape-1"
                        style="background-image: url({{ asset('assets/frontend/assets/images/shapes/main-slider--two-shape-1.png') }})">
                    </div>
                    <div class="main-slider-two-shape-2"></div>
                    <!-- /.image-layer -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-slider__content text-center">
                                    {{-- <h2>Finance <span class="main-slider-two__single-text">&</span> <br> Consulting </h2> --}}
                                    <h2>{!! $slider1['title'] ?? '' !!}</h2>
                                    <p>{{ $slider1['heading'] ?? '' }}</p>
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
                        style="background-image: url({{ isset($section1S2->image) && !empty(isset($section1S2->image)) ? asset('uploads/home2/' . $section1S2->image) : '' }});">
                    </div>
                    <div class="image-layer-overlay"></div>
                    <div class="main-slider-two-shape-1"
                        style="background-image: url({{ asset('assets/frontend/assets/images/shapes/main-slider--two-shape-1.png') }})">
                    </div>
                    <div class="main-slider-two-shape-2"></div>
                    <!-- /.image-layer -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-slider__content text-center">
                                    <h2>{!! $slider2['title'] ?? '' !!} </h2>
                                    <p>{{ $slider2['heading'] ?? '' }}</p>
                                    <a href="{{ $slider2['button_url'] ?? '' }}"
                                        class="thm-btn">{{ $slider2['button_name'] ?? '' }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- If we need navigation buttons -->
            <div class="main-slider__nav main-slider-two__nav">
                <div class="swiper-button-prev" id="main-slider__swiper-button-next"><span
                        class="main-slider__next-text">Next</span><i class="icon-right-arrow icon-left-arrow"></i>
                </div>
                <div class="swiper-button-next" id="main-slider__swiper-button-prev"><span
                        class="main-slider__prev-text">Prev</span><i class="icon-right-arrow"></i>
                </div>
            </div>
        </div>
    </section>

    @if (isset($section2->active) && !empty($section2->active))
        @php
            $S2Content = isset($section2->content_value) ? json_decode($section2->content_value, true) : '';
        @endphp
        <!--Industries Start-->
        <section class="industries">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-6">
                        <div class="section-title text-left">
                            <h2 class="section-title__title">{{ $S2Content['title'] ?? '' }}</h2>
                            <span class="section-title__tagline">{{ $S2Content['heading'] ?? '' }}</span>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="industries__top-text-box">
                            <p class="industries__top-text"> {{ $S2Content['shortDesc'] ?? '' }}</p>
                        </div>
                    </div>
                </div>

                <ul class="list-unstyled industries__content-box">
                    @for ($sCount = 0; $sCount < 4; $sCount++)
                        <li class="industries__single wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="industries__icon">
                                {{-- <span class="icon-bank"></span> --}}
                                @if (!empty($S2Content['services'][$sCount]['image']))
                                    <img src="{{ asset('uploads/home2/' . $S2Content['services'][$sCount]['image']) }}"
                                        style="max-height: 100px;">
                                @endif
                            </div>
                            <h3 class="industries__title"><a
                                    href="{{ $S2Content['services'][$sCount]['button_url'] ?? '' }}">{!! $S2Content['services'][$sCount]['title'] ?? '' !!}</a>
                            </h3>
                            <p class="industries__text">{{ $S2Content['services'][$sCount]['sm_desc'] ?? '' }}</p>
                        </li>
                    @endfor
                </ul>
            </div>
        </section>
        <!--Industries End-->
    @endif

    @if (isset($section3) && $section3->active)
        @php
            $section3Content = isset($section3) ? json_decode($section3->content_value, true) : null;
        @endphp

        <!--Services One Start-->
        <section class="services-one">
            <div class="container">
                <div class="section-title text-center">
                    <h2 class="section-title__title">{{ $section3Content['title'] ?? '' }}</h2>
                    <span class="section-title__tagline">{{ $section3Content['smTitle'] ?? '' }}</span>
                </div>
                <div class="row">
                    @foreach ($latestServices as $service)
                        <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="300ms">
                            <!--Services One Single-->
                            <div class="services-one__single">
                                <div class="services-one__img">
                                    <img src="{{ asset('uploads/services/' . $service->image) }}"
                                        alt="{{ $service->heading }}">
                                </div>
                                <div class="services-one__content">
                                    <h3 class="services-one__title">
                                        {{-- <a href="{{ url('services/' . $service->url) }}">{{ $service->heading }}</a> --}}
                                        {{ $service->heading ?? '' }}
                                    </h3>
                                    <p class="services-one__text">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($service->description1), 120, '...') }}
                                    </p>
                                    {{-- <a href="{{ url('services/' . $service->url) }}" class="services-one__btn">Read
                                        More</a> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!--Services One End-->
    @endif


    @if (isset($section4->active) && !empty($section4->active))
        @php
            $section4B =
                isset($section4->content_value) && !empty($section4->content_value)
                    ? json_decode($section4->content_value, true)
                    : [];
        @endphp
        <!--Largest Business Start-->
        <section class="largest-business">
            <div class="largest-business__layer-outer">
                <div class="largest-business__layer-outer-left"
                    style="background-image: url({{ asset('assets/frontend/assets/images/backgrounds/largest-business-left-bg.jpg') }})">
                </div>
                <div class="largest-business__layer-outer-right"
                    style="background-image: url({{ isset($section4->image) && !empty($section4->image) ? asset('assets/frontend/assets/images/resources/largest-business-img.jpg') : '' }})">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-12">
                        <div class="largest-business__left">
                            <h2 class="largest-business__title">{{ $section4B['title'] ?? '' }}</h2>
                            <ul class="list-unstyled largest-business__list-box">
                                <li>
                                    <div class="largest-business__icon">
                                        <span class="icon-checkmark"></span>
                                    </div>
                                    <div class="largest-business__list-box-content">
                                        <h3 class="largest-business__list-box-title">
                                            {{ $section4B['points_title'][0] ?? '' }}</h3>
                                        <p class="largest-business__list-box-text">
                                            {{ $section4B['points_desc'][0] ?? '' }}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="largest-business__icon">
                                        <span class="icon-checkmark"></span>
                                    </div>
                                    <div class="largest-business__list-box-content">
                                        <h3 class="largest-business__list-box-title">
                                            {{ $section4B['points_title'][1] ?? '' }}</h3>
                                        <p class="largest-business__list-box-text">
                                            {{ $section4B['points_desc'][1] ?? '' }}
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Largest Business End-->
    @endif


    @if (isset($section5->active) && !empty($section5->active))
        @php
            $section5Content = [];
            if (isset($section5) && $section5->content_value) {
                $section5Content = json_decode($section5->content_value, true);
            }
        @endphp
        <!--Video Two Start-->
        <section class="video-two">
            <div class="container">
                <div class="section-title text-center">
                    <h2 class="section-title__title">{{ $section5Content['heading'] ?? '' }}</h2>
                    <span class="section-title__tagline">{{ $section5Content['small_heading'] ?? '' }}</span>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="video-two__img-box">
                            <img src="{{ isset($section5Content['images'][0]) && !empty($section5Content['images'][0]) ? asset('uploads/home2/' . $section5Content['images'][0]) : '' }}"
                                alt="">
                            @if (isset($section5Content['youtube']) && !empty($section5Content['youtube']))
                                <a href="{{ $section5Content['youtube'] ?? '' }}"
                                    class="video-two__video-btn video-popup">
                                    <div class="video-two__video-btn-icon">
                                        <i class="fa fa-play"></i>
                                        <span class="ripple"></span>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Video Two End-->

        <!--Video Two End-->
        <section class="listen">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="listen__left">
                            <h2 class="listen__title">{{ $section5Content['title'] ?? '' }}</h2>
                            <p class="listen__text">{{ $section5Content['short_desc'] ?? '' }}</p>
                            <div class="listen__progress-wrap">
                                <div class="listen__progress">
                                    <div class="listen__progress-box">
                                        <div class="circle-progress"
                                            data-options='{ "value": 0.9,"thickness": 3,"emptyFill": "#ffffff","lineCap": "square", "size": 112, "fill": { "color": "#3c72fc" } }'>
                                        </div><!-- /.circle-progress -->
                                        <span>{{ $section5Content['about']['service_1']['percent'] ?? '' }}%</span>
                                    </div>
                                    <div class="listen__progress-content">
                                        <h3>{{ $section5Content['about']['service_1']['name'] ?? '' }}</h3>
                                    </div>
                                </div>
                                <div class="listen__progress">
                                    <div class="listen__progress-box">
                                        <div class="circle-progress"
                                            data-options='{ "value": 0.5,"thickness": 3,"emptyFill": "#ffffff","lineCap": "square", "size": 112, "fill": { "color": "#3c72fc" } }'>
                                        </div><!-- /.circle-progress -->
                                        <span>{{ $section5Content['about']['service_2']['percent'] ?? '' }}</span>
                                    </div><!-- /.about-five__progress-box -->
                                    <div class="listen__progress-content">
                                        <h3>{{ $section5Content['about']['service_2']['name'] ?? '' }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="listen__right">
                            <div class="listen__right-faq">
                                <div class="accrodion-grp" data-grp-name="faq-one-accrodion">

                                    @for ($S2i = 0; $S2i < 3; $S2i++)
                                        <div class="accrodion {{ $S2i == 1 ? 'active' : '' }}">
                                            <div class="accrodion-title">
                                                <h4><span>.</span> {{ $section5Content['cards'][$S2i]['title'] ?? '' }}
                                                </h4>
                                            </div>
                                            <div class="accrodion-content">
                                                <div class="inner">
                                                    <p>{{ $section5Content['cards'][$S2i]['desc'] ?? '' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Video Two End-->
    @endif

    @if (isset($section6->active) && !empty($section6->active))
        @php
            $section6Content = [];
            if (isset($section6) && $section6->content_value) {
                $section6Content = json_decode($section6->content_value, true);
            }
        @endphp
        <!--Team One Start-->
        <section class="team-one">
            <div class="team-one__container">
                <div class="section-title text-center">
                    <h2 class="section-title__title">{{ $section6Content['title'] ?? '' }}</h2>
                    <span class="section-title__tagline">{{ $section6Content['short_title'] ?? '' }}</span>
                </div>
                <div class="row">
                    @if (isset($teamMembers))
                        @foreach ($teamMembers as $member)
                            @if (in_array($member->id, $section6Content['selected_ids'] ?? []))
                                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0ms"
                                    data-wow-duration="1500ms">
                                    <!--Team One Single-->
                                    <div class="team-one__single">
                                        <div class="team-one__img">
                                            <img src="{{ asset('uploads/team/' . $member->image) }}"
                                                alt="{{ $member->name }}">

                                            <div class="team-one__hover-content">
                                                <h3 class="team-one__name">{{ $member->name }}</h3>
                                                <p class="team-one__title">{{ $member->designation }}</p>
                                            </div>

                                            <div class="team-one__bottom">
                                                <div class="team-one__btn-box">
                                                    <a href="{{ $member->button_url ?? route('contact') }}"
                                                        class="team-one__btn">
                                                        {{ $member->button_name ?? 'Contact Me' }}
                                                    </a>
                                                </div>

                                                <div class="team-one__social">
                                                    @if ($member->twitter)
                                                        <a href="{{ $member->twitter }}"><i
                                                                class="fab fa-twitter"></i></a>
                                                    @endif
                                                    @if ($member->facebook)
                                                        <a href="{{ $member->facebook }}" class="clr-fb"><i
                                                                class="fab fa-facebook"></i></a>
                                                    @endif
                                                    @if ($member->instagram)
                                                        <a href="{{ $member->instagram }}" class="clr-ins"><i
                                                                class="fab fa-instagram"></i></a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
        <!--Team One End-->
    @endif

    @php
        // echo '<pre>';
        // print_r($testimonials7);
    @endphp
    @if (isset($section7) && $section7->active)
        <!--Bx Testimonial Two-->
        <section class="testimonial-two">
            <div class="container">

                <div class="row">
                    <div class="col-xl-12">
                        <div class="testimonial-two__slider">
                            <div class="row">
                                <div class="col-xl-2 col-lg-2 col-md-2">
                                    <div class="slider-pager">
                                        <div class="swiper-container testimonial-two__thumb-box "
                                            id="testimonials-one__thumb">
                                            <div class="swiper-wrapper">
                                                {{-- <div class="swiper-slide">
                                                    <div class="testimonial-two__img-holder">
                                                        <img src="{{ asset('assets/frontend/assets/images/testimonial/testimonials-2-1.png') }}"
                                                            alt="">
                                                    </div> 
                                                </div> --}}
                                                @foreach ($testimonials7 as $testimonial)
                                                    <div class="swiper-slide">
                                                        <div class="testimonial-two__img-holder">
                                                            <img src="{{ asset('uploads/testimonials/' . $testimonial->image) }}"
                                                                alt="{{ $testimonial->name }}" class="img-fluid mb-3">

                                                            <p class="testimonial__message">{{ $testimonial->message }}
                                                            </p>
                                                            <h4 class="testimonial__name">{{ $testimonial->name }}</h4>
                                                            <span
                                                                class="testimonial__designation">{{ $testimonial->designation }}</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-10 col-lg-10 col-md-10">
                                    <div class="testimonials-two__main-content">
                                        <div class="slider-content swiper-container" id="testimonials-one__carousel">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="testimonial-two__conent-box">
                                                        <p class="testimonial-two__text">This is due to their excellent
                                                            service, competitive pricing and customer support. It’s
                                                            throughly refresing to get such a personal touch. Duis aute
                                                            lorem ipsum is simply free text irure dolor in reprehenderit
                                                            in
                                                            esse nulla pariatur.</p>
                                                        <div class="testimonial-two__client-details">
                                                            <h4 class="testimonial-two__client-name">aleesha brown</h4>
                                                            <span class="testimonial-two__clinet-title">customers</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="testimonial-two__conent-box">
                                                        <p class="testimonial-two__text">This is due to their excellent
                                                            service, competitive pricing and customer support. It’s
                                                            throughly refresing to get such a personal touch. Duis aute
                                                            lorem ipsum is simply free text irure dolor in reprehenderit
                                                            in
                                                            esse nulla pariatur.</p>
                                                        <div class="testimonial-two__client-details">
                                                            <h4 class="testimonial-two__client-name">aleesha brown</h4>
                                                            <span class="testimonial-two__clinet-title">customers</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="testimonial-two__conent-box">
                                                        <p class="testimonial-two__text">This is due to their excellent
                                                            service, competitive pricing and customer support. It’s
                                                            throughly refresing to get such a personal touch. Duis aute
                                                            lorem ipsum is simply free text irure dolor in reprehenderit
                                                            in
                                                            esse nulla pariatur.</p>
                                                        <div class="testimonial-two__client-details">
                                                            <h4 class="testimonial-two__client-name">aleesha brown</h4>
                                                            <span class="testimonial-two__clinet-title">customers</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="testimonial-two__conent-box">
                                                        <p class="testimonial-two__text">This is due to their excellent
                                                            service, competitive pricing and customer support. It’s
                                                            throughly refresing to get such a personal touch. Duis aute
                                                            lorem ipsum is simply free text irure dolor in reprehenderit
                                                            in
                                                            esse nulla pariatur.</p>
                                                        <div class="testimonial-two__client-details">
                                                            <h4 class="testimonial-two__client-name">aleesha brown</h4>
                                                            <span class="testimonial-two__clinet-title">customers</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="testimonial-two__conent-box">
                                                        <p class="testimonial-two__text">This is due to their excellent
                                                            service, competitive pricing and customer support. It’s
                                                            throughly refresing to get such a personal touch. Duis aute
                                                            lorem ipsum is simply free text irure dolor in reprehenderit
                                                            in
                                                            esse nulla pariatur.</p>
                                                        <div class="testimonial-two__client-details">
                                                            <h4 class="testimonial-two__client-name">aleesha brown</h4>
                                                            <span class="testimonial-two__clinet-title">customers</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="testimonial-two__nav">
                                            <div class="testimonials-one__carousel__nav testimonial-two__nav-list">
                                                <div class="swiper-button-prev slider-prev"
                                                    id="testimonials-one__carousel__swiper-button-next"><i
                                                        class="icon-right-arrow1 icon-prev"></i></div>
                                                <div class="swiper-button-next slider-next"
                                                    id="testimonials-one__carousel__swiper-button-prev"><i
                                                        class="icon-right-arrow1"></i></div>
                                            </div>
                                        </div><!-- /.testimonial-two__nav -->
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


    @if (isset($section8) && $section8->active)
        @php
            $section8Content = isset($section8) ? json_decode($section8->content_value, true) : null;
        @endphp
        <!--News One Start-->
        <section class="news-one news-two">
            <div class="container">
                <div class="section-title text-center">
                    <h2 class="section-title__title">{{ $section8Content['title'] ?? '' }}</h2>
                    <span class="section-title__tagline">{{ $section8Content['smTitle'] ?? '' }}</span>
                </div>
                <div class="row">
                    @if (isset($section8blogs) && !empty($section8blogs))
                        @foreach ($section8blogs as $blog)
                            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <!--News One Single-->
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
                                            {{-- <a href="blog-details.html">business advice for growth</a> --}}
                                            <a href="{{ url('blog/' . $blog->slug) }}">{{ $blog->title }}</a>
                                        </h3>
                                        <p class="news-one__text">
                                            {!! \Illuminate\Support\Str::limit($blog->meta_description, 80) !!}</p>
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


    @if (isset($section9->active) && !empty($section9->active))
        <!--Brand One Start-->
        <section class="brand-one">
            <div class="brand-two-bg"
                style="background-image: url({{ asset('assets/frontend/assets/images/backgrounds/brand-two-bg.jpg') }})">
            </div>
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
                        @php
                            $partners =
                                isset($section9) && !empty($section9->content_value)
                                    ? json_decode($section9->content_value, true)
                                    : [];
                        @endphp

                        @if (isset($partners) && !empty($partners['partners']))
                            @foreach ($partners['partners'] as $index => $partner)
                                <div class="swiper-slide">
                                    <img src="{{ asset('uploads/home2/' . $partner['icon']) }}" alt="">
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
        $section10Content = [];
        if (isset($section10) && $section10->content_value) {
            $section10Content = json_decode($section10->content_value, true);
        }
    @endphp

    @if (isset($section10Content['active']) && !empty($section10Content['active']))
        <!--Two Section Start-->
        <section class="two-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="two-section__left">
                            <ul class="list-unstyled two-section__img-box">
                                @php
                                    $cards = $section10Content['cards'] ?? [
                                        ['title' => '', 'image' => ''],
                                        ['title' => '', 'image' => ''],
                                    ];
                                @endphp
                                @foreach ($cards as $index => $card)
                                    <li class="two-section__img-box-single">
                                        <div class="two-section-img">
                                            <img src="{{ asset('uploads/home2/' . $card['image']) }}" alt="">
                                            <div class="two-section__points">
                                                <div class="icon">
                                                    <span class="icon-tick"></span>
                                                </div>
                                                <div class="text">
                                                    <p>{{ $card['title'] ?? '' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                                {{-- <li class="two-section__img-box-single">
                                    <div class="two-section-img">
                                        <img src="{{ asset('assets/frontend/assets/images/resources/two-section-img-1.jpg') }}"
                                            alt="">
                                        <div class="two-section__points">
                                            <div class="icon">
                                                <span class="icon-tick"></span>
                                            </div>
                                            <div class="text">
                                                <p>Reliable and Smart</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="two-section__img-box-single">
                                    <div class="two-section-img">
                                        <img src="{{ asset('assets/frontend/assets/images/resources/two-section-img-2.jpg') }}"
                                            alt="">
                                        <div class="two-section__points">
                                            <div class="icon">
                                                <span class="icon-tick"></span>
                                            </div>
                                            <div class="text">
                                                <p>professional team</p>
                                            </div>
                                        </div>
                                    </div>
                                </li> --}}
                            </ul>
                            <h2 class="two-section__left-title">{{ $section10Content['title'] ?? '' }}</h2>
                            <div class="two-section__middle-content">
                                <div class="two-section__middle-content-icon">
                                    {{-- <span class="icon-consulting"></span> --}}
                                    <img src="{{ asset('uploads/home2/' . $section10Content['icon']) }}"
                                        class="img-fluid" style="max-height: 120px;">
                                    <h3>{{ $section10Content['icon_title'] ?? '' }}</h3>
                                </div>
                                <div class="two-section__middle-content-text-box">
                                    <p class="two-section__middle-content-text">
                                        {{ $section10Content['description1'] ?? '' }}</p>
                                </div>
                            </div>
                            <p class="two-section__bottom-text-box">{{ $section10Content['description2'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="two-section__right">
                            <div class="contact-expert">
                                <div class="contact-expert__top-title">
                                    <h3 class="contact-expert__title">Contact <br> Legato Design  Expert</h3>
                                    <span class="contact-expert__tagline">Let’s make a call request</span>
                                </div>
                                {{-- <form class="contact-expert__form"> --}}
                                <form id="requestCallForm" method="POST" class="contact-expert__form">
                                    @csrf
                                    <div class="contact-expert__input">
                                        <input type="text" placeholder="Your name" name="name">
                                        <div class="contact-expert__icon">
                                            <i class="far fa-user-circle"></i>
                                        </div>
                                    </div>
                                    <div class="contact-expert__input">
                                        <input type="email" placeholder="Email Address" name="email">
                                        <div class="contact-expert__icon">
                                            <i class="far fa-envelope"></i>
                                        </div>
                                    </div>
                                    <div class="contact-expert__input">
                                        <input type="text" placeholder="Phone number" name="phone">
                                        <div class="contact-expert__icon">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                    </div>
                                    <div class="contact-expert__input">
                                        <textarea name="message" placeholder="Write Message"></textarea>
                                        <div class="contact-expert__icon contact-expert__icon-comment">
                                            <i class="far fa-comment"></i>
                                        </div>
                                    </div>
                                    <button type="submit" class="contact-expert__btn">Request a call</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Two Section End-->
    @endif


    @php
        $section11Content = [];
        if (isset($section11) && $section11->content_value) {
            $section11Content = json_decode($section11->content_value, true);
        }
    @endphp

    @if (isset($section11Content['active']) && !empty($section11Content['active']))
        <!--CTA Two Start-->
        <section class="cta-two">
            <div class="cta-two-bg" {{-- style="background-image: url({{ asset('assets/frontend/assets/images/backgrounds/cta-two-bg.png') }})" --}}
                style="background-image: url({{ asset('uploads/home2/' . $section11Content['bg_image']) }})">
            </div>
            <div class="cta-two-bg-overly"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cta-two__inner">
                            <h2 class="cta-two__title">{{ $section11Content['title1'] ?? '' }}</h2>
                            <p class="cta-two__text">{{ $section11Content['title2'] ?? '' }}</p>
                            <ul class="list-unstyled cta-two__icon-box">
                                <li>
                                    <a href="{{ $section11Content['button_1'] ?? '' }}">
                                        <div class="cta-two__icon">
                                            <span class="icon-group"></span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $section11Content['button_2'] ?? '' }}">
                                        <div class="cta-two__icon">
                                            <span class="icon-consulting-1"></span>
                                        </div>
                                    </a>
                                </li>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#requestCallForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('website_contact.store') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Message Sent',
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        });
                        // }).then(() => {
                        //     location.reload(); // Reload page after alert
                        // });

                        $('#requestCallForm')[0].reset(); // Reset form
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = Object.values(errors).map(error => error[0]).join(
                            "\n");

                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Error',
                            text: errorMessage
                        });
                    }
                });
            });
        });
    </script>
@endsection
