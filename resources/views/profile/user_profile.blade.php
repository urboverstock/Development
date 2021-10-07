@extends('layouts.guest')
@section('title','View Profile')
@section('content')

  <div class="mt-96 inner-profile-header bg-primary-2 ">
    <img class="logged-wave-img position-absolute" src="{{ asset('assets/images/wave-logg-seller.png') }}" alt="">
    <img class=" header-big-avatar rounded-circle" style="max-width:300px; height: 300px;"  data-aos="zoom-in-up" src="{{ $user['profile_img'] }}" alt="">
    <div class="--right-line"></div>
    <!-- <div class="dropdown --dropdown">
      <button class="btn btn-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="far fa-envelope"></i>
      </button>
    </div> -->
  </div>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="d-flex mb-2" data-aos="fade-up">
            <h1 class="display-5 f-600 me-3">{{ $user->first_name }} {{ !empty($user->last_name) ? $user->last_name : '' }}</h1>
            <div class="online-active"></div>
          </div>
          <h3 data-aos="fade-up"><a href="mailto:{{ $user->email }}"> {{ $user->email }} </a></h3>
          

          @if($user->user_chat_status == 1)
          @if($user->id != Auth::user()->id)
            @if(Auth::check())
            <a href="{{ url('/chat?user_id='.  \Illuminate\Support\Facades\Crypt::encrypt($user->id)) }}" class="btn btn-dark z-btn-text-white py-2 px-4 rounded-pill mb-3 me-3 display-5" id="add-to-cart" data-productid="{{ @$product_details->id }}"  data-aos="fade-up"><i class="far fa-comments"></i></a>
            @else
            <a href="{{ route('signin') }}" class="btn btn-dark z-btn-text-white py-2 px-4 rounded-pill mb-3 me-3" data-aos="fade-up"><i class="far fa-comments"></i></a>
            @endif
          @endif
          @endif
          <div class="mb-5" data-aos="fade-up">
            <div class="urban-title text--primary position-relative mb-2">
              <p class="mb-0">Browse through</p>
            </div>
            <div class="urban-sub-title ust-100 mb-4">
              <p class="mb-0 pe-5 ms-2">User Posts</p>
            </div>
          </div>

          @if(!isset($user_posts))
            <div class="row" data-aos="fade-up">
              <div class="col-lg-12 mx-auto text-center">
                <p class="text-24 mb-3 fw-bold">You haven’t made any posts yet</p>
                <p class="text-mute">Make and publish an item in your store to get contents here. Don’t be scared, it’s absolutely free!</p>
              </div>
            </div>
          @else
            <div class="three-item" data-aos="fade-up">
              @foreach($user_posts as $user_post)                
                <div>
                    <div class="position-relative me-3">
                        <img class="w-100" src="{{ postDefaultImage($user_post->id)}}" alt="">
                        <button type="button" class="btn btn-dark px-3 py-3 rounded-pill position-absolute bottom-0 start-50 translate-middle-x mb-4" style="display: inline-block;width: 180px; white-space: nowrap; overflow: hidden !important;    text-overflow: ellipsis;" title="{{ $user_post->title }}">
                          <a href="{{ route('buyerViewUserPost', \Illuminate\Support\Facades\Crypt::encrypt($user_post->id)) }}">{{ $user_post->title }}</a>
                        </button>
                    </div>
                </div>
            @endforeach
            </div>
          @endif
      </div>
    </div>
  </section>

@endsection