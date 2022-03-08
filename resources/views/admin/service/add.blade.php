@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <form method="post" action="{{ url('dashboard/service/submit') }}" enctype="multipart/form-data">
      @csrf
      <div class="card">
        <div class="card-header card_header bg-dark">
          <div class="row">
            <div class="col-md-8 card_header_title">
              <i class="fab fa-gg-circle"></i>Add Service Information</div>
            <div class="col-md-4 card_header_btn">
              <a class="btn btn-sm btn-secondary chb_btn" href="{{ url('dashboard/service') }}"><i class="fas fa-bars"></i> All Service</a>
            </div>
          </div>
        </div>
        <div class="card-body card_body">
          @if(Session::has('success'))
            <script>
              swal({ title: "Success!", text: "{{Session::get('success')}}", icon: "success", timer: 7000});
            </script>
          @endif
          @if(Session::has('error'))
            <script>
              swal({ title: "Opps!", text: "{{Session::get('error')}}", icon: "error", timer: 10000});
            </script>
          @endif
          <div class="row mb-3 {{$errors->has('service_title') ? 'has-error':''}}">
            <label class="col-sm-3 col-form-label col_form_label">Service Title<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" name="service_title" value="{{ old('service_title') }}">
              @if ($errors->has('service_title'))
                <span class="error">{{ $errors->first('service_title') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{$errors->has('service_subtitle') ? ' has-error':''}}">
            <label class="col-sm-3 col-form-label col_form_label">Service Subtitle<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" name="service_subtitle" value="{{ old('service_subtitle') }}">
              @if ($errors->has('service_subtitle'))
                <span class="error">{{ $errors->first('service_subtitle') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{$errors->has('service_icon') ? ' has-error':''}}">
            <label class="col-sm-3 col-form-label col_form_label">Service Icon<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input input="text" class="form-control form_control" name="service_icon" value="{{ old('service_icon') }}">
              @if ($errors->has('service_icon'))
                <span class="error">{{ $errors->first('service_icon') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{$errors->has('service_order') ? ' has-error':''}}">
            <label class="col-sm-3 col-form-label col_form_label">Order By<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input input="text" class="form-control form_control" name="service_order" value="{{ old('service_order') }}">
              @if ($errors->has('service_order'))
                <span class="error">{{ $errors->first('service_order') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{$errors->has('service_details') ? ' has-error':''}}">
            <label class="col-sm-3 col-form-label col_form_label">Service Details<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
                <textarea type="text" class="form-control form_control" name="service_details" value="{{ old('service_details') }}" cols="20" rows="5"></textarea>
              @if ($errors->has('service_details'))
                <span class="error">{{ $errors->first('service_details') }}</span>
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
