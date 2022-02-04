@extends('layouts.master')
@section('title','Dashboard')
@section('content')

<?php
  // print_r(json_encode($data['order_chart']));die();
?>

  <section class="mt-90 bg-edit-buyer-profile pb-3 --header-margin-top-mobile-version">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex align-items-center py-4">
                    <h3 class="mb-0 fw-bold me-3">Overview</h3>
                    <!-- <div class="col-lg-2">
                        <select class="form-select bg-transparent " aria-label="Default select example">
                            <option selected>Monthly</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-3 mb-3">
                <div class="card shadow border-0 br-10">
                    <div class="card-body d-flex align-items-start justify-content-between flex-wrap">
                        <div>
                            
                            <h6 class="text-muted mb-2">Total Order</h6>
                            <h2 class="fw-bold mb-3">{{ $total_orders }}</h1>
                            <!-- <div class="d-flex align-items-baseline">
                                <img class="me-1" src="../assets/images/icon/increase.png" alt="">
                                <h6 class="text-green text-16 f-600 mb-0">+2.01%</h6>
                            </div> -->
                        </div>
                        <img class="img-fluid" src="../assets/images/dashboard/bag.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-3">
                <div class="card shadow border-0 br-10">
                    <div class="card-body d-flex align-items-start justify-content-between flex-wrap">
                        <div class="">
                          <h6 class="text-muted mb-2">Complete Order</h6>
                            <h2 class="fw-bold mb-3">{{ $total_complete_order }}</h1>
                            <!-- <div class="d-flex align-items-baseline">
                                <img class="me-1" src="../assets/images/icon/decrease.png" alt="">
                                <h6 class="text-red text-16 f-600 mb-0"> -0.3%</h6>
                            </div> -->
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
                            <!-- <div class="d-flex align-items-baseline">
                                <img class="me-1" src="../assets/images/icon/increase.png" alt="">
                                <h6 class="text-green text-16 f-600 mb-0"> 10.3%</h6>
                            </div> -->
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
                            <!-- <div class="d-flex align-items-baseline">
                                <img class="me-1" src="../assets/images/icon/increase.png" alt="">
                                <h6 class="text-green text-16 f-600 mb-0"> 0.00</h6>
                            </div> -->
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

            <div class="col-lg-12 mb-3">
                  <div class="card border-0 shadow br-10">
                      <div class="card-body">
                        <h5 class="ms-3 mt-3 f-600">Order Status</h5>
                        <div id="container"></div>
                      </div>
                  </div>
              </div>

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
                          <h5 class="ms-3 f-600">Latest Wishlist</h5>
                          <h5 class="ms-3 f-600">
                            <a href="{{ route('sellerWishlistProduct') }}" class="text-decoration-none text-dark">View All</a>
                          </h5>
                        </div>
                        
                        <div class="">
                          <div class="row">
                            @if(count($data['wishlists']))
                            @foreach($data['wishlists'] as $wishlist)
                            <div class="col-lg-6 latest-activities-wrapper position-relative mb-3">
                              <a data-bs-toggle="modal"  data-bs-target="#myModal" data-userId="{{ $wishlist->user_id }}" data-productId="{{ $wishlist->product_id }}" data-url="{{ route('sellerSuggestionModal', ['userId' => $wishlist->user_id, 'productId' => $wishlist->product_id]) }}" class="text-dark text-decoration-none productSuggestionModal">
                                <div class="">
                                  <div class=" d-flex align-items-center justify-content-between latest-activities-color flex-wrap p-3 br-16">
                                    <div class="d-flex align-items-center">
                                      <img class="avatar-32 me-4" src="{{ $wishlist->getUserDetail['profile_img'] }}" alt="">
                                      <p class="mb-0 text-16 fw-bold ls-2">{{ $wishlist->getUserDetail['full_name'] }} <span class="fw-light">wishlist</span> {{ $wishlist->getProductDetail['name'] }} </p>
                                    </div>
                                    <div>
                                      <span class="text-muted">{{ date('h:i A', strtotime($wishlist->created_at)) }}</span>
                                    </div>
                                  </div>                                  
                                </div>
                              </a>
                              <!-- <div class="latest-activities-hover shadow br-16 position-absolute">
                                <div class="d-flex justify-content-between p-2  border-bottom">
                                  <div class="d-flex align-items-center">
                                    <img class="avatar-32 me-2" src="{{ $wishlist->getUserDetail['profile_img'] }}" alt="">
                                    <div>
                                      <a class="text-decoration-none text--primary text-decoration-none" href="{{ route('profile', \Illuminate\Support\Facades\Crypt::encrypt($wishlist->user_id)) }}"><p class="mb-0 text-16 fw-bold">{{ $wishlist->getUserDetail['full_name'] }}</p></a>
                                      <p class="mb-0 text-12">{{ $wishlist->getUserDetail['full_name'] }} </p>
                                    </div>
                                  </div>
                                  <div class="box-amount size-24 bg-dark d-lg-flex d-none">
                                    <a href="{{ url('/chat?user_id='.  \Illuminate\Support\Facades\Crypt::encrypt($wishlist->user_id)) }}" class="py-3 d-flex align-items-start text-decoration-none text-dark"><i class="far fa-envelope text-white"></i></a>
                                  </div>
                                </div>
                                <div class="d-flex">
                                  <p class="avatar-32 mb-0 me-3"></p>
                                  <p class="mb-0 text-8 py-2">{{ $wishlist->getUserDetail['full_name'] }} was added to their wishlist at {{ date('h:i A', strtotime($wishlist->created_at)) }}</p>
                                </div>
                              </div> -->
                            </div>
                            @endforeach
                            @endif

                           <!--  <div class="col-lg-6 latest-activities-wrapper position-relative mb-3">
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
                            </div> -->
                            


                          </div>
                        </div>
                      </div>
                  </div>
                 
                 
              </div>
          </div>
      </div>

      <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Send Offer</h5>
                    <button type="button" class="btn-close addoffer-close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                <div class="modal-body">
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default addoffer-close-modal">Close</button>
                </div>
              </div>

            </div>
        </div>
  </section>

  
