@extends('layouts.master')
@section('title','All Post')
@section('content')
<section class="mt-90 ">
	<div class="container mt-5">
        <div class="row">
		    <div class="col-lg-12 mb-5">
              <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                  <div class="urban-title text--primary position-relative mb-2">
                    <p class="mb-0">List of</p>
                  </div>
                  <div class="urban-sub-title ust-100 mb-4">
                    <p class="mb-0 pe-4">All Posts</p>
                  </div>
                </div>
                <a href="{{ URL::previous() }}" class="btn btn-dark">Back</a>
              </div>
            </div>
        	@foreach($user_posts as $user_post)
			<div class="col-lg-3 col-md-6 mb-5">
				<div class="position-relative me-3">
					<img class="w-100 mh-420 h-300" src="{{ postDefaultImage($user_post->id)}}" alt="">
          <a href="#" class="top-edit-icon btn btn--primary p-0 position-absolute top-0 end-0 m-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="top-edit-icon" viewBox="0 0 20 20" fill="currentColor">
              <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
            </svg>
          </a>
					<a  class="text-decoration-none btn btn-dark px-3 py-3 rounded-pill bottom-0 start-50 position-absolute translate-middle-x mb-4" style="display: inline-block;width: 180px; white-space: nowrap; overflow: hidden !important;    text-overflow: ellipsis;" title="{{ $user_post->title }}" href="{{ route('buyerViewUserPost', \Illuminate\Support\Facades\Crypt::encrypt($user_post->id)) }}">{{ $user_post->title }}</a>
            	</div>
			</div>
	        @endforeach

	        <div class="all-post-laravel-paginations">
                {{ $user_posts->links() }}
           	</div>
        </div>
	</div>
</section>
@endsection