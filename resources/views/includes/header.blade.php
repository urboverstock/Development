  <header class="">
    <nav class="navbar navbar-expand-lg navbar-fixed-top navbar-light fixed-top bg-white">
      <div class="container-fluid px-5">
        <a class="navbar-brand" href="{{url('/')}}">
          <img src="{{ asset('assets/images/logo.png') }}" alt="">
        </a>
        
        <div class="custom-form-group-search position-relative 	d-none d-lg-block">
            <form action="{{ route('search-products') }}">
                <input name="search" type="text" class="form-control" placeholder="Search brands...." />
                <i class="fas fa-search text--primary"></i>
            </form>
        </div>
        <div class="d-flex align-items-center">
          <a href="#" class="text-dark me-4 fw-bold text-decoration-none  d-none d-lg-block">
            <i class="fas fa-shopping-bag fs-4"></i>
          </a>
          <a href="{{ route('signin') }}" class="text-dark me-4 fw-bold text-decoration-none d-none d-lg-block">Login</a>
          <div class="hamburger-menu">
            <div class="line line-1"> </div>
            <div class="line line-3"> </div>
          </div>
        </div>
        <div class="custom-navbar">
          
          <ul class="nav-list">
            <li class="custom-nav-item">
              <a href="#z-home" class="custom-nav-link">Home</a>
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
        
      </div>
    </nav>
  </header>