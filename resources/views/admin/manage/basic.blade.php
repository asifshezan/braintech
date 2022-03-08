@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <form method="post" action="{{ url('dashboard/basic/update') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header card_header bg-dark">
                    <div class="row">
                        <div class="col-md-8 card_header_title">
                            <i class="fab fa-gg-circle"></i>Basic Information</div>
                        <div class="col-md-4 card_header_btn">
                            <a class="btn btn-sm btn-secondary chb_btn" href="{{ url('dashboard/teammember') }}"><i
                                    class="fas fa-bars"></i> Contact Information</a>
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
                    <div class="row mb-3 {{$errors->has('basic_company') ? 'has-error':''}}">
                        <label class="col-sm-3 col-form-label col_form_label">Company Name<span
                                class="req_star">*</span>:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form_control" name="basic_company"
                                value="{{ $basic_all->basic_company }}">
                            @if ($errors->has('basic_company'))
                            <span class="error">{{ $errors->first('basic_company') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3 {{$errors->has('basic_title') ? ' has-error':''}}">
                        <label class="col-sm-3 col-form-label col_form_label">Company Title<span
                                class="req_star">*</span>:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form_control" name="basic_title"
                                value="{{ $basic_all->basic_title }}">
                            @if ($errors->has('basic_title'))
                            <span class="error">{{ $errors->first('basic_title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Main Logo:</label>
                        <div class="col-sm-5">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control form_control" name="pic">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            @if ($basic_all->basic_logo!='')
                                <img src="{{ asset('uploads/basics/'.$basic_all->basic_logo) }}" alt="image" class="img-fluid" width="40">
                                @else
                                <img src="{{ asset('uploads/avatar.png')}}" class="img-fluid" width="40">
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Footer Logo:</label>
                        <div class="col-sm-5">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control form_control" name="flogo">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            @if ($basic_all->basic_flogo!='')
                                <img src="{{ asset('uploads/basics/'.$basic_all->basic_flogo) }}" alt="image" class="img-fluid" width="40">
                                @else
                                <img src="{{ asset('uploads/avatar.png')}}" class="img-fluid" width="40">
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Favicon Logo:</label>
                        <div class="col-sm-5">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control form_control" name="favicon">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            @if ($basic_all->basic_favicon!='')
                                <img src="{{ asset('uploads/basics/'.$basic_all->basic_favicon) }}" alt="image" class="img-fluid" width="40">
                                @else
                                <img src="{{ asset('uploads/avatar.png')}}" class="img-fluid" width="40">
                            @endif
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
