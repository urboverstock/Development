@extends('layouts.guest_master')
@section('title','Forgot Password')
@section('content')

  <section class="us-session-form  min-vh-100 d-flex justify-content-center align-items-center position-relative">
   
    <div class="container-fluid ">
      <div class="row align-items-center">
        <div class="col-lg-5 p-0 d-lg-block d-none">
        
          <img class="img-fluid vh-100" src="{{ asset('assets/images/session.png') }}" alt="">
        </div>
        
        <div class="offset-lg-1 col-lg-5">
          <form action="" method="post">
            {{ csrf_field() }}
            <input class="form-control form-control-lg mb-4 py-3" type="text" placeholder="Email@address.com" aria-label="Email@address.com" name="email" value="{{ old('email') }}">
            <span class="error">{{ $errors->first('email') }}</span>
            <div class="d-grid mb-3">
              <button type="submit" class="btn btn-dark shadow py-3 fw-bold btn-lg">Reset Password</button>
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </section>
  
@endsection