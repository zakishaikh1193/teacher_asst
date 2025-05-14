<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div><!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="icon-close"></i></span>
        <div class="logo-box logo-retina">
            <a href="index.html" aria-label="logo image">
                <img src="{{ asset('assets/courses/assets/images/logo.png') }}" width="150" alt="" />
            </a> 
        </div><!-- /.logo-box -->
        <div class="mobile-nav__container"></div><!-- /.mobile-nav__container -->
        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <span class="mobile-nav__contact__icon"><i class="fa fa-envelope"></i></span>
                <a href="mailto:contact@legato-design.com">contact@legato-design.com</a>
            </li>
            {{-- <li> 
                <span class="mobile-nav__contact__icon"><i class="fa fa-phone-alt"></i></span>
                <a href="tel:+9156980036420">+91 5698 0036 420</a>
            </li> --}}
        </ul><!-- /.mobile-nav__contact -->
        {{-- <div class="mobile-nav__social social-links-two">
            <a href="https://facebook.com">
                <span class="social-links-two__icon">
                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                </span><!-- /.social-links-two__icon -->
                <span class="sr-only">Facebook</span>
            </a>
            <a href="https://twitter.com">
                <span class="social-links-two__icon">
                    <i class="fab fa-twitter" aria-hidden="true"></i>
                </span><!-- /.social-links-two__icon -->
                <span class="sr-only">Twitter</span>
            </a>
            <a href="https://instagram.com">
                <span class="social-links-two__icon">
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                </span><!-- /.social-links-two__icon -->
                <span class="sr-only">Instagram</span>
            </a>
            <a href="https://youtube.com">
                <span class="social-links-two__icon">
                    <i class="fab fa-youtube" aria-hidden="true"></i>
                </span><!-- /.social-links-two__icon -->
                <span class="sr-only">Youtube</span>
            </a>
        </div>  --}}
    </div><!-- /.mobile-nav__content -->
</div><!-- /.mobile-nav__wrapper -->
<div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <!-- /.search-popup__overlay -->
    <div class="search-popup__content">
        <form role="search" method="get" class="search-popup__form" action="#">
            <input type="text" id="search" placeholder="Search Here..." />
            <button type="submit" aria-label="search submit" class="eduhive-btn">
                <i class="icon-search"></i>
            </button>
        </form>
    </div>
    <!-- /.search-popup__content -->
</div>
<!-- /.search-popup -->
