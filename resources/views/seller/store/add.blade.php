@extends('layouts.master')
@section('title','Edit Store')
@section('content')


  <!-- featured-select  -->
<section class="bg-edit-buyer-profile mt-96">
  <div class="container">
      <div class="row">
          <div class="col-lg-8">
            <div class="card br-24 border-0 shadow h-100">
              <div class="card-header bg-transparent py-4">
                <div class="d-flex flex-wrap justify-content-between">
                  <h3 class="mb-0 fw-bold py-4 px-md-5 px-0">Update Store Detail</h3>
                  <!-- <h3 class="mb-0 fw-bold py-4 px-md-5 px-0">1/2</h3> -->
                </div>
              </div>
              <div class="card-body px-md-5 px-3">
                <form method="post" action="{{ route('sellerStore') }}" enctype="multipart/form-data" id="seller_store">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="d-flex justify-content-between flex-wrap align-items-center mb-5">
                        <label for="imageUpload" class="cursor-pointer">
                          <div class="d-flex align-items-center mb-md-0 mb-5">
                            <h6 class="mb-0 text-18 font-500 me-3 text-mute-2">Edit Store Image</h6>
                            <div class="bg-dark d-flex p-2 br-50">
                              <i class="fas fa-pen text-white text-8"></i>
                            </div>
                          </div>
                        </label>
                        
                        <!-- image-upload z-test  -->
                        <label for="imageUpload" class="cursor-pointer">
                          <div class="image-upload">
                            <img style="height: 80px; width: 80px" class=" mb-md-0 rounded-circle mb-4 image_prev" src="{{ !empty(@$store->picture) ? asset(@$store->picture) : asset('assets/images/default.png') }}" alt="">
                            <input type="file" name="profile_pic" class="d-none" id="imageUpload" accept="image/*" />
                          </div>
                        </label>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="mb-4">
                        <label class="form-label">Name</label>
                        <div class="custom-urban-form">
                          <input class="form-control" type="text" placeholder="First Name" name="name" value="{{ @$store->name }}">
                          <i class="fas fa-pen"></i>
                        </div>
                        <span class="error">{{ $errors->first('name') }}</span>
                      </div>
                    </div>
        
                    <div class="col-lg-12">
                      <div class="mb-4">
                        <label class="form-label">Phone Number</label>
                        <div class="custom-urban-form">
                          <input type="text" class="form-control"  placeholder="Phone Number" name="phone_number" value="{{ @$store->phone_number }}">
                          <!-- <span class="badge rounded-pill badge-primary-light text-dark py-2">Verify</span> -->
                        </div>
                        <span class="error">{{ $errors->first('phone_number') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="mb-4 ">
                        <label class="form-label ">Address</label>
                        <div class="custom-urban-form">
                          <textarea class="form-control" placeholder="Address" rows="5" name="address">{{ @$store->address }}</textarea>
                          <i class="fas fa-pen textarea-icon"></i>
                        </div>
                        <span class="error">{{ $errors->first('address') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="mb-4 ">
                        <label class="form-label">Description</label>
                        <div class="custom-urban-form">
                          <textarea class="form-control" placeholder="Description" rows="4" name="description">{{ @$store->description }}</textarea>
                          <i class="fas fa-pen textarea-icon"></i>
                        </div>
                        <span class="error">{{ $errors->first('description') }}</span>
                      </div>
                    </div>
                    
                    <div class="col-lg-12">
                      <button type="submit" class="btn btn-dark px-5 py-3 rounded-pill">Save</button>
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