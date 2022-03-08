@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <form method="POST" action="{{url('dashboard/user/update')}}" enctype="multipart/form-data">
        @csrf
        <div class="card">
          <div class="card-header card_header bg-dark">
            <div class="row">
              <div class="col-md-8 card_header_title">
                <i class="uil-align-justify"></i>Update User Information</div>
              <div class="col-md-4 card_header_btn">
                <a href="{{url('dashboard/user')}}" class="btn btn-sm btn-secondary chb_btn"><i class="uil-plus-circle"></i> All User</a>
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
            <div class="row mb-3 {{$errors->has('name') ? 'has-error':''}}">
              <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                  <input type="hidden" name="id" value="{{$data->id}}"/>
                <input type="text" class="form-control form_control" name="name" value="{{ $data->name }}">
                @if ($errors->has('name'))
                    <span class="error">{{ $errors->first('name') }}</span>
                @endif
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" name="phone" value="{{ $data->phone }}">
              </div>
            </div>
            <div class="row mb-3 {{$errors->has('email') ? 'has-error':''}}">
              <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="email" class="form-control form_control" name="email" value="{{ $data->email }}">
                @if ($errors->has('email'))
                    <span class="error">{{ $errors->first('email') }} </span>
                @endif
            </div>
            </div>
            <div class="row mb-3 {{ $errors->has('role') ? 'has-error':''}}">
              <label class="col-sm-3 col-form-label col_form_label">User Role<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                  @php
                      $allRole=App\Models\Role::where('role_status',1)->orderBy('role_id','ASC')->get();
                  @endphp
               <select class="form-control form_control" name="role">
                <option value="">Select User Role</option>
                @foreach ($allRole as $urole)
                    <option value="{{$urole->role_id}}" @if ($data->role==$urole->role_id)
                        selected
                    @endif>{{$urole->role_name}}</option>
                @endforeach
               </select>
               @if ($errors->has('role'))
                    <span class="error"> {{ $errors->first('role') }} </span>
                @endif
              </div>
            </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
                <div class="col-sm-4">
                  <input type="file" name="pic">
                </div>
                <div class="col-md-2">
                    @if ($data->photo!='')
                        <img src="{{asset('uploads/users/.$data->photo')}}" height="60">
                    @else
                        <img src="{{asset('uploads/avatar.png')}}" height="60">
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
    <div class="col-md-1"></div>
  </div>
@endsection
