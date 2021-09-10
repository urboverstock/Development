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
          <input class="form-control form-control-lg mb-5 py-3" type="password" placeholder="Password" aria-label="password" name="password">
          <span class="error">{{ $errors->first('password') }}</span>
          <div class="d-grid mb-3">
            <button type="submit" class="btn btn-dark shadow py-3 fw-bold btn-lg">Log in</button>
          </div>
        </form>
        
        <a href="{{ route('forgot_password') }}" class="d-flex text-decoration-none text-dark align-items-center">
          <i class="fas fa-caret-right me-2 mb-0"></i>
          <p class="mb-0 fw-bold">Need Help ?</p>
        </a>
        <div class="d-flex justify-content-end">
          <a href="{{ route('signup') }}" class="mb-0 fw-bold fs-3 text-decoration-none text-dark">Join Us ?</a>
        </div>
        
      </div>
    </div>
  </div>
</section>
  
@endsection