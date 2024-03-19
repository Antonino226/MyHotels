@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function (){

        $('#check_in_date').change(function() {
            // Ottieni il valore della data di check-in
            var checkInDate = new Date($(this).val());

            // Ottieni il valore della data di check-out
            var checkOutDate = new Date($('#check_out_date').val());

            // Se la data di check-out è precedente o uguale alla data di check-in, reimposta la data di check-out
            if (checkOutDate <= checkInDate) {
                $('#check_out_date').val('');
            }
        });

        $('#check_out_date').change(function() {
            // Ottieni il valore della data di check-out
            var checkOutDate = new Date($(this).val());

            // Ottieni il valore della data di check-in
            var checkInDate = new Date($('#check_in_date').val());

            // Se la data di check-out è precedente o uguale alla data di check-in, reimposta la data di check-out
            if (checkOutDate <= checkInDate) {
                $(this).val('');
            }
        });

        $('#myForm').validate({
            rules: {
                check_in_date: {
                    required: true,
                },
                check_out_date: {
                    required: true,
                },
                guests_number: {
                    required: true,
                    number: true,
                },
                total_payment: {
                    required: true,
                    number: true,
                },
                room_id: {
                    required: true,
                },
                user_id: {
                    required: true,
                },
                confirmed: {
                    required: true,
                }
            },
            messages: {
                check_in_date: {
                    required: 'Please Enter Check-in Date',
                },
                check_out_date: {
                    required: 'Please Enter Check-out Date',
                },
                guests_number: {
                    required: 'Please Enter Number of Guests',
                    number: 'Please Enter a Valid Number',
                },
                total_payment: {
                    required: 'Please Enter Total Payment',
                    number: 'Please Enter a Valid Number',
                },
                room_id: {
                    required: 'Please Select Room',
                },
                user_id: {
                    required: 'Please Select User',
                },
                confirmed: {
                    required: 'Please Confirm',
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
                        <h6 class="card-title">Add Booking</h6>
                            <form id="myForm" method="POST" action="{{ route('store.booking') }}" class="forms-sample">
                            @csrf

                                <div class="form-group mb-3">
                                    <label for="check_in_date" class="form-label">Check-in Date</label>
                                        <div class="input-group flatpickr" id="flatpickr-date">
                                            <input type="date" name="check_in_date" class="form-control" placeholder="Select date" data-input required>
                                            <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                                        </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="check_out_date" class="form-label">Check-out Date</label>
                                    <div class="input-group flatpickr" id="flatpickr-date">
                                            <input type="date" name="check_out_date" class="form-control" placeholder="Select date" data-input required>
                                            <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                                        </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="guests_number" class="form-label">Number of Guests</label>
                                    <input type="number" name="guests_number" class="form-control" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="total_payment" class="form-label">Total Payment</label>
                                    <input type="text" name="total_payment" class="form-control" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="confirmed" class="form-label">Confirmed</label>
                                    <select name="confirmed" class="form-control" required>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <table id="dataTableExample" class="table">
                                    <thead>
                                    <tr>
                                        <th>Sl </th>
                                        <th>Room number</th>
                                        <th>Room type</th>
                                        <th>Room price for night</th>
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
                                        <td>
                                            <input type="radio" name="room_id" class="form-check-input room-radio" value="{{ $item->id }}">
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <table id="dataTableExample" class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $key => $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <input type="radio" name="user_id" class="form-check-input user-radio" value="{{ $item->id }}">
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                                
                                </form>
                        </div>
                    </div>
              </div>
            </div>
          </div>
          
@endsection