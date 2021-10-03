@extends('layouts.guest')
@section('title','View User Post')

@section('content')

	<section class="mt-5 mb-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="d-flex mb-2" data-aos="fade-up">
            <h1 class="display-5 f-600 me-3">{{$userPost->title}}</h1>
          </div>
          <div class="d-flex mb-2" data-aos="fade-up">
            <p><label>Post By : </label><span> <a href="{{ route('profile', \Illuminate\Support\Facades\Crypt::encrypt($userPost->getUser->id)) }}"> {{ $userPost->getUser->fullname }} </a></span></p>
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

            <div class="col-lg-12">
              @if(Auth::check())
              <a href="javascript:void(0)" class="like-post like-anchor" data-post_id="{{ $userPost->id }}" data-url="{{ route('LikePost', $userPost->id) }}"> {{ $userPost->getPostLike->like_status == 1 ? 'Unlike' : 'Like'}}</a>
              @else
              <a href="{{ route('signin') }}" class="like-anchor">{{ isset($userPost->getPostLike) && $userPost->getPostLike->like_status == 1 ? 'Unlike' : 'Like'}}</a>
              @endif

              <a href="javascript:void(0)" class="comment-button">Comment</a>

              <form class="comment-form" action="" method="post" id="comment-form" style="display: none;">
                @csrf
                <input type="hidden" name="post_id" value="{{ $userPost->id }}">
                <textarea name="comment"></textarea>
                <input type="submit" name="" value="Submit">
              </form>

              @if(isset($userPost->getPostComments))
                <ul>
                @foreach($userPost->getPostComments as $comment)
                  <li>{{ $comment->comment }} <span>{{ date('d M, Y H:i A', strtotime($comment->created_at)) }}</span></li>
                @endforeach
                </ul>
              @else
              <ul>
                <li>No comment found</li>
              </ul>
              @endif
            </div>
           
      </div>
    </div>
  </section>

@endsection