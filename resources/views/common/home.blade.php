@extends('layouts.guest')
@section('title','Home')
@section('content')
  <!-- carousel section  -->

    <!-- carousel section  -->
  <section id="z-home" class="section-1">
    <div class="row">
      <div class="col-md-12">
        <!-- <img class="w-100 banner" src="" alt=""> -->
        <div id="carouselExampleControls" class="carousel slide carousel-dark " data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="position-relative">
                <img src="{{ asset('assets/images/banner.jpg') }}" class="d-lg-block vh-100 w-100" style="object-fit: cover; " alt="...">
                <div class="carousel-content-1 " data-aos="fade-up">
                  <h1 class="display-5 fw-bold mb-4">Your Favourite Brands Under Single Roof</h1>
                  <p class="mb-5">Designer. Preloved. Vintage. Streetwear. Sneakers. Whatever your style. Find it on Depop.</p>
                  
                   <a href="{{ route('get-started') }}" class="btn btn--primary btn-lg border-0 shadow-none fw-bold px-5 py-4 carousel-sec-button">Let's Get Started</a>
                </div>
                <!-- <div class="carousel-app">
                   <div>
                    <a href="#" class="me-3 text-decoration-none">
                      <img src="{{ asset('assets/images/playstore.png') }}" alt="">
                    </a>
                    <a href="#" class="text-decoration-none" >
                      <img src="{{ asset('assets/images/applestore.png') }}" alt="">
                    </a>
                    
                  </div>
                 
                </div> -->
                <div class="carousel-social-media">
                  <a href="#" class="text-light text-decoration-none mb-4">
                    <i class="fab fa-facebook-f fs-3"></i>
                  </a>
                  <a href="#" class="text-light text-decoration-none mb-4">
                    <i class="fab fa-twitter fs-3"></i>
                  </a>
                  <a href="#" class="text-light text-decoration-none mb-4">
                    <i class="fab fa-linkedin-in fs-3"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="position-relative">
                <img src="{{ asset('assets/images/banner-2.jpeg') }}" class="d-lg-block vh-100 w-100" style="object-fit: cover; " alt="...">
                <div class="carousel-content-1 " data-aos="fade-up">
                  <h1 class="display-5 fw-bold mb-4 text-white">Your Favourite Brands Under Single Roof</h1>
                  <p class="mb-5 text-white">Designer. Preloved. Vintage. Streetwear. Sneakers. Whatever your style. Find it on Depop.</p>
                  
                   <a href="{{ route('get-started') }}" class="btn btn--primary btn-lg border-0 shadow-none fw-bold px-5 py-4 carousel-sec-button">Let's Get Started</a>
                </div>
                 <!-- <div class="carousel-app">
                   <div>
                    <a href="#" class="me-3 text-decoration-none">
                      <img src="{{ asset('assets/images/playstore.png') }}" alt="">
                    </a>
                    <a href="#" class="text-decoration-none" >
                      <img src="{{ asset('assets/images/applestore.png') }}" alt="">
                    </a>
                    
                  </div>
                 
                </div> -->
                <div class="carousel-social-media">
                  <a href="#" class="text-light text-decoration-none mb-4">
                    <i class="fab fa-facebook-f fs-3"></i>
                  </a>
                  <a href="#" class="text-light text-decoration-none mb-4">
                    <i class="fab fa-twitter fs-3"></i>
                  </a>
                  <a href="#" class="text-light text-decoration-none mb-4">
                    <i class="fab fa-linkedin-in fs-3"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="position-relative">
                <img src="{{ asset('assets/images/banner-3.jpeg') }}" class="d-lg-block vh-100 w-100" style="object-fit: cover; " alt="...">
                <div class="carousel-content-1 " data-aos="fade-up">
                  <h1 class="display-5 fw-bold mb-4 text-white">Your Favourite Brands Under Single Roof</h1>
                  <p class="mb-5 text-white">Designer. Preloved. Vintage. Streetwear. Sneakers. Whatever your style. Find it on Depop.</p>
                  
                  <a href="{{ route('get-started') }}" class="btn btn--primary btn-lg border-0 shadow-none fw-bold px-5 py-4 carousel-sec-button">Let's Get Started</a>
                </div>
                <div class="carousel-app">
                   <!-- <div>
                    <a href="#" class="me-3 text-decoration-none">
                      <img src="{{ asset('assets/images/playstore.png') }}" alt="">
                    </a>
                    <a href="#" class="text-decoration-none" >
                      <img src="{{ asset('assets/images/applestore.png') }}" alt="">
                    </a>
                    
                  </div> -->
                 
                </div>
                <div class="carousel-social-media">
                  <a href="#" class="text-light text-decoration-none mb-4">
                    <i class="fab fa-facebook-f fs-3"></i>
                  </a>
                  <a href="#" class="text-light text-decoration-none mb-4">
                    <i class="fab fa-twitter fs-3"></i>
                  </a>
                  <a href="#" class="text-light text-decoration-none mb-4">
                    <i class="fab fa-linkedin-in fs-3"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="position-relative">
                <img src="{{ asset('assets/images/banner-4.jpg') }}" class="d-lg-block vh-100 w-100" style="object-fit: cover; " alt="...">
                <div class="carousel-content-1 " data-aos="fade-up">
                  <h1 class="display-5 fw-bold mb-4 text-dark">Your Favourite Brands Under Single Roof</h1>
                  <p class="mb-5 text-dark">Designer. Preloved. Vintage. Streetwear. Sneakers. Whatever your style. Find it on Depop.</p>
                  
                  <a href="{{ route('get-started') }}" class="btn btn--primary btn-lg border-0 shadow-none fw-bold px-5 py-4 carousel-sec-button">Let's Get Started</a>
                </div>
                <!-- <div class="carousel-app">
                   <div>
                    <a href="#" class="me-3 text-decoration-none">
                      <img src="{{ asset('assets/images/playstore.png') }}" alt="">
                    </a>
                    <a href="#" class="text-decoration-none" >
                      <img src="{{ asset('assets/images/applestore.png') }}" alt="">
                    </a>
                    
                  </div>
                 
                </div> -->
                <div class="carousel-social-media">
                  <a href="#" class="text-light text-decoration-none mb-4">
                    <i class="fab fa-facebook-f fs-3"></i>
                  </a>
                  <a href="#" class="text-light text-decoration-none mb-4">
                    <i class="fab fa-twitter fs-3"></i>
                  </a>
                  <a href="#" class="text-light text-decoration-none mb-4">
                    <i class="fab fa-linkedin-in fs-3"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="position-relative">
                <img src="{{ asset('assets/images/banner-5.jpg') }}" class="d-lg-block vh-100 w-100" style="object-fit: cover; " alt="...">
                <div class="carousel-content-1 " data-aos="fade-up">
                  <h1 class="display-5 fw-bold mb-4 text-white">Your Favourite Brands Under Single Roof</h1>
                  <p class="mb-5 text-white">Designer. Preloved. Vintage. Streetwear. Sneakers. Whatever your style. Find it on Depop.</p>
                  
                  <a href="{{ route('get-started') }}" class="btn btn--primary btn-lg border-0 shadow-none fw-bold px-5 py-4 carousel-sec-button">Let's Get Started</a>
                </div>
                <div class="carousel-app">
                   <!-- <div>
                    <a href="#" class="me-3 text-decoration-none">
                      <img src="{{ asset('assets/images/playstore.png') }}" alt="">
                    </a>
                    <a href="#" class="text-decoration-none" >
                      <img src="{{ asset('assets/images/applestore.png') }}" alt="">
                    </a>
                    
                  </div> -->
                 
                </div>
                <div class="carousel-social-media">
                  <a href="#" class="text-light text-decoration-none mb-4">
                    <i class="fab fa-facebook-f fs-3"></i>
                  </a>
                  <a href="#" class="text-light text-decoration-none mb-4">
                    <i class="fab fa-twitter fs-3"></i>
                  </a>
                  <a href="#" class="text-light text-decoration-none mb-4">
                    <i class="fab fa-linkedin-in fs-3"></i>
                  </a>
                </div>
              </div>
            </div>
            
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- section-2 men women  -->
  <section class="section-2">
    <div class="row">
      <div class="col-md-6 m-0 p-0" >
        <a href="{{route('search-products')}}?category=1" class="text-dark text-decoration-none position-relative">
          <h4 class="fw-bold position-absolute p-5"  data-aos="fade-left">Men</h4>
          <img class="w-100" src="{{ asset('assets/images/men.png') }}" alt="">
        </a>  
      </div>
      <div class="col-md-6 m-0 p-0">
        <a href="{{route('search-products')}}?category=2" class="text-dark text-decoration-none position-relative">
          <h4 class="fw-bold position-absolute end-0 p-5"  data-aos="fade-right">Women</h4>
          <img class="w-100" src="{{ asset('assets/images/women.png') }}" alt="">
        </a>  
      </div>
    </div>
  </section>

   <!-- section-7 carousel-section -->
   <section class="meet-sellers">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 mb-5" data-aos="fade-left">
          <div class="sec-7-header">
            <div class="urban-title text--primary position-relative mb-2">
              <p class="mb-0">Browse through</p>
            </div>
            <div class="urban-sub-title mb-4">
              <p class="mb-0">Meet Sellers</p>
            </div>
          </div>
        </div>
       
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12" data-aos="fade-up">
          <div class="center-slick">
            @foreach($sellers as $seller)
              <div class="items">
                <div class="card sec-7-card border-0 shadow">
                  <div class="card-body">
                    <div class="d-flex align-items-center sec-7-card-sm-title flex-wrap">
                      <img class="img-fluid me-2" src="{{ asset($seller->profile_pic) }}" alt="">
                      <h2 class="fw-bold mb-0">{{ $seller->name }}</h2>
                    </div>

                    <div class="sec-7-card-lg-title">
                      <div class="d-flex align-items-center border-bottom py-3 flex-wrap">
                        <img class="avatar me-3" src="{{ asset('assets/images/section-7/1.png') }}" alt="">
                        <div class="me-3">
                          <p class="fw-bold mb-1 text-white">{{ $seller->name }}</p>
                          <div class="d-flex">
                            <i class="far fa-star text-white"></i>
                            <i class="far fa-star text-white"></i>
                            <i class="far fa-star text-white"></i>
                            <i class="far fa-star text-white"></i>
                            <i class="far fa-star text-white"></i>
                          </div>
                        </div>
                        <span class="badge bg--primary-darken px-3">
                          <i class="far fa-envelope h2 mb-0"></i>
                        </span>
                      </div>
                      <div class="d-flex align-items-center justify-content-between flex-wrap my-4">
                        <h6 class="mb-0 fw-bold text-white">247k Followers</h6>
                        <button type="button" class="btn btn-dark shadow-0 border-0 px-3 rounded-0">Follow</button>
                      </div>
                      <div>
                        <h6 class="fw-bold text-white">{{$seller->about}}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
           
           
          </div>
        </div>
      </div>
    </div>    
   </section>

  <!-- section-3 -->
  <section id="z-about" class="z-about">
    <div class="row align-items-center">
      <div class="col-lg-6 d-none d-lg-block">
        <img  data-aos="fade-up" src="{{ asset('assets/images/section-3/1.png') }}" alt="">
      </div>
      <div class="col-lg-5 p-5"  data-aos="fade-left">
        <h4 class="text--primary font-500">A Brief About</h4>
        <h1 class="fw-bold mb-4">THE URBAN OVERSTOCK</h1>
        <p class="text-muted mb-5">Depop is the fashion marketplace app where the next generation come to discover unique items. With a global community buying, selling and connecting to make fashion more inclusive, diverse and less wasteful. This is what transforming fashion looks like.</p>
        <div class="d-flex mb-4">
          <i class="fas fa-check text--primary fw-bold fs-3 me-3"></i>
          <h4 class="mb-0 text-muted font-500">Lorem ipsum dolor sit amet, consectetur </h4>
        </div>
        <div class="d-flex mb-4">
          <i class="fas fa-check text--primary fw-bold fs-3 me-3"></i>
          <h4 class="mb-0 text-muted font-500">Sed ut perspiciatis unde omnis iste natus error sit </h4>
        </div>
        <div class="d-flex mb-5">
          <i class="fas fa-check text--primary fw-bold fs-3 me-3"></i>
          <h4 class="mb-0 text-muted font-500">Nemo enim ipsam voluptatem quia voluptas sit  </h4>
        </div>
        
        <a href="{{ route('get-started') }}" class="btn btn-dark rounded-pill fw-bold px-5 py-4">Let's Get Started</a>
      </div>
      
    </div>
  </section>

  <!-- section-4 latest-products  -->
  <section id="z-products">
    <div class="container-xl ">
      <div class="row">
        <div class="col-md-12 text-center mb-4" data-aos="fade-up"  >
          <h1 class="fw-bold mb-3" >Latest Products</h1>
          <h3 class="text-muted">Browse through the colection</h3>
        </div>
        <div class="three-item">
            @foreach($latestProducts as $product)                
                <div>
                    <div class="position-relative me-3">
                        <img class="w-100" src="{{ productDefaultImage($product->id)}}" alt="">
                        <button type="button" class="btn btn-dark px-3 py-3 rounded-pill position-absolute bottom-0 start-50 translate-middle-x mb-4" style="display: inline-block;width: 180px; white-space: nowrap; overflow: hidden !important;    text-overflow: ellipsis;" title="{{ $product->name }}">
                          <a class="text-decoration-none text-white text-capitalize" href="{{ route('product-detail', $product->sku) }}">{{ $product->name }}</a>
                        </button>
                    </div>
                </div>
            @endforeach
        <div>
        </div>
    </div>
    </div>
  </section>

  <!-- section-4 latest-user-posts  -->
  <section id="z-products">
    <div class="container-xl ">
      <div class="row">
        <div class="col-md-12 text-center mb-4" data-aos="fade-up"  >
          <h1 class="fw-bold mb-3" >Latest Posts</h1>
          <h3 class="text-muted">Browse through the colection</h3>
        </div>
        <div class="three-item">
            @foreach($user_posts as $user_post)                
                <div>
                    <div class="position-relative me-3">
                        <img class="w-100" src="{{ postDefaultImage($user_post->id)}}" alt="">
                        <button type="button" class="btn btn-dark px-3 py-3 rounded-pill position-absolute bottom-0 start-50 translate-middle-x mb-4" style="display: inline-block;width: 180px; white-space: nowrap; overflow: hidden !important;    text-overflow: ellipsis;" title="{{ $user_post->title }}">
                          <a class="text-decoration-none text-white text-capitalize" href="{{ route('buyerViewUserPost', \Illuminate\Support\Facades\Crypt::encrypt($user_post->id)) }}">{{ $user_post->title }}</a>
                        </button>
                    </div>
                </div>
            @endforeach
        <div>
        </div>
    </div>
    </div>
  </section>

  <!-- section-5  -->
  <section class="section-5" data-aos="fade-up">
    <div class="row">
      <div class="col-lg-4 p-0">
        <div class="text-center sec-5-card p-5 h-100">
          <img class="img-fluid mb-2" src="{{ asset('assets/images/section-5/1.png') }}" alt="">
          <h4 class="fw-bold mb-2">Free Delivery</h4>
          <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
        </div>
      </div>
      <div class="col-lg-4 p-0">
        <div class="text-center sec-5-card p-5 h-100">
          <img class="img-fluid mb-2" src="{{ asset('assets/images/section-5/2.png') }}" alt="">
          <h4 class="fw-bold mb-2">Free Delivery</h4>
          <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
        </div>
      </div>
      <div class="col-lg-4 p-0">
        <div class="text-center sec-5-card p-5 h-100">
          <img class="img-fluid mb-2" src="{{ asset('assets/images/section-5/3.png') }}" alt="">
          <h4 class="fw-bold mb-2">Free Delivery</h4>
          <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
        </div>
      </div>
    </div>
  </section>

  
  <!-- section-6  -->
  <section class="section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6" data-aos="fade-up">
          <div class="urban-title text--primary position-relative mb-2">
            <p class="mb-0">Shop Custom</p>
          </div>
          <div class="urban-sub-title mb-4">
            <p class="mb-0">Find your style</p>
          </div>
          <p class="line-height-2 mb-4">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
          <button type="button" class="btn btn-dark border-0 shadow-none fw-bold px-5 py-4">Know More</button>
        </div>
        <div class="col-lg-6">
          <img class="img-fluid" data-aos="zoom-in-up" src="{{ asset('assets/images/section-6/1.png') }}" alt="">
        </div>
      </div>
    </div>
  </section>

 

  <!-- section-8  -->
  <section>
    <div class="container">
      <div class="row align-items-center position-relative">
        <div class="sec-8-wave">
          <img src="assets/images/section-8/3.png" alt="">
        </div>
        <div class="col-lg-6" data-aos="fade-left">
          <div class="sec-8-header position-relative">
            <h2 class="fw-bold ">Be part of the community that's transforming things in the most fun way </h2>
            <img class="sec-8-img position-absolute top-0 start-100 translate-middle" src="assets/images/section-8/1.png" alt="">
          </div>
        </div>
        <div class="col-lg-6" data-aos="zoom-in">
          <img class="img-fluid float-end" src="{{ asset('assets/images/section-8/2.png') }}" alt="">
        </div>
      </div>
    </div>
  </section>
  
@endsection




<link rel="stylesheet" type="text/css" href="https://cdn.wpcc.io/lib/1.0.2/cookieconsent.min.css"/><script src="https://cdn.wpcc.io/lib/1.0.2/cookieconsent.min.js" defer></script><script>window.addEventListener("load", function(){window.wpcc.init({"corners":"normal","colors":{"popup":{"background":"#D9B950","text":"#ffffff","border":"#D9B950"},"button":{"background":"#000000","text":"#ffffff"}},"padding":"small","content":{"button":"Accept","link":"  "}})});</script>