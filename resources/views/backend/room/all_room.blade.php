@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
            <a href="{{ route('add.room') }}" class="btn btn-inverse-info">Add Rooms</a>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Rooms All</h6>
                <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>
                <div class="table-responsive" style="overflow-x: clip;">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Sl </th>
                        <td>Room number</td>
                        <td>Room type</td>
                        <td>Room price for night</td>
                        <td>Hotel name</td>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($rooms as $key => $item)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->room_number }}</td>
                        <td>{{ $item->room_type }}</td>
                        <td>{{ $item->price_per_night }}</td>
                        <td>{{ $item->getHotelNameAttribute() }}</td>
                        <td><a href="{{ route('edit.room',$item->id) }}" class="btn btn-outline-warning"><i data-feather="edit"></i></a>
                        <a href="{{ route('delete.room',$item->id) }}" class="btn btn-outline-danger" id="delete"><i data-feather="trash"></i></a></td>
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