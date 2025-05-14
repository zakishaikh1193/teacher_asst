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
                    <li>Testimonials</li>
                </ul>
                <h2>Testimonials</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    @isset($testimonials)
        <!--Testimonials One Start-->
        <section class="testimonials-one testimonials-one--page">
            <div class="container">
                <div class="row">
                    @foreach ($testimonials as $testimonial) 
                        <div class="col-md-6 col-lg-4  d-flex"> 
                            <!--Testimonials One Single-->
                            <div class="testimonials-one__single d-flex flex-column justify-content-between">
                                <p class="testimonials-one__text">{{ $testimonial->message }}</p>
                                <div class="testimonials-one__client-info">
                                    <h5 class="testimonials-one__client-name">{{ $testimonial->name }}</h5>
                                    <p class="testimonials-one__client-title">{{ $testimonial->designation }}</p>
                                </div>
                                <div class="testimonials-one__client-img">
                                    {{-- <img src="{{ asset('assets/frontend/assets/images/testimonial/testimonials-1-1.png') }}"
                                        alt=""> --}}
                                    <img src="{{ asset('uploads/testimonials/' . $testimonial->image) }}" alt="">
                                </div>
                                <div class="testimonials-one__quote"></div>
                            </div>
                        </div><!-- /.col-md-6 -->
                    @endforeach
                </div>
            </div>
        </section>
        <!--Testimonials One End-->
    @endisset



    @if (isset($section3) && $section3->active == 1)
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
                                <h2 class="cta-one__title">
                                    {{ isset($section3->header) && !empty($section3->header) ? $section3->header : '' }}
                                </h2>
                            </div>
                            @php
                                $add_infoS3 =
                                    isset($section3->additional_info) && !empty($section3->additional_info)
                                        ? json_decode($section3->additional_info, true)
                                        : '';
                            @endphp
                            <div class="cta-one__right">
                                <a href="{{ isset($add_infoS3['btn_url']) && !empty($add_infoS3['btn_url']) ? $add_infoS3['btn_url'] : '' }}"
                                    class="thm-btn cta-one__btn">
                                    {{ isset($add_infoS3['btn_name']) && !empty($add_infoS3['btn_name']) ? $add_infoS3['btn_name'] : '' }}
                                </a>
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
