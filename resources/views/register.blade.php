@extends('layouts.guest_master')
@section('title','Sign Up')
@section('content')
  
<section class="us-session-form min-vh-100 d-flex position-relative">
  
  <div class="container-fluid ">
    <div class="row align-items-center">
      <div class="col-lg-5 p-0 d-lg-block d-none ">
        <img class="img-fluid vh-100" src="{{ asset('assets/images/session.png') }}" alt="">
      </div>
      
      <div class="col-lg-5">
        <div class="mb-5">
          <a class="navbar-brand " href="{{url('/')}}">
            <img class="img-fluid" src="{{ asset('assets/images/logo.png') }}" alt="">
          </a>
        </div>
        <form action="" method="post" id="register_form">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-lg-6">
              <input class="form-control form-control-lg mb-4 py-3" type="text" placeholder="First Name" aria-label="" name="first_name" value="{{ old('first_name') }}">
              <span class="error">{{ $errors->first('first_name') }}</span>
            </div>
            <div class="col-lg-6">
              <input class="form-control form-control-lg mb-4 py-3" type="text" placeholder="Last Name" aria-label="" name="last_name" value="{{ old('last_name') }}">
              <span class="error">{{ $errors->first('last_name') }}</span>
            </div>
            <div class="col-lg-12">
              <input class="form-control form-control-lg mb-4 py-3" type="text" placeholder="Email" aria-label="" name="email">
              <span class="error">{{ $errors->first('email') }}</span>
            </div>
            <div class="col-lg-12 position-relative">
 
              <span class="password-prepend-icon reg-password" style="cursor:pointer;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
              </span>
              <input class="form-control form-control-lg py-3 mb-4" type="password" placeholder="Password" aria-label="password" name="password" id="password">
              <span class="error">{{ $errors->first('password') }}</span>
            </div>
            <div class="col-lg-12 position-relative">
              <span class="password-prepend-icon reg-confirm-password" style="cursor:pointer;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
              </span>
              <input class="form-control form-control-lg mb-4 py-3" type="password" placeholder="Confirm Password" aria-label="" name="confirm_password" id="reg_confirm_password">
              <span class="error">{{ $errors->first('confirm_password') }}</span>
            </div>
            
            <div class="col-lg-12">
                <!-- <select class="form-select mb-4 py-3 form-select-lg mb-3" aria-label=".form-select-lg example" name="location">
                  <option value="">Select location</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select> -->
                <input class="form-control form-control-lg mb-4 py-3" type="text" placeholder="Location" aria-label="" name="location" value="{{ old('location') }}">
                <span class="error">{{ $errors->first('location') }}</span>
            </div>
            <div class="col-lg-12">
                <select class="form-select mb-4 py-3 form-select-lg mb-3" aria-label=".form-select-lg example" name="gender">
                  <option class="us-selected" value="">Select Gender</option>
                  <option value="1">Male</option>
                  <option value="2">Female</option>
                  <option value="3">Other</option>
                </select>
                <span class="error">{{ $errors->first('gender') }}</span>
            </div>
            <div class="col-lg-12">
                <select class="form-select mb-4 py-3 form-select-lg mb-3" aria-label=".form-select-lg example" name="user_type">
                  <option class="us-selected" value="">Select Role</option>
                  <option value="3">Seller</option>
                  <option value="4">Buyer</option>
                </select>
                <span class="error">{{ $errors->first('user_type') }}</span>
            </div>
            <div class="col-4">
              <input class="form-control form-control-lg mb-4 py-3" type="text" value="{{ old('isd_code') }}" aria-label="" name="isd_code" placeholder="ISD Code">
              <span class="error">{{ $errors->first('isd_code') }}</span>
            </div>
            <div class="col-8">
              <input class="form-control form-control-lg mb-4 py-3" type="text" placeholder="Phone number" aria-label="" name="phone_number" value="{{ old('phone_number') }}">
              <span class="error">{{ $errors->first('phone_number') }}</span>
            </div>
          </div>
          <div class="d-grid mb-3">
            <button type="submit" class="btn btn-dark shadow py-3 fw-bold btn-lg">Sign up</button>
          </div>
        </form>
        
        <a href="{{ route('signin') }}" class="d-flex text-decoration-none text-dark align-items-center">
          <i class="fas fa-caret-right me-2 mb-0"></i>
          <p class="mb-0 fw-bold">Login</p>
        </a>
        
        
      </div>
    </div>
  </div>
</section>
  
@endsection