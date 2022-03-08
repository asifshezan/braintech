@extends('layouts.admin')
@section('content')
<div class="row">

    <div class="col-md-12">
      <form method="POST" action="{{url('dashboard/banner/update')}}" enctype="multipart/form-data">
        @csrf
        <div class="card">
          <div class="card-header card_header bg-dark">
            <div class="row">
              <div class="col-md-8 card_header_title">
                <i class="fab fa-gg-circle"></i>Update Banner Information</div>
              <div class="col-md-4 card_header_btn">
                <a href="{{url('dashboard/banner')}}" class="btn btn-sm btn-secondary chb_btn"><i class="fas fa-bars"></i> All Banner</a>
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
            <div class="row mb-3 {{$errors->has('ban_title') ? 'has-error':''}}">
              <label class="col-sm-3 col-form-label col_form_label">Banner Title<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                  <input type="hidden" name="ban_id" value="{{$data->ban_id}}"/>
                <input type="text" class="form-control form_control" name="ban_title" value="{{ $data->ban_title }}">
                @if ($errors->has('ban_title'))
                    <span class="error">{{ $errors->first('ban_title') }}</span>
                @endif
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Banner Subtitle:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" name="ban_subtitle" value="{{ $data->ban_subtitle }}">
              </div>
            </div>
            <div class="row mb-3 {{$errors->has('ban_button') ? 'has-error':''}}">
              <label class="col-sm-3 col-form-label col_form_label">Banner Button<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" name="ban_button" value="{{ $data->ban_button }}">
                @if ($errors->has('ban_button'))
                    <span class="error">{{ $errors->first('ban_button') }} </span>
                @endif
            </div>
            </div>
            <div class="row mb-3 {{$errors->has('ban_url') ? 'has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">Banner URL<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" name="ban_url" value="{{ $data->ban_url }}">
                  @if ($errors->has('ban_url'))
                      <span class="error">{{ $errors->first('ban_url') }} </span>
                  @endif
              </div>
              </div>
              <div class="row mb-3 {{$errors->has('ban_order') ? 'has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">Banner Order<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="number" class="form-control form_control" name="ban_order" value="{{ $data->ban_order }}">
                  @if ($errors->has('ban_order'))
                      <span class="error">{{ $errors->first('ban_order') }} </span>
                  @endif
              </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Banner Image:</label>
                <div class="col-sm-4">
                  <input type="file" name="pic">
                </div>
                <div class="col-md-2">
                    @if ($data->ban_image!='')
                        <img src="{{asset('uploads/banners/'.$data->ban_image)}}" height="60" />
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
