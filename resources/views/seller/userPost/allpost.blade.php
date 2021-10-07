@extends('layouts.master')
@section('title','All Post')
@section('content')
<section class="mt-90 ">
	<div class="container">
        <div class="row">
        	@foreach($user_posts as $user_post)
			<div class="col-md-3">
				<div class="position-relative me-3">
					<img class="w-100" src="{{ postDefaultImage($user_post->id)}}" alt="">
					<button type="button" class="btn btn-dark px-3 py-3 rounded-pill bottom-0 start-50 position-absolute translate-middle-x mb-4" style="display: inline-block;width: 180px; white-space: nowrap; overflow: hidden !important;    text-overflow: ellipsis;" title="{{ $user_post->title }}">
	                  <a href="{{ route('buyerViewUserPost', \Illuminate\Support\Facades\Crypt::encrypt($user_post->id)) }}">{{ $user_post->title }}</a>
	                </button>
            	</div>
			</div>
	        @endforeach
        </div>
	</div>
</section>
@endsection