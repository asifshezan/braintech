@extends('layouts.website')
@section('content')
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs img3">
    <div class="breadcrumbs-inner text-center">
        <h1 class="page-title">About</h1>
        <ul>
            <li title="Braintech - IT Solutions and Technology Startup HTML Template">
                <a class="active" href="index.html">Home</a>
            </li>
            <li>About</li>
        </ul>
    </div>
</div>
<!-- Breadcrumbs End -->
<!-- About Section Start -->
<div class="rs-about gray-color pt-120 pb-120 md-pt-80 md-pb-80">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 md-mb-30">
                <div class="rs-animation-shape">
                    <div class="images">
                       <img src="{{asset('contents/website')}}/images/about/about-3.png" alt="">
                    </div>
                    <div class="middle-image2">
                       <img class="dance3" src="{{asset('contents/website')}}/images/about/effect-1.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pl-60 md-pl-15">
                <div class="contact-wrap">
                    <div class="sec-title mb-30">
                        <div class="sub-text style-bg">About Us</div>
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
                        <a class="readon learn-more" href="contact.html">Learn-More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-image">
            <img class="top dance" src="{{asset('contents/website')}}/images/about/dotted-3.png" alt="">
        </div>
    </div>
</div>
<!-- About Section End -->

<!-- Team Section Start -->
    @php
        $teams = App\Models\TeamMember::where('team_status',1)->orderBy('team_order','ASC')->limit(9)->get();
    @endphp
<div class="rs-team pt-120 pb-120 md-pt-80 md-pb-80 xs-pb-54">
    <div class="sec-title2 text-center mb-30">
        <span class="sub-text style-bg white-color">Team</span>
        <h2 class="title white-color">
            Expert IT Consultants
        </h2>
    </div>
    <div class="container">
        <div class="container">
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="true" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="true" data-md-device="3" data-md-device-nav="false" data-md-device-dots="true">
                @foreach ($teams as $team)
                <div class="team-item-wrap">
                    <div class="team-wrap">
                        <div class="image-inner">
                            <a href="#"><img src="{{asset('uploads/teammembers/'.$team->team_image) }}" alt=""></a>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h4 class="person-name"><a href="#">{{ $team->team_name }}</a></h4>
                        <span class="designation">{{ $team->team_designation }}</span>
                        <ul class="team-social">
                            <li><a href="{{ $team->team_facebook }}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{ $team->team_instragram }}"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="{{ $team->team_twitter }}"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{ $team->team_linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Team Section End -->

<!-- Process Section Start -->
<div class="rs-process style2 pt-120 pb-120 md-pt-80 md-pb-73">
    <div class="container">
        <div class="sec-title2 text-center mb-45">
            <span class="sub-text style-bg">Process</span>
            <h2 class="title title2">
               Our Working Process
            </h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6 md-mb-50">
                <div class="addon-process">
                    <div class="process-wrap">
                        <div class="process-img">
                            <img src="{{asset('contents/website')}}/images/process/1.png" alt="">
                        </div>
                        <div class="process-text">
                            <h3 class="title">Discovery</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 md-mb-50">
                <div class="addon-process">
                    <div class="process-wrap">
                        <div class="process-img">
                            <img src="{{asset('contents/website')}}/images/process/2.png" alt="">
                        </div>
                        <div class="process-text">
                            <h3 class="title"> Planning</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="addon-process">
                    <div class="process-wrap">
                        <div class="process-img">
                            <img src="{{asset('contents/website')}}/images/process/3.png" alt="">
                        </div>
                        <div class="process-text">
                            <h3 class="title">Execute</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="addon-process">
                    <div class="process-wrap">
                        <div class="process-img">
                            <img src="{{asset('contents/website')}}/images/process/4.png" alt="">
                        </div>
                        <div class="process-text">
                            <h3 class="title">Deliver</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Process Section End -->

<!-- Counter Section Start -->
<div class="rs-contact-wrap bg5 pt-120 pb-390 md-pt-80">
   <div class="container">
     <div class="sec-title2 text-center mb-30">
         <span class="sub-text style-bg white-color">Contact</span>
         <h2 class="title white-color">
            Request A Free Consultation
         </h2>
     </div>
   </div>
</div>
<!-- Counter Section End -->

<!-- Video Section End -->
<div class="rs-video-wrap style2 inner pb-120 md-pb-80">
    <div class="container">
        <div class="row margin-0 gray-color">
            <div class="col-lg-6 padding-0">
                <div class="video-item">
                    <div class="rs-videos">
                        <div class="animate-border main-home style2">
                            <a class="popup-border popup-videos" href="https://www.youtube.com/watch?v=YLN1Argi7ik">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 padding-0">
                <div class="rs-requset">
                    <div id="form-messages"></div>
                    <form  method="post" action="{{ url('contact-message')}}">
                        @csrf
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                    <input class="from-control" type="text"  name="cm_name" placeholder="Name" required="">
                                </div>
                                <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                    <input class="from-control" type="text" name="cm_email" placeholder="E-Mail" required="">
                                </div>
                                <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                    <input class="from-control" type="text" name="cm_phone" placeholder="Phone Number" required="">
                                </div>
                                <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                    <input class="from-control" type="text" name="cm_subject" placeholder="Your Subject" required="">
                                </div>

                                <div class="col-lg-12 mb-45">
                                    <textarea class="from-control" name="cm_message" placeholder="Your message Here" required=""></textarea>
                                </div>
                            </div>
                            <div class="btn-part">
                              <input class="submit sub-small" type="submit" value="Submit Now">
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Section End -->

</div>
<!-- Main content End -->

@endsection
