@extends('frontend.layouts.app')

@section('seo_title', e($seo['title'] ?? 'Legato Design '))
@section('seo_description', e($seo['meta_description'] ?? 'Legato Design '))
@section('seo_keywords', e($seo['keywords'] ?? 'Legato Design '))

@section('frontent-css')
    <style>
        .news-details__content img {
            display: block;
            max-width: 100%;
            height: auto;
            margin: 20px auto;
            /* vertical spacing + centering */
            padding: 10px;
            clear: both;
        }

        .news-details__content iframe,
        .news-details__content video {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 15px 0;
        }

        .news-details__content p {
            margin-bottom: 1.25rem;
            line-height: 1.6;
        }
    </style>
@endsection

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp

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
                <h2>Blog Details</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <section class="news-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="news-details__left">
                        <div class="news-details__img">
                            {{-- <img src="{{ asset('assets/frontend/assets/images/blog/news-details-img.jpg') }}"
                                alt=""> --}}
                            <img src="{{ asset('uploads/blogs/' . $blog->featured_image) ?? asset('assets/frontend/assets/images/blog/news-page-1.jpg') }}"
                                alt="{{ $blog->title }}" class="img-fluid w-100">

                            <div class="news-details__date-box">
                                {{-- <p>26 mar</p> --}}
                                <p>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</p>
                            </div>
                        </div>
                        <div class="news-details__content">
                            <ul class="list-unstyled news-details__meta">
                                {{-- <li><a href="news-details.html"><i class="far fa-user-circle"></i> by Admin</a></li>
                                <li><span>/</span></li>
                                <li><a href="news-details.html"><i class="far fa-comments"></i> 0 Comments</a>
                                </li> --}}
                                <li><i class="far fa-folder"></i> {{ $blog->category_name }}</li>
                            </ul>
                            <h3 class="news-details__title">{{ $blog->title }} </h3>

                            <div class="mb-4">
                                {!! $blog->content !!}
                            </div>
                        </div>


                        <div class="news-details__bottom">
                            @if (!empty($blog->tags))
                                <p class="news-details__tags">
                                    <span>Tags: </span>
                                    @foreach ($blog->tags as $tag) 
                                        @if (!empty($tag))
                                            <a class="m-1" href="{{ route('blogs.byTag', Str::slug($tag)) }}">{{ $tag }}
                                            </a>
                                        @endif
                                    @endforeach
                                </p>
                            @endif

                            <div class="news-details__social-list">
                                @if (isset($AppSettings->twitter) && !empty($AppSettings->twitter))
                                    <a
                                        href="{{ isset($AppSettings->twitter) && !empty($AppSettings->twitter) ? $AppSettings->twitter : '' }}">
                                        {{-- <i class="fab fa-twitter"></i> --}}
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
                        <a href="{{ route('blogs.page') }}" class="btn btn-secondary mt-4">← Back to Blog</a>

                        {{-- <div class="author-one">
                            <div class="author-one__image">
                                <img src="{{ asset('assets/frontend/assets/images/blog/author-1-1.jpg') }}" alt="">
                            </div>
                            <div class="author-one__content">
                                <h3>Christine Eve</h3>
                                <p>It has survived not only five centuries, but also the leap into electronic
                                    typesetting, remaining unchanged. It was popularised in the sheets containing.
                                </p>
                            </div>
                        </div> --}}

                        {{-- <div class="comment-one">
                            <h3 class="comment-one__title">2 Comments</h3>
                            <div class="comment-one__single">
                                <div class="comment-one__image">
                                    <img src="{{ asset('assets/frontend/assets/images/blog/comment-1-1.png') }}"
                                        alt="">
                                </div>
                                <div class="comment-one__content">
                                    <h3>Kevin Martin</h3>
                                    <p>It has survived not only five centuries, but also the leap into electronic
                                        typesetting unchanged. It was popularised in the sheets containing lorem
                                        ipsum is simply free text.</p>
                                    <a href="#" class="thm-btn comment-one__btn">Reply</a>
                                </div>
                            </div>
                            <div class="comment-one__single">
                                <div class="comment-one__image">
                                    <img src="{{ asset('assets/frontend/assets/images/blog/comment-1-2.png') }}"
                                        alt="">
                                </div>
                                <div class="comment-one__content">
                                    <h3>sarah brown</h3>
                                    <p>It has survived not only five centuries, but also the leap into electronic
                                        typesetting unchanged. It was popularised in the sheets containing lorem
                                        ipsum is simply free text.</p>
                                    <a href="#" class="thm-btn comment-one__btn">Reply</a>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="comment-form">
                            <h3 class="comment-form__title">Leave a Comment</h3>
                            <form action="assets/inc/sendemail.php" class="comment-one__form contact-form-validated"
                                novalidate="novalidate">
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
                                        <button type="submit" class="thm-btn comment-form__btn">Submit
                                            Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div> --}}
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
                                            <img src="{{ asset('uploads/blogs/' . $post->featured_image) ?? asset('assets/frontend/assets/images/blog/lp-1-1.jpg') }}"
                                                alt="{{ $post->title }}">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <h3>
                                                <a href="{{ route('blogs.detail', $post->slug) }}"
                                                    class="sidebar__post-content_meta">
                                                    <i class="far fa-folder"></i> {{ $post->category_name }}
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
                                {{-- <li><a href="#">Consulting <span class="icon-right-arrow"></span></a></li>
                                <li class="active"><a href="#">Marketing <span class="icon-right-arrow"></span></a>
                                </li>
                                <li><a href="#">Technology <span class="icon-right-arrow"></span></a></li>
                                <li><a href="#">Business & Finance <span class="icon-right-arrow"></span></a></li>
                                <li><a href="#">Bank Cryptcy <span class="icon-right-arrow"></span></a></li> --}}

                                @foreach ($categories as $cat)
                                    <li>
                                        <a href="{{ url('blogs/category/' . $cat->id) }}">
                                            {{ $cat->name }} <span class="icon-right-arrow"></span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__single sidebar__tags">
                            <h3 class="sidebar__title">Tags</h3>
                            <div class="sidebar__tags-list">

                                {{-- @foreach ($blog->tags as $tag)
                                    @if (!empty($tag))
                                        <a href="{{ url('blogs/tag/' . urlencode($tag)) }}">{{ $tag }}</a>
                                    @endif
                                @endforeach --}}

                                @foreach ($tags as $tag)
                                    <a href="{{ route('blogs.byTag', $tag) }}">{{ $tag }}</a>
                                @endforeach
                            </div>
                        </div>

                        {{-- <div class="sidebar__single sidebar__comments">
                            <h3 class="sidebar__title">Comments</h3>
                            <ul class="sidebar__comments-list list-unstyled">
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comment"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p>A Wordpress Commenter on <br> Launch New Mobile App</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comment"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p>John Doe on Template:</p>
                                        <h5>Comments</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comment"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p>A Wordpress Commenter on <br> Launch New Mobile App</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comment"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p>John Doe on Template:</p>
                                        <h5>Comments</h5>
                                    </div>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('frontent-js')

@endsection
