
  <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send Offer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
      <form method="post" action="{{ route('sellerSendSuggestionNotifcation') }}" id="sellerSendSuggestionNotifcation" class="sellerSendSuggestionNotifcation">
        @csrf
        <input type="hidden" name="user_id" class="user_id" value="{{ $data['userId'] }}">
        <input type="hidden" name="product_id" class="product_id" value="{{ $data['productId'] }}">
        
        <div class="mb-4">
            <label for="exampleFormControlInput1" class="form-label">Offer Percentage</label>
            <div class="custom-urban-form">
                <input class="form-control " id="offerPercentage" placeholder="Offer Percentage" type="text" name="offerPercentage">
                <i class="fas fa-pen"></i>
            </div>
            <span class="error">{{ $errors->first('offerPercentage') }}</span>
        </div>

        <div class="mb-4">
            <label for="exampleFormControlInput1" class="form-label">Message</label>
            <div class="custom-urban-form">
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="" rows="5" name="message"></textarea>
                <i class="fas fa-pen"></i>
            </div>
            <span class="error">{{ $errors->first('message') }}</span>
        </div>
        <div class="col-lg-12">
          <button type="submit" class="btn btn-dark px-5 py-3 rounded-pill">Save</button>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
      
