@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
      <form method="POST" action="{{url('dashboard/partner/update')}}" enctype="multipart/form-data">
        @csrf
        <div class="card">
          <div class="card-header card_header bg-dark">
            <div class="row">
              <div class="col-md-8 card_header_title">
                <i class="fab fa-gg-circle"></i>Update Partner Information</div>
              <div class="col-md-4 card_header_btn">
                <a href="{{ url('dashboard/partner') }}" class="btn btn-sm btn-secondary chb_btn"><i class="fas fa-bars"></i> All Partner</a>
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
            <div class="row mb-3 {{$errors->has('partner_title') ? 'has-error':''}}">
              <label class="col-sm-3 col-form-label col_form_label">Partner Title<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                  <input type="hidden" name="partner_id" value="{{ $data->partner_id }}"/>
                <input type="text" class="form-control form_control" name="partner_title" value="{{ $data->partner_title }}">
                @if ($errors->has('partner_title'))
                    <span class="error">{{ $errors->first('partner_title') }}</span>
                @endif
              </div>
            </div>

            <div class="row mb-3 {{$errors->has('partner_url') ? 'has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">Partner URL<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" name="partner_url" value="{{ $data->partner_url }}">
                  @if ($errors->has('partner_url'))
                      <span class="error">{{ $errors->first('partner_url') }} </span>
                  @endif
              </div>
              </div>
              <div class="row mb-3 {{$errors->has('partner_order') ? 'has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">Partner Order<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="number" class="form-control form_control" name="partner_order" value="{{ $data->partner_order }}">
                  @if ($errors->has('partner_order'))
                      <span class="error">{{ $errors->first('partner_order') }} </span>
                  @endif
              </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Partner Logo:</label>
                <div class="col-sm-4">
                  <input type="file" name="pic">
                </div>
                <div class="col-md-2">
                    @if ($data->partner_logo!='')
                        <img src="{{asset('uploads/partners/'.$data->partner_logo)}}" height="60" />
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
