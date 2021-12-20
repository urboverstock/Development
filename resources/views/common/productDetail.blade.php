@extends('layouts.guest')
@section('title', $product_details->name)
@section('content')
 <section class="mt-96   pb-3 ">
    <div class="container pt-4">
      <div class="row">
        <div class="col-lg-5 mb-4">
          <!-- item-slider  -->          
          <div class="cart-slider">
               <div class="slider slider-for mb-4">
                  @if(isset($product_details->product_image))
                  @foreach($product_details->product_image as $image)
                  <div>
                     <img class="avatar-slider mx-auto br-10" src="{{ asset( $image->file) }}" alt="" height="200">
                  </div>
                  @endforeach
                  @endif
               </div>
               <div class="slider slider-nav">
                  @if(isset($product_details->product_image))
                  @foreach($product_details->product_image as $image)
                  <div class="me-3">
                     <img class="avatar-80 br-10" src="{{ asset($image->file) }}" alt="">
                  </div>
                  @endforeach
                  @endif
               </div>
            </div>
        </div>

        <div class="col-lg-7">
          <h2 class="fw-bold mb-4"><?php echo $product_details->name; ?></h2>
            <h5 class="f-600">{{ $product_details->brand }}</h5>
          <div class="d-flex flex-wrap mb-4">
            <!-- <div class="d-flex">
              <span class="text--primary f-600 me-2 ">4.0 
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </span>
            </div> -->
            <span class="text-mute border-r-grey pe-2 "></span>
            <span class="d-flex align-items-center">
              <svg class="mx-2" width="19" height="14" viewBox="0 0 19 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.34246 13.0735L0.283273 7.26158C-0.0807523 6.91241 -0.0807523 6.34628 0.283273 5.99708L1.60155 4.73257C1.96557 4.38337 2.55583 4.38337 2.91986 4.73257L7.00162 8.64771L15.7443 0.261876C16.1083 -0.087292 16.6986 -0.087292 17.0626 0.261876L18.3809 1.52638C18.7449 1.87555 18.7449 2.44169 18.3809 2.79089L7.66078 13.0735C7.29671 13.4227 6.70649 13.4227 6.34246 13.0735Z" fill="#BABABA"/>
              </svg>
              
              <div class="border-r-grey pe-2">
                <h6 class="f-600 mb-0">{{$totalSoldProduct}} <span class="fw-normal">Sold</span></h6>
              </div>
            </span>
            <div class=" d-flex border-r-grey pe-2 mb-0 align-items-center">
              <svg class="mx-2" width="26" height="17" viewBox="0 0 26 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25.416 7.96239C23.0757 3.55296 18.4424 0.56958 13.1371 0.56958C7.83186 0.56958 3.19726 3.55504 0.858169 7.9628C0.759445 8.15138 0.708008 8.35972 0.708008 8.57102C0.708008 8.78232 0.759445 8.99067 0.858169 9.17924C3.19856 13.5887 7.83186 16.572 13.1371 16.572C18.4424 16.572 23.077 13.5866 25.416 9.17882C25.5148 8.99025 25.5662 8.78191 25.5662 8.57061C25.5662 8.3593 25.5148 8.15096 25.416 7.96239ZM13.1371 14.5717C11.908 14.5717 10.7065 14.2198 9.68448 13.5604C8.6625 12.901 7.86597 11.9638 7.3956 10.8673C6.92524 9.77074 6.80217 8.56416 7.04196 7.40009C7.28175 6.23603 7.87363 5.16676 8.74275 4.32752C9.61187 3.48827 10.7192 2.91674 11.9247 2.68519C13.1302 2.45365 14.3798 2.57249 15.5153 3.02668C16.6509 3.48088 17.6215 4.25003 18.3043 5.23688C18.9872 6.22372 19.3517 7.38394 19.3517 8.57081C19.3521 9.35897 19.1916 10.1395 18.8794 10.8677C18.5673 11.596 18.1095 12.2576 17.5324 12.815C16.9552 13.3723 16.27 13.8143 15.5158 14.1157C14.7616 14.4172 13.9533 14.5721 13.1371 14.5717ZM13.1371 4.5702C12.7673 4.57519 12.3999 4.62831 12.0448 4.72814C12.3375 5.11223 12.478 5.58489 12.4407 6.0604C12.4035 6.53592 12.191 6.9828 11.8418 7.32C11.4926 7.6572 11.0298 7.86239 10.5373 7.89836C10.0449 7.93433 9.55539 7.7987 9.15763 7.51607C8.93113 8.32185 8.97202 9.17594 9.27453 9.95811C9.57705 10.7403 10.126 11.4112 10.844 11.8763C11.5621 12.3415 12.4131 12.5775 13.2774 12.5511C14.1416 12.5247 14.9755 12.2373 15.6617 11.7293C16.3479 11.2214 16.8519 10.5184 17.1027 9.71932C17.3535 8.92027 17.3385 8.06539 17.0597 7.27502C16.781 6.48464 16.2526 5.79857 15.549 5.31336C14.8453 4.82815 14.0018 4.56823 13.1371 4.5702Z" fill="#BABABA"/>
                </svg>
                <h6 class="f-600 mb-0">{{ $totalProductView->view_count }} Viewed</h6>
            </div>
            <div class="d-flex align-items-center">
              <svg class="me-2" width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                      <rect width="26" height="27" fill="url(#pattern0)"></rect>
                                      <defs>
                                      <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                      <use xlink:href="#image0" transform="translate(0 -0.00365497) scale(0.00657895 0.00633528)"></use>
                                      </pattern>
                                      <image id="image0" width="152" height="159" xlink:href="data:image/png;base64,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UmVhZHlxyWU8AAADI2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNi4wLWMwMDIgNzkuMTY0NDYwLCAyMDIwLzA1LzEyLTE2OjA0OjE3ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpDMTY4NDJEQUEzOTcxMUVCOTI3RkY4OTk5MTc4NUYyNCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpDMTY4NDJEOUEzOTcxMUVCOTI3RkY4OTk5MTc4NUYyNCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgMjEuMiAoV2luZG93cykiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpCQTM1NTA1NTlGNkUxMUVCOTBERkJCQjZBREY2NUQzNiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpCQTM1NTA1NjlGNkUxMUVCOTBERkJCQjZBREY2NUQzNiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PpayvVgAAAgsSURBVHja7J1pyFVFGMfn1ev+aqZlmmkimUW0SPlBTD+URqVhZPYliko/JIVlfpBS2gzBojKlRFqMKFuJaLMvJpWlhSYtopGk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"></image>
                                      </defs>
                                  </svg>
              <a href="javascript:void(0)" class="text--primary text-decoration-none add-wishlist-product" data-productId="{{ $product_details->id }}">Add To wishlist</a>
            </div>
          </div>

          <div class="d-flex align-items-center border-bottom pb-4 mb-4">
            <h2 class="text--primary f-600 mb-0 me-3">${{ @$product_details->price }}</h2>
            @if($product_details->compare_price)
            <h4 class="mb-0 text-decoration-line-through text-mute">${{ $product_details->compare_price }}</h4>
            @endif
          </div>

          <!-- <h5 class="mb-4">{{ @$product_details->description }}</h5> -->

          <!-- <div class="d-flex align-items-center flex-wrap mb-3">
            <h5 class="fw-bold me-5 mb-3">Shoe Size</h5>
            <button type="button" class="btn z-btn-product-details btn-outline-primary py-2 px-5 rounded-pill me-3  mb-3 f-600">7</button>
            <button type="button" class="btn z-btn-product-details btn-outline-primary py-2 px-5 active rounded-pill me-3  mb-3 f-600">7</button>
            <button type="button" class="btn z-btn-product-details btn-outline-primary py-2 px-5 rounded-pill  mb-3 f-600">7</button>
            
          </div> -->
          <div class="d-flex align-items-center flex-wrap">
            <div class="quantity-field rounded-pill border d-flex align-items-center mb-3 me-4" >
              <button 
                class="btn value-button decrease-button" 
                onclick="decreaseValue(this)" 
                title="Azalt"> 
                <svg width="14" height="15" viewBox="0 0 18 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0.970703 0.209473H17.8388V3.76558H0.970703V0.209473Z" fill="#D2D2D2"/>
                </svg>                  
              </button>

                <div class="number text-dark fs-5 f-600 quantity">1</div>
              <button 
                class="btn value-button increase-button" 
                onclick="increaseValue(this, 5)"
                title="Arrtır"
              >

              @if($product_details->quantity == 0)
              <svg width="14" height="15" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.52007 0.773926V7.33494H15.7364V10.2634H9.52007V16.8564H6.32401V10.2634H0.139648V7.33494H6.32401V0.773926H9.52007Z" fill="#D2D2D2"/>
              </svg>
              @else
              <svg width="14" height="15" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.52007 0.773926V7.33494H15.7364V10.2634H9.52007V16.8564H6.32401V10.2634H0.139648V7.33494H6.32401V0.773926H9.52007Z" fill="#000"/>
              </svg>
              @endif
                
              </button>
            </div>
            <a href="{{ route('buy-now', $product_details->id) }}" class="btn btn--primary z-btn-text-white py-2 px-4 rounded-pill mb-3 me-3">Buy Now</button>
            @if(Auth::check())
            <a href="javascript:void(0)" class="add-to-cart btn btn-dark z-btn-text-white py-2 px-4 rounded-pill mb-3 me-3" id="add-to-cart" data-productid="{{ @$product_details->id }}">Add to Cart</a>
            @else
            <a href="javascript:void(0)" class="add-to-cart btn btn-dark z-btn-text-white py-2 px-4 rounded-pill mb-3 me-3"  id="add-to-cart" data-productid="{{ @$product_details->id }}">Add to Cart</a>
            @endif

            @if($store_user_details->user_chat_status == 1)
            @if(Auth::check())
            <a href="{{ url('/chat?user_id='.  \Illuminate\Support\Facades\Crypt::encrypt($store_user_details->id)) }}" class="btn btn-dark z-btn-text-white py-2 px-4 rounded-pill mb-3 me-3" id="add-to-cart" data-productid="{{ @$product_details->id }}"><i class="far fa-comments"></i></a>
            @else
            <a href="{{ route('signin') }}" class="btn btn-dark z-btn-text-white py-2 px-4 rounded-pill mb-3 me-3"><i class="far fa-comments"></i></a>
            @endif
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>

