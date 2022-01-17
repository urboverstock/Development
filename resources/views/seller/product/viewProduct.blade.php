@extends('layouts.master')
@section('title','View Product')

@section('content')

	<section class="mt-5 mb-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="d-flex mb-2" data-aos="fade-up">
            <h1 class="display-5 f-600 me-3">{{$product->name}}</h1>
            
          </div>
           <h6 class="f-600 mb-2" data-aos="fade-up">Category : {{$product->category->name}}</h6>
           <h6 class="f-600 mb-2" data-aos="fade-up">Brand : {{$product->brand}}</h6>
           <h6 class="f-600 mb-2" data-aos="fade-up">Quantity : {{$product->quantity}}</h6>
           <h6 class="f-600 mb-2" data-aos="fade-up">Price : ${{$product->price}}</h6>
           <h6 class="f-600 mb-2" data-aos="fade-up">Compare Price : ${{!empty($product->compare_price) || ($product->compare_price != 0) ? $product->compare_price : 0}}</h6>
           <h6 class="f-600 mb-2" data-aos="fade-up">Cost Per Price : {{ !empty($product->cost_per_price) || ($product->cost_per_price != 0) ? $product->cost_per_price : 0 }}</h6>
          
            <!-- <div class="d-flex align-items-center flex-wrap mb-3" data-aos="fade-up">
              <p class="mb-0 text-random-color font-500  me-3">Jewelery</p>
              <div class="bg-dark circle-sm"></div>
              <p class="mb-0 text-random-color mx-3 font-500">Clothing</p>
              <div class="bg-dark circle-sm"></div>
              <p class="mb-0 text-random-color mx-3 font-500">Kids</p>
             
            </div>
            <div class="d-flex align-items-center flex-wrap mb-4" data-aos="fade-up">
              <h5 class="f-600 mb-0">5K+ <span class="mx-3">Items Sold</span></h5>
              <div class="d-flex align-items-center">
                <i class="fas fa-star me-2"></i>
                <i class="fas fa-star me-2"></i>
                <i class="fas fa-star me-2"></i>
                <i class="fas fa-star me-2"></i>
                <i class="fas fa-star"></i>
              </div>
            </div> -->
            <div class="d-flex flex-wrap mb-2" data-aos="fade-up">
              Description : {{$product->description}}
            </div>
            @if(count($product->product_image) > 0)
            <div class="mb-3 d-flex align-items-baseline flex-wrap" data-aos="fade-up">
            	@foreach($product->product_image as $key=>$productImage)
                @if($key==0)
            		  <img class="box-200 me-3 mb-3" src="{{ url('/') . $productImage->file }}" />
                @endif
            	@endforeach
            </div>
            @endif
           
      </div>
    </div>
  </section>

@endsection