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

            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add Hotel</h6>
                            <form id="myForm" method="POST" action="{{ route('store.hotel') }}" class="forms-sample">
                            @csrf

                            <div class="form-group mb-3">
                                  <label for="exampleInputUsername1" class="form-label">Hotel Name</label>
                                  <input type="text" name="name" class="form-control" required>
                              </div>

                              <div class="form-group mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" required>
                              </div>

                              <div class="form-group mb-3">
                                  <label for="city" class="form-label">City</label>
                                  <input type="text" name="city" class="form-control" required>
                              </div>

                              <div class="form-group mb-3">
                                  <label for="country" class="form-label">Country</label>
                                  <input type="text" name="country" class="form-control" required>
                              </div>

                              <div class="form-group mb-3">
                                  <label for="phone" class="form-label">Phone</label>
                                  <input type="text" name="phone" class="form-control" required>
                              </div>

                              <div class="form-group mb-3">
                                  <label for="email" class="form-label">Email</label>
                                  <input type="email" name="email" class="form-control" required>
                              </div>

                              <div class="form-group mb-3">
                                  <label for="stars" class="form-label">Stars</label>
                                  <input type="number" name="stars" class="form-control" min="1" max="5" required>
                              </div>

                              <div class="form-group mb-3">
                                  <label for="description" class="form-label">Description</label>
                                  <textarea name="description" class="form-control"></textarea>
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
@endsection