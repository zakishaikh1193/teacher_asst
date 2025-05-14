<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Education & Online Courses </title>

    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('assets/courses/assets/images/favicons/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('assets/courses/assets/images/favicons/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('assets/courses/assets/images/favicons/favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('assets/courses/assets/images/favicons/site.webmanifest') }}" />
    <meta name="description"
        content="Eduhive is a very modern and versatile education & online courses HTML Template. It is specially designed for LMS, online courses, education, learning management, e-learning, online training, zoom classes, and all other education related websites and businesses." />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Cormorant:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/courses/assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/courses/assets/vendors/bootstrap-select/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/courses/assets/vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/courses/assets/vendors/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/courses/assets/vendors/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/courses/assets/vendors/jarallax/jarallax.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/courses/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/courses/assets/vendors/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/courses/assets/vendors/nouislider/nouislider.pips.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/courses/assets/vendors/tiny-slider/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/courses/assets/vendors/eduhive-icons/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/courses/assets/vendors/owl-carousel/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/courses/assets/vendors/owl-carousel/css/owl.theme.default.min.css') }}" />

    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('assets/courses/assets/css/eduhive.css') }}" />

    @yield('courses-css')
</head>
 
<body class="custom-cursor">

    <div class="page-wrapper">
        @include('courses.layouts.header')
        <!-- content  -->
        @yield('courses')
        <!-- footer  -->
        {{-- @include('courses.layouts.footer') --}} 
    </div>

    @include('courses.layouts.mobile-nav')

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__text">back top</span>
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
    </a> 

    <script src="{{ asset('assets/courses/assets/vendors/jquery/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/courses/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/courses/assets/vendors/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/courses/assets/vendors/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('assets/courses/assets/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/courses/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/courses/assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/courses/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}">
    </script>
    <script src="{{ asset('assets/courses/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/courses/assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/courses/assets/vendors/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/courses/assets/vendors/tiny-slider/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/courses/assets/vendors/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ asset('assets/courses/assets/vendors/owl-carousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/courses/assets/vendors/owl-carousel/js/owlcarousel2-filter.min.js') }}"></script>
    <script src="{{ asset('assets/courses/assets/vendors/owl-carousel/js/owlcarousel2-progressbar.js') }}"></script>
    <script src="{{ asset('assets/courses/assets/vendors/wow/wow.js') }}"></script>
    <script src="{{ asset('assets/courses/assets/vendors/imagesloaded/imagesloaded.min.js') }}"></script>
    <script src="{{ asset('assets/courses/assets/vendors/isotope/isotope.js') }}"></script>
    <script src="{{ asset('assets/courses/assets/vendors/countdown/countdown.min.js') }}"></script>
    <script src="{{ asset('assets/courses/assets/vendors/jquery-circleType/jquery.circleType.js') }}"></script>
    <script src="{{ asset('assets/courses/assets/vendors/jquery-lettering/jquery.lettering.min.js') }}"></script>

    <!-- template js -->
    <script src="{{ asset('assets/courses/assets/js/eduhive.js') }}"></script>

    @yield('courses-js')
</body>

</html>
