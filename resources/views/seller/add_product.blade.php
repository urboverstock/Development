@extends('layouts.master')
@if(isset($product))
  @section('title','Edit Product')
@else
  @section('title','Add Product')
@endif
@section('content')

<section class="bg-edit-buyer-profile">
  <div class="container">
      <div class="row">
          <div class="col-lg-8">
            <div class="card br-24 border-0 shadow h-100">
              <div class="card-header bg-transparent py-4">
                <div class="d-flex flex-wrap justify-content-between">
                  
                  @if(isset($product))
                    <h3 class="mb-0 fw-bold py-4 px-md-5 px-0">Edit Product</h3>
                  @else
                    <h3 class="mb-0 fw-bold py-4 px-md-5 px-0">Add Product</h3>
                  @endif
                </div>
              </div>
              <div class="card-body px-md-5 px-3">
                <form method="post" action="" enctype="multipart/form-data" id="add_product_form">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="d-flex justify-content-between flex-wrap align-items-center mb-5">
                        <div class="d-flex align-items-center mb-md-0 mb-5">
                          <h6 class="mb-0 text-18 font-500 me-3 text-mute-2">Edit Image</h6>
                          <div class="bg-dark d-flex p-2 br-50">
                            <i class="fas fa-pen text-white text-8"></i>
                          </div>
                        </div>
                        <img class="avatar-80 mb-md-0 mb-4 image_prev" src="{{ !empty(@$product['product_image']['file_path']) ? $product['product_image']['file_path'] : asset('assets/images/default.png') }}" alt="">
                        <input type="file" name="image" id="imageUpload" accept="image/*"/>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="mb-4">
                        <label class="form-label">Name</label>
                        <div class="custom-urban-form">
                          <input class="form-control" type="text" placeholder="Name" name="name" value="{{ @$product->name }}">
                          <i class="fas fa-pen"></i>
                        </div>
                        <span class="name-error">{{ $errors->first('name') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="mb-4">
                        <label class="form-label">Price</label>
                        <div class="custom-urban-form">
                          <input class="form-control" type="text" placeholder="Price" name="price" value="{{ @$product->price }}">
                          <i class="fas fa-pen"></i>
                        </div>
                        <span class="price-error">{{ $errors->first('price') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                        <select class="form-select mb-4 py-3 form-select-lg mb-3" aria-label=".form-select-lg example" name="gender">
                            <option value="">Select Gender</option>
                            <option value="M" <?php if(@$product->gender == 'M'){ echo "selected"; } ?>>Male</option>
                            <option value="F" <?php if(@$product->gender == 'F'){ echo "selected"; } ?>>Female</option>
                        </select>
                        <span class="error">{{ $errors->first('gender') }}</span>
                    </div>
                    <div class="col-lg-12">
                        <select class="form-select mb-4 py-3 form-select-lg mb-3" aria-label=".form-select-lg example" name="category_id">
                            <option value="">Select Category</option>
                            @foreach($product_categories as $product_category)
                                <option value="{{$product_category['id']}}" <?php if($product_category->id == @$product->category_id){ echo "selected"; } ?>>{{ @$product_category->name }}</option>
                            @endforeach
                        </select>
                        <span class="error">{{ $errors->first('category_id') }}</span>
                    </div>
                    <div class="col-lg-12">
                        <select class="form-select mb-4 py-3 form-select-lg mb-3" aria-label=".form-select-lg example" name="company_id">
                            <option value="">Select Company</option>
                            @foreach($product_companies as $product_company)
                                <option value="{{$product_company['id']}}" <?php if($product_company->id == @$product->company_id){ echo "selected"; } ?>>{{ @$product_company->name }}</option>
                            @endforeach
                        </select>
                        <span class="error">{{ $errors->first('company_id') }}</span>
                    </div>
                    <div class="col-lg-12">
                      <div class="mb-4 ">
                        <label class="form-label">Description</label>
                        <div class="custom-urban-form">
                          <textarea class="form-control" placeholder="Description" rows="5" name="description">{{ @$product->description }}</textarea>
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