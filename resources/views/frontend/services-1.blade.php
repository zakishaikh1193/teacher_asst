@extends('frontend.layouts.app')

@section('seo_title', e($seo['title'] ?? 'Legato Design '))
@section('seo_description', e($seo['meta_description'] ?? 'Legato Design '))
@section('seo_keywords', e($seo['keywords'] ?? 'Legato Design '))

@section('frontent-css')
    <style>
        /* .services-one__single {
                display: flex;
                flex-direction: column;
                height: 100%;
                background: #fff;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
                border-radius: 8px;
                overflow: hidden;
            }*/

        .services-one__img {
            width: 100%;
            height: auto;
            flex-shrink: 0;
        }

        .services-one__content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
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
                    <li>Solutions</li>
                </ul>
                <h2>{{ isset($category->title) && !empty($category->title) ? $category->title : 'Services' }}</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Services One Start-->
    <section class="services-one services-page">
        <div class="container">
            <div class="row g-4">
                @if (isset($servicesListing) && $servicesListing->isNotEmpty())
                    @foreach ($servicesListing as $serviceItem)
                        <div class="col-xl-4 col-lg-6 col-md-6 d-flex wow fadeInLeft" data-wow-delay="0ms">
                            <!--Services One Single-->
                            <div class="services-one__single h-100 w-100">
                                <div class="services-one__img">
                                    <img src="{{ asset('uploads/services/' . $serviceItem->image) }}" alt="">
                                </div>
                                <div class="services-one__content">
                                    <h3 class="services-one__title">
                                        {{-- <a href="{{ isset($serviceItem->url) && !empty($serviceItem->url) ? url('services') . '/' . $serviceItem->url : '' }}">{{ isset($serviceItem->heading) && !empty($serviceItem->heading) ? $serviceItem->heading : '' }}</a> --}}
                                        {{ isset($serviceItem->heading) && !empty($serviceItem->heading) ? $serviceItem->heading : '' }}
                                    </h3>
                                    <p class="services-one__text">
                                        <?= isset($serviceItem->description1) && !empty($serviceItem->description1) && strlen($serviceItem->description1) > 10 ? substr($serviceItem->description1, 0, 500) . '' : '' ?>
                                    </p>
                                    {{-- <a href="{{ isset($serviceItem->url) && !empty($serviceItem->url) ? url('services') . '/' . $serviceItem->url : '' }}"
                                        class="services-one__btn">Read More</a> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <h2 class="services-details__top-title">No services available for this category.</h2>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!--Services One End-->

@endsection

@section('frontent-js')

@endsection
