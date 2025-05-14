@extends('frontend.layouts.app')

@section('seo_title', e($seo['title'] ?? 'Legato Design '))
@section('seo_description', e($seo['meta_description'] ?? 'Legato Design '))
@section('seo_keywords', e($seo['keywords'] ?? 'Legato Design '))

@section('frontent-css')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.min.css" rel="stylesheet">
@endsection

@section('content')

    {{-- <div class="page-header__bg"
            style="background-image: url('{{ asset('assets/event/assets/images/hero1.jpg') }}'); background-size: cover; "> --}}
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
                    <li>Contact</li>
                </ul>
                <h2>Contact
                </h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Message Box Start-->
    <section class="message-box">
        <div class="container">
            <div class="row">
                @if (isset($section1) && $section1->active == 1)
                    <div class="col-xl-4 col-lg-5">
                        <div class="message-box__left">
                            <div class="section-title text-left">
                                <h2 class="section-title__title">
                                    {{ isset($section1->header) && !empty($section1->header) ? $section1->header : '' }}
                                </h2>
                                <span class="section-title__tagline">
                                    {{ isset($section1->description) && !empty($section1->description) ? $section1->description : '' }}
                                </span>
                            </div>
                            <div class="message-box__social">
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
                            </div>
                        </div>
                    </div>
                @endif

                <div class="col-xl-8 col-lg-7">
                    <div class="message-box__right">

                        {{-- <form action="assets/inc/sendemail.php" class="comment-one__form contact-form-validated"
                            novalidate="novalidate"> --}}
                        <form id="contactForm" class="comment-one__form contact-form-validated">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <input type="text" placeholder="Your name" name="name" required>
                                        <div class="comment-form__icon">
                                            <i class="far fa-user-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <input type="email" placeholder="Email Address" name="email" required>
                                        <div class="comment-form__icon">
                                            <i class="far fa-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="comment-form__input-box">
                                        <textarea name="message" placeholder="Write Message" required></textarea>
                                        <div class="comment-form__icon contact-expert__icon-comment">
                                            <i class="far fa-comment"></i>
                                        </div>
                                    </div>
                                    <input type="hidden" name="g-recaptcha-response" id="recaptcha_token">
                                    <button type="submit" class="thm-btn comment-form__btn">Send a message</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Message Box End-->

    @if (isset($section2) && $section2->active == 1)
        <!--Locations Start-->
        <section class="locations">
            <div class="container">
                <div class="location__inner ">
                    <div class="section-title text-center">
                        <h2 class="section-title__title">
                            {{ isset($section2->header) && !empty($section2->header) ? $section2->header : '' }}
                        </h2>
                        <span class="section-title__tagline">
                            {{ isset($section2->description) && !empty($section2->description) ? $section2->description : '' }}
                        </span>
                    </div>

                    @php
                        $addInfoS2 =
                            isset($section2->additional_info) && !empty($section2->additional_info)
                                ? json_decode($section2->additional_info, true)
                                : '';
                    @endphp
                    @if (isset($addInfoS2['country'][0]) && !empty($addInfoS2['country'][0]))
                        <div class="row">
                            @for ($i = 0; $i < 8; $i++)
                                @if (isset($addInfoS2['country'][$i]) && !empty($addInfoS2['country'][$i]))
                                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp d-flex" data-wow-delay="0ms"
                                        data-wow-duration="1500ms">
                                        <!--Locations Single-->
                                        <div class="locations__single">
                                            <h3 class="locations__title">
                                                {{ isset($addInfoS2['country'][$i]) && !empty($addInfoS2['country'][$i]) ? $addInfoS2['country'][$i] : '' }}
                                            </h3>
                                            <p class="locations__text">
                                                {{ isset($addInfoS2['address'][$i]) && !empty($addInfoS2['address'][$i]) ? $addInfoS2['address'][$i] : '' }}
                                            </p>
                                            <h4 class="locations__mail-phone-box">
                                                <a href="mailto:{{ isset($addInfoS2['email'][$i]) && !empty($addInfoS2['email'][$i]) ? $addInfoS2['email'][$i] : '' }}"
                                                    class="locations__mail">
                                                    {{ isset($addInfoS2['email'][$i]) && !empty($addInfoS2['email'][$i]) ? $addInfoS2['email'][$i] : '' }}
                                                </a>
                                                <a href="tel:{{ isset($addInfoS2['phone'][$i]) && !empty($addInfoS2['phone'][$i]) ? $addInfoS2['phone'][$i] : '' }}"
                                                    class="locations__phone">
                                                    {{ isset($addInfoS2['phone'][$i]) && !empty($addInfoS2['phone'][$i]) ? $addInfoS2['phone'][$i] : '' }}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                @endif
                            @endfor
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <!--Locations End-->
    @endif


    @if (isset($section3) && $section3->active == 1)
        <!--Contact Page Google Map Start-->
        <section class="google-map">
            {{-- <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd"
            class="google-map__one" allowfullscreen></iframe> --}}
            <iframe
                src="{{ isset($section3->description) && !empty($section3->description) ? $section3->description : '' }}"
                class="google-map__one" allowfullscreen></iframe>
        </section>
        <!--Contact Page Google Map End-->
    @endif

@endsection

@section('frontent-js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.all.min.js"></script>

    {{-- recaptcha   --}}
    <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {
                action: 'contact'
            }).then(function(token) {
                document.getElementById('recaptcha_token').value = token;
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            // $('#contactForm').on('submit', function(e) {
            //     e.preventDefault();

            //     $.ajax({
            //         url: "{{ route('website_contact.store') }}",
            //         method: "POST",
            //         data: $(this).serialize(),
            //         success: function(response) {
            //             Swal.fire({
            //                 icon: 'success',
            //                 title: 'Message Sent',
            //                 text: response.message,
            //                 timer: 2000,
            //                 showConfirmButton: false
            //             });

            //             $('#contactForm')[0].reset(); // Reset form
            //         },
            //         error: function(xhr) {
            //             let errors = xhr.responseJSON.errors;
            //             let errorMessage = Object.values(errors).map(error => error[0]).join(
            //                 "\n");

            //             Swal.fire({
            //                 icon: 'error',
            //                 title: 'Validation Error',
            //                 text: errorMessage
            //             });
            //         }
            //     });
            // });

            $('#contactForm').on('submit', function(e) {
                e.preventDefault();

                grecaptcha.ready(function() {
                    grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {
                        action: 'contact'
                    }).then(function(token) {
                        $('#recaptcha_token').val(token); // Refresh token

                        $.ajax({
                            url: "{{ route('website_contact.store') }}",
                            method: "POST",
                            data: $('#contactForm').serialize(),
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Message Sent',
                                    text: response.message,
                                    timer: 2000,
                                    showConfirmButton: false
                                });

                                $('#contactForm')[0].reset();
                            },
                            error: function(xhr) {
                                let errors = xhr.responseJSON.errors;
                                let errorMessage = Object.values(errors).map(
                                    error => error[0]).join("\n");

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Validation Error',
                                    text: errorMessage
                                });
                            }
                        });

                    });
                });
            });

        });
    </script>

    {{-- recaptcha  --}}
    {{-- <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("demo-form").submit();
        }
    </script> --}}

@endsection
