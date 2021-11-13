@extends('layouts.buyer')
@section('title','Edit Profile')
@section('content')

<div class="mt-96 inner-profile-header bg-edit-buyer-profile  pb-3 ">
  <img class="logged-wave-img position-absolute" src="{{ asset('assets/images/wave-primary.png') }}" alt="">
  <img class="logged-wave-img position-absolute" src="{{ $user->profile_img }}" alt="" style="display:none;">
  <div class="header-big-avatar d-inline-flex mb-lg-0 mb-4">
      <img class="rounded-circle" data-aos="zoom-in-up" src="{{ $user->profile_img }}" alt="" style="max-width:300px; height: 300px;">
  </div>
  
  <div class="inner-profile-header-content --ver-2">
      <h1 class="display-5 f-600 me-3">{{ $user->full_name }}</h1>

      @if(!empty($user->about))
        <h6 class="f-600 mb-2">Bio : {{ $user->about }}</h6>
      @endif

      <div class="small-line mb-2"></div>
      <p class="text-15 f-600">Member Since - {{ date('d M, Y', strtotime($user->created_at)) }}</p>
  </div>
</div>
  <!-- featured-select  -->
<section class="bg-edit-buyer-profile">
  <div class="container">
      <div class="row">
          <div class="col-lg-8">
            <div class="card br-24 border-0 shadow h-100">
              <div class="card-header bg-transparent py-4">
                <div class="d-flex flex-wrap justify-content-between">
                  <h3 class="mb-0 fw-bold py-4 px-md-5 px-0">Edit Profile</h3>
                </div>
              </div>
              <div class="card-body px-md-5 px-3">
                <form method="post" action="" enctype="multipart/form-data" id="edit_profile_form">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="d-flex justify-content-between flex-wrap align-items-center mb-5">
                        <label for="imageUpload" class="d-flex align-items-center mb-md-0 mb-5 cursor-pointer">
                          
                            <h6 class="mb-0 text-18 font-500 me-3 text-mute-2">Edit Your Profile Image</h6>
                            <div class="bg-dark d-flex p-2 br-50">
                              <i class="fas fa-pen text-white text-8"></i>
                            </div>
                
                        </label>
                        <label for="imageUpload">
                          <img class="avatar-80 rounded-circle cursor-pointer mb-md-0 mb-4 image_prev" src="{{ $user->profile_img }}" alt="">
                          <input type="file" class="d-none" name="profile_pic" id="imageUpload" accept="image/*"/>
                        </label>
                        
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="mb-4">
                        <label class="form-label">First Name</label>
                        <div class="custom-urban-form">
                          <input class="form-control" type="text" placeholder="First Name" name="first_name" value="{{ $user->first_name }}" id="first_name">
                          <i class="fas fa-pen"></i>
                        </div>
                        <span class="error">{{ $errors->first('first_name') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                        <div class="custom-urban-form">
                          <input class="form-control" type="text" placeholder="Last Name" name="last_name" value="{{ $user->last_name }}" id="last_name">
                          <i class="fas fa-pen"></i>
                        </div>
                        <span class="error">{{ $errors->first('last_name') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="mb-4">
                        <label class="form-label">Location</label>
                        <div class="custom-urban-form">
                          <input class="form-control" type="text" placeholder="Location" name="location" value="{{ $user->location }}" id="location">
                          <i class="fas fa-pen"></i>
                        </div>
                        <span class="error">{{ $errors->first('location') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="mb-4">
                        <label class="form-label">ISD Code</label>
                        <div class="custom-urban-form">
                          <input type="text" class="form-control"  placeholder="ISD Code" name="isd_code" value="{{ $user->isd_code }}" id="isd_code">
                          <i class="fas fa-pen"></i>
                        </div>
                        <span class="error">{{ $errors->first('isd_code') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="mb-4">
                        <label class="form-label">Phone Number</label>
                        <div class="custom-urban-form">
                          <input type="text" class="form-control"  placeholder="Phone Number" name="phone_number" value="{{ $user->phone_number }}" id="phone_number">
                          <span class="badge rounded-pill badge-primary-light text-dark py-2">Verify</span>
                        </div>
                        <span class="error">{{ $errors->first('phone_number') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="mb-4 ">
                        <label class="form-label ">Billing Address</label>
                        <div class="custom-urban-form">
                          <textarea class="form-control" placeholder="Billing Address" rows="5" name="billing_address" id="billing_address">{{ $user->billing_address }}</textarea>
                          <i class="fas fa-pen textarea-icon"></i>
                        </div>
                        <span class="error">{{ $errors->first('billing_address') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="mb-4 ">
                        <label class="form-label">Update Bio</label>
                        <div class="custom-urban-form">
                          <textarea class="form-control" placeholder="Update Bio" rows="4" name="about" id="about">{{ $user->about }}</textarea>
                          <i class="fas fa-pen textarea-icon"></i>
                        </div>
                        <span class="error">{{ $errors->first('about') }}</span>
                      </div>
                    </div>
                    <!-- <div class="col-lg-12">
                      <div class="mb-4">
                        <div class="d-flex align-items-center mb-2">
                          <p class="mb-0 me-2">Payment Method</p>
                          <a href="#">
                            <img src="{{ asset('assets/images/icon/plus-circle.png') }}" alt="">
                          </a>
                        </div>
                        <div class="input-group custom-urban-form mb-3">
                          <span class="input-group-text urban-group-text  bg-transparent" id="basic-addon1">
                            <img class="img-fluid" src="{{ asset('assets/images/visa-2.png') }}" alt="">
                          </span>
                          <input type="text" class="form-control input-group-urban-focus" placeholder="****  ****  ****  4536" aria-label="Username" aria-describedby="basic-addon1">
                          <i class="fas fa-pen "></i>
                        </div>
                      </div>
                    </div> -->
                    <div class="col-lg-12">
                      <button type="submit" class="btn btn-dark px-5 py-3 rounded-pill update_buyer_profile" >Save Changes</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4 d-lg-block d-none">
            <img class="w-100 h-100"  src="{{ asset('assets/images/form-right-img.png') }}" alt="">
          </div>
      </div>
  </div>
</section>

@endsection
@section('scripts')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
</script>

<script>
  function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('.image_prev').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#imageUpload").change(function() {

    var filepath = this.value;
    var m = filepath.match(/([^\/\\]+)$/);
    var filename = m[1];

    if(filename != '' && filename != null)
    {
      var img_arr = filename.split('.');
      var ext = img_arr.pop();
      ext = ext.toLowerCase();

      if(ext == 'jpeg' || ext == 'jpg' || ext == 'png')
      {
        readURL(this);
      }else{
        $(this).val('');
        alert("Please select .png, .jpg or .jpeg file");
      }
    }
	});

  $("#edit_profile_form").validate({ 
    errorElement: 'span',
    rules: {
      email: {
        required:true,
        email: true,
        emailfull: true
      },
      password:{
        required:true,
        minlength:8
      },
      confirm_password:{
        required:true,
        minlength:8,
        equalTo: '#password'
      },
      first_name:{
        required:true
      },
      last_name:{
        required:true
      },
      location:{
        required:true
      },
      gender:{
        required:true
      },
      isd_code:{
        required:true,
        digits: true,
        minlength:1,
        maxlength:3
      },
      phone_number:{
        required:true,
        digits: true,
        minlength:10,
        maxlength:10
      },
      billing_address:{
        required: true,
        maxlength:200
      },
      about:{
        required: true,
        maxlength:200
      }
    },
      messages: {
      confirm_password:{
        equalTo: 'Password and Re-enter password should be same'
      },
      },
      submitHandler: function(form, event) {
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var location = $('#location').val();
        var isd_code = $('#isd_code').val();
        var phone_number = $('#phone_number').val();
        var billing_address = $('#billing_address').val();
        var about = $('#about').val();
        
        var success_msg = 'Profile Updated Successfully';
        var cancel_msg = 'Something went wrong';

        var body = 'Are you sure to change update?';
        var url  = '/buyer/edit-profile';

        swal({
            // title: title,
            text: body,
            icon: '',
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: base_url + url,
                        data: $(form).serialize(),
                        success: function (response) {
                                swal(success_msg, {
                                    icon: "success",
                                });

                                // setTimeout(function () {
                                //     window.location.reload();
                                // }, 2000);
                        }
                    });
                } else {
                    swal(cancel_msg);
                }
            });
        }
  });

</script>

@stop