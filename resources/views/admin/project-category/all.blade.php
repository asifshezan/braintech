@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <form>
      <div class="card">
        <div class="card-header card_header bg-dark">
          <div class="row">
            <div class="col-md-8 card_header_title">
              <i class="fab fa-gg-circle"></i>All Project Categories</div>
            <div class="col-md-4 card_header_btn">
              <a class="btn btn-sm btn-secondary chb_btn" href="{{ url('dashboard/project-category/add') }}"><i class="fas fa-plus-circle"></i> Add Category</a>
            </div>
          </div>
        </div>
        <div class="card-body card_body">
          <div class="row">
            <div class="col-md-12">
              <table id="allDataTable" class="table table-bordered table-striped table-hover custom_table">
                <thead class="table-dark">
                  <tr>
                    <th>Category Name</th>
                    <th>Status</th>
                    <th>Order By</th>
                    <th>Manage</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($cat as $data)
                  <tr>
                    <td>{{ $data->procate_name }}</td>
                    <td>
                        @if ($data->procate_status === 1)
                        <span class="badge rounded-pill bg-success">Active</span>
                        @else
                        <span class="badge rounded-pill bg-warning text-dark">Warning</span>
                        @endif
                    </td>
                    <td>{{ $data->procate_order }}</td>
                    <td>
                      <div class="btn-group">
  					<button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</button>
                        <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ url('dashboard/project-category/view/'.$data->procate_slug) }}">View</a>
                                <a class="dropdown-item" href="{{ url('dashboard/project-category/edit/'.$data->procate_slug) }}">Edit</a>
                                <a class="dropdown-item" href="#" id="delete" data-bs-toggle="modal" data-bs-target="#softDeleteModal" data-id="{{$data->procate_id}}">Delete</a>
                        </div>
                    </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="card-footer card_footer bg-dark">
          <a href="#" class="btn btn-sm btn-success">Print</a>
          <a href="#" class="btn btn-sm btn-secondary">PDF</a>
          <a href="#" class="btn btn-sm btn-primary">Excel</a>
          <a href="#" class="btn btn-sm btn-warning">CSV</a>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="modal fade" id="softDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="{{url('dashboard/project-category/softdelete')}}">
      @csrf
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id=""><i class="fab fa-gg-circle"></i> Confirm Message</h5>
      </div>
      <div class="modal-body modal_body">
        Are you want to sure delete data?
        <input type="hidden" name="modal_id" id="modal_id">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-dark">Confirm</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
    </form>
  </div>
</div>
@endsection
