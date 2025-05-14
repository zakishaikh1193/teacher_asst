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
                    <li>consultants</li>
                </ul>
                <h2>consultants</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    @isset($teams)
        <!--Team Page Start-->
        <section class="team-one team-page">
            <div class="container">
                <div class="row">
                    @foreach ($teams as $team)
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="team-one__single">
                                <div class="team-one__img">
                                    <img src="{{ asset('/uploads/team/' . $team->image) }}" alt="">
                                    <div class="team-one__hover-content">
                                        <h3 class="team-one__name">{{ $team->name }}</h3>
                                        <p class="team-one__title">{{ $team->designation }}</p>
                                    </div>
                                    <div class="team-one__bottom">
                                        <div class="team-one__btn-box">
                                            <a href="{{ $team->button_url }}" class="team-one__btn">{{ $team->button_name }}</a>
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
                    @endforeach
                </div>
            </div>
        </section>
        <!--Team Page End-->
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
                                    {{ isset($add_infoS3['btn_name']) && !empty($add_infoS3['btn_name']) ? $add_infoS3['btn_name'] : '' }}</a>
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
