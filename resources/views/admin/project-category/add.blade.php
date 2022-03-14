@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <form method="post" action="{{ url('dashboard/project-category/submit') }}" enctype="multipart/form-data">
      @csrf
      <div class="card">
        <div class="card-header card_header bg-dark">
          <div class="row">
            <div class="col-md-8 card_header_title">
              <i class="fab fa-gg-circle"></i>Add Project Category</div>
            <div class="col-md-4 card_header_btn">
              <a class="btn btn-sm btn-secondary chb_btn" href="{{ url('dashboard/project-category') }}"><i class="fas fa-bars"></i> All Category</a>
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
          <div class="row mb-3 {{$errors->has('procate_name') ? ' has-error':''}}">
            <label class="col-sm-3 col-form-label col_form_label">Category Name<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" name="procate_name" value="{{ old('procate_name') }}">
              @if ($errors->has('procate_name'))
                <span class="error">{{ $errors->first('procate_name') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{$errors->has('procate_order') ? ' has-error':''}}">
            <label class="col-sm-3 col-form-label col_form_label">Order By<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input input="text" class="form-control form_control" name="procate_order" value="{{ old('procate_order') }}">
              @if ($errors->has('procate_order'))
                <span class="error">{{ $errors->first('procate_order') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{$errors->has('procate_remarks') ? ' has-error':''}}">
            <label class="col-sm-3 col-form-label col_form_label">Category Remarks<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
                <textarea type="text" class="form-control form_control" name="procate_remarks" value="{{ old('procate_remarks') }}" cols="20" rows="5"></textarea>
              @if ($errors->has('procate_remarks'))
                <span class="error">{{ $errors->first('procate_remarks') }}</span>
              @endif
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
