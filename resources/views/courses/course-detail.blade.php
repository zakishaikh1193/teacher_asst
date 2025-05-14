@extends('courses.layouts.app')

@section('courses-css')
@endsection

@section('courses')
    <section class="page-header">
        <div class="container mt-5">
            <div class="page-header__content">
                <ul class="eduhive-breadcrumb list-unstyled">
                    <li><span class="eduhive-breadcrumb__icon"><i class="icon-home"></i></span><a
                            href="{{ route('courses.index') }}">Home</a>
                    </li>
                    <li><span>our courses</span></li>
                    <li><span>{{ $course['title'] }}</span></li>
                </ul><!-- /.eduhive-breadcrumb list-unstyled -->
                <h2 class="page-header__title">{{ $course['title'] }}</h2>
            </div><!-- /.page-header__content -->
        </div><!-- /.container -->
        <img src="{{ asset('assets/courses/assets/images/shapes/page-header-shape-1.png') }}" alt="shape"
            class="page-header__shape-one">
        <img src="{{ asset('assets/courses/assets/images/shapes/page-header-shape-2.png') }}" alt="shape"
            class="page-header__shape-two">
        <div class="page-header__shape-three"></div><!-- /.page-header__shape-three -->
        <div class="page-header__shape-four"></div><!-- /.page-header__shape-four -->
    </section><!-- /.page-header -->
 
    <section class="course-details section-space">
        <div class="container">
            <div class="row gutter-y-40">
                <div class="col-xl-8 col-lg-7">
                    <div class="course-details__inner">
                        <h3 class="course-details__title">{{ $course['title'] }}</h3>
                        <!-- /.course-details__title -->
                        <div class="course-details__info-wrapper">
                            <div class="course-details__mentor">
                                {{-- <img src="{{ asset('assets/courses/assets/images/courses/course-d-mentor-1-1.png') }}"
                                    alt="" class="course-details__mentor__image"> --}}
                                <img src="{{ $course['instructor_profile_pic'] }}" alt="{{ $course['instructor_name'] }}"
                                    class="course-details__mentor__image">
                                <h4 class="course-details__mentor__name">
                                    <a href="course-instructor-details.html">{{ $course['instructor_name'] }}</a>
                                </h4><!-- /.course-details__mentor__name -->
                            </div><!-- /.course-details__mentor -->
                            @php
                                $details = json_decode($course['other_details'], true);
                            @endphp
                            <div class="course-details__class">
                                <span class="course-details__class__icon">
                                    <i class="icon-video"></i>
                                </span><!-- /.course-details__class__icon -->
                                <p class="course-details__class__text">{{ $details['lectures'] ?? '0' }} Lectures</p>
                                <!-- /.course-details__class__text -->
                            </div><!-- /.course-details__class -->
                            <div class="course-details__review">
                                <span class="course-details__review__icon">
                                    <i class="icon-star"></i>
                                </span><!-- /.course-details__review__icon -->
                                <p class="course-details__review__text"><span>{{ $details['rating'] ?? '0' }}</span>
                                    <span>Ratings</span>
                                </p><!-- /.course-details__review__text -->
                            </div><!-- /.course-details__review -->
                        </div><!-- /.course-details__info-wrapper -->
                        <div class="course-details__image">
                            <img src="{{ $course['image'] }}" alt="{{ $course['title'] }}">
                            @if (!empty($course['video']))
                                <a href="https://www.youtube.com/watch?v={{ $course['video'] }}"
                                    class="course-details__video-btn video-btn video-popup">
                                    <i class="icon-play"></i>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a><!-- /.course-details__video-btn -->
                            @endif
                            @php
                                $tags = json_decode($course['tags'], true) ?: [];
                            @endphp
                            @if (count($tags))
                                {{-- <span class="course-details__category">{{ trim($tags[0]) }}</span> --}}
                            @endif
                        </div><!-- /.course-details__image -->
                        <div class="course-details__main-tab-box tabs-box">
                            <ul class="tab-buttons">
                                <li data-tab="#overview" class="tab-btn active-btn">overview</li>
                                <li data-tab="#curriculum" class="tab-btn">curriculum</li>
                            </ul><!-- /.tab-buttons -->
                            <div class="tabs-content">

                                {{-- overview  --}}
                                <div class="tab active-tab fadeInUp animated" data-wow-delay="200ms" id="overview"
                                    style="display: block;">

                                    <div class="course-details__description wow fadeInUp" data-wow-duration="1500ms">
                                        <h3 class="course-details__title course-details__title--description">Course
                                            Descriptions</h3><!-- /.course-details__title -->
                                        <div class="course-details__description__inner">
                                            <p class="course-details__description__text">
                                                {{-- {!! nl2br(e($course['description'] ?? $course['short_description'])) !!} --}}
                                                {!! $course['description'] ?? $course['short_description'] !!}
                                            </p>
                                        </div><!-- /.course-details__description__inner -->
                                    </div><!-- /.course-details__description -->

                                    {{-- FAQs if any --}}
                                    @if (!empty($course['frequently_asked_questions']))
                                        <div class="course-details__requirements wow fadeInUp" data-wow-duration="1500ms">
                                            <h3 class="course-details__title course-details__title--requirements">Frequently
                                                Asked Questions</h3>
                                            <p class="course-details__requirements__text">
                                                {{-- {!! nl2br(e($course['frequently_asked_questions'])) !!} --}}
                                                {!! $course['frequently_asked_questions'] !!}
                                            </p>
                                        </div>
                                    @endif
                                </div><!-- /.overview-tab -->

                                {{-- curriculum  --}}
                                <div class="tab fadeInUp animated" data-wow-delay="200ms" id="curriculum"
                                    style="display: none;">
                                    <div class="course-details__accordion">
                                        <div class="eduhive-accordion" data-grp-name="eduhive-accordion">
                                            @foreach ($curriculum = json_decode($course['curriculum'], true) ?: [] as $i => $section)
                                                <div class="accordion {{ $i === 0 ? 'active' : '' }}">
                                                    <div class="accordion-title">
                                                        <h4>{{ $section['title'] }}</h4>
                                                        <span class="accordion-title__icon"></span>
                                                    </div><!-- /.accordion-title -->
                                                    <div class="accordion-content"
                                                        style="{{ $i === 0 ? 'display:block' : '' }}">
                                                        <div class="inner">
                                                            <div class="course-details__accordion__inner">
                                                                @foreach ($section['subtitles'] as $j => $subtitle)
                                                                    {{-- <a href="https://www.youtube.com/watch?v=h9MbznbxlLc"
                                                                        class="course-details__accordion__class video-popup"> --}}
                                                                    <span
                                                                        class="course-details__accordion__class video-popup">
                                                                        <span
                                                                            class="course-details__accordion__class__title">
                                                                            {{-- <span
                                                                                class="course-details__accordion__class__icon">
                                                                                <i class="icon-files"></i>
                                                                            </span> --}}
                                                                            {{ $subtitle }}
                                                                        </span>
                                                                        <span
                                                                            class="course-details__accordion__class__right">
                                                                            <span
                                                                                class="course-details__accordion__class__duration">
                                                                                {{ $section['subtitlestime'][$j] ?? '' }}</span>
                                                                            <span
                                                                                class="course-details__accordion__class__check complete">
                                                                                <i class="icon-check"></i>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                    {{-- </a><!-- /.course-details__accordion__class --> --}}
                                                                @endforeach
                                                            </div><!-- /.course-details__accordion__inner -->
                                                        </div><!-- /.inner -->
                                                    </div><!-- /.accordion-content -->
                                                </div><!-- /.accordion-item -->
                                            @endforeach
                                        </div><!-- /.faq-accordion -->
                                    </div><!-- /.course-details__accordion -->
                                </div><!-- /.curriculum-tab -->

                            </div><!-- /.tab-content -->
                        </div><!-- /.course-details__main-tab-box -->
                    </div><!-- /.course-details__inner -->
                </div><!-- /.col-xl-8 col-lg-7 -->

                <div class="col-xl-4 col-lg-5 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                    <div class="course-details__info">
                        <h3 class="course-details__info__title">Course includes:</h3>
                        <!-- /.course-details__info__title -->
                        <ul class="course-details__info__list list-unstyled">
                            <li>
                                <div class="course-details__info__text">
                                    <div class="course-details__info__text__title">
                                        <span class="course-details__info__icon"><i class="icon-ranking"></i></span>
                                        Level:
                                    </div>
                                    <span>{{ ucfirst($details['level'] ?? 'N/A') }}</span>
                                </div><!-- /.course-details__info__text -->
                            </li>
                            <li>
                                <div class="course-details__info__text">
                                    <div class="course-details__info__text__title">
                                        <span class="course-details__info__icon"><i class="icon-clock-1"></i></span>
                                        Duration:
                                    </div>
                                    <span>{{ $details['duration'] ?? 'N/A' }}</span>
                                </div><!-- /.course-details__info__text -->
                            </li>
                            <li>
                                <div class="course-details__info__text">
                                    <div class="course-details__info__text__title">
                                        <span class="course-details__info__icon"><i class="icon-graduation"></i></span>
                                        Lessons:
                                    </div>
                                    <span>{{ $details['lectures'] ?? '0' }}</span>
                                </div><!-- /.course-details__info__text -->
                            </li>
                            <li>
                                <div class="course-details__info__text">
                                    <div class="course-details__info__text__title">
                                        <span class="course-details__info__icon"><i
                                                class="icon-multiple-users"></i></span>
                                        Enrolled:
                                    </div>
                                    <span>{{ $details['totalentolled'] ?? '0' }}</span>
                                </div><!-- /.course-details__info__text -->
                            </li>
                            <li> 
                                <div class="course-details__info__text">
                                    <div class="course-details__info__text__title">
                                        <span class="course-details__info__icon">
                                            {{-- <i class="icon-medal"></i> --}}
                                            <i class="icon-date"></i>
                                        </span>
                                        {{-- Certifications: --}}
                                        Deadline
                                    </div>
                                    <span>{{ $details['deadline'] ?? 'N/A' }}</span>
                                </div><!-- /.course-details__info__text -->
                            </li>
                            <li>
                                <div class="course-details__info__text">
                                    <div class="course-details__info__text__title">
                                        <span class="course-details__info__icon"><i class="icon-globe"></i></span>
                                        Language:
                                    </div>
                                    <span>{{ $details['language'] ?? 'N/A' }}</span>
                                </div><!-- /.course-details__info__text -->
                            </li>
                        </ul>
                        {{-- <div class="course-details__info__price">This course Fee $49.00</div> --}}
                        <a href="#" class="course-details__info__btn eduhive-btn" data-bs-toggle="modal"
                            data-bs-target="#enrollModal">
                            <span class="eduhive-btn__text">Enroll Now</span>
                            <span class="eduhive-btn__icon">
                                <span class="eduhive-btn__icon__inner"><i class="icon-arrow-right"></i></span>
                            </span>
                        </a><!-- /.eduhive-btn -->
                    </div><!-- /.course-details__info -->
                </div><!-- /.col-xl-4 col-lg-5 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.course-details section-space -->


    <!-- Enroll Modal -->
    <div class="modal fade" id="enrollModal" tabindex="-1" aria-labelledby="enrollModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="enrollModalLabel">Course Enrollment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="enrollForm" method="POST"
                        action="{{ route('courses.enroll', ['slug' => $course['title_url']]) }}">
                        @csrf

                        {{-- send category_id and course title --}}
                        <input type="hidden" name="category_id" value="{{ $course['category_id'] }}">
                        <input type="hidden" name="course_title" value="{{ $course['title'] }}">

                        <div class="mb-3">
                            <label for="full_name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="school_name" class="form-label">School Name</label>
                            <input type="text" class="form-control" id="school_name" name="school_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit Registration</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('courses-js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $('#enrollForm').on('submit', function(e) {
                e.preventDefault();
                let form = $(this);
                let url = form.attr('action');

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        // you can customize response.message in your controller
                        Swal.fire({
                            icon: 'success',
                            title: 'Enrolled!',
                            text: response.message ||
                                'You’ve been registered successfully.'
                        });
                        $('#enrollModal').modal('hide');
                        form[0].reset();
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON?.errors || {};
                        let html = '';
                        $.each(errors, function(key, msgs) {
                            html += msgs.join('<br>') + '<br>';
                        });
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            html: html || 'Something went wrong, please try again.'
                        });
                    }
                });
            });
        });
    </script>
@endsection
