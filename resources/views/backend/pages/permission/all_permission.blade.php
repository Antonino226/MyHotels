@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
            <a href="{{ route('add.permission') }}" class="btn btn-inverse-info">Add Permission</a>
            <a href="{{ route('import.permission') }}" class="btn btn-inverse-warning">Import</a>
            <a href="{{ route('export') }}" class="btn btn-inverse-danger">Export</a>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Permission All</h6>
                <div class="table-responsive" style="overflow-x: clip;">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Sl </th>
                        <th>Permission Name</th>
                        <th>Group Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($permissions as $key => $item)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->group_name }}</td>
                        <td><a href="{{ route('edit.permission',$item->id) }}" class="btn btn-outline-warning"><i data-feather="edit"></i></a>
                        <a href="{{ route('delete.permission',$item->id) }}" class="btn btn-outline-danger" id="delete"><i data-feather="trash"></i></a></td>
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