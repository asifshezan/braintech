@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <form method="post" action="{{ url('dashboard/banner/submit') }}" enctype="multipart/form-data">
      @csrf
      <div class="card">
        <div class="card-header card_header bg-dark">
          <div class="row">
            <div class="col-md-8 card_header_title">
              <i class="fab fa-gg-circle"></i>Add Banner Information</div>
            <div class="col-md-4 card_header_btn">
              <a class="btn btn-sm btn-secondary chb_btn" href="{{ url('dashboard/banner') }}"><i class="fas fa-bars"></i> All Banner</a>
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
          <div class="row mb-3 {{$errors->has('ban_title') ? 'has-error':''}}">
            <label class="col-sm-3 col-form-label col_form_label">Title<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" name="ban_title" value="{{ old('ban_title') }}">
              @if ($errors->has('ban_title'))
                <span class="error">{{ $errors->first('ban_title') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{ $errors->has('ban_subtitle') ? 'has-error':''}}">
            <label class="col-sm-3 col-form-label col_form_label">SubTitle:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" name="ban_subtitle" value="{{ old('ban_subtitle') }}">
              @if ($errors->has('ban_subtitle'))
                  <span class="error">{{ $errors->first('ban_subtitle') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{$errors->has('ban_button') ? ' has-error':''}}">
            <label class="col-sm-3 col-form-label col_form_label">Button<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" name="ban_button" value="{{ old('ban_button') }}">
              @if ($errors->has('ban_button'))
                <span class="error">{{ $errors->first('ban_button') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{$errors->has('ban_url') ? ' has-error':''}}">
            <label class="col-sm-3 col-form-label col_form_label">URL<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" name="ban_url" value="{{ old('ban_url') }}">
              @if ($errors->has('ban_url'))
                <span class="error">{{ $errors->first('ban_url') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{$errors->has('ban_order') ? ' has-error':''}}">
            <label class="col-sm-3 col-form-label col_form_label">Order By<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input input="text" class="form-control form_control" name="ban_order" value="{{ old('ban_order') }}">
              @if ($errors->has('role'))
                <span class="error">{{ $errors->first('role') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
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
