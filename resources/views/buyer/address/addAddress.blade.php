@extends('layouts.buyer')
@if(isset($address))
  @section('title','Edit Address')
@else
  @section('title','Add Address')
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
      @if(!isset($address))
      <form method="post" action="{{ route('buyerStoreAddress') }}" enctype="multipart/form-data" id="add_address_form">
      @else
      <form method="post" action="{{ route('buyerUpdateAddress') }}" enctype="multipart/form-data" id="add_address_form">
        <input type="hidden" name="id" value="{{ $address->id }}">
      @endif
              {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-12">

                <h3 class="mt-5 mb-4 fw-bold ">{{ isset($address) ? 'Edit Address' : 'Add Address' }}</h3>
            </div>
              <div class="col-lg-8">               
                <div class="card border-0 mb-5 shadow br-16">
                  <div class="card-body">
                      <div class="mb-4">
                          <label for="exampleFormControlInput1" class="form-label">City</label>
                          <div class="custom-urban-form">
                              <input class="form-control" type="text" placeholder="City Name" name="city" value="{{ @$address->city ?: old('city') }}">
                              <i class="fas fa-pen"></i>
                          </div>
                          <span class="error">{{ $errors->first('city') }}</span>
                      </div>

                      <div class="mb-4">
                          <label for="exampleFormControlInput1" class="form-label">State</label>
                          <div class="custom-urban-form">
                              <input class="form-control" type="text" placeholder="state Name" name="state" value="{{ @$address->state ?: old('state') }}">
                              <i class="fas fa-pen"></i>
                          </div>
                          <span class="error">{{ $errors->first('state') }}</span>
                      </div>

                      <div class="mb-4">
                          <label for="exampleFormControlInput1" class="form-label">Country</label>
                          <div class="custom-urban-form">
                              <input class="form-control" type="text" placeholder="Country Name" name="country" value="{{ @$address->country ?: old('country') }}">
                              <i class="fas fa-pen"></i>
                          </div>
                          <span class="error">{{ $errors->first('country') }}</span>
                      </div>

                      <div class="mb-4">
                          <label for="exampleFormControlInput1" class="form-label">Pincode</label>
                          <div class="custom-urban-form">
                              <input class="form-control" type="number" placeholder="pincode" name="pincode" value="{{ @$address->pincode ?: old('pincode') }}">
                              <i class="fas fa-pen"></i>
                          </div>
                          <span class="error">{{ $errors->first('pincode') }}</span>
                      </div>

                      <div class="mb-4">
                          <label for="exampleFormControlInput1" class="form-label">Set default</label>
                          <div class="custom-urban-form">
                              <select name="default" class="form-control">
                                <option disabled="" selected="">Select</option>
                                <option value="0" {{ (@$address->default == 0 || old('type') == 0) ? 'selected' : '' }}>No</option>
                                <option value="1" {{ (@$address->default == 1 || old('type') == 1) ? 'selected' : '' }}>Yes</option>
                              </select>
                          </div>
                          <span class="error">{{ $errors->first('default') }}</span>
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