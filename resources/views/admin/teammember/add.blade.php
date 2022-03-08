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
                            <i class="fab fa-gg-circle"></i>Add Team-Member Information</div>
                        <div class="col-md-4 card_header_btn">
                            <a class="btn btn-sm btn-secondary chb_btn" href="{{ url('dashboard/teammember') }}"><i
                                    class="fas fa-bars"></i> All Team Member</a>
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
                    <div class="row mb-3 {{$errors->has('team_name') ? 'has-error':''}}">
                        <label class="col-sm-3 col-form-label col_form_label">TeamMember Name<span
                                class="req_star">*</span>:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form_control" name="team_name"
                                value="{{ old('team_name') }}">
                            @if ($errors->has('team_name'))
                            <span class="error">{{ $errors->first('team_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3 {{$errors->has('team_designation') ? ' has-error':''}}">
                        <label class="col-sm-3 col-form-label col_form_label">Designation<span
                                class="req_star">*</span>:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form_control" name="team_designation"
                                value="{{ old('team_designation') }}">
                            @if ($errors->has('team_designation'))
                            <span class="error">{{ $errors->first('team_designation') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3 {{$errors->has('team_facebook') ? ' has-error':''}}">
                        <label class="col-sm-3 col-form-label col_form_label">Facebook URL<span
                                class="req_star">*</span>:</label>
                        <div class="col-sm-7">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                <input type="text" class="form-control form_control" name="team_facebook" value="{{ old('team_facebook') }}">
                            </div>
                            @if ($errors->has('team_facebook'))
                            <span class="error">{{ $errors->first('team_facebook') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3 {{$errors->has('team_twitter') ? ' has-error':''}}">
                        <label class="col-sm-3 col-form-label col_form_label">Twitter URL<span
                                class="req_star">*</span>:</label>
                        <div class="col-sm-7">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                <input type="text" class="form-control form_control" name="team_twitter" value="{{ old('team_twitter') }}">
                            </div>
                            @if ($errors->has('team_twitter'))
                            <span class="error">{{ $errors->first('team_twitter') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3 {{$errors->has('team_linkedin') ? ' has-error':''}}">
                        <label class="col-sm-3 col-form-label col_form_label">Linkdin URL<span
                                class="req_star">*</span>:</label>
                        <div class="col-sm-7">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                                <input type="text" class="form-control form_control" name="team_linkedin" value="{{ old('team_linkedin') }}">
                            </div>
                            @if ($errors->has('team_linkedin'))
                            <span class="error">{{ $errors->first('team_linkedin') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3 {{$errors->has('team_instragram') ? ' has-error':''}}">
                        <label class="col-sm-3 col-form-label col_form_label">Instagram URL<span
                                class="req_star">*</span>:</label>
                        <div class="col-sm-7">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                <input type="text" class="form-control form_control" name="team_instragram" value="{{ old('team_instragram') }}">
                            </div>
                            @if ($errors->has('team_instragram'))
                            <span class="error">{{ $errors->first('team_instragram') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3 {{$errors->has('team_order') ? ' has-error':''}}">
                        <label class="col-sm-3 col-form-label col_form_label">Order By<span
                                class="req_star">*</span>:</label>
                        <div class="col-sm-7">
                            <input input="text" class="form-control form_control" name="team_order"
                                value="{{ old('team_order') }}">
                            @if ($errors->has('team_order'))
                            <span class="error">{{ $errors->first('team_order') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3 {{$errors->has('team_remarks') ? ' has-error':''}}">
                        <label class="col-sm-3 col-form-label col_form_label">Remarks<span class="req_star">*</span>:</label>
                        <div class="col-sm-7">
                            <textarea type="text" class="form-control form_control" name="team_remarks" value="{{ old('team_remarks') }}" cols="20" rows="5"></textarea>
                          @if ($errors->has('team_remarks'))
                            <span class="error">{{ $errors->first('team_remarks') }}</span>
                          @endif
                        </div>
                      </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Image:</label>
                        <div class="col-sm-7">
                            <input type="file" name="pic">
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
