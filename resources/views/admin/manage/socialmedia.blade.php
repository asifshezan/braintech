@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <form method="post" action="{{ url('dashboard/teammember/submit') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header card_header bg-dark">
                    <div class="row">
                        <div class="col-md-8 card_header_title">
                            <i class="fab fa-gg-circle"></i>Social Media</div>
                        <div class="col-md-4 card_header_btn">
                            <a class="btn btn-sm btn-secondary chb_btn" href="{{ url('dashboard/teammember') }}"><i
                                    class="fas fa-bars"></i> Basic Information</a>
                        </div>
                    </div>
                </div>
                <div class="card-body card_body">
                    @if(Session::has('success'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "{{Session::get('success')}}",
                            icon: "success",
                            timer: 7000
                        });

                    </script>
                    @endif
                    @if(Session::has('error'))
                    <script>
                        swal({
                            title: "Opps!",
                            text: "{{Session::get('error')}}",
                            icon: "error",
                            timer: 10000
                        });

                    </script>
                    @endif

                    <div class="row mb-3 mt-3">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                <input type="text" class="form-control form_control" name="sm_facebook">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                <input type="text" class="form-control form_control" name="sm_twitter">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fab fa-linkedin-in"></i></span>
                                <input type="text" class="form-control form_control" name="sm_linkedin">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fab fa-dribbble"></i></span>
                                <input type="text" class="form-control form_control" name="sm_dribbble">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                                <input type="text" class="form-control form_control" name="sm_youtube">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fab fa-slack"></i></span>
                                <input type="text" class="form-control form_control" name="sm_slack">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                <input type="text" class="form-control form_control" name="sm_instagram">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fab fa-behance"></i></span>
                                <input type="text" class="form-control form_control" name="sm_behance">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fab fa-google"></i></span>
                                <input type="text" class="form-control form_control" name="sm_google">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fab fa-reddit-alien"></i></span>
                                <input type="text" class="form-control form_control" name="sm_raddit">
                            </div>
                        </div>

                    </div>


                <div class="card-footer card_footer bg-dark text-center">
                    <button class="btn btn-secondary" type="submit">SUBMIT</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
