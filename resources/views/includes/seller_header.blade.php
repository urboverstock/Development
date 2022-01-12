<?php
    use App\Models\User;
    $user = User::find(Auth::user()->id);
?>

<header class="">
    <nav class="navbar navbar-expand-lg navbar-fixed-top navbar-light fixed-top bg-white">
      <div class="container-fluid px-5">
        <a class="navbar-brand" href="{{ url('/') }}">
          <img class="navbar-logo-seller" src="{{ asset('assets/images/logo.png') }}" alt="">
        </a>
        
        <div class=" ">
          <form class="custom-form-group-search position-relative d-none d-lg-flex" action="{{ route('search-products') }}">
            <input type="text" class="form-control" placeholder="Search for your favourite brands" value="{{ request()->get('searchproduct') }}" name="searchproduct" />
            <button type="submit" class="btn"><i class="fas fa-search text--primary position-absolute end-0 me-4"  ></i></button>
          </form>
        </div>
        <div class="d-flex align-items-center">
          
          <a href="javascript:;" class="text-dark me-4 fw-bold text-decoration-none d-none d-lg-block" style="cursor: text;"><span class="text--primary">Welcome</span> {{ $user->first_name}}</a>
          <div class="dropdown">
            <div class="me-4 " data-bs-toggle="dropdown" aria-expanded="false">
              <img class="avatar-50 rounded-cricle " src="{{ $user->profile_img }}" alt="" style="cursor: pointer; border-radius: 50%; height: 50px">
            </div>
            <ul class="dropdown-menu dropdown-menu-end z-dropdown-higlight" aria-labelledby="dropdownMenuButton1">
               <!-- fw-bold -->
              <li><a class="dropdown-item border-bottom" href="{{ route('sellerView_profile') }}">My Profile</a></li>
              <li><a class="dropdown-item border-bottom" href="{{ route('sellerStore') }}">My Store</a></li>
              <li><a class="dropdown-item border-bottom" href="{{ route('sellerDashboard') }}">Dashboard</a></li>

              <li><a href="{{ route('sellerView_profile') }}" class="dropdown-item border-bottom">Products</a></li>
              <li><a class="dropdown-item border-bottom" href="{{ route('sellerAddProduct') }}
              ">Add Product</a></li>

              <li><a class="dropdown-item border-bottom" href="{{ route('sellerCoupon') }}
              ">Coupons</a></li>

              <li><a class="dropdown-item border-bottom" href="{{ route('sellerOrderList') }}
              ">Orders</a></li>

              <li><a class="dropdown-item border-bottom" href="{{ route('sellerWishlistProduct') }}
              ">Users Wishlist</a></li>

              <li><a class="dropdown-item border-bottom" href="{{ route('AllPost') }}
              ">All Posts</a></li>

              <li><a class="dropdown-item border-bottom" href="{{ route('sellerUserPost') }}
              ">My Post</a></li>

              <li><a class="dropdown-item border-bottom" href="{{ route('chat') }}
              ">Chat</a></li>

              @if($user->user_type != 4)
                <li>
                  <a class="dropdown-item border-bottom" href="{{ route('sellerListAdvertisement') }}">Advertisement</a>
                </li>
              @endif          
              <!-- <li><a class="dropdown-item border-bottom" href="javascript:;">Deliveries</a></li> -->
              <li><a href="{{ route('sellerDashboard') }}#z-contact" class="dropdown-item border-bottom">Contact Us</a>
              </li>
              <li class="logout_btn"><a class="dropdown-item border-bottom" href="javascript:;">Logout</a></li>
            </ul>
          </div>
        </div>
        @if(!Auth::check())
          <div class="hamburger-menu">
            <div class="line line-1"> </div>
            <div class="line line-3"> </div>
          </div>
          <div class="custom-navbar">
            <ul class="nav-list">
              <li class="custom-nav-item">
                <a href="{{ url('/') }}" class="custom-nav-link">Home</a>
              </li>
              <li class="custom-nav-item">
                <a href="#z-about" class="custom-nav-link">About Us</a>
              </li>
              <li class="custom-nav-item">
                <a href="#z-products" class="custom-nav-link">Product</a>
              </li>
              <li class="custom-nav-item">
                <a href="#z-contact" class="custom-nav-link">Contact Us</a>
              </li>
            </ul>
          </div>
        @endif
      </div>
    </nav>
  </header>