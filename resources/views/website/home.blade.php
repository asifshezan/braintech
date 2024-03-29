@extends('layouts.website')
@section('content')
            <!-- Slider Section Start -->

            <div class="rs-slider style1">
                <div class="rs-carousel owl-carousel" data-loop="true" data-items="1" data-margin="0" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="1" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="1" data-md-device-nav="true" data-md-device-dots="false">
                    @php
                    $banners = App\Models\Banner::where('ban_status',1)->orderBy('ban_order','DESC')->limit(2)->get();
                    @endphp
                    @foreach ($banners as $key => $banner)
                    <div class="slider-content slide{{ $key }}"  style="background-image: url('{{ asset('uploads/banners/' . $banner['ban_image']) }}')">
                        <div class="container">
                            <div class="content-part">
                                <div class="sl-sub-title wow bounceInLeft" data-wow-delay="300ms" data-wow-duration="2000ms">{{ $banner->ban_title }}</div>
                                <h1 class="sl-title mb-mb-10 wow fadeInRight" data-wow-delay="600ms" data-wow-duration="2000ms">{{ $banner->ban_subtitle }}</h1>
                                <div class="sl-desc wow fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                                    {{ $banner->ban_text }}
                                </div>
                                <div class="sl-btn wow fadeInUp" data-wow-delay="200ms" data-wow-duration="3000ms">
                                    <a class="readon learn-more slider-btn" href="{{ $banner->ban_url }}">{{ $banner->ban_button }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- Slider Section End -->

            <!-- Services Section Start -->
            @php
                $services = App\Models\Service::where('service_status',1)->orderBy('service_order','ASC')->limit(4)->get();
            @endphp
            <div class="rs-services main-home style1 pt-100 md-pt-70">
                <div class="container">
                    <div class="row">
                        @foreach ($services as $service)
                        <div class="col-lg-3 col-md-6 md-mb-30">
                            <div class="services-item">
                                <div class="services-icon">
                                    <div class="image-part">
                                        <img src="{{ asset('uploads/services/'. $service->service_image)}}" alt="">
                                    </div>
                                </div>
                                <div class="services-content">
                                    <div class="services-text">
                                        <h3 class="services-title"><a href="web-development.html">{{ $service->service_title }}</a></h3>
                                    </div>
                                    <div class="services-desc">
                                        <p>
                                           {{ $service->service_subtitle }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                         </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Services Section End -->

            <!-- About Section Start -->
            <div class="rs-about bg4 pt-120 pb-120 md-pt-80 md-pb-80">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 md-mb-50">
                            <div class="images">
                               <img src="{{ asset('contents/website')}}/images/about/about-2.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 pl-60 md-pl-15">
                            <div class="contact-wrap">
                                <div class="sec-title mb-30">
                                    <div class="sub-text style2">About Us</div>
                                    <h2 class="title pb-38">
                                        We Are Increasing Business Success With Technology
                                    </h2>
                                    <div class="desc pb-35">
                                       Over 25 years working in IT services developing software applications and mobile apps for clients all over the world.
                                    </div>
                                    <p class="margin-0 pb-15">
                                      We denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying.
                                    </p>
                                </div>
                                <div class="btn-part">
                                    <a class="readon learn-more contact-us" href="contact.html">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About Section End -->

            <!-- Services Section Start -->
            <div class="pt-relative rs-services style4 modify1 services3 gray-color pt-120 md-pt-80">
                <div class="container">
                    <div class="sec-title2 text-center mb-45">
                        <span class="sub-text">Services</span>
                        <h2 class="title">
                            We Are Offering All Kinds of IT Solutions Services
                        </h2>
                    </div>
                </div>
                @php
                $service_2 = App\Models\Service::where('service_status',1)->orderBy('service_order','DESC')->limit(6)->get();
            @endphp
                <div class="bg-section pb-120 md-pb-80">
                    <div class="container">
                        <div class="row gray-color pb-35 pl-25 pr-25 md-pl-0 md-pr-0">
                            @foreach ($service_2 as $ser_2)
                            <div class="col-lg-4 col-md-6 mb-20">
                                <div class="services-item">
                                    <div class="services-icon">
                                        <img src="{{ asset('uploads/services/'.$ser_2->service_image)}}" alt="">
                                    </div>
                                    <div class="services-content">
                                        <h2 class="title"><a href="web-development.html">{{ $ser_2->service_title }}</a></h2>
                                        <p class="desc">
                                            {{ $ser_2->service_details }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="btn-part text-center mt-65">
                            <a class="readon learn-more contact-us" href="{{ url('services')}}">View All Services</a>
                        </div>
                    </div>
                    <div class="shape-part">
                        <div class="left-side">
                            <img src="{{ asset('contents/website')}}/images/services/shape-2.png" alt="">
                        </div>
                        <div class="right-side">
                            <img src="{{ asset('contents/website')}}/images/services/shape-3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Services Section End -->

            <!-- Call Us Section Start -->
            <div class="rs-call-us bg1 pt-120 md-pt-80">
                <div class="container">
                    <div class="row rs-vertical-middle">
                        <div class="col-lg-6">
                            <div class="image-part">
                                <img src="{{ asset('contents/website')}}/images/call-us/contact-here.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="rs-contact-box text-center">
                                <div class="address-item mb-25">
                                    <div class="address-icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                </div>
                                <div class="sec-title3">
                                    <span class="sub-text">CALL US 24/7</span>
                                    <h2 class="title">(+123) 456-9989</h2>
                                    <p class="desc">Have any idea or project for in your mind call us or schedule a appointment. Our representative will reply you shortly.</p>
                                </div>
                                <div class="btn-part mt-40 md-mb-60">
                                    <a class="readon lets-talk" href="contact.html">Let's Talk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Call Us Section Start -->

            <!-- Counter Section Start -->
            <div class="rs-counter main-counter-home">
                    <div class="counter-top-area text-center bg2">
                        <div class="row">
                            <div class="col-lg-4 md-mb-40">
                                <div class="counter-list">
                                    <div class="counter-text">
                                        <div class="count-number">
                                            <span class="rs-count k">80</span>
                                        </div>
                                        <h3 class="title">Happy Clients</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 md-mb-40">
                                <div class="counter-list">
                                    <div class="counter-text">
                                        <div class="count-number">
                                            <span class="rs-count plus">50</span>
                                        </div>
                                        <h3 class="title">Companies</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="counter-list">
                                    <div class="counter-text">
                                        <div class="count-number">
                                            <span class="rs-count plus">230</span>
                                        </div>
                                        <h3 class="title">Projects Done</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- Counter Section End -->

            <!-- Process Section Start -->
            <div class="rs-process pt-180 pb-120 md-pt-80 md-pb-80">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 md-mb-40">
                            <div class="process-wrap bg3">
                                <div class="sec-title mb-30">
                                    <div class="sub-text new">Working Process</div>
                                    <h2 class="title white-color">
                                        Our Working Process -  How We Work For Our Customers
                                    </h2>
                                </div>
                                <div class="btn-part mt-40">
                                    <a class="readon learn-more contact-us" href="contact.html">Contact Us</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 pl-30 md-pl-15">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 mb-40">
                                    <div class="rs-addon-number">
                                        <div class="number-text">
                                            <div class="number-area">
                                                1.
                                            </div>
                                            <div class="number-title">
                                                <h3 class="title"> Discovery</h3>
                                            </div>
                                            <p class="number-txt">  Quisque placerat vitae lacus ut scelerisque. Fusce luctus odio ac nibh luctus, in porttitor theo lacus egestas.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-40">
                                    <div class="rs-addon-number">
                                        <div class="number-text">
                                            <div class="number-area">
                                                2.
                                            </div>
                                            <div class="number-title">
                                                <h3 class="title">Planning</h3>
                                            </div>
                                            <p class="number-txt">Quisque placerat vitae lacus ut scelerisque. Fusce luctus odio ac nibh luctus, in porttitor theo lacus egestas.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 sm-mb-40">
                                    <div class="rs-addon-number">
                                        <div class="number-text">
                                            <div class="number-area">
                                                3.
                                            </div>
                                            <div class="number-title">
                                                <h3 class="title">Execute</h3>
                                            </div>
                                            <p class="number-txt">Quisque placerat vitae lacus ut scelerisque. Fusce luctus odio ac nibh luctus, in porttitor theo lacus egestas.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="rs-addon-number">
                                        <div class="number-text">
                                            <div class="number-area">
                                                4.
                                            </div>
                                            <div class="number-title">
                                                <h3 class="title">Deliver</h3>
                                            </div>
                                            <p class="number-txt">Quisque placerat vitae lacus ut scelerisque. Fusce luctus odio ac nibh luctus, in porttitor theo lacus egestas.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Process Section End -->

            <!-- Project Section Start -->

            @php
                $projects = App\Models\Project::where('pro_status',1)->orderBy('pro_order','ASC')->limit(4)->get();
            @endphp
            <div class="rs-project bg5 style1 pt-120 md-pt-80">
                <div class="container">
                   <div class="sec-title2 text-center mb-45 md-mb-30">
                       <span class="sub-text white-color">Project</span>
                       <h2 class="title white-color">
                          We Are Offering All Kinds of IT Solutions Services
                       </h2>
                   </div>
                    <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="true" data-md-device-dots="false">
                        @foreach ($projects as $project)
                        <div class="project-item">
                            <div class="project-img">
                                <a href="case-studies-style1.html"><img src="{{ asset('uploads/projects/'.$project->pro_image) }}" alt="images"></a>
                            </div>
                            <div class="project-content">
                                <h3 class="title"><a href="{{ $project->pro_url }}">{{ $project->pro_title }}</a></h3>
                                <span class="category"><a href="case-studies-style1.html">{{ $project->procategory->procate_name }}</a></span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Project Section End -->



            <!-- Testimonial Section Start -->
            @php
            $testimonial = App\Models\Testimonial::where('test_status',1)->orderBy('test_order','DESC')->limit(4)->get();
            @endphp
            <div class="rs-testimonial main-home style2 bg5 pt-120 pb-120 md-pt-80 md-pb-80">
                <div class="container">
                  <div class="sec-title2 text-center mb-45">
                      <span class="sub-text white-color">Testimonial</span>
                      <h2 class="title testi-title white-color">
                         What Saying Our Customers
                      </h2>
                  </div>
                    <div class="rs-carousel owl-carousel"
                        data-loop="true"
                        data-items="2"
                        data-margin="30"
                        data-autoplay="true"
                        data-hoverpause="true"
                        data-autoplay-timeout="5000"
                        data-smart-speed="800"
                        data-dots="true"
                        data-nav="false"
                        data-nav-speed="false"

                        data-md-device="2"
                        data-md-device-nav="false"
                        data-md-device-dots="true"
                        data-center-mode="false"

                        data-ipad-device2="1"
                        data-ipad-device-nav2="false"
                        data-ipad-device-dots2="true"

                        data-ipad-device="1"
                        data-ipad-device-nav="false"
                        data-ipad-device-dots="true"

                        data-mobile-device="1"
                        data-mobile-device-nav="false"
                        data-mobile-device-dots="false">

                        @foreach ($testimonial as $testi )
                        <div class="testi-item">
                            <div class="author-desc">
                                <div class="desc"><img class="quote" src="{{ asset('contents/website')}}/images/testimonial/main-home/quote-white.png" alt="">{{ $testi->test_feedback}}</div>
                                <div class="author-img">
                                    <img src="{{ asset('uploads/testimonials/'.$testi->test_image) }}" alt="">
                                </div>
                            </div>
                            <div class="author-part">
                                <a class="name" href="#">{{ $testi->test_name }}</a>
                                <span class="designation">{{ $testi->test_designation }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Testimonial Section End -->

            <!-- Blog Section Start -->
            <div id="rs-blog" class="rs-blog pb-120 pt-120 md-pt-80 md-pb-80">
                <div class="container">
                    <div class="sec-title2 text-center mb-45">
                        <span class="sub-text">Blogs</span>
                            <h2 class="title testi-title">
                                Read Our Latest Tips & Tricks
                            </h2>
                        <div class="heading-line">

                        </div>
                    </div>
                    <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="false" data-md-device-dots="false">
                        <div class="blog-item">
                            <div class="image-wrap">
                                <a href="blog-details.html"><img src="{{ asset('contents/website')}}/images/blog/main-home/1.jpg" alt=""></a>
                                <ul class="post-categories">
                                    <li><a href="blog-details.html">Software Development</a></li>
                                </ul>
                            </div>
                            <div class="blog-content">
                                <ul class="blog-meta">
                                    <li class="date"><i class="fa fa-calendar-check-o"></i> 16 Nov 2020</li>
                                    <li class="admin"><i class="fa fa-user-o"></i> admin</li>
                                </ul>
                                <h3 class="blog-title"><a href="blog-details.html">Necessity May Give Us Your Best Virtual Court System</a></h3>
                                <p class="desc">We denounce with righteous indige nation and dislike men who are so beguiled...</p>
                                <div class="blog-button"><a href="blog-details.html">Learn More</a></div>
                            </div>
                        </div>
                        <div class="blog-item">
                            <div class="image-wrap">
                                <a href="blog-details.html"><img src="{{ asset('contents/website')}}/images/blog/main-home/2.jpg" alt=""></a>
                                <ul class="post-categories">
                                    <li><a href="blog-details.html"> Web Development</a></li>
                                </ul>
                            </div>
                            <div class="blog-content">
                                <ul class="blog-meta">
                                    <li class="date"><i class="fa fa-calendar-check-o"></i> 20 December 2020</li>
                                    <li class="admin"><i class="fa fa-user-o"></i> admin</li>
                                </ul>
                                <h3 class="blog-title"><a href="blog-details.html">Tech Products That Makes Its Easier to Stay at Home</a></h3>
                                <p class="desc">We denounce with righteous indige nation and dislike men who are so beguiled...</p>
                                <div class="blog-button"><a href="blog-details.html">Learn More</a></div>
                            </div>
                        </div>
                        <div class="blog-item">
                            <div class="image-wrap">
                                <a href="blog-details.html"><img src="{{ asset('contents/website')}}/images/blog/main-home/3.jpg" alt=""></a>
                                <ul class="post-categories">
                                    <li><a href="blog-details.html">It Services</a></li>
                                </ul>
                            </div>
                            <div class="blog-content">
                               <ul class="blog-meta">
                                   <li class="date"><i class="fa fa-calendar-check-o"></i> 22 December 2020</li>
                                   <li class="admin"><i class="fa fa-user-o"></i> admin</li>
                               </ul>
                               <h3 class="blog-title"><a href="blog-details.html">Open Source Job Report Show More Openings Fewer</a></h3>
                               <p class="desc">We denounce with righteous indige nation and dislike men who are so beguiled...</p>
                               <div class="blog-button"><a href="blog-details.html">Learn More</a></div>
                            </div>
                        </div>
                        <div class="blog-item">
                            <div class="image-wrap">
                                <a href="blog-details.html"><img src="{{ asset('contents/website')}}/images/blog/main-home/4.jpg" alt=""></a>
                                <ul class="post-categories">
                                    <li><a href="blog-details.html">Artifical Intelligence</a></li>
                                </ul>
                            </div>
                            <div class="blog-content">
                               <ul class="blog-meta">
                                   <li class="date"><i class="fa fa-calendar-check-o"></i> 26 December 2020</li>
                                   <li class="admin"><i class="fa fa-user-o"></i> admin</li>
                               </ul>
                               <h3 class="blog-title"><a href="blog-details.html">Types of Social Proof What its Makes Them Effective</a></h3>
                               <p class="desc">We denounce with righteous indige nation and dislike men who are so beguiled...</p>
                               <div class="blog-button"><a href="blog-details.html">Learn More</a></div>
                            </div>
                        </div>
                        <div class="blog-item">
                            <div class="image-wrap">
                                <a href="blog-details.html"><img src="{{ asset('contents/website')}}/images/blog/main-home/5.jpg" alt=""></a>
                                <ul class="post-categories">
                                    <li><a href="blog-details.html">Digital Technology</a></li>
                                </ul>
                            </div>
                            <div class="blog-content">
                               <ul class="blog-meta">
                                   <li class="date"><i class="fa fa-calendar-check-o"></i> 28 December 2020</li>
                                   <li class="admin"><i class="fa fa-user-o"></i> admin</li>
                               </ul>
                               <h3 class="blog-title"><a href="blog-details.html">Tech Firms Support Huawei Restriction, Balk at Cost</a></h3>
                               <p class="desc">We denounce with righteous indige nation and dislike men who are so beguiled...</p>
                               <div class="blog-button"><a href="blog-details.html">Learn More</a></div>
                            </div>
                        </div>
                        <div class="blog-item">
                            <div class="image-wrap">
                                <a href="blog-details.html"><img src="{{ asset('contents/website')}}/images/blog/main-home/6.jpg" alt=""></a>
                                <ul class="post-categories">
                                    <li><a href="blog-details.html">It Services</a></li>
                                </ul>
                            </div>
                            <div class="blog-content">
                               <ul class="blog-meta">
                                   <li class="date"><i class="fa fa-calendar-check-o"></i> 30 December 2020</li>
                                   <li class="admin"><i class="fa fa-user-o"></i> admin</li>
                               </ul>
                               <h3 class="blog-title"><a href="blog-details.html">Servo Project Joins The Linux Foundation Fold Desco</a></h3>
                               <p class="desc">We denounce with righteous indige nation and dislike men who are so beguiled...</p>
                               <div class="blog-button"><a href="blog-details.html">Learn More</a></div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
            <!-- Blog Section End -->

            <!-- Partner Start -->
            @php
                $partner = App\Models\Partner::where('partner_status',1)->orderBy('partner_order','ASC')->limit(6)->get();
            @endphp
            <div class="rs-partner pt-80 pb-70">
                <div class="container">
                    <div class="rs-carousel owl-carousel" data-loop="true" data-items="5" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="2" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="3" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="5" data-md-device-nav="false" data-md-device-dots="false">
                        @foreach ($partner as $part)
                        <div class="partner-item">
                            <div class="logo-img">
                                <a href="{{ $part->partner_url }}">
                                    <img class="hover-logo" src="{{ asset('uploads/partners/'.$part->partner_logo) }}" alt="">
                                    <img class="main-logo" src="{{ asset('uploads/partners/'.$part->partner_logo) }}" alt="">
                                </a>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
            <!-- Partner End -->

        </div>
        <!-- Main content End -->
@endsection
