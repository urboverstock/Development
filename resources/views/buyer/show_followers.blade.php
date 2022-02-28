@extends('layouts.buyer')
@section('title','Dashboard')
@section('content')

<div class="mt-96 inner-profile-header bg-primary-lighten-2 pb-3">
      <img
        class="logged-wave-img position-absolute"
        src="../assets/images/wave-logg-seller.png"
        alt=""
      />
      <div class="header-big-avatar d-inline-flex mb-lg-0 mb-4">
        <img
          class="rounded-circle"
          style="max-width: 300px; height: 300px"
          data-aos="zoom-in-up"
          src="{{ $user['profile_img'] }}"
          alt=""
        />
        <div class="d-inline-flex avatar-upload-wrapper" style="display:none !important">
          <label for="avatar-file">
            <span class="p-3 bg-dark rounded-circle cursor-pointer">
              <i class="fas fa-pencil-alt text-white"></i>
            </span>
          </label>
          <input type="file" class="d-none" id="avatar-file" accept="image/*"/>
        </div>
      </div>

      <div class="inner-profile-header-content --ver-2">
        <h1 class="display-5 f-600 me-3">{{ $user['full_name'] }}</h1>
        <h6 class="f-600 mb-2">
          Bio : {{ $user['about'] }}
        </h6>
        <div class="small-line mb-2"></div>
        <p class="text-15 f-600">Member Since - {{ date('d M, Y', strtotime($user->created_at)) }}</p>
        <div class="d-flex flex-wrap">
          <div class="d-flex me-5 align-items-center">
            <img
              class="img-fluid me-2"
              src="/assets/images/svg/users.svg"
              alt=""
            />
            <h4 class="mb-0 fw-bold">{{$followings}} Following</h4>
          </div>
          <div class="d-flex me-3 align-items-center">
            <img
              class="img-fluid me-2"
              src="/assets/images/svg/users-completed.svg"
              alt=""
            />
            <h4 class="mb-0 fw-bold">{{$followers}} Follower</h4>
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
                    <p class="text-18 f-600">
                      You have {{$total_pending_order}} Pending Orders Coming your way.
                    </p>
                    <a href="{{ route('buyerOrderList') }}" 
                      type="button"
                      class="btn btn-dark rounded-pill fw-bold px-5 py-3"
                    >
                      View Orders
                    </a>
                  </div>
                  <img
                    class="img-fluid ps-4 mt--28"
                    src="../assets/images/man-mobile.png"
                    alt=""
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div
              class="
                card
                flex-row
                align-items-center
                justify-content-center
                br-24
                border-3-primary
                h-100
              "
            >
              <img
                class="w-80 me-4"
                src="../assets/images/icon/box-verified.png"
                alt=""
              />
              <div>
                <h1 class="text-50 fw-bolder">{{$total_item_order}}</h1>
                <p class="text-25">
                  Total Items <br />
                  Ordered
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div
              class="
                card
                py-4
                flex-row
                align-items-center
                justify-content-center
                br-24
                border-3-primary
                h-100
              "
            >
              <img
                class="w-80 me-4"
                src="../assets/images/icon/heart.png"
                alt=""
              />
              <div>
                <h1 class="text-50 fw-bolder">{{$total_item_favourite}}</h1>
                <p class="text-25">
                  Favourite
                  <br />
                  Items Added
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div
              class="
                card
                py-4
                flex-row
                align-items-center
                justify-content-center
                br-24
                border-3-primary
                h-100
              "
            >
              <img
                class="w-80 me-4"
                src="../assets/images/icon/chat.png"
                alt=""
              />
              <div>
                <h1 class="text-50 fw-bolder">{{$unread_msg_count}}</h1>
                <p class="text-25">
                  New Message
                  <br />
                  from sellers
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div
              class="
                card
                py-4
                flex-row
                align-items-center
                justify-content-center
                br-24
                bg-dark
                h-100
              "
            >
              <img
                class="w-80 me-4"
                src="../assets/images/icon/followers.png"
                alt=""
              />
              <div>
                <p class="text-25 text--primary">
                  You are <br />
                  following <br />
                  {{$followings}} Sellers
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection