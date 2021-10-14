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
          <input type="file" class="d-none" id="avatar-file" />
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
      <div class="dropdown --dropdown">
        <button
          class="btn btn-dark"
          type="button"
          id="dropdownMenu2"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          <svg
            class=""
            width="24"
            height="24"
            viewBox="0 0 41 28"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M34.9389 8.76727C34.9426 7.03618 34.4327 5.3429 33.4737 3.90175C32.5146 2.4606 31.1496 1.33636 29.5513 0.671335C27.9531 0.00630573 26.1934 -0.169619 24.4952 0.165827C22.7969 0.501272 21.2363 1.33301 20.0109 2.55576C18.7855 3.77852 17.9505 5.33732 17.6114 7.03488C17.2723 8.73243 17.4444 10.4924 18.106 12.0921C18.7676 13.6918 19.889 15.0592 21.328 16.0214C22.7671 16.9835 24.4593 17.4971 26.1904 17.4971C28.5074 17.4971 30.7298 16.5779 32.3699 14.9413C34.0101 13.3047 34.934 11.0843 34.9389 8.76727ZM20.945 8.76727C20.945 7.72983 21.2527 6.71569 21.829 5.85309C22.4054 4.9905 23.2246 4.31819 24.1831 3.92118C25.1416 3.52417 26.1962 3.42029 27.2137 3.62268C28.2312 3.82508 29.1659 4.32465 29.8994 5.05823C30.633 5.79181 31.1326 6.72644 31.335 7.74395C31.5374 8.76145 31.4335 9.81612 31.0365 10.7746C30.6395 11.733 29.9672 12.5523 29.1046 13.1286C28.242 13.705 27.2278 14.0126 26.1904 14.0126C24.7992 14.0126 23.4651 13.46 22.4814 12.4763C21.4977 11.4926 20.945 10.1584 20.945 8.76727Z"
              fill="currentColor"
            />
            <path
              d="M12.74 27.7628C13.14 27.9937 13.6153 28.0562 14.0614 27.9368C14.5076 27.8174 14.888 27.5257 15.1192 27.1259C15.8825 25.811 16.9747 24.7173 18.2884 23.9521C19.6021 23.1868 21.0923 22.7764 22.6126 22.761H29.6001C31.12 22.7782 32.6095 23.1894 33.9229 23.9545C35.2363 24.7196 36.3288 25.8123 37.0935 27.1259C37.327 27.5283 37.7109 27.8215 38.1606 27.941C38.6103 28.0604 39.089 27.9963 39.4914 27.7628C39.8939 27.5293 40.1871 27.1455 40.3065 26.6958C40.426 26.2461 40.3619 25.7674 40.1284 25.3649C39.0484 23.5095 37.5012 21.9694 35.6409 20.8979C33.7806 19.8264 31.672 19.2609 29.5252 19.2578H22.6875C20.5388 19.2628 18.4291 19.8311 16.5686 20.906C14.7081 21.9809 13.162 23.5248 12.0844 25.3837C11.9708 25.5828 11.8977 25.8025 11.8692 26.0299C11.8407 26.2574 11.8574 26.4883 11.9183 26.7093C11.9792 26.9304 12.0832 27.1372 12.2242 27.318C12.3652 27.4987 12.5405 27.6499 12.74 27.7628Z"
              fill="currentColor"
            />
            <path
              d="M15.7 12.2708C15.7 10.8888 15.2902 9.5378 14.5224 8.3887C13.7546 7.23959 12.6633 6.34398 11.3865 5.8151C10.1097 5.28623 8.70469 5.14785 7.34923 5.41747C5.99377 5.68709 4.7487 6.35259 3.77147 7.32982C2.79424 8.30705 2.12874 9.55212 1.85912 10.9076C1.5895 12.263 1.72788 13.668 2.25675 14.9448C2.78563 16.2216 3.68124 17.3129 4.83035 18.0807C5.97945 18.8486 7.33043 19.2584 8.71244 19.2584C10.5641 19.2534 12.3386 18.5156 13.6479 17.2063C14.9573 15.8969 15.6951 14.1225 15.7 12.2708ZM8.71244 15.7552C8.01958 15.7552 7.34228 15.5498 6.76619 15.1648C6.1901 14.7799 5.74109 14.2328 5.47594 13.5927C5.2108 12.9525 5.14142 12.2482 5.27659 11.5686C5.41176 10.8891 5.74541 10.2649 6.23533 9.77495C6.72526 9.28502 7.34946 8.95138 8.02901 8.81621C8.70855 8.68104 9.41292 8.75041 10.053 9.01556C10.6932 9.2807 11.2403 9.72971 11.6252 10.3058C12.0101 10.8819 12.2156 11.5592 12.2156 12.2521C12.2156 13.1812 11.8465 14.0722 11.1895 14.7292C10.5326 15.3861 9.64153 15.7552 8.71244 15.7552Z"
              fill="currentColor"
            />
            <path
              d="M6.27661 21C4.23301 21.0096 2.2526 21.7094 0.656572 22.9857C0.476984 23.1297 0.327501 23.3075 0.216658 23.5092C0.105814 23.7109 0.0357815 23.9325 0.0105578 24.1612C-0.0146658 24.39 0.00541353 24.6214 0.0696497 24.8424C0.133886 25.0634 0.241021 25.2696 0.384937 25.4492C0.528854 25.6288 0.706734 25.7783 0.908421 25.8891C1.11011 26 1.33165 26.07 1.5604 26.0952C1.78916 26.1204 2.02064 26.1004 2.24163 26.0361C2.46262 25.9719 2.6688 25.8647 2.84839 25.7208C3.82948 24.929 5.05328 24.499 6.31408 24.5032H9.33017C9.79471 24.5032 10.2402 24.3186 10.5687 23.9901C10.8972 23.6616 11.0817 23.2161 11.0817 22.7516C11.0817 22.287 10.8972 21.8415 10.5687 21.513C10.2402 21.1845 9.79471 21 9.33017 21H6.27661Z"
              fill="currentColor"
            />
          </svg>
        </button>

        <div
          class="dropdown-menu dropdown-follow border-0 shadow p-3"
          aria-labelledby="dropdownMenu2"
        >
          <nav class="mb-2">
            <div
              class="nav nav-tabs border-0 justify-content-between"
              id="nav-tab"
              role="tablist"
            >
              <button
                class="nav-link active border-0 ps-0 fw-bold"
                id="nav-home-tab"
                data-bs-toggle="tab"
                data-bs-target="#nav-home"
                type="button"
                role="tab"
                aria-controls="nav-home"
                aria-selected="true"
              >
                Followers
              </button>
              <button
                class="nav-link border-0 pe-0 fw-bold"
                id="nav-profile-tab"
                data-bs-toggle="tab"
                data-bs-target="#nav-profile"
                type="button"
                role="tab"
                aria-controls="nav-profile"
                aria-selected="false"
              >
                Following
              </button>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div
              class="tab-pane fade show active"
              id="nav-home"
              role="tabpanel"
              aria-labelledby="nav-home-tab"
            >
              <!-- search followers  -->
              <!--<div class="custom-form-group-search position-relative mb-3">
                <input
                  type="text"
                  class="form-control mw-100"
                  placeholder="Search Followers"
                />
                <i class="fas fa-search text--primary"></i>
              </div>-->

              <div class="follow-list mh-400" data-simplebar>
                <!-- followers  -->
                @if(count($get_followers) > 0)
                  @foreach($get_followers as $follower)
                    <div class="d-flex align-items-center justify-content-between mb-3">
                      <div class="d-flex align-items-center pt-2">
                        @if(!is_null($follower->profile_pic))
                          <img class="me-2 {{ $follower->user_id }}" src="../assets/images/small-av-trash.png" alt=""/>
                        @else
                          <img class="me-2 {{ $follower->user_id }}" src="../assets/images/small-av-trash.png" alt=""/>
                        @endif
                        <div>
                          <a href="#" class="text-dark">
                            <h6 class="f-600 d-inline-block mw-150 mb-0 text-truncate">
                              {{$follower->first_name}}
                            </h6>
                          </a>
                        </div>
                      </div>
                      <!--button type="button" class="btn btn-outline-dark rounded-pill">
                        <h6 class="mb-0 text-14">Follow</h6>
                      </button-->
                      <a class="btn btn-outline-dark rounded-pill" href="{{ route('buyerDeleteFollower',  \Illuminate\Support\Facades\Crypt::encrypt($follower->id)) }}">
                        <h6 class="mb-0 text-14">Unfollow</h6>
                      </a>
                    </div>
                  @endforeach
                @else	
                <div class="row text-center">
                  <h5>No follower here!</h5>
                </div>
                @endif
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="nav-profile"
              role="tabpanel"
              aria-labelledby="nav-profile-tab"
            >
              <!-- search following  -->
              <!--<div class="custom-form-group-search position-relative mb-3">
                <input
                  type="text"
                  class="form-control mw-100"
                  placeholder="Search Following"
                />
                <i class="fas fa-search text--primary"></i>
              </div>-->

              <div class="follow-list mh-400" data-simplebar>
                <!-- following  -->
                @if(count($get_followings) > 0)
                  @foreach($get_followings as $following)
                    <div class="d-flex align-items-center justify-content-between mb-3">
                      <div class="d-flex align-items-center pt-2">
                        <img class="me-2 {{ $following->follower_id }}" src="../assets/images/small-av-trash.png" alt=""/>
                        <div>
                          <a href="#" class="text-dark">
                            <h6 class="f-600 d-inline-block mw-150 mb-0 text-truncate">
                              {{$following->first_name}}
                            </h6>
                          </a>
                        </div>
                      </div>
                      <a class="btn btn-outline-dark rounded-pill" href="{{ route('buyerDeleteFollower',  \Illuminate\Support\Facades\Crypt::encrypt($following->id)) }}">
                        <h6 class="mb-0 text-14">Unfollowing</h6>
                      </a>
                    </div>
                  @endforeach
                @else	
                <div class="row text-center">
                  <h5>No following here!</h5>
                </div>
                @endif
              </div>
            </div>
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
                  {{$followers}} Sellers
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection