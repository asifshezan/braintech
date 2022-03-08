@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
      <form method="POST" action="{{ url('dashboard/testimonial/update') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
          <div class="card-header card_header bg-dark">
            <div class="row">
              <div class="col-md-8 card_header_title">
                <i class="fab fa-gg-circle"></i>Update Testimonial Information</div>
              <div class="col-md-4 card_header_btn">
                <a href="{{ url('dashboard/testimonial') }}" class="btn btn-sm btn-secondary chb_btn"><i class="fas fa-bars"></i> All Testimonial</a>
              </div>
            </div>
          </div>
          <div class="card-body card_body">
              @if (Session::has('success'))
                <script>
                    swal({ title: "success!", text: "{{Session::get('success')}}", icon: "success", timer:7000});
                </script>
              @endif
              @if (Session::has('error'))
                  <script>
                      swal({ title: "Opps!", text: "{{Session::get('error')}}", icon: "error", timer: 8000});
                  </script>
              @endif
            <div class="row mb-3 {{$errors->has('test_name') ? 'has-error':''}}">
              <label class="col-sm-3 col-form-label col_form_label">Testimonial Name<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                  <input type="hidden" name="test_id" value="{{ $data->test_id }}"/>
                <input type="text" class="form-control form_control" name="test_name" value="{{ $data->test_name }}">
                @if ($errors->has('test_name'))
                    <span class="error">{{ $errors->first('test_name') }}</span>
                @endif
              </div>
            </div>

            <div class="row mb-3 {{$errors->has('test_designation') ? 'has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">Designation<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" name="test_designation" value="{{ $data->test_designation }}">
                  @if ($errors->has('test_designation'))
                      <span class="error">{{ $errors->first('test_designation') }} </span>
                  @endif
              </div>
              </div>
              <div class="row mb-3 {{$errors->has('test_company') ? 'has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">Company Name<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" name="test_company" value="{{ $data->test_company }}">
                  @if ($errors->has('test_company'))
                      <span class="error">{{ $errors->first('test_company') }} </span>
                  @endif
              </div>
              </div>
              <div class="row mb-3 {{$errors->has('test_order') ? 'has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">Order By<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="number" class="form-control form_control" name="test_order" value="{{ $data->test_order }}">
                  @if ($errors->has('test_order'))
                      <span class="error">{{ $errors->first('test_order') }} </span>
                  @endif
              </div>
              </div>
              <div class="row mb-3 {{$errors->has('test_feedback') ? 'has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">Feedback<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" name="test_feedback" value="{{ $data->test_feedback }}">
                  @if ($errors->has('test_feedback'))
                      <span class="error">{{ $errors->first('test_feedback') }} </span>
                  @endif
              </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Image:</label>
                <div class="col-sm-4">
                  <input type="file" name="pic">
                </div>
                <div class="col-md-2">
                    @if ($data->test_image!='')
                        <img src="{{asset('uploads/testimonials/'.$data->test_image)}}" height="60" />
                    @else
                        <img src="{{asset('uploads/avatar.png')}}" height="60" />
                    @endif
                </div>
              </div>
          </div>
          <div class="card-footer card_footer bg-dark text-center">
            <button class="btn btn-secondary" type="submit">UPDATE</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
