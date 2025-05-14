<header class="main-header main-header--two main-header--three sticky-header sticky-header--three sticky-header--normal">
    <div class="container-fluid">
        <div class="main-header__inner">
            <div class="main-header__left">
                <div class="main-header__logo logo-retina">
                    <a href="{{ route('courses.index') }}">
                        <img src="{{ asset('assets/courses/assets/images/logo.png') }}" alt="" 
                            width="150"> 
                    </a> 
                </div><!-- /.main-header__logo -->
                {{-- <div class="main-header__courses">
                    <div class="main-header__courses__text">
                        <span class="main-header__courses__icon-list">
                            <i class="icon-list"></i>
                        </span>
                        our courses
                        <span class="main-header__courses__icon-arrow">
                            <i class="icon-chevron-down"></i>
                        </span> 
                    </div><!-- /.main-header__courses__text -->
                    <ul class="main-header__courses__list">
                        <li><a href="wordpress-development.html">Wordpress Development</a></li>
                        <li><a href="data-science.html">Data Science</a></li>
                        <li><a href="web-development.html">Web Development</a></li>
                        <li><a href="uiux-design.html">UI/UX Design</a></li>
                        <li><a href="graphics-design.html">Graphics Design</a></li>
                        <li><a href="digital-marketing.html">Digital Marketing</a></li>
                        <li><a href="search-engine-optimization.html">Search Engine Optimization</a></li>
                        <li><a href="apps-development.html">Apps Development</a></li>
                        <li><a href="web-design.html">Web Design</a></li>
                    </ul><!-- /.main-header__courses__list -->
                </div> --}}
            </div><!-- /.main-header__left -->
            <div class="main-header__right">
                <nav class="main-header__nav main-menu">
                    <ul class="main-menu__list">

                        {{-- <li class="dropdown megamenu">
                            <a href="{{ route('courses.index') }}">Home</a>
                            <ul>
                                <li>
                                    <section class="home-showcase">
                                        <div class="container">
                                            <div class="home-showcase__inner">
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="demo-one__card">
                                                            <div class="demo-one__image">
                                                                <img src="{{ asset('assets/courses/assets/images/home-showcase/home-showcase-1.jpg') }}"
                                                                    alt="">
                                                                <div class="demo-one__btns">
                                                                    <a href="index.html"
                                                                        class="eduhive-btn demo-one__btn">
                                                                        <span>Multi Page</span>
                                                                        <span class="eduhive-btn__icon">
                                                                            <span class="eduhive-btn__icon__inner"><i
                                                                                    class="icon-right-arrow"></i></span>
                                                                        </span>
                                                                    </a><!-- /.thm-btn demo-one__btn -->
                                                                    <a href="index-one-page.html"
                                                                        class="eduhive-btn demo-one__btn">
                                                                        <span>One Page</span>
                                                                        <span class="eduhive-btn__icon">
                                                                            <span class="eduhive-btn__icon__inner"><i
                                                                                    class="icon-right-arrow"></i></span>
                                                                        </span>
                                                                    </a><!-- /.thm-btn demo-one__btn -->
                                                                </div><!-- /.demo-one__btns -->
                                                            </div><!-- /.demo-one__image -->
                                                            <div class="demo-one__content">
                                                                <h3 class="demo-one__title">
                                                                    <a href="index.html">Home Page 01</a>
                                                                </h3><!-- /.demo-one__title -->
                                                            </div><!-- /.demo-one__content -->
                                                        </div><!-- /.demo-one__card -->
                                                    </div><!-- /.col-md-6 col-lg-3 -->
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="demo-one__card">
                                                            <div class="demo-one__image">
                                                                <img src="{{ asset('assets/courses/assets/images/home-showcase/home-showcase-2.jpg') }}"
                                                                    alt="">
                                                                <div class="demo-one__btns">
                                                                    <a href="index-2.html"
                                                                        class="eduhive-btn demo-one__btn">
                                                                        <span>Multi Page</span>
                                                                        <span class="eduhive-btn__icon">
                                                                            <span class="eduhive-btn__icon__inner"><i
                                                                                    class="icon-right-arrow"></i></span>
                                                                        </span>
                                                                    </a><!-- /.thm-btn demo-one__btn -->
                                                                    <a href="index-2-one-page.html"
                                                                        class="eduhive-btn demo-one__btn">
                                                                        <span>One Page</span>
                                                                        <span class="eduhive-btn__icon">
                                                                            <span class="eduhive-btn__icon__inner"><i
                                                                                    class="icon-right-arrow"></i></span>
                                                                        </span>
                                                                    </a><!-- /.thm-btn demo-one__btn -->
                                                                </div><!-- /.demo-one__btns -->
                                                            </div><!-- /.demo-one__image -->
                                                            <div class="demo-one__content">
                                                                <h3 class="demo-one__title">
                                                                    <a href="index-2.html">Home Page 02</a>
                                                                </h3><!-- /.demo-one__title -->
                                                            </div><!-- /.demo-one__content -->
                                                        </div><!-- /.demo-one__card -->
                                                    </div><!-- /.col-md-6 col-lg-3 -->
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="demo-one__card">
                                                            <div class="demo-one__image">
                                                                <img src="{{ asset('assets/courses/assets/images/home-showcase/home-showcase-3.jpg') }}"
                                                                    alt="">
                                                                <div class="demo-one__btns">
                                                                    <a href="index-3.html"
                                                                        class="eduhive-btn demo-one__btn">
                                                                        <span>Multi Page</span>
                                                                        <span class="eduhive-btn__icon">
                                                                            <span class="eduhive-btn__icon__inner"><i
                                                                                    class="icon-right-arrow"></i></span>
                                                                        </span>
                                                                    </a><!-- /.thm-btn demo-one__btn -->
                                                                    <a href="index-3-one-page.html"
                                                                        class="eduhive-btn demo-one__btn">
                                                                        <span>One Page</span>
                                                                        <span class="eduhive-btn__icon">
                                                                            <span class="eduhive-btn__icon__inner"><i
                                                                                    class="icon-right-arrow"></i></span>
                                                                        </span>
                                                                    </a><!-- /.thm-btn demo-one__btn -->
                                                                </div><!-- /.demo-one__btns -->
                                                            </div><!-- /.demo-one__image -->
                                                            <div class="demo-one__content">
                                                                <h3 class="demo-one__title">
                                                                    <a href="index-3.html">Home Page 03</a>
                                                                </h3><!-- /.demo-one__title -->
                                                            </div><!-- /.demo-one__content -->
                                                        </div><!-- /.demo-one__card -->
                                                    </div><!-- /.col-md-6 col-lg-3 -->
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="demo-one__card">
                                                            <div class="demo-one__image">
                                                                <img src="{{ asset('assets/courses/assets/images/home-showcase/home-showcase-4.jpg') }}"
                                                                    alt="">
                                                                <div class="demo-one__btns">
                                                                    <a href="index-dark.html"
                                                                        class="eduhive-btn demo-one__btn">
                                                                        <span>View Page</span>
                                                                        <span class="eduhive-btn__icon">
                                                                            <span class="eduhive-btn__icon__inner"><i
                                                                                    class="icon-right-arrow"></i></span>
                                                                        </span>
                                                                    </a><!-- /.thm-btn demo-one__btn -->
                                                                </div><!-- /.demo-one__btns -->
                                                            </div><!-- /.demo-one__image -->
                                                            <div class="demo-one__content">
                                                                <h3 class="demo-one__title">
                                                                    <a href="index-dark.html">Home Dark</a>
                                                                </h3><!-- /.demo-one__title -->
                                                            </div><!-- /.demo-one__content -->
                                                        </div><!-- /.demo-one__card -->
                                                    </div><!-- /.col-md-6 col-lg-3 -->
                                                </div><!-- /.row -->

                                            </div><!-- /.home-showcase__inner -->
                                        </div><!-- /.container -->
                                    </section>
                                </li>
                            </ul> 
                        </li> --}}

                        <li>
                            {{-- <a href="{{ route('courses.index') }}">Home</a> --}}
                        </li>

                        {{-- <li>
                            <a href="about.html">About Us</a>
                        </li>
                        <li class="dropdown">
                            <a href="#">Pages</a>
                            <ul>
                                <li><a href="instructors.html">Our Instructors 01</a></li>
                                <li><a href="instructors-2.html">Our Instructors 02</a></li>
                                <li><a href="instructors-carousel.html">Instructors Carousel 01</a></li>
                                <li><a href="instructors-carousel-2.html">Instructors Carousel 02</a></li>
                                <li><a href="become-instructor.html">Become Instructor</a></li>
                                <li><a href="instructor-details.html">Instructor Details</a></li>
                                <li><a href="testimonials-carousel.html">Testimonials Carousel 01</a></li>
                                <li><a href="testimonials-carousel-2.html">Testimonials Carousel 02</a></li>
                                <li><a href="events.html">Our Events</a></li>
                                <li><a href="events-carousel.html">Events Carousel</a></li>
                                <li><a href="event-details.html">Event Details</a></li>
                                <li><a href="pricing.html">Pricing Table</a></li>
                                <li>
                                    <a href="gallery.html">Gallery</a>
                                    <ul>
                                        <li><a href="gallery.html">Gallery masonry</a></li>
                                        <li><a href="gallery-filter.html">Gallery filter</a></li>
                                        <li><a href="gallery-grid.html">Gallery Grid</a></li>
                                        <li><a href="gallery-carousel.html">Gallery Carousel</a></li>
                                    </ul>
                                </li>
                                <li><a href="faq.html">Our FAQ</a></li>
                                <li><a href="login.html">Log In</a></li>
                                <li><a href="404.html">404 Error</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#">courses</a>
                            <ul>
                                <li><a href="courses.html">our courses 01</a></li>
                                <li><a href="courses-2.html">our courses 02</a></li>
                                <li><a href="courses-carousel.html">courses Carousel 01</a></li>
                                <li><a href="courses-carousel-2.html">courses Carousel 02</a></li>
                                <li><a href="wordpress-development.html">Wordpress Development</a></li>
                                <li><a href="data-science.html">Data Science</a></li>
                                <li><a href="web-development.html">Web Development</a></li>
                                <li><a href="uiux-design.html">UI/UX Design</a></li>
                                <li><a href="graphics-design.html">Graphics Design</a></li>
                                <li><a href="digital-marketing.html">Digital Marketing</a></li>
                                <li><a href="search-engine-optimization.html">Search Engine Optimization</a>
                                </li>
                                <li><a href="apps-development.html">Apps Development</a></li>
                                <li><a href="web-design.html">Web Design</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#">Shop</a>
                            <ul>
                                <li class="dropdown">
                                    <a href="#">Products</a>
                                    <ul>
                                        <li><a href="products.html">No sidebar</a></li>
                                        <li><a href="products-left.html">Left sidebar</a></li>
                                        <li><a href="products-right.html">Right sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="products-carousel.html">Products carousel</a></li>
                                <li><a href="product-details.html">Product details</a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#">Blog</a>
                            <ul>
                                <li class="dropdown">
                                    <a href="#">Blog grid</a>
                                    <ul>
                                        <li><a href="blog-grid.html">No sidebar</a></li>
                                        <li><a href="blog-grid-left.html">Left sidebar</a></li>
                                        <li><a href="blog-grid-right.html">Right sidebar</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Blog list</a>
                                    <ul>
                                        <li><a href="blog-list.html">No sidebar</a></li>
                                        <li><a href="blog-list-left.html">Left sidebar</a></li>
                                        <li><a href="blog-list-right.html">Right sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="blog-carousel.html">Blog carousel 01</a></li>
                                <li><a href="blog-carousel-2.html">Blog carousel 02</a></li>
                                <li class="dropdown">
                                    <a href="#">Blog details</a>
                                    <ul>
                                        <li><a href="blog-details.html">No sidebar</a></li>
                                        <li><a href="blog-details-left.html">Left sidebar</a></li>
                                        <li><a href="blog-details-right.html">Right sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="contact.html">Contact</a>
                        </li> --}}
                    </ul>
                </nav><!-- /.main-header__nav -->
                <div class="mobile-nav__btn mobile-nav__toggler">
                    <span></span>
                    <span></span>
                    <span></span>
                </div><!-- /.mobile-nav__toggler -->
                {{-- <a href="#" class="search-toggler main-header__search">
                    <i class="icon-search" aria-hidden="true"></i>
                    <span class="sr-only">Search</span>
                </a><!-- /.search-toggler -->
                <a href="cart.html" class="main-header__cart">
                    <i class="icon-cart" aria-hidden="true"></i>
                    <span class="sr-only">Shopping Cart</span>
                </a><!-- /.search-toggler -->
                <a href="contact.html" class="main-header__btn eduhive-btn">
                    <span>Join for free</span>
                    <span class="eduhive-btn__icon">
                        <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                    </span>
                </a><!-- /.main-header__btn eduhive-btn --> --}}
            </div><!-- /.main-header__right -->
        </div><!-- /.main-header__inner -->
    </div><!-- /.container-fluid -->
</header>
