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
                <div class="col-12 col-xl-12 stretch-card">
                    <div class="row flex-grow-1">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Edit Booking</h6>
                                    <div class="form-group mb-3">
                                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Check-in Date</label>
                                        <input type="date" name="check_in_date" class="form-control" value="{{ $booking->check_in_date }}" readonly>
                                    </div>  

                                    <div class="form-group mb-3">
                                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Check-out Date</label>
                                        <input type="date" name="check_out_date" class="form-control" value="{{ $booking->check_out_date }}" readonly>
                                    </div>  

                                    <div class="form-group mb-3">
                                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Guests Number</label>
                                        <input type="number" name="guests_number" class="form-control" value="{{ $booking->guests_number }}" readonly>
                                    </div>  

                                    <div class="form-group mb-3">
                                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Total Payment</label>
                                        <input type="text" name="total_payment" class="form-control" value="{{ $booking->total_payment }}" readonly>
                                    </div>  

                                    <div class="form-group mb-3">
                                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Confirmed</label>
                                        <input type="checkbox" name="confirmed" class="form-check-input" {{ $booking->confirmed ? 'checked' : '' }} disabled>
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Room</h6>
                                    <div class="form-group mb-3">
                                        <label for="room_number" class="form-label">Room Number</label>
                                        <p class="text-muted">{{ $room->room_number }}</p>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="room_type" class="form-label">Room Type</label>
                                        <p class="text-muted">{{ $room->room_type }}</p>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="price_per_night" class="form-label">Price Per Night</label>
                                        <p class="text-muted">{{ $room->price_per_night }}</p>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="available" class="form-label">Available </label>
                                        <input type="checkbox" class="form-check-input" id="checkChecked" {{ $room->available ? 'checked' : '' }} disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">User</h6>
                                                <div class="mt-3">
                                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                                                    <p class="text-muted">{{ $user->name }}</p>
                                                </div>
                                                <div class="mt-3">
                                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Username:</label>
                                                    <p class="text-muted">{{ $user->username }}</p>
                                                </div>
                                                <div class="mt-3">
                                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                                                    <p class="text-muted">{{ $user->email }}</p>
                                                </div>
                                                <div class="mt-3">
                                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                                                    <p class="text-muted">{{ $user->phone }}</p>
                                                </div>
                                                <div class="mt-3">
                                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                                                    <p class="text-muted">{{ $user->address }}</p>
                                                </div>
                                                <div class="mt-3">
                                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Role:</label>
                                                    <p class="text-muted">{{ $user->role }}</p>
                                                </div>
                                        </div>
                            </div>
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