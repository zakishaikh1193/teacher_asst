@php $isArabic = app()->getLocale() === 'ar'; @endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ $isArabic ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('seo_title', 'My Website')</title>
    <meta name="description" content="@yield('seo_description', 'Default description')">
    <meta name="keywords" content="@yield('seo_keywords', 'default, keywords')">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @isset($AppSettings->logo)
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('uploads/' . $AppSettings->logo) }}" />
    @endisset

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/vendors/animate/animate.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/frontend/assets/vendors/fontawesome/css/all.min.css') }}" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/vendors/jarallax/jarallax.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/frontend/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/vendors/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/vendors/nouislider/nouislider.pips.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/vendors/odometer/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/vendors/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/vendors/aivons-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/vendors/tiny-slider/tiny-slider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/vendors/reey-font/stylesheet.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/frontend/assets/vendors/owl-carousel/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/vendors/twentytwenty/twentytwenty.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/vendors/bxslider/css/jquery.bxslider.css') }}" />

    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/aivons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/aivons-responsive.css') }}" />

    <!-- RTL Styles -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/aivons-rtl.css') }}">

    <!-- color css -->
    <link rel="stylesheet" id="jssDefault" href="{{ asset('assets/frontend/assets/css/colors/color-default.css') }}">
    <link rel="stylesheet" id="jssMode" href="{{ asset('assets/frontend/assets/css/modes/aivons-normal.css') }}">

    <!-- toolbar css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/aivons-toolbar.css') }}">

    @yield('event-css')

    @if (app()->getLocale() === 'ar')
        <link rel="stylesheet" href="{{ asset('assets/event/assets/css/rtl.css') }}">
    @endif

</head>

<body>
    <div class="page-wrapper">
        @include('event.layouts.header-1')
        <!-- content  -->
        @yield('event')
        <!-- footer  -->
        @include('event.layouts.footer')
    </div>

    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="{{ url('/') }}" aria-label="logo image">
                    {{-- <img src="{{ asset('assets/frontend/assets/images/logo-1.png') }}" width="155" alt="" /> --}}
                    @isset($AppSettings->logo)
                        <img src="{{ asset('uploads/' . $AppSettings->logo) }}" height="50" alt="">
                    @endisset
                </a>


            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                @if (isset($AppSettings->email) && !empty($AppSettings->email))
                    <li>
                        <i class="fa fa-envelope"></i>
                        <a
                            href="mailto: {{ isset($AppSettings->email) && !empty($AppSettings->email) ? $AppSettings->email : '' }}">
                            {{ isset($AppSettings->email) && !empty($AppSettings->email) ? $AppSettings->email : '' }}
                        </a>
                    </li>
                @endif
                @if (isset($AppSettings->phone) && !empty($AppSettings->phone))
                    <li>
                        <i class="fa fa-phone-alt"></i>
                        <a
                            href="tel:{{ isset($AppSettings->phone) && !empty($AppSettings->phone) ? $AppSettings->phone : '' }}">
                            {{ isset($AppSettings->phone) && !empty($AppSettings->phone) ? $AppSettings->phone : '' }}
                        </a>
                    </li>
                @endif
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    @if (isset($AppSettings->twitter) && !empty($AppSettings->twitter))
                        <a
                            href="{{ isset($AppSettings->twitter) && !empty($AppSettings->twitter) ? $AppSettings->twitter : '' }}">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                    @endif

                    @if (isset($AppSettings->facebook) && !empty($AppSettings->facebook))
                        <a href="{{ isset($AppSettings->facebook) && !empty($AppSettings->facebook) ? $AppSettings->facebook : '' }}"
                            class="clr-fb"><i class="fab fa-facebook"></i></a>
                    @endif

                    @if (isset($AppSettings->linkedin) && !empty($AppSettings->linkedin))
                        <a href="{{ isset($AppSettings->linkedin) && !empty($AppSettings->linkedin) ? $AppSettings->linkedin : '' }}"
                            class="clr-dri"><i class="fab fa-linkedin-in"></i></a>
                    @endif

                    @if (isset($AppSettings->instagram) && !empty($AppSettings->instagram))
                        <a href="{{ isset($AppSettings->instagram) && !empty($AppSettings->instagram) ? $AppSettings->instagram : '' }}"
                            class="clr-ins"><i class="fab fa-instagram"></i></a>
                    @endif
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->

        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    {{-- <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div> 
    </div> --}}
    <!-- /.search-popup -->


    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>

    <script src="{{ asset('assets/frontend/assets/vendors/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendors/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}">
    </script>
    <script src="{{ asset('assets/frontend/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}">
    </script>
    <script src="{{ asset('assets/frontend/assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendors/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendors/odometer/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendors/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendors/tiny-slider/tiny-slider.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendors/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendors/wow/wow.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendors/isotope/isotope.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendors/countdown/countdown.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendors/twentytwenty/twentytwenty.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendors/twentytwenty/jquery.event.move.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendors/bxslider/js/jquery.bxslider.min.js') }}"></script>

    <script src="http://maps.google.com/maps/api/js?key=AIzaSyATY4Rxc8jNvDpsK8ZetC7JyN4PFVYGCGM"></script>


    <!-- template js -->
    <script src="{{ asset('assets/frontend/assets/js/aivons.js') }}"></script>


    @yield('event-js')

</body>

</html>