@endsection

@section('scripts')
  <script>
        Highcharts.setOptions({
            colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
                return {
                    radialGradient: {
                        cx: 0.5,
                        cy: 0.3,
                        r: 0.7
                    },
                    stops: [
                        [0, color],
                        [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                    ]
                };
            })
        });

        // Build the chart
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Order chart'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        },
                        connectorColor: 'silver'
                    }
                }
            },
            series: [{
                name: 'Average',
                data: <?= json_encode($data['order_chart']) ?>
            }]
        });
    </script>

  <script type="text/javascript">
        Highcharts.chart('chart', {
            chart: {
                type: 'areaspline'
            },
            title: {
                text: 'All Orders'
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 150,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'June',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ],
                plotBands: [{// visualize the weekend
                    from: 6.5,
                    to: 6.5,
                    color: 'rgba(68, 170, 213, .2)'
                }]
            },
            yAxis: {
                title: {
                    text: 'Order units'
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: ' units'
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                areaspline: {
                    fillOpacity: 0.5
                }
            },
            series: [{
                name: 'Orders ',
                data: <?= json_encode($data['order_By_month']) ?>
            }]
        });

            $(document).on('click', '.productSuggestionModal', function (e) {
          e.preventDefault();
          var url = $(this).data('url');
          $.ajax({
              url: url,
              type: 'GET',
              dataType: 'html'
          })
              .done(function (data) {
                  $('#sellerSendSuggestionNotifcation').modal('show');
                  $('.modal-body').html(data);

              })
              .fail(function () {
                  alert('Something went wrong, Please try again...');
              });
          
      }); 
  </script>
@endsection