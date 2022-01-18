@extends('layouts.admin')
@if(isset($faq))
  @section('title','Edit Faq')
@else
  @section('title','Add Faq')
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
      @if(!isset($faq))
      <form method="post" action="{{ route('adminStoreFaq') }}" enctype="multipart/form-data" id="add_faq_form">
      @else
      <form method="post" action="{{ route('adminUpdateFaq') }}" enctype="multipart/form-data" id="add_faq_form">
        <input type="hidden" name="id" value="{{ $faq->id }}">
      @endif
              {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-12">

                <h3 class="mt-5 mb-4 fw-bold ">{{ isset($faq) ? 'Edit Faq' : 'Add Faq' }}</h3>
            </div>
              <div class="col-lg-8">               
                <div class="card border-0 mb-5 shadow br-16">
                  <div class="card-body">
                      <div class="mb-4">
                          <label for="exampleFormControlInput1" class="form-label">Question</label>
                          <div class="custom-urban-form">
                              <input class="form-control" type="text" placeholder="question" name="question" value="{{ @$faq->question ?: old('question') }}">
                              <i class="fas fa-pen input-icon"></i>
                          </div>
                          <span class="error">{{ $errors->first('question') }}</span>
                      </div>

                      <div class="mb-4 ">
                        <label for="exampleFormControlTextarea1" class="form-label ">Answer</label>
                        <div class="custom-urban-form">
                          <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="answer..." rows="5" name="answer">{{ @$faq->answer ?: old('answer') }}</textarea>
                          <i class="fas fa-pen textarea-icon"></i>
                        </div>
                        <span class="name-error error">{{ $errors->first('answer') }}</span>
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