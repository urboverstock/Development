@extends('layouts.master')
@if(isset($advertisement))
@section('title','Edit Advertisement')
@else
@section('title','Add Advertisement')
@endif

@section('styles')
  <style type="text/css">
  #result div, .result div {
    width: 200px;
    padding: 5px;
    float: left;
}
  #result div img, .result div img{
    width: 100%;
  }

  .error{
    color: red;
  }
</style>
@endsection


@section('content')


<section class="mt-90 ">
  <div class="container">
    @if(!isset($advertisement))
    <form method="post" action="{{ route('sellerStoreAdvertisement') }}" enctype="multipart/form-data" id="add_advertisement_form">

      @else
      <form method="post" action="{{ route('sellerUpdateAdvertisement') }}" enctype="multipart/form-data" id="add_advertisement_form">
        <input type="hidden" name="id" value="{{ @$advertisement['id'] }}">
        @endif
        {{ csrf_field() }}
        <div class="row">
          <div class="col-lg-12">                

            <h3 class="mt-5 mb-4 fw-bold ">{{ isset($advertisement) ? 'Edit Advertisement' : 'Add Advertisement' }}</h3>
          </div>
          <div class="col-lg-8">

            <div class="card border-0 mb-5 shadow br-16">
              <div class="card-body">
                <h3 class="mb-4 fw-bold ">Banner</h3>
                <label for="urbanFile" class="border-dashed-gray cursor-pointer br-8 p-5 d-flex flex-column justify-content-center align-items-center">
                  <div class="bg--primary p-3 d-inline-flex rounded-circle mb-3">
                    
                    <i class="fas fa-plus fs-3 text-white"></i>
                  </div>
                  <input type="file" class="urbanUploadFileProduct" name="banner" id="urbanFile">

                  <label for="urbanFile" class="btn btn-outline-primary px-5 py-3 br-8 mb-2"><span class="text-dark f-600">Add Banner</span></label>

                  @if(@$advertisement->banner)
                  <img src="{{ asset('/') . @$advertisement->banner }}" width="200" class="banner_image">
                  @else
                  <img src="{{ asset('/assets/images/default-image.jpg') }}" width="200" class="banner_image">
                  @endif                    

                </label>

                <span class="name-error error">{{ $errors->first('banner') }}</span>

              </div>
            </div>

            <div class="mb-4 ">
              <label for="exampleFormControlTextarea1" class="form-label ">Any Description</label>
              <div class="custom-urban-form">
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="" rows="5" name="description">{{ @$advertisement->description ?: old('description') }}</textarea>
                <i class="fas fa-pen textarea-icon"></i>
              </div>
              <span class="name-error error">{{ $errors->first('description') }}</span>
            </div>

            <div class="col-lg-12">
            <button type="submit" class="btn btn-dark px-5 py-3 rounded-pill">Save</button>
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

  <script>
      
      //show image after upload file
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('.banner_image').attr('src', e.target.result);
              }
              reader.readAsDataURL(input.files[0]);
          }
      }

      jQuery("#urbanFile").change(function () {
          readURL(this);
      });
  </script>

  @stop