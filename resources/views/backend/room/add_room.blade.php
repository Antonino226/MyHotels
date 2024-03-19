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
                hotel_id: {
                    required : true,
                },             
            },
            messages :{
                name: {
                    required : 'Please Enter Room Name',
                },
                room_type: {
                    required : 'Please Enter Room Type',
                },
                price_per_night: {
                    required : 'Please Enter Price Per Night',
                },
                hotel_id: {
                    required : 'Please Select Hotel',
                },   
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
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
    });
    
</script>

<div class="page-content">

            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add Room</h6>
                            <form id="myForm" method="POST" action="{{ route('store.room') }}" class="forms-sample">
                            @csrf

                                <div class="form-group mb-3">
                                    <label for="room_number" class="form-label">Room Number</label>
                                    <input type="number" name="room_number" class="form-control">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="room_type" class="form-label">Room Type</label>
                                    <input type="text" name="room_type" class="form-control">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="price_per_night" class="form-label">Price Per Night</label>
                                    <input type="number" name="price_per_night" class="form-control">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="available" class="form-label">Available</label>
                                    <input type="checkbox" name="available" class="form-check-input">
                                </div>
                                
                            <div class="table-responsive" style="overflow-x: clip;">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                        <tr>
                                            <th>Hotel name</th>
                                            <th>Hotel city</th>
                                            <th>Hotel address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($hotels as $key => $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->city }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>
                                                <input type="radio" name="hotel_id" class="form-check-input user-radio" value="{{ $item->id }}">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                            </form>

                        </div>
                    </div>
              </div>
            </div>
          </div>
@endsection