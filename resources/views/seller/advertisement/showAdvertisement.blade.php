@extends('layouts.master')
@section('title','View Advertisement')

@section('content')

	<section class="mt-5 mb-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="d-flex mb-2" data-aos="fade-up">
            <h1 class="display-5 f-600 me-3"><img src="{{asset('/'). $advertisement->banner}}" width="200"></h1>
            
          </div>
           
            <div class="d-flex flex-wrap mb-2" data-aos="fade-up">
              Description : {{$advertisement->description}}
            </div>
            
      </div>
    </div>
  </section>

@endsection