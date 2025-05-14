@extends('frontend.layouts.app')

@section('seo_title', e($seo['title'] ?? 'Legato Design '))
@section('seo_description', e($seo['meta_description'] ?? 'Legato Design '))
@section('seo_keywords', e($seo['keywords'] ?? 'Legato Design '))

@section('frontent-css')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.min.css" rel="stylesheet">
@endsection

@section('content')

    <!--Page Header Start-->
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
                    <li>FAQs</li>
                </ul>
                <h2>FAQs</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    @if (isset($section1->active) && !empty($section1->active))
        @php
            $add_infoS1 =
                isset($section1->additional_info) && !empty($section1->additional_info)
                    ? json_decode($section1->additional_info, true)
                    : '';
        @endphp

        <!--FAQS Page Start-->
        <section class="faqs-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                            @if (isset($add_infoS1['faq_header'][0]) && !empty($add_infoS1['faq_header'][0]))
                                @for ($i = 0; $i < count($add_infoS1['faq_header']); $i++)
                                    <div class="accrodion {{ $i == 0 ? 'active' : '' }}">
                                        <div class="accrodion-title">
                                            <h4><span>.</span>
                                                {{ isset($add_infoS1['faq_header'][$i]) && !empty($add_infoS1['faq_header'][$i]) ? $add_infoS1['faq_header'][$i] : '' }}
                                            </h4>
                                        </div>
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p> {{ isset($add_infoS1['faq_description'][$i]) && !empty($add_infoS1['faq_description'][$i]) ? $add_infoS1['faq_description'][$i] : '' }}
                                                </p>
                                            </div><!-- /.inner -->
                                        </div>
                                    </div>
                                @endfor
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--FAQS Page End-->
    @endif

    @if (isset($section2) && $section2->active == 1)
        <!--Message Box Start-->
        <section class="message-box">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5">
                        <div class="message-box__left">
                            <div class="section-title text-left">
                                <h2 class="section-title__title">
                                    {{ isset($section2->header) && !empty($section2->header) ? $section2->header : '' }}
                                </h2>
                                <span class="section-title__tagline">
                                    {{ isset($section2->description) && !empty($section2->description) ? $section2->description : '' }}
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
                    <div class="col-xl-8 col-lg-7">
                        <div class="message-box__right">

                            {{-- <form action="{{ asset('assets/frontend/assets/inc/sendemail.php') }}"
                                class="comment-one__form contact-form-validated" novalidate="novalidate"> --}}
                            <form id="contactForm" class="comment-one__form contact-form-validated" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" placeholder="Your name" name="name">
                                            <div class="comment-form__icon">
                                                <i class="far fa-user-circle"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="email" placeholder="Email Address" name="email">
                                            <div class="comment-form__icon">
                                                <i class="far fa-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="comment-form__input-box">
                                            <textarea name="message" placeholder="Write Message"></textarea>
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
    @endif

    @if (isset($section3) && $section3->active == 1)
        <!--CTA One Start-->
        <section class="cta-one">
            <div class="cta-one-bg"
                style="background-image: url({{ asset('assets/frontend/assets/images/backgrounds/cta-one-bg.png') }})">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cta-one__inner">
                            <div class="cta-one__left">
                                <h2 class="cta-one__title">
                                    {{ isset($section3->header) && !empty($section3->header) ? $section3->header : '' }}
                                </h2>
                            </div>
                            @php
                                $add_infoS3 =
                                    isset($section3->additional_info) && !empty($section3->additional_info)
                                        ? json_decode($section3->additional_info, true)
                                        : '';
                            @endphp
                            <div class="cta-one__right">
                                <a href="{{ isset($add_infoS3['btn_url']) && !empty($add_infoS3['btn_url']) ? $add_infoS3['btn_url'] : '' }}"
                                    class="thm-btn cta-one__btn"><?= isset($add_infoS3['btn_name']) && !empty($add_infoS3['btn_name']) ? $add_infoS3['btn_name'] : '' ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--CTA One End-->
    @endif

@endsection
@section('frontent-js')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.all.min.js"></script>

    {{-- recaptcha   --}}
    <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>

    <script>
        // grecaptcha.ready(function() {
        //     grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {
        //         action: 'contact'
        //     }).then(function(token) {
        //         document.getElementById('recaptcha_token').value = token;
        //     });
        // });
    </script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
             
            grecaptcha.ready(function() {
                grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {
                        action: 'contact'
                    })
                    .then(function(token) {
                        document.getElementById('recaptcha_token').value = token;
                    });
            });

            $('#contactForm').on('submit', function(e) {
                e.preventDefault();

                var form = this; // <-- SAVE 'this' in a variable!

                grecaptcha.ready(function() {
                    grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {
                        action: 'contact'
                    }).then(function(token) {
                        $('#recaptcha_token').val(token); // Refresh token
                        
                        $.ajax({
                            url: "{{ route('website_contact.store') }}",
                            method: "POST",
                            data: $(form).serialize(),
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Message Sent',
                                    text: response.message,
                                    timer: 2000,
                                    showConfirmButton: false
                                });

                                $('#contactForm')[0].reset(); // Reset form
                            },
                            error: function(xhr) {
                                let errors = xhr.responseJSON.errors;
                                let errorMessage = Object.values(errors).map(
                                    error => error[0]).join(
                                    "\n");

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

@endsection
