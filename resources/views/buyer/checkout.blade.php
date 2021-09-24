@extends('layouts.guest')
@section('title', 'Checkout')
@section('content')
<section class="mt-96   pb-5 ">
    <div class="container pt-4">
      	<div class="row">
			<form method="post" action="{{ route('save.order') }}">
				@csrf
				<input type="hidden" name="total_price" value="{{ $total_price }}">
				<input type="hidden" name="total_quantity" value="{{ $c_total_quantity }}">

				<p>Total Quantity : {{ $c_total_quantity }}</p>
				<p>Total Price : {{ $total_price }}</p>
			<!-- {{ Auth::user()->id }} -->
			@if(count($addresses) > 0)
				<label>Select Address:</label>
				@foreach($addresses as $address)

					<input type="radio" name="address" {{ $address['default'] == '1' ? 'checked' : '' }} value="1"> {{ $address['country'] }} {{ $address['state'] }} {{ $address['city']}}, {{ $address['pincode'] }}
					
				@endforeach
			@endif

			<br>
			<br>

			<button type="submit" class="btn btn-primary">Checkout</button>
			</form>
		</div>
	</div>
</section>
@endsection