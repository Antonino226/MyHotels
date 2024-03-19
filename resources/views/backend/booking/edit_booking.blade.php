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
                        <h6 class="card-title">Edit Booking</h6>
                        <form id="myForm" method="POST" action="{{ route('update.booking') }}" class="forms-sample">
                            @csrf

                            <input type="hidden" name="id" value="{{ $booking->id }}">

                            <div class="form-group mb-3">
                                <label for="check_in_date" class="form-label">Check-in Date</label>
                                <div class="input-group flatpickr" id="flatpickr-date">
                                    <input type="date" name="check_in_date" class="form-control" placeholder="Select date" value="{{ $booking->check_in_date }}" data-input required>
                                    <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="check_out_date" class="form-label">Check-out Date</label>
                                <div class="input-group flatpickr" id="flatpickr-date">
                                    <input type="date" name="check_out_date" class="form-control" placeholder="Select date" value="{{ $booking->check_out_date }}" data-input required>
                                    <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="guests_number" class="form-label">Number of Guests</label>
                                <input type="number" name="guests_number" class="form-control" value="{{ $booking->guests_number }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="total_payment" class="form-label">Total Payment</label>
                                <input type="number" name="total_payment" class="form-control" value="{{ $booking->total_payment }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="confirmed" class="form-label">Confirmed</label>
                                <select name="confirmed" class="form-control" required>
                                    <option value="1" {{ $booking->confirmed == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ $booking->confirmed == 0 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary me-2" >Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- middle wrapper end -->
        <!-- right wrapper start -->

        <!-- right wrapper end -->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
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
                confirmed: {
                    required: true,
                },
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
            submitHandler: function (form) {
                form.submit();
            }
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

@endsection