@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
      <form>
        <div class="card">
          <div class="card-header card_header bg-dark">
            <div class="row">
              <div class="col-md-8 card_header_title">
                <i class="fab fa-gg-circle"></i>All Banner Information</div>
              <div class="col-md-4 card_header_btn">
                <a href="{{url('dashboard/banner')}}" class="btn btn-sm btn-secondary chb_btn"><i class="fas fa-th"></i> All Banner</a>
              </div>
            </div>
          </div>
          <div class="card-body card_body">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <table class="table table-bordered table-striped table-hover custom_view_table">
                    <tr>
                      <td>Banner Title</td>
                      <td>:</td>
                      <td>{{ $data->ban_title }}</td>
                    </tr>
                    <tr>
                      <td>Banner Subtitle</td>
                      <td>:</td>
                      <td>{{ $data->ban_subtitle }}</td>
                    </tr>
                    <tr>
                      <td>Banner Button</td>
                      <td>:</td>
                      <td>{{ $data->ban_button }}</td>
                    </tr>
                    <tr>
                        <td>Banner URL</td>
                        <td>:</td>
                        <td>{{ $data->ban_url }}</td>
                    </tr>
                    <tr>
                        <td>Banner Order</td>
                        <td>:</td>
                        <td>{{ $data->ban_order }}</td>
                      </tr>
                      <tr>
                        <td>Banner Image</td>
                        <td>:</td>
                        <td>
                        @if($data->ban_image!='')
                            <img height="40" src="{{ asset('uploads/banners/'.$data->ban_image) }}"/>
                        @else
                        <img src="{{asset('uploads/avatar.png')}}" height="60">
                        @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Created At</td>
                        <td>:</td>
                        <td>{{ $data->created_at->format('d-m-Y | h:i:s A') }}</td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-2"></div>
              </div>
          </div>
          <div class="card-footer card_footer bg-dark text-left">
            <a href="#" class="btn btn-sm btn-success">Print</a>
            <a href="#" class="btn btn-sm btn-secondary">PDF</a>
            <a href="#" class="btn btn-sm btn-primary">Excel</a>
            <a href="#" class="btn btn-sm btn-warning">CSV</a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
