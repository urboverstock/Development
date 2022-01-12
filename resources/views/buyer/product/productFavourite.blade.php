@extends('layouts.buyer')
@section('title','Product Favourite')

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
                    <p class="mb-0 pe-4">My favourite</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="orders">
                @if(count($favourites) > 0)
                @foreach($favourites as $key => $favourite)
                <div class="custom-orders">
                  <div class="card product-item border-0 shadow br-12 mb-5">
                    <div class="card-body "> 
                      <a class="text-decoration-none text-dark" target="_blank" href="{{ route('product-detail', $favourite['get_product_detail']['sku']) }}">
                        <img class="product-img-size br-12 mb-3" src="{{ productDefaultImage($favourite['get_product_detail']['id'])}}" alt="">
                      </a>
                      <a class="text-decoration-none text-dark" target="_blank" href="{{ route('product-detail', $favourite['get_product_detail']['sku']) }}">
                        <h5 class="fw-bold text-one-line">{{ $favourite['get_product_detail']['name'] }}</h5>
                      </a>
                    </div>
                    <div class="card-footer bg-transparent">
                      <div class="d-flex justify-content-between align-items-center flex-wrap py-2">
                        <h5 class="mb-0">${{ $favourite['get_product_detail']['price'] }}</h5>
                        <a class="btn btn-dark rounded-pill text-12 px-4" href="{{ route('buyerDeleteFavourite',  \Illuminate\Support\Facades\Crypt::encrypt($favourite['id'])) }}">Delete</i></a>
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