<style type="text/css">
  .footer-mail{
    max-width: 100%;
  }
</style>

<footer id="z-contact" class="">
  <div class="bg-footer py-5">
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
            <a href="{{ route('viewPage', 'privacy-policy') }}" class="text-dark text-decoration-none mb-3 fw-bold">Privacy Policy</a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Refund Policy </a>
            <a href="#" class="text-dark text-decoration-none mb-3 fw-bold">Disclaimer </a>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
          <form method="post" action="{{ route('sendNewsLetter') }}">
            @csrf
            <div class="footer-mail d-flex position-relative mb-3">
              <svg class="mail-icon" width="28" height="28" viewBox="0 0 28 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25.5391 0.408203H2.46094C1.10398 0.408203 0 1.51218 0 2.86914V17.1307C0 18.4876 1.10398 19.5916 2.46094 19.5916H25.5391C26.896 19.5916 28 18.4876 28 17.1307V2.86914C28 1.51218 26.896 0.408203 25.5391 0.408203ZM25.2179 2.04883L24.8894 2.32232L14.9764 10.5769C14.4106 11.048 13.5893 11.048 13.0236 10.5769L3.11057 2.32232L2.78212 2.04883H25.2179ZM1.64062 3.23325L9.71753 9.95888L1.64062 15.3343V3.23325ZM25.5391 17.951H2.46094C2.06456 17.951 1.73305 17.6683 1.65709 17.2941L11.033 11.0542L11.9738 11.8377C12.5608 12.3265 13.2805 12.5709 14.0001 12.5709C14.7196 12.5709 15.4392 12.3265 16.0263 11.8377L16.9671 11.0542L26.343 17.2941C26.267 17.6684 25.9354 17.951 25.5391 17.951ZM26.3594 15.3343L18.2825 9.95894L26.3594 3.23325V15.3343Z" fill="#A09E9E"/>
              </svg>
              
                <input type="text" class="form-control py-3 border-0 " placeholder="Enter Email to Subscribe" name="email" required="" />
                <button style="border: none;">
                  <svg class="arrow" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.3207 6.3208L19.0735 7.56807L24.6235 13.1182H0V14.8821H24.6235L19.0735 20.4321L20.3207 21.6794L28 14.0001L20.3207 6.3208Z" fill="black"/>
                  </svg>
              </button>
            </div>
          </form>

          <div class="d-flex justify-content-start mb-3">
            <!-- <a href="#"><img class="img-fluid me-3" src="{{ asset('assets/images/playstore.png') }}" alt=""></a>
            <a href="#"><img class="img-fluid mt-2" src="{{ asset('assets/images/applestore.png') }}" alt=""></a> -->

          <div class="d-flex mb-3">
            <a href="#"><img class="img-fluid me-3" src="{{ asset('assets/images/playstore.png') }}" alt=""></a>
            
            <a href="#"><img class="img-fluid mt-2" src="{{ asset('assets/images/applestore.png') }}" alt=""></a>

          </div>
          <!-- <div class="d-flex justify-content-end mb-3">
            <a href="#" class="text-dark h4 me-3">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="text-dark h4">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div> -->
          <div class="d-flex">
            <a href="#"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </footer>
  <div class="sub-footer bg--primary">
    <div class="container">
      <div class="d-flex justify-content-between flex-wrap align-items-center">
        <p class="fw-bold text-footer-bottom  mb-0">© 2021 Urban Overstock</p>
        <div class="d-flex">
          <img class="img-fluid me-3" src="{{ asset('assets/images/paypal.png') }}" alt="">
          <img class="visa-footer-image" src="{{ asset('assets/images/visa.png') }}" alt="">
        </div>
      </div>
    </div>
  </div>