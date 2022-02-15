<style type="text/css">
  .footer-mail{
    max-width: 100%;
  }
</style>

<footer id="z-contact" class="bg--primary-lighten py-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-2 mb-3">
          <div class="d-flex flex-column">
            <!-- <a href="#" class="text-black text-decoration-none mb-3 fw-500">Home Decor</a>
            <a href="#" class="text-black text-decoration-none mb-3 fw-500">Kitchenware</a>
            <a href="#" class="text-black text-decoration-none mb-3 fw-500">Fitness Tools </a>
            <a href="#" class="text-black text-decoration-none mb-3 fw-500">Electronics </a> -->
            <a  href="{{ route('get-started') }}" class="text-black text-decoration-none mb-3 fw-500">All Products </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-2 mb-3">
          <div class="d-flex flex-column">
            <a href="#" class="text-black text-decoration-none mb-3 fw-500">About Us</a>
            <!-- <a href="{{ route('viewPage', 'about-us') }}" class="text-black text-decoration-none mb-3 fw-500">About Us</a> -->
            <a href="#" class="text-black text-decoration-none mb-3 fw-500">Contact Now</a>
            <!-- <a href="#" class="text-black text-decoration-none mb-3 fw-500">Our Community </a> -->
            <a href="#" class="text-black text-decoration-none mb-3 fw-500">How It Works </a>
            <a href="#z-faq"  class="text-black text-decoration-none mb-3 fw-500">FAQ’s </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-2 mb-3">
          <div class="d-flex flex-column">
            <a href="#" class="text-black text-decoration-none mb-3 fw-500">Browse Through</a>
            <a href="#" class="text-black text-decoration-none mb-3 fw-500">Terms of Service</a>
            <a href="{{ route('viewPage', 'privacy-policy') }}" class="text-black text-decoration-none mb-3 fw-500">Privacy Policy</a>
            <a href="#" data-bs-toggle="modal" data-bs-target="#refunPolicy" class="text-black text-decoration-none mb-3 fw-500">Refund Policy </a>
            <!-- <a href="#" class="text-black text-decoration-none mb-3 fw-500">Disclaimer </a> -->
          </div>
        </div>
        <!-- faq,s -->
        <div class="modal fade" id="faq" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FAQ Policy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essen</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn--primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        @include('includes.modal.refund_policy')
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

          <!-- <div class="d-flex mb-3">
            <a href="#"><img class="img-fluid me-3" src="{{ asset('assets/images/playstore.png') }}" alt=""></a>
            
            <a href="#"><img class="img-fluid mt-2" src="{{ asset('assets/images/applestore.png') }}" alt=""></a>

          </div> -->
          <!-- <div class="d-flex justify-content-end mb-3">
            <a href="#" class="text-black h4 me-3">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="text-dark h4">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div> -->
        </div>
        <div class="d-flex">
        
          <a   href="http://www.facebook.com/sharer.php?u {{url('/')}}" target="_blank" class="text-decoration-none text-dark me-2 fs-5"><i class="fab fa-facebook-f"></i></a>
          <a   href="https://www.instagram.com/urban.overstock/" target="_blank" class="text-decoration-none text-dark font-weight-bold fs-4"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
  </footer>
  <div class="sub-footer bg--primary">
    <div class="container">
      <div class="d-flex justify-content-between flex-wrap align-items-center">
        <p class="fw-bold text-footer-bottom  mb-0">© 2022 Urban Overstock App.</p>
        <div class="d-flex">
          <img class="img-fluid me-3" src="{{ asset('assets/images/paypal.png') }}" alt="">
          <img class="visa-footer-image" src="{{ asset('assets/images/visa.png') }}" alt="">
        </div>
      </div>
    </div>
  </div>