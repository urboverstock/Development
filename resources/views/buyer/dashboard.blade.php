@extends('layouts.buyer')
@section('title','Dashboard')
@section('content')

  <div class="mt-96 inner-profile-header bg-primary-lighten-2 pb-3 "> <img class="logged-wave-img position-absolute" src="../assets/images/wave-logg-seller.png" alt="">
    <div class="header-big-avatar d-inline-flex mb-lg-0 mb-4"> 
      <img class="img-fluid rounded-circle" data-aos="zoom-in-up" src="{{ $user['profile_img'] }}" style="max-width:300px;height: 300px;" alt="">
      <div class="d-inline-flex avatar-upload-wrapper">
        <label for="avatar-file"> <span class="p-3 bg-dark rounded-circle cursor-pointer" style="display: none !important">
                    <i class="fas fa-pencil-alt text-white"></i>
                  </span> </label>
        <input type="file" class="d-none" id="avatar-file" accept="image/*"> </div>
    </div>
    <div class="inner-profile-header-content --ver-2">
      <h1 class="display-5 f-600 me-3">
        <a style="text-decoration: none;color: #212529;" href="{{ route('guest-buyer', ['id' => $user['id']]) }}">
				{{ $user['full_name'] }}
        </a>
      </h1>

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
                  <p class="text-18 f-600">You have {{$total_pending_order}} Pending Orders Coming your way.</p>
                  <a href="{{ route('buyerOrderList') }}" 
                      type="button"
                      class="btn btn-dark rounded-pill fw-bold px-5 py-3"
                    >
                      View Orders
                    </a>
                </div> <img class="img-fluid ps-4 mt--28" src="../assets/images/man-mobile.png" alt=""> </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-5">
          <div class="card card-dashboard-hover flex-row align-items-center justify-content-center  br-24   h-100"> 
            <img class="w-80 me-4" src="../assets/images/icon/box-verified.png" alt="">
            
            <div>
              <h1 class="text-50 fw-bolder">{{$total_item_order}}</h1>
              <p class="text-25">Total Items
                <br> Ordered</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-5">
          <div class="card card-dashboard-hover py-4 flex-row align-items-center justify-content-center  br-24   h-100"> <img class="w-80 me-4" src="../assets/images/icon/heart.png" alt="">
            <div>
              <h1 class="text-50 fw-bolder">{{$total_item_favourite}}</h1>
              <p class="text-25">Favourite
                <br> Items Added</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-5">
          <div class="card card-dashboard-hover py-4 flex-row align-items-center justify-content-center  br-24   h-100"> <img class="w-80 me-4" src="../assets/images/icon/chat.png" alt="">
            <div>
              <h1 class="text-50 fw-bolder">{{$unread_msg_count}}</h1>
              <p class="text-25">New Message
                <br> from sellers</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-5">
          <div class="card card-dashboard-hover  py-4 flex-row align-items-center justify-content-center  br-24  h-100"> 
            <!-- <img class="w-80 me-4" src="../assets/images/icon/followers.png" alt=""> -->
            <svg class="w-80 me-4" width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_528:947)">
              <path d="M32.0057 64.4126H8.26042C7.37817 64.4126 6.57426 64.0037 6.05446 63.2905C5.53452 62.5771 5.39137 61.686 5.66153 60.8456C8.35926 52.4584 16.5865 46.6007 25.6684 46.6007C29.8942 46.6007 33.9523 47.8733 37.4041 50.2806C38.6404 51.1429 40.3415 50.8398 41.2042 49.6035C42.0663 48.3671 41.7632 46.6659 40.5269 45.8035C38.8181 44.6117 36.9927 43.6395 35.0831 42.8973C37.6238 40.5873 39.3092 37.3527 39.6021 33.7306C43.4544 29.9779 48.504 27.9217 53.9171 27.9217C58.1429 27.9217 62.201 29.1942 65.6528 31.6016C66.8891 32.4639 68.5903 32.1608 69.4529 30.9244C70.315 29.6881 70.0119 27.9869 68.7756 27.1245C67.0668 25.9327 65.2414 24.9605 63.3318 24.2182C66.1344 21.6701 67.8963 17.9967 67.8963 13.9195C67.8964 6.24436 61.6521 0 53.9768 0C46.3014 0 40.0572 6.24436 40.0572 13.9197C40.0572 17.9804 41.805 21.6407 44.588 24.1876C44.2072 24.3342 43.8292 24.49 43.4539 24.6552C41.746 25.4067 40.1397 26.3293 38.6466 27.4146C36.5865 22.2992 31.5719 18.6792 25.728 18.6792C18.0526 18.6792 11.8084 24.9236 11.8084 32.5989C11.8084 36.6477 13.5461 40.2984 16.3147 42.8444C8.91161 45.6187 2.90897 51.5766 0.465259 59.1746C-0.34521 61.6945 0.0840868 64.3666 1.64323 66.5059C3.20209 68.6448 5.61381 69.8716 8.26055 69.8716H32.0059C33.5133 69.8716 34.7352 68.6496 34.7352 67.1423C34.7352 65.635 33.5131 64.4126 32.0057 64.4126ZM53.977 5.45863C58.6424 5.45863 62.438 9.25422 62.438 13.9196C62.438 18.585 58.6424 22.3806 53.977 22.3806C49.3116 22.3806 45.516 18.585 45.516 13.9196C45.516 9.25422 49.3116 5.45863 53.977 5.45863ZM25.7281 24.1377C30.3935 24.1377 34.1891 27.9333 34.1891 32.5987C34.1891 37.2641 30.3935 41.0596 25.7281 41.0596C21.0628 41.0596 17.2672 37.2641 17.2672 32.5987C17.2672 27.9333 21.0628 24.1377 25.7281 24.1377Z" fill="#D4AF37"/>
              <path d="M68.7988 44.5816C67.5731 43.7041 65.8681 43.9863 64.9908 45.2122L51.5376 64.0037C51.1702 64.4297 50.7098 64.5217 50.4631 64.5381C50.2092 64.5555 49.7162 64.5225 49.2935 64.1202L40.5841 55.7574C39.4966 54.7131 37.7686 54.7485 36.7251 55.8357C35.6809 56.9229 35.7161 58.6508 36.8033 59.6947L45.5214 68.0657C46.8271 69.3086 48.57 70.0002 50.3632 70.0002C50.5173 70.0002 50.6718 69.9951 50.8263 69.9847C52.7797 69.8546 54.6035 68.9046 55.83 67.3786C55.8619 67.3391 55.8922 67.2987 55.9219 67.2576L69.4296 48.3896C70.3068 47.1639 70.0246 45.4591 68.7988 44.5816Z" fill="#D4AF37"/>
              </g>
              <defs>
              <clipPath id="clip0_528:947">
              <rect width="70" height="70" fill="white"/>
              </clipPath>
              </defs>
            </svg>

            <div>
              <p class="text-25">You are
                <br> following
                <br> {{$followers}} Sellers </p>
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
            @if(count($get_old_order_products) > 0)
            @foreach($get_old_order_products as $key => $get_old_order_product)
            <div class="custom-orders">
              <div class="card product-item border-0 shadow br-12 mb-5">
                <div class="card-body "> <img class="img-fluid br-12 mb-3" src="{{ productDefaultImage($get_old_order_product['id'])}}" alt="">
                  <h5 class="fw-bold">{{ $get_old_order_product['name'] }}</h5>
                  <h6>Order Status - Delivered</h6> </div>
                <div class="card-footer bg-transparent">
                  <div class="d-flex justify-content-between align-items-center flex-wrap py-2">
                    <h5 class="mb-0">${{ $get_old_order_product['price'] }}</h5>
                    <a href="{{ route('buy-now', $get_old_order_product['id']) }}" class="btn btn-dark rounded-pill text-12 px-4">Re-Order</a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            @endif
            
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
              <a href="{{ route('buyerOrderList') }}" class="btn btn-light rounded-pill mt-2 py-3 px-5 fw-bold">View Orders</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection