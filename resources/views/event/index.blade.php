<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Lagato - Conference </title>
    <meta name="author" content="legato design">
    <meta name="description" content="legato design">
    <meta name="keywords" content="legato design" />
    <meta name="robots" content="INDEX">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons - Place favicon.ico in the root directory -->

    @isset($AppSettings->logo)
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('uploads/' . $AppSettings->logo) }}" />
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('uploads/' . $AppSettings->logo) }}">
    @endisset

    {{-- <link rel="manifest" href="{{ asset('assets/event/assets/img/favicons/manifest.js') }}on"> --}}
    {{-- <meta name="msapplication-TileColor" content="#ffffff"> --}}
    {{-- <meta name="msapplication-TileImage" content="{{ asset('assets/event/assets/img/favicons/ms-icon-144x144.png') }}"> --}}
    {{-- <meta name="theme-color" content="#ffffff"> --}}

    <!--======= Google Fonts ======== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap"
        rel="stylesheet">

    <!--======== All CSS File ========= -->
    <!-- Bootstrap -->
    {{-- <!-- <link rel="stylesheet" href="{{ asset('assets/event/assets/css/app.min.css') }}"> --> --}}
    <link rel="stylesheet" href="{{ asset('assets/event/assets/css/bootstrap.min.css') }}">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('assets/event/assets/css/fontawesome.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('assets/event/assets/css/magnific-popup.min.css') }}">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('assets/event/assets/css/slick.min.css') }}">
    <!-- Custom Phone Number Input -->
    <link rel="stylesheet"
        href="https://cdn.js') }}delivr.net/npm/intl-tel-input@23.7.3/build/css/intlTelInput.css') }}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/event/assets/css/style.css') }}">
</head>

<body>

    <!--=======  Header  ==============-->
    <header class="vs-header">
        <!-- Header Top -->
        <div class="header-top v2">
            <div class="container">
                <div class="row align-items-center justify-content-between gy-1 text-center text-lg-start">
                    <div class="col-lg-auto d-none d-lg-block">
                        <p class="header-text"><i class="fas fa-map-marker-alt"></i>12/7 new town, 245x Town 1214
                            Street,
                            United State
                        </p>
                    </div>
                    <div class="col-lg-auto">
                        <div class="header-right">
                            <div class="header-social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                            <div class="header-links d-none d-md-flex">
                                <a href=""><i class="fas fa-user"></i>Register</a>
                                <a href=""><i class="fas fa-lock"></i>Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-inner style2">
            <div class="container">
                <div class="menu-top">
                    <div class="row gx-50 justify-content-between align-items-center gx-sm-0">
                        <div class="col">
                            <div class="header-logo">
                                <a href="index.html"><img src="{{ asset('assets/event/assets/img/logo.svg') }}"
                                        alt="Eventino" class="logo" width="135" height="60px"></a>
                            </div>
                        </div>
                        <div class="col-auto header-info d-none d-lg-flex pe-0">
                            <div class="header-info_icon"><i class="fas fa-envelope"></i></div>
                            <div class="media-body">
                                <span class="header-info_label">Email Us:</span>
                                <div class="header-info_link"><a href="mailto:example@gmail.com">example@gmail.com</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto header-info d-none d-lg-flex pe-0">
                            <div class="header-info_icon"><i class="fas fa-phone-alt"></i></div>
                            <div class="media-body">
                                <span class="header-info_label">Call us 24/7</span>
                                <div class="header-info_link"><a href="tel:+052699256693">052 (699) 256 - 693</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="d-none d-xl-inline-flex">
                                <a href="about.html" class="vs-btn" tabindex="0">
                                    Make An Appointment
                                </a>
                            </div>
                            <button class="vs-menu-toggle d-inline-block d-lg-none"><i class="fal fa-bars"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <!--======= Hero Area =========-->
    <section>
        <div class="vs-carousel style2" data-slide-show="1" data-fade="true" data-arrows="false">
            <div>
                <div class="hero-inner style2">
                    <div class="overlay"></div>
                    <div class="hero-bg" data-bg-src="{{ asset('assets/event/assets/images/hero1.jpg') }}"></div>
                    <img src="{{ asset('assets/event/assets/img/shapes/h-1-1.png') }}" alt="shapes"
                        class="hero-shape1">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-lg-6 mx-auto">
                                <div class="hero-content style2 text-center">
                                    <span class="hero-subtitle">Get Best event Management</span>
                                    <h1 class="hero-title">Help Your Teachers Find Direction</h1>
                                    <p class="hero-text">A school-hosted, in-person session to help educators reflect,
                                        realign, and take
                                        the next step in their assessment journey — with clarity, not confusion.</p>
                                    <div class="hero-btns justify-content-center">
                                        <a href="about.html" class="vs-btn">
                                            About Us
                                        </a>
                                        <a href="about.html" class="vs-btn style3">
                                            Get Started
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="hero-inner style2">
                    <div class="overlay"></div>
                    <div class="hero-bg" data-bg-src="{{ asset('assets/event/assets/images/hero2.jpg') }}"></div>
                    <img src="{{ asset('assets/event/assets/img/shapes/h-1-1.png') }}" alt="shapes"
                        class="hero-shape1">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-lg-7 mx-auto">
                                <div class="hero-content style2 text-center">
                                    <span class="hero-subtitle">Get Best event Management</span>
                                    <h1 class="hero-title">Global Marketing Meetup Strategies for 2025</h1>
                                    <p class="hero-text">Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam
                                        vehicula lentum sed
                                        sit
                                        amet amet quam vehicula dui amet quam vehicula.</p>
                                    <div class="hero-btns justify-content-center">
                                        <a href="about.html" class="vs-btn">
                                            About Us
                                        </a>
                                        <a href="about.html" class="vs-btn style3">
                                            Get Started
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div>
        <div class="container">
            <div class="position-relative">
                <div class="vs-carousel brand-wrap2" data-slide-show="4" data-lg-slide-show="3"
                    data-md-slide-show="2" id="brand-slider1">
                    <div>
                        <div class="brand-style1">
                            <img src="{{ asset('assets/event/assets/img/brand/b-1-1.svg') }}" alt="brand">
                        </div>
                    </div>
                    <div>
                        <div class="brand-style1">
                            <img src="{{ asset('assets/event/assets/img/brand/b-1-2.svg') }}" alt="brand">
                        </div>
                    </div>
                    <div>
                        <div class="brand-style1">
                            <img src="{{ asset('assets/event/assets/img/brand/b-1-3.svg') }}" alt="brand">
                        </div>
                    </div>
                    <div>
                        <div class="brand-style1">
                            <img src="{{ asset('assets/event/assets/img/brand/b-1-4.svg') }}" alt="brand">
                        </div>
                    </div>
                    <div>
                        <div class="brand-style1">
                            <img src="{{ asset('assets/event/assets/img/brand/b-1-5.svg') }}" alt="brand">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End Area -->

    <!-- About Area Start -->
    <section class="about space-top space-extra-bottom">
        <div class="container">
            <div class="row gx-40 align-items-center">
                <div class="col-lg-6">
                    <div class="img-box2 text-center">
                        <!-- <div class="card-style2">
              <span class="number"><span>15</span>+</span>
              <h3 class="title">Years of Experience</h3>
            </div> -->
                        <img src="{{ asset('assets/event/assets/images/why-session.jpg') }}" alt="about">
                    </div>
                </div>
                <div class="col-lg-6 mb-30">
                    <span class="sec-subtitle">Why This Session Matters</span>
                    <h2 class="sec-title">Measuring learning meaningfully.</h2>
                    <p>In Saudi Arabia’s evolving educational ecosystem, assessment is no longer just about grading —
                        it’s about
                        measuring learning meaningfully.</p>
                    <div class="list-style1 style2">
                        <ul>
                            <li><i class="fal fa-check-circle"></i> Design effective formative assessments </li>
                            <li><i class="fal fa-check-circle"></i> Use feedback for real student progress.</li>
                            <li><i class="fal fa-check-circle"></i> Align to Vision 2030 expectations.</li>
                            <li><i class="fal fa-check-circle"></i> Differentiate based on learner needs.</li>
                        </ul>
                    </div>
                    <p>And most professional development programs… offer certificates, not clarity.</p>
                    <div class="d-inline-flex">
                        <a href="about.html" class="vs-btn" tabindex="0">
                            More Information
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->

    <!-- Feature Area -->
    <section class="feature-layout2 py-5">
        <div class="container">
            <h2 class="sec-title text-center mb-5">Measuring learning meaningfully.</h2>
            <div class="row " data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2"
                data-md-slide-show="2">
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="feature-style2">
                        <div class="feature-icon">
                            <img src="{{ asset('assets/event/assets/img/icons/f-1-1.svg') }}" alt="feature icon 1">
                        </div>
                        <h3 class="feature-title h5">assessment expectations</h3>
                        <p class="feature-text"> Design effective formative assessments</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="feature-style2">
                        <div class="feature-icon">
                            <img src="{{ asset('assets/event/assets/img/icons/f-1-2.svg') }}" alt="feature icon 1">
                        </div>
                        <h3 class="feature-title h5">current practices</h3>
                        <p class="feature-text"> Use feedback for real student progress</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="feature-style2">
                        <div class="feature-icon">
                            <img src="{{ asset('assets/event/assets/img/icons/f-1-3.svg') }}" alt="feature icon 1">
                        </div>
                        <h3 class="feature-title h5">strength and growth</h3>
                        <p class="feature-text"> Align to Vision 2030 expectations</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="feature-style2">
                        <div class="feature-icon">
                            <img src="{{ asset('assets/event/assets/img/icons/f-1-4.svg') }}" alt="feature icon 1">
                        </div>
                        <h3 class="feature-title h5">development guidance</h3>
                        <p class="feature-text"> Differentiate based on learner needs</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Area End -->

    <!-- Events Grid -->
    <div class="event-details space-top space-extra-bottom">
        <div class="container">
            <h2 class="sec-title text-center mb-5">What You’ll Receive</h2>

            <div class="row">

                <div class="col-md-6 Business Art More">
                    <div class="event-style3">
                        <div class="event-img">
                            <img src="{{ asset('assets/event/assets/images/school.jpg') }}" alt="e 1 1">
                            <div class="event-tags">
                                <a href="event-details.html">Schools</a>
                            </div>
                        </div>
                        <div class="event-content">
                            <div class="event-meta">
                                <ul>
                                    <li>
                                        <span><i class="fas fa-clock"></i>08:00am - 22:00pm</span>
                                    </li>
                                    <li>
                                        <span><i class="fas fa-map-marker-alt"></i>245x Town 1214 Street, US</span>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="event-title">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod.
                            </h3>
                            <p class="event-text">
                            <h6> - On-campus faculty development </h6>
                            <h6> - Summary insights for planning </h6>
                            <h6> - No cost, no commitment </h6>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 Business Art More">
                    <div class="event-style3">
                        <div class="event-img">
                            <img src="{{ asset('assets/event/assets/images/teachers.jpg') }}" alt="e 1 1">
                            <div class="event-tags">
                                <a href="event-details.html">Teachers</a>
                            </div>
                        </div>
                        <div class="event-content">
                            <div class="event-meta">
                                <ul>
                                    <li>
                                        <span><i class="fas fa-clock"></i>08:00am - 22:00pm</span>
                                    </li>
                                    <li>
                                        <span><i class="fas fa-map-marker-alt"></i>245x Town 1214 Street, US</span>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="event-title">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod.
                            </h3>
                            <p class="event-text">
                            <h6> - Individual practice report </h6>
                            <h6> - Masterclass suggestions </h6>
                            <h6> - Clarity, not just content </h6>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Events Grid End -->


    <!-- Event Registration -->
    <section class="ebooking-wrap1 smoke-bg">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6 mb-30">
                    <h2 class="sec-title">Please Complete Registration Within 12.00 Hours</h2>
                    <p class="sec-text mb-0">After 12.00 hours, the reservation we’re holding will be released to
                        others.</p>
                </div>
                <div class="col-lg-auto mb-30">
                    <ul class="offer-counter" data-offer-date="12/08/2024">
                        <li>
                            <div class="day count-number">00</div><span class="count-name">Days</span>
                        </li>
                        <li>
                            <div class="hour count-number">00</div><span class="count-name">Hours</span>
                        </li>
                        <li>
                            <div class="minute count-number">00</div><span class="count-name">Minutes</span>
                        </li>
                        <li>
                            <div class="seconds count-number">00</div><span class="count-name">Seconds</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Event Registration End -->
    <!-- Event Details -->
    <div class="space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h3 class="sec-title">Order Summary</h3>
                    <div class="order-summmary ebooking-wrap2">
                        <table>
                            <tr>
                                <th>Event Title</th>
                                <th>Cost</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                            <tr>
                                <td>Service And Getaway Fee</td>
                                <td>$199.00</td>
                                <td>05</td>
                                <td>$995.00</td>
                            </tr>
                            <tr>
                                <td>Dhaka University Festival...</td>
                                <td>$199.00</td>
                                <td>05</td>
                                <td>$995.00</td>
                            </tr>
                            <tr>
                                <td>Order Total</td>
                                <td> - </td>
                                <td> - </td>
                                <td>$1,990.00</td>
                            </tr>
                        </table>
                    </div>
                    <h3 class="sec-title mb-30">Registration Information</h3>
                    <form class="form-style4 ajax-contact mb-50" action="mail.php" method="post">
                        <h4 class="sec-title h5 mb-25">Ticket Buyer</h4>
                        <div class="row gx-20 mb-20">
                            <div class="col-md-6 form-group">
                                <input class="form-control" type="text" name="fname" id="finame"
                                    placeholder="First Name">
                            </div>
                            <div class="col-md-6 form-group">
                                <input class="form-control" type="text" name="lname" id="laname"
                                    placeholder="Last Name">
                            </div>
                            <div class="col-md-6 form-group">
                                <input class="form-control" type="email" name="email" id="email"
                                    placeholder="Email Address">
                            </div>
                            <div class="col-md-6 form-group">
                                <input class="form-control" type="email" name="email" id="email"
                                    placeholder="Confirm Email Address">
                            </div>
                        </div>
                        <h4 class="sec-title h5 mb-25">Payment</h4>
                        <div class="row gx-20 mb-10">
                            <div class="col-md-6 form-group">
                                <select class="form-control" name="subject" id="subject" tabindex="0">
                                    <option value="Select Your Payment Method">Select Your Payment Method</option>
                                    <option value="Oil Change">Oil Change</option>
                                    <option value="Tire Rotation">Tire Rotation</option>
                                    <option value="Brake Inspection">Brake Inspection</option>
                                    <option value="Engine Tune-Up">Engine Tune-Up</option>
                                    <option value="Transmission Flush">Transmission Flush</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <input class="form-control" type="tel" name="tel" id="tel"
                                    placeholder="Number" tabindex="0">
                            </div>
                        </div>
                        <h4 class="sec-title h5 mb-25">Expired Date</h4>
                        <div class="row gx-20 mb-10">
                            <div class="col-md-4 form-group">
                                <select class="form-control" name="subject" id="subject" tabindex="0">
                                    <option value="Select Your Payment Method">Select Your Payment Method</option>
                                    <option value="Oil Change">Oil Change</option>
                                    <option value="Tire Rotation">Tire Rotation</option>
                                    <option value="Brake Inspection">Brake Inspection</option>
                                    <option value="Engine Tune-Up">Engine Tune-Up</option>
                                    <option value="Transmission Flush">Transmission Flush</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <select class="form-control" name="subject" id="subject" tabindex="0">
                                    <option value="Year">Year</option>
                                    <option value="Oil Change">Oil Change</option>
                                    <option value="Tire Rotation">Tire Rotation</option>
                                    <option value="Brake Inspection">Brake Inspection</option>
                                    <option value="Engine Tune-Up">Engine Tune-Up</option>
                                    <option value="Transmission Flush">Transmission Flush</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <input class="form-control" type="tel" name="tel" id="tel"
                                    placeholder="CSV" tabindex="0">
                            </div>
                        </div>
                    </form>
                    <h3 class="sec-title mb-30">Billing Information</h3>
                    <form class="form-style4 ajax-contact" action="mail.php" method="post">
                        <div class="row gx-20 mb-30">
                            <div class="col-md-6 form-group">
                                <select class="form-control" name="subject" id="subject" tabindex="0">
                                    <option value="Select Country">Select Country</option>
                                    <option value="Oil Change">Oil Change</option>
                                    <option value="Tire Rotation">Tire Rotation</option>
                                    <option value="Brake Inspection">Brake Inspection</option>
                                    <option value="Engine Tune-Up">Engine Tune-Up</option>
                                    <option value="Transmission Flush">Transmission Flush</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <input class="form-control" type="text" name="lname" id="laname"
                                    placeholder="Address">
                            </div>
                            <div class="col-md-12 form-group">
                                <input class="form-control" type="email" name="email" id="email"
                                    placeholder="Alternative Address">
                            </div>
                            <div class="col-md-4 form-group">
                                <select class="form-control" name="subject" id="subject" tabindex="0">
                                    <option value="States">States</option>
                                    <option value="Oil Change">Oil Change</option>
                                    <option value="Tire Rotation">Tire Rotation</option>
                                    <option value="Brake Inspection">Brake Inspection</option>
                                    <option value="Engine Tune-Up">Engine Tune-Up</option>
                                    <option value="Transmission Flush">Transmission Flush</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <select class="form-control" name="subject" id="subject" tabindex="0">
                                    <option value="City">City</option>
                                    <option value="Oil Change">Oil Change</option>
                                    <option value="Tire Rotation">Tire Rotation</option>
                                    <option value="Brake Inspection">Brake Inspection</option>
                                    <option value="Engine Tune-Up">Engine Tune-Up</option>
                                    <option value="Transmission Flush">Transmission Flush</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <input class="form-control" type="email" name="email" id="email"
                                    placeholder="Zip Code">
                            </div>
                            <div class="col-lg-4">
                                <div class="d-flex pt-10">
                                    <a href="about.html" class="vs-btn w-100" tabindex="0">
                                        Pay Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-area">
                        <div class="widget">
                            <h3 class="widget_title">
                                Session Details
                                <img src="{{ asset('assets/event/assets/img/shapes/d-1-2.svg') }}">
                            </h3>
                            <ul class="wp-block-categories-list wp-block-details">
                                <li>
                                    <div class="item-card">
                                        <div class="item-icon">
                                            <i class="fas fa-calendar-check"></i>
                                        </div>
                                        <div class="item-content">
                                            <span class="item-title">Start Date</span>
                                            <span class="item-text">March 27, 2023 - 12:30am</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-card">
                                        <div class="item-icon">
                                            <i class="fas fa-calendar-times"></i>
                                        </div>
                                        <div class="item-content">
                                            <span class="item-title">Close Date</span>
                                            <span class="item-text">March 27, 2023 - 10:30pm</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-card">
                                        <div class="item-icon">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="item-content">
                                            <span class="item-title">Statues</span>
                                            <span class="item-text">Showing</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-card">
                                        <div class="item-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="item-content">
                                            <span class="item-title">Location</span>
                                            <span class="item-text">In your school auditorium</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-card">
                                        <div class="item-icon">
                                            <i class="fas fa-map-marked-alt"></i>
                                        </div>
                                        <div class="item-content">
                                            <span class="item-title">Venue</span>
                                            <span class="item-text"> In your school auditorium</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-card">
                                        <div class="item-icon">
                                            <i class="fas fa-tags"></i>
                                        </div>
                                        <div class="item-content">
                                            <span class="item-title">Price</span>
                                            <span class="item-text">$199 / Person</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-card">
                                        <div class="item-icon">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="item-content">
                                            <span class="item-title">Organizer</span>
                                            <span class="item-text">Planet X</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-card">
                                        <div class="item-icon">
                                            <i class="fas fa-folder-open"></i>
                                        </div>
                                        <div class="item-content">
                                            <span class="item-title">Category</span>
                                            <span class="item-text">Festival</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-card">
                                        <div class="item-icon">
                                            <i class="fas fa-ticket-alt"></i>
                                        </div>
                                        <div class="item-content">
                                            <span class="item-title">Remaining Tickets</span>
                                            <span class="item-text">650 Tickets</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-card">
                                        <div class="item-icon">
                                            <i class="fas fa-share-alt-square"></i>
                                        </div>
                                        <div class="item-content">
                                            <span class="item-title">Networks</span>
                                            <ul class="social-links">
                                                <li><a href="#" target="_blank"><i
                                                            class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#" target="_blank"><i
                                                            class="fab fa-twitter"></i></a></li>
                                                <li><a href="#" target="_blank"><i
                                                            class="fab fa-instagram"></i></a></li>
                                                <li><a href="#" target="_blank"><i
                                                            class="fab fa-dribbble"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <a href="about.html" class="vs-btn w-100" tabindex="0">
                                Buy Ticket
                            </a>
                        </div>
                        <div class="widget">
                            <h3 class="widget_title">
                                Organizer Details
                                <img src="{{ asset('assets/event/assets/img/shapes/d-1-2.svg') }}">
                            </h3>
                            <div class="sidebar-info">
                                <div class="info-logo">
                                    <img src="{{ asset('assets/event/assets/img/brand/sidebar-brand-1-1.png') }}"
                                        alt="logo">
                                </div>
                                <div class="info-list">
                                    <h3 class="sec-title">Planet</h3>
                                    <ul>
                                        <li>
                                            <i class="fas fa-phone-alt"></i>
                                            <a href="tel:+052 (699) 256 - 009">052 (699) 256 - 009</a>
                                        </li>
                                        <li>
                                            <i class="fas fa-envelope"></i>
                                            <a href="mailto:example@planetinfo.com">example@planetinfo.com</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                            <a href="#"><i class="fab fa-behance"></i></a>
                                            <a href="#"><i class="fab fa-youtube"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details End -->





    <!-- Video Area -->
    <section>
        <div class="video-wrap2" data-bg-src="{{ asset('assets/event/assets/img/bg/video-bg-1-2.jpg') }}">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="video-content">
                            <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn style4 popup-video"
                                tabindex="0"><i class="fas fa-play"></i></a>
                            <span class="sec-subtitle4 style2">See And Descover</span>
                            <h2 class="sec-title text-white ">Know More About Eventino For Better Experience</h2>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <form class="form-style1 ajax-contact" action="mail.php" method="post">
                            <img src="{{ asset('assets/event/assets/img/shapes/f-1-1.png') }}" alt="form shape"
                                class="shape-1">
                            <img src="{{ asset('assets/event/assets/img/shapes/f-1-2.png') }}" alt="form shape"
                                class="shape-2">
                            <h3 class="title">Register Now</h3>
                            <span class="subtitle">Make A Booking</span>
                            <div class="row gx-20">
                                <div class="col-md-12 form-group">
                                    <input class="form-control" type="text" name="fname" id="funame"
                                        placeholder="Full Name">
                                </div>
                                <div class="col-md-12 form-group">
                                    <input class="form-control" type="email" name="email" id="email"
                                        placeholder="Email Address">
                                </div>
                                <div class="col-md-12 form-group">
                                    <input class="form-control" type="tel" name="tel" id="tel"
                                        placeholder="Phone Number">
                                </div>
                                <div class="col-md-12 form-group">
                                    <select class="form-control" name="subject" id="subject">
                                        <option value="Choose Package">Choose Package</option>
                                        <option value="Oil Change">Oil Change</option>
                                        <option value="Tire Rotation">Tire Rotation</option>
                                        <option value="Brake Inspection">Brake Inspection</option>
                                        <option value="Engine Tune-Up">Engine Tune-Up</option>
                                        <option value="Transmission Flush">Transmission Flush</option>
                                    </select>
                                </div>
                                <div class="col-md-12 form-group">
                                    <select class="form-control" name="subject" id="subject">
                                        <option value="Ticket Quantity">Ticket Quantity</option>
                                        <option value="Oil Change">Oil Change</option>
                                        <option value="Tire Rotation">Tire Rotation</option>
                                        <option value="Brake Inspection">Brake Inspection</option>
                                        <option value="Engine Tune-Up">Engine Tune-Up</option>
                                        <option value="Transmission Flush">Transmission Flush</option>
                                    </select>
                                </div>
                                <div class="col-md-12 form-group">
                                    <button class="vs-btn style2" type="submit">Register Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Video Area End -->



    <!-- Testimonial Area -->
    <section class="smoke-bg overflow-hidden space-top space-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="title-area text-center">
                        <span class="sec-subtitle2">Testimonials</span>
                        <h2 class="sec-title">Our Clint’s Feedback And Reviews</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="test-wrap2">
            <div class="vs-carousel row" data-slide-show="1" data-center-mode="true" data-xl-center-mode="true"
                data-ml-center-mode="true" data-lg-center-mode="true" data-md-center-mode="true"
                data-center-padding="630px" data-xl-center-padding="420px" data-ml-center-padding="300px"
                data-lg-center-padding="150px" data-md-center-padding="80px" id="testi-slider1">
                <div class="col-auto">
                    <div class="testi-style1">
                        <div class="testi-icon">
                            <img src="{{ asset('assets/event/assets/img/icons/t-1-1.svg') }}" alt="testi icon">
                        </div>
                        <div class="testi-author">
                            <div class="author-img"><img
                                    src="{{ asset('assets/event/assets/img/user/user-img-1-1.jpg') }}"
                                    alt="Testimonial"></div>
                            <div class="media-body">
                                <h3 class="testi-name">Rivanur R. Rafi</h3>
                                <div class="testi-degi">CEO, EventsBD</div>
                            </div>
                        </div>
                        <div class="testi-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testi-text">“Varius sit amet mattis vulputate. Nulla posuere sollicitudin on The
                            aliquam
                            ultrices sagittis orci a. Nunc non blandit massa enim. Fermentum posuere urna nec tincidunt
                            praesent
                            semper feugiat nibh. Dolor magna eget est lorem ipsum dolor sit amet endrerit dolor.”</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="testi-style1">
                        <div class="testi-icon">
                            <img src="{{ asset('assets/event/assets/img/icons/t-1-1.svg') }}" alt="testi icon">
                        </div>
                        <div class="testi-author">
                            <div class="author-img"><img
                                    src="{{ asset('assets/event/assets/img/user/user-img-1-4.jpg') }}"
                                    alt="Testimonial"></div>
                            <div class="media-body">
                                <h3 class="testi-name">Ute Kirsch</h3>
                                <div class="testi-degi">CEO, EventsBD</div>
                            </div>
                        </div>
                        <div class="testi-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testi-text">“Varius sit amet mattis vulputate. Nulla posuere sollicitudin on The
                            aliquam
                            ultrices sagittis orci a. Nunc non blandit massa enim. Fermentum posuere urna nec tincidunt
                            praesent
                            semper feugiat nibh. Dolor magna eget est lorem ipsum dolor sit amet endrerit dolor.”</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="testi-style1">
                        <div class="testi-icon">
                            <img src="{{ asset('assets/event/assets/img/icons/t-1-1.svg') }}" alt="testi icon">
                        </div>
                        <div class="testi-author">
                            <div class="author-img"><img
                                    src="{{ asset('assets/event/assets/img/user/user-img-1-3.jpg') }}"
                                    alt="Testimonial"></div>
                            <div class="media-body">
                                <h3 class="testi-name">Jan Mehler</h3>
                                <div class="testi-degi">CEO, EventsBD</div>
                            </div>
                        </div>
                        <div class="testi-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testi-text">“Varius sit amet mattis vulputate. Nulla posuere sollicitudin on The
                            aliquam
                            ultrices sagittis orci a. Nunc non blandit massa enim. Fermentum posuere urna nec tincidunt
                            praesent
                            semper feugiat nibh. Dolor magna eget est lorem ipsum dolor sit amet endrerit dolor.”</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="testi-style1">
                        <div class="testi-icon">
                            <img src="{{ asset('assets/event/assets/img/icons/t-1-1.svg') }}" alt="testi icon">
                        </div>
                        <div class="testi-author">
                            <div class="author-img"><img
                                    src="{{ asset('assets/event/assets/img/user/user-img-1-2.jpg') }}"
                                    alt="Testimonial"></div>
                            <div class="media-body">
                                <h3 class="testi-name">Tom Bauer</h3>
                                <div class="testi-degi">CEO, EventsBD</div>
                            </div>
                        </div>
                        <div class="testi-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testi-text">“Varius sit amet mattis vulputate. Nulla posuere sollicitudin on The
                            aliquam
                            ultrices sagittis orci a. Nunc non blandit massa enim. Fermentum posuere urna nec tincidunt
                            praesent
                            semper feugiat nibh. Dolor magna eget est lorem ipsum dolor sit amet endrerit dolor.”</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="testi-style1">
                        <div class="testi-icon">
                            <img src="{{ asset('assets/event/assets/img/icons/t-1-1.svg') }}" alt="testi icon">
                        </div>
                        <div class="testi-author">
                            <div class="author-img"><img
                                    src="{{ asset('assets/event/assets/img/user/user-img-1-1.jpg') }}"
                                    alt="Testimonial"></div>
                            <div class="media-body">
                                <h3 class="testi-name">Matthias Nacht</h3>
                                <div class="testi-degi">CEO, EventsBD</div>
                            </div>
                        </div>
                        <div class="testi-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testi-text">“Varius sit amet mattis vulputate. Nulla posuere sollicitudin on The
                            aliquam
                            ultrices sagittis orci a. Nunc non blandit massa enim. Fermentum posuere urna nec tincidunt
                            praesent
                            semper feugiat nibh. Dolor magna eget est lorem ipsum dolor sit amet endrerit dolor.”</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="testi-style1">
                        <div class="testi-icon">
                            <img src="{{ asset('assets/event/assets/img/icons/t-1-1.svg') }}" alt="testi icon">
                        </div>
                        <div class="testi-author">
                            <div class="author-img"><img
                                    src="{{ asset('assets/event/assets/img/user/user-img-1-2.jpg') }}"
                                    alt="Testimonial"></div>
                            <div class="media-body">
                                <h3 class="testi-name">Daniel Bar</h3>
                                <div class="testi-degi">CEO, EventsBD</div>
                            </div>
                        </div>
                        <div class="testi-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testi-text">“Varius sit amet mattis vulputate. Nulla posuere sollicitudin on The
                            aliquam
                            ultrices sagittis orci a. Nunc non blandit massa enim. Fermentum posuere urna nec tincidunt
                            praesent
                            semper feugiat nibh. Dolor magna eget est lorem ipsum dolor sit amet endrerit dolor.”</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Area End -->


    <!-- Team Area -->
    <section class="space-top space-extra-bottom">
        <div class="container">
            <div class="row justify-content-between align-items-end">
                <div class="col-lg-5">
                    <div class="title-area">
                        <span class="sec-subtitle">Team Member</span>
                        <h2 class="sec-title">Get A New Experience With Eventino</h2>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="sec-btns">
                        <button class="vs-btn" data-slick-prev="#team-slider1">
                            <i class="far fa-arrow-left"></i>Prev
                        </button>
                        <button class="vs-btn" data-slick-next="#team-slider1">Next
                            <i class="far fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row vs-carousel" data-slide-show="3" data-lg-slide-show="2" id="team-slider1">
                <div class="col-lg-4">
                    <div class="team-style1">
                        <div class="team-img">
                            <img src="{{ asset('assets/event/assets/img/team/team-1-1.jpg') }}" alt="team image">
                        </div>
                        <div class="team-body">
                            <div class="team-content">
                                <div>
                                    <h4 class="team-name">Rivanur R. Rafi</h4>
                                    <span class="team-degi">CEO, Events BD</span>
                                </div>
                                <div>
                                    <div class="team-social">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);"><i class="far fa-share-alt"></i></a>
                                                <ul>
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <ul class="team-bottom">
                                <li>
                                    <a href="tel:+88 (099) 8764 321">
                                        <span><i class="fas fa-phone-alt"></i></span>+88 (099) 8764 321
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:info@example.com">
                                        <span><i class="fas fa-envelope"></i></span>info@example.com
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-style1">
                        <div class="team-img">
                            <img src="{{ asset('assets/event/assets/img/team/team-1-2.jpg') }}" alt="team image">
                        </div>
                        <div class="team-body">
                            <div class="team-content">
                                <div>
                                    <h4 class="team-name">Christina Zimmerman</h4>
                                    <span class="team-degi">CEO, Events BD</span>
                                </div>
                                <div>
                                    <div class="team-social">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);"><i class="far fa-share-alt"></i></a>
                                                <ul>
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <ul class="team-bottom">
                                <li>
                                    <a href="tel:+88 (099) 8764 321">
                                        <span><i class="fas fa-phone-alt"></i></span>+88 (099) 8764 321
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:info@example.com">
                                        <span><i class="fas fa-envelope"></i></span>info@example.com
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-style1">
                        <div class="team-img">
                            <img src="{{ asset('assets/event/assets/img/team/team-1-3.jpg') }}" alt="team image">
                        </div>
                        <div class="team-body">
                            <div class="team-content">
                                <div>
                                    <h4 class="team-name">Erik Huber</h4>
                                    <span class="team-degi">CEO, Events BD</span>
                                </div>
                                <div>
                                    <div class="team-social">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);"><i class="far fa-share-alt"></i></a>
                                                <ul>
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <ul class="team-bottom">
                                <li>
                                    <a href="tel:+88 (099) 8764 321">
                                        <span><i class="fas fa-phone-alt"></i></span>+88 (099) 8764 321
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:info@example.com">
                                        <span><i class="fas fa-envelope"></i></span>info@example.com
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-style1">
                        <div class="team-img">
                            <img src="{{ asset('assets/event/assets/img/team/team-1-4.jpg') }}" alt="team image">
                        </div>
                        <div class="team-body">
                            <div class="team-content">
                                <div>
                                    <h4 class="team-name">Rivanur R. Rafi</h4>
                                    <span class="team-degi">CEO, Events BD</span>
                                </div>
                                <div>
                                    <div class="team-social">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);"><i class="far fa-share-alt"></i></a>
                                                <ul>
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <ul class="team-bottom">
                                <li>
                                    <a href="tel:+88 (099) 8764 321">
                                        <span><i class="fas fa-phone-alt"></i></span>+88 (099) 8764 321
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:info@example.com">
                                        <span><i class="fas fa-envelope"></i></span>info@example.com
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Area end -->


    <!-- Gallery Area Start -->
    <section class="smoke-bg space-top space-extra-bottom overflow-hidden">
        <div class="container">
            <div class="row align-items-end justify-content-between">
                <div class="col-lg-5">
                    <div class="title-area">
                        <span class="sec-subtitle">Eventino Gallery</span>
                        <h2 class="sec-title">Our Amazing And unforgettable Times</h2>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="d-inline-flex pt-10 title-area">
                        <a href="event.html" class="vs-btn">View All Events</a>
                    </div>
                </div>
            </div>
            <div class="row gx-30 filter-active filter-gallery">
                <div class="col-lg-3 col-md-6 filter-item">
                    <div class="gallery-style1">
                        <a href="{{ asset('assets/event/assets/img/gallery/g-1-1.jpg') }}"
                            class="popup-image popup-link">
                            <i class="fas fa-image"></i>
                        </a>
                        <div class="overlay"></div>
                        <div class="gallery-thumb">
                            <img src="{{ asset('assets/event/assets/img/gallery/g-1-1.jpg') }}" alt="gallery">
                        </div>
                        <div class="gallery-content">
                            <div class="gallery-date">
                                <span>
                                    <i class="fas fa-clock"></i>
                                    08:00am - 22:00pm
                                </span>
                            </div>
                            <h3 class="gallery-title h5">
                                <a href="gallery-details.html">Business Conference In Australia</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 filter-item grid-item--width2">
                    <div class="gallery-style1">
                        <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="popup-video popup-link">
                            <i class="fas fa-play"></i>
                        </a>
                        <div class="overlay"></div>
                        <div class="gallery-thumb">
                            <img src="{{ asset('assets/event/assets/img/gallery/g-1-2.jpg') }}" alt="gallery">
                        </div>
                        <div class="gallery-content">
                            <div class="gallery-date">
                                <span>
                                    <i class="fas fa-clock"></i>
                                    08:00am - 22:00pm
                                </span>
                            </div>
                            <h3 class="gallery-title h5">
                                <a href="gallery-details.html">Empowering Business Growth Conference in Melbourne</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 filter-item">
                    <div class="gallery-style1">
                        <a href="{{ asset('assets/event/assets/img/gallery/g-1-3.jpg') }}"
                            class="popup-image popup-link">
                            <i class="fas fa-image"></i>
                        </a>
                        <div class="overlay"></div>
                        <div class="gallery-thumb">
                            <img src="{{ asset('assets/event/assets/img/gallery/g-1-3.jpg') }}" alt="gallery">
                        </div>
                        <div class="gallery-content">
                            <div class="gallery-date">
                                <span>
                                    <i class="fas fa-clock"></i>
                                    08:00am - 22:00pm
                                </span>
                            </div>
                            <h3 class="gallery-title h5">
                                <a href="gallery-details.html">Melbourne Business Mastermind</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 filter-item grid-item--width2">
                    <div class="gallery-style1">
                        <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="popup-video popup-link">
                            <i class="fas fa-play"></i>
                        </a>
                        <div class="overlay"></div>
                        <div class="gallery-thumb">
                            <img src="{{ asset('assets/event/assets/img/gallery/g-1-4.jpg') }}" alt="gallery">
                        </div>
                        <div class="gallery-content">
                            <div class="gallery-date">
                                <span>
                                    <i class="fas fa-clock"></i>
                                    08:00am - 22:00pm
                                </span>
                            </div>
                            <h3 class="gallery-title h5">
                                <a href="gallery-details.html">Innovative Leadership Summit for Australian
                                    Entrepreneurs</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 filter-item">
                    <div class="gallery-style1">
                        <a href="{{ asset('assets/event/assets/img/gallery/g-1-5.jpg') }}"
                            class="popup-image popup-link">
                            <i class="fas fa-image"></i>
                        </a>
                        <div class="overlay"></div>
                        <div class="gallery-thumb">
                            <img src="{{ asset('assets/event/assets/img/gallery/g-1-5.jpg') }}" alt="gallery">
                        </div>
                        <div class="gallery-content">
                            <div class="gallery-date">
                                <span>
                                    <i class="fas fa-clock"></i>
                                    08:00am - 22:00pm
                                </span>
                            </div>
                            <h3 class="gallery-title h5">
                                <a href="gallery-details.html">Canberra Commerce Convention</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 filter-item">
                    <div class="gallery-style1">
                        <a href="{{ asset('assets/event/assets/img/gallery/g-1-6.jpg') }}"
                            class="popup-image popup-link">
                            <i class="fas fa-image"></i>
                        </a>
                        <div class="overlay"></div>
                        <div class="gallery-thumb">
                            <img src="{{ asset('assets/event/assets/img/gallery/g-1-6.jpg') }}" alt="gallery">
                        </div>
                        <div class="gallery-content">
                            <div class="gallery-date">
                                <span>
                                    <i class="fas fa-clock"></i>
                                    08:00am - 22:00pm
                                </span>
                            </div>
                            <h3 class="gallery-title h5">
                                <a href="gallery-details.html">Sydney Leadership Symposium</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 filter-item">
                    <div class="gallery-style1">
                        <a href="{{ asset('assets/event/assets/img/gallery/g-1-7.jpg') }}"
                            class="popup-image popup-link">
                            <i class="fas fa-image"></i>
                        </a>
                        <div class="overlay"></div>
                        <div class="gallery-thumb">
                            <img src="{{ asset('assets/event/assets/img/gallery/g-1-7.jpg') }}" alt="gallery">
                        </div>
                        <div class="gallery-content">
                            <div class="gallery-date">
                                <span>
                                    <i class="fas fa-clock"></i>
                                    08:00am - 22:00pm
                                </span>
                            </div>
                            <h3 class="gallery-title h5">
                                <a href="gallery-details.html">Brisbane Business Breakthrough</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 filter-item">
                    <div class="gallery-style1">
                        <a href="{{ asset('assets/event/assets/img/gallery/g-1-8.jpg') }}"
                            class="popup-image popup-link">
                            <i class="fas fa-image"></i>
                        </a>
                        <div class="overlay"></div>
                        <div class="gallery-thumb">
                            <img src="{{ asset('assets/event/assets/img/gallery/g-1-8.jpg') }}" alt="gallery">
                        </div>
                        <div class="gallery-content">
                            <div class="gallery-date">
                                <span>
                                    <i class="fas fa-clock"></i>
                                    08:00am - 22:00pm
                                </span>
                            </div>
                            <h3 class="gallery-title h5">
                                <a href="gallery-details.html">Canberra Commerce Convention</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 filter-item grid-item--width2">
                    <div class="gallery-style1">
                        <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="popup-video popup-link">
                            <i class="fas fa-play"></i>
                        </a>
                        <div class="overlay"></div>
                        <div class="gallery-thumb">
                            <img src="{{ asset('assets/event/assets/img/gallery/g-1-9.jpg') }}" alt="gallery">
                        </div>
                        <div class="gallery-content">
                            <div class="gallery-date">
                                <span>
                                    <i class="fas fa-clock"></i>
                                    08:00am - 22:00pm
                                </span>
                            </div>
                            <h3 class="gallery-title h5">
                                <a href="gallery-details.html">Transformative Business Strategies Conference in
                                    Australia</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery Area End -->

    <!-- Counter Area Start -->
    <div class="position-relative mt-3">
        <div class="counter-wrap2">
            <div class="overlay"></div>
            <img class="shape-1" src="{{ asset('assets/event/assets/img/shapes/c-1-1.png') }}" alt="shape1">
            <img class="shape-2" src="{{ asset('assets/event/assets/img/shapes/c-1-2.png') }}" alt="shape2">
            <div class="container wow fadeInUp" data-wow-delay="0.2s">
                <div class="row g-4 justify-content-between">
                    <div class="col-6 col-lg-auto">
                        <div class="counter-media count-start">
                            <div class="counter-media__icon"><img
                                    src="{{ asset('assets/event/assets/img/icons/c-1-1.svg') }}" alt="icon">
                            </div>
                            <div class="media-body">
                                <span class="counter-media__number"><span class="counters"
                                        data-counter="858">858</span>+</span>
                                <p class="counter-media__title">Successful Projects</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-auto">
                        <div class="counter-media count-start">
                            <div class="counter-media__icon"><img
                                    src="{{ asset('assets/event/assets/img/icons/c-1-2.svg') }}" alt="icon">
                            </div>
                            <div class="media-body">
                                <span class="counter-media__number"><span class="counters"
                                        data-counter="567">567</span>+</span>
                                <p class="counter-media__title">Media Activities</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-auto">
                        <div class="counter-media count-start">
                            <div class="counter-media__icon"><img
                                    src="{{ asset('assets/event/assets/img/icons/c-1-3.svg') }}" alt="icon">
                            </div>
                            <div class="media-body">
                                <span class="counter-media__number"><span class="counters"
                                        data-counter="15">15</span>+</span>
                                <p class="counter-media__title">Skilled Experts</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-auto">
                        <div class="counter-media count-start">
                            <div class="counter-media__icon"><img
                                    src="{{ asset('assets/event/assets/img/icons/c-1-4.svg') }}" alt="icon">
                            </div>
                            <div class="media-body">
                                <span class="counter-media__number"><span class="counters"
                                        data-counter="30">30</span>+</span>
                                <p class="counter-media__title">Happy Clients</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Counter Area End -->

    <!-- Footer Area -->
    <footer class="footer-layout2 shape-mockup-wrap">
        <div class="shape-mockup d-none d-xl-block z-index-negative" data-top="0%" data-left="0%">
            <img src="{{ asset('assets/event/assets/img/shapes/footer-2-1.png') }}" alt="footer shape">
        </div>
        <div class="shape-mockup d-none d-xl-block z-index-negative" data-bottom="0%" data-right="0%">
            <img src="{{ asset('assets/event/assets/img/shapes/footer-2-2.png') }}" alt="footer shape">
        </div>
        <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-lg-4 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">About Company<img
                                    src="{{ asset('assets/event/assets/img/shapes/d-1-1.svg') }}">
                            </h3>
                            <div class="footer-logo">
                                <a href="index.html"><img
                                        src="{{ asset('assets/event/assets/img/logo-white.svg') }}" alt="Eventino"
                                        class="logo"></a>
                            </div>
                            <div class="vs-widget-about">
                                <p class="footer-text">Vestibulum ac diam sit amet quam vehicula on the elementum sed
                                    amet dui molestie
                                    Curabitur arcu erat, accumsan id imperdiet</p>
                                <div class="footer-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Quick Link<img
                                    src="{{ asset('assets/event/assets/img/shapes/d-1-1.svg') }}"></h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="about.html">About Us <span></span></a></li>
                                    <li><a href="about.html">Our Mission <span></span></a></li>
                                    <li><a href="service.html">Our Services <span></span></a></li>
                                    <li><a href="service.html">Our Project <span></span></a></li>
                                    <li><a href="team.html">Our Team <span></span></a></li>
                                    <li><a href="blog.html">Blog Post <span></span></a></li>
                                    <li><a href="contact.html">Contact Us <span></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Explore<img
                                    src="{{ asset('assets/event/assets/img/shapes/d-1-1.svg') }}"></h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="about.html">What We Offer <span></span></a></li>
                                    <li><a href="about.html">Our Story <span></span></a></li>
                                    <li><a href="blog.html">Latest Post <span></span></a></li>
                                    <li><a href="contact.html">Help Center <span></span></a></li>
                                    <li><a href="about.html">Terms & Condition <span></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Contact Us<img
                                    src="{{ asset('assets/event/assets/img/shapes/d-1-1.svg') }}"></h3>
                            <div class="footer-info style2">
                                <div class="footer-info_icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="media-body">
                                    <span class="footer-info_label">Phone No:</span>
                                    <div class="footer-info_link">
                                        <a href="tel:+1 0109 -1812-347">+1 0109-1812-347</a>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-info style2">
                                <div class="footer-info_icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="media-body">
                                    <span class="footer-info_label">Email Address:</span>
                                    <div class="footer-info_link">
                                        <a href="mailto:Info@eventino.com">Info@eventino.com</a>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-info style2">
                                <div class="footer-info_icon">
                                    <i class="fas fa-location"></i>
                                </div>
                                <div class="media-body">
                                    <div class="footer-info_link">
                                        12/7 new town, 245x Town 1214
                                        Street, United State
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom2">
            <div class="newsletter-form2">
                <div class="overlay"></div>
                <div class="container">
                    <form action="mail.php">
                        <div class="row g-4 justify-content-between align-items-center">
                            <div class="col-xl-4 col-lg-auto">
                                <h2 class="sec-title h4 mb-0 text-white">Subscribe Our Newsletter</h2>
                                <p class="sec-text text-white">Subscribe email and get recent news and updates</p>
                            </div>
                            <div class="col-lg-auto">
                                <div class="form-group mb-0">
                                    <input type="email" class="form-control" placeholder="Enter Your Email">
                                    <button class="vs-btn style4">Subscribe Now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright-wrap">
                <div class="row justify-content-center justify-content-lg-between">
                    <div class="col-auto">
                        <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> 2024 <a
                                href="index.html">Eventino</a>.
                            All
                            rights reserved by <a href="https://themeforest.net/user/vecuro_themes">Vecuro</a>.</p>
                    </div>
                    <div class="col-auto">
                        <nav class="footer-menu">
                            <ul>
                                <li class="menu-item">
                                    <a href="about.html">Terms &amp; Condition</a>
                                </li>
                                <li class="menu-item">
                                    <a href="about.html">Privacy</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->
    <!--********************************
   Code End  Here
 ******************************** -->
    <!--==============================
        All Js File
    ============================== -->
    <!-- Jquery -->
    <script src="{{ asset('assets/event/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('assets/event/assets/js/slick.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/event/assets/js/bootstrap.min.js') }}"></script>
    <!-- WOW.js') }} Animation -->
    <script src="{{ asset('assets/event/assets/js/wow.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('assets/event/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Isotope Filter -->
    <script src="{{ asset('assets/event/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/event/assets/js/isotope.pkgd.min.js') }}"></script>
    <!-- Custom Phone Number Input -->
    <script src="https://cdn.js') }}delivr.net/npm/intl-tel-input@23.7.3/build/js/intlTelInput.min.js') }}"></script>
    <!-- Main Js File -->
    <script src="{{ asset('assets/event/assets/js/main.js') }}"></script>
</body>

</html>
