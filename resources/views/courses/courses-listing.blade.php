@extends('courses.layouts.app')

@section('courses-css')
    <style>
        /* ─── Card container ───────────────────────────────────────────────────────── */
        .course-card--two {
            display: flex;
            align-items: center;
            background: #fff;
            /* border-radius: 12px; */
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
            height: 100%;
        }

        .course-card__image-img {
            display: block;
            /* padding: 10px; */
            width: auto;
            border-radius: 12px;
            /* fixed width for all cards */
            height: 277px;
            /* fixed height for all cards */
            object-fit: cover;
            /* crops/zooms to fill */
        }
    </style>
@endsection

@section('courses')
    <section class="page-header">
        <div class="container  mt-5">
            <div class="page-header__content">
                <ul class="eduhive-breadcrumb list-unstyled">
                    <li><span class="eduhive-breadcrumb__icon"><i class="icon-home"></i></span><a href="{{ route('courses.index') }}">Home</a>
                    </li>
                    <li><span>our courses</span></li> 
                </ul><!-- /.eduhive-breadcrumb list-unstyled -->
                <h2 class="page-header__title">
                    {{ $data['data']['title'] ?? '' }}

                </h2>
            </div><!-- /.page-header__content -->
        </div><!-- /.container -->
        <img src="{{ asset('assets/courses/assets/images/shapes/page-header-shape-1.png') }}" alt="shape"
            class="page-header__shape-one">
        <img src="{{ asset('assets/courses/assets/images/shapes/page-header-shape-2.png') }}" alt="shape"
            class="page-header__shape-two">
        <div class="page-header__shape-three"></div><!-- /.page-header__shape-three -->
        <div class="page-header__shape-four"></div><!-- /.page-header__shape-four -->
    </section>
    <!-- /.page-header -->

    @php
        // echo '<pre>';
        // print_r($courses);
    @endphp
    <section class="courses-page courses-page--two section-space">
        <div class="container">
            <div class="row gutter-y-30">
                @if (!empty($courses['data']))
                    @foreach ($courses['data'] as $course)
                        <div class="col-lg-6">
                            <div class="course-card shadow-lg course-card--two wow fadeInUp" data-wow-duration='1500ms'
                                data-wow-delay='00ms'>
                                <div class="course-card__image">
                                    <img src="{{ $course['image'] }}" class="course-card__image-img"
                                        alt="{{ $course['title'] }}">
                                </div>
                                <div class="course-card__content">
                                    {{-- <div class="p-3 ps-3"> --}}
                                    <div class="course-card__content__top">
                                        <div class="course-card__category">{{ $course['level'] ?? 'Beginner' }}</div>
                                        <div class="course-card__duration">
                                            <span class="course-card__duration__icon">
                                                <i class="icon-clock"></i>
                                            </span>
                                            {{ $course['duration'] ?? 'N/A' }}
                                        </div>
                                    </div>
                                    <h3 class="course-card__title">
                                        <a href="{{ route('courses.detail', ['slug' => $course['title_url']]) }}">
                                            {{ $course['title'] }}
                                        </a>
                                    </h3>
                                    <div class="course-card__info">
                                        <div class="course-card__lessons">
                                            <span class="course-card__lessons__icon">
                                                <i class="icon-open-book"></i>
                                            </span>
                                            {{ $course['lectures'] ?? '0' }} lessons
                                        </div>
                                        <div class="course-card__students">
                                            <span class="course-card__students__icon">
                                                <i class="icon-multiple-users-silhouette"></i>
                                            </span>
                                            {{ $course['totalentolled'] ?? '0' }} Enrolled
                                        </div>
                                    </div>
                                    <div class="course-card__ratings">
                                        <div class="eduhive-ratings">
                                            @for ($i = 0; $i < 5; $i++)
                                                <span class="eduhive-ratings__icon">
                                                    <i class="fa fa-star"></i>
                                                </span>
                                            @endfor
                                        </div><!-- /.product-ratings -->
                                        <p class="course-card__ratings__text">{{ $course['rating'] ?? '0' }} Ratings</p>
                                    </div>
                                    {{-- <h4 class="course-card__price">$<span>69.00</span></h4><!-- /.course-card__price --> --}}
                                </div><!-- /.course-card__content -->
                            </div><!-- /.course-card -->
                        </div><!-- /.col-lg-6 -->
                    @endforeach
                @else
                    <p>No courses available.</p>
                @endif
            </div>
        </div><!-- /.container -->
    </section><!-- /.courses-page section-space -->
@endsection

@section('courses-js')
@endsection
