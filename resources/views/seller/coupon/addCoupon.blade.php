@extends('layouts.master')
@if(isset($coupon))
  @section('title','Edit Coupon')
@else
  @section('title','Add Coupon')
@endif

@section('styles')
  <style type="text/css">
  .error{
    color: red;
  }
</style>
@endsection

@section('content')


<section class="mt-90 ">
    <div class="container">
      @if(!isset($coupon))
      <form method="post" action="{{ route('sellerStoreCoupon') }}" enctype="multipart/form-data" id="add_coupon_form">
      @else
      <form method="post" action="{{ route('sellerUpdateCoupon') }}" enctype="multipart/form-data" id="add_coupon_form">
        <input type="hidden" name="id" value="{{ $coupon->id }}">
      @endif
              {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-12">

                <h3 class="mt-5 mb-4 fw-bold ">{{ isset($coupon) ? 'Edit Coupon' : 'Add Coupon' }}</h3>
            </div>
              <div class="col-lg-8">               
                <div class="card border-0 mb-5 shadow br-16">
                  <div class="card-body">
                    <div class="mb-4">
                          <label for="exampleFormControlInput1" class="form-label">Title</label>
                          <div class="custom-urban-form">
                              <input class="form-control" type="text" placeholder="Name" name="name" value="{{ @$coupon->name ?: old('name') }}">
                              <i class="fas fa-pen"></i>
                          </div>
                          <span class="error">{{ $errors->first('name') }}</span>
                      </div>

                      <div class="mb-4">
                          <label for="exampleFormControlInput1" class="form-label">Type</label>
                          <div class="custom-urban-form">
                              <select name="type" class="form-control form-select">
                                <option disabled="" selected="">Select</option>
                                <option value="0" {{ (@$coupon->type == 0 || old('type') == 0) ? 'selected' : '' }}>Percentage</option>
                                <option value="1" {{ (@$coupon->type == 1 || old('type') == 1) ? 'selected' : '' }}>Number</option>
                              </select>
                          </div>
                          <span class="error">{{ $errors->first('type') }}</span>
                      </div>

                      <div class="mb-4">
                          <label for="exampleFormControlInput1" class="form-label">Price</label>
                          <div class="custom-urban-form">
                              <input class="form-control" type="text" placeholder="Price" name="price" value="{{ @$coupon->price ?: old('price') }}">
                              <i class="fas fa-pen"></i>
                          </div>
                          <span class="error">{{ $errors->first('price') }}</span>
                      </div>

                      <div class="mb-4">
                          <label for="exampleFormControlInput1" class="form-label">Start Date</label>
                          <div class="custom-urban-form">
                              <input class="form-control empty-date date" min="<?php echo date("Y-m-d"); ?>" type="date" placeholder="Start Date" name="start_date" value="{{ @$coupon->start_date ?: old('start_date') }}" id="date">
                              
                          </div>
                          <span class="error">{{ $errors->first('start_date') }}</span>
                      </div>

                      <div class="mb-4">
                          <label for="exampleFormControlInput1" class="form-label">End Date</label>
                          <div class="custom-urban-form">
                              <input class="form-control empty-date  date" id="date" min="<?php echo date("Y-m-d"); ?>" type="date" placeholder="End Date" name="end_date" value="{{ @$coupon->end_date ?: old('end_date') }}">
                              
                          </div>
                          <span class="error">{{ $errors->first('end_date') }}</span>
                      </div>

                      <div class="col-lg-12">
                        <button type="submit" class="btn btn-dark px-5 py-3 rounded-pill">Save</button>
                      </div>                         
               
                  </div>
                </div>                  
              </div>
              <div class="col-lg-4">
                <div class="card border-0 mb-5 shadow br-16">
                    <img class="w-100 h-100"  src="{{ asset('assets/images/edit-seller-form-right.png') }}" alt="">
                </div>                  
              </div>              
        </div>
      </form>
    </div>
  </section>



@endsection
@section('scripts')


</script>

@stop