@extends('frontend.layouts.app')

@section('seo_title', e($seo['title'] ?? 'Legato Design '))
@section('seo_description', e($seo['meta_description'] ?? 'Legato Design '))
@section('seo_keywords', e($seo['keywords'] ?? 'Legato Design '))

@section('frontent-css')
    <style>
        .cases-details__content img {
            display: block;
            max-width: 100%;
            height: auto;
            margin: 20px auto;
            /* vertical spacing + centering */
            padding: 10px;
            clear: both;
        }

        .cases-details__content iframe,
        .cases-details__content video {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 15px 0;
        }

        .cases-details__content p {
            margin-bottom: 1.25rem;
            line-height: 1.6;
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
                    <li>Cases Studies</li>
                </ul> 
                <h2>Cases Studies Details</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Cases Details Start-->
    <section class="cases-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="cases-details__img">
                        {{-- <img src="{{ asset('assets/frontend/assets/images/resources/cases-details-img-1.jpg') }}"
                            alt=""> --}}
                        <img src="{{ asset('uploads/cases/' . $case->main_image) }}" alt="{{ $case->title }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="cases-details__left">
                        <div class="cases-details__content">
                            {{-- <div class="cases-details__icon">  
                                <span class="icon-research"></span>
                            </div> --}}
                            <h2 class="cases-details__title">{{ $case->title }}</h2>
                            <p class="cases-details__text-1"> {!! $case->description !!}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('cases.index') }}" class="btn btn-secondary">
                            ← Back to Cases
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="cases-details__right">
                        <ul class="cases-details__right-list list-unstyled">
                            @if ($case->client)
                                <li>
                                    <p>Client:</p>
                                    <span>{{ $case->client }}</span>
                                </li>
                            @endif
                            @if (!empty($case->categories))
                                <li>
                                    <p>Category:</p>
                                    <span>{{ implode(', ', $case->categories) }}</span>
                                </li>
                            @endif
                            {{-- <li>
                                <p>Client:</p>
                                <span>Christine Eve</span>
                            </li> --}}
                            @if ($case->date)
                                <li>
                                    <p>Date:</p>
                                    <span>{{ \Carbon\Carbon::parse($case->date)->format('d M, Y') }}</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-xl-12">
                    <div class="cases-details__pagination-box">
                        <ul class="cases-details__pagination list-unstyled">
                            <li class="next">
                                <a href="#" aria-label="Previous"><i class="icon-right-arrow1"></i>Next</a>
                            </li>
                            <li class="count"><a href="#"></a></li>
                            <li class="count"><a href="#"></a></li>
                            <li class="count"><a href="#"></a></li>
                            <li class="count"><a href="#"></a></li>
                            <li class="previous">
                                <a href="#" aria-label="Next">Prev<i class="icon-right-arrow1"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <!--Cases Details End-->

    <!--Cases One Start-->
    <section class="cases-one more-cases">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="section-title__title">More Case studies</h2>
                <span class="section-title__tagline">We help our clients renew their business</span>
            </div>
            <div class="row">

                {{-- <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <!--Cases One Single--> 
                    <div class="cases-one__single">
                        <div class="cases-one__img-box">
                            <div class="cases-one__img">
                                <img src="{{ asset('assets/frontend/assets/images/resources/more-cases-img-1.jpg') }}"
                                    alt="">
                            </div>
                            <div class="cases-one__content">
                                <div class="cases-one__icon">
                                    <span class="icon-report"></span>
                                </div>
                                <p class="cases-one__tagline">business growth</p>
                                <h2 class="cases-one__tilte"><a href="cases-details.html">Digital campaigns</a></h2>
                            </div>
                        </div>
                    </div>
                </div> --}}

                @foreach ($moreCases as $more)
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="cases-one__single">
                            <div class="cases-one__img-box">
                                <div class="cases-one__img">
                                    <img src="{{ asset('uploads/cases/' . $more->listing_image) }}"
                                        alt="{{ $more->title }}">
                                </div>
                                <div class="cases-one__content">
                                    <div class="cases-one__icon">
                                        <span class="icon-report"></span>
                                    </div>
                                    <p class="cases-one__tagline">{{ $more->client ?? 'Case Study' }}</p>
                                    <h2 class="cases-one__tilte">
                                        <a href="{{ route('cases.detail', $more->slug) }}">{{ $more->title }}</a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--Cases One End-->
@endsection

@section('frontent-js')
@endsection
