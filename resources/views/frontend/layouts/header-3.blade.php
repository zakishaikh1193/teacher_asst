<header class="main-header main-header-three clearfix">
    <div class="container clearfix">
        <nav class="main-menu main-menu-three clearfix">
            <div class="main-menu-wrapper-three clearfix">
                <div class="main-menu-wrapper__logo-3">
                    @isset($AppSettings->logo)
                        <img src="{{ asset('uploads/' . $AppSettings->logo) }}" alt="" style="max-height: 44px;">
                    @endisset
                </div>
                <div class="main-menu-wrapper-three__main-menu">
                    <div class="main-menu-wrapper-three__main-menu-inner">
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
                                    <li><a href="index-one-page.html">Home One Page</a></li>
                                    <li class="dropdown">
                                        <a href="#">Header Styles</a>
                                        <ul>
                                            <li><a href="{{ url('/') }}">Header One</a></li>
                                            <li><a href="{{ url('/') }}">Header Two</a></li>
                                            <li><a href="{{ url('/') }}">Header Three</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li> --}}

                            <li class="dropdown">
                                <a href="{{ url('/services-1') }}">Services</a>
                                <ul>
                                    <li><a href="{{ url('/services-1') }}">Services</a></li>
                                    <li><a href="{{ url('/services-2') }}">Services Two</a></li>

                                    @foreach ($menuCategories as $category)
                                        <li>
                                            <a
                                                href="{{ url('category/' . $category->slug) }}">{{ $category->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#">Pages</a>
                                <ul>
                                    <li><a href="{{ url('/about') }}">About</a></li>
                                    <li><a href="{{ url('/team') }}">Team</a></li>
                                    <li><a href="{{ url('/testimonials') }}">Testimonials</a></li>
                                    <li><a href="{{ url('/faq') }}">FAQS</a></li>
                                </ul>
                            </li>
                            {{-- <li class="dropdown">
                                <a href="cases.html">Cases</a>
                                <ul>
                                    <li><a href="cases.html">Cases</a></li>
                                    <li><a href="cases-details.html">Cases Details</a></li>
                                </ul>
                            </li> --}}

                            <li><a href="{{ url('/cases') }}">Cases</a></li>

                            {{-- <li class="dropdown">
                                <a href="shop.html">Shop</a>
                                <ul>
                                    <li><a href="shop.html">Products</a></li>
                                    <li><a href="product-details.html">Product Details</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                </ul>
                            </li> --}}
                            <li class="dropdown">
                                <a href="{{ url('/blogs') }}">Blog</a>
                                {{-- <ul>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="blog-sidebar.html">Blog Sidebar</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul> --}}
                            </li>
                            <li><a href="{{ url('/contact') }}">Contact</a></li>
                        </ul>
                    </div>
                    <div class="main-menu-wrapper-three__social-box">
                        <div class="main-menu-wrapper-three__social">
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
                </div>
            </div>
        </nav>
    </div>
</header>

<div class="stricky-header stricked-menu main-menu main-menu-three">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->
