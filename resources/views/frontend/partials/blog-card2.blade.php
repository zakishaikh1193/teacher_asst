<div class="blog-single__content-single">
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
            <li><a href="#"><i class="far fa-folder"></i> {{ $blog->category_name }}</a></li>
        </ul>
        <h3 class="blog-single__title">
            <a href="{{ route('blogs.detail', $blog->slug) }}">{{ $blog->title }}</a>
        </h3>
        <p class="blog-single__text">{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 150) }}</p>
        <a href="{{ route('blogs.detail', $blog->slug) }}" class="blog-single__btn">Read More</a>
    </div>
</div>
 