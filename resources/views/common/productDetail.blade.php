@extends('layouts.guest')
@section('title','Home')
@section('content')

	<section class="mt-96   pb-3 ">
    <div class="container pt-4">
      <div class="row">
        <div class="col-lg-5 mb-4">
          <!-- item-slider  -->
          
          
          <div class="cart-slider">
            <div class="slider slider-for mb-4">
            	@if(isset($product->product_image))
            	@foreach($product->product_image as $image)
            		<div>
		                <img class="avatar-slider mx-auto br-10" src="{{ asset( $image->file) }}" alt="" height="200">
		              </div>
            	@endforeach
            	@endif
              <!-- <div>
                <img class="avatar-slider mx-auto br-10" src="{{ asset( @$product->product_image[0]->file) }}" alt="">
              </div>

              <div>
                <img class="avatar-slider mx-auto br-10" src="../assets/images/cart-slider/1.png" alt="">
              </div>
              <div>
               <img class="avatar-slider mx-auto br-10" src="../assets/images/cart-slider/1.png" alt="">
              </div>
              <div>
                <img class="avatar-slider mx-auto br-10" src="../assets/images/cart-slider/1.png" alt="">
              </div>
              <div>
                <img class="avatar-slider mx-auto br-10" src="../assets/images/cart-slider/1.png" alt="">
              </div>
              <div>
                <img class="avatar-slider mx-auto br-10" src="../assets/images/cart-slider/1.png" alt="">
              </div>
              <div>
               <img class="avatar-slider mx-auto br-10" src="../assets/images/cart-slider/1.png" alt="">
              </div>
              <div>
                <img class="avatar-slider mx-auto br-10" src="../assets/images/cart-slider/1.png" alt="">
              </div>
             
 -->              
            </div>
            <div class="slider slider-nav">

            	@if(isset($product->product_image))
            	@foreach($product->product_image as $product)
            		<div class="me-3">
		               <img class="avatar-80 br-10" src="{{ asset($product->file) }}" alt="">
		              </div>
            	@endforeach
            	@endif
              
              <!-- <div class="me-3">
                <img class="avatar-80 br-10" src="../assets/images/cart-slider/1.png" alt="">
              </div class="me-3">
              <div class="me-3">
               <img class="avatar-80 br-10" src="../assets/images/cart-slider/1.png" alt="">
              </div >
              <div class="me-3">
                <img class="avatar-80 br-10" src="../assets/images/cart-slider/1.png" alt="">
              </div>
              <div class="me-3">
               <img class="avatar-80 br-10" src="../assets/images/cart-slider/1.png" alt="">
              </div>
              <div class="me-3">
                <img class="avatar-80 br-10" src="../assets/images/cart-slider/1.png" alt="">
              </div class="me-3">
              <div class="me-3">
               <img class="avatar-80 br-10" src="../assets/images/cart-slider/1.png" alt="">
              </div >
              <div class="me-3">
                <img class="avatar-80 br-10" src="../assets/images/cart-slider/1.png" alt="">
              </div>
 -->              
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <h2 class="fw-bold mb-4">{{ @$product->name }}</h2>
          <h5 class="f-600">{{ @$product->brand }}</h5>
          <div class="d-flex flex-wrap mb-4">
            <div class="d-flex">
              <span class="text--primary f-600 me-2 ">4.0 
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </span>
            </div>
            <span class="text-mute border-r-grey pe-2 ">(223)</span>
            <span class="d-flex align-items-center">
              <svg class="mx-2" width="19" height="14" viewBox="0 0 19 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.34246 13.0735L0.283273 7.26158C-0.0807523 6.91241 -0.0807523 6.34628 0.283273 5.99708L1.60155 4.73257C1.96557 4.38337 2.55583 4.38337 2.91986 4.73257L7.00162 8.64771L15.7443 0.261876C16.1083 -0.087292 16.6986 -0.087292 17.0626 0.261876L18.3809 1.52638C18.7449 1.87555 18.7449 2.44169 18.3809 2.79089L7.66078 13.0735C7.29671 13.4227 6.70649 13.4227 6.34246 13.0735Z" fill="#BABABA"/>
              </svg>
              
              <div class="border-r-grey pe-2">
                <h6 class="f-600 mb-0">4,320 <span class="fw-normal">Sold</span></h6>
              </div>
            </span>
            <div class=" d-flex border-r-grey pe-2 mb-0 align-items-center">
              <svg class="mx-2" width="26" height="17" viewBox="0 0 26 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25.416 7.96239C23.0757 3.55296 18.4424 0.56958 13.1371 0.56958C7.83186 0.56958 3.19726 3.55504 0.858169 7.9628C0.759445 8.15138 0.708008 8.35972 0.708008 8.57102C0.708008 8.78232 0.759445 8.99067 0.858169 9.17924C3.19856 13.5887 7.83186 16.572 13.1371 16.572C18.4424 16.572 23.077 13.5866 25.416 9.17882C25.5148 8.99025 25.5662 8.78191 25.5662 8.57061C25.5662 8.3593 25.5148 8.15096 25.416 7.96239ZM13.1371 14.5717C11.908 14.5717 10.7065 14.2198 9.68448 13.5604C8.6625 12.901 7.86597 11.9638 7.3956 10.8673C6.92524 9.77074 6.80217 8.56416 7.04196 7.40009C7.28175 6.23603 7.87363 5.16676 8.74275 4.32752C9.61187 3.48827 10.7192 2.91674 11.9247 2.68519C13.1302 2.45365 14.3798 2.57249 15.5153 3.02668C16.6509 3.48088 17.6215 4.25003 18.3043 5.23688C18.9872 6.22372 19.3517 7.38394 19.3517 8.57081C19.3521 9.35897 19.1916 10.1395 18.8794 10.8677C18.5673 11.596 18.1095 12.2576 17.5324 12.815C16.9552 13.3723 16.27 13.8143 15.5158 14.1157C14.7616 14.4172 13.9533 14.5721 13.1371 14.5717ZM13.1371 4.5702C12.7673 4.57519 12.3999 4.62831 12.0448 4.72814C12.3375 5.11223 12.478 5.58489 12.4407 6.0604C12.4035 6.53592 12.191 6.9828 11.8418 7.32C11.4926 7.6572 11.0298 7.86239 10.5373 7.89836C10.0449 7.93433 9.55539 7.7987 9.15763 7.51607C8.93113 8.32185 8.97202 9.17594 9.27453 9.95811C9.57705 10.7403 10.126 11.4112 10.844 11.8763C11.5621 12.3415 12.4131 12.5775 13.2774 12.5511C14.1416 12.5247 14.9755 12.2373 15.6617 11.7293C16.3479 11.2214 16.8519 10.5184 17.1027 9.71932C17.3535 8.92027 17.3385 8.06539 17.0597 7.27502C16.781 6.48464 16.2526 5.79857 15.549 5.31336C14.8453 4.82815 14.0018 4.56823 13.1371 4.5702Z" fill="#BABABA"/>
                </svg>
                <h6 class="f-600 mb-0">1.4K Viewed</h6>
            </div>
            <div class="d-flex align-items-center">
              <svg class="mx-2" width="24" height="18" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.4536 1.72456C18.9595 -0.0361952 15.2501 0.280515 12.9608 2.23733L12.0642 3.00271L11.1676 2.23733C8.88276 0.280515 5.16885 -0.0361952 2.6747 1.72456C-0.183561 3.74547 -0.333757 7.37255 2.22411 9.56313L11.031 17.0963C11.5999 17.5827 12.5239 17.5827 13.0928 17.0963L21.8997 9.56313C24.4621 7.37255 24.3119 3.74547 21.4536 1.72456Z" fill="#D4AF37"/>
                </svg>
              <a href="#" class="text--primary text-decoration-none">Add To wishlist</a>
            </div>
          </div>
          <div class="d-flex align-items-center border-bottom pb-4 mb-4">
            <h2 class="text--primary f-600 mb-0 me-3">${{ @$product->price }}</h2>
            <h4 class="mb-0 text-decoration-line-through text-mute">{{ @$product->compare_price }}</h4>
          </div>

          <h5 class="mb-4">{{ @$product->description }}</h5>

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
                <div class="number text-dark fs-5 f-600 quantity">0</div>
              <button 
                class="btn value-button increase-button" 
                onclick="increaseValue(this, 5)"
                title="Arrtır"
              >
              <svg width="14" height="15" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.52007 0.773926V7.33494H15.7364V10.2634H9.52007V16.8564H6.32401V10.2634H0.139648V7.33494H6.32401V0.773926H9.52007Z" fill="#D2D2D2"/>
                </svg>
                
              </button>
            </div>
            <button type="button" class="btn btn--primary z-btn-text-white py-2 px-4 rounded-pill mb-3 me-3">Buy Now</button>
            @if(Auth::check())
            <a href="javascript:void(0)" class="add-to-cart btn btn-dark z-btn-text-white py-2 px-4 rounded-pill mb-3" id="add-to-cart" data-productid="{{ $product->id }}">Add to Cart</a>
            @else
            <a href="{{ route('signin') }}" class="btn btn-dark z-btn-text-white py-2 px-4 rounded-pill mb-3">Add to Cart</a>
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
              <button class="nav-link  py-3" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Specification</button>
              <button class="nav-link py-3" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Discussion</button>
              <button class="nav-link py-3" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review" aria-selected="false">Reviews (223)</button>
            </div>
          </nav>
          <div class="tab-content px-4" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <h2 class="fw-bold mb-3">See the best picture no matter where you sit</h2>
              <p class="text-mute">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
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
      </div>

      <!-- loadmore started  -->
      <div class="row loadmore">
         
        <!-- loadmore content started  -->

        @if(isset($recent_products) && !empty($recent_products))
        @foreach($recent_products as $recent_product)
        <div class="col-lg-3 col-md-6 col-sm-6">
                 
            <div class="card product-item border-0 shadow br-12 mb-5">
              <div class="card-body ">
                <img class="img-fluid br-12 mb-3" src="{{ productDefaultImage($recent_product['id'])}}" alt="">
               <h5 class="fw-bold">{{ @$recent_product['name'] }}</h5>
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
                
              </div>
              <div class="card-footer bg-transparent">
                <div class="d-flex justify-content-between flex-wrap py-2">
                  <h5 class="mb-0">${{ @$recent_product['price'] }} </h5>
                  <div class="d-flex align-items-center">
                   
                    <a href="#" class="mr-13 link-primary-hover">
                      <i class="far fa-heart text-20 text-muted"></i> 
                    </a>
                    @if(Auth::check())
                    <a href="javascript:void(0)" class="add-to-cart" id="add-to-cart" data-productid="{{ $product->id }}">
                      <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.2812 19.4219C19.2812 19.8965 18.8965 20.2812 18.4219 20.2812H17.5625V21.1406C17.5625 21.6153 17.1778 22 16.7031 22C16.2285 22 15.8438 21.6153 15.8438 21.1406V20.2812H14.9844C14.5097 20.2812 14.125 19.8965 14.125 19.4219C14.125 18.9472 14.5097 18.5625 14.9844 18.5625H15.8438V17.7031C15.8438 17.2285 16.2285 16.8438 16.7031 16.8438C17.1778 16.8438 17.5625 17.2285 17.5625 17.7031V18.5625H18.4219C18.8965 18.5625 19.2812 18.9472 19.2812 19.4219ZM19.2812 6.01562V14.2656C19.2812 14.7403 18.8965 15.125 18.4219 15.125C17.9472 15.125 17.5625 14.7403 17.5625 14.2656V6.875H15.8438V9.45312C15.8438 9.92776 15.459 10.3125 14.9844 10.3125C14.5097 10.3125 14.125 9.92776 14.125 9.45312V6.875H5.875V9.45312C5.875 9.92776 5.49026 10.3125 5.01562 10.3125C4.54099 10.3125 4.15625 9.92776 4.15625 9.45312V6.875H2.4375V20.2812H11.5469C12.0215 20.2812 12.4062 20.666 12.4062 21.1406C12.4062 21.6153 12.0215 22 11.5469 22H1.57812C1.10349 22 0.71875 21.6153 0.71875 21.1406V6.01562C0.71875 5.54099 1.10349 5.15625 1.57812 5.15625H4.1969C4.53829 2.25685 7.01036 0 10 0C12.9896 0 15.4617 2.25685 15.8031 5.15625H18.4219C18.8965 5.15625 19.2812 5.54099 19.2812 6.01562ZM14.0674 5.15625C13.7391 3.20783 12.0403 1.71875 10 1.71875C7.95971 1.71875 6.2609 3.20783 5.93262 5.15625H14.0674Z" fill="black"/>
                      </svg>
                    </a>
                    @else
                    <a href="{{ route('signin') }}">
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
        @endforeach
        @endif
        
        <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                 
            <div class="card product-item border-0 shadow br-12 mb-5">
              <div class="card-body ">
                <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
               <h5 class="fw-bold">Peachy Umbrella</h5>
               <div class="d-flex align-items-center justify-content-between flex-wrap">
                 <div class="bg-text rounded-pill px-3 py-2">
                    <h6 class="mb-0 f-600">Jhonathan Doe</h6>
                 </div>
                <div class="d-flex my-2">
                  <i class="fas fa-star me-2 text--primary text-13"></i>
                  <i class="fas fa-star me-2 text--primary text-13"></i>
                  <i class="fas fa-star me-2 text--primary text-13"></i>
                  <i class="fas fa-star me-2 text--primary text-13"></i>
                  <i class="fas fa-star text--primary text-13"></i>
                </div>
               </div>
                
              </div>
              <div class="card-footer bg-transparent">
                <div class="d-flex justify-content-between flex-wrap py-2">
                  <h5 class="mb-0">$150.00</h5>
                  <div class="d-flex align-items-center">
                   
                    <a href="#" class="mr-13 link-primary-hover">
                      <i class="far fa-heart text-20 text-muted"></i> 
                    </a>
                    <a href="#" class=" mb-2 link-primary-hover">
                      <svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.2812 19.4219C20.2812 19.8965 19.8965 20.2812 19.4219 20.2812H18.5625V21.1406C18.5625 21.6153 18.1778 22 17.7031 22C17.2285 22 16.8438 21.6153 16.8438 21.1406V20.2812H15.9844C15.5097 20.2812 15.125 19.8965 15.125 19.4219C15.125 18.9472 15.5097 18.5625 15.9844 18.5625H16.8438V17.7031C16.8438 17.2285 17.2285 16.8438 17.7031 16.8438C18.1778 16.8438 18.5625 17.2285 18.5625 17.7031V18.5625H19.4219C19.8965 18.5625 20.2812 18.9472 20.2812 19.4219ZM20.2812 6.01562V14.2656C20.2812 14.7403 19.8965 15.125 19.4219 15.125C18.9472 15.125 18.5625 14.7403 18.5625 14.2656V6.875H16.8438V9.45312C16.8438 9.92776 16.459 10.3125 15.9844 10.3125C15.5097 10.3125 15.125 9.92776 15.125 9.45312V6.875H6.875V9.45312C6.875 9.92776 6.49026 10.3125 6.01562 10.3125C5.54099 10.3125 5.15625 9.92776 5.15625 9.45312V6.875H3.4375V20.2812H12.5469C13.0215 20.2812 13.4062 20.666 13.4062 21.1406C13.4062 21.6153 13.0215 22 12.5469 22H2.57812C2.10349 22 1.71875 21.6153 1.71875 21.1406V6.01562C1.71875 5.54099 2.10349 5.15625 2.57812 5.15625H5.1969C5.53829 2.25685 8.01036 0 11 0C13.9896 0 16.4617 2.25685 16.8031 5.15625H19.4219C19.8965 5.15625 20.2812 5.54099 20.2812 6.01562ZM15.0674 5.15625C14.7391 3.20783 13.0403 1.71875 11 1.71875C8.95971 1.71875 7.2609 3.20783 6.93262 5.15625H15.0674Z" fill="black"/>
                        </svg>
                        
                    </a>
                      
                  </div>
                </div>
                <div class="product-wishlist position-absolute end-0 pe-3">
                  <button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
                </div>
              </div>
            </div>
          
        </div>
        
        <div class="col-lg-3 col-md-6 col-sm-6">
                 
            <div class="card product-item border-0 shadow br-12 mb-5">
              <div class="card-body ">
                <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
               <h5 class="fw-bold">Peachy Umbrella</h5>
               <div class="d-flex align-items-center justify-content-between flex-wrap">
                 <div class="bg-text rounded-pill px-3 py-2">
                    <h6 class="mb-0 f-600">Jhonathan Doe</h6>
                 </div>
                <div class="d-flex my-2">
                  <i class="fas fa-star me-2 text--primary text-13"></i>
                  <i class="fas fa-star me-2 text--primary text-13"></i>
                  <i class="fas fa-star me-2 text--primary text-13"></i>
                  <i class="fas fa-star me-2 text--primary text-13"></i>
                  <i class="fas fa-star text--primary text-13"></i>
                </div>
               </div>
                
              </div>
              <div class="card-footer bg-transparent">
                <div class="d-flex justify-content-between flex-wrap py-2">
                  <h5 class="mb-0">$150.00</h5>
                  <div class="d-flex align-items-center">
                   
                    <a href="#" class="mr-13 link-primary-hover">
                      <i class="far fa-heart text-20 text-muted"></i> 
                    </a>
                    <a href="#" class=" mb-2 link-primary-hover">
                      <svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.2812 19.4219C20.2812 19.8965 19.8965 20.2812 19.4219 20.2812H18.5625V21.1406C18.5625 21.6153 18.1778 22 17.7031 22C17.2285 22 16.8438 21.6153 16.8438 21.1406V20.2812H15.9844C15.5097 20.2812 15.125 19.8965 15.125 19.4219C15.125 18.9472 15.5097 18.5625 15.9844 18.5625H16.8438V17.7031C16.8438 17.2285 17.2285 16.8438 17.7031 16.8438C18.1778 16.8438 18.5625 17.2285 18.5625 17.7031V18.5625H19.4219C19.8965 18.5625 20.2812 18.9472 20.2812 19.4219ZM20.2812 6.01562V14.2656C20.2812 14.7403 19.8965 15.125 19.4219 15.125C18.9472 15.125 18.5625 14.7403 18.5625 14.2656V6.875H16.8438V9.45312C16.8438 9.92776 16.459 10.3125 15.9844 10.3125C15.5097 10.3125 15.125 9.92776 15.125 9.45312V6.875H6.875V9.45312C6.875 9.92776 6.49026 10.3125 6.01562 10.3125C5.54099 10.3125 5.15625 9.92776 5.15625 9.45312V6.875H3.4375V20.2812H12.5469C13.0215 20.2812 13.4062 20.666 13.4062 21.1406C13.4062 21.6153 13.0215 22 12.5469 22H2.57812C2.10349 22 1.71875 21.6153 1.71875 21.1406V6.01562C1.71875 5.54099 2.10349 5.15625 2.57812 5.15625H5.1969C5.53829 2.25685 8.01036 0 11 0C13.9896 0 16.4617 2.25685 16.8031 5.15625H19.4219C19.8965 5.15625 20.2812 5.54099 20.2812 6.01562ZM15.0674 5.15625C14.7391 3.20783 13.0403 1.71875 11 1.71875C8.95971 1.71875 7.2609 3.20783 6.93262 5.15625H15.0674Z" fill="black"/>
                        </svg>
                        
                    </a>
                      
                  </div>
                </div>
                <div class="product-wishlist position-absolute end-0 pe-3">
                  <button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
                </div>
              </div>
            </div>
          
        </div>
        
        <div class="col-lg-3 col-md-6 col-sm-6">
                 
            <div class="card product-item border-0 shadow br-12 mb-5">
              <div class="card-body ">
                <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
               <h5 class="fw-bold">Peachy Umbrella</h5>
               <div class="d-flex align-items-center justify-content-between flex-wrap">
                 <div class="bg-text rounded-pill px-3 py-2">
                    <h6 class="mb-0 f-600">Jhonathan Doe</h6>
                 </div>
                <div class="d-flex my-2">
                  <i class="fas fa-star me-2 text--primary text-13"></i>
                  <i class="fas fa-star me-2 text--primary text-13"></i>
                  <i class="fas fa-star me-2 text--primary text-13"></i>
                  <i class="fas fa-star me-2 text--primary text-13"></i>
                  <i class="fas fa-star text--primary text-13"></i>
                </div>
               </div>
                
              </div>
              <div class="card-footer bg-transparent">
                <div class="d-flex justify-content-between flex-wrap py-2">
                  <h5 class="mb-0">$150.00</h5>
                  <div class="d-flex align-items-center">
                   
                    <a href="#" class="mr-13 link-primary-hover">
                      <i class="far fa-heart text-20 text-muted"></i> 
                    </a>
                    <a href="#" class=" mb-2 link-primary-hover">
                      <svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.2812 19.4219C20.2812 19.8965 19.8965 20.2812 19.4219 20.2812H18.5625V21.1406C18.5625 21.6153 18.1778 22 17.7031 22C17.2285 22 16.8438 21.6153 16.8438 21.1406V20.2812H15.9844C15.5097 20.2812 15.125 19.8965 15.125 19.4219C15.125 18.9472 15.5097 18.5625 15.9844 18.5625H16.8438V17.7031C16.8438 17.2285 17.2285 16.8438 17.7031 16.8438C18.1778 16.8438 18.5625 17.2285 18.5625 17.7031V18.5625H19.4219C19.8965 18.5625 20.2812 18.9472 20.2812 19.4219ZM20.2812 6.01562V14.2656C20.2812 14.7403 19.8965 15.125 19.4219 15.125C18.9472 15.125 18.5625 14.7403 18.5625 14.2656V6.875H16.8438V9.45312C16.8438 9.92776 16.459 10.3125 15.9844 10.3125C15.5097 10.3125 15.125 9.92776 15.125 9.45312V6.875H6.875V9.45312C6.875 9.92776 6.49026 10.3125 6.01562 10.3125C5.54099 10.3125 5.15625 9.92776 5.15625 9.45312V6.875H3.4375V20.2812H12.5469C13.0215 20.2812 13.4062 20.666 13.4062 21.1406C13.4062 21.6153 13.0215 22 12.5469 22H2.57812C2.10349 22 1.71875 21.6153 1.71875 21.1406V6.01562C1.71875 5.54099 2.10349 5.15625 2.57812 5.15625H5.1969C5.53829 2.25685 8.01036 0 11 0C13.9896 0 16.4617 2.25685 16.8031 5.15625H19.4219C19.8965 5.15625 20.2812 5.54099 20.2812 6.01562ZM15.0674 5.15625C14.7391 3.20783 13.0403 1.71875 11 1.71875C8.95971 1.71875 7.2609 3.20783 6.93262 5.15625H15.0674Z" fill="black"/>
                        </svg>
                        
                    </a>
                      
                  </div>
                </div>
                <div class="product-wishlist position-absolute end-0 pe-3">
                  <button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
                </div>
              </div>
            </div>
          
        </div>
         -->
       
                 
 
      </row>
    </section>

@endsection