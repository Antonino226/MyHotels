@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">

        <div class="row profile-body">
          <!-- left wrapper start -->

          <!-- left wrapper end -->
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Hotel</h6>
                            <input type="hidden" name="id" value="{{ $hotel->id }}">
                              <div class="form-group mb-3">
                                  <label for="exampleInputUsername1" class="form-label">Hotel Name</label>
                                  <input type="text" name="name" class="form-control" value="{{ $hotel->name }}" readonly>
                              </div>

                              <div class="form-group mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" value="{{ $hotel->address }}" readonly>
                              </div>

                              <div class="form-group mb-3">
                                  <label for="city" class="form-label">City</label>
                                  <input type="text" name="city" class="form-control" value="{{ $hotel->city }}" readonly>
                              </div>

                              <div class="form-group mb-3">
                                  <label for="country" class="form-label">Country</label>
                                  <input type="text" name="country" class="form-control" value="{{ $hotel->country }}" readonly>
                              </div>

                              <div class="form-group mb-3">
                                  <label for="phone" class="form-label">Phone</label>
                                  <input type="text" name="phone" class="form-control" value="{{ $hotel->phone }}" readonly>
                              </div>

                              <div class="form-group mb-3">
                                  <label for="email" class="form-label">Email</label>
                                  <input type="email" name="email" class="form-control" value="{{ $hotel->email }}" readonly>
                              </div>

                              <div class="form-group mb-3">
                                  <label for="stars" class="form-label">Stars</label>
                                  <input type="number" name="stars" class="form-control" value="{{ $hotel->stars }}" min="1" max="5" readonly>
                              </div>

                              <div class="form-group mb-3">
                                  <label for="description" class="form-label">Description</label>
                                  <textarea name="description" class="form-control" readonly>{{ $hotel->description }}</textarea>
                              </div>
                                
                                <button type="submit" class="btn btn-primary me-2" >Save Changes</button>
                        </div>
                    </div>
                    
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">All Rooms</h6>
                <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>
                <div class="table-responsive" style="overflow-x: clip;">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Sl </th>
                        <th>Room Name</th>
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
          <!-- middle wrapper end -->
          <!-- right wrapper start -->
          
          <!-- right wrapper end -->
        </div>
	</div>
@endsection
