@extends('layouts.buyer')
@section('title', 'Checkout')
@section('content')
<section class="mt-96 pb-5 ">
  <div class="container pt-4">
<form method="post" action="{{ route('save.order') }}" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ Config::get('services.stripe.key') }}" id="payment-form">
	@csrf
	<input type="hidden" name="total_price" value="{{ $request['total_price'] }}">
    <input type="hidden" name="total_offer" value="{{ $request['total_offer'] }}">
	<input type="hidden" name="total_quantity" value="{{ $request['total_quantity'] }}">
	<input type="hidden" name="address" value="{{ $request['address'] }}">


	<div class="col-lg-8" style="margin: 0 auto">
        <div class="card border-0 mb-5 shadow br-16">
          	<div class="card-body">
            	<div class="mb-4">
	              	<label for="exampleFormControlInput1" class="form-label">Name on Card</label>
	              	<div class="custom-urban-form">
	                	<input class="form-control" type="text" placeholder="Name on Card" name="name" value="" required size="4">
	                <i class="fas fa-pen"></i>
	              	</div>
	              	<span class="error">{{ $errors->first('name') }}</span>
            	</div>

            	<div class="mb-4">
	              	<label for="exampleFormControlInput1" class="form-label">Card Number</label>
	              	<div class="custom-urban-form">
	                	<input class="form-control card-number" type="text" placeholder="Card Number" required name="card_number" value="" size="20">
	                <i class="fas fa-pen"></i>
	              	</div>
	              	<span class="error">{{ $errors->first('card_number') }}</span>
            	</div>

            	<div class="mb-4">
	              	<label for="exampleFormControlInput1" class="form-label">CVV</label>
	              	<div class="custom-urban-form">
	                	<input class="form-control card-cvc" type="text" placeholder='ex. 311' required name="cvv" value="" size="4">
	                <i class="fas fa-pen"></i>
	              	</div>
	              	<span class="error">{{ $errors->first('cvv') }}</span>
            	</div>

            	<div class="mb-4">
	              	<label for="exampleFormControlInput1" class="form-label">Expiry Month</label>
	              	<div class="custom-urban-form">
	                	<input class="form-control card-expiry-month" type="text" placeholder='MM' required name="expire_month" value="" size="2">
	                <i class="fas fa-pen"></i>
	              	</div>
	              	<span class="error">{{ $errors->first('expire_month') }}</span>
            	</div>

            	<div class="mb-4">
	              	<label for="exampleFormControlInput1" class="form-label">Expiry Year</label>
	              	<div class="custom-urban-form">
	                	<input class="form-control card-expiry-year" type="text" placeholder='YYYY' required name="expire_year" value="" size="4">
	                <i class="fas fa-pen"></i>
	              	</div>
	              	<span class="error">{{ $errors->first('expire_year') }}</span>
            	</div>

            	<div class="col-lg-12">
                  <button type="submit" class="btn btn-dark px-5 py-3 rounded-pill">Pay</button>
                </div>
        	</div>
    	</div>
	</div>

<!-- 	<label class='control-label'>Name on Card</label>
	<input class='form-control' size='4' type='text' name="name">
	<label class='control-label'>Card Number</label>
	<input autocomplete='off' class='form-control card-number' size='20' type='text' name="card_number">

	<label class='control-label'>CVC</label> 
	<input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' name="cvv">

	<label class='control-label'>Expiration Month</label>
	<input class='form-control card-expiry-month' placeholder='MM' size='2' type='text' name="expire_month">

	<label class='control-label'>Expiration Year</label>
	<input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text' name="expire_year"> -->

	<!-- <input type="submit" name="" value="Pay"> -->
</form>
</div>
</section>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
      $(function() {
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation");
        //     inputSelector = ['input[type=email]', 'input[type=password]',
        //         'input[type=text]', 'input[type=file]',
        //         'textarea'
        //     ].join(', '),
        //     $inputs = $form.find('.required').find(inputSelector),
        //     $errorMessage = $form.find('div.error'),
        //     valid = true;
        // $errorMessage.addClass('hide');
        // $('.has-error').removeClass('has-error');
        // $inputs.each(function(i, el) {
        //     var $input = $(el);
        //     if ($input.val() === '') {
        //         $input.parent().addClass('has-error');
        //         $errorMessage.removeClass('hide');
        //         e.preventDefault();
        //     }
        // });

        var card_number = $('.card-number').val();
        var card_cvc = $('.card-cvc').val();
        var card_expiry_month = $('.card-expiry-month').val();
        var card_expiry_year = $('.card-expiry-year').val();

        if(card_number != '' && card_cvc != '' && card_expiry_year != '' && card_expiry_year != '')
        {
        	if (!$form.data('cc-on-file') ) {
	            e.preventDefault();
	            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
	            Stripe.createToken({
	                number: card_number,
	                cvc: card_cvc,
	                exp_month: card_expiry_month,
	                exp_year: card_expiry_year
	            }, stripeResponseHandler);
        }
        }
    });

    function stripeResponseHandler(status, response) {
        if (response.error) {
			toastr.error(response.error.message, "Error");
            /* $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message); */
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
});
   </script>
   @endsection