@extends('layouts.website')
@section('content')
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs img4">
    <div class="breadcrumbs-inner text-center">
        <h1 class="page-title">Our Team</h1>
        <ul>
            <li title="Braintech - IT Solutions and Technology Startup HTML Template">
                <a class="active" href="index.html">Home</a>
            </li>
           <li>Our Team</li>
        </ul>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Team Section Start -->
    @php
        $Teams = App\Models\TeamMember::where('team_status',1)->orderBy('team_order','ASC')->limit(9)->get();
     @endphp
<div class="rs-team modify1 pt-120 pb-95 md-pt-80 md-pb-75">
    <div class="container">
        <div class="row">
            @foreach ($Teams as $team)
            <div class="col-lg-4 col-md-6 mb-50">
                <div class="team-item-wrap">
                    <div class="team-wrap">
                        <div class="image-inner">
                            <a href="#"><img src="{{ asset('uploads/teammembers/'.$team->team_image) }}" alt=""></a>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h4 class="person-name"><a href="#">{{ $team->team_name }}</a></h4>
                        <span class="designation">{{ $team->team_designation }}</span>
                        <ul class="team-social">
                            <li><a href="{{ $team->team_facebook }}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{ $team->team_instragram }}"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="{{ $team->team_twitter }}"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{ $team->team_linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team Section End -->

</div>
<!-- Main content End -->
@endsection
