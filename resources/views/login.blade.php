@extends('layouts.guest_master')
@section('title','Login')
@section('content')

<section class="us-session-form  min-vh-100 d-flex justify-content-center align-items-center position-relative">
  
  <div class="container-fluid ">
    <div class="row align-items-center">
      <div class="col-lg-5 p-0 d-lg-block d-none">
      
        <img class="img-fluid vh-100" src="{{ asset('assets/images/session.png') }}" alt="">
      </div>
      
      <div class="offset-lg-1 col-lg-5">
        <div class="mb-5">
          <a class="navbar-brand " href="{{url('/')}}">
            <img class="img-fluid" src="{{ asset('assets/images/logo.png') }}" alt="">
          </a>
        </div>
        <form action="" method="post" id="login_form">
          {{ csrf_field() }}
          <input class="form-control form-control-lg mb-4 py-3" type="text" placeholder="Email@address.com" aria-label="Email@address.com" name="email" value="{{ old('email') }}">
          <span class="error">{{ $errors->first('email') }}</span>
          <div class="position-relative">
            <span class="password-prepend-icon ">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
            </span>
            <input class="form-control form-control-lg session py-3" type="password" placeholder="Password" aria-label="password" name="password">
          </div>
          
          <span class="error d-block">{{ $errors->first('password') }}</span>
          <input type="hidden" name="previous_url" value="{{ redirect()->getUrlGenerator()->previous() }}">
          <div class="d-grid mb-3">
            <button type="submit" class="btn btn-dark shadow py-3 fw-bold btn-lg">Log in</button>
          </div>
        </form>
        
        <a href="{{ route('forgot_password') }}" class="d-flex text-decoration-none text-dark align-items-center">
          <i class="fas fa-caret-right me-2 mb-0"></i>
          <p class="mb-0 fw-bold">Forgot Password ?</p>
        </a>
        <div class="d-flex justify-content-end">
          <a href="{{ route('signup') }}" class="mb-0 fw-bold fs-3 text-decoration-none text-dark">Join Us ?</a>
        </div>
        
      </div>
    </div>
  </div>
</section>
  
@endsection