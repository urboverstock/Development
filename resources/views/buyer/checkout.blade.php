@extends('layouts.buyer')
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

						<input type="radio" name="address" {{ $address['default'] == '1' ? 'checked' : '' }} value="{{ $address['id'] }}"> {{ $address['address'] }}, {{ $address['country'] }} {{ $address['state'] }} {{ $address['city']}}, {{ $address['pincode'] }}
						
					@endforeach
				@else
				@endif
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addressModal">Add New Address</button>

			<br>
			<br>

			<button type="submit" class="btn btn-primary">Checkout</button>
			</form>
		</div>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addressModalLabel">Add New Address</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="address">
        	@csrf
        	<input type="text" name="country" placeholder="Enter Country" id="country">
        	<input type="text" name="state" placeholder="Enter State" id="state">
        	<input type="text" name="city" placeholder="Enter City" id="city">
        	<input type="text" name="pincode" placeholder="Enter Pincode" id="pincode">
        	<input type="text" name="address" placeholder="Enter Address" id="address">
        	<button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
@endsection