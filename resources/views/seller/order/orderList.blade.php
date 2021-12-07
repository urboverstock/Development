@extends('layouts.master')
@section('title','Order List')
@section('content')
	<section class="mt-90">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <span class="float-right">                	
                  <h4 class="f-600 mb-0">Orders</h4>
                </span>
            </div>

            <div class="col-lg-12 mb-5">
                <div class="bg-chat p-3 br-12">
                        <div class="custom-form-group-search  position-relative col-12 ">
                        	<form class="d-flex" method="get" action="{{ route('sellerOrderList') }}">
	                            <input type="text" class="form-control mw-100" placeholder="Search Orders" name="search">
	                            <button type="submit" class="border-0"><i class="fas fa-search text--primary"></i></button>
                          </form>
                        </div>

                        
                    </div>
                </div>
            </div>

            @if(count($orders) > 0)
            <div class="col-lg-12">
              <div class="table-responsive">
                <table class="table table-borderless">
                  <thead class="bg-chat">
                    <tr>
                      <th scope="col" class="fw-normal py-3">Sr No.</th>
                      <th scope="col" class="fw-normal py-3">User</th>
                      <th scope="col" class="fw-normal py-3">Order Number</th>
                      <th scope="col" class="fw-normal py-3">Total Quantity</th>
                      <th scope="col" class="fw-normal py-3">Total Amount</th>
                      <th scope="col" class="fw-normal py-3">Date</th>
                      <th scope="col" class="fw-normal py-3">Status</th>
                      <th scope="col" class="fw-normal py-3">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
                  	@foreach($orders as $key => $order)
                    <!-- if($order) { -->
                    <tr>
                      <th scope="row" class="py-3 text-24 align-middle f-400">{{ $key + 1  }}</td>
                      <th scope="row" class="py-3 text-24 align-middle f-400">
                        <a class="text-decoration-none text-dark" href="{{ route('profile', \Illuminate\Support\Facades\Crypt::encrypt(@$order['get_user_detail']['id'])) }}"> {{ @$order['get_user_detail']['first_name']}}</a></td>
                      <td class="py-3 align-middle text-24">{{ @$order['order_number'] }}</td>
                      <td class="py-3 align-middle text-24"> {{ @$order['total_quantity'] }} </td>
                      <td class="py-3 align-middle text-24">{{ @$order['price'] }}</td>
                      <td class="py-3 align-middle text-24">{{ date('d/m/Y', strtotime(@$order['created_at'])) }}</td>
                      <td class="py-3 align-middle text-22">

                        <select id="order_status" class="order_status">
                          <option value="{{ route('sellerUpdateOrderStatus', ['orderId' => @$order['id'], 'orderStatus' => ORDER_PENDING] ) }}" {{ @$order['status'] == ORDER_PENDING ? 'selected' : ''}}>Pending</option>
                          <option value="{{ route('sellerUpdateOrderStatus', ['orderId' => @$order['id'], 'orderStatus' => ORDER_PROCESS] ) }}" {{ @$order['status'] == ORDER_PROCESS ? 'selected' : ''}}>Processing</option>
                          <option value="{{ route('sellerUpdateOrderStatus', ['orderId' => @$order['id'], 'orderStatus' => ORDER_ON_DELIVERY] ) }}" {{ @$order['status'] == ORDER_ON_DELIVERY ? 'selected' : ''}}>On Delivery</option>
                          <option value="{{ route('sellerUpdateOrderStatus', ['orderId' => @$order['id'], 'orderStatus' => ORDER_COMPLETED] ) }}" {{ @$order['status'] == ORDER_COMPLETED ? 'selected' : ''}}>Completed</option>
                          <option value="{{ route('sellerUpdateOrderStatus', ['orderId' => @$order['id'], 'orderStatus' => ORDER_DECLINED] ) }}" {{ @$order['status'] == ORDER_DECLINED ? 'selected' : ''}}>Declined</option>
                        </select>
                          
                          <!-- @switch($order['status'])
                            @case(0)
                              Pending
                            @break
                            @case(1)
                              Processing
                            @break
                            @case(2)
                              On Delivery
                            @break
                            @case(3)
                              Completed
                            @break
                            @case(4)
                              Declined
                            @break
                          @endswitch -->

                      </td>
                      <td class="py-3 align-middle "><a class="btn btn--primary text-white btn-sm" href="{{ route('sellerViewOrder', \Illuminate\Support\Facades\Crypt::encrypt($order['id'])) }}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                      
                    </tr>
                    <!-- } -->
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
             
            </div>
            @else
            <section class="p-0 vh-80 d-flex justify-content-center">
			    <div class="d-flex justify-content-center align-items-center">
			      <div class="text-center">
			        <img class="img-fluid" src="../assets/images/no-data.png" alt="">
			        <h2 class="fw-bold mb-3">No Data Here.</h2>
			        <!-- <p class="text-muted">Go make an awesome <a href="#" class="text-decoration-none text-red-2 f-600">Profile</a>. This place should be as busy as <a href="#" class=" text-red-2 f-600">Ringroad</a> very soon.</p> -->
			      </div>
			    </div>
			  </section>
            @endif
        </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script>
    // $('#order_status').change(function()
    $(document).on('change', ".order_status", function ()
      {
        var url = $(this).val();
        var body = 'Are you sure to change status?';
        var success_msg = 'Order status has been changed successfully';

        swal({
            // title: 'title',
            text: body,
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
          if(willDelete)
          {
            $.ajax({
                type: 'GET',
                url: url,
                data: {},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                  if (response.status == 1) {
                      swal(success_msg, {
                          icon: "success",
                      });

                      setTimeout(function () {
                          window.location.reload();
                      }, 2000);
                      
                  } else if (response.status == 0) {
                      swal(response.message, {
                          icon: "warning",
                      });
                  }

                  console.log('data')
                },
                error: function () {

                }
            });
          }
          else
          {
            setTimeout(function () {
                          window.location.reload();
                      }, 2000);
          }
        });
      });
  </script>
@endsection