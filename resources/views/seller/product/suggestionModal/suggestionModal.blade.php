<style type="text/css">
  .error{
    color: red;
  }
</style>
<form method="post" action="{{ route('sellerSendSuggestionNotifcation') }}" id="sellerSendSuggestionNotifcation" class="sellerSendSuggestionNotifcation" name="sellerSendSuggestionNotifcation">
  @csrf
  <input type="hidden" name="user_id" class="user_id" value="{{ $data['userId'] }}">
  <input type="hidden" name="product_id" class="product_id" value="{{ $data['productId'] }}">

  <div class="mb-4">
    <label for="exampleFormControlInput1" class="form-label">Offer Type</label>
    <div class="custom-urban-form">
      <select class="form-control form-select offerType" name="offerType" id="offerType">
        <option selected="" disabled="">Select</option>
        <option value="1">Free Shipping</option>
        <option value="2">Flat Discount</option>
      </select>
    </div>
    <span class="error">{{ $errors->first('offerType') }}</span>
  </div>

  <div class="mb-4 offerPercentage" style="display: none;">
    <label for="exampleFormControlInput1" class="form-label">Offer Percentage</label>
    <div class="custom-urban-form">
      <input class="form-control" id="offerPercentage" placeholder="Offer Percentage" type="text" name="offerPercentage">
      <i class="fas fa-pen input-icon"></i>
    </div>
    <span class="error">{{ $errors->first('offerPercentage') }}</span>
  </div>

  <div class="mb-4">
    <label for="exampleFormControlInput1" class="form-label">Message</label>
    <div class="custom-urban-form">
      <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="" rows="5" name="message"></textarea>
      <i class="fas fa-pen textarea-icon"></i>
    </div>
    <span class="error">{{ $errors->first('message') }}</span>
  </div>
  <div class="col-lg-12">
    <button type="submit" class="btn btn-dark px-5 py-3 rounded-pill">Save</button>
  </div>
</form>


<script type="text/javascript">

  $('.offerType').click(function()
  {
    var type = $(this).val();
    
    if (type == 2) {
      $('.offerPercentage').show();
    }
    else
    {
      $('.offerPercentage').hide(); 
    }
  })

 $("form[name='sellerSendSuggestionNotifcation']").validate({
  rules: {
    offerType: {
			required: true
		},
    offerPercentage: {
      required:true,
      number: true
    },
  },
  messages: {
    offerPercentage: {
      required: "This field is required",
    }
  },
        // Make sure the form is submitted to the destination defined
        submitHandler: function(form, event) {
          event.preventDefault();
          $.ajax({
            url: $(form).attr('action'),
            type: 'POST',
            data: $(form).serialize(),
            success: function(res) {

                // var message = 'Success';
                // $(this).modal('hide');
                toastr.success(res.success);
                // location.reload();
              },
              error:function(){
                console.log('error');
                var message = 'Someting went wrong';
                $("form[name='sellerSendSuggestionNotifcation']").trigger("reset")
              }
            });
        }
      });
    </script>