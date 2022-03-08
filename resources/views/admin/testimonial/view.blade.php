@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
      <form>
        <div class="card">
          <div class="card-header card_header bg-dark">
            <div class="row">
              <div class="col-md-8 card_header_title">
                <i class="fab fa-gg-circle"></i>Testimonial Information</div>
              <div class="col-md-4 card_header_btn">
                <a href="{{url('dashboard/testimonial')}}" class="btn btn-sm btn-secondary chb_btn"><i class="fas fa-th"></i> All Testimonial</a>
              </div>
            </div>
          </div>
          <div class="card-body card_body">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <table class="table table-bordered table-striped table-hover custom_view_table">
                    <tr>
                      <td>Testimonial Name</td>
                      <td>:</td>
                      <td>{{ $data->test_name }}</td>
                    </tr>
                    <tr>
                      <td>Designation</td>
                      <td>:</td>
                      <td>{{ $data->test_designation }}</td>
                    </tr>
                    <tr>
                      <td>Company Name</td>
                      <td>:</td>
                      <td>{{ $data->test_company }}</td>
                    </tr>
                    <tr>
                        <td>Order By</td>
                        <td>:</td>
                        <td>{{ $data->test_order }}</td>
                      </tr>
                      <tr>
                        <td>Feedback</td>
                        <td>:</td>
                        <td>{{ $data->test_feedback }}</td>
                      </tr>

                      <tr>
                        <td>Image</td>
                        <td>:</td>
                        <td>
                        @if($data->test_image!='')
                            <img height="40" src="{{ asset('uploads/testimonials/'.$data->test_image) }}"/>
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
