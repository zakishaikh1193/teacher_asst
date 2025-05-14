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
                    <li>Terms of Use</li>
                </ul>
                <h2>Terms of Use</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->
    <section class="privacy-policy-page py-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">

                    <h2 class="mb-4">Terms of Use</h2>
                    <p>Welcome to Legato Design. These Terms of Use govern your access to and use of our website and the
                        services,
                        content, and materials we provide (collectively, the "Services").</p>

                    <p>By accessing or using our Services, you agree to comply with and be bound by these Terms.</p>

                    <h4 class="mt-4">1. Use of Our Services</h4>
                    <p>Legato Design offers learning solutions, instructional design, curriculum development, and digital
                        education
                        content for publishers, schools, universities, and professional development providers.</p>
                    <p>You agree to:</p>
                    <ul>
                        <li>Use the Services for lawful and authorized purposes only.</li>
                        <li>Not interfere with the security, integrity, or performance of the Services.</li>
                        <li>Not reproduce, distribute, or exploit any part of our content without our prior written consent.
                        </li>
                    </ul>

                    <h4 class="mt-4">2. Intellectual Property</h4>
                    <p>All content available through Legato Design—including but not limited to designs, curriculum
                        frameworks,
                        structured lesson plans, graphics, and original learning materials—is the property of Legato Design
                        or our
                        content partners and protected under copyright, trademark, and other intellectual property laws.</p>
                    <p>Use of the content is limited to viewing or downloading for permitted purposes. You may not reuse,
                        adapt, or commercialize any content without express written permission.</p>

                    <h4 class="mt-4">3. User Submissions</h4>
                    <p>Any feedback, ideas, or materials you submit to Legato Design ("User Submissions") may be used to
                        improve
                        our Services. By submitting content, you grant Legato Design a non-exclusive, royalty-free,
                        worldwide,
                        perpetual license to use, reproduce, and display such content in connection with our business.</p>
                    <p>You are solely responsible for the legality and originality of your submissions.</p>

                    <h4 class="mt-4">4. Educational Content Disclaimer</h4>
                    <p>Legato Design creates content aligned with global education standards (e.g., EYFS, EYLF, IB PYP), but
                        we do
                        not claim official accreditation from any governing body. Our materials are designed to support, not
                        replace, your institution’s curriculum or educator guidance.</p>

                    <h4 class="mt-4">5. Limitation of Liability</h4>
                    <p>To the extent permitted by law, Legato Design shall not be liable for any indirect, incidental, or
                        consequential damages, including but not limited to lost profits, loss of learning progress, or data
                        loss resulting from the use or inability to use our Services.</p>

                    <h4 class="mt-4">6. Third-Party Links</h4>
                    <p>Legato Design’s website may contain links to third-party sites. These are provided for convenience
                        and do 
                        not imply endorsement. We are not responsible for the content or practices of those third-party
                        sites.</p>

                    <h4 class="mt-4">7. Modifications to These Terms</h4>
                    <p>We may update these Terms from time to time. Changes will be posted on this page and will become
                        effective upon publication. Continued use of our Services after updates constitutes acceptance of
                        the revised Terms.</p>

                    <h4 class="mt-4">8. Governing Law</h4>
                    <p>These Terms shall be governed by and construed in accordance with the laws of the Republic of India.
                        Any disputes arising under these Terms shall be subject to the exclusive jurisdiction of the courts
                        of the Republic of India.</p>
                </div>
            </div>
        </div>
    </section>


@endsection
@section('frontent-js')

@endsection
