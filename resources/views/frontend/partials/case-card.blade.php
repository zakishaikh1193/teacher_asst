<div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
    <div class="cases-one__single">
        <div class="cases-one__img-box">
            <div class="cases-one__img">
                <img src="{{ asset('uploads/cases/' . $case->listing_image) }}" alt="{{ $case->title }}">
            </div>
            <div class="cases-one__content">
                {{-- <div class="cases-one__icon">
                    <span class="icon-creative"></span>
                </div> --}}
                <div class="cases-one__icon">
                    @if (isset($case->icon))
                        <img src="{{ asset('uploads/cases/' . $case->icon) }}" width="64" height="64"
                            alt="Logo Icon"> 
                    @endif
                </div>
                <p class="cases-one__tagline">{{ $case->client ?? 'Strategy' }}</p>
                <h2 class="cases-one__tilte">
                    <a href="{{ route('cases.detail', $case->slug) }}">{{ $case->title }}</a>
                </h2>
            </div>
        </div>
    </div>
</div>
