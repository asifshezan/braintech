@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
      <form method="POST" action="{{ url('dashboard/gallery-category/update') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
          <div class="card-header card_header bg-dark">
            <div class="row">
              <div class="col-md-8 card_header_title">
                <i class="fab fa-gg-circle"></i>Update Category Information</div>
              <div class="col-md-4 card_header_btn">
                <a href="{{ url('dashboard/gallery-category') }}" class="btn btn-sm btn-secondary chb_btn"><i class="fas fa-bars"></i> All Category</a>
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
              <div class="row mb-3 {{$errors->has('galcate_name') ? 'has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">Category Name<span
                        class="req_star">*</span>:</label>
                <div class="col-sm-7">
                    <input type="hidden" name="galcate_id" value="{{ $data->galcate_id }}">
                    <input type="text" class="form-control form_control" name="galcate_name"
                        value="{{ $data->galcate_name }}">
                    @if ($errors->has('galcate_name'))
                    <span class="error">{{ $errors->first('galcate_name') }}</span>
                    @endif
                </div>
            </div>
            <div class="row mb-3 {{$errors->has('galcate_url') ? 'has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">Category URL<span
                        class="req_star">*</span>:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control form_control" name="galcate_url"
                        value="{{ $data->galcate_url }}">
                    @if ($errors->has('galcate_url'))
                    <span class="error">{{ $errors->first('galcate_url') }}</span>
                    @endif
                </div>
            </div>
            <div class="row mb-3 {{$errors->has('galcate_remarks') ? ' has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">Category Remarks<span
                        class="req_star">*</span>:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control form_control" name="galcate_remarks"
                        value="{{ $data->galcate_remarks }}">
                    @if ($errors->has('galcate_remarks'))
                    <span class="error">{{ $errors->first('galcate_remarks') }}</span>
                    @endif
                </div>
            </div>
            <div class="row mb-3 {{$errors->has('galcate_order') ? ' has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">Category Order<span
                        class="req_star">*</span>:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control form_control" name="galcate_order"
                        value="{{ $data->galcate_order }}">
                    @if ($errors->has('galcate_order'))
                    <span class="error">{{ $errors->first('galcate_order') }}</span>
                    @endif
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
