@extends('layouts.guest')
@section('title','Home')
@section('content')
  <input type="hidden"  value="1" class="productpagecount">
  <input type="hidden"  value="{{ route('pagination-records') }}" class="getProductPageURL">
  <input type="hidden"  value="{{ @$search }}" class="productsearchkeyword">
  <section class="get-started-banner-section --search-banner">
    <!-- <img class="w-100" src="assets/images/get-started/banner.png" alt=""> -->
    <div class="container">
      <div class="d-flex  justify-content-end">
        <div class="text-end --banner-text">
          <h2 class="fw-bold">Get the Real Deal</h2>
          <h4 class="fw-semibold">
            <!-- Browse through all your favourite products and get the best deals. -->
            We have the highest quality at unbeatable rates that you won't find anywhere else.
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
                <form method="get" action="{{ route('search-products') }}">
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
                <p class="mb-0">{{count($products)}} Results Found</p>
              </div>
              <div class="urban-sub-title mb-4">
                <p class="mb-0">
                  <!-- Search Results -->
                  Search Results
                </p>
              </div>
            </div>
            <!-- <div>
              <button type="button" class="btn btn-dark rounded-pill px-4 py-3">Get Featured Now</button>
            </div> -->
          </div>
         
        </div>
      </div>

        <!-- loadmore started  -->
        @if(count($products) > 0)
        <div class="row loadmore loadmore-main">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card product-item border-0 shadow-sm mb-5">
                        <div class="card-body ">
                            <a class="text-decoration-none text-dark" target="_blank" title="view details" href="{{ route('product-detail', $product->sku) }}">
                              <img class="product-img-size mb-3" src="{{ productDefaultImage($product->id)}}" alt="">
                            </a>
                            <a class="text-decoration-none text-dark" title="view details" href="{{ route('product-detail', $product->sku) }}"><h5 class="fw-bold text-one-line">{{$product->name }}</h5></a>
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <span class="badge rounded-pill bg-secondary-two text-dark px-3 py-2 my-2">{{@$product->user->name }}</span>
                                <a class="text-decoration-none text-dark" title="Rate Product on detail page" href="{{ route('product-detail', $product->sku) }}">
                                  <div class="d-flex my-2">
                                      <i class="fas fa-star me-2 text--primary text-13"></i>
                                      <i class="fas fa-star me-2 text--primary text-13"></i>
                                      <i class="fas fa-star me-2 text--primary text-13"></i>
                                      <i class="fas fa-star me-2 text--primary text-13"></i>
                                      <i class="fas fa-star text--primary text-13"></i>
                                  </div>
                                </a>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent">
                            <div class="d-flex justify-content-between flex-wrap py-2">
                            <h5 class="mb-0">${{number_format($product->price,2)}}</h5>
                            <div class="d-flex align-items-center">
                                @if(Auth::check())
                                <a href="javascript:void(0)" title="Add to favourite" class="add-favourite-product" data-productid="{{$product->id }}">
                                  <svg class="me-2" width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="26" height="27" fill="url(#pattern0)"></rect>
                                    <defs>
                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0" transform="translate(0 -0.00365497) scale(0.00657895 0.00633528)"></use>
                                    </pattern>
                                    <image id="image0" width="152" height="159" xlink:href="data:image/png;base64,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UmVhZHlxyWU8AAADI2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNi4wLWMwMDIgNzkuMTY0NDYwLCAyMDIwLzA1LzEyLTE2OjA0OjE3ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpDMTY4NDJEQUEzOTcxMUVCOTI3RkY4OTk5MTc4NUYyNCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpDMTY4NDJEOUEzOTcxMUVCOTI3RkY4OTk5MTc4NUYyNCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgMjEuMiAoV2luZG93cykiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpCQTM1NTA1NTlGNkUxMUVCOTBERkJCQjZBREY2NUQzNiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpCQTM1NTA1NjlGNkUxMUVCOTBERkJCQjZBREY2NUQzNiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PpayvVgAAAgsSURBVHja7J1pyFVFGMfn1ev+aqZlmmkimUW0SPlBTD+URqVhZPYliko/JIVlfpBS2gzBojKlRFqMKFuJaLMvJpWlhSYtopGk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"></image>
                                    </defs>
                                  </svg>
                                </a>
                                @else
                                <a href="{{ route('signin') }}" title="Add to favourite">
                                <svg class="me-2" width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                      <rect width="26" height="27" fill="url(#pattern0)"></rect>
                                      <defs>
                                      <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                      <use xlink:href="#image0" transform="translate(0 -0.00365497) scale(0.00657895 0.00633528)"></use>
                                      </pattern>
                                      <image id="image0" width="152" height="159" xlink:href="data:image/png;base64,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UmVhZHlxyWU8AAADI2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNi4wLWMwMDIgNzkuMTY0NDYwLCAyMDIwLzA1LzEyLTE2OjA0OjE3ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpDMTY4NDJEQUEzOTcxMUVCOTI3RkY4OTk5MTc4NUYyNCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpDMTY4NDJEOUEzOTcxMUVCOTI3RkY4OTk5MTc4NUYyNCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgMjEuMiAoV2luZG93cykiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpCQTM1NTA1NTlGNkUxMUVCOTBERkJCQjZBREY2NUQzNiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpCQTM1NTA1NjlGNkUxMUVCOTBERkJCQjZBREY2NUQzNiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PpayvVgAAAgsSURBVHja7J1pyFVFGMfn1ev+aqZlmmkimUW0SPlBTD+URqVhZPYliko/JIVlfpBS2gzBojKlRFqMKFuJaLMvJpWlhSYtopGk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"></image>
                                      </defs>
                                  </svg>
                                </a>
                                @endif
                                @if(Auth::check() && Auth::user()->user_type != 3)
                                <a href="javascript:void(0)" class="add-to-cart" title="Add to cart" id="add-to-cart" data-productid="{{ $product->id }}">
                                  <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.2812 19.4219C19.2812 19.8965 18.8965 20.2812 18.4219 20.2812H17.5625V21.1406C17.5625 21.6153 17.1778 22 16.7031 22C16.2285 22 15.8438 21.6153 15.8438 21.1406V20.2812H14.9844C14.5097 20.2812 14.125 19.8965 14.125 19.4219C14.125 18.9472 14.5097 18.5625 14.9844 18.5625H15.8438V17.7031C15.8438 17.2285 16.2285 16.8438 16.7031 16.8438C17.1778 16.8438 17.5625 17.2285 17.5625 17.7031V18.5625H18.4219C18.8965 18.5625 19.2812 18.9472 19.2812 19.4219ZM19.2812 6.01562V14.2656C19.2812 14.7403 18.8965 15.125 18.4219 15.125C17.9472 15.125 17.5625 14.7403 17.5625 14.2656V6.875H15.8438V9.45312C15.8438 9.92776 15.459 10.3125 14.9844 10.3125C14.5097 10.3125 14.125 9.92776 14.125 9.45312V6.875H5.875V9.45312C5.875 9.92776 5.49026 10.3125 5.01562 10.3125C4.54099 10.3125 4.15625 9.92776 4.15625 9.45312V6.875H2.4375V20.2812H11.5469C12.0215 20.2812 12.4062 20.666 12.4062 21.1406C12.4062 21.6153 12.0215 22 11.5469 22H1.57812C1.10349 22 0.71875 21.6153 0.71875 21.1406V6.01562C0.71875 5.54099 1.10349 5.15625 1.57812 5.15625H4.1969C4.53829 2.25685 7.01036 0 10 0C12.9896 0 15.4617 2.25685 15.8031 5.15625H18.4219C18.8965 5.15625 19.2812 5.54099 19.2812 6.01562ZM14.0674 5.15625C13.7391 3.20783 12.0403 1.71875 10 1.71875C7.95971 1.71875 6.2609 3.20783 5.93262 5.15625H14.0674Z" fill="black"/>
                                  </svg>
                                </a>
                                @else
                                  @if(!Auth::check())
                                    <a href="{{ route('signin') }}">
                                      <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.2812 19.4219C19.2812 19.8965 18.8965 20.2812 18.4219 20.2812H17.5625V21.1406C17.5625 21.6153 17.1778 22 16.7031 22C16.2285 22 15.8438 21.6153 15.8438 21.1406V20.2812H14.9844C14.5097 20.2812 14.125 19.8965 14.125 19.4219C14.125 18.9472 14.5097 18.5625 14.9844 18.5625H15.8438V17.7031C15.8438 17.2285 16.2285 16.8438 16.7031 16.8438C17.1778 16.8438 17.5625 17.2285 17.5625 17.7031V18.5625H18.4219C18.8965 18.5625 19.2812 18.9472 19.2812 19.4219ZM19.2812 6.01562V14.2656C19.2812 14.7403 18.8965 15.125 18.4219 15.125C17.9472 15.125 17.5625 14.7403 17.5625 14.2656V6.875H15.8438V9.45312C15.8438 9.92776 15.459 10.3125 14.9844 10.3125C14.5097 10.3125 14.125 9.92776 14.125 9.45312V6.875H5.875V9.45312C5.875 9.92776 5.49026 10.3125 5.01562 10.3125C4.54099 10.3125 4.15625 9.92776 4.15625 9.45312V6.875H2.4375V20.2812H11.5469C12.0215 20.2812 12.4062 20.666 12.4062 21.1406C12.4062 21.6153 12.0215 22 11.5469 22H1.57812C1.10349 22 0.71875 21.6153 0.71875 21.1406V6.01562C0.71875 5.54099 1.10349 5.15625 1.57812 5.15625H4.1969C4.53829 2.25685 7.01036 0 10 0C12.9896 0 15.4617 2.25685 15.8031 5.15625H18.4219C18.8965 5.15625 19.2812 5.54099 19.2812 6.01562ZM14.0674 5.15625C13.7391 3.20783 12.0403 1.71875 10 1.71875C7.95971 1.71875 6.2609 3.20783 5.93262 5.15625H14.0674Z" fill="black"/>
                                      </svg>
                                    </a>
                                  @endif
                                @endif
                            </div>
                        </div>
                        @if(Auth::check() && Auth::user()->user_type != 3)
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
              <h6 class="text--gray-color px-5">
                <!-- If it’s not what you ordered,  we guarantee to give your money back. -->
                Your information is protected from unauthorized access, and your credit card information is safe on our encrypted servers.

              
              </h6>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-3" data-aos="fade-up">
          <div class="card bg--black-two br-30 py-4 h-100">
            <img class="w-101 mx-auto mt--75 " src="{{ asset('assets/images/get-started/bus.png')}}" alt="">
            <div class="card-body text-center py-4">
              <h3 class="text-white fw-bold mb-3">Free <br> Delivery</h3>
              <h6 class="text--gray-color px-5">
                <!-- If it’s not what you ordered, we guarantee to give your money back. -->
                You won't have to think about exorbitant shipping costs because we'll deliver your products for free.

              </h6>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-3" data-aos="fade-up">
          <div class="card bg--black-two br-30 py-4 h-100">
            <img class="w-101 mx-auto mt--75 " src="{{ asset('assets/images/get-started/monitor.png')}}" alt="">
            <div class="card-body text-center py-4">
              <h3 class="text-white fw-bold mb-3">Free <br> Authentication</h3>
              <h6 class="text--gray-color px-5">
                <!-- If it’s not what you ordered, we guarantee to give your money back. -->
                We know you because our authentication is fast and even better, it's free.
              </h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


 
@endsection