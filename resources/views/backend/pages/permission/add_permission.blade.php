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
                        <h6 class="card-title">Add Permission</h6>
                            <form id="myForm" method="POST" action="{{ route('store.permission') }}" class="forms-sample">
                            @csrf

                                <div class="form-group mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Permission Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Group Name</label>
                                    <select name="group_name" class="form-select" id="exampleFormControlSelect1">
                                        <option value="hotel">Hotel</option>
                                        <option value="room">Room</option>
                                        <option value="booking">Booking</option>
                                        <option value="property_type">Property Type</option>
                                        <option value="amenities">Amenities</option>
                                        <option value="property">Property</option>
                                        <option value="package_history">Package History</option>
                                        <option value="property_message">Property Message</option>
                                        <option value="testimonials">Testimonials</option>
                                        <option value="manage_agent">Manage Agent</option>
                                        <option value="blog_category">Blog Category</option>
                                        <option value="blog_post">Blog Post</option>
                                        <option value="blog_comment">Blog Comment</option>
                                        <option value="smtp_setting">SMTP Setting</option>
                                        <option value="site_setting">Site Setting</option>
                                        <option value="role_permission">Role & Permission</option>
                                    </select>
                                </div>
                                
                                <button type="submit" class="btn btn-primary me-2">Save Changes</button>
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

  <script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                },                
            },
            messages :{
                name: {
                    required : 'Please Enter Permission Name',
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

@endsection