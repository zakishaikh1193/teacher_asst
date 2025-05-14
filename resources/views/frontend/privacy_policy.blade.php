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
                    <li>Privacy Policy</li>
                </ul>
                <h2>Privacy Policy</h2>
            </div>
        </div>
    </section>


    <section class="privacy-policy-page py-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h2 class="mb-4">Privacy Policy</h2>
 
                    <p>At Legato Design , your privacy matters. This policy outlines how we collect, use, and protect your
                        personal information when you engage with our website or services.</p>

                    <h4 class="mt-4">1. Information Collection</h4> 
                    <p>We collect personal information only when it’s relevant to your interaction with us—such as when you
                        contact us, download content, or request updates. This information is collected transparently and
                        with your consent, helping us better serve your needs.</p>
                    <p>We may also collect non-personal data automatically (such as browser type or usage patterns) to
                        understand how our site is used and to improve performance.</p>

                    <h4 class="mt-4">2. Cookies and Tracking Technologies</h4>
                    <p>Our site uses cookies and similar technologies to enhance your experience, understand usage patterns,
                        and deliver relevant content. These technologies may track anonymized information like page views,
                        visit duration, and browser preferences.</p>
                    <p>You can modify your cookie settings at any time via your browser. However, disabling cookies may
                        affect some site functionality.</p>

                    <h4 class="mt-4">3. How We Use Your Data</h4>
                    <p>We use the information you provide to:</p>
                    <ul>
                        <li>Respond to inquiries and provide support</li>
                        <li>Share relevant news, updates, or content</li>
                        <li>Improve our website, offerings, and user experience</li>
                        <li>Understand engagement with our content and refine communications</li>
                    </ul>
                    <p>We strive to use your data in ways that are transparent, purposeful, and aligned with your
                        expectations.</p>

                    <h4 class="mt-4">4. Data Sharing and Disclosure</h4>
                    <p>We do not sell, rent, or trade your personal information. We may share it only:</p>
                    <ul>
                        <li>With trusted service providers who support our operations (under confidentiality agreements)
                        </li>
                        <li>To comply with legal obligations or regulatory requests</li>
                    </ul>
                    <p>Any third-party access is limited strictly to the purposes for which the data was shared.</p>

                    <h4 class="mt-4">5. Data Security</h4>
                    <p>We use appropriate technical and organizational measures to protect your personal data from
                        unauthorized access, loss, or misuse. While no system is completely secure, we regularly review and
                        update our safeguards to protect your information to the best of our ability.</p>

                    <h4 class="mt-4">6. Your Rights</h4>
                    <p>You have the right to access, correct, or request deletion of your personal information. To exercise
                        these rights or ask questions about your data, please contact us via our Contact Us page.</p>

                    <h4 class="mt-4">7. Changes to This Policy</h4>
                    <p>We may update this privacy policy from time to time. All changes will be posted on this page, and we
                        encourage you to review the policy periodically for any updates.</p>

                    <h4 class="mt-4">8. Questions from Visitors</h4>
                    <p>If you have any questions or concerns about this policy or how your data is handled, please get in
                        touch through our Contact Us page.</p>
                </div>
            </div>
        </div>
    </section> 



@endsection
@section('frontent-js')

@endsection
