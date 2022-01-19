@extends('layouts.admin')
@if(isset($product))
  @section('title','Edit Product')
@else
  @section('title','Add Product')
@endif

@section('styles')
  <style type="text/css">
  #result div, .result div {
    width: 200px;
    padding: 5px;
    float: left;
}
  #result div img, .result div img{
    width: 100%;
  }

  .error{
    color: red;
  }
</style>
@endsection

@section('content')

<section class="mt-90 ">
    <div class="container">
      @if(!isset($product))
      <form method="post" action="{{ route('adminAddProduct') }}" enctype="multipart/form-data" id="add_product_form">
      @else
      <form method="post" action="{{ route('adminEditProduct', $product->id) }}" enctype="multipart/form-data" id="add_product_form">
      @endif
              {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-12">
                
                <h3 class="mt-5 mb-4 fw-bold ">{{ isset($product) ? 'Edit Product' : 'Add Product' }}</h3>
            </div>
              <div class="col-lg-8">               
                  <div class="card border-0 mb-5 shadow br-16">
                      <div class="card-body">
                        <div class="mb-4">
                              <label for="exampleFormControlInput1" class="form-label">Category</label>
                              <div class="custom-urban-form">
                                  <select id="select" class="form-control form-select" name="category_id">
                                    <option style="color:gray" value="null" selected="" disabled="">Select</option>
                                    @if(count($product_categories) > 0)
                                    @foreach($product_categories as $key => $product_category)
                                     <option value="{{ $product_category->id }}" <?php if(isset($product->category_id) && $product->category_id == $product_category->id) { echo 'selected'; } else if(old('category_id') == $product_category->id) { echo 'selected'; } ?> >{{ $product_category->name }}</option>
                                    @endforeach
                                    @endif
                                  </select>
                              </div>
                              <span class="error">{{ $errors->first('category_id') }}</span>
                          </div>
                          <div class="mb-4">
                              <label for="exampleFormControlInput1" class="form-label">Seller</label>
                              <div class="custom-urban-form">
                                  <select id="select" class="form-control form-select" name="user_id">
                                    <!--option style="color:gray" value="null" selected="" disabled="">Select</option-->
                                    @if(count($sellers) > 0)
                                    @foreach($sellers as $key => $seller)
                                     <option value="{{ $seller->id }}" <?php if(isset($product->user_id) && $product->user_id == $seller->id) { echo 'selected'; } else if(old('user_id') == $seller->id) { echo 'selected'; } ?> >{{ $seller->first_name }}</option>
                                    @endforeach
                                    @endif
                                  </select>
                              </div>
                              <span class="error">{{ $errors->first('category_id') }}</span>
                          </div>
                          <div class="mb-4">
                              <label for="exampleFormControlInput1" class="form-label">Brand</label>
                              <div class="custom-urban-form">
                                  <input class="form-control" type="text" placeholder="Brand" name="brand" value="{{ @$product->brand ?: old('brand') }}">
                                  <i class="fas fa-pen"></i>
                              </div>
                              <span class="error">{{ $errors->first('brand') }}</span>
                          </div>
                          
                          <div class="mb-4">
                              <label for="exampleFormControlInput1" class="form-label">Title</label>
                              <div class="custom-urban-form">
                                  <input class="form-control" type="text" placeholder="Name" name="name" value="{{ @$product->name ?: old('name') }}">
                                  <i class="fas fa-pen"></i>
                              </div>
                              <span class="error">{{ $errors->first('name') }}</span>
                          </div>
                          <div class="mb-4 ">
                              <label for="exampleFormControlTextarea1" class="form-label ">Description</label>
                              <div class="custom-urban-form">
                                  <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Description" rows="5" name="description">{{ @$product->description ?: old('description') }}</textarea>
                                  <i class="fas fa-pen textarea-icon"></i>
                              </div>
                              <span class="error">{{ $errors->first('description') }}</span>
                          </div>
                      </div>
                  </div>
                  <div class="card border-0 mb-5 shadow br-16">
                      <div class="card-body">
                          <h3 class="mb-4 fw-bold ">Media</h3>

                          <div id="drag-drop-area" class="w-100"></div>
    
                            <div class="urbon-files"></div>

                          <!-- <label for="urbanFile" class="border-dashed-gray cursor-pointer br-8 p-5 d-flex flex-column justify-content-center align-items-center">
                            <div class="bg--primary p-3 d-inline-flex rounded-circle mb-3">
                              
                              <i class="fas fa-plus fs-3 text-white"></i>
                            </div>
                            <input type="file" class="urbanUploadFileProduct" name="image[]" id="urbanFile"  accept="image/*" multiple="">
                            <label for="urbanFile" class="btn btn-outline-primary px-5 py-3 br-8 mb-2"><span class="text-dark f-600">Add Image</span></label> -->

                            <!-- <span class="f-600">or Drop an Image to Upload</span> -->

                          <!-- <output id="result" /> -->
                          </label>
                          @if(@$product->product_image)
                            <div class="row mt-4">
                              @foreach($product->product_image as $key => $image)
                                <div class="col-md-6 mb-3">
                                  
                                  <img class="img-fluid mb-3" src="{{ $image->file }}">
                                  <a class="btn d-block btn--primary" href="{{ route('sellerDeleteImage', $image->id) }}"><i class="fas fa-trash-alt"></i> Delete Image</a>
                                
                                </div>
                              @endforeach
                            </div>
                           
                          @endif
                      </div>
                  </div>
                  <div class="card border-0 mb-5 shadow br-16">
                      <div class="card-body">
                          <h3 class=" mb-4 fw-bold ">Pricing</h3>
                          <div class="row">
                              <div class="col-lg-6 mb-4">
                                  <label for="exampleFormControlInput1" class="form-label">Price</label>
                                  <div class="custom-urban-form">
                                      <input class="form-control priceCheck" type="text" placeholder="$ 0.00" name="price" value="{{ @$product->price ?: old('price') }}">
                                      <i class="fas fa-pen"></i>
                                  </div>
                                  <span class="price-error">{{ $errors->first('price') }}</span>
                              </div>
                              <div class="col-lg-6 mb-4">
                                  <label for="exampleFormControlInput1" class="form-label">Compare at Price</label>
                                  <div class="custom-urban-form">
                                      <input class="form-control ComparePrice" type="text" placeholder="$ 0.00" name="compare_price" value="{{ @$product->compare_price ?: old('compare_price') }}">
                                      <i class="fas fa-pen"></i>
                                  </div>
                                  <span class="compare-price-error">{{ $errors->first('compare_price') }}</span>
                              </div>
                              <div class="col-lg-12">
                                  <label for="exampleFormControlInput1" class="form-label">Cost per Item</label>
                                  <div class="custom-urban-form mb-2">
                                      <input class="form-control CostItem" type="text" placeholder="$ 0.00" name="cost_per_price" value="{{ @$product->cost_per_price ?: old('cost_per_price') }}">
                                      <i class="fas fa-pen"></i>
                                  </div>
                                  <span class="cost-price-error">{{ $errors->first('cost_per_price') }}</span></br>
                                  <span>Customer Won't see this</span>
                                  <div class="mt-3 ">
                                      <div class="urban-checkbox form-group-checkbox">
                                          <input type="checkbox" id="vehicle1" name="charge_tax" value="1" <?php if(isset($product->charge_tax) && $product->charge_tax == 1) { echo 'checked'; } else if(old('charge_tax') == 1) { echo 'checked'; } ?>>
                                          <label for="vehicle1" class="fw-bold"> Charge tax on this Product</label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          
                      </div>
                  </div>
                  <div class="card border-0 mb-5 shadow br-16">
                      <div class="card-body">
                          <h3 class=" mb-4 fw-bold ">Inventory</h3>
                          <div class="row">
                              <!-- <div class="col-lg-6 mb-4">
                                  <label for="exampleFormControlInput1" class="form-label">SKU (Stock Keeping Unit)</label>
                                  <div class="custom-urban-form">
                                      <input type="text" class="form-control " placeholder="" name="sku" value="{{ @$product->sku ?: old('sku') }}">
                                      <i class="fas fa-pen"></i>
                                  </div>
                                  <span class="price-error">{{ $errors->first('sku') }}</span>
                              </div> -->
                              <!-- <div class="col-lg-6 mb-4">
                                  <label for="exampleFormControlInput1" class="form-label">Barcode (ISBN, UPC GTN etc)</label>
                                  <div class="custom-urban-form">
                                      <input type="text" class="form-control " placeholder="" name="barcode" value="{{ @$product->barcode }}">
                                      <i class="fas fa-pen"></i>
                                  </div>
                                  <span class="price-error">{{ $errors->first('barcode') }}</span>
                              </div> -->
                              <div class="col-lg-12">
                                  <div class="urban-checkbox form-group-checkbox">
                                      <input type="checkbox" id="checkbox2" name="track_quantity" value="1" <?php if(@$product->track_quantity == 1) { echo 'checked'; } else if(old('track_quantity') == 1) { echo 'checked';} ?>>
                                      <label for="checkbox2" class="fw-bold">Track Quantity</label>
                                  </div>
                                  <div class="urban-checkbox form-group-checkbox">
                                      <input type="checkbox" id="checkbox3" name="continue_selling" value="1" <?php if(@$product->continue_selling == 1) { echo 'checked'; } else if(old('continue_selling') == 1) { echo 'checked'; } ?>>
                                      <label for="checkbox3" class="fw-bold"> Continue Selling When Out of Stock</label>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="card-footer bg-transparent">
                          <label for="exampleFormControlInput1" class="form-label">Quantity</label>
                          <div class="custom-urban-form quantity">
                              <input type="number" class="form-control" placeholder="0" name="quantity" min="0" value="{{ @$product->quantity ?: old('quantity') }}"/>
                              
                          </div>
                          <span class="error">{{ $errors->first('quantity') }}</span>
                      </div>
                  </div>
                  <!-- <div class="card border-0 mb-5 shadow br-16">
                      <div class="card-body">
                          <h3 class=" mb-4 fw-bold ">Variants</h3>
                          <div class="urban-checkbox form-group-checkbox">
                              <input type="checkbox" id="checkboxVariants" >
                              <label for="checkboxVariants" class="fw-bold">The Product has Multiple Options like Different size & color</label>
                          </div>
                      </div>
                  
                  </div> -->
              </div>
              <div class="col-lg-4">
                  <div class="card border-0 mb-5 shadow br-16">
                      <div class="card-body">
                          <h3 class=" mb-4 fw-bold ">Product Status</h3>
                          <div class="mb-4">
                              
                              <div class="custom-urban-form mb-2">
                                  <!-- <input type="text" class="form-control " placeholder="Draft">
                                  <i class="fas fa-pen"></i> -->
                                  <select name="status" class="form-control form-select">
                                    <option value="0" {{ (@$product->status == 0 || old('status') == 0) ? 'selected' : '' }}>In-active</option>
                                    <option value="1" {{ (@$product->status == 1 || old('status') == 1) ? 'selected' : '' }}>Published</option>
                                    <option value="2" {{ (@$product->status == 2 || old('status') == 2) ? 'selected' : '' }}>Draft</option>
                                  </select>
                              </div>
                              <div class="mb-3">
                                <small class="text-mute f-600">This Product will be hidden from all sales channel</small>
                              </div>
                              
                          </div>
                          <!-- <div class="mb-4 ">
                              <h6 class="f-600 mb-3">SALES CHANNEL</h6>
                              <div class="urban-checkbox form-group-checkbox ">
                                  <input type="checkbox" id="checkbox4" >
                                  <label for="checkbox4" class="">Online Store  </label>
                                  <div class="text--primary ml-2rem">Schedule Availability  </div>
                              </div>
                          </div> -->
                      </div>
                  </div>
                  <div class="card border-0 mb-5 shadow br-16">
                      <!-- <div class="card-body">
                          <h3 class=" mb-4 fw-bold ">Organization</h3>
                          <div class="mb-4">
                              <label for="exampleFormControlInput1" class="form-label">Product Type</label>
                              <div class="custom-urban-form">
                                  <input type="text" class="form-control " placeholder="" name="vendor" value="{{ @$product->product_types }}">
                                  <i class="fas fa-pen"></i>
                              </div>
                              <span class="error">{{ $errors->first('product_types') }}</span>
                          </div>
                          <div class="mb-4">
                              <label for="exampleFormControlInput1" class="form-label">Vendor</label>
                              <div class="custom-urban-form">
                                  <input type="text" class="form-control " placeholder="eg: shoe" name="vendor" value="{{ @$product->vendor }}">
                                  <i class="fas fa-pen"></i>
                              </div>
                              <span class="error">{{ $errors->first('vendor') }}</span>
                          </div>
                          
                      </div> -->
                      <!-- <div class="card-footer bg-transparent">
                          <h3 class=" mb-4 mt-2 fw-bold">Collections</h3>
                          <div class="custom-form-group-search  position-relative mb-2">
                            <input type="text" class="form-control mw-100" placeholder="Search for Collection">
                            <i class="fas fa-search text--primary"></i>
                          </div>
                          <div class="mb-3">
                            <small class="text-mute">Add this Product to collection so it's find your store </small>
                          </div>
                      </div> -->
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
                          <h3 class=" mb-0 fw-bold my-2">Tags</h3>
                          <!-- <a href="#" class="text--primary my-2">View All Tags</a> -->
                        </div>
                        <div class="custom-urban-form mb-2">
                            <input type="text" class="form-control " placeholder="Red Swanky Hoddie" name="tags" value="{{ @$product->tags ?: old('tags') }}">
                            <i class="fas fa-pen"></i>
                        </div>
                        <span class="error">{{ $errors->first('tags') }}</span>
                      </div>
                  </div>
              </div>

              <div class="col-lg-12">
                <button type="submit" class="btn btn-dark px-5 py-3 rounded-pill">Save</button>
              </div>
        </div>
      </form>
    </div>
  </section>

@endsection
@section('scripts')

<script>
  var uppy = Uppy.Core()
    .use(Uppy.Dashboard, {
      inline: true,
      target: '#drag-drop-area'
    })
    .use(Uppy.Tus, {endpoint: 'https://master.tus.io/files/'}) //you can put upload URL here, where you want to upload images
    uppy.on('complete', (result) => {

      $.each(result.successful, function (key, val) {
          //alert(key + val.extension);
          $('.urbon-files').append("<input type='hidden' value='"+val.uploadURL+"' name='image[]'><input type='hidden' value='"+val.extension+"' name='extension[]'>");
      });

    console.log('Upload complete! We’ve uploaded these files:', result.successful)
  })
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

  //Preview Mutliple Images
window.onload = function(){
        
    //Check File API support
    if(window.File && window.FileList && window.FileReader)
    {
        var filesInput = document.getElementById("urbanFile");
        
        filesInput.addEventListener("change", function(event){

          var fileExtension = ['jpeg', 'jpg', 'png'];
          if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
              alert("Only formats are allowed : "+fileExtension.join(', '));
          }

            var fileSize = filesInput.files[0];
            var sizeInMb = fileSize.size/1024;
            var sizeLimit= 1024*2;
            if (sizeInMb > sizeLimit) {
              alert('please upload image less than 2MB');
              $(this).val('');
            }else{
              var files = event.target.files; //FileList object
              var output = document.getElementById("result");
              
              for(var i = 0; i< files.length; i++)
              {
                  var file = files[i];
                  
                  //Only pics
                  if(!file.type.match('image'))
                    continue;
                  
                  var picReader = new FileReader();
                  
                  picReader.addEventListener("load",function(event){
                      
                      var picFile = event.target;
                      
                      var div = document.createElement("div");
                      
                      div.innerHTML = "<img class='thumbnail img-fluid' src='" + picFile.result + "'" +
                              "title='" + picFile.name + "'/>";
                      
                      output.insertBefore(div,null);            
                  
                  });
                  
                  //Read the image
                  picReader.readAsDataURL(file);
              }
            }
        });
    }
    else
    {
        console.log("Your browser does not support File API");
    }
}


// $(".priceCheck").blur(function() {
//     var price = $(".priceCheck").val();
//     var validatePrice = function(price) {
//       return /^(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/.test(price);
//     }
//     if(validatePrice(price) == false){
//       alert('Enter Digit only');
//     } // False
// });

// $(".ComparePrice").blur(function() {
//     var price = $(".ComparePrice").val();
//     var validatePrice = function(price) {
//       return /^(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/.test(price);
//     }
//     if(validatePrice(price) == false){
//       alert('Enter Digit only');
//     } // False
// });

// $(".CostItem").blur(function() {
//     var price = $(".CostItem").val();
//     var validatePrice = function(price) {
//       return /^(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/.test(price);
//     }
//     if(validatePrice(price) == false){
//       alert('Enter Digit only');
//     } // False
// });

</script>

@stop