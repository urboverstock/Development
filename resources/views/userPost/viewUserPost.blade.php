@extends('layouts.buyer')
@section('title','View User Post')

@section('content')

	<section class="mt-5 mb-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="d-flex mb-2" data-aos="fade-up">
            <h1 class="display-5 f-600 me-3">{{$userPost->title}}</h1>
          </div>

            <div class="d-flex flex-wrap mb-2" data-aos="fade-up">
              Description : {{$userPost->description}}
            </div>
            @if(count($userPost->getUserPostFile) > 0)
            <div class="mb-3" data-aos="fade-up">
            	@foreach($userPost->getUserPostFile as $file)
              <?php 
                $ext = pathinfo($file->file, PATHINFO_EXTENSION);
              ?>

              <?php 
                if ($ext == "mp4" || $ext == "mov" || $ext == "vob" || $ext == "mpeg" || $ext == "3gp" || $ext == "avi" || $ext == "wmv" || $ext == "mov" || $ext == "amv" || $ext == "svi" || $ext == "flv" || $ext == "mkv" || $ext == "webm" || $ext == "gif" || $ext == "asf") {
              ?>

                <video controls autoplay style="width: 200px;vertical-align: middle;">
                  <source src="{{url('/') . $file->file}}" type="video/ogg">
                  <source src="{{url('/') . $file->file}}" type="video/{{ $ext }}">
                </video>
              <?php } else { ?>
            		<img src="{{ url('/') . $file->file }}" width="200">
              <?php } ?>
            	@endforeach
            </div>
            @endif
           
      </div>
    </div>
  </section>

@endsection