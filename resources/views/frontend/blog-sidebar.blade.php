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
                    <li>Blog Details</li>
                </ul>
                {{-- <h2>Blog Sidebar</h2> --}}
                <h2>{{ $sidebarTitle ?? 'Blog Sidebar' }}</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Blog Single Start-->
    <section class="blog-single">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-single__left">

                        <div class="blog-single__content" id="blog-list">

                            @foreach ($blogs as $blog)
                                {{-- <div class="blog-single__content-single">
                                    <div class="blog-single__content-img">
                                        <img src="{{ asset('uploads/blogs/' . $blog->featured_image) ?? asset('assets/frontend/assets/images/blog/blog-sinlge-img-1.jpg') }}"
                                            alt="{{ $blog->title }}">
                                        <div class="blog-single__date-box">
                                            <p>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M') }}</p>
                                        </div>
                                    </div>
                                    <div class="blog-single__content-box">
                                        <ul class="list-unstyled blog-single__meta">
                                            <li><a href="#"><i class="far fa-user-circle"></i> by Admin</a></li>
                                            <li><span>/</span></li>
                                            <li><a href="#"><i class="far fa-folder"></i>
                                                    {{ $blog->category_name }}</a></li>
                                        </ul>
                                        <h3 class="blog-single__title">
                                            <a href="{{ route('blogs.detail', $blog->slug) }}">{{ $blog->title }}</a>
                                        </h3>
                                        <p class="blog-single__text">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 150) }}</p>
                                        <a href="{{ route('blogs.detail', $blog->slug) }}" class="blog-single__btn">Read
                                            More</a>
                                    </div>
                                </div> --}}
                                @include('frontend.partials.blog-card2', ['blog' => $blog])
                            @endforeach

                            @if ($blogs->isEmpty())
                                <p>No blog posts found for your search.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__search">
                            {{-- <form action="#" class="sidebar__search-form">
                                <input type="search" placeholder="Search here">
                                <button type="submit"><i class="icon-magnifying-glass"></i></button>
                            </form> --}}
                            <form action="{{ route('blogs.search') }}" method="GET" class="sidebar__search-form">
                                <input type="search" name="query" placeholder="Search here"
                                    value="{{ request('query') }}">
                                <button type="submit"><i class="icon-magnifying-glass"></i></button>
                            </form>
                        </div>
                        <div class="sidebar__single sidebar__post">
                            <h3 class="sidebar__title">Latest Posts</h3>
                            <ul class="sidebar__post-list list-unstyled">
                                @foreach ($latestPosts as $post)
                                    <li>
                                        <div class="sidebar__post-image">
                                            <img src="{{ asset('uploads/blogs/' . $post->featured_image) ?? asset('assets/frontend/assets/images/blog/news-page-1.jpg') }}"
                                                alt="{{ $post->title }}">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <h3>
                                                <a href="{{ route('blogs.detail', $post->slug) }}"
                                                    class="sidebar__post-content_meta">
                                                    <i class="far fa-folder"></i>
                                                    {{ $post->category_name ?? 'Uncategorized' }}
                                                </a>
                                                <a href="{{ route('blogs.detail', $post->slug) }}">{{ $post->title }}</a>
                                            </h3>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="sidebar__single sidebar__category">
                            <h3 class="sidebar__title">Categories</h3>
                            <ul class="sidebar__category-list list-unstyled">
                                @foreach ($categories as $cat)
                                    <li
                                        class="{{ isset($activeCategory) && $activeCategory == $cat->id ? 'active' : '' }}">
                                        <a href="{{ route('blogs.byCategory', $cat->id) }}">
                                            {{ $cat->name }} <span class="icon-right-arrow"></span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- @if (isset($blogs[0]))
                            @php
                                $tags = json_decode($blogs[0]->tags ?? '[]');
                            @endphp --}}

                        @if (!empty($tags))
                            <div class="sidebar__single sidebar__tags">
                                <h3 class="sidebar__title">Tags</h3>
                                <div class="sidebar__tags-list">
                                    {{-- @foreach ($tags as $tag)
                                            @if (!empty($tag))
                                                <a
                                                    href="{{ route('blogs.byTag', urlencode($tag)) }}">{{ $tag }}</a>
                                            @endif
                                        @endforeach --}}
                                    @foreach ($tags as $tag)
                                        <a href="{{ route('blogs.byTag', Str::slug($tag)) }}">{{ $tag }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        {{-- @endif --}}

                    </div>
                </div>
            </div>

            {{-- <div class="news-one__more text-center mt-4"> --}}
            {{-- <a href="blog-sidebar.html" class="thm-btn">Load More</a> --}}
            {{-- @if ($blogs->hasMorePages())
                    <button id="load-more" class="thm-btn" data-next-page="{{ $blogs->nextPageUrl() }}">Load More</button>
                @endif --}}
            {{-- </div> --}}

            @if ($blogs->hasMorePages())
                <div class="news-one__more text-center mt-4">
                    <button id="load-more" class="thm-btn"
                        data-next-page="{{ $blogs->nextPageUrl() . '&query=' . urlencode(request('query')) }}">
                        Load More
                    </button>
                </div>
            @endif

        </div>
    </section>
    <!--Blog Single End-->

@endsection

@section('frontent-js')
    {{-- <script>
        $(document).on('click', '#load-more', function() {
            const button = $(this);
            const nextPage = button.data('next-page');

            if (!nextPage) return;

            $.get(nextPage, function(response) {
                $('#blog-list').append(response.html);

                if (response.nextPage) {
                    button.data('next-page', response.nextPage);
                } else {
                    button.remove();
                }
            });
        });
    </script> --}}

    <script>
        $(document).on('click', '#load-more', function() {
            const button = $(this);
            const nextPage = button.data('next-page');

            if (!nextPage) return;

            $.get(nextPage, function(response) {
                $('#blog-list').append(response.html);

                if (response.nextPage) {
                    button.data('next-page', response.nextPage);
                } else {
                    button.remove();
                }
            });
        });
    </script>


@endsection
