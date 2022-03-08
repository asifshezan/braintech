@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <form method="POST" action="{{url('dashboard/role/update')}}" enctype="multipart/form-data">
        @csrf
        <div class="card">
          <div class="card-header card_header bg-dark">
            <div class="row">
              <div class="col-md-8 card_header_title">
                <i class="fab fa-gg-circle"></i>Update Role Information</div>
              <div class="col-md-4 card_header_btn">
                <a href="{{url('dashboard/Role')}}" class="btn btn-sm btn-secondary chb_btn"><i class="fas fa-bars"></i> All Role</a>
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
            <div class="row mb-3 {{$errors->has('role_name') ? 'has-error':''}}">
              <label class="col-sm-3 col-form-label col_form_label">Role Name<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                  <input type="hidden" name="id" value="{{$data->role_id}}"/>
                <input type="text" class="form-control form_control" name="role_name" value="{{ $data->role_name }}">
                @if ($errors->has('role_name'))
                    <span class="error">{{ $errors->first('role_name') }}</span>
                @endif
              </div>
            </div>

          <div class="card-footer card_footer bg-dark text-center">
            <button class="btn btn-secondary" type="submit">UPDATE</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-1"></div>
  </div>
@endsection
