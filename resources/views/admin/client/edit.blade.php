@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
      <form method="POST" action="{{ url('dashboard/client/update') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
          <div class="card-header card_header bg-dark">
            <div class="row">
              <div class="col-md-8 card_header_title">
                <i class="fab fa-gg-circle"></i>Update Client Information</div>
              <div class="col-md-4 card_header_btn">
                <a href="{{ url('dashboard/client') }}" class="btn btn-sm btn-secondary chb_btn"><i class="fas fa-bars"></i> All Client</a>
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
            <div class="row mb-3 {{$errors->has('client_title') ? 'has-error':''}}">
              <label class="col-sm-3 col-form-label col_form_label">Client Title<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                  <input type="hidden" name="client_id" value="{{ $data->client_id }}"/>
                <input type="text" class="form-control form_control" name="client_title" value="{{ $data->client_title }}">
                @if ($errors->has('client_title'))
                    <span class="error">{{ $errors->first('client_title') }}</span>
                @endif
              </div>
            </div>

            <div class="row mb-3 {{$errors->has('client_url') ? 'has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">Client URL<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" name="client_url" value="{{ $data->client_url }}">
                  @if ($errors->has('client_url'))
                      <span class="error">{{ $errors->first('client_url') }} </span>
                  @endif
              </div>
              </div>
              <div class="row mb-3 {{$errors->has('client_order') ? 'has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">Order By<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="number" class="form-control form_control" name="client_order" value="{{ $data->client_order }}">
                  @if ($errors->has('client_order'))
                      <span class="error">{{ $errors->first('client_order') }} </span>
                  @endif
              </div>
              </div>
              <div class="row mb-3 {{$errors->has('client_remarks') ? 'has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">Remarks<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" name="client_remarks" value="{{ $data->client_remarks }}">
                  @if ($errors->has('client_remarks'))
                      <span class="error">{{ $errors->first('client_remarks') }} </span>
                  @endif
              </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Image:</label>
                <div class="col-sm-4">
                  <input type="file" name="pic" class="img-fluid">
                </div>
                <div class="col-md-2">
                    @if ($data->client_image!='')
                        <img src="{{ asset('uploads/testimonials/'.$data->client_image)}}" height="60" />
                    @else
                        <img src="{{ asset('uploads/avatar.png')}}" height="60" />
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
