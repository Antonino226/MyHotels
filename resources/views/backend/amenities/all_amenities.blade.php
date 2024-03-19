@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
            <a href="{{ route('add.amenitie') }}" class="btn btn-inverse-info">Add Amenities</a>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Amenities All</h6>
                <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>
                <div class="table-responsive" style="overflow-x: clip;">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Sl </th>
                        <th>Amenities Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($amenities as $key => $item)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->amenitis_name }}</td>
                        <td><a href="{{ route('edit.amenitie',$item->id) }}" class="btn btn-outline-warning"><i data-feather="edit"></i></a>
                        <a href="{{ route('delete.amenitie',$item->id) }}" class="btn btn-outline-danger" id="delete"><i data-feather="trash"></i></a></td>
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