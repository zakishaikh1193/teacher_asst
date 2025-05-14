<header class="main-header clearfix">
    <nav class="main-menu clearfix">
        <div class="main-menu-wrapper">
            <div class="main-menu-wrapper__left">
                <div class="main-menu-wrapper__logo">
                    <a href="{{ url('/') }}">
                        {{-- <img src="{{ asset('assets/frontend/assets/images/logo-1.png') }}" alt=""> --}}
                        @isset($AppSettings->logo)
                            <img src="{{ asset('uploads/' . $AppSettings->logo) }}" alt="" style="max-height: 44px;">
                        @endisset
                    </a>
                </div>
                <div class="main-menu-wrapper__main-menu">
                    <a href="#" class="mobile-nav__toggler">
                        <span class="mobile-nav__toggler-bar"></span>
                        <span class="mobile-nav__toggler-bar"></span>
                        <span class="mobile-nav__toggler-bar"></span>
                    </a>
                    <ul class="main-menu__list">

                        <li><a href="{{ url('/') }}">Home</a></li>

                        {{-- <li class="dropdown  ">
                            <a href="{{ url('/') }}">Home </a>
                            <ul>
                                <li>
                                    <a href="{{ url('/') }}">Home One</a>
                                </li>
                                <li><a href="{{ url('/home-2') }}">Home Two</a></li>
                                <li><a href="{{ url('/home-3') }}">Home Three</a></li>  
                                <li><a href="{{ url('/') }}">Home One Page</a></li>  
                            </ul>
                        </li> --}}

                        <li class="dropdown">
                            <a href="{{ url('/solutions') }}">Solutions</a>
                            <ul>
                                {{-- <li><a href="{{ url('/solutions-listing') }}">Services</a></li> --}}
                                {{-- <li><a href="{{ url('/solutions') }}">Services Two</a></li> --}}
                                @foreach ($menuCategories as $category)
                                    <li>
                                        <a href="{{ url('category/' . $category->slug) }}">{{ $category->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#">Discover</a>
                            <ul>
                                <li><a href="{{ url('/about') }}">About</a></li>
                                {{-- <li><a href="{{ url('/team') }}">Team</a></li> --}}
                                <li><a href="{{ url('/testimonials') }}">Testimonials</a></li>
                                <li><a href="{{ url('/faq') }}">FAQS</a></li>
                                <!-- <li><a href="404.html">404</a></li> -->
                            </ul>
                        </li>

                        {{-- <li class="dropdown">
                            <a href="{{ url('/') }}">Cases</a>
                            <ul>
                                <li><a href="{{ url('/cases') }}">Cases</a></li>
                                <li><a href="{{ url('/cases-details') }}">Cases Details</a></li>
                            </ul>
                        </li> --}}

                        <li><a href="{{ url('/case-studies') }}">Case Studies</a></li>

                        {{-- <li class="dropdown">
                            <a href="shop.html">Shop</a>
                            <ul>
                                <li><a href="{{ url('/') }}">Products</a></li>
                                <li><a href="{{ url('/') }}">Product Details</a></li>
                                <li><a href="{{ url('/') }}">Cart</a></li>
                                <li><a href="{{ url('/') }}">Checkout</a></li>
                            </ul>
                        </li> --}}

                        {{-- <li class="dropdown"> --}}
                        <li>
                            <a href="{{ url('/blogs') }}">Blog</a>
                            {{-- <ul>
                                <li><a href="{{ url('/blogs') }}">Blog</a></li>
                                <li><a href="{{ url('/blogs') }}">Blog Sidebar</a></li>
                                <li><a href="{{ url('/blog-details') }}">Blog Details</a></li>
                            </ul> --}}
                        </li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>

            <div class="main-menu-wrapper__right">
                <div class="main-menu-wrapper__social-box">
                    <div class="main-menu-wrapper__social">
                        @if (isset($AppSettings->twitter) && !empty($AppSettings->twitter))
                            <a
                                href="{{ isset($AppSettings->twitter) && !empty($AppSettings->twitter) ? $AppSettings->twitter : '' }}">
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
                <div class="main-menu-wrapper__search-box">
                    <a href="#" class="main-menu-wrapper__search search-toggler icon-magnifying-glass1"></a>
                </div>
                <div class="main-menu-wrapper__phone-contact">
                    <p>Need help? Talk to an expert</p>
                    <a
                        href=" {{ isset($AppSettings->phone) && !empty($AppSettings->phone) ? $AppSettings->phone : '' }} ">
                        {{ isset($AppSettings->phone) && !empty($AppSettings->phone) ? $AppSettings->phone : '' }}</a>
                </div>
            </div>
        </div>
    </nav>
</header>


<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->
