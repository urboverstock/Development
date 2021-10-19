@extends('layouts.guest')
@section('title','Home')
@section('content')
  <input type="hidden"  value="1" class="productpagecount">
  <input type="hidden"  value="{{ route('pagination-records') }}" class="getProductPageURL">
  <input type="hidden"  value="{{ @$search }}" class="productsearchkeyword">
  <section class="get-started-banner-section --products-banner">
    <!-- <img class="w-100" src="assets/images/get-started/banner.png" alt=""> -->
    <div class="container">
      <div class="d-flex  justify-content-end">
        <div class="text-end --banner-text">
          <h2 class="fw-bold">
            <!-- Get the Real Deal -->
            Looking for something 
          </h2>
          <h4 class="fw-semibold">
            <!-- Browse through all your favourite products and get the best deals. -->
            Let us assist you in locating the appropriate items.

          </h4>
        </div>
      </div>
    </div>
  </section>

  <!-- filter-div  -->
  <div class="bg-primary--two">
      <div class="container">
          <div class="d-flex justify-content-between align-items-center flex-wrap py-4">
              <div class="d-flex flex-grow-1 my-2">
                  <img class="me-2" src="assets/images/get-started/filter-icon.png" alt="">
                  <h6 class="mb-0 fw-bold">Filter By</h6>
              </div>
                <form method="get" action="{{ route('products') }}">
                  @csrf
                  <div class="d-flex flex-grow-1 flex-wrap flex-lg-nowrap my-2">
                    <select class="form-select border-0 br-10 shadow-sm py-2 text--gray-one text-14 fw-bold me-3 my-2" aria-label="Default select example" name="brand">
                        <option selected class="" disabled="">Brand</option>

                        @if(isset($brands) && !empty($brands))
                          @foreach($brands as $brand)
                          <option value="{{ $brand['brand'] }}" {{ @$filter_brand == $brand['brand'] ? 'selected' : '' }}>{{ $brand['brand'] }}</option>
                          @endforeach
                        @endif

                    </select>
                    <!-- <select class="form-select border-0 br-10 shadow-sm py-2 text--gray-one text-14 fw-bold me-3 my-2" aria-label="Default select example" name="gender">
                        <option selected class="">Gender</option>
                        <option value="1" {{ (@$gender == '1') ? 'selected' : '' }}>Men</option>
                        <option value="2" {{ (@$gender == '1') ? 'selected' : '' }}>Women</option>
                    </select> -->
                    <select class="form-select border-0 br-10 shadow-sm py-2 text--gray-one text-14 fw-bold me-3 my-2" aria-label="Default select example" name="price">
                        <option selected class="" disabled="">Price</option>
                        <option value="0 - 100" {{ @$price == '0 - 100' ? 'selected' : '' }}>0 - 100</option>
                        <option value="101 - 500" {{ @$price == '101 - 500' ? 'selected' : '' }}>101 - 500</option>
                        <option value="501 - 1000" {{ @$price == '501 - 1000' ? 'selected' : '' }}>501 - 1000</option>
                        <option value="1001" {{ @$price == '1001' ? 'selected' : '' }}>1001 > </option>
                    </select>
                    <select class="form-select border-0 br-10 shadow-sm py-2 text--gray-one text-14 fw-bold me-3 my-2" aria-label="Default select example" name="category">
                        <option class="" value="" disabled="" selected="">Category</option>
                        @foreach($categories as $category)

                        @php
                          if($category->id == @$_GET['category']) {
                            $selected = 'selected';
                          } else {
                            $selected = '';
                          }
                        @endphp
                        
                        <option value="{{$category->id}}" {{$selected}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-dark my-2">
                        <i class="fas fa-search"></i>
                    </button>
                  </div>
                </form>
          </div>
      </div>
  </div>
  
  <!-- featured-select  -->
  <section class="pb-5">
    <div class="container-xl">
      <div class="row">
        <div class="col-lg-12 mb-5" data-aos="fade-up">
          <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div>
              <div class="urban-title text--primary position-relative mb-2">
                <p class="mb-0">Find your style</p>
              </div>
              <div class="urban-sub-title mb-4">
                <p class="mb-0">Urban Products</p>
              </div>
            </div>
            <div>
              <button type="button" class="btn btn-dark rounded-pill px-4 py-3">Get Featured Now</button>
            </div>
          </div>
         
        </div>
      </div>

        <!-- loadmore started  -->
        @if(count($products) > 0)
        <div class="row loadmore loadmore-main">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-6 col-sm-6 mb-5">
                    <div class="card product-item border-0 shadow-sm h-100">
                        <div class="card-body ">
                            <img class="img-fluid productImg" src="{{ productDefaultImage($product->id)}}" alt="">
                            <a class="text-decoration-none text-dark" href="{{ route('product-detail', $product->sku) }}"><h5 class="fw-bold">{{$product->name }}</h5></a>
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <span class="badge rounded-pill bg-secondary-two text-dark px-3 py-2 my-2">{{@$product->user->name }}</span>
                                <div class="d-flex my-2">
                                    <i class="fas fa-star me-2 text--primary text-13"></i>
                                    <i class="fas fa-star me-2 text--primary text-13"></i>
                                    <i class="fas fa-star me-2 text--primary text-13"></i>
                                    <i class="fas fa-star me-2 text--primary text-13"></i>
                                    <i class="fas fa-star text--primary text-13"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent">
                            <div class="d-flex justify-content-between flex-wrap py-2">
                            <h5 class="mb-0">${{number_format($product->price,2)}}</h5>
                            <div class="d-flex align-items-center">
                                @if(Auth::check())
                                <a href="javascript:void(0)" class="add-favourite-product" data-productid="{{$product->id }}"><i class="far fa-heart fs-5 me-2 mt-2 text-dark"></i></a>
                                @else
                                <a href="{{ route('signin') }}"><i class="far fa-heart fs-5 me-2 mt-2 text-dark"></i></a>
                                @endif
                                @if(Auth::check())
                                <a href="javascript:void(0)" class="add-to-cart" id="add-to-cart" data-productid="{{ $product->id }}">
                                  <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.2812 19.4219C19.2812 19.8965 18.8965 20.2812 18.4219 20.2812H17.5625V21.1406C17.5625 21.6153 17.1778 22 16.7031 22C16.2285 22 15.8438 21.6153 15.8438 21.1406V20.2812H14.9844C14.5097 20.2812 14.125 19.8965 14.125 19.4219C14.125 18.9472 14.5097 18.5625 14.9844 18.5625H15.8438V17.7031C15.8438 17.2285 16.2285 16.8438 16.7031 16.8438C17.1778 16.8438 17.5625 17.2285 17.5625 17.7031V18.5625H18.4219C18.8965 18.5625 19.2812 18.9472 19.2812 19.4219ZM19.2812 6.01562V14.2656C19.2812 14.7403 18.8965 15.125 18.4219 15.125C17.9472 15.125 17.5625 14.7403 17.5625 14.2656V6.875H15.8438V9.45312C15.8438 9.92776 15.459 10.3125 14.9844 10.3125C14.5097 10.3125 14.125 9.92776 14.125 9.45312V6.875H5.875V9.45312C5.875 9.92776 5.49026 10.3125 5.01562 10.3125C4.54099 10.3125 4.15625 9.92776 4.15625 9.45312V6.875H2.4375V20.2812H11.5469C12.0215 20.2812 12.4062 20.666 12.4062 21.1406C12.4062 21.6153 12.0215 22 11.5469 22H1.57812C1.10349 22 0.71875 21.6153 0.71875 21.1406V6.01562C0.71875 5.54099 1.10349 5.15625 1.57812 5.15625H4.1969C4.53829 2.25685 7.01036 0 10 0C12.9896 0 15.4617 2.25685 15.8031 5.15625H18.4219C18.8965 5.15625 19.2812 5.54099 19.2812 6.01562ZM14.0674 5.15625C13.7391 3.20783 12.0403 1.71875 10 1.71875C7.95971 1.71875 6.2609 3.20783 5.93262 5.15625H14.0674Z" fill="black"/>
                                  </svg>
                                </a>
                                @else
                                <a href="{{ route('signin') }}">
                                  <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.2812 19.4219C19.2812 19.8965 18.8965 20.2812 18.4219 20.2812H17.5625V21.1406C17.5625 21.6153 17.1778 22 16.7031 22C16.2285 22 15.8438 21.6153 15.8438 21.1406V20.2812H14.9844C14.5097 20.2812 14.125 19.8965 14.125 19.4219C14.125 18.9472 14.5097 18.5625 14.9844 18.5625H15.8438V17.7031C15.8438 17.2285 16.2285 16.8438 16.7031 16.8438C17.1778 16.8438 17.5625 17.2285 17.5625 17.7031V18.5625H18.4219C18.8965 18.5625 19.2812 18.9472 19.2812 19.4219ZM19.2812 6.01562V14.2656C19.2812 14.7403 18.8965 15.125 18.4219 15.125C17.9472 15.125 17.5625 14.7403 17.5625 14.2656V6.875H15.8438V9.45312C15.8438 9.92776 15.459 10.3125 14.9844 10.3125C14.5097 10.3125 14.125 9.92776 14.125 9.45312V6.875H5.875V9.45312C5.875 9.92776 5.49026 10.3125 5.01562 10.3125C4.54099 10.3125 4.15625 9.92776 4.15625 9.45312V6.875H2.4375V20.2812H11.5469C12.0215 20.2812 12.4062 20.666 12.4062 21.1406C12.4062 21.6153 12.0215 22 11.5469 22H1.57812C1.10349 22 0.71875 21.6153 0.71875 21.1406V6.01562C0.71875 5.54099 1.10349 5.15625 1.57812 5.15625H4.1969C4.53829 2.25685 7.01036 0 10 0C12.9896 0 15.4617 2.25685 15.8031 5.15625H18.4219C18.8965 5.15625 19.2812 5.54099 19.2812 6.01562ZM14.0674 5.15625C13.7391 3.20783 12.0403 1.71875 10 1.71875C7.95971 1.71875 6.2609 3.20783 5.93262 5.15625H14.0674Z" fill="black"/>
                                  </svg>
                                </a>
                                @endif
                            </div>
                        </div>
                        @if(Auth::check())
                        <div class="product-wishlist position-absolute end-0 pe-3">
                            <button type="button" class="btn btn--primary btn-sm fw-bold add-wishlist-product" data-productid="{{$product->id }}">Add to Wishlist</button>
                        </div>
                        @endif
                    </div>
                </div>
              </div>
            @endforeach
      </div>
     

      @if(count($products) >= 8)
       <div><button type="button" class=" btn btn-dark rounded-pill px-4 py-3 d-flex m-auto loadmoreproductsbtn" >Load More Products</button>
      </div>
      @endif
      @else
      <div class="row loadmore loadmore-main text-center">
          <h2>No Item found!</h2>
      </div>
      @endif
      <div class="border-bottom py-3 mt-3"></div>
      <!-- loadmore end  -->
    </div>
  </section>
  <section class="pt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center mb-5">
          <h6 class="display-6 fw-bold">
            <!-- Trending Now -->
            Be a seller on Urban overstock               
          </h6>
          <h3 class="text-muted">
            <!-- Some of the hot things on the charts -->
            Are you looking for a good place to sell your items? We've got you covered. Let's get you started by registering.

          </h3>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
          <div class="card card-hover cursor-pointer border-0 shadow-sm mb-4 h-100 br-10">
            <div class="card-body d-flex align-items-center">
                
              <a href="#" class="fw-bold h4 mb-0 px-4">Jeans</a>
               
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
          <div class="card card-hover cursor-pointer border-0 shadow-sm mb-4 h-100 br-10">
            <div class="card-body d-flex align-items-center">
                
              <a href="#" class="fw-bold h4 mb-0 px-4">Shorts</a>
               
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
          <div class="card card-hover cursor-pointer border-0 shadow-sm mb-4 h-100 br-10">
            <div class="card-body d-flex align-items-center">
                
              <a href="#" class="fw-bold h4 mb-0 px-4">Gowns</a>
               
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
          <div class="card card-hover cursor-pointer border-0 shadow-sm mb-4 h-100 br-10">
            <div class="card-body d-flex align-items-center">
                
              <a href="#" class="fw-bold h4 mb-0 px-4">Sneakers</a>
               
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
          <div class="card card-hover cursor-pointer border-0 shadow-sm mb-4 h-100 br-10">
            <div class="card-body d-flex align-items-center">
                
              <a href="#" class="fw-bold h4 mb-0 px-4">Heels</a>
               
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
          <div class="card card-hover cursor-pointer border-0 shadow-sm mb-4 h-100 br-10">
            <div class="card-body d-flex align-items-center">
                
              <a href="#" class="fw-bold h4 mb-0 px-4">Scarfs</a>
               
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
          <div class="card card-hover cursor-pointer border-0 shadow-sm mb-4 h-100 br-10">
            <div class="card-body d-flex align-items-center">
                
              <a href="#" class="fw-bold h4 mb-0 px-4">Lingerie</a>
               
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
          <div class="card card-hover cursor-pointer border-0 shadow-sm mb-4 h-100 br-10">
            <div class="card-body d-flex align-items-center">
                
              <a href="#" class="fw-bold h4 mb-0 px-4">Accessories</a>
               
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <div class="container"  data-aos="fade-up">
  <h1 class="fw-bold text-center mb-5">We’ve got your back <span class="text--primary">on everything</span></h1>

  </div>

  <section class="bg--black position-relative seller-section mt-0">
    <img class="position-absolute --after-arrow start-50 " src="assets/images/get-started/after-arrow.png" alt="">
    <img class="position-absolute  half-dots-position d-md-block d-none" src="assets/images/get-started/background-dots.png" alt="">
    <div class="container">
      <div class="row pt-5">
        <div class="col-lg-4 mb-3" data-aos="fade-up">
          <div class="card bg--black-two br-30 py-4 h-100">
            <img class="w-101 mx-auto mt--75 " src="{{ asset('assets/images/get-started/secure-card.png') }}" alt="">
            <div class="card-body text-center py-4">
              <h3 class="text-white fw-bold mb-3">Protected <br> Payments</h3>
              <h6 class="text--gray-color px-5">If it’s not what you ordered, 
                we guarantee to give your 
                money back.</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-3" data-aos="fade-up">
          <div class="card bg--black-two br-30 py-4 h-100">
            <img class="w-101 mx-auto mt--75 " src="{{ asset('assets/images/get-started/bus.png')}}" alt="">
            <div class="card-body text-center py-4">
              <h3 class="text-white fw-bold mb-3">Free <br> Delivery</h3>
              <h6 class="text--gray-color px-5">If it’s not what you ordered, 
                we guarantee to give your 
                money back.</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-3" data-aos="fade-up">
          <div class="card bg--black-two br-30 py-4 h-100">
            <img class="w-101 mx-auto mt--75 " src="{{ asset('assets/images/get-started/monitor.png')}}" alt="">
            <div class="card-body text-center py-4">
              <h3 class="text-white fw-bold mb-3">Free <br> Authentication</h3>
              <h6 class="text--gray-color px-5">If it’s not what you ordered, 
                we guarantee to give your 
                money back.</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


 
@endsection