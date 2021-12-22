@extends('layouts.master')
@section('title','All Post')
@section('content')
<section class="mt-90 ">
	<div class="container">
        <div class="row">
        	@foreach($user_posts as $user_post)
			<div class="col-lg-3 col-md-6 mb-3">
				<div class="position-relative me-3">
					<img class="w-100 mh-420" src="{{ postDefaultImage($user_post->id)}}" alt="">
					<a  class="text-decoration-none btn btn-dark px-3 py-3 rounded-pill bottom-0 start-50 position-absolute translate-middle-x mb-4" style="display: inline-block;width: 180px; white-space: nowrap; overflow: hidden !important;    text-overflow: ellipsis;" title="{{ $user_post->title }}" href="{{ route('buyerViewUserPost', \Illuminate\Support\Facades\Crypt::encrypt($user_post->id)) }}">{{ $user_post->title }}</a>
            	</div>
			</div>
	        @endforeach

	        <div class="">
                {{ $user_posts->links() }}
           	</div>
        </div>
	</div>
</section>
@endsection