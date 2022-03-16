@extends('layouts.website')
@section('content')
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs img3">
    <div class="breadcrumbs-inner text-center">
        <h1 class="page-title">Case Studies Style 3</h1>
        <ul>
            <li title="Braintech - IT Solutions and Technology Startup HTML Template">
                <a class="active" href="index.html">Home</a>
            </li>
           <li>Case Studies Style 3</li>
        </ul>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Project Section Start -->
    @php
        $projects = App\Models\Project::where('pro_status',1)->orderBy('pro_order','ASC')->limit(6)->get();
    @endphp
<div class="rs-project style3 modify1 case-style3">
    <div class="container">
        <div class="row">
            @foreach ($projects as $project)
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="project-item">
                    <div class="project-img">
                        <a href="#"><img src="{{ asset('uploads/projects/'.$project->pro_image) }}" alt="images"></a>
                    </div>
                    <div class="project-content">
                        <div class="portfolio-inner">
                            <h3 class="title"><a href="case-studies-single.html">{{ $project->pro_title }}</a></h3>
                            <span class="category"><a href="case-studies-single.html">{{ $project->procategory->procate_name }}</a></span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Project Section End -->

</div>
<!-- Main content End -->
@endsection
