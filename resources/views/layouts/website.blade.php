<!DOCTYPE html>
<html lang="zxx">
  <head>
      @php
          $basic = App\Models\Basic::where('basic_id',1)->where('basic_status',1)->firstOrFail();
          $contact = App\Models\ContactInformation::where('cont_id',1)->where('cont_status',1)->firstOrFail();
          $social = App\Models\SocialMedia::where('sm_id',1)->where('sm_status',1)->firstOrFail();
      @endphp
    <meta charset="utf-8">
    <title>{{ $basic->basic_company .'-'. $basic->basic_title }}</title>
    <meta name="description" content="">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.html">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('uploads/basics/'. $basic->basic_favicon ) }}">
    <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/fonts/flaticon.css">
    <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/css/animate.css">
    <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/css/slick.css">
    <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/css/off-canvas.css">
    <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/css/rsmenu-main.css">
    <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/css/rs-spacing.css">
    <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/css/responsive.css">
  </head>
  <body class="defult-home">

    <!--Preloader area start here-->
    <div id="loader" class="loader">
        <div class="loader-container"></div>
    </div>
    <!--Preloader area End here-->

    <!-- Main content Start -->
    <div class="main-content">

        <!--Full width header Start-->
        <div class="full-width-header">
            <!--Header Start-->
            <header id="rs-header" class="rs-header">
                <!-- Topbar Area Start -->
                <div class="topbar-area">
                    <div class="container">
                        <div class="row rs-vertical-middle">
                            <div class="col-lg-2">
                                <div class="logo-part">
                                    <a href="index.html"><img src="{{asset('uploads/basics/'.$basic->basic_logo)}}" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-10 text-right">
                                <ul class="rs-contact-info">
                                    <li class="contact-part">
                                        <i class="flaticon-location"></i>
                                        <span class="contact-info">
                                            <span>Address</span>
                                            {{ $contact ->cont_add1 }}
                                        </span>
                                    </li>
                                    <li class="contact-part">
                                        <i class="flaticon-email"></i>
                                        <span class="contact-info">
                                            <span>E-mail</span>
                                            <a href="mailto:{{ $contact->cont_email1 }}"> {{ $contact->cont_email1 }}</a>
                                        </span>
                                    </li>
                                    <li class="contact-part no-border">
                                         <i class="flaticon-call"></i>
                                        <span class="contact-info">
                                            <span>Phone</span>
                                             {{ $contact->cont_phone1 }}
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Topbar Area End -->

                <!-- Menu Start -->
                <div class="menu-area menu-sticky">
                    <div class="container">
                        <div class="logo-area">
                            <a href="{{ url('/') }}">
                                <img class="sticky-logo" src="{{asset('uploads/basics/'.$basic->basic_logo)}}" alt="logo">
                            </a>
                        </div>
                        <div class="rs-menu-area">
                            <div class="main-menu">
                                <div class="mobile-menu">
                                    <a href="index.html" class="mobile-logo">
                                        <img src="{{asset('uploads/basics/'.$basic->basic_logo)}}" alt="logo">
                                    </a>
                                    <a href="#" class="rs-menu-toggle rs-menu-toggle-close">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </div>
                                <nav class="rs-menu">
                                    <ul class="nav-menu">
                                        <li class="{{ request()->routeIs('website.home') ? 'current-menu-item' : '' }}">
                                            <a href="{{ route('website.home') }}">Home</a>
                                        </li>
                                        <li class="{{ request()->routeIs('website.about') ? 'current-menu-item' : '' }}">
                                            <a href="{{ route('website.about') }}">About</a>
                                        </li>
                                        <li class="{{ request()->routeIs('website.services') ? 'current-menu-item' : '' }}">
                                            <a href="{{ url('services')}}">Services</a>
                                        </li>
                                        <li class=" {{ request()->routeIs('website.our-team') ? 'current-menu-item' : '' }}">
                                            <a href="{{ url('our-team')}}">Our Team</a>
                                        </li>
                                        <li class=" {{ request()->routeIs('website.case-studies') ? 'current-menu-item' : '' }}">
                                            <a href="{{ url('case-studies')}}">Case Studies</a>
                                        </li>
                                        <li class=" {{ request()->routeIs('website.blog') ? 'current-menu-item' : '' }}">
                                           <a href="{{ url('blog')}}">Blog</a>
                                        </li>
                                        <li class=" {{ request()->routeIs('website.contact') ? 'current-menu-item' : '' }}">
                                            <a href="{{ url('contact')}}">Contact</a>
                                        </li>
                                    </ul> <!-- //.nav-menu -->
                                </nav>
                            </div> <!-- //.main-menu -->
                        </div>
                        <div class="expand-btn-inner search-icon hidden-sticky hidden-md">
                            <ul>
                                <li class="sidebarmenu-search">
                                    <a class="hidden-xs rs-search" data-target=".search-modal" data-toggle="modal" href="#">
                                        <i class="flaticon-search"></i>
                                    </a>
                                </li>
                            </ul>
                            <div class="toolbar-sl-share">
                                <ul class="social">
                                    <li><a href="{{ $social->sm_facebook }}"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{ $social->sm_twitter }}"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="{{ $social->sm_youtube }}"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="{{ $social->sm_instagram }}"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Menu End -->
            </header>
            <!--Header End-->
        </div>
        <!--Full width header End-->

      </div>

      @yield('content')

       <footer id="rs-footer" class="rs-footer">
        <div class="footer-top">
          <div class="container">
            <div class="row">
              <div class="col-lg-3 col-md-12 col-sm-12 footer-widget">
                <div class="footer-logo mb-30">
                  <a href="index.html">
                    <img src="{{asset('uploads/basics/'.$basic->basic_flogo)}}" alt="">
                  </a>
                </div>
                <div class="textwidget pb-30">
                  <p>{{ $basic->basic_title }}</p>
                </div>
                <ul class="footer-social md-mb-30">
                  <li>
                    <a href="{{ $social->sm_facebook }}" target="_blank">
                      <span>
                        <i class="fa fa-facebook"></i>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ $social->sm_twitter }}" target="_blank">
                      <span>
                        <i class="fa fa-twitter"></i>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ $social->sm_google }}" target="_blank">
                      <span>
                        <i class="fa fa-google"></i>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ $social->sm_instagram}}" target="_blank">
                      <span>
                        <i class="fa fa-instagram"></i>
                      </span>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-3 col-md-12 col-sm-12 pl-45 md-pl-15 md-mb-30">
                <h3 class="widget-title">IT Services</h3>
                <ul class="site-map">
                  <li>
                    <a href="software-development.html">Software Development</a>
                  </li>
                  <li>
                    <a href="web-development.html">Web Development</a>
                  </li>
                  <li>
                    <a href="analytic-solutions.html">Analytic Solutions</a>
                  </li>
                  <li>
                    <a href="web-development.html">Cloud and DevOps</a>
                  </li>
                  <li>
                    <a href="web-development.html">Product Design</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-3 col-md-12 col-sm-12 md-mb-30">
                <h3 class="widget-title">Contact Info</h3>
                <ul class="address-widget">
                  <li>
                    <i class="flaticon-location"></i>
                    <div class="desc">{{ $contact->cont_add1 }}</div>
                  </li>
                  <li>
                    <i class="flaticon-call"></i>
                    <div class="desc">
                      <a href="tel:{{ $contact->cont_phone1 }}">{{ $contact->cont_phone1 }}</a>
                    </div>
                  </li>
                  <li>
                    <i class="flaticon-email"></i>
                    <div class="desc">
                      <a href="mailto:{{ $contact->cont_email1 }}">{{ $contact->cont_email1 }}</a>
                    </div>
                  </li>
                  <li>
                    <i class="flaticon-clock-1"></i>
                    <div class="desc"> Opening Hours: 10:00 - 18:00 </div>
                  </li>
                </ul>
              </div>
              <div class="col-lg-3 col-md-12 col-sm-12">
                <h3 class="widget-title">Newsletter</h3>
                <form action="{{ route('website.newsletter')}}" method="POST">
                    @csrf
                    <p>
                        <input type="email" name="ns_email" placeholder="Your email address">
                        <button class="paper-plane">
                          <input type="submit" value="Sign up">
                        </button>
                        <i class="flaticon-send"></i>
                      </p>
                    @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        <strong>{{ Session::get('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif

                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          <div class="container">
            <div class="row y-middle">
              <div class="col-lg-6 text-right md-mb-10 order-last">
                <ul class="copy-right-menu">
                  <li>
                    <a href="index.html">Home</a>
                  </li>
                  <li>
                    <a href="about.html">About</a>
                  </li>
                  <li>
                    <a href="blog.html">Blog</a>
                  </li>
                  <li>
                    <a href="shop.html">Shop</a>
                  </li>
                  <li>
                    <a href="faq.html">FAQs</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <div class="copyright">
                  <p>&copy; 2022 All Rights Reserved. Developed By <a href="http://creativeshaper.com">Creative Shaper</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <div id="scrollUp" class="orange-color">
        <i class="fa fa-angle-up"></i>
      </div>
      <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="flaticon-cross"></span>
        </button>
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="search-block clearfix">
              <form>
                <div class="form-group">
                  <input class="form-control" placeholder="Search Here..." type="text">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <script src="{{asset('contents/website')}}/js/modernizr-2.8.3.min.js"></script>
      <script src="{{asset('contents/website')}}/js/jquery.min.js"></script>
      <script src="{{asset('contents/website')}}/js/bootstrap.min.js"></script>
      <script src="{{asset('contents/website')}}/js/rsmenu-main.js"></script>
      <script src="{{asset('contents/website')}}/js/jquery.nav.js"></script>
      <script src="{{asset('contents/website')}}/js/owl.carousel.min.js"></script>
      <script src="{{asset('contents/website')}}/js/wow.min.js"></script>
      <script src="{{asset('contents/website')}}/js/skill.bars.jquery.js"></script>
      <script src="{{asset('contents/website')}}/js/jquery.counterup.min.js"></script>
      <script src="{{asset('contents/website')}}/js/waypoints.min.js"></script>
      <script src="{{asset('contents/website')}}/js/swiper.min.js"></script>
      <script src="{{asset('contents/website')}}/js/particles.min.js"></script>
      <script src="{{asset('contents/website')}}/js/jquery.magnific-popup.min.js"></script>
      <script src="{{asset('contents/website')}}/js/plugins.js"></script>
      <script src="{{asset('contents/website')}}/js/pointer.js"></script>
      <script src="{{asset('contents/website')}}/js/contact.form.js"></script>
      <script src="{{asset('contents/website')}}/js/main.js"></script>
  </body>
</html>
