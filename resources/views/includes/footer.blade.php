  <footer id="z-contact" class="bg--primary-lighten py-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-2 mb-3">
          <div class="d-flex flex-column">
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Home Decor</a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Kitchenware</a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Fitness Tools </a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Electronics </a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">All Products </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-2 mb-3">
          <div class="d-flex flex-column">
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">About Us</a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Contact Now</a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Our Community </a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">How It Works </a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">FAQ’s </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-2 mb-3">
          <div class="d-flex flex-column">
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Browse Through</a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Terms of Service</a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Privacy Policy</a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Refund Policy </a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Disclaimer </a>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
          <form method="post" action="{{ route('sendNewsLetter') }}">
            @csrf
            <input type="email" class="form-control py-3 border-0 mb-3" placeholder="Enter Email to Subscribe" name="email" />
          </form>
          <div class="d-flex mb-3">
            <a href="#"><img class="img-fluid me-3" src="{{ asset('assets/images/playstore.png') }}" alt=""></a>
            
            <a href="#"><img class="img-fluid mt-2" src="{{ asset('assets/images/applestore.png') }}" alt=""></a>
          </div>
          <div class="d-flex">
            <a href="#"></a>
          </div>
        </div>
      </div>
    </div>
    
  </footer>
  <div class="sub-footer bg--primary">
    <div class="container">
      <div class="d-flex justify-content-between flex-wrap align-items-center">
        <p class="fw-bold mb-0">© 2021 Urban Overstock</p>
        <div>
          
        <div class="d-flex flex-md-row align-items-center flex-column justify-content-center">
              <small class="footer-link mb-0 mr-1">Design & Developed by </small>
              <a href="http://zsoftware.tech/" target="blank" aria-describedby="a11y-external-message">
                  <img style="width: 100px; height: 32px" class="z-software-logo" src="{{ asset('assets/images/z-software-logo.png') }}" alt="">
                </a>
            </div>
        </div>
        <div class="d-flex">
          <img class="img-fluid me-3" src="{{ asset('assets/images/paypal.png') }}" alt="">
          <img class="img-fluid " src="{{ asset('assets/images/visa.png') }}" alt="">
        </div>
      </div>
    </div>
  </div>


  