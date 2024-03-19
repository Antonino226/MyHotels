@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required: true,
                },
                address: {
                    required: true,
                },
                city: {
                    required: true,
                },
                country: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                stars: {
                    required: true,
                    number: true,
                    min: 1,
                    max: 5,
                },
                confirmed: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: 'Please Enter Hotel Name',
                },
                address: {
                    required: 'Please Enter Address',
                },
                city: {
                    required: 'Please Enter City',
                },
                country: {
                    required: 'Please Enter Country',
                },
                phone: {
                    required: 'Please Enter Phone Number',
                },
                email: {
                    required: 'Please Enter Email',
                    email: 'Please Enter Valid Email',
                },
                stars: {
                    required: 'Please Enter Number of Stars',
                    number: 'Please Enter Valid Number',
                    min: 'Please Enter a Value Greater Than or Equal to 1',
                    max: 'Please Enter a Value Less Than or Equal to 5',
                },
                confirmed: {
                    required: 'Please Confirm',
                },
            },
            errorElement: 'span', 
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });

        $('#myForm input').keyup(function () {
            if ($('#myForm').valid()) {
                $('#submitBtn').prop('disabled', false);
            } else {
                $('#submitBtn').prop('disabled', true);
            }
        });
    });
</script>

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
                            <form id="myForm" method="POST" action="{{ route('update.hotel') }}" class="forms-sample">
                            @csrf

                            <input type="hidden" name="id" value="{{ $hotel->id }}">
                              <div class="form-group mb-3">
                                  <label for="exampleInputUsername1" class="form-label">Hotel Name</label>
                                  <input type="text" name="name" class="form-control" value="{{ $hotel->name }}" required>
                              </div>

                              <div class="form-group mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" value="{{ $hotel->address }}" required>
                              </div>

                              <div class="form-group mb-3">
                                  <label for="city" class="form-label">City</label>
                                  <input type="text" name="city" class="form-control" value="{{ $hotel->city }}" required>
                              </div>

                              <div class="form-group mb-3">
                                  <label for="country" class="form-label">Country</label>
                                  <input type="text" name="country" class="form-control" value="{{ $hotel->country }}" required>
                              </div>

                              <div class="form-group mb-3">
                                  <label for="phone" class="form-label">Phone</label>
                                  <input type="text" name="phone" class="form-control" value="{{ $hotel->phone }}" required>
                              </div>

                              <div class="form-group mb-3">
                                  <label for="email" class="form-label">Email</label>
                                  <input type="email" name="email" class="form-control" value="{{ $hotel->email }}" required>
                              </div>

                              <div class="form-group mb-3">
                                  <label for="stars" class="form-label">Stars</label>
                                  <input type="number" name="stars" class="form-control" value="{{ $hotel->stars }}" min="1" max="5" required>
                              </div>

                              <div class="form-group mb-3">
                                  <label for="description" class="form-label">Description</label>
                                  <textarea name="description" class="form-control">{{ $hotel->description }}</textarea>
                              </div>
                                
                                <button type="submit" class="btn btn-primary me-2" >Save Changes</button>
                            </form>
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
