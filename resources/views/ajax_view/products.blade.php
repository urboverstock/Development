@foreach($products as $product)
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card product-item border-0 shadow-sm mb-5">
            <div class="card-body ">
                <img class="img-fluid productImg" src="{{ productDefaultImage($product->id)}}" alt="">
                <h5 class="fw-bold">{{$product->name }}</h5>
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <span class="badge rounded-pill bg-secondary-two text-dark px-3 py-2 my-2">{{@$product->user->name }}</span>
                    <div class="d-flex my-2">
                        <i class="fas fa-star me-2 text--primary text-13"></i>
                        <i class="fas fa-star me-2 text--primary text-13"></i>
                        <i class="fas fa-star me-2 text--primary text-13"></i>
                        <i class="fas fa-star me-2 text--primary text-13"></i>
                        <i class="fas fa-star text--primary text-13"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent">
                <div class="d-flex justify-content-between flex-wrap py-2">
                <h5 class="mb-0">${{number_format($product->price,2)}}</h5>
                <div class="d-flex align-items-center">
                    <a href="#"><i class="far fa-heart fs-5 me-2 mt-2 text-dark"></i></a>
                    <a href="#">
                        <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.2812 19.4219C19.2812 19.8965 18.8965 20.2812 18.4219 20.2812H17.5625V21.1406C17.5625 21.6153 17.1778 22 16.7031 22C16.2285 22 15.8438 21.6153 15.8438 21.1406V20.2812H14.9844C14.5097 20.2812 14.125 19.8965 14.125 19.4219C14.125 18.9472 14.5097 18.5625 14.9844 18.5625H15.8438V17.7031C15.8438 17.2285 16.2285 16.8438 16.7031 16.8438C17.1778 16.8438 17.5625 17.2285 17.5625 17.7031V18.5625H18.4219C18.8965 18.5625 19.2812 18.9472 19.2812 19.4219ZM19.2812 6.01562V14.2656C19.2812 14.7403 18.8965 15.125 18.4219 15.125C17.9472 15.125 17.5625 14.7403 17.5625 14.2656V6.875H15.8438V9.45312C15.8438 9.92776 15.459 10.3125 14.9844 10.3125C14.5097 10.3125 14.125 9.92776 14.125 9.45312V6.875H5.875V9.45312C5.875 9.92776 5.49026 10.3125 5.01562 10.3125C4.54099 10.3125 4.15625 9.92776 4.15625 9.45312V6.875H2.4375V20.2812H11.5469C12.0215 20.2812 12.4062 20.666 12.4062 21.1406C12.4062 21.6153 12.0215 22 11.5469 22H1.57812C1.10349 22 0.71875 21.6153 0.71875 21.1406V6.01562C0.71875 5.54099 1.10349 5.15625 1.57812 5.15625H4.1969C4.53829 2.25685 7.01036 0 10 0C12.9896 0 15.4617 2.25685 15.8031 5.15625H18.4219C18.8965 5.15625 19.2812 5.54099 19.2812 6.01562ZM14.0674 5.15625C13.7391 3.20783 12.0403 1.71875 10 1.71875C7.95971 1.71875 6.2609 3.20783 5.93262 5.15625H14.0674Z" fill="black"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="product-wishlist position-absolute end-0 pe-3">
                <button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
            </div>
        </div>
    </div>
  </div>
@endforeach