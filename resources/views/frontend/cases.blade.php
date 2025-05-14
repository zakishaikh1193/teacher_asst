@extends('frontend.layouts.app')

@section('seo_title', e($seo['title'] ?? 'Legato Design '))
@section('seo_description', e($seo['meta_description'] ?? 'Legato Design '))
@section('seo_keywords', e($seo['keywords'] ?? 'Legato Design '))

@section('frontent-css')
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
                    <li>Cases Studies</li>
                </ul>
                <h2>Cases Studies</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Cases One Start-->
    <section class="cases-one cases-page">
        <div class="container">
            <div class="row" id="case-list">

                {{-- <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <!--Cases One Single-->
                    <div class="cases-one__single">
                        <div class="cases-one__img-box">
                            <div class="cases-one__img">
                                <img src="{{ asset('assets/frontend/assets/images/resources/cases-page-img-1.jpg') }}"
                                    alt="">
                            </div>
                            <div class="cases-one__content">
                                <div class="cases-one__icon">
                                    <span class="icon-mobile-analytics"></span>
                                </div>
                                <p class="cases-one__tagline">Thought leadership</p>
                                <h2 class="cases-one__tilte"><a href="cases-details.html">businesses growth</a></h2>
                            </div> 
                        </div>  
                    </div> 
                </div> --}}

                @foreach ($cases as $case)
                    @include('frontend.partials.case-card', ['case' => $case])
                @endforeach
 
            </div>

            @if ($cases->hasMorePages())
                <div class="text-center mt-4">
                    <button id="load-more" class="thm-btn" data-next-page="{{ $cases->nextPageUrl() }}">Load More</button>
                </div>
            @endif

        </div>
    </section>
    <!--Cases One End-->

@endsection

@section('frontent-js') 

    <script>
        $(document).on('click', '#load-more', function() {
            const button = $(this);
            const nextPage = button.data('next-page');

            if (!nextPage) return;

            $.get(nextPage, function(response) {
                $('#case-list').append(response.html);

                if (response.nextPage) {
                    button.data('next-page', response.nextPage);
                } else {
                    button.remove();
                }
            });
        });
    </script>

@endsection
