@extends('layouts.admin')
@if(isset($page))
@section('title','Edit Page')
@else
@section('title','Add Page')
@endif
@section('content')

<!-- featured-select  -->
<section class="bg-edit-buyer-profile">
  <div class="container">
      <div class="row">
          <div class="col-lg-8">
            <div class="card br-24 border-0 shadow h-100">
              <div class="card-header bg-transparent py-4">
                <div class="d-flex flex-wrap justify-content-between">
                  <h3 class="mb-0 fw-bold py-4 px-md-5 px-0">{{ isset($page) ? 'Edit Page' : 'Add Page' }}</h3>
                </div>
              </div>
              <div class="card-body px-md-5 px-3">
                  @if(!isset($page))
                  <form method="post" action="{{ route('admin.page.store') }}" enctype="multipart/form-data" id="add_page_form">
                  @else
                  <form method="post" action="{{ route('admin.page.update') }}" enctype="multipart/form-data" id="add_page_form">
                  <input type="hidden" name="id" value="{{ @$page->id }}">
                    @endif
                  {{ csrf_field() }}
                  <div class="row">
                    
                    <div class="col-lg-12">
                      <div class="mb-4">
                        <label class="form-label">Title</label>
                        <div class="custom-urban-form">
                          <input class="form-control" type="text" placeholder="Enter Title" name="title" value="{{ @$page->title }}">
                          <i class="fas fa-pen"></i>
                        </div>
                        <span class="error">{{ $errors->first('title') }}</span>
                      </div>
                    </div>

                   
                    <div class="col-lg-12">
                      <div class="mb-4 ">
                        <label class="form-label ">Content</label>
                        <div class="custom-urban-form">
                          <textarea class="form-control" placeholder="Enter Content" rows="5" name="content" id="content">{{ @$page->content }}</textarea>
                          <i class="fas fa-pen textarea-icon"></i>
                        </div>
                        <span class="error">{{ $errors->first('content') }}</span>
                      </div>
                    </div>
                    
                    <div class="col-lg-12">
                      <button type="submit" class="btn btn-dark px-5 py-3 rounded-pill">Save Changes</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4 d-lg-block d-none">
            <img class="w-100 h-100"  src="{{ asset('assets/images/form-right-img.png') }}" alt="">
          </div>
      </div>
  </div>
</section>

@endsection
@section('scripts')

<script>

  CKEDITOR.replace( 'content' );
</script>
@stop