<section class="pb-5">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <nav class="mb-5">
               <div class="nav nav-tabs product-nav-tabs border-0  px-4" id="nav-tab" role="tablist">
                  <button class="nav-link active  py-3" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Description</button>
                  <!-- <button class="nav-link  py-3" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Specification</button> -->
                  <!-- <button class="nav-link py-3" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Discussion</button> -->
                  <button class="nav-link py-3" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review" aria-selected="false">Reviews </button>
                  <button class="nav-link py-3" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-store" type="button" role="tab" aria-controls="nav-store" aria-selected="false">Store</button>

                  <button class="nav-link py-3" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-rating" type="button" role="tab" aria-controls="nav-rating" aria-selected="false">Rating</button>
               </div>
            </nav>
            <div class="tab-content px-4" id="nav-tabContent">
               <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  {{ @$product_details->description }}
               </div>
               <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                  Specification
               </div>
               <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                  Discussion
               </div>
               <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-contact-tab">
                  Reviews
               </div>
               <div class="tab-pane fade" id="nav-store" role="tabpanel" aria-labelledby="nav-contact-tab">
                  <h3 class="f-600 mb-0 me-3">{{ $store_user_details->full_name }}</h3>

                  @if(!empty($store_user_details->storeDetail->name))
                  <p>Store Name : {{ $store_user_details->storeDetail->name }}</p>
                  @endif

                  @if(!empty($store_user_details->storeDetail->phone_number))
                  <p>Phone No. : {{ $store_user_details->storeDetail->phone_number }}</p>
                  @endif

                  @if(!empty($store_user_details->storeDetail->description))
                  <p>Description : {{ $store_user_details->storeDetail->description }}</p>
                  @endif

                  @if(!empty($store_user_details->storeDetail->address))
                  <p>Address : {{ $store_user_details->storeDetail->address }}</p>
                  @endif
               </div>
               <div class="tab-pane fade" id="nav-rating" role="tabpanel" aria-labelledby="nav-contact-tab">

                <form id="product-rating">
                  <textarea class="form-control form-control-lg mb-4 py-3" type="text" placeholder="Comment" aria-label="" name="comment" value="{{ old('comment') }}"></textarea>
                  <span class="error">{{ $errors->first('comment') }}</span>

                  <input class="form-control form-control-lg mb-4 py-3" type="text" placeholder="Email@address.com" aria-label="Email@address.com" name="email" value="{{ old('email') }}">
                  <span class="error">{{ $errors->first('email') }}</span>
                </form>

               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="pb-5 pt-0">
   <div class="container-xl">
   <div class="row">
      <div class="col-lg-12 mb-5" data-aos="fade-up">
         <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div>
               <div class="urban-title text--primary position-relative mb-2">
                  <p class="mb-0">Find Your Style</p>
               </div>
               <div class="urban-sub-title ust-100 mb-4">
                  <p class="mb-0 pe-4">Recent Products</p>
               </div>
            </div>
         </div>
      </div>


      <!-- loadmore started  -->
      <div class="row loadmore">
         
        <!-- loadmore content started  -->

        @if(isset($recent_products) && !empty($recent_products))
        @foreach($recent_products as $recent_product)
        <div class="col-lg-3 col-md-6 col-sm-6">
                 
            <div class="card product-item border-0 shadow br-12 mb-5">
              <div class="card-body ">
               <a class="text-decoration-none text-dark" href="{{ route('product-detail', $recent_product['sku']) }}"><img class="img-fluid br-12 mb-3" src="{{ productDefaultImage(@$recent_product['id'])}}" alt=""></a>
               <a class="text-decoration-none text-dark" href="{{ route('product-detail', $recent_product['sku']) }}"><h5 class="fw-bold">{{ @$recent_product['name'] }}</h5></a>
               <div class="d-flex align-items-center justify-content-between flex-wrap">
                 <!-- <div class="bg-text rounded-pill px-3 py-2">
                    <h6 class="mb-0 f-600">Jhonathan Doe</h6>
                 </div> -->
                <div class="d-flex my-2">
                  <i class="fas fa-star me-2 text--primary text-13"></i>
                  <i class="fas fa-star me-2 text--primary text-13"></i>
                  <i class="fas fa-star me-2 text--primary text-13"></i>
                  <i class="fas fa-star me-2 text--primary text-13"></i>
                  <i class="fas fa-star text--primary text-13"></i>
               </div>
                
              </div>
              <div class="card-footer bg-transparent">
                <div class="d-flex justify-content-between flex-wrap py-2">
                  <h5 class="mb-0">${{ @$recent_product['price'] }} </h5>
                  <div class="d-flex align-items-center">
                   
                    @if(Auth::check())
                                <a href="javascript:void(0)" class="add-favourite-product" data-productid="{{$product_details->id }}"><svg class="me-2" width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                      <rect width="26" height="27" fill="url(#pattern0)"></rect>
                                      <defs>
                                      <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                      <use xlink:href="#image0" transform="translate(0 -0.00365497) scale(0.00657895 0.00633528)"></use>
                                      </pattern>
                                      <image id="image0" width="152" height="159" xlink:href="data:image/png;base64,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UmVhZHlxyWU8AAADI2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNi4wLWMwMDIgNzkuMTY0NDYwLCAyMDIwLzA1LzEyLTE2OjA0OjE3ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpDMTY4NDJEQUEzOTcxMUVCOTI3RkY4OTk5MTc4NUYyNCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpDMTY4NDJEOUEzOTcxMUVCOTI3RkY4OTk5MTc4NUYyNCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgMjEuMiAoV2luZG93cykiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpCQTM1NTA1NTlGNkUxMUVCOTBERkJCQjZBREY2NUQzNiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpCQTM1NTA1NjlGNkUxMUVCOTBERkJCQjZBREY2NUQzNiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PpayvVgAAAgsSURBVHja7J1pyFVFGMfn1ev+aqZlmmkimUW0SPlBTD+URqVhZPYliko/JIVlfpBS2gzBojKlRFqMKFuJaLMvJpWlhSYtopGk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"></image>
                                      </defs>
                                  </svg>
                                </a>
                                @else
                                <a href="{{ route('signin') }}" title="Add to favourite">
                                <svg class="me-2" width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                      <rect width="26" height="27" fill="url(#pattern0)"></rect>
                                      <defs>
                                      <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                      <use xlink:href="#image0" transform="translate(0 -0.00365497) scale(0.00657895 0.00633528)"></use>
                                      </pattern>
                                      <image id="image0" width="152" height="159" xlink:href="data:image/png;base64,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UmVhZHlxyWU8AAADI2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNi4wLWMwMDIgNzkuMTY0NDYwLCAyMDIwLzA1LzEyLTE2OjA0OjE3ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpDMTY4NDJEQUEzOTcxMUVCOTI3RkY4OTk5MTc4NUYyNCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpDMTY4NDJEOUEzOTcxMUVCOTI3RkY4OTk5MTc4NUYyNCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgMjEuMiAoV2luZG93cykiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpCQTM1NTA1NTlGNkUxMUVCOTBERkJCQjZBREY2NUQzNiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpCQTM1NTA1NjlGNkUxMUVCOTBERkJCQjZBREY2NUQzNiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PpayvVgAAAgsSURBVHja7J1pyFVFGMfn1ev+aqZlmmkimUW0SPlBTD+URqVhZPYliko/JIVlfpBS2gzBojKlRFqMKFuJaLMvJpWlhSYtopGk5lbu5pLLq2/Pw50ot9e5596ZM+ec3x/+WDjXM3fmd2eeM2tdY2OjQciXmlEECMAQgCEEYAjAEIAhBGAIwBCAIQRgCMAQgCEEYChrKlX14VKJEjxeHcTn2T/TVIN4vXid+PBxf9nQED9g6Cj1Fo8XjxCfJW4ZQZ52iZeIp4s/TiMDddWsB6MFK5eheKR4prhrpHncJ54rnijeHrIFA7DqNUr8prh5BvL6ns1vbgDTl4jLxJeIe4q7iXuIzxR3EtfbdPvFW8UbxKvFa8SLxMvEhyKuMG2xVog7ZugHMU5b26wC1kJ8kfga8VDxFVUW/mbxq9YrIqysF8RjM9biapleLIBtzgpgbcWDxFeJrxX3saDtOUGsUp+wK9ktfk08W/xTRG+LS+z3zZqGCGDzswDY2Raskg0eN9uu7qD1sWot7iw+V3yh7T4H2K7GBbxt4vtswJr2bpW+4uUZib2O1f0C2HNZGKbYKH69ws9ofLX0f//fXtxPPEx8+ynexBTOORbMh1KOz9pkFC5j42CTBcBqIe3+vrSeJZ4sHt1Eeu1+J4h3iqem2JLVOaZbZd/eQkjH4m5xSNe8SIAd27qNEf8oftacfCpLK/dh24LOSSmvpzmm09H0BwPl6UZHwIIp1rnIGeJJ4gNNpNGR8iniXgZFq5gnu6eJ3z9Fmu62pUMAVrE0tnrJlCdtm9JwG/QjAKtYC015rOlUceRdVCWAJZGOpS1wSDfCsLYNwBLKZcRZ5zkHB85Xa/DJB2A6juQyoDoQwAAsifaa8hSRC2DNqVIAq1Q6FvaXQzqddG5LlQJYpdLucZ9DOp14bx8wX23AJx+AuUpbr5Dr4FuBT7EAQwDmNQZDAJZIOmV0xDFtfcB8dQGf4nWRIZcf1YEPMRgCMCftpaoAzKdc196H7CK7gk/xush6qhTAEIBFp4NUFYD51D7HdCFXUxCDEYMhAKutGPwEsETi1lQA86pdVBWAxaB2AZ/FmvwCAtYi4LM6gk/xAEMAlkhMdgOYV7meWMuuIgDzqg5UKYAhACMGQ8UCbLdjOo4OADCvOoMqBTAEYNHpEFUFYD61I8Lvsx188gOY687uzgHzxDLuAsZgvEUCGAKw+BRjvLMHfPIDmGu8Uw9gAOZT7CoCsNyI+dEcARZjd7QbfIoHmG7EKBUYegDzrJCA0UUSg3nVPoogX4Adjiw/B8AnP4Dtd4x5Qk4VEYPlrAVzOZ+ivQm345q3SGIwr/qbIgAwn9IDWY5QDPkA7GCEMY/maScI5QMwbSlcdnfrxttQN67pi8cOECpWF9ks4HfSGIxLuojBvEnHwTZRDPkArMF2SbFpPQgVC7DQt97+DkLF6iJbBv5Oa0GIGMynfqUI8gFYJbfehtRvIJQPwCq5tztkDLZFvBmMitVFdgr8vJ/BiBjMp36hCADMp9ZRBPkA7I9I87UcjIrVgoU+5fB7MCoWYKXAz9PpotWgRAzmU19TBNkHLOYTBb8ApewD5nrCThq3oM03bAIpTBfZKoVnrjGMhxGDeZTOlX5CMWQbsP2R5+8rwy6jTAPmuoOnXUr5W2yYlyxEF5nWlX562s4HIEUM5lMv8zaZXcCyEN/oGv13wSqbgG1xTNci5Xy+aDi3Itdd5OkpP/9b8RuglV/A6lJ+vo6JPWrKg68ARhF40QbxJIoh/NKWapS1k2zmis8XX0kLlg25juTHdK3y40V/q2TBoV8dsW+VAIa8QgZgGRDn0gOYV7nu7G5HtRKv+FQf8R0BnqPjbV0c0unRU9sCfffLAcx/LNNLPIe2gy6yUm2gumqmPwHseGk3w3FJtdFyADuxPoKNqqXHTf0AYCfWXMO692r1jgl4tmzWAPtOPM6475FER+sb8QME+U3refFkw8BrpdJ1aiPEhwDs1HpKPNCUN1nEsgZe14HpWWEx3amkl7jqTqfbTHlVx9bQGahrbGxM/OFSKfVhNP2BdBNfKu6RYj50ibTu7F5pyrua+tl8pSn94a2weTpuCXdDQwOAJZAeAKyXMejNt7qNLM3Num1MedrqsG3VDsVUUKEAy8tUUS/xKPFIcXcLmHYHi8SviJcat9vaqv7BigeJbxBfZ8r7AxQsPZ3xM/FbtqVrNAVR1lswBelO8XRz8klubUF06miC8Xs7Wr14mniMOflR6tqSPSmeUpQWLOuATRRPdXxZmSe+2dPbpxbEDPFYx/T3imcHalVTBSzLCw4H2+EK1++gXZavMaB7xHdXkH6meAhdZLwtmEKl00bXV/g5PU+1v6ntidXtTXmOtNK9APNszJjKJl1asKZ1gQ2mK9U54mE1zstwk2yjyVBxz7y3YFkFrKdtOZKovwfYk8ZtfQEsTrWu4rO1PmKzmuOiugFYnKpm0LLWU0vV/HubACxO6fzajoSfrfWZ9isTfk5nGpYBWJxamxCUNeKFNc7LpybZ5fB69PlGAItXjyV4xddVGLVe269nZjxhKpv+0dZLZx8OA1i80vnFRxwrVivyQ/EsT3nRqai3HdPq7b1PixeYAijLgClYz5jy9E9TJ+/8ez7ETcbfJLOusB1tyvOMTY1g6uqO8faHUQjlZblOV1PebHu1KR+ZVLJx0ee25Vpswq1g0LVgt4oHiHtbqFaZ8jn6c+1/p65MTHYjlOcuEgEYAjCEAAwBGEIAhgAMARhCAIYADAEYQgCGAAwBGEIAhgAMof/0jwADAGJPnbGCRG4RAAAAAElFTkSuQmCC"></image>
                                      </defs>
                                  </svg>
                                </a>
                                @endif


                    @if(Auth::check())
                    <a href="javascript:void(0)" class="add-to-cart" id="add-to-cart" data-productid="{{ @$recent_product['id'] }}" title="Add To Cart">
                      <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.2812 19.4219C19.2812 19.8965 18.8965 20.2812 18.4219 20.2812H17.5625V21.1406C17.5625 21.6153 17.1778 22 16.7031 22C16.2285 22 15.8438 21.6153 15.8438 21.1406V20.2812H14.9844C14.5097 20.2812 14.125 19.8965 14.125 19.4219C14.125 18.9472 14.5097 18.5625 14.9844 18.5625H15.8438V17.7031C15.8438 17.2285 16.2285 16.8438 16.7031 16.8438C17.1778 16.8438 17.5625 17.2285 17.5625 17.7031V18.5625H18.4219C18.8965 18.5625 19.2812 18.9472 19.2812 19.4219ZM19.2812 6.01562V14.2656C19.2812 14.7403 18.8965 15.125 18.4219 15.125C17.9472 15.125 17.5625 14.7403 17.5625 14.2656V6.875H15.8438V9.45312C15.8438 9.92776 15.459 10.3125 14.9844 10.3125C14.5097 10.3125 14.125 9.92776 14.125 9.45312V6.875H5.875V9.45312C5.875 9.92776 5.49026 10.3125 5.01562 10.3125C4.54099 10.3125 4.15625 9.92776 4.15625 9.45312V6.875H2.4375V20.2812H11.5469C12.0215 20.2812 12.4062 20.666 12.4062 21.1406C12.4062 21.6153 12.0215 22 11.5469 22H1.57812C1.10349 22 0.71875 21.6153 0.71875 21.1406V6.01562C0.71875 5.54099 1.10349 5.15625 1.57812 5.15625H4.1969C4.53829 2.25685 7.01036 0 10 0C12.9896 0 15.4617 2.25685 15.8031 5.15625H18.4219C18.8965 5.15625 19.2812 5.54099 19.2812 6.01562ZM14.0674 5.15625C13.7391 3.20783 12.0403 1.71875 10 1.71875C7.95971 1.71875 6.2609 3.20783 5.93262 5.15625H14.0674Z" fill="black"/>
                     </svg>
                  </a>
                  @else
                  <a href="javascript:void(0)" class="add-to-cart" id="add-to-cart" data-productid="{{ @$recent_product['id'] }}" title="Add To Cart">
                     <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.2812 19.4219C19.2812 19.8965 18.8965 20.2812 18.4219 20.2812H17.5625V21.1406C17.5625 21.6153 17.1778 22 16.7031 22C16.2285 22 15.8438 21.6153 15.8438 21.1406V20.2812H14.9844C14.5097 20.2812 14.125 19.8965 14.125 19.4219C14.125 18.9472 14.5097 18.5625 14.9844 18.5625H15.8438V17.7031C15.8438 17.2285 16.2285 16.8438 16.7031 16.8438C17.1778 16.8438 17.5625 17.2285 17.5625 17.7031V18.5625H18.4219C18.8965 18.5625 19.2812 18.9472 19.2812 19.4219ZM19.2812 6.01562V14.2656C19.2812 14.7403 18.8965 15.125 18.4219 15.125C17.9472 15.125 17.5625 14.7403 17.5625 14.2656V6.875H15.8438V9.45312C15.8438 9.92776 15.459 10.3125 14.9844 10.3125C14.5097 10.3125 14.125 9.92776 14.125 9.45312V6.875H5.875V9.45312C5.875 9.92776 5.49026 10.3125 5.01562 10.3125C4.54099 10.3125 4.15625 9.92776 4.15625 9.45312V6.875H2.4375V20.2812H11.5469C12.0215 20.2812 12.4062 20.666 12.4062 21.1406C12.4062 21.6153 12.0215 22 11.5469 22H1.57812C1.10349 22 0.71875 21.6153 0.71875 21.1406V6.01562C0.71875 5.54099 1.10349 5.15625 1.57812 5.15625H4.1969C4.53829 2.25685 7.01036 0 10 0C12.9896 0 15.4617 2.25685 15.8031 5.15625H18.4219C18.8965 5.15625 19.2812 5.54099 19.2812 6.01562ZM14.0674 5.15625C13.7391 3.20783 12.0403 1.71875 10 1.71875C7.95971 1.71875 6.2609 3.20783 5.93262 5.15625H14.0674Z" fill="black"/>
                     </svg>
                  </a>
                  @endif
               </div>
            </div>
            @if(Auth::check())
            <div class="product-wishlist position-absolute end-0 pe-3">
               <button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
            </div>
            @endif
         </div>
      </div>
   </div>
   </div>
   @endforeach
   @endif
   
	</div>
</section>
@endsection

