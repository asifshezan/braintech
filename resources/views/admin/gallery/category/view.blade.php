@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
      <form>
        <div class="card">
          <div class="card-header card_header bg-dark">
            <div class="row">
              <div class="col-md-8 card_header_title">
                <i class="fab fa-gg-circle"></i>Category Information</div>
              <div class="col-md-4 card_header_btn">
                <a href="{{url('dashboard/gallery-category')}}" class="btn btn-sm btn-secondary chb_btn"><i class="fas fa-th"></i> All Category</a>
              </div>
            </div>
          </div>
          <div class="card-body card_body">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <table class="table table-bordered table-striped table-hover custom_view_table">
                    <tr>
                      <td>Category Name</td>
                      <td>:</td>
                      <td>{{ $data->galcate_name }}</td>
                    </tr>
                    <tr>
                        <td>Category Remark</td>
                        <td>:</td>
                        <td>{{ $data->galcate_remarks }}</td>
                      </tr>
                    <tr>
                      <td>Category Order</td>
                      <td>:</td>
                      <td>{{ $data->galcate_order }}</td>
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
