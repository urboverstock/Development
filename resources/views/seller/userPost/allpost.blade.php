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
                <a href="#" class="btn btn-dark">Back</a>
              </div>
            </div>
        	@foreach($user_posts as $user_post)
			<div class="col-lg-3 col-md-6 mb-5">
				<div class="position-relative me-3">
					<img class="w-100 mh-420 h-300" src="{{ postDefaultImage($user_post->id)}}" alt="">
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