@extends('event.layouts.app')

@section('seo_title', e($seo['title'] ?? 'Byline Learning Solutions '))
@section('seo_description', e($seo['meta_description'] ?? 'Byline Learning Solutions '))
@section('seo_keywords', e($seo['keywords'] ?? 'Byline Learning Solutions '))

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

    <!--Page Header Start-->
    <section class="page-header">
        {{-- <div class="page-header__bg"></div><!-- /.page-header__bg --> --}}
        <div class="page-header__bg"
            style="background-image: url('{{ asset('assets/event/assets/images/hero2.jpg') }}'); background-size: cover;">
        </div>
        {{-- <div class="page-header-shape-1"></div><!-- /.page-header-shape-1 -->
        <div class="page-header-shape-2"></div><!-- /.page-header-shape-2 -->
        <div class="page-header-shape-3"></div><!-- /.page-header-shape-3 --> --}}
        <div class="container">
            <div class="page-header__inner">
                <h2>The Educator Compass</h2>
                <p class="header-p m-0">
                    Bringing Purpose and Clarity to Classroom Assessment.
                </p>
                <a href="#interest-form" class="thm-btn  mt-2"> Submit Interest </a>
            </div>
        </div>
    </section>

    <!--Why The Educator Compass? -->
    {{-- <section class="welcome-one pt-5 pb-5 bg-body">
        <div class="container">
            <div class="section-title mb-2 text-center">
                <h2 class="section-title__title">Why The Educator Compass?</h2>
                <p class="text-start">
                    Assessment sits at the heart of learning — yet for many teachers, it’s
                    become a source of uncertainty, overload, or missed opportunity.
                    <br>
                    As classrooms evolve and national reforms reshape expectations,
                    educators are being asked to do more, with more precision, and often with less clarity.
                </p>

            </div>

            <div class="row mt-2">
                <div class="col-lg-12">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">• To create space within schools for honest reflection.</li>
                        <li class="list-group-item">• To reconnect assessment with learning purpose.</li>
                        <li class="list-group-item">• To help teachers realign their strategies — not through more pressure,
                            but through insight, collaboration, and care.</li>
                        <li class="list-group-item text-danger fw-bold">Aligned with Saudi Arabia’s Vision 2030, this
                            session is designed to meet educators where they are and walk with them toward what’s next.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Why This Session Makes a Difference -->
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
                            <li data-tab="#business" class="tab-btn"><span>Business Growth</span></li>
                            <li data-tab="#financial" class="tab-btn active-btn"><span>Financial Advice</span></li>
                            <li data-tab="#gobal" class="tab-btn"><span>Gobal Solutions</span></li>
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
                                                            <h3 class="finalcial-advice__list-box-title">Highest
                                                                Success Rates</h3>
                                                            <p class="finalcial-advice__list-box-text">Lorem Ipsum
                                                                nibh vel velit auctor aliqu. Aenean sollic tudin,
                                                                lorem is simply free text quis bibendum.</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="financial-advice__icon">
                                                            <span class="icon-checkmark"></span>
                                                        </div>
                                                        <div class="financial-advice__list-box-content">
                                                            <h3 class="finalcial-advice__list-box-title">We build
                                                                experience</h3>
                                                            <p class="finalcial-advice__list-box-text">Lorem Ipsum
                                                                nibh vel velit auctor aliqu. Aenean sollic tudin,
                                                                lorem is simply free text quis bibendum.</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="financial-advice__single-1 financial-advice__single-2">
                                                <p class="financial-advice_-desc">There are many variations of
                                                    passages of lorem ipsum available, but the majority have
                                                    suffered alteration in some form injected humour or randomised
                                                    words which don't look believable.</p>
                                                <ul class="list-unstyled financial-advice__list-box-2">
                                                    <li>If you are going to use a passage</li>
                                                    <li>Lorem Ipsum you need to be sure</li>
                                                    <li>There isn't anything embarrassing</li>
                                                    <li> Hidden in the middle of text</li>
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
                                                            <h3 class="finalcial-advice__list-box-title">Highest
                                                                Success Rates</h3>
                                                            <p class="finalcial-advice__list-box-text">Lorem Ipsum
                                                                nibh vel velit auctor aliqu. Aenean sollic tudin,
                                                                lorem is simply free text quis bibendum.</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="financial-advice__icon">
                                                            <span class="icon-checkmark"></span>
                                                        </div>
                                                        <div class="financial-advice__list-box-content">
                                                            <h3 class="finalcial-advice__list-box-title">We build
                                                                experience</h3>
                                                            <p class="finalcial-advice__list-box-text">Lorem Ipsum
                                                                nibh vel velit auctor aliqu. Aenean sollic tudin,
                                                                lorem is simply free text quis bibendum.</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="financial-advice__single-1 financial-advice__single-2">
                                                <p class="financial-advice_-desc">There are many variations of
                                                    passages of lorem ipsum available, but the majority have
                                                    suffered alteration in some form injected humour or randomised
                                                    words which don't look believable.</p>
                                                <ul class="list-unstyled financial-advice__list-box-2">
                                                    <li>If you are going to use a passage</li>
                                                    <li>Lorem Ipsum you need to be sure</li>
                                                    <li>There isn't anything embarrassing</li>
                                                    <li> Hidden in the middle of text</li>
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
                                                            <h3 class="finalcial-advice__list-box-title">Highest
                                                                Success Rates</h3>
                                                            <p class="finalcial-advice__list-box-text">Lorem Ipsum
                                                                nibh vel velit auctor aliqu. Aenean sollic tudin,
                                                                lorem is simply free text quis bibendum.</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="financial-advice__icon">
                                                            <span class="icon-checkmark"></span>
                                                        </div>
                                                        <div class="financial-advice__list-box-content">
                                                            <h3 class="finalcial-advice__list-box-title">We build
                                                                experience</h3>
                                                            <p class="finalcial-advice__list-box-text">Lorem Ipsum
                                                                nibh vel velit auctor aliqu. Aenean sollic tudin,
                                                                lorem is simply free text quis bibendum.</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="financial-advice__single-1 financial-advice__single-2">
                                                <p class="financial-advice_-desc">There are many variations of
                                                    passages of lorem ipsum available, but the majority have
                                                    suffered alteration in some form injected humour or randomised
                                                    words which don't look believable.</p>
                                                <ul class="list-unstyled financial-advice__list-box-2">
                                                    <li>If you are going to use a passage</li>
                                                    <li>Lorem Ipsum you need to be sure</li>
                                                    <li>There isn't anything embarrassing</li>
                                                    <li> Hidden in the middle of text</li>
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
    <!--Financial Advice End-->


    <!-- About Compass Section Start -->
    {{-- <section class="welcome-one py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section-title mb-2">
                        <h2 class="section-title__title">What Is The Educator Compass?</h2>
                        <span class="section-title__tagline  mb-3">The Educator Compass is a guided, in-school session
                            designed to
                            help teachers reflect on their assessment practices and take purposeful next steps, with clarity
                            and support.</span>
                        <span class="section-title__tagline"> In just 90 minutes, teachers will:</span>
                    </div>
                    <ul class="list-unstyled mt-1">
                        <li>✔ Understand today’s assessment expectations</li>
                        <li>✔ Reflect on current classroom practices</li>
                        <li>✔ Identify strengths and growth areas</li>
                        <li>✔ Explore the right development path</li>
                    </ul>
                    <span class="section-title__tagline text-danger fw-bold  mt-2"> A thoughtful, teacher-first experience
                        —
                        not a lecture, but
                        a conversation</span>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('assets/event/assets/images/why-session.jpg') }}"
                        class="img-fluid rounded shadow-sm" alt="Educator Compass">
                </div>
            </div>
        </div>
    </section> --}}
    <!-- About Compass Section End -->

    <!--Faq One Start-->
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
                                    <h4><span>.</span>To create space within schools for honest reflection</h4>
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
                                    <h4><span>.</span>To reconnect assessment with learning purpose</h4>
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
                                    <h4><span>.</span> To help teachers realign their strategies</h4>
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
                                    <h4><span>.</span>To foster a sense of empowerment and clarity</h4>
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
                                The Educator Compass is a 90-minute, facilitator-led session hosted at your school. It’s not
                                a training, it's an opportunity for teachers to pause, reflect on their current assessment
                                approaches, and identify actionable improvements. Designed with Saudi Arabia’s Vision 2030
                                in mind, this session provides teachers with clarity and practical steps to enhance their
                                assessment strategies.
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
    <!--Faq One End-->


    <!-- Session Structure Section Start -->
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
    <!-- Session Structure Section End -->

    <!-- What You'll Receive Section Start -->
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
    <!-- What You'll Receive Section End -->


    <!-- Session Details -->
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

    <!-- Register / Contact Section Start -->
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
                                        <input type="tel" class="form-control" id="Mobile "
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
    <!-- Register / Contact Section End -->

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
