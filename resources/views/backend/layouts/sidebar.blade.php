  <aside class="sidebar">
      <button type="button" class="sidebar-close-btn">
          <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
      </button>
      <div>
          <a href="{{ route('dashboard') }}" class="sidebar-logo">
              @isset($AppSettings->logo)
                  {{-- <img src="{{ asset('assets/backend/assets/images/logo.png') }}" alt="site logo" class="light-logo"> --}}
                  <img src="{{ asset('uploads/' . $AppSettings->logo) }}" alt="site logo" class="light-logo">
                  {{-- <img src="{{ asset('assets/backend/assets/images/logo-light.png') }}" alt="site logo" class="dark-logo">
              <img src="{{ asset('assets/backend/assets/images/logo-icon.png') }}" alt="site logo" class="logo-icon"> --}}
                  <img src="{{ asset('uploads/' . $AppSettings->logo) }}" alt="site logo" class="dark-logo">
                  <img src="{{ asset('uploads/' . $AppSettings->logo) }}" alt="site logo" class="logo-icon">
              @endisset
          </a>
      </div>

      <div class="sidebar-menu-area">

          <ul class="sidebar-menu" id="sidebar-menu">
              <li class="dropdown">
                  <a href="javascript:void(0)">
                      <iconify-icon icon="icon-park-outline:setting-two" class="menu-icon"></iconify-icon>
                      <span>Settings</span>
                  </a>
                  <ul class="sidebar-submenu">
                      <li>
                          <a href="{{ route('dashboard.settings.index') }}"><i
                                  class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                              Company</a>
                      </li>
                      {{-- <li>
                          <a href="notification.html"><i
                                  class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                              Notification</a>
                      </li>
                      <li>
                          <a href="notification-alert.html"><i
                                  class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                              Notification Alert</a>
                      </li>
                      <li>
                          <a href="theme.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                              Theme</a>
                      </li>
                      <li>
                          <a href="currencies.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                              Currencies</a>
                      </li>
                      <li>
                          <a href="language.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                              Languages</a>
                      </li>
                      <li>
                          <a href="payment-gateway.html"><i
                                  class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Payment
                              Gateway</a>
                      </li> --}}
                  </ul>
              </li>

              <li class="sidebar-menu-group-title">Application</li>

              <li class="dropdown">
                  <a href="javascript:void(0)">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="menu-icon"
                          viewBox="0 0 24 24">
                          <path fill="currentColor"
                              d="M15 11.68V11L8 6l-7 5v10h5v-6h4v6h1.68c-.43-.91-.68-1.92-.68-3c0-2.79 1.64-5.19 4-6.32m8 1.43V3H10v1.97l7 5v1.11c.33-.05.66-.08 1-.08c1.96 0 3.73.81 5 2.11M17 7h2v2h-2z" />
                          <path fill="currentColor"
                              d="M23 18c0-2.76-2.24-5-5-5s-5 2.24-5 5s2.24 5 5 5s5-2.24 5-5m-5.5 3v-2.5H15v-1h2.5V15h1v2.5H21v1h-2.5V21z" />
                      </svg>
                      <span>Home</span>
                  </a>
                  <ul class="sidebar-submenu">
                      <li>
                          <a href="{{ route('dashboard.home-1') }}">
                              <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                              Home 1</a>
                      </li>

                      <li>
                          <a href="{{ route('dashboard.home-2') }}">
                              <i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                              Home 2</a>
                      </li>

                      <li>
                          <a href="{{ route('dashboard.home-3') }}">
                              <i class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                              Home 3</a>
                      </li>
                  </ul>
              </li>

              <li class="dropdown">
                  <a href="javascript:void(0)">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="menu-icon"
                          viewBox="0 0 24 24">
                          <path fill="currentColor"
                              d="M15.5 22q-.625 0-1.062-.437T14 20.5V19h8v1.5q0 .625-.437 1.063T20.5 22zM4 20q-.825 0-1.412-.587T2 18V6q0-.825.588-1.412T4 4h16q.825 0 1.413.588T22 6v5h-2V6h-7v5q-.825 0-1.412.588T11 13v7zm10.575-2q-.7 0-1.125-.55t-.3-1.25l.4-2q.125-.525.525-.862T15 13h6q.525 0 .925.337t.525.863l.4 2q.125.7-.3 1.25t-1.125.55zM5 16h5v-2H5zm0-3h5v-2H5zm0-3h5V8H5zm9 0V8h5v2z" />
                      </svg>
                      <span>Services</span>
                  </a>
                  <ul class="sidebar-submenu">
                      <li>
                          <a href="{{ route('service-categories.index') }}"> <i
                                  class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                              Categories
                          </a>
                      </li>
                      <li>
                          <a href="{{ route('dashboard.services.index') }}">
                              <i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                              Services
                          </a>
                      </li>
                  </ul>
              </li>

              <li>
                  <a href="{{ route('dashboard.about') }}">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="menu-icon"
                          viewBox="0 0 24 24">
                          <path fill="currentColor" d="M12 11h2v2h-2v2h2v2h-2v2h8V9h-8zm4 0h2v2h-2zm0 4h2v2h-2z"
                              opacity="0.3" />
                          <path fill="currentColor"
                              d="M16 15h2v2h-2zm0-4h2v2h-2zm6-4H12V3H2v18h20zM6 19H4v-2h2zm0-4H4v-2h2zm0-4H4V9h2zm0-4H4V5h2zm4 12H8v-2h2zm0-4H8v-2h2zm0-4H8V9h2zm0-4H8V5h2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8z" />
                      </svg>
                      <span>About</span>
                  </a>
              </li>

              <li>
                  <a href="{{ route('dashboard.team') }}">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="menu-icon"
                          viewBox="0 0 24 24">
                          <path fill="currentColor"
                              d="M6 13c-2.2 0-4 1.8-4 4s1.8 4 4 4s4-1.8 4-4s-1.8-4-4-4m6-10C9.8 3 8 4.8 8 7s1.8 4 4 4s4-1.8 4-4s-1.8-4-4-4m6 10c-2.2 0-4 1.8-4 4s1.8 4 4 4s4-1.8 4-4s-1.8-4-4-4" />
                      </svg>
                      <span>Team</span>
                  </a>
              </li>

              <li>
                  <a href="{{ route('dashboard.testimonials.index') }}">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="menu-icon"
                          viewBox="0 0 24 24">
                          <path fill="currentColor"
                              d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2M6 14v-2.47l6.88-6.88c.2-.2.51-.2.71 0l1.77 1.77c.2.2.2.51 0 .71L8.47 14zm12 0h-7.5l2-2H18z" />
                      </svg>
                      <span>Testimonials</span>
                  </a>
              </li>

              <li>
                  <a href="{{ route('dashboard.faq') }}">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="menu-icon"
                          viewBox="0 0 24 24">
                          <path fill="currentColor"
                              d="M11.07 12.85c.77-1.39 2.25-2.21 3.11-3.44c.91-1.29.4-3.7-2.18-3.7c-1.69 0-2.52 1.28-2.87 2.34L6.54 6.96C7.25 4.83 9.18 3 11.99 3c2.35 0 3.96 1.07 4.78 2.41c.7 1.15 1.11 3.3.03 4.9c-1.2 1.77-2.35 2.31-2.97 3.45c-.25.46-.35.76-.35 2.24h-2.89c-.01-.78-.13-2.05.48-3.15M14 20c0 1.1-.9 2-2 2s-2-.9-2-2s.9-2 2-2s2 .9 2 2" />
                      </svg>
                      <span>FAQ's</span>
                  </a>
              </li>


              <li class="dropdown">
                  <a href="javascript:void(0)">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="menu-icon"
                          viewBox="0 0 24 24">
                          <path fill="currentColor"
                              d="m22 3l-1.67 1.67L18.67 3L17 4.67L15.33 3l-1.66 1.67L12 3l-1.67 1.67L8.67 3L7 4.67L5.33 3L3.67 4.67L2 3v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2zM11 19H4v-6h7zm9 0h-7v-2h7zm0-4h-7v-2h7zm0-4H4V8h16z" />
                      </svg>
                      <span>Cases</span>
                  </a>
                  <ul class="sidebar-submenu">
                      <li>
                          <a href="{{ route('case-categories.index') }}"><i
                                  class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                              Categories</a>
                      </li>
                      <li>
                          <a href="{{ route('dashboard.cases.index') }}"><i
                                  class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                              Cases</a>
                      </li>
                  </ul>

              </li>

              {{-- <li>
                  <a href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="menu-icon"
                          viewBox="0 0 24 24">
                          <path fill="currentColor"
                              d="M18 20H6V8h2v2c0 .55.45 1 1 1s1-.45 1-1V8h4v2c0 .55.45 1 1 1s1-.45 1-1V8h2z"
                              opacity="0.3" />
                          <path fill="currentColor"
                              d="M18 6h-2c0-2.21-1.79-4-4-4S8 3.79 8 6H6c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2m-6-2c1.1 0 2 .9 2 2h-4c0-1.1.9-2 2-2m6 16H6V8h2v2c0 .55.45 1 1 1s1-.45 1-1V8h4v2c0 .55.45 1 1 1s1-.45 1-1V8h2z" />
                      </svg>
                      <span>Shop</span>
                  </a>
              </li> --}}

              <li class="dropdown">
                  <a href="javascript:void(0)">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="menu-icon"
                          viewBox="0 0 24 24">
                          <path fill="currentColor"
                              d="M10 4h4v4h-4zM4 16h4v4H4zm0-6h4v4H4zm0-6h4v4H4zm10 8.42V10h-4v4h2.42zm6.88-1.13l-1.17-1.17a.41.41 0 0 0-.58 0l-.88.88L20 12.75l.88-.88a.41.41 0 0 0 0-.58M11 18.25V20h1.75l6.67-6.67l-1.75-1.75zM16 4h4v4h-4z" />
                      </svg>
                      <span>Blog</span>
                  </a>
                  <ul class="sidebar-submenu">
                      <li>
                          <a href="{{ url('dashboard/blog-categories') }}"><i
                                  class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                              Categories</a>
                      </li>
                      <li>
                          <a href="{{ url('dashboard/blogs') }}"><i
                                  class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                              Blogs</a>
                      </li>
                  </ul>
              </li>

              <li>
                  <a href="{{ route('dashboard.contact') }}">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="menu-icon"
                          viewBox="0 0 24 24">
                          <path fill="currentColor"
                              d="M21 3H3c-1.1 0-2 .9-2 2v8h2V5h18v16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2" />
                          <path fill="currentColor"
                              d="M13 10c0-2.21-1.79-4-4-4s-4 1.79-4 4s1.79 4 4 4s4-1.79 4-4m-6 0c0-1.1.9-2 2-2s2 .9 2 2s-.9 2-2 2s-2-.9-2-2m8.39 6.56C13.71 15.7 11.53 15 9 15s-4.71.7-6.39 1.56A2.97 2.97 0 0 0 1 19.22V22h16v-2.78c0-1.12-.61-2.15-1.61-2.66M15 20H3c0-.72-.1-1.34.52-1.66C4.71 17.73 6.63 17 9 17s4.29.73 5.48 1.34c.63.32.52.95.52 1.66" />
                      </svg>
                      <span>Contact</span>
                  </a>
              </li>

              <li class="sidebar-menu-group-title">Media Files</li>
              <li>
                  <a href="{{ route('media.index') }}">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="menu-icon"
                          viewBox="0 0 24 24">
                          <path fill="currentColor"
                              d="M19 19H3V7c0-.55-.45-1-1-1s-1 .45-1 1v12c0 1.1.9 2 2 2h16c.55 0 1-.45 1-1s-.45-1-1-1" />
                          <path fill="currentColor"
                              d="M21 4h-7l-1.41-1.41c-.38-.38-.89-.59-1.42-.59H7c-1.1 0-1.99.9-1.99 2L5 15c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2m-3 9h-8a.5.5 0 0 1-.4-.8l1.38-1.83c.2-.27.6-.27.8 0L13 12l2.22-2.97c.2-.27.6-.27.8 0l2.38 3.17a.5.5 0 0 1-.4.8" />
                      </svg>
                      <span>Media Files</span>
                  </a>
              </li>

              <li class="sidebar-menu-group-title">Leads </li>
              <li>
                  <a href="{{ route('website_contact.index') }}">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="menu-icon"
                          viewBox="0 0 24 24">
                          <path fill="currentColor"
                              d="M21 8V7l-3 2l-3-2v1l3 2zm3-5H0v18h23.99zM8 6c1.66 0 3 1.34 3 3s-1.34 3-3 3s-3-1.34-3-3s1.34-3 3-3m6 12H2v-1c0-2 4-3.1 6-3.1s6 1.1 6 3.1zm8-6h-8V6h8z" />
                      </svg>
                      <span>Contacts</span>
                  </a>
              </li>
              <li>
                  <a href="{{ route('registrations.index') }}">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="menu-icon"
                          viewBox="0 0 24 24">
                          <path fill="currentColor"
                              d="M4 6H2v16h16v-2H4zm2-4v16h16V2zm8 3c1.66 0 3 1.34 3 3s-1.34 3-3 3s-3-1.34-3-3s1.34-3 3-3M7.76 16c1.47-1.83 3.71-3 6.24-3s4.77 1.17 6.24 3z" />
                      </svg>
                      <span>Event Registrations</span>
                  </a>
              </li>

              <li class="sidebar-menu-group-title">Courses </li>
              <li>
                  <a href="{{ route('enroll.index') }}">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="menu-icon"
                          viewBox="0 0 24 24">
                          <path fill="currentColor"
                              d="M23 18h-1V5c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v13H1c-.55 0-1 .45-1 1s.45 1 1 1h22c.55 0 1-.45 1-1s-.45-1-1-1m-9.5 0h-3c-.28 0-.5-.22-.5-.5s.22-.5.5-.5h3c.28 0 .5.22.5.5s-.22.5-.5.5m6.5-3H4V6c0-.55.45-1 1-1h14c.55 0 1 .45 1 1z" />
                      </svg>
                      <span>Enrollments</span>
                  </a>
              </li>

          </ul>
      </div>
  </aside>
