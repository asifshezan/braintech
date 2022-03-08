@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <form method="post" action="{{ url('dashboard/contact/update') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header card_header bg-dark">
                    <div class="row">
                        <div class="col-md-8 card_header_title">
                            <i class="fab fa-gg-circle"></i>Contact Information</div>
                        <div class="col-md-4 card_header_btn">
                            <a class="btn btn-sm btn-secondary chb_btn" href="{{ url('dashboard/teammember') }}"><i
                                    class="fas fa-bars"></i> Social Media</a>
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
                                <span class="input-group-text"><i class="fas fa-phone-flip"></i></span>
                                <input type="text" class="form-control form_control" name="cont_phone1" value="{{ $contact->cont_phone1 }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-phone-flip"></i></span>
                                <input type="text" class="form-control form_control" name="cont_phone2"  value="{{ $contact->cont_phone2 }}" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-phone-flip"></i></span>
                                <input type="text" class="form-control form_control" name="cont_phone3" value="{{ $contact->cont_phone3 }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-phone-flip"></i></span>
                                <input type="text" class="form-control form_control" name="cont_phone4" value="{{ $contact->cont_phone4 }}">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 mt-3">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control form_control" name="cont_email1" value="{{ $contact->cont_email1 }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control form_control" name="cont_email2" value="{{ $contact->cont_email2 }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control form_control" name="cont_email3" value="{{ $contact->cont_email3 }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control form_control" name="cont_email4" value="{{ $contact->cont_email4 }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-location-dot"></i></span>
                                <input type="text" class="form-control form_control" name="cont_add1" value="{{ $contact->cont_add1 }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-location-dot"></i></span>
                                <input type="text" class="form-control form_control" name="cont_add2" value="{{ $contact->cont_add2 }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-location-dot"></i></span>
                                <input type="text" class="form-control form_control" name="cont_add3" value="{{ $contact->cont_add3 }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-location-dot"></i></span>
                                <input type="text" class="form-control form_control" name="cont_add4" value="{{ $contact->cont_add4 }}">
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
