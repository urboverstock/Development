@extends('layouts.guest')
@section('title', 'Cart')
@section('content')
<section class="mt-96 pb-5 ">
    <div class="container pt-4">
      @if($carts && count($carts) > 0)
      <div class="row cart_main" data-cart_count="{{ count($carts) }}">
        <!-- <input type="hidden" value="{{ count($carts) }}" class="cart_count"> -->
        <span value="{{ count($carts) }}" class="cart_count" style="display: none;">{{ count($carts) }}</span>
          <div class="col-lg-8">
            <div class="d-flex flex-wrap border justify-content-between px-3 py-3 br-10 mb-4">
                <div class="form-check mb-3 mb-sm-0">
                    <input class="form-check-input form-product-list me-3" type="checkbox" value="" id="checkall">
                    <label class="form-check-label fw-bold" for="flexCheckDefault">
                      Select All
                    </label>
                </div>
                <div class="d-flex">
                    <!-- <a href="#" class="text--primary text-decoration-none fw-bold border-r-2-gray pe-3">UPDATE CART</a> -->
                    <a href="javascript:void(0)" class="text-dark text-decoration-none fw-bold  ps-3" id="delete_all_cart">REMOVE</a>
                </div>
            </div>
            
            @foreach($carts as $key => $cart)
            <div class="card border-0 shadow br-10 mb-5" id="cart-section{{ @$cart['id'] }}">
                <div class=" d-flex flex-wrap justify-content-between px-3 py-3 br-10">
                    <div class="form-check d-flex align-items-center mb-sm-3 mb-0">
                        <input class="form-check-input form-product-list me-3 delete_check" type="checkbox" name="checkbox[]" id="flexCheckDefault2" value="{{ @$cart['id'] }}">
                        <label class="form-check-label d-flex flex-wrap fw-bold mb-sm-3 mb-0" for="flexCheckDefault2">
                            <img class="avatar-lg br-10 me-4 mb-sm-0 mb-3" src="{{ productDefaultImage(@$cart['product']['id'])}}" alt="" width="100">
                            <div>
                                <a href="#" class="text-decoration-none text-dark">
                                    <h5 class="fw-bold mb-3">{{ @$cart['product']['name'] }}</h5>
                                </a>
                                <h5 class="text--primary f-600">${{ @$cart['p_price'] }}</h5>
                            </div>
                        </label>
                    </div>

                    <div class="d-flex align-items-end flex-wrap">
                        <div class="quantity-field rounded-pill border d-flex align-items-center  me-4">
                              <button class="btn value-button decrease-button decrease"data-cart_id="{{ @$cart['id'] }}"
                              data-url="{{ route('increase-decrease-cart', @$cart['id']) }}"
                              data-p_price="{{ @$cart['product']['price'] }}"> 
                                <svg width="14" height="15" viewBox="0 0 18 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.970703 0.209473H17.8388V3.76558H0.970703V0.209473Z" fill="#D2D2D2"></path>
                                </svg>
                              </button>

                            <div class="number text-dark fs-5 f-600" id="qty{{ @$cart['id'] }}">{{ @$cart['quantity'] }}</div>
                            <button class="btn value-button increase-button increase" 
                            data-url="{{ route('increase-decrease-cart', @$cart['id']) }}" data-cart_id="{{ @$cart['id'] }}" data-product_total_quantity="{{ @$cart['product']['quantity'] }}"
                            data-p_price="{{ @$cart['product']['price'] }}">
                                <svg width="14" height="15" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.52007 0.773926V7.33494H15.7364V10.2634H9.52007V16.8564H6.32401V10.2634H0.139648V7.33494H6.32401V0.773926H9.52007Z" fill="#D2D2D2"></path>
                                </svg>
                            </button>
                        </div>

                          <h5 class="text--primary f-600">$<span id="p_total_price{{ @$cart['id'] }}">{{ @$cart['p_total_price'] }}</span></h5>

                          @if(@$cart['product_offer_type'] == 1)
                          <h5>Free</h5>
                          @else
                          @if(isset($cart['product_offer']))
                          <h5>
                          <p>${{ @$cart['product_offer'] }}</p>
                          </h5>
                          @endif
                          @endif

                          @if(isset($cart['product_offer_type']))
                          <p>{{ isset($cart['product_offer_description']) ? $cart['product_offer_description'] : 'Product Discount' }}</p>
                          @endif

                        <button type="button" class="btn btn-outline-grey py-2 px-4 rounded-pill me-3 cart-remove remove_cart{{ $cart['id'] }}" data-url="{{ route('remove-cart', @$cart['id']) }}" data-cart="{{ @$cart['id'] }}" data-p_price="{{ @$cart['product']['price'] }}">
                            <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.3571 1.37501H12.5357L12.158 0.571492C12.078 0.399709 11.9548 0.255209 11.8022 0.154247C11.6496 0.0532863 11.4736 -0.000130108 11.2942 7.53359e-06H6.70179C6.52274 -0.000728544 6.34712 0.0524887 6.19506 0.153562C6.04299 0.254636 5.92062 0.399477 5.84196 0.571492L5.46429 1.37501H0.642857C0.472361 1.37501 0.308848 1.44744 0.188289 1.57637C0.0677294 1.7053 0 1.88017 0 2.06251L0 3.43751C0 3.61984 0.0677294 3.79471 0.188289 3.92364C0.308848 4.05257 0.472361 4.12501 0.642857 4.12501H17.3571C17.5276 4.12501 17.6912 4.05257 17.8117 3.92364C17.9323 3.79471 18 3.61984 18 3.43751V2.06251C18 1.88017 17.9323 1.7053 17.8117 1.57637C17.6912 1.44744 17.5276 1.37501 17.3571 1.37501ZM2.1375 20.0664C2.16816 20.59 2.38426 21.0815 2.74181 21.4407C3.09936 21.7999 3.57147 21.9999 4.06205 22H13.9379C14.4285 21.9999 14.9006 21.7999 15.2582 21.4407C15.6157 21.0815 15.8318 20.59 15.8625 20.0664L16.7143 5.50001H1.28571L2.1375 20.0664Z" fill="#A4A4A4"/>
                                </svg>
                                
                        </button>
                        <button type="button" class="btn btn--primary py-2 px-3 br-10 save-later-cart save-later-cart{{ $cart['id'] }}" data-url="{{ route('save-later-cart', $cart['id']) }}" data-cart="{{ $cart['id'] }}" data-p_price="{{ $cart['product']['price'] }}">Save to later</button>
                        <!--button type="button" class="btn btn--primary py-2 px-3 br-10 ">
                            <svg width="22" height="19" viewBox="0 0 22 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.8646 1.29915C17.51 -0.681392 14.0081 -0.325149 11.8468 1.87593L11.0003 2.73685L10.1538 1.87593C7.99686 -0.325149 4.49068 -0.681392 2.13603 1.29915C-0.562353 3.57232 -0.704147 7.65216 1.71065 10.1162L10.0249 18.5897C10.562 19.1368 11.4343 19.1368 11.9714 18.5897L20.2857 10.1162C22.7048 7.65216 22.563 3.57232 19.8646 1.29915Z" fill="white"/>
                                </svg>
                                
                        </button-->
                    </div>
                </div>
            </div>
            @endforeach
            
          </div>

          <div class="col-lg-4">
               
          @if(empty($apply_coupon))
             <a href="javascript:void(0);" class="text-decoration-none"  data-bs-toggle="modal" data-bs-target="#applyCouponModal">
                <div class="mb-4 border-primary align-items-center d-flex border justify-content-between bg-primary-lighten-3 px-3 py-3 br-10 mb-4">
                    <div class="d-flex align-items-center">
                        <svg class="me-3" width="34" height="22" viewBox="0 0 34 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.80801 5.37278H26.2148V16.1183H7.80801V5.37278ZM30.8164 10.7456C30.8164 12.2292 32.0526 13.432 33.5775 13.432V18.8047C33.5775 20.2884 32.3413 21.4911 30.8164 21.4911H3.20632C1.68144 21.4911 0.445312 20.2884 0.445312 18.8047V13.432C1.9702 13.432 3.20632 12.2292 3.20632 10.7456C3.20632 9.26189 1.9702 8.05917 0.445312 8.05917V2.68639C0.445312 1.20272 1.68144 0 3.20632 0H30.8164C32.3413 0 33.5775 1.20272 33.5775 2.68639V8.05917C32.0526 8.05917 30.8164 9.26189 30.8164 10.7456ZM28.0554 4.92505C28.0554 4.18321 27.4374 3.58185 26.6749 3.58185H7.34784C6.5854 3.58185 5.96734 4.18321 5.96734 4.92505V16.5661C5.96734 17.3079 6.5854 17.9093 7.34784 17.9093H26.6749C27.4374 17.9093 28.0554 17.3079 28.0554 16.5661V4.92505Z" fill="#D4AF37"/>
                        </svg>
                            
                        <h6 class="text--primary mb-0 f-600 ">I Have promo code</h6>
                    </div>
                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.41797 13V6.64562V0.291239L12.7723 6.64562L6.41797 13Z" fill="#D4AF37"/>
                    </svg>
                        
                </div>
            </a>
            @else
            <a href="javascript:void(0);" class="text-decoration-none" id="removeCoupon" data-coupon_id="{{ $apply_coupon->id }}" data-url="{{ route('remove_coupon') }}">
                <div class="mb-4 border-primary align-items-center d-flex border justify-content-between bg-primary-lighten-3 px-3 py-3 br-10 mb-4">
                    <div class="d-flex align-items-center">
                        <svg class="me-3" width="34" height="22" viewBox="0 0 34 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.80801 5.37278H26.2148V16.1183H7.80801V5.37278ZM30.8164 10.7456C30.8164 12.2292 32.0526 13.432 33.5775 13.432V18.8047C33.5775 20.2884 32.3413 21.4911 30.8164 21.4911H3.20632C1.68144 21.4911 0.445312 20.2884 0.445312 18.8047V13.432C1.9702 13.432 3.20632 12.2292 3.20632 10.7456C3.20632 9.26189 1.9702 8.05917 0.445312 8.05917V2.68639C0.445312 1.20272 1.68144 0 3.20632 0H30.8164C32.3413 0 33.5775 1.20272 33.5775 2.68639V8.05917C32.0526 8.05917 30.8164 9.26189 30.8164 10.7456ZM28.0554 4.92505C28.0554 4.18321 27.4374 3.58185 26.6749 3.58185H7.34784C6.5854 3.58185 5.96734 4.18321 5.96734 4.92505V16.5661C5.96734 17.3079 6.5854 17.9093 7.34784 17.9093H26.6749C27.4374 17.9093 28.0554 17.3079 28.0554 16.5661V4.92505Z" fill="#D4AF37"/>
                        </svg>
                            
                        <h6 class="text--primary mb-0 f-600 ">Remove promo code</h6>
                    </div>
                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.41797 13V6.64562V0.291239L12.7723 6.64562L6.41797 13Z" fill="#D4AF37"/>
                    </svg>
                        
                </div>
            </a>
          @endif
            <div class="card br-10">
                <div class="card-body text-center">
                    <h4 class="mb-4 fw-bold">Shopping Summary</h4>
                    @if(!empty($apply_coupon))
                     <div class="d-flex justify-content-between  mb-4">
                         <h5 class="f-600">Discount</h5>
                         <h3 class="fw-bold">
                         @if($apply_coupon['coupon']->type == 0)
                           <span class="total_price">{{ $apply_coupon['coupon']->price }}</span>%
                         @else
                           $<span class="total_price">{{ $apply_coupon['coupon']->price }}</span>
                         @endif
                         </h3>
                     </div>
                     @endif

                     @if(!empty($apply_coupon))
                    <div class="d-flex justify-content-between  mb-4">
                        <h5 class="f-600">Total After discount</h5>
                        <h3 class="fw-bold">
                          @if($apply_coupon['coupon']->type == 0)
                           $<span class="total_price">{{$total_price * (1 - $apply_coupon['coupon']->price / 100)}}</span>
                          @else
                           $<span class="total_price">{{ $total_price - $apply_coupon['coupon']->price }}</span>
                          @endif
                        </h3>
                    </div>
                    @else
                    <div class="d-flex justify-content-between  mb-4">
                        <h5 class="f-600">Total</h5>
                        <h3 class="fw-bold">$<span class="total_price">{{ $total_price }}</span></h3>
                    </div>
                    @endif

                    @if($total_offer !=0)
                    <div class="d-flex justify-content-between  mb-4">
                        <h5 class="f-600">Total Discount</h5>
                        <h3 class="fw-bold">$<span class="total_price">{{ $total_offer }}</span></h3>
                    </div>

                    <div class="d-flex justify-content-between  mb-4">
                        <h5 class="f-600">Total Price</h5>
                        <h3 class="fw-bold">$<span class="total_price">{{ $total_price - $total_offer }}</span></h3>
                    </div>                    
                    @endif
                    <!-- <button type="button" class="btn btn-dark rounded-pill py-3 px-3 mb-3">Load More Products</button> -->
                    <a href="{{ route('buyer.checkout') }}" class="btn btn-dark rounded-pill py-3 px-3 mb-3">Place Order</a>
                    <div>
                        <a href="{{ route('products') }}" class="text--primary text-decoration-none f-600">
                            Back to Products
                        </a>
                    </div>
                </div>
            </div>
          </div>

        @else
          <div class="d-flex justify-content-center align-items-center">
            <div class="text-center">
              <img class="img-fluid" src="{{ asset('assets/images/no-data.png') }}" alt="">
              <h2 class="fw-bold mb-3">No product found in the cart</h2>
              <a href="{{ route('products') }}" class=""><h3 class="fw-bold">Shop</h3></a>
            </div>
          </div>
      @endif
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
                  <a href="{{ route('product-detail', $recent_product['sku']) }}"><h5 class="fw-bold">{{ $recent_product['name'] }}</h5></a>
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
                     <h5 class="mb-0">${{ $recent_product['price'] }} </h5>
                     <div class="d-flex align-items-center">
                        <a href="#" class="mr-13 link-primary-hover">
                        <i class="far fa-heart text-20 text-muted"></i> 
                        </a>
                        @if(Auth::check())
                        <a href="javascript:void(0)" class="add-to-cart" id="add-to-cart" data-productid="{{ $recent_product['id'] }}">
                           <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M19.2812 19.4219C19.2812 19.8965 18.8965 20.2812 18.4219 20.2812H17.5625V21.1406C17.5625 21.6153 17.1778 22 16.7031 22C16.2285 22 15.8438 21.6153 15.8438 21.1406V20.2812H14.9844C14.5097 20.2812 14.125 19.8965 14.125 19.4219C14.125 18.9472 14.5097 18.5625 14.9844 18.5625H15.8438V17.7031C15.8438 17.2285 16.2285 16.8438 16.7031 16.8438C17.1778 16.8438 17.5625 17.2285 17.5625 17.7031V18.5625H18.4219C18.8965 18.5625 19.2812 18.9472 19.2812 19.4219ZM19.2812 6.01562V14.2656C19.2812 14.7403 18.8965 15.125 18.4219 15.125C17.9472 15.125 17.5625 14.7403 17.5625 14.2656V6.875H15.8438V9.45312C15.8438 9.92776 15.459 10.3125 14.9844 10.3125C14.5097 10.3125 14.125 9.92776 14.125 9.45312V6.875H5.875V9.45312C5.875 9.92776 5.49026 10.3125 5.01562 10.3125C4.54099 10.3125 4.15625 9.92776 4.15625 9.45312V6.875H2.4375V20.2812H11.5469C12.0215 20.2812 12.4062 20.666 12.4062 21.1406C12.4062 21.6153 12.0215 22 11.5469 22H1.57812C1.10349 22 0.71875 21.6153 0.71875 21.1406V6.01562C0.71875 5.54099 1.10349 5.15625 1.57812 5.15625H4.1969C4.53829 2.25685 7.01036 0 10 0C12.9896 0 15.4617 2.25685 15.8031 5.15625H18.4219C18.8965 5.15625 19.2812 5.54099 19.2812 6.01562ZM14.0674 5.15625C13.7391 3.20783 12.0403 1.71875 10 1.71875C7.95971 1.71875 6.2609 3.20783 5.93262 5.15625H14.0674Z" fill="black"/>
                           </svg>
                        </a>
                        @else
                        <a href="javascript:void(0)" class="add-to-cart" id="add-to-cart" data-productid="{{ $recent_product['id'] }}">
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
      </row>
    </section>


 <!-- Modal -->
 <div class="modal fade" id="applyCouponModal" tabindex="-1" aria-labelledby="couponModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="couponModalLabel">Apply Coupon</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form method="post" id="apply_coupon">
         	@csrf
           <div class="row">
             <div class="col-lg-12">
               <div class="mb-4">
                   <div class="custom-urban-form">
                       <input class="form-control" type="text" placeholder="Enter Coupon Code" name="coupon_code" value="" id="coupon_code">
                       <!--i class="fas fa-pen"></i-->
                   </div>
                   <span class="error">{{ $errors->first('coupon_code') }}</span>
               </div>
         	    <button type="submit" class="btn btn-dark rounded-pill py-3 px-3 mb-3">Apply Coupon</button>
             </div>
           </div>
         </form>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

       </div>
     </div>
   </div>
 </div>
 
@endsection