@extends('layouts.guest')
@section('title', @$page->title)
@section('content')
<section class="pb-3 " style="margin-top: 100px;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 mb-4">
				{!! @$page->content !!}
			</div>
		</div>
	</div>
</section>
@endsection