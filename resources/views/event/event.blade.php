@extends('event.layouts.app')

@php
    $isArabic = session('locale') === 'ar';
    app()->setLocale(session('locale', config('app.locale')));

    $locale = app()->getLocale();
@endphp


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

    {{-- <html lang="{{ app()->getLocale() }}" dir="{{ $isArabic ? 'rtl' : 'ltr' }}"> --}}

    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header__bg"
            style="background-image: url('{{ asset('assets/event/assets/images/hero2.jpg') }}'); background-size: cover;">
        </div>
        <div class="page-header-shape-1"></div><!-- /.page-header-shape-1 -->
        <div class="page-header-shape-2"></div><!-- /.page-header-shape-2 -->
        <div class="page-header-shape-3"></div><!-- /.page-header-shape-3 -->
        <div class="container">
            <div class="page-header__inner">
                <h2>
                    {{ __('event.hero.title') }}
                </h2>
                <p class="header-p m-0">
                    {{ __('event.hero.subtitle') }}
                </p>
                <a href="#interest-form" class="thm-btn  mt-2"> {{ __('event.hero.submit') }} </a>
            </div>
        </div>
    </section>


    <!-- Section 1 -->
    <section class="financial-advice pt-2 bg-body">
        <div class="container mt-5">
            <div class="section-title text-center">
                <h2 class="section-title__title">{{ __('event.section1.title') }}</h2>
                <span class="section-title__tagline">{{ __('event.section1.tagline') }}</span>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="financial-advice__box tabs-box">
                        <ul class="tab-btns tab-buttons clearfix list-unstyled">
                            <li data-tab="#business" class="tab-btn"><span>
                                    {{ __('event.section1.tabs.tab1') }}</span>
                            </li>
                            <li data-tab="#financial" class="tab-btn active-btn">
                                <span>{{ __('event.section1.tabs.tab2') }}</span>
                            </li>
                            <li data-tab="#gobal" class="tab-btn"><span>
                                    {{ __('event.section1.tabs.tab3') }}
                                </span>
                            </li>
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
                                                            <h3 class="finalcial-advice__list-box-title">
                                                                {{ __('event.section1.tab1_content.title1') }}
                                                            </h3>
                                                            <p class="finalcial-advice__list-box-text">
                                                                {{ __('event.section1.tab1_content.desc1') }}
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="financial-advice__icon">
                                                            <span class="icon-checkmark"></span>
                                                        </div>
                                                        <div class="financial-advice__list-box-content">
                                                            <h3 class="finalcial-advice__list-box-title m">
                                                                {{ __('event.section1.tab1_content.title2') }}
                                                            </h3>
                                                            <p class="finalcial-advice__list-box-text">
                                                                {{ __('event.section1.tab1_content.desc2') }}
                                                            </p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="financial-advice__single-1 financial-advice__single-2">
                                                <p class="financial-advice_-desc">
                                                    {{ __('event.section1.tab1_content.desc') }}
                                                </p>
                                                <ul class="list-unstyled financial-advice__list-box-2">
                                                    @foreach (__('event.section1.tab1_content.points') as $point)
                                                        <li>{{ $point }}</li>
                                                    @endforeach
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
                                                            <h3 class="finalcial-advice__list-box-title">
                                                                {{ __('event.section1.tab2_content.title1') }}
                                                            </h3>
                                                            <p class="finalcial-advice__list-box-text">
                                                                {{ __('event.section1.tab2_content.desc1') }}
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="financial-advice__icon">
                                                            <span class="icon-checkmark"></span>
                                                        </div>
                                                        <div class="financial-advice__list-box-content">
                                                            <h3 class="finalcial-advice__list-box-title">
                                                                {{ __('event.section1.tab2_content.title2') }}
                                                            </h3>
                                                            <p class="finalcial-advice__list-box-text">
                                                                {{ __('event.section1.tab2_content.desc2') }}
                                                            </p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="financial-advice__single-1 financial-advice__single-2">
                                                <p class="financial-advice_-desc">
                                                    {{ __('event.section1.tab2_content.desc') }}
                                                </p>
                                                <ul class="list-unstyled financial-advice__list-box-2">
                                                    @foreach (__('event.section1.tab2_content.points') as $point)
                                                        <li>{{ $point }}</li>
                                                    @endforeach
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
                                                            <h3 class="finalcial-advice__list-box-title">
                                                                {{ __('event.section1.tab3_content.title1') }}
                                                            </h3>
                                                            <p class="finalcial-advice__list-box-text">
                                                                {{ __('event.section1.tab3_content.desc1') }}
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="financial-advice__icon">
                                                            <span class="icon-checkmark"></span>
                                                        </div>
                                                        <div class="financial-advice__list-box-content">
                                                            <h3 class="finalcial-advice__list-box-title">
                                                                {{ __('event.section1.tab3_content.title2') }}
                                                            </h3>
                                                            <p class="finalcial-advice__list-box-text">
                                                                {{ __('event.section1.tab3_content.desc2') }}
                                                            </p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="financial-advice__single-1 financial-advice__single-2">
                                                <p class="financial-advice_-desc">
                                                    {{ __('event.section1.tab3_content.desc') }}
                                                </p>
                                                <ul class="list-unstyled financial-advice__list-box-2">
                                                    @foreach (__('event.section1.tab3_content.points') as $point)
                                                        <li>{{ $point }}</li>
                                                    @endforeach
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
                <h2 class="section-title__title pt-4"> {{ __('event.section2.title') }} </h2>
                <span class="section-title__tagline">
                    {{ __('event.section2.tagline') }}
                </span>
            </div>
            <div class="row ">
                <div class="col-xl-6">
                    <div class="faq-one__left">
                        <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                            <div class="accrodion active">
                                <div class="accrodion-title">
                                    <h4> {{ __('event.section2.accordions.title1') }} </h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>
                                            {{ __('event.section2.accordions.desc1') }}
                                        </p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            <div class="accrodion">
                                <div class="accrodion-title">
                                    <h4>{{ __('event.section2.accordions.title2') }}</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>
                                            {{ __('event.section2.accordions.desc2') }}
                                        </p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            <div class="accrodion">
                                <div class="accrodion-title">
                                    <h4> {{ __('event.section2.accordions.title3') }} </h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>
                                            {{ __('event.section2.accordions.desc3') }}
                                        </p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            <div class="accrodion">
                                <div class="accrodion-title">
                                    <h4>
                                        {{ __('event.section2.accordions.title4') }}
                                    </h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>
                                            {{ __('event.section2.accordions.desc4') }}
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
                                {{ __('event.section2.box_text') }}
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
                                <h2>{{ __('event.section2.box_duration') }}</h2>
                                <p>{{ __('event.section2.box_unit') }} </p>
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
                <h2 class="section-title__title">{{ __('event.section3.title') }}</h2>
            </div>
            <div class="row text-center">
                @foreach (__('event.section3.cards') as $keyi => $card)
                    <div class="col-md-6 {{ $keyi == 3 || $keyi == 4 ? 'col-lg-6' : ' col-lg-4' }} mb-4 p-2">
                        <div class="card h-100 shadow border-0 p-4 hover-shadow">
                            <h5>{{ $card }}</h5>
                        </div>
                    </div>
                @endforeach
                <span class="section-title__tagline text-danger fw-bold mt-2">
                    {{ __('event.section3.tagline') }}
                </span>
            </div>
        </div>
    </section>
    <!-- Section 3 End -->

    <!-- Section 4 -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h2 class="section-title__title">
                    {{ __('event.section4.title') }}
                </h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('event.section4.forschools') }}
                            </h5>
                            <div class="faq-one__list-box p-2">
                                <ul class="list-unstyled faq-one__list">
                                    @foreach (__('event.section4.schools') as $item)
                                        <li>
                                            <div class="icon">
                                                <span class="icon-tick"></span>
                                            </div>
                                            <div class="text">
                                                <p>{{ $item }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('event.section4.foreducators') }}</h5>
                            <div class="faq-one__list-box p-2">
                                <ul class="list-unstyled faq-one__list">

                                    @foreach (__('event.section4.educators') as $item)
                                        <li>
                                            <div class="icon">
                                                <span class="icon-tick"></span>
                                            </div>
                                            <div class="text">
                                                <p> {{ $item }}</p>
                                            </div>
                                        </li>
                                    @endforeach
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
            <h2 class="section-title__title mb-4 ">{{ __('event.section5.title') }}</h2>
            <ul class="list-group list-group-flush  text-start">
                <li class="list-group-item"> <span class="fw-bold">{{ __('event.section5.FormatTitle') }} :</span>
                    {{ __('event.section5.Format') }}</li>
                <li class="list-group-item"><span class="fw-bold"> {{ __('event.section5.LocationTitle') }} : </span>
                    {{ __('event.section5.Location') }}
                </li>
                <li class="list-group-item"><span class="fw-bold"> {{ __('event.section5.AudienceTitle') }} : </span>
                    {{ __('event.section5.Audience') }}
                </li>
                <li class="list-group-item"><span class="fw-bold"> {{ __('event.section5.DurationTitle') }} : </span>
                    {{ __('event.section5.Duration') }}
                </li>
                <li class="list-group-item"><span class="fw-bold">{{ __('event.section5.LanguagesTitle') }} : </span>
                    {{ __('event.section5.Languages') }}
                </li>
                <li class="list-group-item"><span class="fw-bold"> {{ __('event.section5.CostTitle') }} : </span>
                    {{ __('event.section5.Cost') }} 
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
                            <h2 class="section-title__title">{{ __('event.section6.title') }}</h2>
                            <span class="section-title__tagline"> {{ __('event.section6.tagline') }} </span>
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
                                            placeholder="{{ __('event.section6.form.full_name_placeholder') }}" required>
                                        <label for="name">{{ __('event.section6.form.full_name') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="school"
                                            placeholder="{{ __('event.section6.form.school_name_placeholder') }}"
                                            required>
                                        <label for="school">{{ __('event.section6.form.school_name') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="designation"
                                            placeholder="{{ __('event.section6.form.designation_placeholder') }}"
                                            required>
                                        <label for="designation">{{ __('event.section6.form.designation') }}</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email"
                                            placeholder="{{ __('event.section6.form.email_placeholder') }}" required>
                                        <label for="email">{{ __('event.section6.form.email') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control" id="Mobile" name="mobile_number"
                                            placeholder="{{ __('event.section6.form.mobile_placeholder') }}">
                                        <label for="Mobile ">{{ __('event.section6.form.mobile') }}</label>
                                    </div>
                                </div>

                                {{-- <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="preferred_month" id="month" required>
                                            <option selected>{{ __('event.section6.form.preferred_month_placeholder') }}
                                            </option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                        </select>
                                        <label for="month">{{ __('event.section6.form.preferred_month') }}</label>
                                    </div>
                                </div> --}}

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="preferred_month" id="month" required>
                                            <option selected disabled>
                                                {{ __('event.section6.form.preferred_month_placeholder') }}
                                            </option>
                                            <option value="May"> {{ __('event.section6.months.may') }} </option>
                                            <option value="June"> {{ __('event.section6.months.june') }} </option>
                                            <option value="July"> {{ __('event.section6.months.july') }} </option>
                                        </select>
                                        <label for="month">{{ __('event.section6.form.preferred_month') }}</label>
                                    </div>
                                </div>

                                {{-- <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="participants" min="1"
                                            placeholder="{{ __('event.section6.form.participants_placeholder') }}"
                                            required>
                                        <label for="participants">{{ __('event.section6.form.participants') }}</label>
                                    </div>
                                </div> --}}
                                {{-- 
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="notes" placeholder="{{ __('event.section6.form.notes_placeholder') }}"
                                            style="height: 120px"></textarea>
                                        <label for="notes">{{ __('event.section6.form.notes') }}</label>
                                    </div>
                                </div> --}}

                                <!-- Participants -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="estimated_participants"
                                            name="estimated_participants" min="1" name="estimated_participants"
                                            placeholder="{{ __('event.section6.form.participants_placeholder') }}"
                                            required>
                                        <label for="estimated_participants">
                                            {{ __('event.section6.form.participants') }}
                                        </label>
                                    </div>
                                </div>

                                <!-- Notes -->
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="notes" name="additional_notes"
                                            placeholder="{{ __('event.section6.form.notes_placeholder') }}" style="height: 120px"></textarea>
                                        <label for="notes">
                                            {{ __('event.section6.form.notes') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12 text-end">
                                    <button type="submit"
                                        class="btn btn-primary px-5 py-2">{{ __('event.section6.form.submit') }}</button>
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
                    mobile_number: $("#Mobile").val(),
                    preferred_month: $("#month").val(),
                    estimated_participants: $("#estimated_participants").val(),
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
