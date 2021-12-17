@extends('layouts.admin')
@section('title','Dashboard')

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

<section class="admin-body pb-0">
  <div class="container">
    <form method="post" action="{{ route('adminAddProduct') }}" enctype="multipart/form-data" id="admin_add_product_form1">
      {{ csrf_field() }}
      <div class="card border-0 shadow-sm br-20 mb-4">
        <div class="card-body py-4">
          <div class="d-flex justify-content-between flex-wrap">
            <div>
              <h4 class="fw-bold mb-3">Add a Product</h4>
              <h6 class="mb-4 f-600">Product Information</h6>
            </div>
            <div class="dropdown">
              <button class="btn btn--primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Add Product For
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Buyer </a></li>
                
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label
                  for="exampleFormControlInput1"
                  class="form-label f-600 text-12"
                  >Product Name</label
                >
                <input
                  type="text"
                  class="form-control border-primary-1 br-10"
                  id="exampleFormControlInput1" name="name"
                  placeholder="Name"
                />
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label
                  for="exampleFormControlInput1"
                  class="form-label f-600 text-12"
                  >Product Category</label
                >
                <div class="position-relative d-flex">
                  <!--input
                    type="email"
                    class="form-control border-primary-1 br-10"
                    id="exampleFormControlInput1"
                    placeholder="Input Here"
                  />
                  <svg
                    class="
                      position-absolute
                      top-50
                      end-0
                      me-3
                      translate-middle-y
                    "
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M15.5 14H14.71L14.43 13.73C15.63 12.33 16.25 10.42 15.91 8.39002C15.44 5.61002 13.12 3.39002 10.32 3.05002C6.09 2.53002 2.53 6.09002 3.05 10.32C3.39 13.12 5.61 15.44 8.39 15.91C10.42 16.25 12.33 15.63 13.73 14.43L14 14.71V15.5L18.25 19.75C18.66 20.16 19.33 20.16 19.74 19.75C20.15 19.34 20.15 18.67 19.74 18.26L15.5 14ZM9.5 14C7.01 14 5 11.99 5 9.50002C5 7.01002 7.01 5.00002 9.5 5.00002C11.99 5.00002 14 7.01002 14 9.50002C14 11.99 11.99 14 9.5 14Z"
                      fill="#D9B950"
                    />
                  </svg-->
                  <select class="form-control border-primary-1 br-10" name="category_id">
                    <option selected="" disabled="">Select</option>
                    @if(count($product_categories) > 0)
                    @foreach($product_categories as $key => $product_category)
                      <option value="{{ $product_category->id }}" <?php if(isset($product->category_id) && $product->category_id == $product_category->id) { echo 'selected'; } else if(old('category_id') == $product_category->id) { echo 'selected'; } ?> >{{ $product_category->name }}</option>
                    @endforeach
                    @endif
                  </select>
                </div>
                @if ($errors->has('category_id'))
                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                @endif
              </div>
            </div>
          </div>
          
        </div>
      </div>

      <div class="card border-0 shadow-sm br-20 mb-4">
        <div class="card-body py-4">
          <h4 class="fw-bold mb-3">Product Details</h4>

          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label
                  for="exampleFormControlInput1"
                  class="form-label f-600 text-12"
                  >Product Per Item</label
                >
                <input
                  type="text"
                  class="form-control border-primary-1 br-10 mb-1" name="price"
                  placeholder="Price"
                />
                <small class="text--primary"
                  >Add Wholesale Price (optional)</small
                >
                @if ($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
              </div>
            </div>
<!--             <div class="col-lg-6">
              <div class="mb-3">
                <label
                  for="exampleFormControlInput1"
                  class="form-label f-600 text-12"
                  >Minimum Purchase</label
                >
                <div class="position-relative d-flex">
                  <input
                    type="text"
                    class="form-control border-primary-1 br-10"
                    id="exampleFormControlInput1"
                    placeholder="Input Here"
                  />
                  <svg
                    class="
                      position-absolute
                      top-50
                      end-0
                      me-3
                      translate-middle-y
                    "
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M15.5 14H14.71L14.43 13.73C15.63 12.33 16.25 10.42 15.91 8.39002C15.44 5.61002 13.12 3.39002 10.32 3.05002C6.09 2.53002 2.53 6.09002 3.05 10.32C3.39 13.12 5.61 15.44 8.39 15.91C10.42 16.25 12.33 15.63 13.73 14.43L14 14.71V15.5L18.25 19.75C18.66 20.16 19.33 20.16 19.74 19.75C20.15 19.34 20.15 18.67 19.74 18.26L15.5 14ZM9.5 14C7.01 14 5 11.99 5 9.50002C5 7.01002 7.01 5.00002 9.5 5.00002C11.99 5.00002 14 7.01002 14 9.50002C14 11.99 11.99 14 9.5 14Z"
                      fill="#D9B950"
                    />
                  </svg>
                </div>
              </div>
            </div> -->
            <!-- <div class="col-lg-6 mb-4">
              <label
                for="exampleFormControlInput1"
                class="form-label f-600 text-12"
                >Weight</label
              >
              <div class="input-group mb-1">
                <input
                  type="text"
                  class="form-control border-primary-1 br-10"
                  aria-label="Text input with dropdown button"
                />
                <button
                  class="btn btn--primary dropdown-toggle f-600"
                  type="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Gram
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li>
                    <a class="dropdown-item" href="#">Another action</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="#">Separated link</a>
                  </li>
                </ul>
              </div>
              <small
                >is this product comes in large packaging?
                <span class="text--primary">Package Dimension</span></small
              >
            </div> -->
           <!--  <div class="col-lg-6 mb-4">
              <p class="mb-0 f-600 text-12 mb-3">Product Condition</p>
              <div class="d-flex align-items-center">
                <div class="form-check me-3">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="flexRadioDefault"
                    id="flexRadioDefault1"
                  />
                  <label class="form-check-label" for="flexRadioDefault1">
                    New
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="flexRadioDefault"
                    id="flexRadioDefault2"
                  />
                  <label class="form-check-label" for="flexRadioDefault2">
                    Second Hand
                  </label>
                </div>
              </div>
            </div> -->
            <div class="col-lg-6 mb-4">
              <label
                for="exampleFormControlInput1"
                class="form-label f-600 text-12"
                >Stock</label
              >
              <div class="input-group mb-1">
                <input
                  type="text"
                  class="form-control border-primary-1 br-10"
                  aria-label="Text input with dropdown button"
                  placeholder="1" name="quantity"
                />
                <button class="btn btn--primary f-600" type="button">
                  Pcs
                </button>
              </div>
              <small>item with 0 stock will automatically set to be "Not for Sale”</small>
              @if ($errors->has('quantity'))
                  <span class="text-danger">{{ $errors->first('quantity') }}</span>
              @endif
            </div>
           <!--  <div class="col-lg-6 mb-4">
              <p class="mb-0 f-600 text-12 mb-3">Imported Item (optional)</p>
              <div class="d-flex align-items-center">
                <div class="form-check me-3">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="flexRadioDefault"
                    id="flexRadioDefault3"
                  />
                  <label class="form-check-label" for="flexRadioDefault3">
                    Yes
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="flexRadioDefault"
                    id="flexRadioDefault4"
                  />
                  <label class="form-check-label" for="flexRadioDefault4">
                    No
                  </label>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>

      <section class="p-0">
        <div class="container">
          <div class="row">
            <!-- <div class="col-lg-4 mb-4">
              <div class="card border-0 shadow-sm br-20 py-3">
                <div class="card-body">
                  <h6 class="f-600 mb-3">Variation</h6>
                  <h4 class="mb-4">Set your variation on your products, so it can make buyers easily choose the product without writing the notes</h4>
                  <button type="button" class="btn btn--primary text-white">Set Variation</button>
                </div>
              </div>
            </div> -->

            <div class="col-lg-4 mb-4">
              <label for="avatar" class="card border-0 text-center shadow-sm br-20 h-100 d-flex cursor-pointer flex-column justify-content-center align-items-center py-5">
                
                    <div class="px-4">
                      <svg class="mb-3" width="68" height="57" viewBox="0 0 68 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M64 10.3333V6.99999H57.3333V10.3333H53.07L49.7367 0.333328H18.2633L14.93 10.3333H0.666668V57H67.3333V10.3333H64ZM60.6667 50.3333H7.33333V17H19.7367L23.07 6.99999H44.93L48.2633 17H60.6667V50.3333Z" fill="#E1E1E1"/>
                        <path d="M34 17C31.0333 17 28.1332 17.8797 25.6664 19.528C23.1997 21.1762 21.2771 23.5189 20.1418 26.2597C19.0065 29.0006 18.7094 32.0166 19.2882 34.9264C19.867 37.8361 21.2956 40.5088 23.3934 42.6066C25.4912 44.7044 28.1639 46.133 31.0736 46.7118C33.9834 47.2906 36.9994 46.9935 39.7403 45.8582C42.4811 44.7229 44.8238 42.8003 46.472 40.3336C48.1203 37.8668 49 34.9667 49 32C48.9956 28.0231 47.4138 24.2104 44.6017 21.3983C41.7896 18.5862 37.9769 17.0044 34 17V17ZM34 40.3333C32.3518 40.3333 30.7407 39.8446 29.3702 38.9289C27.9998 38.0132 26.9317 36.7117 26.301 35.189C25.6703 33.6663 25.5052 31.9908 25.8268 30.3742C26.1483 28.7577 26.942 27.2729 28.1074 26.1074C29.2729 24.942 30.7577 24.1483 32.3742 23.8268C33.9908 23.5052 35.6663 23.6703 37.189 24.301C38.7117 24.9317 40.0132 25.9998 40.9289 27.3702C41.8446 28.7407 42.3333 30.3518 42.3333 32C42.3333 34.2101 41.4554 36.3298 39.8926 37.8926C38.3298 39.4554 36.2101 40.3333 34 40.3333V40.3333Z" fill="#E1E1E1"/>
                      </svg>
                      <p class="col-lg-10 mx-auto">Drag Your Images to Upload or <span class="text--primary text-decoration-underline">Browse</span></p>
                    </div>
                

                  <input type="file" class="d-none" id="urbanFile" name="avatar" accept="image/png, image/jpeg">
                  
                  <output id="result" />
              </label>
            </div>
            <div class="col-lg-4 mb-4">
              <label for="avatar" class="card border-0 text-center shadow-sm br-20 h-100 d-flex cursor-pointer flex-column justify-content-center align-items-center py-5">
                
                    <div class="px-4">
                      <svg class="mb-3" width="68" height="57" viewBox="0 0 68 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M64 10.3333V6.99999H57.3333V10.3333H53.07L49.7367 0.333328H18.2633L14.93 10.3333H0.666668V57H67.3333V10.3333H64ZM60.6667 50.3333H7.33333V17H19.7367L23.07 6.99999H44.93L48.2633 17H60.6667V50.3333Z" fill="#E1E1E1"/>
                        <path d="M34 17C31.0333 17 28.1332 17.8797 25.6664 19.528C23.1997 21.1762 21.2771 23.5189 20.1418 26.2597C19.0065 29.0006 18.7094 32.0166 19.2882 34.9264C19.867 37.8361 21.2956 40.5088 23.3934 42.6066C25.4912 44.7044 28.1639 46.133 31.0736 46.7118C33.9834 47.2906 36.9994 46.9935 39.7403 45.8582C42.4811 44.7229 44.8238 42.8003 46.472 40.3336C48.1203 37.8668 49 34.9667 49 32C48.9956 28.0231 47.4138 24.2104 44.6017 21.3983C41.7896 18.5862 37.9769 17.0044 34 17V17ZM34 40.3333C32.3518 40.3333 30.7407 39.8446 29.3702 38.9289C27.9998 38.0132 26.9317 36.7117 26.301 35.189C25.6703 33.6663 25.5052 31.9908 25.8268 30.3742C26.1483 28.7577 26.942 27.2729 28.1074 26.1074C29.2729 24.942 30.7577 24.1483 32.3742 23.8268C33.9908 23.5052 35.6663 23.6703 37.189 24.301C38.7117 24.9317 40.0132 25.9998 40.9289 27.3702C41.8446 28.7407 42.3333 30.3518 42.3333 32C42.3333 34.2101 41.4554 36.3298 39.8926 37.8926C38.3298 39.4554 36.2101 40.3333 34 40.3333V40.3333Z" fill="#E1E1E1"/>
                      </svg>
                      <p class="col-lg-10 mx-auto">Drag Your Images to Upload or <span class="text--primary text-decoration-underline">Browse</span></p>
                    </div>
                

                  <input type="file" class="d-none" id="avatar" name="avatar" accept="image/png, image/jpeg">
                  
              
              </label>
            </div>
          </div>
        </div>
      </section>

      <section class="pt-0">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mb-4">
              <div class="card border-0 shadow-sm br-20 h-100">
                <div class="card-body">
                  <h6 class="fw-bold mb-3">Product Description</h6>
                  <textarea id="editor" class="form-control" id="exampleFormControlTextarea1" placeholder="" rows="5" name="description"></textarea>
                  @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card border-0 shadow-sm br-20">
                <div class="card-body">
                  <h6 class="fw-bold mb-4">Good’s Grouping</h6>
                  <div class="mb-3">
                    <p class="mb-2 text-12 f-600">Good’s Etalage</p>
                    <!--select class="form-select br-10 border-primary-1" aria-label="Default select example">
                      <option selected>Input Here</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select-->
                    <input class="form-control border-primary-1 br-10" type="text" placeholder="Brand" name="brand">
                    @if ($errors->has('brand'))
                      <span class="text-danger">{{ $errors->first('brand') }}</span>
                    @endif
                  </div>
                  <div class="mb-3">
                    <p class="mb-2 text-12 f-600">Tags</p>
                    <!--select class="form-select br-10 border-primary-1" aria-label="Default select example">
                      <option selected>Input Here</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select-->
                    <input type="text" class="form-control border-primary-1 br-10" placeholder="Red Swanky Hoddie" name="tags">
                  </div>
                  <div class="mb-3">
                    <p class="mb-2 text-12 f-600">Sku</p>
                    <!--select class="form-select br-10 border-primary-1" aria-label="Default select example">
                      <option selected>Input Here</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select-->
                    <input type="text" class="form-control border-primary-1 br-10" placeholder="" name="sku">
                    @if ($errors->has('sku'))
                      <span class="text-danger">{{ $errors->first('sku') }}</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
        <button type="submit" class="btn btn-dark px-5 py-3 rounded-pill">Save</button>
      </div>
      </section>
    </form>
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

  //Preview Mutliple Images
window.onload = function(){
        
    //Check File API support
    if(window.File && window.FileList && window.FileReader)
    {
        var filesInput = document.getElementById("urbanFile");
        
        filesInput.addEventListener("change", function(event){
            
           
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
                    
                    div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'/>";
                    
                    output.insertBefore(div,null);            
                
                });
                
                 //Read the image
                picReader.readAsDataURL(file);
            }                               
           
        });
    }
    else
    {
        console.log("Your browser does not support File API");
    }
}

</script>

@stop