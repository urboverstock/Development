@extends('layouts.app')

@section('content')
	
	<div class="container">
		@if($users->count())
		<ul class="user_list">
		@foreach($users as $key => $user)
			<li value="{{$user->id}}"><a href="{{ url('/chat/'. $user->id) }}">{{ $user->name }}</a></li>
		@endforeach
		</ul>
		@endif
	</div>

@stop