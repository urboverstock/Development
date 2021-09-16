<?php
    use App\Models\User;
    $user = User::find(Auth::user()->id);
?>

<header class="">
  <nav
    class="
      navbar navbar-expand-lg navbar-fixed-top navbar-light
      fixed-top
      bg-white
    "
  >
    <div class="container px-0">
      <a class="navbar-brand" href="{{url('/')}}">
        <img src="{{ asset('assets/images/logo.png') }}" alt="" />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav admin-dashboard-navbar ms-auto mb-2 mb-lg-0">
          <li class="nav-item me-4">
            <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard') }}"
              >DASHBOARD</a
            >
          </li>
          <li class="nav-item me-4">
            <a class="nav-link" href="#">ORDERS</a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">PRODUCTS</a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link" href="#">CHAT</a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link" href="#">ACCOUNT</a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link" href="#">SETTINGS</a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link" href="{{ route('admin.logout') }}">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<section class="pb-0">
  <div class="sub-header-dashboard">
    <div class="container">
      <div
        class="d-flex justify-content-between align-items-center flex-wrap"
      >
        <h5 class="--left mb-0">Hello, Welcome Here</h5>
        <div class="d-flex align-items-center">
          <div class="position-relative me-3">
            <div class="dropdown">
              <button
                class="btn admin-header-button bg-white"
                type="button"
                id="dropdownMenuButton1"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <svg
                  width="32"
                  height="32"
                  viewBox="0 0 32 32"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M16 0C13.6529 0 11.7432 1.90975 11.7432 4.25688V5.54125H13.945V4.25688C13.945 3.12369 14.8672 2.20181 16 2.20181C17.1332 2.20181 18.0555 3.12363 18.0555 4.25688V5.54125H20.2573V4.25688C20.2573 1.90975 18.3472 0 16 0Z"
                    fill="#FBDD73"
                  />
                  <path
                    d="M19.0093 26.8253C19.0093 28.4646 17.6757 29.7981 16.0368 29.7981H15.9634C14.3245 29.7981 12.9909 28.4646 12.9909 26.8253H10.7891C10.7891 29.6789 13.1102 32 15.9634 32H16.0368C18.8899 32 21.2111 29.6789 21.2111 26.8253H19.0093Z"
                    fill="#FBDD73"
                  />
                  <path
                    d="M30.2468 26.4139L27.1191 21.5482V15.3027C27.1191 9.1108 22.1308 4.07336 15.9998 4.07336C9.86847 4.07336 4.88059 9.1108 4.88059 15.3027V21.5482L1.7529 26.4136C1.5349 26.7522 1.51953 27.1831 1.71253 27.5365C1.90553 27.8899 2.27584 28.1101 2.67878 28.1101H29.321C29.7239 28.1101 30.0942 27.8899 30.2868 27.5369C30.4802 27.1835 30.4648 26.7527 30.2468 26.4139ZM4.69521 25.9082L6.90734 22.4668C7.02146 22.2896 7.0824 22.0826 7.0824 21.8716V15.3027C7.0824 10.3251 11.0828 6.27524 15.9998 6.27524C20.9173 6.27524 24.9173 10.3252 24.9173 15.3027V21.8716C24.9173 22.0826 24.9778 22.2892 25.092 22.4668L27.3041 25.9082H4.69521Z"
                    fill="#FBDD73"
                  />
                </svg>
                <div class="admin-header-badge">3</div>
              </button>
              <ul
                class="dropdown-menu"
                aria-labelledby="dropdownMenuButton1"
              >
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li>
                  <a class="dropdown-item" href="#">Another action</a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="dropdown">
            <button
              class="btn admin-header-button"
              type="button"
              id="dropdownMenuButton1"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <img
                class="avatar-56 admin-header-button"
                src="{{ asset('assets/images/square-img.png') }}"
                alt=""
              />
              <svg
                width="17"
                height="10"
                viewBox="0 0 17 10"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M14.8975 0.140047C14.4316 0.140047 13.9604 0.300079 13.5715 0.630999L8.52497 4.89865L3.42939 0.589177C3.03875 0.260057 2.5693 0.0982243 2.10338 0.0982243C1.4938 0.0982242 0.887721 0.372812 0.472558 0.901931C-0.261373 1.83656 -0.124763 3.21122 0.773842 3.97129L7.1972 9.40449C7.96969 10.0591 9.08024 10.0591 9.85273 9.40449L16.2253 4.01311C17.1256 3.25305 17.2605 1.8784 16.5283 0.943754C16.1114 0.414617 15.5071 0.140047 14.8975 0.140047Z"
                  fill="#D9B950"
                />
              </svg>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li>
                <a class="dropdown-item" href="#">Another action</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Something else here</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>