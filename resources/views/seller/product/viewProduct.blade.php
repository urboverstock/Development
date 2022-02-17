@extends('layouts.master')
@section('title','View Product')

@section('content')

	<section class="mt-5 mb-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card border-0 shadow mb-5">
            <div class="card-body">
            <div class="row">
            <div class="col-lg-12">
              <div class="d-flex justify-content-between align-items-center">
                <h4 class="display-5 text--primary f-600 me-3">{{$product->name}}</h4>
                <a href="#" class="btn btn-dark">Back</a>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="mb-2">
                <h5 class="me-2 font-weight-bold mb-2" for="">Category:</h5>
                <input class="form-control" type="text" value="{{$product->category->name}}" aria-label="Disabled input example" disabled readonly>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="mb-2">
                <h5 class="me-2 font-weight-bold mb-2" for="">Brand:</h5>
                <input class="form-control" type="text" value="{{$product->brand}}" aria-label="Disabled input example" disabled readonly>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="mb-2">
                <h5 class="me-2 font-weight-bold mb-2" for="">Quantity:</h5>
                <input class="form-control" type="text" value="{{$product->quantity}}" aria-label="Disabled input example" disabled readonly>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="mb-2">
                <h5 class="me-2 font-weight-bold mb-2" for="">Price:</h5>
                <input class="form-control" type="text" value="${{$product->price}}" aria-label="Disabled input example" disabled readonly>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="mb-2">
                <h5 class="me-2 font-weight-bold mb-2" for="">Compare Price:</h5>
                <input class="form-control" type="text" value="${{!empty($product->compare_price) || ($product->compare_price != 0) ? $product->compare_price : 0}}" aria-label="Disabled input example" disabled readonly>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="mb-2">
                <h5 class="me-2 font-weight-bold mb-2" for="">Cost Per Price :</h5>
                <input class="form-control" type="text" value="{{ !empty($product->cost_per_price) || ($product->cost_per_price != 0) ? $product->cost_per_price : 0 }}" aria-label="Disabled input example" disabled readonly>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="mb-2">
                <h5 class="me-2 font-weight-bold mb-2" for="">Description :</h5>
                <div>{{$product->description}}</div>
              </div>
            </div>
          </div>
            </div>
          </div>
          
           <!-- <h6 class="f-600 mb-2" data-aos="fade-up">Category : {{$product->category->name}}</h6>
           <h6 class="f-600 mb-2" data-aos="fade-up">Brand : {{$product->brand}}</h6>
           <h6 class="f-600 mb-2" data-aos="fade-up">Quantity : {{$product->quantity}}</h6>
           <h6 class="f-600 mb-2" data-aos="fade-up">Price : ${{$product->price}}</h6>
           <h6 class="f-600 mb-2" data-aos="fade-up">Compare Price : ${{!empty($product->compare_price) || ($product->compare_price != 0) ? $product->compare_price : 0}}</h6>
           <h6 class="f-600 mb-2" data-aos="fade-up">Cost Per Price : {{ !empty($product->cost_per_price) || ($product->cost_per_price != 0) ? $product->cost_per_price : 0 }}</h6>
           <div class="d-flex flex-wrap mb-2" data-aos="fade-up">
              Description : {{$product->description}}
            </div> -->
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
            
            @if(count($product->product_image) > 0)
            <div class="card border-0 shadow">
              <div class="card-body">
                <div class="mb-3 row" data-aos="fade-up">
                  @foreach($product->product_image as $key=>$productImage)
                    <div class="col-lg-4 col-6">
                      <img class="product-img-size img-fluid rounded me-3 my-3" src="{{ url('/') . $productImage->file }}" />
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
            @endif
           
      </div>
    </div>
  </section>

@endsection