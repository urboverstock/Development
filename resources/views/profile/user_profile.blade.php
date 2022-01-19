@extends('layouts.guest')
@section('title','View Profile')
@section('content')

  <div class="mt-96 inner-profile-header bg-primary-2 ">
    <img class="logged-wave-img position-absolute" src="{{ asset('assets/images/wave-logg-seller.png') }}" alt="">
    <img class=" header-big-avatar rounded-circle" style="max-width:300px; height: 300px;"  data-aos="zoom-in-up" src="{{ $user['profile_img'] }}" alt="">
    <div class="--right-line"></div>
    <!-- <div class="dropdown --dropdown">
      <button class="btn btn-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="far fa-envelope"></i>
      </button>
    </div> -->
  </div>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="d-flex mb-2" data-aos="fade-up">
            <h1 class="display-5 f-600 me-3">{{ $user->first_name }} {{ !empty($user->last_name) ? $user->last_name : '' }}</h1>
            <div class="online-active"></div>
          </div>
          <h3 data-aos="fade-up"><a class="text-dark" href="mailto:{{ $user->email }}"> {{ $user->email }} </a></h3>
          
          <input type="hidden"  value="{{ route('add-follow-user') }}" class="addFollowUser">
          <input type="hidden"  value="{{ route('remove-follow-user') }}" class="removeFollowUser">
          <input type="hidden" value="{{ $user->id }}" class="userId">
          @if($UserFollowers)
           <button type="button" class="btn btn-dark shadow-0 border-0 px-3 remove-follow-user rounded-0 mb-3 me-3 py-2 px-4" data-aos="fade-up" data-userid="{{ $user->id }}">Unfollow</button>
              @else
                @if(Auth::check() && $user->id != Auth::user()->id)
                  <button type="button" class="btn btn-dark shadow-0 border-0 px-3 rounded-0 add-follow-user mb-3 me-3 py-2 px-4" data-aos="fade-up" data-userid="{{ $user->id }}">Follow</button>   
                @endif
          @endif

          <button type="button" class="btn btn-dark shadow-0 border-0 px-3 rounded-0 mb-3 me-3 py-2 px-4" data-aos="fade-up" data-bs-toggle="modal" data-bs-target="#myModal">Share Profile</button>

          @if($user->user_chat_status == 1)
          @if(Auth::check() && $user->id != Auth::user()->id)
            <a href="{{ url('/chat?user_id='.  \Illuminate\Support\Facades\Crypt::encrypt($user->id)) }}" class="btn btn-dark z-btn-text-white py-2 px-4 mb-3 me-3 display-5" id="add-to-cart" data-productid="{{ @$product_details->id }}" data-aos="fade-up"><i class="far fa-comments"></i></a>
            @else
            <!--a href="{{ route('signin') }}" class="btn btn-dark z-btn-text-white py-2 px-4 rounded-pill mb-3 me-3" data-aos="fade-up"><i class="far fa-comments"></i></a-->
        
          @endif
          @endif

          <input type="hidden" name="" id="rate_user_id" value="{{ $user->id }}">
          @if(Auth::check())
            <div data-aos="fade-up" class="col-lg-12">
              @for($i = 1; $i <= 5; $i++)
                <span><i class="fa fa-star {{ Auth::user()->id != $user->id ? 'user_rating' : '' }}" aria-hidden = "true" id = "st{{ Auth::user()->id != $user->id ? $i : '' }}" data-rate_value="{{ $i }}" style="{{ $i <= $countRateAvg ? 'color:yellow' : '' }}"></i></span>
              @endfor
              <!-- <i class = "fa fa-star user_rating" aria-hidden = "true" id = "st1" data-rate_value="1"></i>
              <i class = "fa fa-star user_rating" aria-hidden = "true" id = "st2" data-rate_value="2"></i>
              <i class = "fa fa-star user_rating" aria-hidden = "true" id = "st3" data-rate_value="3"></i>
              <i class = "fa fa-star user_rating" aria-hidden = "true" id = "st4" data-rate_value="4"></i>
              <i class = "fa fa-star user_rating" aria-hidden = "true" id = "st5" data-rate_value="5"></i> -->
              <span>(Average rating {{ number_format($countRateAvg) }} out of 5)</span>
            </div>
            @else
            <div data-aos="fade-up" class="col-lg-12">
              @for($i = 1; $i <= 5; $i++)
                <span><i class="fa fa-star" aria-hidden = "true" id = "st$i" data-rate_value="{{ $i }}" style="{{ $i <= $countRateAvg ? 'color:yellow' : '' }}"></i></span>
              @endfor
              <span>(Average rating {{ number_format($countRateAvg) }} out of 5)</span>
            </div>

          @endif

          <div class="mb-5" data-aos="fade-up">
            <div class="urban-title text--primary position-relative mb-2">
              <p class="mb-0">Browse through</p>
            </div>
            <div class="urban-sub-title ust-100 mb-4">
              <p class="mb-0 pe-5 ms-2">User Posts</p>
            </div>
          </div>

          @if(!isset($user_posts))
            <div class="row" data-aos="fade-up">
              <div class="col-lg-12 mx-auto text-center">
                <p class="text-24 mb-3 fw-bold">You haven’t made any posts yet</p>
                <p class="text-mute">Make and publish an item in your store to get contents here. Don’t be scared, it’s absolutely free!</p>
              </div>
            </div>
          @else
            <div class="three-item" data-aos="fade-up">
              @foreach($user_posts as $user_post)                
                <div>
                    <div class="position-relative me-3">
                        <img class="w-100 h-300  mh-450" src="{{ postDefaultImage($user_post->id)}}" alt="">
                        <button type="button" class="btn btn-dark px-3 py-3 rounded-pill position-absolute bottom-0 start-50 translate-middle-x mb-4" style="display: inline-block;width: 180px; white-space: nowrap; overflow: hidden !important;    text-overflow: ellipsis;" title="{{ $user_post->title }}">
                          <a class="text-white text-decoration-none" href="{{ route('buyerViewUserPost', \Illuminate\Support\Facades\Crypt::encrypt($user_post->id)) }}">{{ $user_post->title }}</a>
                        </button>
                    </div>
                </div>
            @endforeach
            </div>
          @endif
      </div>
    </div>
  </section>


  <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Profile Link</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body d-flex align-items-center">
        <input class="me-3 flex-1 form-control" type="text" name="" value="{{ route('profile', \Illuminate\Support\Facades\Crypt::encrypt($user->id)) }}" id="profile_link">
        <button class="btn btn--primary" onclick="clipboard()">Copy Link</button>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

