@extends('frontend.layouts.app')

@section('seo_title', e($seo['title'] ?? 'Byline Learning Solutions '))
@section('seo_description', e($seo['meta_description'] ?? 'Byline Learning Solutions '))
@section('seo_keywords', e($seo['keywords'] ?? 'Byline Learning Solutions '))

@section('frontent-css')
    <style>
        .header-p {
            color: var(--thm-base);
        }
    </style>
@endsection

@section('content')

    <!--Page Header Start-->
    <section class="page-header">
        {{-- <div class="page-header__bg"></div><!-- /.page-header__bg --> --}}
        <div class="page-header__bg"
            style="background-image: url('{{ asset('assets/event/assets/images/hero2.jpg') }}'); background-size: cover;">
        </div>
        <div class="page-header-shape-1"></div><!-- /.page-header-shape-1 -->
        <div class="page-header-shape-2"></div><!-- /.page-header-shape-2 -->
        <div class="page-header-shape-3"></div><!-- /.page-header-shape-3 -->
        <div class="container">
            <div class="page-header__inner">
                <h2>Help Your Teachers Find Direction in a Changing Assessment Landscape</h2>
                <p class="header-p">
                    A school-hosted, in-person session to help educators reflect, realign, and take the next step in their
                    assessment journey — with clarity, not confusion.
                </p>
                <a href="#" class="thm-btn"> Submit Interest </a>
            </div>
        </div>
    </section>


    <!-- Why This Session Matters -->
    <section class="welcome-one pt-5 pb-5 bg-light">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="section-title__title">Why This Session Matters</h2>
                <span class="section-title__tagline">Assessment is no longer just grading – it’s about meaningful
                    learning.</span>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">• Design effective formative assessments</li>
                        <li class="list-group-item">• Use feedback for real student progress</li>
                        <li class="list-group-item">• Align to Vision 2030 expectations</li>
                        <li class="list-group-item">• Differentiate based on learner needs</li>
                        <li class="list-group-item text-danger fw-bold">Most PD programs offer certificates — not clarity.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <!-- About Compass Section Start -->
    <section class="welcome-one py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2 class="section-title__title">What is The Educator Compass?</h2>
                        <span class="section-title__tagline">90-minute, no-cost in-school session</span>
                    </div>
                    <ul class="list-unstyled mt-3">
                        <li>✔ Understand modern assessment expectations</li>
                        <li>✔ Reflect on current practices</li>
                        <li>✔ Identify growth areas</li>
                        <li>✔ Get personalized guidance</li>
                        <li>✔ Interactive & Reflective</li>
                        <li>✔ Tailored to Saudi classrooms</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('assets/event/assets/images/why-session.jpg') }}" class="img-fluid rounded shadow-sm"
                        alt="Educator Compass">
                </div>
            </div>
        </div>
    </section>
    <!-- About Compass Section End -->

    <!-- Session Structure Section Start -->
    <section class="two-boxes py-5">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h2 class="section-title__title">What Happens in the Session?</h2>
            </div>
            <div class="row text-center">
                <div class="col-md-6 col-lg-4 mb-4 p-2">
                    <div class="card h-100 shadow border-0 p-4 hover-shadow">
                        <h5>Guided Assessment Overview</h5>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4  p-2">
                    <div class="card h-100 shadow border-0 p-4 hover-shadow">
                        <h5>Honest Reflection Activities</h5>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4  p-2">
                    <div class="card h-100 shadow border-0 p-4 hover-shadow">
                        <h5>Scenario-Based Simulation</h5>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 mb-4  p-2">
                    <div class="card h-100 shadow border-0 p-4 hover-shadow">
                        <h5>Personal Insight Report</h5>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 mb-4  p-2">
                    <div class="card h-100 shadow border-0 p-4 hover-shadow">
                        <h5>Overview of Masterclasses</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Session Structure Section End -->

    <!-- What You'll Receive Section Start -->
    {{-- <section class="py-5 bg-light">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h2 class="section-title__title">What You’ll Receive</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h5>For Schools</h5>
                    <ul>
                        <li>✓ On-campus faculty development</li>
                        <li>✓ Summary insights for planning</li>
                        <li>✓ No cost, no commitment</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5>For Teachers</h5>
                    <ul>
                        <li>✓ Individual practice report</li>
                        <li>✓ Suggested Masterclass track</li>
                        <li>✓ Real clarity, not just content</li>
                    </ul>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- What You'll Receive Section End -->


    <!-- What You'll Receive Section Start -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h2 class="section-title__title">What You’ll Receive</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">For Schools</h5>
                            <ul class="mb-0">
                                <li>✓ On-campus faculty development</li>
                                <li>✓ Summary insights for planning</li>
                                <li>✓ No cost, no commitment</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">For Teachers</h5>
                            <ul class="mb-0">
                                <li>✓ Individual practice report</li>
                                <li>✓ Suggested Masterclass track</li>
                                <li>✓ Real clarity, not just content</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- What You'll Receive Section End -->


    <!-- Session Details Section Start -->
    <section class="our-mission py-5">
        <div class="container">
            <div class="section-title text-center mb-4">
                <h2 class="section-title__title">Session Details</h2>
            </div>
            <ul class="list-group list-group-flush text-center">
                <li class="list-group-item">📍 Venue: School Auditorium</li>
                <li class="list-group-item">⏰ Duration: 90 minutes</li>
                <li class="list-group-item">👥 Audience: Teachers, Coordinators, Academic Heads</li>
                <li class="list-group-item">🗣️ Language: English & Arabic</li>
                <li class="list-group-item">💰 Cost: Free</li>
            </ul>
        </div>
    </section>
    <!-- Session Details Section End -->

    <!-- Register / Contact Section Start -->
    <section class="message-box bg-light" id="interest-form">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="message-box__left">
                        <div class="section-title text-left">
                            <h2 class="section-title__title">Express Your Interest</h2>
                            <span class="section-title__tagline">We’ll coordinate with your team directly</span>
                        </div>
                        <div class="message-box__social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="clr-fb"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="clr-dri"><i class="fab fa-dribbble"></i></a>
                            <a href="#" class="clr-ins"><i class="fab fa-instagram"></i></a>
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
                                            placeholder="Full Name">
                                        <label for="name">Full Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Email Address">
                                        <label for="email">Email Address</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="school"
                                            placeholder="School Name">
                                        <label for="school">School Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="designation"
                                            placeholder="Designation">
                                        <label for="designation">Designation</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control" id="phone"
                                            placeholder="Phone Number">
                                        <label for="phone">Phone Number</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="month">
                                            <option selected>Choose Month</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                        </select>
                                        <label for="month">Preferred Month</label>
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

@section('frontent-js')

@endsection
