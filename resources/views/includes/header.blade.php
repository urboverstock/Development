  <header class="">
    <nav class="navbar navbar-expand-lg navbar-fixed-top navbar-light fixed-top bg-white">
      <div class="container-fluid px-5">
        <a class="navbar-brand" href="{{url('/')}}">
          <img src="{{ asset('assets/images/logo.png') }}" alt="">
        </a>
        
        <div class="custom-form-group-search  	d-none d-lg-block">
            <form class="position-relative" action="{{ route('search-products') }}">
                <input name="searchproduct" type="text" class="form-control" required value="{{ request()->get('searchproduct') }}" placeholder="Search for your favourite brands" />
                <button type="submit" class="transparent-button btn position-absolute top-50 end-0 translate-middle-y"><i class="fas fa-search text--primary"></i></button>
            </form>
        </div>
        <div class="d-flex align-items-center">
          @if(Auth::check())
          <a href="{{ route('carts') }}" class="text-dark me-4 fw-bold text-decoration-none  d-none d-lg-block">
            <i class="fas fa-shopping-bag fs-4"></i>
          </a>
          @else
            <!-- <a href="{{ route('signin') }}" class="text-dark me-4 fw-bold text-decoration-none  d-none d-lg-block"> -->
            <!-- <i class="fas fa-shopping-bag fs-4"></i> -->
          </a>
          @endif

          <a href="{{ route('carts') }}" class="text-dark me-4 fw-bold text-decoration-none d-none d-lg-block">
            <div class="d-flex align-items-start">
              <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0)">
                <path d="M25.9794 7.82004C25.7683 7.5992 25.4753 7.47437 25.1696 7.47437H3.83067C3.52571 7.47437 3.23345 7.59881 3.02195 7.81891C2.8108 8.03868 2.69797 8.33536 2.71026 8.64031C2.71547 8.76141 3.19907 20.8091 3.41991 25.7843C3.47638 27.5875 4.95368 29.0001 6.78295 29.0001H22.1799C24.0092 29.0001 25.4865 27.5871 25.5422 25.7978L26.2896 8.64405C26.3031 8.33876 26.1906 8.04088 25.9794 7.82004ZM23.3014 25.7141C23.2834 26.2896 22.7804 26.7578 22.1799 26.7578H6.78295C6.18239 26.7578 5.67936 26.2896 5.66067 25.6995C5.48016 21.6343 5.12513 12.8767 4.99769 9.7166H23.9983L23.3014 25.7141Z" fill="black"/>
                <path d="M14.4814 0C10.8755 0 7.94147 2.93398 7.94147 6.53995V14.8737C7.94147 15.493 8.44336 15.9949 9.06261 15.9949C9.68187 15.9949 10.1838 15.493 10.1838 14.8737V6.53995C10.1838 4.17022 12.1118 2.24229 14.4814 2.24229C16.8511 2.24229 18.7791 4.17028 18.7791 6.53995V14.8737C18.7791 15.493 19.281 15.9949 19.9002 15.9949C20.5195 15.9949 21.0214 15.493 21.0214 14.8737V6.53995C21.0214 2.93398 18.0873 0 14.4814 0Z" fill="black"/>
                </g>
                <defs>
                <clipPath id="clip0">
                <rect width="29" height="29" fill="white"/>
                </clipPath>
                </defs>
              </svg>

              <span class="badge bg-dark ms-1 cart_count">{{ cartCount(getPhysicalAddressOfPC() )}}</span>
            </div>

          </a>

          <a href="{{ route('signin') }}" class="text-dark me-4 fw-bold text-decoration-none d-none d-lg-block">Login</a>

          @if(!Auth::check())
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
              <a href="{{route('products')}}" class="custom-nav-link">Product</a>
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