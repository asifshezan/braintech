@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
      <form method="POST" action="{{ url('dashboard/gallery/update') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
          <div class="card-header card_header bg-dark">
            <div class="row">
              <div class="col-md-8 card_header_title">
                <i class="fab fa-gg-circle"></i>Update Gallery Information</div>
              <div class="col-md-4 card_header_btn">
                <a href="{{ url('dashboard/gallery') }}" class="btn btn-sm btn-secondary chb_btn"><i class="fas fa-bars"></i> All Gallery</a>
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
              <div class="row mb-3 {{$errors->has('gallery_title') ? 'has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">Gallery Title<span
                        class="req_star">*</span>:</label>
                <div class="col-sm-7">
                    <input type="hidden" name="gallery_id" value="{{ $data->gallery_id }}">
                    <input type="text" class="form-control form_control" name="gallery_title"
                        value="{{ $data->gallery_title }}">
                    @if ($errors->has('gallery_title'))
                    <span class="error">{{ $errors->first('gallery_title') }}</span>
                    @endif
                </div>
            </div>
            <div class="row mb-3 {{$errors->has('gallery_remarks') ? ' has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">Gallery Remarks<span
                        class="req_star">*</span>:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control form_control" name="gallery_remarks"
                        value="{{ $data->gallery_remarks }}">
                    @if ($errors->has('gallery_remarks'))
                    <span class="error">{{ $errors->first('gallery_remarks') }}</span>
                    @endif
                </div>
            </div>
            <div class="row mb-3 {{$errors->has('gallery_order') ? ' has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">Order By<span
                        class="req_star">*</span>:</label>
                <div class="col-sm-7">
                    <input input="text" class="form-control form_control" name="gallery_order"
                        value="{{ $data->gallery_order }}">
                    @if ($errors->has('gallery_order'))
                    <span class="error">{{ $errors->first('gallery_order') }}</span>
                    @endif
                </div>
            </div>
            <div class="row mb-3 {{$errors->has('gallery_category_id') ? ' has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">Galley Category<span class="req_star">*</span>:</label>
                <div class="col-sm-7">

                  <select class="form-control form_control" name="gallery_category_id">
                    <option value="">select user role</option>
                    <option value="1">asif</option>
                  </select>
                  @if ($errors->has('gallery_category_id'))
                    <span class="error">{{ $errors->first('gallery_category_id') }}</span>
                  @endif
                </div>
              </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Gallery Image:</label>
                <div class="col-sm-4">
                    <input type="file" name="pic">
                </div>
                <div class="col-md-3">
                    @if ($data->gallery_image!='')
                        <img src="{{ asset('uploads/galleries/'.$data->gallery_image)}}" height="40">
                        @else
                        <img src="{{ asset('uploads/avatar.png')}}" height="40">
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