@endsection

@section('after_footer')
  <script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.user_rating', function()
        {
          var rate_value = $(this).data('rate_value');
          var rate_user_id = $('#rate_user_id').val();

          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            type : 'get',
            url: base_url + '/user_rate',
            data: { rate_value : rate_value, rate_user_id : rate_user_id },
            //async: false,
          }).done(function(response) {
            if(response.status == 1) {
              toastr.success(response.message, "Success");
            }else{
              toastr.error(response.message, "Error");
            }
          }).fail(function() {
            ajaxrequestTime = false;
            toastr.error("Something went wrong!", "Error");
          });
          
        });


          $("#st1").click(function() {
              $(".fa-star").css("color", "black");
              $("#st1").css("color", "yellow");

          });
          $("#st2").click(function() {
              $(".fa-star").css("color", "black");
              $("#st1, #st2").css("color", "yellow");

          });
          $("#st3").click(function() {
              $(".fa-star").css("color", "black")
              $("#st1, #st2, #st3").css("color", "yellow");

          });
          $("#st4").click(function() {
              $(".fa-star").css("color", "black");
              $("#st1, #st2, #st3, #st4").css("color", "yellow");

          });
          $("#st5").click(function() {
              $(".fa-star").css("color", "black");
              $("#st1, #st2, #st3, #st4, #st5").css("color", "yellow");

          });
        });
  </script>
@endsection