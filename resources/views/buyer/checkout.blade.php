@extends('layouts.buyer')
@section('title', 'Checkout')
@section('content')
<section class="mt-96 pb-5 ">
  <div class="container pt-4">
    <form method="post" action="{{ route('payment') }}">
      <div class="row">
        @if(isset($carts) && !empty($carts))
  			<div class="col-lg-8">
          @csrf
          <input type="hidden" name="total_price" value="{{ $total_price }}">
          <input type="hidden" name="total_quantity" value="{{ $c_total_quantity }}">
          
          @if(count($addresses) > 0)
            <h5 class="f-600">Select Address:</h5>
            @foreach($addresses as $address)

              <p><input type="radio" name="address" {{ $address['default'] == '1' ? 'checked' : '' }} value="{{ $address['id'] }}"> {{ $address['address'] }}, {{ $address['country'] }} {{ $address['state'] }} {{ $address['city']}}, {{ $address['pincode'] }}</p>
              
            @endforeach
          @else
          @endif
            <button type="button" class="btn btn-dark rounded-pill py-3 px-3 mb-3" data-bs-toggle="modal" data-bs-target="#addressModal">Add New Address</button>
        
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
                      <div class="d-flex justify-content-between  mb-4">
                          <h5 class="f-600">Total Quantity</h5>
                          <h3 class="fw-bold"><span class="total_price">{{ $c_total_quantity }}</span></h3>
                      </div>
                      <div class="d-flex justify-content-between  mb-4">
                          <h5 class="f-600">Total Price</h5>
                          <h3 class="fw-bold">$<span class="total_price">{{ $total_price }}</span></h3>
                      </div>
                      <button type="submit" class="btn btn-dark rounded-pill py-3 px-3 mb-3">Checkout</button>
                      <div>
                          <a href="{{ route('products') }}" class="text--primary text-decoration-none f-600">
                              Back to Products
                          </a>
                      </div>
                  </div>
              </div>
        </div>
        @else
        <div class="col-lg-12">
          <div class="d-flex justify-content-center align-items-center">
            <div class="text-center">
              <img class="img-fluid" src="{{ asset('assets/images/no-data.png') }}" alt="">
              <h2 class="fw-bold mb-3">No product found in the cart</h2>
              <a href="{{ route('products') }}" class=""><h3 class="fw-bold">Shop</h3></a>
            </div>
          </div>
        </div>
        @endif
      </div>
    </form>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addressModalLabel">Add New Address</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="address">
        	@csrf
          <div class="row">
            <div class="col-lg-12">
              <div class="mb-4">
                  <!-- <label for="exampleFormControlInput1" class="form-label">Country</label> -->
                  <div class="custom-urban-form">
                      <input class="form-control" type="text" placeholder="Enter Country" name="country" value="" id="country">
                      <i class="fas fa-pen"></i>
                  </div>
                  <span class="error">{{ $errors->first('country') }}</span>
              </div>

              <div class="mb-4">
                  <!-- <label for="exampleFormControlInput1" class="form-label">State</label> -->
                  <div class="custom-urban-form">
                      <input class="form-control" type="text" placeholder="Enter State" name="state" value="" id="state">
                      <i class="fas fa-pen"></i>
                  </div>
                  <span class="error">{{ $errors->first('state') }}</span>
              </div>

              <div class="mb-4">
                  <!-- <label for="exampleFormControlInput1" class="form-label">State</label> -->
                  <div class="custom-urban-form">
                      <input class="form-control" type="text" placeholder="Enter City" name="city" value="" id="city">
                      <i class="fas fa-pen"></i>
                  </div>
                  <span class="error">{{ $errors->first('city') }}</span>
              </div>

              <div class="mb-4">
                  <!-- <label for="exampleFormControlInput1" class="form-label">State</label> -->
                  <div class="custom-urban-form">
                      <input class="form-control" type="text" placeholder="Enter Pincode" name="pincode" value="" id="pincode">
                      <i class="fas fa-pen"></i>
                  </div>
                  <span class="error">{{ $errors->first('pincode') }}</span>
              </div>

              <div class="mb-4 ">
                  <label for="exampleFormControlTextarea1" class="form-label ">Description</label>
                  <div class="custom-urban-form">
                      <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Enter Address" rows="5" name="address"></textarea>
                      <i class="fas fa-pen textarea-icon"></i>
                  </div>
                  <span class="error">{{ $errors->first('address') }}</span>
              </div>
        	<!-- <input type="text" name="country" placeholder="Enter Country" id="country"> -->
        	<!-- <input type="text" name="state" placeholder="Enter State" id="state"> -->
        	<!-- <input type="text" name="city" placeholder="Enter City" id="city"> -->
        	<!-- <input type="text" name="pincode" placeholder="Enter Pincode" id="pincode"> -->
        	<!-- <input type="text" name="address" placeholder="Enter Address" id="address"> -->
        	<button type="submit" class="btn btn-dark rounded-pill py-3 px-3 mb-3">Save changes</button>
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