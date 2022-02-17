@extends('layouts.admin')
@section('title','Order Detail')
@section('content')
	<section class="mt-5 mb-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="d-flex mb-2" data-aos="fade-up">
            <h1 class="display-5 f-600 me-3">Order Details</h1>            
          </div>
           <h6 class="f-600 mb-2" data-aos="fade-up">Order ID : {{ $order->order_number }}</h6>
           <h6 class="f-600 mb-2" data-aos="fade-up">Total Product : {{ $order->total_quantity }}</h6>
           <h6 class="f-600 mb-2" data-aos="fade-up">Total Price : {{ $order->price }}</h6>
           <h6 class="f-600 mb-2" data-aos="fade-up">Status : {{ getOrderStatusName($order->status) }}</h6>
           <h6 class="f-600 mb-2" data-aos="fade-up">Ordered Date : {{ date('h:s:A', strtotime($order->created_at)) }} | {{ date('d M Y', strtotime($order->created_at)) }}</h6>
         </div>

         @if(!empty($order->getUserAddress->getUserDetail) && isset($order->getUserAddress->getUserDetail))
         <div class="col-lg-6">
          <div class="d-flex mb-2" data-aos="fade-up">
            <h1 class="display-5 f-600 me-3">Shipping Details</h1>
            
          </div>
           <h6 class="f-600 mb-2" data-aos="fade-up">Name : {{ $order->getUserAddress->getUserDetail->first_name }} {{ $order->getUserAddress->getUserDetail->last_name }}</h6>
           <h6 class="f-600 mb-2" data-aos="fade-up">Email : {{ $order->getUserAddress->getUserDetail->email }}</h6>
           <h6 class="f-600 mb-2" data-aos="fade-up">Phone : {{ $order->getUserAddress->getUserDetail->phone_number }}</h6>
           <h6 class="f-600 mb-2" data-aos="fade-up">Country : {{ $order->getUserAddress->country }}</h6>
           <h6 class="f-600 mb-2" data-aos="fade-up">City : {{ $order->getUserAddress->city }}</h6>
           <h6 class="f-600 mb-2" data-aos="fade-up">State : {{ $order->getUserAddress->state }}</h6>
           <h6 class="f-600 mb-2" data-aos="fade-up">Pin Code : {{ $order->getUserAddress->pincode }}</h6>

         </div>
         @else
          @if(!empty($order->address))
          <div class="col-lg-6">
            <div class="d-flex mb-2" data-aos="fade-up">
              <h1 class="display-5 f-600 me-3">Shipping Details</h1>
              
            </div>
            <h6 class="f-600 mb-2" data-aos="fade-up">Name :  {{ $order->getUserDetail->first_name }} {{ $order->getUserDetail->last_name }}</h6>
            <h6 class="f-600 mb-2" data-aos="fade-up">Email : {{ $order->getUserDetail->email }}</h6>
            <h6 class="f-600 mb-2" data-aos="fade-up">Phone : {{ $order->getUserDetail->phone_number }}</h6>
            <h6 class="f-600 mb-2" data-aos="fade-up">Address : {{ $order->address }}</h6>
            <h6 class="f-600 mb-2" data-aos="fade-up">Country : {{ $order->country }}</h6>
            <h6 class="f-600 mb-2" data-aos="fade-up">City : {{ $order->city }}</h6>
            <h6 class="f-600 mb-2" data-aos="fade-up">State : {{ $order->state }}</h6>
            <h6 class="f-600 mb-2" data-aos="fade-up">Pin Code : {{ $order->pincode }}</h6>

          </div>
          @endif
         @endif

         <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center flex-wrap mb-2" data-aos="fade-up">
              <h6 class="display-5 f-600 me-3">Products Ordered</h6>
              <a href="{{ url()->previous() }}" class="btn btn-dark d-block btn-default">Back</a>
            </div>
            @if(!empty($order->getOrderDetail) && isset($order->getOrderDetail))
            <div class="mb-3" data-aos="fade-up">
              <table class="table table-borderless">
                  <thead class="bg-chat">
                    <tr>
                      <th scope="col" class="fw-normal py-3">S. No.</th>
                      <th scope="col" class="fw-normal py-3">Product Name</th>
                      <th scope="col" class="fw-normal py-3">Product Quantity</th>
                      <th scope="col" class="fw-normal py-3">Product Price</th>
                    </tr>
                </thead>
                	@foreach($order->getOrderDetail as $key => $details)
                		<tr>
                      <th scope="row" class="py-3 text-24 align-middle f-400">{{ $loop->iteration }}</td>
                      <th scope="row" class="py-3 text-24 align-middle f-400">{{ $details->getProductDetails->name }}</td>
                      <th scope="row" class="py-3 text-24 align-middle f-400">{{ $details->product_quantity }}</td>
                      <th scope="row" class="py-3 text-24 align-middle f-400">${{ $details->product_price }}</td>
                    </tr>
                	@endforeach
              </table>
            </div>
            @endif           
        </div>

        <!--div class="col-lg-12">
          <div class="d-flex flex-wrap mb-2 align-center" data-aos="fade-up">
              <a href="" class="btn btn-dark rounded-pill px-4 py-2 mt-3 mb-4">Send Message</a>
            </div>
        </div-->
    </div>
  </section>
@endsection