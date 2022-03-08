@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <form method="post" action="{{ url('dashboard/partner/submit') }}" enctype="multipart/form-data">
      @csrf
      <div class="card">
        <div class="card-header card_header bg-dark">
          <div class="row">
            <div class="col-md-8 card_header_title">
              <i class="fab fa-gg-circle"></i>Add Partner Information</div>
            <div class="col-md-4 card_header_btn">
              <a class="btn btn-sm btn-secondary chb_btn" href="{{ url('dashboard/partner') }}"><i class="fas fa-bars"></i> All Partner</a>
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
          <div class="row mb-3 {{$errors->has('partner_title') ? 'has-error':''}}">
            <label class="col-sm-3 col-form-label col_form_label">Partner Title<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" name="partner_title" value="{{ old('partner_title') }}">
              @if ($errors->has('partner_title'))
                <span class="error">{{ $errors->first('partner_title') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{$errors->has('partner_url') ? ' has-error':''}}">
            <label class="col-sm-3 col-form-label col_form_label">Partner URL<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" name="partner_url" value="{{ old('partner_url') }}">
              @if ($errors->has('partner_url'))
                <span class="error">{{ $errors->first('partner_url') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{$errors->has('partner_order') ? ' has-error':''}}">
            <label class="col-sm-3 col-form-label col_form_label">Order By<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input input="text" class="form-control form_control" name="partner_order" value="{{ old('partner_order') }}">
              @if ($errors->has('partner_order'))
                <span class="error">{{ $errors->first('partner_order') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Partner Logo:</label>
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
