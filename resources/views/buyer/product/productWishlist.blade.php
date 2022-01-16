@extends('layouts.buyer')
@section('title','Product Wishlist')

@section('styles')
  <style type="text/css">
    .productSuggestionModal{
      cursor: pointer;
    }
  </style>
@endsection

@section('content')


	<section class="mt-90">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 mb-5">
              <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                  <div class="urban-title text--primary position-relative mb-2">
                    <p class="mb-0">List of</p>
                  </div>
                  <div class="urban-sub-title ust-100 mb-4">
                    <p class="mb-0 pe-4">My Wishlist</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="orders">
                @if(count($wishlists) > 0)
                @foreach($wishlists as $key => $wishlist)
                <div class="custom-orders">
                  <div class="card product-item border-0 shadow br-12 mb-5">
                    <div class="card-body "> 
                      <a class="text-decoration-none text-dark" target="_blank" href="{{ route('product-detail', $wishlist['get_product_detail']['sku']) }}">
                        <img class="product-img-size br-12 mb-3" style="width:100%;height:100%;" src="{{ productDefaultImage($wishlist['get_product_detail']['id'])}}" alt="">
                      </a>
                      <a class="text-decoration-none text-dark" target="_blank" href="{{ route('product-detail', $wishlist['get_product_detail']['sku']) }}">
                        <h5 class="fw-bold text-one-line">{{ $wishlist['get_product_detail']['name'] }}</h5>
                      </a>
                    </div>
                    <div class="card-footer bg-transparent">
                      <div class="d-flex justify-content-between align-items-center flex-wrap py-2">
                        <h5 class="mb-0">${{ $wishlist['get_product_detail']['price'] }}</h5>
                        <a class="btn btn-dark rounded-pill text-12 px-4" href="{{ route('buyerDeleteWishlist',  \Illuminate\Support\Facades\Crypt::encrypt($wishlist['id'])) }}">Delete</i></a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                @else
                  <div class="text-center fs-2">No Records Found</div>
                @endif
              </div>
            </div>
        </div>
    </div>
  </section>
@endsection