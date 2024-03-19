@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
            <a href="{{ route('add.roles') }}" class="btn btn-inverse-info">Add roles</a>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">All Roles Permission</h6>
                <div class="table-responsive" style="overflow-x: clip;">
                  <table  class="table">
                    <thead>
                      <tr>
                        <th>Sl </th>
                        <th>Roles Name</th>
                        <th>Permission</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($roles as $key => $item)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->name }}</td>

                        <td>
                            @foreach($item->permissions as $prem)
                            <span class="badge bg-danger">{{ $prem->name }}</span>
                            @endforeach
                        </td>

                        <td><a href="{{ route('admin.edit.roles',$item->id) }}" class="btn btn-outline-warning"><i data-feather="edit"></i></a>
                        <a href="{{ route('admin.roles.delete',$item->id) }}" class="btn btn-outline-danger" id="delete"><i data-feather="trash"></i></a></td>
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