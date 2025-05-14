@php
    $locale = session('locale', config('app.locale'));
    app()->setLocale($locale);
    $isRTL = $locale === 'ar';
@endphp

<header class="main-header " dir="{{ $isRTL ? 'rtl' : 'ltr' }}">
    <nav class="main-menu">
        <div class="main-menu-wrapper  d-flex justify-content-between align-items-center">

            <div class="main-menu-wrapper__left  d-flex align-items-center {{ $isRTL ? 'me-3' : 'ms-3' }}">

                <div class="main-menu-wrapper__logo {{ $isRTL ? 'ps-4' : 'pe-4' }}">
                    <a href="{{ url('/') }}">
                        @isset($AppSettings->logo)
                            {{-- <img src="{{ asset('uploads/' . $AppSettings->logo) }}" alt="" height="80" style="max-height: 44px;"> --}}
                            <img src="{{ asset('uploads/' . $AppSettings->logo) }}" alt="" height="50">
                        @endisset
                    </a>
                </div>

                <div class="main-menu-wrapper__main-menu">
                    <a href="#" class="mobile-nav__toggler">
                        <span class="mobile-nav__toggler-bar"></span>
                        <span class="mobile-nav__toggler-bar"></span>
                        <span class="mobile-nav__toggler-bar"></span>
                    </a>
                    {{-- <ul class="main-menu__list  d-flex {{ $isRTL ? 'flex-row-reverse' : '' }}"> --}}
                    <ul class="main-menu__list ">

                        <li class=" {{ $isRTL ? 'mx-4' : '' }}"><a
                                href="{{ url('/') }}">{{ __('event.homeMenu.home') }}</a></li>

                        <li class="dropdown">
                            <a href="{{ url('/solutions') }}">{{ __('event.homeMenu.solutions') }}</a>
                            <ul>
                                {{-- @foreach ($menuCategories as $category)
                                    <li>
                                        <a href="{{ url('category/' . $category->slug) }}">{{ $category->title }}</a>
                                    </li>
                                @endforeach --}}
                                @foreach (__('event.homeMenu.solutions_items') as $slug => $label)
                                    <li>
                                        <a href="{{ url('category/' . $slug) }}">
                                            {{ $label }}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#">{{ __('event.homeMenu.discover') }}</a>
                            <ul>
                                <li><a href="{{ url('/about') }}">{{ __('event.homeMenu.about') }}</a></li>
                                <li><a href="{{ url('/testimonials') }}">{{ __('event.homeMenu.testimonials') }}</a>
                                </li>
                                <li><a href="{{ url('/faq') }}">{{ __('event.homeMenu.faqs') }}</a></li>
                            </ul>
                        </li>

                        <li><a href="{{ url('/case-studies') }}">{{ __('event.homeMenu.case_studies') }}</a></li>
                        <li>
                            <a href="{{ url('/blogs') }}">{{ __('event.homeMenu.blog') }}</a>
                        </li>
                        <li><a href="{{ url('/contact') }}">{{ __('event.homeMenu.contact') }}</a></li>
                    </ul>
                </div>
            </div>

            {{-- <div class="main-menu-wrapper__right  d-flex align-items-center {{ $isRTL ? 'ms-auto' : 'ms-auto' }}"> --}}
            <div class="main-menu-wrapper__right">
                <div class="main-menu__list {{ $isRTL ? 'text-start' : 'text-end' }}">
                    <div class="text-end">
                        <a href="{{ url('locale/en') }}" style="color: white">English</a> |
                        <a href="{{ url('locale/ar') }}" style="color: white">العربية</a>
                    </div>
                </div>

                @if (isset($AppSettings->phone) && !empty($AppSettings->phone))
                    <div class="main-menu-wrapper__phone-contact">
                        <p>{{ __('event.homeMenu.need_help') }}</p>
                        <a
                            href=" {{ isset($AppSettings->phone) && !empty($AppSettings->phone) ? $AppSettings->phone : '' }} ">
                            {{ isset($AppSettings->phone) && !empty($AppSettings->phone) ? $AppSettings->phone : '' }}</a>
                    </div>
                @endif

            </div>
        </div>
    </nav>
</header>


<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->
