@extends('layouts.master')
@section('title','Edit Profile')
@section('content')

<div class="mt-96 inner-profile-header bg-edit-buyer-profile  pb-3 ">
  <img class="logged-wave-img  position-absolute" src="{{ $user->profile_img }}" alt="" style="display:none;">
  
  <div class="header-big-avatar d-inline-flex mb-lg-0 mb-4">
    <img class="img-fluid rounded-circle image_prev" data-aos="zoom-in-up" src="{{ $user->profile_img }}" alt="" style="max-width:300px; height: 300px;">
      <div class="d-inline-flex avatar-upload-wrapper">
        <label for="imageUpload">
          <span class="p-3 bg-dark rounded-circle cursor-pointer">
            <i class="fas fa-pencil-alt text-white"></i>
          </span>
        </label>
        <input type="file" name="profile_pic" class="d-none" id="imageUpload" accept="image/*" />
      </div>
     
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
                  <h3 class="mb-0 fw-bold py-4 px-md-5 px-0">1/2</h3>
                </div>
              </div>
              <div class="card-body px-md-5 px-3">
                <form method="post" action="" enctype="multipart/form-data" id="edit_profile_form">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="d-flex justify-content-between flex-wrap align-items-center mb-5">
                        <div class="d-flex align-items-center mb-md-0 mb-5">
                          <h6 class="mb-0 text-18 font-500 me-3 text-mute-2">Edit Your Profile Image</h6>
                          <div class="bg-dark d-flex p-2 br-50">
                            <i class="fas fa-pen text-white text-8"></i>
                          </div>
                        </div>
                        <!-- image-upload z-test  -->
                        <div class="image-upload">
                          <img style="height: 80px; width: 80px" class=" mb-md-0 rounded-circle mb-4 image_prev" src="{{ $user->profile_img }}" alt="">
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="mb-4">
                        <label class="form-label">First Name</label>
                        <div class="custom-urban-form">
                          <input class="form-control" type="text" placeholder="First Name" name="first_name" value="{{ $user->first_name }}">
                          <i class="fas fa-pen"></i>
                        </div>
                        <span class="error">{{ $errors->first('first_name') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                        <div class="custom-urban-form">
                          <input class="form-control" type="text" placeholder="Last Name" name="last_name" value="{{ $user->last_name }}">
                          <i class="fas fa-pen"></i>
                        </div>
                        <span class="error">{{ $errors->first('last_name') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="mb-4">
                        <label class="form-label">Location</label>
                        <div class="custom-urban-form">
                          <input class="form-control" type="text" placeholder="Location" name="location" value="{{ $user->location }}">
                          <i class="fas fa-pen"></i>
                        </div>
                        <span class="error">{{ $errors->first('location') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="mb-4">
                        <label class="form-label">ISD Code</label>
                        <div class="custom-urban-form">
                          <input type="text" class="form-control"  placeholder="ISD Code" name="isd_code" value="{{ $user->isd_code }}">
                          <i class="fas fa-pen"></i>
                        </div>
                        <span class="error">{{ $errors->first('isd_code') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="mb-4">
                        <label class="form-label">Phone Number</label>
                        <div class="custom-urban-form">
                          <input type="text" class="form-control"  placeholder="Phone Number" name="phone_number" value="{{ $user->phone_number }}">
                          <span class="badge rounded-pill badge-primary-light text-dark py-2">Verify</span>
                        </div>
                        <span class="error">{{ $errors->first('phone_number') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="mb-4 ">
                        <label class="form-label ">Billing Address</label>
                        <div class="custom-urban-form">
                          <textarea class="form-control" placeholder="Billing Address" rows="5" name="billing_address">{{ $user->billing_address }}</textarea>
                          <i class="fas fa-pen textarea-icon"></i>
                        </div>
                        <span class="error">{{ $errors->first('billing_address') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="mb-4 ">
                        <label class="form-label">Update Bio</label>
                        <div class="custom-urban-form">
                          <textarea class="form-control" placeholder="Update Bio" rows="4" name="about">{{ $user->about }}</textarea>
                          <i class="fas fa-pen textarea-icon"></i>
                        </div>
                        <span class="error">{{ $errors->first('about') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-12">
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
                    </div>
                    <div class="col-lg-12">
                      <button type="submit" class="btn btn-dark px-5 py-3 rounded-pill">Next</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4 d-lg-block d-none">
            <img class="w-100 h-100"  src="{{ asset('assets/images/edit-seller-form-right.png') }}" alt="">
          </div>
      </div>
  </div>
</section>

@endsection
@section('scripts')

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

</script>

@stop