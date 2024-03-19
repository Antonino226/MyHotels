@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                room_number: {
                    required : true,
                },
                room_type: {
                    required : true,
                },
                price_per_night: {
                    required : true,
                },
            },
            messages :{
                room_number: {
                    required : 'Please Enter Room Number',
                },
                room_type: {
                    required : 'Please Enter Room Type',
                },
                price_per_night: {
                    required : 'Please Enter Price Per Night',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
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
                        <h6 class="card-title">Edit Room</h6>
                            <form id="myForm" method="POST" action="{{ route('update.room') }}" class="forms-sample">
                            @csrf
                            
                            <input type="hidden" name="id" value="{{ $room->id }}">
                            <div class="form-group mb-3">
                                <label for="room_number" class="form-label">Room Number</label>
                                <input type="number" name="room_number" class="form-control" value="{{ $room->room_number }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="room_type" class="form-label">Room Type</label>
                                <input type="text" name="room_type" class="form-control" value="{{ $room->room_type }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="price_per_night" class="form-label">Price Per Night</label>
                                <input type="number" name="price_per_night" class="form-control" value="{{ $room->price_per_night }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="available" class="form-label">Available</label>
                                <input type="hidden" name="available" value="0"> <!-- Valore predefinito -->
                                <input type="checkbox" name="available" class="form-check-input" value="1" {{ $room->available ? 'checked' : '' }}> <!-- Checkbox -->
                            </div>
                                
                                <button type="submit" class="btn btn-primary me-2" >Save Changes</button>
                            </form>
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