@extends('layouts.website')
@section('content')
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs img3">
    <div class="breadcrumbs-inner text-center">
        <h1 class="page-title">Contact</h1>
        <ul>
            <li title="Braintech - IT Solutions and Technology Startup HTML Template">
                <a class="active" href="index.html">Home</a>
            </li>
            <li>Contact</li>
        </ul>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Contact Section Start -->
    @php
        $contacts = App\Models\ContactInformation::where('cont_status',1)->orderBy('cont_id','DESC')->firstOrFail();
    @endphp
<div class="rs-contact pt-120 md-pt-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 md-mb-60">
                <div class="contact-box">
                        <div class="sec-title mb-45">
                            <span class="sub-text new-text white-color">Let's Talk</span>
                            <h2 class="title white-color">Speak With Expert Engineers.</h2>
                        </div>
                    <div class="address-box mb-25">
                        <div class="address-icon">
                            <i class="fa fa-home"></i>
                        </div>
                        <div class="address-text">
                                <span class="label">Email:</span>
                                <a href="tel:123222-8888">{{ $contacts->cont_email1 }}</a>
                        </div>
                    </div>
                    <div class="address-box mb-25">
                        <div class="address-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="address-text">
                            <span class="label">Phone:</span>
                            <a href="#">{{ $contacts->cont_phone1 }}</a>
                        </div>
                    </div>
                    <div class="address-box">
                        <div class="address-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="address-text">
                            <span class="label">Address:</span>
                            <div class="desc">{{ $contacts->cont_add1 }}</div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-lg-8 pl-70 md-pl-15">
                    <div class="contact-widget">
                    <div class="sec-title2 mb-40">
                        <span class="sub-text contact mb-15">Get In Touch</span>
                        <h2 class="title testi-title">Fill The Form Below</h2>

                    </div>
                        <div id="form-messages"></div>
                        <form  method="post" action="{{ url('contact-message')}}">
                            @csrf
                            <fieldset>
                                @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            <strong>{{ Session::get('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
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
    <div class="map-canvas pt-120 md-pt-80">
        <iframe src="https://maps.google.com/maps?q=rstheme&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"></iframe>
    </div>
</div>
<!-- Contact Section Start -->

</div>
<!-- Main content End -->

@endsection
