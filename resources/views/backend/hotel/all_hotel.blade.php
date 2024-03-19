@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#selectAll').change(function() {
            if ($(this).is(':checked')) {
                $('.hotel-checkbox').prop('checked', true);
            } else {
                $('.hotel-checkbox').prop('checked', false);
            }
        });
    });
</script>

<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
            <a href="{{ route('add.hotel') }}" class="btn btn-inverse-info">Add Hotel</a>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Hotel All</h6>
                <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>
                <div class="table-responsive" style="overflow-x: clip;">
                  <table id="dataTableExample" class="table">
                      <thead>
                          <tr>
                              <th>
                                  <input type="checkbox" id="selectAll" class="form-check-input">
                              </th>
                              <th>Hotel Name</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($hotels as $key => $item)
                          <tr>
                              <td>
                                  <input type="checkbox" class="form-check-input hotel-checkbox" value="{{ $item->id }}">
                              </td>
                              <td>{{ $item->name }}</td>
                              <td>
                                  <a href="{{ route('info.hotel',$item->id) }}" class="btn btn-outline-info" id="info"><i data-feather="info"></i></a>
                                  <a href="{{ route('edit.hotel',$item->id) }}" class="btn btn-outline-warning"><i data-feather="edit"></i></a>
                                  <a href="{{ route('delete.hotel',$item->id) }}" class="btn btn-outline-danger" id="delete"><i data-feather="trash"></i></a>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
              </div>
            </div>
					</div>
				</div>

</div>

@endsection