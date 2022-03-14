@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <form method="post" action="{{ url('dashboard/project/submit') }}" enctype="multipart/form-data">
      @csrf
      <div class="card">
        <div class="card-header card_header bg-dark">
          <div class="row">
            <div class="col-md-8 card_header_title">
              <i class="fab fa-gg-circle"></i>Add Project Information</div>
            <div class="col-md-4 card_header_btn">
              <a class="btn btn-sm btn-secondary chb_btn" href="{{ url('dashboard/project') }}"><i class="fas fa-bars"></i> All Project</a>
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
          <div class="row mb-3 {{$errors->has('pro_title') ? 'has-error':''}}">
            <label class="col-sm-3 col-form-label col_form_label">Project Title<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" name="pro_title" value="{{ old('pro_title') }}">
              @if ($errors->has('pro_title'))
                <span class="error">{{ $errors->first('pro_title') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{$errors->has('pro_url') ? ' has-error':''}}">
            <label class="col-sm-3 col-form-label col_form_label">Project URL<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" name="pro_url" value="{{ old('pro_url') }}">
              @if ($errors->has('pro_url'))
                <span class="error">{{ $errors->first('pro_url') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{$errors->has('pro_order') ? ' has-error':''}}">
            <label class="col-sm-3 col-form-label col_form_label">Order By<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input input="text" class="form-control form_control" name="pro_order" value="{{ old('pro_order') }}">
              @if ($errors->has('pro_order'))
                <span class="error">{{ $errors->first('pro_order') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{$errors->has('pro_remarks') ? ' has-error':''}}">
            <label class="col-sm-3 col-form-label col_form_label">Project Remarks<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input input="text" class="form-control form_control" name="pro_remarks" value="{{ old('pro_remarks') }}">
              @if ($errors->has('pro_remarks'))
                <span class="error">{{ $errors->first('pro_remarks') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{$errors->has('procate_name') ? ' has-error':''}}">
            <label class="col-sm-3 col-form-label col_form_label">Select Category<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              @php
                $allcat=App\Models\ProjectCategory::where('procate_status',1)->orderBy('procate_id','ASC')->get();
              @endphp
              <select class="form-control form_control" name="procate_id">
                <option disabled selected >Select Project Category</option>
                @foreach($allcat as $cate)
                <option value="{{$cate->procate_id}}">{{$cate->procate_name}}</option>
                @endforeach
              </select>
              @if ($errors->has('procate_name'))
                <span class="error">{{ $errors->first('procate_name') }}</span>
              @endif
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Project Image:</label>
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
