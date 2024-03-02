@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

<div class="page-content">

    <nav class="page-breadcrumb" >
        <ol class="breadcrumb">
            <a href="{{ route('add.admin') }}" class="btn btn-inverse-info" >
            Add Admin</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin strecth-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Admin All</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thread>
                                <tr>
                                    <th>Sl </th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Emain</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thread>
                            <tbody>
                            @foreach($alladmin as $key =>$item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><img src="{{ (!empty($item->photo)) ? url('upload/admin_images/'.$item->photo) 
                                    : url('upload/no_image.jpg') }}" style="width:70px; height:40px;">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td> 
                                    @foreach($item->roles as $role)
                                    <span class="badge badge-pill bg-danger">{{ $role->name }}</span>
                                    @endforeach
                                    </td>

                                        <td><a href="{{ route('edit.admin',$item->id) }}" class="btn btn-outline-warning">Edit</a>
                                            <a href="{{ route('delete.admin',$item->id) }}" class="btn btn-outline-danger" id="delete" >Delete</a></td>
                                        </tr>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>          
    </div>
          <!-- middle wrapper end -->
          <!-- right wrapper start -->
          
          <!-- right wrapper end -->
        </div>
	</div>
@endsection