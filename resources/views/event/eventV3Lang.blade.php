@extends('event.layouts.app')

@section('seo_title', e(__('event.seo.title') ?? 'Legato Design'))
@section('seo_description', e(__('event.seo.description') ?? 'Legato Design'))
@section('seo_keywords', e(__('event.seo.keywords') ?? 'Legato Design'))

@section('event-css')
    <style>
        .header-p {
            color: var(--thm-base);
        }

        .hover-shadow {
            transition: 0.3s ease-in-out;
        }

        .hover-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
    </style>


@endsection

@section('event')
    @php
        $isArabic = session('locale') === 'ar';
        app()->setLocale(session('locale', config('app.locale')));
    @endphp
    <html lang="{{ app()->getLocale() }}" dir="{{ $isArabic ? 'rtl' : 'ltr' }}">

    <!--Page Header Start-->
    <section class="page-header">
        {{-- <div class="page-header__bg"></div><!-- /.page-header__bg -->  --}}
        <div class="page-header__bg"
            style="background-image: url('{{ asset('assets/event/assets/images/hero2.jpg') }}'); background-size: cover;">
        </div>
        <div class="page-header-shape-1"></div><!-- /.page-header-shape-1 -->
        <div class="page-header-shape-2"></div><!-- /.page-header-shape-2 -->
        <div class="page-header-shape-3"></div><!-- /.page-header-shape-3 -->
        <div class="container">
            <div class="page-header__inner">
                {{-- <h2></h2> --}}
                <h2>
                    {{-- The Educator Compass  --}}
                    {{ __('event.hero.title') }}
                </h2>
                <p class="header-p m-0">
                    {{-- Bringing Purpose and Clarity to Classroom Assessment --}}
                    {{ __('event.hero.subtitle') }}
                </p>
                <a href="#interest-form" class="thm-btn  mt-2"> Submit Interest </a>
            </div>
        </div>
    </section>

    <!-- Section 1 -->
    <section class="financial-advice pt-2 bg-body">
        <div class="container mt-5">
            <div class="section-title text-center">
                <h2 class="section-title__title">Why This Session Makes a Difference </h2>
                <span class="section-title__tagline">In Saudi Arabia, assessment is evolving to measure meaningful
                    learning.</span>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="financial-advice__box tabs-box">
                        <ul class="tab-btns tab-buttons clearfix list-unstyled">
                            <li data-tab="#business" class="tab-btn"><span>Actionable Assessments</span></li>
                            <li data-tab="#financial" class="tab-btn active-btn"><span>Impactful Feedback</span></li>
                            <li data-tab="#gobal" class="tab-btn"><span>Personalized Strategies</span></li>
                        </ul>
                        <div class="tabs-content">

                            <div class="tab " id="business">
                                <div class="financial-advice__content">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="financial-advice__single-1">
                                                <ul class="list-unstyled financial-advice__list-box">
                                                    <li>
                                                        <div class="financial-advice__icon">
                                                            <span class="icon-checkmark"></span>
                                                        </div>
                                                        <div class="financial-advice__list-box-content">
                                                            <h3 class="finalcial-advice__list-box-title">Design with Purpose
                                                            </h3>
                                                            <p class="finalcial-advice__list-box-text">
                                                                Learn to create assessments aligned with standards to guide
                                                                learning, not just grade it.
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="financial-advice__icon">
                                                            <span class="icon-checkmark"></span>
                                                        </div>
                                                        <div class="financial-advice__list-box-content">
                                                            <h3 class="finalcial-advice__list-box-title m">Track Meaningful
                                                                Progress</h3>
                                                            <p class="finalcial-advice__list-box-text">
                                                                Use assessments to track student progress and guide
                                                                teaching, beyond just grades, to boost engagement.
                                                            </p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="financial-advice__single-1 financial-advice__single-2">
                                                <p class="financial-advice_-desc">
                                                    Teachers will leave this session with tangible, real-world strategies
                                                    for designing assessments that drive meaningful learning forward. We
                                                    focus on practical, easy-to-implement techniques that make assessment
                                                    meaningful and effective.
                                                </p>
                                                <ul class="list-unstyled financial-advice__list-box-2">
                                                    <li> Purposeful assessment design</li>
                                                    <li> Alignment with Vision 2030</li>
                                                    <li> Effective student progress tracking</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="financial-advice__single-1 financial-advice__single-3">
                                                <div class="financial-advice__img">
                                                    <img src="{{ asset('assets/event/assets/images/t1.jpg') }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab active-tab" id="financial">
                                <div class="financial-advice__content">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="financial-advice__single-1">
                                                <ul class="list-unstyled financial-advice__list-box">
                                                    <li>
                                                        <div class="financial-advice__icon">
                                                            <span class="icon-checkmark"></span>
                                                        </div>
                                                        <div class="financial-advice__list-box-content">
                                                            <h3 class="finalcial-advice__list-box-title">Motivate Change
                                                            </h3>
                                                            <p class="finalcial-advice__list-box-text">Inspire students to
                                                                see feedback as a tool for growth, not perfection. </p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="financial-advice__icon">
                                                            <span class="icon-checkmark"></span>
                                                        </div>
                                                        <div class="financial-advice__list-box-content">
                                                            <h3 class="finalcial-advice__list-box-title">Actionable Insights
                                                            </h3>
                                                            <p class="finalcial-advice__list-box-text">Learn how to offer
                                                                clear, specific advice that drives a student’s tangible
                                                                progress.</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="financial-advice__single-1 financial-advice__single-2">
                                                <p class="financial-advice_-desc">Teachers will explore how to transform
                                                    their responses into powerful tools for student growth. This session
                                                    equips educators with the skills to provide input that drives
                                                    improvement, encourages self-reflection, and fosters a growth mindset.
                                                    Learn how to:</p>
                                                <ul class="list-unstyled financial-advice__list-box-2">
                                                    <li> Encourage Improvement</li>
                                                    <li> Empower Student Ownership</li>
                                                    <li> Foster Teacher-Student Collaboration</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="financial-advice__single-1 financial-advice__single-3">
                                                <div class="financial-advice__img">
                                                    <img src="{{ asset('assets/event/assets/images/t1.jpg') }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab" id="gobal">
                                <div class="financial-advice__content">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="financial-advice__single-1">
                                                <ul class="list-unstyled financial-advice__list-box">
                                                    <li>
                                                        <div class="financial-advice__icon">
                                                            <span class="icon-checkmark"></span>
                                                        </div>
                                                        <div class="financial-advice__list-box-content">
                                                            <h3 class="finalcial-advice__list-box-title">Differentiate
                                                                Effectively:</h3>
                                                            <p class="finalcial-advice__list-box-text">Discover how to adapt
                                                                assessments and teaching methods to engage and support all
                                                                learning styles and abilities.</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="financial-advice__icon">
                                                            <span class="icon-checkmark"></span>
                                                        </div>
                                                        <div class="financial-advice__list-box-content">
                                                            <h3 class="finalcial-advice__list-box-title">Foster
                                                                Student-Centered Learning:</h3>
                                                            <p class="finalcial-advice__list-box-text"> Gain strategies to
                                                                build a personalized, inclusive classroom that empowers
                                                                students to own their learning.</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="financial-advice__single-1 financial-advice__single-2">
                                                <p class="financial-advice_-desc">Teachers will gain insights on tailoring
                                                    assessments to meet each student’s needs, fostering an inclusive,
                                                    supportive environment. This session equips them with skills to
                                                    differentiate instruction, boosting engagement and progress. Explore how
                                                    to:</p>
                                                <ul class="list-unstyled financial-advice__list-box-2">
                                                    <li>Adapt to diverse learner needs</li>
                                                    <li>Maximize individual potential</li>
                                                    <li>Build inclusive learning spaces</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="financial-advice__single-1 financial-advice__single-3">
                                                <div class="financial-advice__img">
                                                    <img src="{{ asset('assets/event/assets/images/t1.jpg') }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section 1 End-->

    <!-- Section 2 -->
    <section class="faq-one mt-0 pt-0 bg-light">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="section-title__title pt-4">What is The Educator Compass?</h2>
                <span class="section-title__tagline">
                    A session designed to meet educators where they are and walk with them toward what’s next.
                </span>
            </div>
            <div class="row ">
                <div class="col-xl-6">
                    <div class="faq-one__left">
                        <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                            <div class="accrodion active">
                                <div class="accrodion-title">
                                    <h4>To create space within schools for honest reflection</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p> We provide teachers with a dedicated time to pause and reflect on their current
                                            assessment practices, without the pressure of external demands. This session
                                            helps educators gain clarity and make thoughtful decisions about their next
                                            steps.
                                        </p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            <div class="accrodion">
                                <div class="accrodion-title">
                                    <h4>To reconnect assessment with learning purpose</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p> Assessment should be a tool for student growth, not just an obligation. This
                                            session empowers teachers to realign their assessments with the true purpose of
                                            supporting meaningful learning, ensuring that every assessment has value beyond
                                            a grade.
                                        </p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            <div class="accrodion">
                                <div class="accrodion-title">
                                    <h4> To help teachers realign their strategies</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>The focus isn’t on pushing teachers harder, but on offering insights and
                                            strategies that fit their current needs. Collaboration with peers and experts
                                            fosters a supportive environment where teachers can grow and adjust their
                                            practices with confidence.
                                        </p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            <div class="accrodion">
                                <div class="accrodion-title">
                                    <h4>To foster a sense of empowerment and clarity</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>Rather than adding more to teachers’ plates, we aim to help educators gain
                                            confidence in their assessment approaches. By providing clear, actionable
                                            strategies, we ensure that teachers feel empowered to lead their classrooms with
                                            purpose and clarity.
                                        </p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="faq-one__right">
                        <div class="faq-one__img">
                            <img src="{{ asset('assets/event/assets/images/s2.jpg') }}" alt="">
                        </div>
                        <div class="row faq-one__bottom  align-items-center">
                            <div class="col-sm-8 faq-one__list-box">
                                The Educator Compass is a 90-minute, facilitator-led session at your school. It offers
                                teachers a chance to pause, reflect on their assessment practices, and identify actionable
                                improvements. Aligned with Saudi Arabia’s Vision 2030, the session provides clear, practical
                                steps to enhance assessment strategies.
                            </div>
                            <div class="col-sm-4 faq-one__experience-box">
                                <div style="color: white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2M12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8s8 3.58 8 8s-3.58 8-8 8" />
                                        <path fill="currentColor" d="M12.5 7H11v6l5.25 3.15l.75-1.23l-4.5-2.67z" />
                                    </svg>
                                </div>
                                <h2>90</h2>
                                <p>Minutes </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section 2 End-->

    <!-- Section 3  -->
    <section class="two-boxes py-5">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h2 class="section-title__title">What Happens in the Session?</h2>
            </div>
            <div class="row text-center">
                <div class="col-md-6 col-lg-4 mb-4 p-2">
                    <div class="card h-100 shadow border-0 p-4 hover-shadow">
                        <h5>Explore Modern Strategies</h5>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4  p-2">
                    <div class="card h-100 shadow border-0 p-4 hover-shadow">
                        <h5>Reflect & Collaborate </h5>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4  p-2">
                    <div class="card h-100 shadow border-0 p-4 hover-shadow">
                        <h5>Try Practical Applications </h5>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 mb-4  p-2">
                    <div class="card h-100 shadow border-0 p-4 hover-shadow">
                        <h5>Receive Insight Report</h5>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 mb-4  p-2">
                    <div class="card h-100 shadow border-0 p-4 hover-shadow">
                        <h5>Discover Aligned Masterclasses</h5>
                    </div>
                </div>
                <span class="section-title__tagline text-danger fw-bold mt-2"> The experience is practical, personalized,
                    and built to support real change. </span>
            </div>
        </div>
    </section>
    <!-- Section 3 End -->

    <!-- Section 4 -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h2 class="section-title__title">What Awaits You </h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">For Schools</h5>
                            <div class="faq-one__list-box p-2">
                                <ul class="list-unstyled faq-one__list">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-tick"></span>
                                        </div>
                                        <div class="text">
                                            <p>In-school, time-efficient session</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-tick"></span>
                                        </div>
                                        <div class="text">
                                            <p> Insightful faculty-wide snapshot </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-tick"></span>
                                        </div>
                                        <div class="text">
                                            <p> PD needs, clearly identified </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-tick"></span>
                                        </div>
                                        <div class="text">
                                            <p>No cost, no pressure </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">For Educators</h5>
                            <div class="faq-one__list-box p-2">
                                <ul class="list-unstyled faq-one__list">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-tick"></span>
                                        </div>
                                        <div class="text">
                                            <p>Personalized reflection report </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-tick"></span>
                                        </div>
                                        <div class="text">
                                            <p>Strategies that work tomorrow </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-tick"></span>
                                        </div>
                                        <div class="text">
                                            <p> Suggested Masterclass pathways</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-tick"></span>
                                        </div>
                                        <div class="text">
                                            <p> Real clarity, not just content </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section 4 End -->

    <!-- Section 5 -->
    <section class="py-5" data-aos="fade-up">
        <div class="container  text-center">
            <h2 class="section-title__title mb-4 ">Your Session at a Glance </h2>
            <ul class="list-group list-group-flush  text-start">
                <li class="list-group-item"> <span class="fw-bold">Format: </span> In-Person, Interactive Session </li>
                <li class="list-group-item"><span class="fw-bold"> Location: </span> At Your School </li>
                <li class="list-group-item"><span class="fw-bold"> Audience: </span> Teachers, Coordinators, Academic
                    Heads </li>
                <li class="list-group-item"><span class="fw-bold"> Duration: </span> 90 Minutes </li>
                <li class="list-group-item"><span class="fw-bold"> Languages: </span> Arabic / English / Bilingual</li>
                <li class="list-group-item"><span class="fw-bold"> Cost: </span> None — This is a Consultative Initiative
                </li>
            </ul>
        </div>
    </section>
    <!-- Section 5 End -->

    <!-- Section 6 -->
    <section class="message-box bg-light" id="interest-form">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="message-box__left">
                        <div class="section-title text-left">
                            <h2 class="section-title__title">Ready to Experience It at Your School?</h2>
                            <span class="section-title__tagline">Fill out the form, and our team will be in touch to
                                coordinate the details.</span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-7">
                    <div class="message-box__right">
                        <form action="#" class="comment-one__form contact-form-validated">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Full Name" required>
                                        <label for="name">Full Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="school"
                                            placeholder="School Name" required>
                                        <label for="school">School Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="designation"
                                            placeholder="Designation" required>
                                        <label for="designation">Designation</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Email"
                                            required>
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control" id="Mobile"
                                            placeholder="Mobile Number">
                                        <label for="Mobile ">Mobile Number</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="preferred_month" id="month" required>
                                            <option selected>Choose Month</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                        </select>
                                        <label for="month">Preferred Month </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="number" min="1"
                                            placeholder="Estimated Number of Participants" required>
                                        <label for="number">Estimated Number of Participants </label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="notes" placeholder="Additional Notes" style="height: 120px"></textarea>
                                        <label for="notes">Additional Notes</label>
                                    </div>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary px-5 py-2">Submit Interest</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section 6 End -->

@endsection

@section('event-js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $(".comment-one__form").on("submit", function(e) {
                e.preventDefault();

                const data = {
                    full_name: $("#name").val(),
                    school_name: $("#school").val(),
                    designation: $("#designation").val(),
                    email: $("#email").val(),
                    mobile_number: $("#phone").val(),
                    preferred_month: $("#month").val(),
                    estimated_participants: $("#number").val(),
                    additional_notes: $("#notes").val()
                };

                $.ajax({
                    url: "{{ route('registration.submit') }}", // Update route name accordingly
                    method: "POST",
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Please wait...',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading()
                            }
                        });
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Submitted!',
                            text: response.message,
                        });

                        $(".comment-one__form")[0].reset(); // Reset the form
                    },
                    error: function(xhr) {
                        let msg = 'Something went wrong. Please try again later.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            msg = xhr.responseJSON.message;
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: msg,
                        });
                    }
                });
            });
        });
    </script>

@endsection
