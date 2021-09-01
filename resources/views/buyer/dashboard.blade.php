@extends('layouts.buyer')
@section('title','Dashboard')
@section('content')

  <div class="mt-96 inner-profile-header bg-primary-lighten-2 pb-3 "> <img class="logged-wave-img position-absolute" src="../assets/images/wave-logg-seller.png" alt="">
    <div class="header-big-avatar d-inline-flex mb-lg-0 mb-4"> <img class="img-fluid " data-aos="zoom-in-up" src="{{ $user['profile_img'] }}" alt="">
      <div class="d-inline-flex avatar-upload-wrapper">
        <label for="avatar-file"> <span class="p-3 bg-dark rounded-circle cursor-pointer">
                    <i class="fas fa-pencil-alt text-white"></i>
                  </span> </label>
        <input type="file" class="d-none" id="avatar-file"> </div>
    </div>
    <div class="inner-profile-header-content --ver-2">
      <h1 class="display-5 f-600 me-3">{{ $user['full_name'] }}</h1>

      @if(!empty($user['about']))
        <h6 class="f-600 mb-2" data-aos="fade-up">Bio : {{ $user['about'] }}</h6>
      @endif
      <div class="small-line mb-2"></div>
      <p class="text-15 f-600"> Member Since - {{ date('d M, Y', strtotime($user->created_at)) }} </p>
        <div class="my-3 d-flex flex-wrap mt-4">
          <!--<div class="d-flex align-items-center me-3 mb-lg-0 mb-lg-0 mb-3">
            <div class="bg-white px-4 py-2 rounded-pill d-inline-block me-2">
              <h6 class="mb-0 f-600">5K+</h6>
            </div>
            <h5 class="mb-0 f-600">Items Sold</h5>
          </div>-->
          
          <div class="d-flex align-items-center me-3 mb-lg-0 mb-lg-0 mb-3">
            <div class="bg-white px-4 py-2 rounded-pill d-inline-block me-2">
              <h6 class="mb-0 f-600">{{$followers}}</h6>
            </div>
            <h5 class="mb-0 f-600">Followers</h5>
          </div>
          <div class="d-flex align-items-center me-3 mb-lg-0 mb-3">
            <div class="bg-white px-4 py-2 rounded-pill d-inline-block me-2">
              <h6 class="mb-0 f-600">{{$followings}}</h6>
            </div>
            <h5 class="mb-0 f-600">Following</h5>
          </div>
        </div>
    </div>
  </div>
  <!-- featured-select  -->
  <section class="pb-5">
    <div class="container-xl">
      <div class="row">
        <div class="col-lg-8 mb-5">
          <div class="card bg--primary-lighten br-24 border-0">
            <div class="card-body p-0">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="p-5">
                  <h1 class="text-38">Welcome Back,</h1>
                  <p class="text-18 f-600">You have 2 Pending Orders Coming your way.</p>
                  <button type="button" class="btn btn-dark rounded-pill fw-bold px-5 py-3">View Orders</button>
                </div> <img class="img-fluid ps-4 mt--28" src="../assets/images/man-mobile.png" alt=""> </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-5">
          <div class="card flex-row align-items-center justify-content-center  br-24  border-3-primary h-100"> <img class="w-80 me-4" src="../assets/images/icon/box-verified.png" alt="">
            <div>
              <h1 class="text-50 fw-bolder">155</h1>
              <p class="text-25">Total Items
                <br> Ordered</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-5">
          <div class="card py-4 flex-row align-items-center justify-content-center  br-24  border-3-primary h-100"> <img class="w-80 me-4" src="../assets/images/icon/heart.png" alt="">
            <div>
              <h1 class="text-50 fw-bolder">103</h1>
              <p class="text-25">Favourite
                <br> Items Added</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-5">
          <div class="card py-4 flex-row align-items-center justify-content-center  br-24  border-3-primary h-100"> <img class="w-80 me-4" src="../assets/images/icon/chat.png" alt="">
            <div>
              <h1 class="text-50 fw-bolder">24</h1>
              <p class="text-25">New Message
                <br> from sellers</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-5">
          <div class="card py-4 flex-row align-items-center justify-content-center  br-24  bg-dark h-100"> <img class="w-80 me-4" src="../assets/images/icon/followers.png" alt="">
            <div>
              <p class="text-25 text--primary">You are
                <br> following
                <br> 20 Sellers </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="pb-0">
    <div class="container ">
      <div class="row">
        <div class="col-lg-12 mb-5">
          <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div>
              <div class="urban-title text--primary position-relative mb-2">
                <p class="mb-0">List of</p>
              </div>
              <div class="urban-sub-title ust-100 mb-4">
                <p class="mb-0 pe-4">My Orders</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="orders">
            <div class="custom-orders">
              <div class="card product-item border-0 shadow br-12 mb-5">
                <div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
                  <h5 class="fw-bold">Peachy Umbrella</h5>
                  <h6>Order Status - Delivered</h6> </div>
                <div class="card-footer bg-transparent">
                  <div class="d-flex justify-content-between align-items-center flex-wrap py-2">
                    <h5 class="mb-0">$150.00</h5>
                    <button type="button" class="btn btn-dark rounded-pill text-12 px-4">Re-Order</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="custom-orders">
              <div class="card product-item border-0 shadow br-12 mb-5">
                <div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
                  <h5 class="fw-bold">Peachy Umbrella</h5>
                  <h6>Order Status - Delivered</h6> </div>
                <div class="card-footer bg-transparent">
                  <div class="d-flex justify-content-between align-items-center flex-wrap py-2">
                    <h5 class="mb-0">$150.00</h5>
                    <button type="button" class="btn btn-dark rounded-pill text-12 px-4">Re-Order</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="custom-orders">
              <div class="card product-item border-0 shadow br-12 mb-5">
                <div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
                  <h5 class="fw-bold">Peachy Umbrella</h5>
                  <h6>Order Status - Delivered</h6> </div>
                <div class="card-footer bg-transparent">
                  <div class="d-flex justify-content-between align-items-center flex-wrap py-2">
                    <h5 class="mb-0">$150.00</h5>
                    <button type="button" class="btn btn-dark rounded-pill text-12 px-4">Re-Order</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="custom-orders">
              <div class="card product-item border-0 shadow br-12 mb-5">
                <div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
                  <h5 class="fw-bold">Peachy Umbrella</h5>
                  <h6>Order Status - Delivered</h6> </div>
                <div class="card-footer bg-transparent">
                  <div class="d-flex justify-content-between align-items-center flex-wrap py-2">
                    <h5 class="mb-0">$150.00</h5>
                    <button type="button" class="btn btn-dark rounded-pill text-12 px-4">Re-Order</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="custom-orders">
              <div class="card product-item border-0 shadow br-12 mb-5">
                <div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
                  <h5 class="fw-bold">Peachy Umbrella</h5>
                  <h6>Order Status - Delivered</h6> </div>
                <div class="card-footer bg-transparent">
                  <div class="d-flex justify-content-between align-items-center flex-wrap py-2">
                    <h5 class="mb-0">$150.00</h5>
                    <button type="button" class="btn btn-dark rounded-pill text-12 px-4">Re-Order</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="custom-orders">
              <div class="card product-item border-0 shadow br-12 mb-5">
                <div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
                  <h5 class="fw-bold">Peachy last</h5>
                  <h6>Order Status - Delivered</h6> </div>
                <div class="card-footer bg-transparent">
                  <div class="d-flex justify-content-between align-items-center flex-wrap py-2">
                    <h5 class="mb-0">$150.00</h5>
                    <button type="button" class="btn btn-dark rounded-pill text-12 px-4">Re-Order</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="d-flex bg-dark justify-content-between flex-wrap br-24">
            <div class="col-lg-8 p-5">
              <div class="d-flex align-items-center  flex-sm-nowrap flex-wrap"> <img class="img-fluid me-4" src="../assets/images/icon/fire-percentage.png" alt="">
                <p class="mb-0 text-25 text-white "> Your Favourite Sellers are offering great discounts on the products that you saved already </p>
              </div>
            </div>
            <div class="p-5 border-left-buyer-dashboard">
              <button type="button" class="btn btn-light rounded-pill mt-2 py-3 px-5 fw-bold">View Orders</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection