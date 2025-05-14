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
                    <li>Services</li>
                </ul>
                <h2>Blog
                </h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--News One Start-->
    <section class="news-one news-one__page">
        <div class="container">
            <div class="row" id="blog-list">

                {{-- <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <!--News One Single-->
                    <div class="news-one__single">
                        <div class="news-one__img">
                            <img src="{{ asset('assets/frontend/assets/images/blog/news-page-1.jpg') }}" alt="">
                            <a href="blog-details.html">
                                <span class="news-one__plus"></span>
                            </a>
                        </div>
                        <div class="news-one__content">
                            <ul class="list-unstyled news-one__meta">
                                <li><a href="#"><i class="far fa-user-circle"></i> by Admin</a></li>
                                <li><span>/</span></li>
                                <li><a href="#"><i class="far fa-comments"></i> 2 Comments</a>
                                </li>
                            </ul>
                            <h3 class="news-one__title">
                                <a href="blog-details.html">business advice for growth</a>
                            </h3>
                            <p class="news-one__text">Aellentesque porttitor lacus quis enim varius sed efficitur
                                turpis gilla sed sit amet.</p>
                            <a href="blog-details.html" class="news-one__btn">Read More</a>
                            <div class="news-one__date-box">
                                <p>26 mar</p>
                            </div>
                        </div>
                    </div>
                </div>   --}}

            </div>
            <div class="news-one__more text-center">
                {{-- <a href="blog.html" class="thm-btn">Load More</a> --}}
                <button id="load-more" class="btn btn-primary thm-btn">Load More</button>
            </div><!-- /.news-one__more text-center -->
        </div>
    </section>
    <!--News One End-->

@endsection

@section('frontent-js')
    {{-- <script>
        let page = 1;

        function loadBlogs() {
            $.ajax({
                url: '{{ route('blogs.load') }}',
                type: 'GET',
                data: {
                    page: page
                },
                success: function(response) {
                    response.blogs.forEach(blog => {
                        let tags = blog.tags.map(tag =>
                            `<span class="badge bg-info me-1">${tag}</span>`).join(' ');
                        let image = blog.featured_image ??
                            '{{ asset('assets/frontend/assets/images/blog/news-page-1.jpg') }}';
                        let date = new Date(blog.created_at);
                        let day = String(date.getDate()).padStart(2, '0');
                        let month = date.toLocaleString('default', {
                            month: 'short'
                        });

                        $('#blog-list').append(`
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="news-one__single">
                                <div class="news-one__img">
                                    <img src="${image}" alt="${blog.title}">
                                    <a href="/blog/${blog.slug}">
                                        <span class="news-one__plus"></span>
                                    </a> 
                                </div>
                                <div class="news-one__content">
                                    <ul class="list-unstyled news-one__meta">
                                        <li><a href="#"><i class="far fa-user-circle"></i> by Admin</a></li>
                                        <li><span>/</span></li>
                                        <li><a href="#"><i class="far fa-comments"></i> 0 Comments</a></li>
                                    </ul>
                                    <h3 class="news-one__title">
                                        <a href="/blog/${blog.slug}">${blog.title}</a>
                                    </h3>
                                    <p class="news-one__text">${blog.meta_description?.substring(0, 100) ?? ''}...</p>
                                    <a href="/blog/${blog.slug}" class="news-one__btn">Read More</a>
                                    <div class="news-one__date-box">
                                        <p>${day} ${month}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                    });

                    if (!response.hasMore) {
                        $('#load-more').hide();
                    }

                    page++;
                }
            });
        }

        $(document).ready(function() {
            loadBlogs();

            $('#load-more').click(function() {
                loadBlogs();
            });
        });
    </script> --}}

    <script>
        let page = 1;

        function loadBlogs() {
            $.ajax({
                url: '{{ route('blogs.load') }}',
                type: 'GET',
                data: {
                    page: page
                },
                success: function(response) {
                    $('#blog-list').append(response.html);

                    if (!response.hasMore) {
                        $('#load-more').hide();
                    }

                    page++;

                    // Re-init WOW.js if needed
                    if (typeof WOW !== 'undefined') {
                        new WOW().init();
                    }
                }
            });
        }

        $(document).ready(function() {
            loadBlogs();

            $('#load-more').click(function() {
                loadBlogs();
            });
        });
    </script>
@endsection
