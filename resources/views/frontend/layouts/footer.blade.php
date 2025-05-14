  <!--Site Footer One Start-->
  <footer class="site-footer">
      <div class="site-footer-shape wow slideInRight" data-wow-delay="100ms" data-wow-duration="3500ms"
          style="background-image: url({{ asset('assets/frontend/assets/images/shapes/footer-shape.png') }})"></div>
      <div class="container">
          <div class="site-footer__top">
              <div class="row">
                  <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                      <div class="footer-widget__column footer-widget__about">
                          <div class="footer-widget__about-logo">
                              <a href="{{ url('/') }}">
                                  {{-- <img src="{{ asset('assets/frontend/assets/images/footer-logo.png') }}" alt=""> --}}
                                  @isset($AppSettings->logo)
                                      <img src="{{ asset('uploads/' . $AppSettings->logo) }}" alt=""
                                          style="max-height: 44px;">
                                  @endisset
                              </a>

                          </div>
                          <p class="footer-widget__text">
                              Welcome to Legato Design  - innovative solutions that empower, enhance, and inspire
                              education.
                          </p>
                          <ul class="list-unstyled footer-widget__contact-list">
                              @if (isset($AppSettings->phone) && !empty($AppSettings->phone))
                                  <li>
                                      <div class="icon">
                                          <i class="fas fa-phone-square-alt"></i>
                                      </div>
                                      <div class="text">
                                          <p> <a
                                                  href="tel:{{ isset($AppSettings->phone) && !empty($AppSettings->phone) ? $AppSettings->phone : '' }}">{{ isset($AppSettings->phone) && !empty($AppSettings->phone) ? $AppSettings->phone : '' }}
                                              </a>
                                          </p>
                                      </div>
                                  </li>
                              @endif

                              @if (isset($AppSettings->email) && !empty($AppSettings->email))
                                  <li>
                                      <div class="icon">
                                          <i class="fas fa-envelope"></i>
                                      </div>
                                      <div class="text">
                                          <p><a
                                                  href="mailto:{{ isset($AppSettings->email) && !empty($AppSettings->email) ? $AppSettings->email : '' }}">{{ isset($AppSettings->email) && !empty($AppSettings->email) ? $AppSettings->email : '' }}</a>
                                          </p>
                                      </div>
                                  </li>
                              @endif

                              @if (isset($AppSettings->address) && !empty($AppSettings->address))
                                  <li>
                                      <div class="icon">
                                          <i class="fas fa-map-marker-alt"></i>
                                      </div>
                                      <div class="text">
                                          <p>{{ isset($AppSettings->address) && !empty($AppSettings->address) ? $AppSettings->address : '' }}
                                          </p>
                                      </div>
                                  </li>
                              @endif

                          </ul>
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                      <div class="footer-widget__column footer-widget__explore clearfix">
                          <h3 class="footer-widget__title">Explore</h3>
                          <ul class="footer-widget__explore-list list-unstyled">
                              <li><a href="{{ route('about') }}">About Us</a></li>
                              {{-- <li><a href="{{ route('team') }}">Meet our team</a></li> --}}
                              <li><a href="{{ route('cases.index') }}">Case Studies</a></li> 
                              <li><a href="{{ route('faq') }}">FAQ’S </a></li>  
                              <li><a href="{{ route('contact') }}">Contact</a></li>
                          </ul>
                          <ul class="footer-widget__explore-list footer-widget__explore-list-two list-unstyled">
                              {{-- <li><a href="{{ route('contact') }}">Support</a></li> --}}
                              <li><a href="{{ route('terms-of-use') }}">Terms of use</a></li>
                              <li><a href="{{ route('privacy-polity') }}">Privacy policy</a></li>
                              {{-- <li><a href="{{ route('contact') }}">Help</a></li> --}}
                          </ul>
                      </div>
                  </div>
                  <div class="col-xl-5 col-lg-6 col-md-8 wow fadeInUp" data-wow-delay="400ms">
                      <div class="footer-widget__column footer-widget__newsletter">
                          <h3 class="footer-widget__title footer-widget__title-news">Newsletter</h3>
                          <form class="footer-widget__newsletter-form">
                              <p class="footer-widget__newsletter-text">Subsrcibe for latest articles and
                                  resources</p>
                              <div class="footer-widget__newsletter-input-box">
                                  <input type="email" placeholder="Email address" name="email">
                                  <button type="submit" class="footer-widget__newsletter-btn">Register</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <div class="site-footer-bottom">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="site-footer-bottom__inner">
                          <div class="site-footer-bottom__left">
                              <p>© Copyright 2025 by <a href="{{ url('/') }}">2025 Legato Design.</a></p>
                          </div>
                          <div class="site-footer__social">
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
                  </div>
              </div>
          </div>
      </div>
  </footer>
  <!--Site Footer One End-->
