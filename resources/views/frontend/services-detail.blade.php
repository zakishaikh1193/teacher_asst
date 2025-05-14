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
                    <li>Services</li>
                </ul>
                <h2>
                     {{ isset($serviceDetail->heading) && !empty($serviceDetail->heading) ? $serviceDetail->heading : '' }}  
                    
                </h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Services Details Start-->
    <section class="services-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="services-details__left">
                        <div class="services-details__img">
                            <img src="{{ isset($serviceDetail->image) && !empty($serviceDetail->image) ? asset('uploads/services/' . $serviceDetail->image) : '' }}"
                                alt="">
                        </div>
                        <div class="services-details__top-content">
                            <h2 class="services-details__top-title">
                                {{ isset($serviceDetail->heading) && !empty($serviceDetail->heading) ? $serviceDetail->heading : '' }}
                            </h2>
                            <p class="services-details__top-text">
                                {{-- {{ isset($serviceDetail->description1) && !empty($serviceDetail->description1) ? $serviceDetail->description1 : '' }} --}}
                                <?= isset($serviceDetail->description1) && !empty($serviceDetail->description1) ? $serviceDetail->description1 : '' ?>
                            </p>
                        </div>

                        @php
                            $additional_info1 = '';
                            if (isset($serviceDetail->additional_info1) && !empty($serviceDetail->additional_info1)) {
                                $additional_info1 = json_decode($serviceDetail->additional_info1, true);
                            }
                        @endphp

                        <div class="services-details__planning">
                            <div class="services-details__planning-img">
                                <img src="{{ isset($additional_info1['image']) && !empty($additional_info1['image']) ? asset('uploads/services/' . $additional_info1['image']) : '' }}"
                                    alt="">
                            </div>

                            <div class="services-details__planning-content">
                                <h2 class="services-details__planning-title">
                                    <?= isset($additional_info1['title']) && !empty($additional_info1['title']) ? $additional_info1['title'] : '' ?>
                                </h2>
                                <p class="services-details__planning-text">
                                    <?= isset($additional_info1['description']) && !empty($additional_info1['description']) ? $additional_info1['description'] : '' ?>
                                </p>
                                @if (isset($additional_info1['add_point']) && !empty(isset($additional_info1['add_point'])))
                                    <ul class="list-unstyled services-details__planning-list">
                                        @foreach ($additional_info1['add_point'] as $point)
                                            @empty(!$point)
                                                <li>
                                                    <div class="icon">
                                                        <span class="icon-tick"></span>
                                                    </div>
                                                    <div class="text">
                                                        <p><?= $point ?></p>
                                                    </div>
                                                </li>
                                            @endempty
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>

                        <p class="services-details__bottom-text">
                            <?= isset($serviceDetail->description2) && !empty($serviceDetail->description2) ? $serviceDetail->description2 : '' ?>
                        </p>

                        @php
                            $additional_info2 = '';
                            if (isset($serviceDetail->additional_info2) && !empty($serviceDetail->additional_info2)) {
                                $additional_info2 = json_decode($serviceDetail->additional_info2, true);
                            }
                        @endphp

                        @if (isset($additional_info2) && !empty($additional_info2))
                            <div class="services-details__bottom-box">
                                @foreach ($additional_info2['add2_title'] as $iKey => $iVal)
                                    @empty(!$iVal)
                                        <div class="services-details__bottom-box-single">
                                            <div class="services-details__bottom-box-icon">
                                                {{-- <span class="icon-data-analytics"></span> --}}
                                                <img src="{{ isset($additional_info2['icons'][$iKey]) && !empty($additional_info2['icons'][$iKey]) ? asset('uploads/services/' . $additional_info2['icons'][$iKey]) : '' }}"
                                                    alt="" width="100px">
                                            </div>

                                            <div class="services-details__bottom-box-content">
                                                <h4 class="services-details__bottom-box-title">
                                                    <?= isset($iVal) && !empty($iVal) ? $iVal : '' ?> </h4>
                                                <p class="services-details__bottom-box-text">
                                                    <?= isset($additional_info2['add2_description'][$iKey]) && !empty($additional_info2['add2_description'][$iKey]) ? $additional_info2['add2_description'][$iKey] : '' ?>
                                                </p>
                                            </div>
                                        </div>
                                    @endempty
                                @endforeach
                            </div>
                        @endif

                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="services-details__sidebar">
                        <div class="services-details__services-list-box">
                            <h3 class="services-detials__categories">Categories</h3>
                            <ul class="services-details__services-list list-unstyled">
                                {{-- <li><a href="consumer-product.html">Consumer Product <span
                                            class="icon-right-arrow"></span></a></li>
                                <li class="active"><a href="audit-marketing.html">Audit Marketing <span
                                            class="icon-right-arrow"></span></a></li>
                                <li><a href="banking-advising.html">Banking Advising <span
                                            class="icon-right-arrow"></span></a></li>
                                <li><a href="business-growth.html">Business Growth <span
                                            class="icon-right-arrow"></span></a></li>
                                <li><a href="financial-advice.html">Financial Advice <span
                                            class="icon-right-arrow"></span></a></li>
                                <li><a href="marketing-rule.html">Marketing Rules <span class="icon-right-arrow"></span></a>
                                </li> --}}
                                {{-- @foreach ($menuServices as $service)
                                    <li> 
                                        <a href="{{ url('services/' . $service->url) }}">{{ $service->heading }}</a>
                                    </li>
                                @endforeach --}}
                                @foreach ($menuCategories as $category)
                                    <li>
                                        <a href="{{ url('category/' . $category->slug) }}">{{ $category->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="services-details__help-box">
                            <div class="services-details__help-box-bg"
                                style="background-image: url({{ asset('assets/frontend/assets/images/services/services-details-need-help-bg.jpg') }})">
                            </div>
                            <div class="services-details__help-box-bg-overly"></div>
                            <h3 class="services-details__help-box-title">Need Help?</h3>
                            <p class="services-details__help-box-text">Prefer speaking with a human to filling out a
                                form? call corporate office and we will connect you with a team member who can help.
                            </p>
                            <a href="tel:+92-666-888-0000" class="services-details__phone">+92 666 888 0000</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Services Details End-->

    <!--CTA One Start-->
    <section class="cta-one">
        <div class="cta-one-bg"
            style="background-image: url({{ asset('assets/frontend/assets/images/backgrounds/cta-one-bg.png') }})"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="cta-one__inner">
                        <div class="cta-one__left">
                            <h2 class="cta-one__title">we’re delivering the best <br> customer experience</h2>
                        </div>
                        <div class="cta-one__right">
                            <a href="{{ route('contact') }}" class="thm-btn cta-one__btn">let’s get started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--CTA One End-->

@endsection

@section('frontent-js')

@endsection
