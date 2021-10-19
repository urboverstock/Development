@extends('layouts.master')
@section('title','Dashboard')
@section('content')

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
                            <h2 class="fw-bold mb-3">{{ $total_complete_order }}</h1>
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
                            <h2 class="fw-bold mb-3">${{ $total_price_order }}</h1>
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
                            <h2 class="fw-bold mb-3">{{ $total_pending_order }}</h1>
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

@endsection