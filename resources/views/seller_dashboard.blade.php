<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Urban Overstock</title>
  <!-- <link rel="shortcut icon" href="favicon.png" type="image/png"> -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" />

  <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
  <header class="">
    <nav class="navbar navbar-expand-lg navbar-fixed-top navbar-light fixed-top bg-white">
      <div class="container-fluid px-5">
        <a class="navbar-brand" href="#">
          <img src="{{ asset('assets/images/logo.png') }}" alt="">
        </a>
        
        <div class="custom-form-group-search position-relative 	d-none d-lg-block">
          <input type="text" class="form-control" placeholder="Search for your favourite brands" />
          <i class="fas fa-search text--primary"></i>
        </div>
        <div class="d-flex align-items-center">
          <a href="#" class="text-dark me-4 fw-bold text-decoration-none  d-none d-lg-block">
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
              <span class="badge bg-dark ms-1">2</span>
            </div>

          </a>

          <a href="#" class="text-dark me-4 fw-bold text-decoration-none d-none d-lg-block"><span class="text--primary">Welcome</span> {{Auth::user()->first_name}}</a>
          <div class="dropdown ">
           
            <div class="me-4 " data-bs-toggle="dropdown" aria-expanded="false">
              <img class="avatar-50 rounded-cricle " src="../assets/images/avatar.png" alt="">
            </div>
            <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item fw-bold" href="#">My Profile</a></li>
              <li><a class="dropdown-item border-bottom" href="#">Dashboard</a></li>
              <li><a class="dropdown-item border-bottom" href="#">Deliveries</a></li>
              <li class="logout_btn"><a class="dropdown-item border-bottom" href="javascript:;">Logout</a></li>
            </ul>
          </div>
         
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
  
  
  
  <section class="mt-90 bg-edit-buyer-profile pb-3 --header-margin-top-mobile-version">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex align-items-center py-4">
                    <h3 class="mb-0 fw-bold me-3">Overview</h3>
                    <div class="col-lg-2">
                        <select class="form-select bg-transparent " aria-label="Default select example">
                            <option selected>Monthly</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-3">
                <div class="card shadow border-0 br-10">
                    <div class="card-body d-flex align-items-start justify-content-between flex-wrap">
                        <div>
                            <h6 class="text-muted mb-2">Sales</h6>
                            <h2 class="fw-bold mb-3">397</h1>
                            <div class="d-flex align-items-baseline">
                                <img class="me-1" src="../assets/images/icon/increase.png" alt="">
                                <h6 class="text-green text-16 f-600 mb-0">+2.01%</h6>
                            </div>
                        </div>
                        <img class="img-fluid" src="../assets/images/dashboard/bag.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-3">
                <div class="card shadow border-0 br-10">
                    <div class="card-body d-flex align-items-start justify-content-between flex-wrap">
                        <div class="">
                            <h6 class="text-muted mb-2">Profit</h6>
                            <h2 class="fw-bold mb-3">$1,050</h1>
                            <div class="d-flex align-items-baseline">
                                <img class="me-1" src="../assets/images/icon/decrease.png" alt="">
                                <h6 class="text-red text-16 f-600 mb-0"> -0.3%</h6>
                            </div>
                        </div>
                        <img class="img-fluid" src="../assets/images/dashboard/revenue.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-3">
                <div class="card shadow border-0 br-10">
                    <div class="card-body d-flex align-items-start justify-content-between flex-wrap">
                        <div class="">
                            <h6 class="text-muted mb-2">Revenue</h6>
                            <h2 class="fw-bold mb-3">$12,000</h1>
                            <div class="d-flex align-items-baseline">
                                <img class="me-1" src="../assets/images/icon/increase.png" alt="">
                                <h6 class="text-green text-16 f-600 mb-0"> 10.3%</h6>
                            </div>
                        </div>
                        <!-- <img class="img-fluid" src="../assets/images/dashboard/revenue.png" alt=""> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-3">
                <div class="card shadow border-0 br-10">
                    <div class="card-body d-flex align-items-start justify-content-between flex-wrap">
                        <div class="">
                            <h6 class="text-muted mb-2">Pending Shipping</h6>
                            <h2 class="fw-bold mb-3">23</h1>
                            <div class="d-flex align-items-baseline">
                                <!-- <img class="me-1" src="../assets/images/icon/increase.png" alt=""> -->
                                <h6 class="text-green text-16 f-600 mb-0"> 0.00</h6>
                            </div>
                        </div>
                        <!-- <img class="img-fluid" src="../assets/images/dashboard/revenue.png" alt=""> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
  <section class="bg-edit-buyer-profile pb-0 pt-0">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card border-0 shadow br-10">
                      <div class="card-body">
                        <h5 class="ms-3 mt-3 f-600">Monthly Overview</h5>
                        <div id="chart"></div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- latest-activities-started  -->
  <section class="bg-edit-buyer-profile pt-4">
      <div class="container">
          <div class="row">

              <div class="col-lg-12 position-relative">
                  <div class="card border-0 shadow br-10">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                          <h5 class="ms-3  f-600">Latest Activities</h5>
                          <h5 class="ms-3 f-600">
                            <a href="#" class="text-decoration-none text-dark">View All</a>
                          </h5>
                          
                        </div>
                        <div class="">
                          <div class="row">
                            <div class="col-lg-6 latest-activities-wrapper position-relative mb-3">
                              <a href="#" class="text-dark text-decoration-none">
                                <div class="">
                                  <div class=" d-flex align-items-center justify-content-between latest-activities-color flex-wrap p-3 br-16">
                                    <div class="d-flex align-items-center">
                                      <img class="avatar-32 me-4" src="../assets/images/small-avatar.png" alt="">
                                      <p class="mb-0 text-16 fw-bold ls-2">Nicole Kent <span class="fw-light">saved</span> Blue Ribbon</p>
                                    </div>
                                    <div>
                                      <span class="text-muted">00:03</span>
                                    </div>
                                  </div>

                                  
                                </div>
                              </a>
                              <div class="latest-activities-hover shadow br-16 position-absolute">
                                <div class="d-flex justify-content-between p-2  border-bottom">
                                  <div class="d-flex align-items-center">
                                    <img class="avatar-32 me-2" src="../assets/images/small-avatar.png" alt="">
                                    <div>
                                      <p class="mb-0 text-16 fw-bold">Nicole Kent </p>
                                      <p class="mb-0 text-12">Nicole Kent </p>
                                    </div>
                                  </div>
                                  <div class="box-amount size-24 bg-dark d-lg-flex d-none">
                                    <i class="far fa-envelope text-white"></i>
                                  </div>
                                </div>
                                <div class="d-flex">
                                  <p class="avatar-32 mb-0 me-3"></p>
                                  <p class="mb-0 text-8 py-2">Blue Ribbon was added to their cart at 00:03AM</p>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 latest-activities-wrapper position-relative mb-3">
                              <a href="#" class="text-dark text-decoration-none">
                                <div class="">
                                  <div class=" d-flex align-items-center justify-content-between latest-activities-color flex-wrap p-3 br-16">
                                    <div class="d-flex align-items-center">
                                      <img class="avatar-32 me-4" src="../assets/images/small-avatar.png" alt="">
                                      <p class="mb-0 text-16 fw-bold ls-2">Nicole Kent <span class="fw-light">saved</span> Blue Ribbon</p>
                                    </div>
                                    <div>
                                      <span class="text-muted">00:03</span>
                                    </div>
                                  </div>

                                  
                                </div>
                              </a>
                              <div class="latest-activities-hover shadow br-16 position-absolute">
                                <div class="d-flex justify-content-between p-2  border-bottom">
                                  <div class="d-flex align-items-center">
                                    <img class="avatar-32 me-2" src="../assets/images/small-avatar.png" alt="">
                                    <div>
                                      <p class="mb-0 text-16 fw-bold">Nicole Kent </p>
                                      <p class="mb-0 text-12">Nicole Kent </p>
                                    </div>
                                  </div>
                                  <div class="box-amount size-24 bg-dark d-lg-flex d-none">
                                    <i class="far fa-envelope text-white"></i>
                                  </div>
                                </div>
                                <div class="d-flex">
                                  <p class="avatar-32 mb-0 me-3"></p>
                                  <p class="mb-0 text-8 py-2">Blue Ribbon was added to their cart at 00:03AM</p>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 latest-activities-wrapper position-relative mb-3">
                              <a href="#" class="text-dark text-decoration-none">
                                <div class="">
                                  <div class=" d-flex align-items-center justify-content-between latest-activities-color flex-wrap p-3 br-16">
                                    <div class="d-flex align-items-center">
                                      <img class="avatar-32 me-4" src="../assets/images/small-avatar.png" alt="">
                                      <p class="mb-0 text-16 fw-bold ls-2">Nicole Kent <span class="fw-light">saved</span> Blue Ribbon</p>
                                    </div>
                                    <div>
                                      <span class="text-muted">00:03</span>
                                    </div>
                                  </div>

                                  
                                </div>
                              </a>
                              <div class="latest-activities-hover shadow br-16 position-absolute">
                                <div class="d-flex justify-content-between p-2  border-bottom">
                                  <div class="d-flex align-items-center">
                                    <img class="avatar-32 me-2" src="../assets/images/small-avatar.png" alt="">
                                    <div>
                                      <p class="mb-0 text-16 fw-bold">Nicole Kent </p>
                                      <p class="mb-0 text-12">Nicole Kent </p>
                                    </div>
                                  </div>
                                  <div class="box-amount size-24 bg-dark d-lg-flex d-none">
                                    <i class="far fa-envelope text-white"></i>
                                  </div>
                                </div>
                                <div class="d-flex">
                                  <p class="avatar-32 mb-0 me-3"></p>
                                  <p class="mb-0 text-8 py-2">Blue Ribbon was added to their cart at 00:03AM</p>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 latest-activities-wrapper position-relative mb-3">
                              <a href="#" class="text-dark text-decoration-none">
                                <div class="">
                                  <div class=" d-flex align-items-center justify-content-between latest-activities-color flex-wrap p-3 br-16">
                                    <div class="d-flex align-items-center">
                                      <img class="avatar-32 me-4" src="../assets/images/small-avatar.png" alt="">
                                      <p class="mb-0 text-16 fw-bold ls-2">Nicole Kent <span class="fw-light">saved</span> Blue Ribbon</p>
                                    </div>
                                    <div>
                                      <span class="text-muted">00:03</span>
                                    </div>
                                  </div>

                                  
                                </div>
                              </a>
                              <div class="latest-activities-hover shadow br-16 position-absolute">
                                <div class="d-flex justify-content-between p-2  border-bottom">
                                  <div class="d-flex align-items-center">
                                    <img class="avatar-32 me-2" src="../assets/images/small-avatar.png" alt="">
                                    <div>
                                      <p class="mb-0 text-16 fw-bold">Nicole Kent </p>
                                      <p class="mb-0 text-12">Nicole Kent </p>
                                    </div>
                                  </div>
                                  <div class="box-amount size-24 bg-dark d-lg-flex d-none">
                                    <i class="far fa-envelope text-white"></i>
                                  </div>
                                </div>
                                <div class="d-flex">
                                  <p class="avatar-32 mb-0 me-3"></p>
                                  <p class="mb-0 text-8 py-2">Blue Ribbon was added to their cart at 00:03AM</p>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 latest-activities-wrapper position-relative mb-3">
                              <a href="#" class="text-dark text-decoration-none">
                                <div class="">
                                  <div class=" d-flex align-items-center justify-content-between latest-activities-color flex-wrap p-3 br-16">
                                    <div class="d-flex align-items-center">
                                      <img class="avatar-32 me-4" src="../assets/images/small-avatar.png" alt="">
                                      <p class="mb-0 text-16 fw-bold ls-2">Nicole Kent <span class="fw-light">saved</span> Blue Ribbon</p>
                                    </div>
                                    <div>
                                      <span class="text-muted">00:03</span>
                                    </div>
                                  </div>

                                  
                                </div>
                              </a>
                              <div class="latest-activities-hover shadow br-16 position-absolute">
                                <div class="d-flex justify-content-between p-2  border-bottom">
                                  <div class="d-flex align-items-center">
                                    <img class="avatar-32 me-2" src="../assets/images/small-avatar.png" alt="">
                                    <div>
                                      <p class="mb-0 text-16 fw-bold">Nicole Kent </p>
                                      <p class="mb-0 text-12">Nicole Kent </p>
                                    </div>
                                  </div>
                                  <div class="box-amount size-24 bg-dark d-lg-flex d-none">
                                    <i class="far fa-envelope text-white"></i>
                                  </div>
                                </div>
                                <div class="d-flex">
                                  <p class="avatar-32 mb-0 me-3"></p>
                                  <p class="mb-0 text-8 py-2">Blue Ribbon was added to their cart at 00:03AM</p>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 latest-activities-wrapper position-relative mb-3">
                              <a href="#" class="text-dark text-decoration-none">
                                <div class="">
                                  <div class=" d-flex align-items-center justify-content-between latest-activities-color flex-wrap p-3 br-16">
                                    <div class="d-flex align-items-center">
                                      <img class="avatar-32 me-4" src="../assets/images/small-avatar.png" alt="">
                                      <p class="mb-0 text-16 fw-bold ls-2">Nicole Kent <span class="fw-light">saved</span> Blue Ribbon</p>
                                    </div>
                                    <div>
                                      <span class="text-muted">00:03</span>
                                    </div>
                                  </div>

                                  
                                </div>
                              </a>
                              <div class="latest-activities-hover shadow br-16 position-absolute">
                                <div class="d-flex justify-content-between p-2  border-bottom">
                                  <div class="d-flex align-items-center">
                                    <img class="avatar-32 me-2" src="../assets/images/small-avatar.png" alt="">
                                    <div>
                                      <p class="mb-0 text-16 fw-bold">Nicole Kent </p>
                                      <p class="mb-0 text-12">Nicole Kent </p>
                                    </div>
                                  </div>
                                  <div class="box-amount size-24 bg-dark d-lg-flex d-none">
                                    <i class="far fa-envelope text-white"></i>
                                  </div>
                                </div>
                                <div class="d-flex">
                                  <p class="avatar-32 mb-0 me-3"></p>
                                  <p class="mb-0 text-8 py-2">Blue Ribbon was added to their cart at 00:03AM</p>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 latest-activities-wrapper position-relative mb-3">
                              <a href="#" class="text-dark text-decoration-none">
                                <div class="">
                                  <div class=" d-flex align-items-center justify-content-between latest-activities-color flex-wrap p-3 br-16">
                                    <div class="d-flex align-items-center">
                                      <img class="avatar-32 me-4" src="../assets/images/small-avatar.png" alt="">
                                      <p class="mb-0 text-16 fw-bold ls-2">Nicole Kent <span class="fw-light">saved</span> Blue Ribbon</p>
                                    </div>
                                    <div>
                                      <span class="text-muted">00:03</span>
                                    </div>
                                  </div>

                                  
                                </div>
                              </a>
                              <div class="latest-activities-hover shadow br-16 position-absolute">
                                <div class="d-flex justify-content-between p-2  border-bottom">
                                  <div class="d-flex align-items-center">
                                    <img class="avatar-32 me-2" src="../assets/images/small-avatar.png" alt="">
                                    <div>
                                      <p class="mb-0 text-16 fw-bold">Nicole Kent </p>
                                      <p class="mb-0 text-12">Nicole Kent </p>
                                    </div>
                                  </div>
                                  <div class="box-amount size-24 bg-dark d-lg-flex d-none">
                                    <i class="far fa-envelope text-white"></i>
                                  </div>
                                </div>
                                <div class="d-flex">
                                  <p class="avatar-32 mb-0 me-3"></p>
                                  <p class="mb-0 text-8 py-2">Blue Ribbon was added to their cart at 00:03AM</p>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 latest-activities-wrapper position-relative mb-3">
                              <a href="#" class="text-dark text-decoration-none">
                                <div class="">
                                  <div class=" d-flex align-items-center justify-content-between latest-activities-color flex-wrap p-3 br-16">
                                    <div class="d-flex align-items-center">
                                      <img class="avatar-32 me-4" src="../assets/images/small-avatar.png" alt="">
                                      <p class="mb-0 text-16 fw-bold ls-2">Nicole Kent <span class="fw-light">saved</span> Blue Ribbon</p>
                                    </div>
                                    <div>
                                      <span class="text-muted">00:03</span>
                                    </div>
                                  </div>

                                  
                                </div>
                              </a>
                              <div class="latest-activities-hover shadow br-16 position-absolute">
                                <div class="d-flex justify-content-between p-2  border-bottom">
                                  <div class="d-flex align-items-center">
                                    <img class="avatar-32 me-2" src="../assets/images/small-avatar.png" alt="">
                                    <div>
                                      <p class="mb-0 text-16 fw-bold">Nicole Kent </p>
                                      <p class="mb-0 text-12">Nicole Kent </p>
                                    </div>
                                  </div>
                                  <div class="box-amount size-24 bg-dark d-lg-flex d-none">
                                    <i class="far fa-envelope text-white"></i>
                                  </div>
                                </div>
                                <div class="d-flex">
                                  <p class="avatar-32 mb-0 me-3"></p>
                                  <p class="mb-0 text-8 py-2">Blue Ribbon was added to their cart at 00:03AM</p>
                                </div>
                              </div>
                            </div>
                            


                          </div>
                        </div>
                      </div>
                  </div>
                 
                 
              </div>
          </div>
      </div>
  </section>
  
  <div class="logout-screen" style="display: none;">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 text-center">
                  <div class="text-50 f-600">Are you sure you want to logout?</div>
                  <div class="d-flex justify-content-center">
                      <button type="button" class="btn  py-4 rounded-pill px-5rem me-3 fw-bold border-logout-screen cancel_logout_btn">Go Back </button>
                      <button type="button" class="btn btn-danger py-4 rounded-pill confirm_logout_btn px-5rem">Logout </button>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <footer id="z-contact" class="bg--primary-lighten py-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-2 mb-3">
          <div class="d-flex flex-column">
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Home Decor</a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Kitchenware</a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Fitness Tools </a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Electronics </a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">All Products </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-2 mb-3">
          <div class="d-flex flex-column">
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">About Us</a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Contact Now</a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Our Community </a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">How It Works </a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">FAQ’s </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-2 mb-3">
          <div class="d-flex flex-column">
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Browse Through</a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Terms of Service</a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Privacy Policy</a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Refund Policy </a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Disclaimer </a>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
          <div class="footer-mail d-flex position-relative mb-3">
            <svg class="mail-icon" width="28" height="28" viewBox="0 0 28 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M25.5391 0.408203H2.46094C1.10398 0.408203 0 1.51218 0 2.86914V17.1307C0 18.4876 1.10398 19.5916 2.46094 19.5916H25.5391C26.896 19.5916 28 18.4876 28 17.1307V2.86914C28 1.51218 26.896 0.408203 25.5391 0.408203ZM25.2179 2.04883L24.8894 2.32232L14.9764 10.5769C14.4106 11.048 13.5893 11.048 13.0236 10.5769L3.11057 2.32232L2.78212 2.04883H25.2179ZM1.64062 3.23325L9.71753 9.95888L1.64062 15.3343V3.23325ZM25.5391 17.951H2.46094C2.06456 17.951 1.73305 17.6683 1.65709 17.2941L11.033 11.0542L11.9738 11.8377C12.5608 12.3265 13.2805 12.5709 14.0001 12.5709C14.7196 12.5709 15.4392 12.3265 16.0263 11.8377L16.9671 11.0542L26.343 17.2941C26.267 17.6684 25.9354 17.951 25.5391 17.951ZM26.3594 15.3343L18.2825 9.95894L26.3594 3.23325V15.3343Z" fill="#A09E9E"/>
            </svg>
              
            <input type="text" class="form-control py-3 border-0 " placeholder="Enter Email to Subscribe" />
            <svg class="arrow" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.3207 6.3208L19.0735 7.56807L24.6235 13.1182H0V14.8821H24.6235L19.0735 20.4321L20.3207 21.6794L28 14.0001L20.3207 6.3208Z" fill="black"/>
            </svg>
          </div>
          <div class="d-flex justify-content-end mb-3">
            <a href="#"><img class="img-fluid me-3" src="../assets/images/playstore.png" alt=""></a>
            <a href="#"><img class="img-fluid mt-2" src="../assets/images/applestore.png" alt=""></a>
          </div>
          <div class="d-flex justify-content-end mb-3">
            <a href="#" class="text-dark h4 me-3">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="text-dark h4">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
          <div class="d-flex">
            <a href="#"></a>
          </div>
        </div>
      </div>
    </div>
    
  </footer>
  <div class="sub-footer bg--primary">
    <div class="container">
      <div class="d-flex justify-content-between flex-wrap align-items-center">
        <p class="fw-bold text-footer-bottom  mb-0">© 2021 Urban Overstock</p>
        <div class="d-flex">
          <img class="img-fluid me-3" src="../assets/images/paypal.png" alt="">
          <img class="visa-footer-image" src="../assets/images/visa.png" alt="">
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../assets/js/vendor/btnloadmore.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script type="text/javascript" src="../assets/js/plugins/slick.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

  <script src="../assets/js/script/apexChart.js"></script>
  <script src="../assets/js/script/main.js"></script>

  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script type="text/javascript">
      $(document).ready(function(){
          <?php if (\Session::has('success')){ ?>
              toastr.success("{{ \Session::get('success') }}", "Success");
          <?php
              }elseif (\Session::has('error')) {
          ?>
              toastr.error("{{ \Session::get('error') }}", "Error");
          <?php
              }elseif (\Session::has('warning')) {
          ?>
              toastr.warning("{{ \Session::get('warning') }}", "Warning");
          <?php }elseif (\Session::has('info')) { ?>
              toastr.info("{{ \Session::get('info') }}", "Info");
          <?php } ?>
      });
  </script>

  <script>

    $('.logout_btn').on('click', function(){
      $('.logout-screen').show();
    });

    $('.cancel_logout_btn').on('click', function(){
      $('.logout-screen').hide();
    });

    $('.confirm_logout_btn').on('click', function(){
      window.location.href = "{{ route('logout') }}";
    });
  </script>
  
</body>
</html>