<div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
    <div class="news-one__single">
        <div class="news-one__img">
            {{-- <img src="{{ asset('uploads/blogs/' . $blog->featured_image) ?? asset('assets/frontend/assets/images/blog/news-page-1.jpg') }}"
                alt="{{ $blog->title }}"> --}}
            <img src="{{ asset('uploads/blogs/' . $blog->listing_image) ?? asset('assets/frontend/assets/images/blog/news-page-1.jpg') }}"
                alt="{{ $blog->title }}">
            <a href="{{ url('blog/' . $blog->slug) }}">
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
                <a href="{{ url('blog/' . $blog->slug) }}">{{ $blog->title }}</a>
            </h3>
            <p class="news-one__text">{{ \Illuminate\Support\Str::limit($blog->meta_description, 100) }}</p>
            <a href="{{ url('blog/' . $blog->slug) }}" class="news-one__btn">Read More</a>
            <div class="news-one__date-box">
                <p>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M') }}</p>
            </div>
        </div>
    </div>
</div>
