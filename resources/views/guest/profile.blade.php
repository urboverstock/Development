@extends('layouts.guest')
@section('title','Home')
@section('content')
<input type="hidden"  value="{{ route('add-follow-user') }}" class="addFollowUser">
<input type="hidden" value="{{ $user->id }}" class="userId">
<div class="mt-96 inner-profile-header bg-primary-lighten-2 pb-3"> 
  <img class="logged-wave-img position-absolute" src="{{ asset('assets/images/wave-logg-seller.png') }}" alt=""> <img class="img-fluid header-big-avatar mb-lg-0 mb-4" data-aos="zoom-in-up" src="{{ $user->profile_img }}" alt="">
	<div class="--right-line"></div>
	<div class="inner-profile-header-content">
		<div class="d-flex mb-2">
			<h1 class="display-5 f-600 me-3">{{ $user->full_name }}</h1>
			<div class="online-active"></div>
    </div>
    @if(!empty($user['about']))
      <h6 class="f-600 mb-2" data-aos="fade-up">Bio : {{ $user['about'] }}</h6>
    @endif
		<div class="d-flex align-items-center flex-wrap me-4 mb-4">
			<div class="d-flex align-items-center me-2 mb-lg-0 mb-3"> <i class="fas fa-star me-2"></i> <i class="fas fa-star me-2"></i> <i class="fas fa-star me-2"></i> <i class="fas fa-star me-2"></i> <i class="fas fa-star text-white"></i> </div>
			<h6 class="f-600 mb-lg-0 mb-3 me-3 ">(1045)</h6> <i class="far fa-heart fs-5 me-2 "></i>
			<h6 class="f-600 mb-lg-0 mb-3 me-3 ">(1045)</h6>
			<button type="button" class="btn btn-light br-11 me-2 mb-lg-0 mb-3"> <i class="far fa-envelope"></i> </button>
			<button type="button" class="btn btn-light br-11 me-3 mb-lg-0 mb-3">
				<svg class="" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g clip-path="url(#clip0)">
						<path d="M14.8503 6.01954C14.4547 4.05561 13.3187 2.36351 11.651 1.255C10.0576 0.195877 8.14244 -0.212162 6.25474 0.104619C6.24223 0.106494 6.22975 0.108369 6.21724 0.110244C2.14318 0.818218 -0.594944 4.70859 0.113001 8.78139C0.16925 9.10758 0.248585 9.43312 0.346698 9.74553C0.759717 11.0871 0.657883 12.5249 0.0605024 13.7946C-0.043851 14.0146 -0.00948644 14.2757 0.147366 14.4626C0.304218 14.6494 0.552885 14.7263 0.790332 14.6632L3.59094 13.8983C4.77691 14.6244 6.11599 15 7.48319 15C7.97994 15 8.48046 14.9506 8.97909 14.85C10.943 14.4545 12.6351 13.3185 13.7436 11.6507C14.8521 9.98298 15.2452 7.98345 14.8503 6.01954ZM12.7026 10.9584C11.7785 12.3487 10.3682 13.296 8.7323 13.6253C7.09768 13.9527 5.42993 13.6266 4.03961 12.7024C3.93588 12.6337 3.81529 12.598 3.69345 12.598C3.63846 12.598 3.58286 12.6055 3.52913 12.6199L1.62144 13.1404C1.94387 11.9113 1.92011 10.6097 1.5402 9.37315C1.45709 9.10945 1.39085 8.83952 1.344 8.56771C0.755997 5.18223 3.02359 1.9492 6.40221 1.34684C6.41346 1.34558 6.42471 1.34371 6.43596 1.34183C8.01747 1.06876 9.62337 1.40807 10.9593 2.29537C12.3496 3.21952 13.2963 4.62984 13.6256 6.26572C13.9549 7.90224 13.6268 9.56873 12.7026 10.9584Z" fill="black" />
						<path d="M9.998 5.62476H4.99913C4.65358 5.62476 4.37427 5.90407 4.37427 6.24962C4.37427 6.59517 4.65358 6.87448 4.99913 6.87448H9.998C10.3429 6.87448 10.6229 6.59517 10.6229 6.24962C10.6229 5.90407 10.3435 5.62476 9.998 5.62476Z" fill="black" />
						<path d="M9.998 8.12402H4.99913C4.65358 8.12402 4.37427 8.40333 4.37427 8.74888C4.37427 9.09443 4.65358 9.37374 4.99913 9.37374H9.998C10.3429 9.37374 10.6229 9.09443 10.6229 8.74888C10.6229 8.40333 10.3435 8.12402 9.998 8.12402Z" fill="black" /> </g>
					<defs>
						<clipPath id="clip0">
							<rect width="15" height="15" fill="white" /> </clipPath>
					</defs>
				</svg>
			</button>
			<button type="button" class="btn btn-dark rounded-pill px-3 mb-lg-0 mb-3 d-flex align-items-center add-follow-user">
				<svg width="16" height="16" class="me-2" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M15.375 3.98438H14.8125V3.42188C14.8125 3.07669 14.5327 2.79688 14.1875 2.79688C13.8423 2.79688 13.5625 3.07669 13.5625 3.42188V3.98438H13C12.6548 3.98438 12.375 4.26419 12.375 4.60938C12.375 4.95456 12.6548 5.23438 13 5.23438H13.5625V5.79688C13.5625 6.14206 13.8423 6.42188 14.1875 6.42188C14.5327 6.42188 14.8125 6.14206 14.8125 5.79688V5.23438H15.375C15.7202 5.23438 16 4.95456 16 4.60938C16 4.26419 15.7202 3.98438 15.375 3.98438Z" fill="white" />
					<path d="M9.85653 7.78847C10.8079 7.05347 11.4219 5.90188 11.4219 4.60938C11.4219 2.39516 9.62047 0.59375 7.40625 0.59375C5.19203 0.59375 3.39062 2.39516 3.39062 4.60938C3.39062 5.90184 4.00456 7.05347 4.95597 7.78847C2.13416 8.77478 0 11.4821 0 14.7812C0 15.1264 0.279813 15.4062 0.625 15.4062H14.1875C14.5327 15.4062 14.8125 15.1264 14.8125 14.7812C14.8125 11.4813 12.6768 8.77422 9.85653 7.78847ZM4.64062 4.60938C4.64062 3.08441 5.88128 1.84375 7.40625 1.84375C8.93122 1.84375 10.1719 3.08441 10.1719 4.60938C10.1719 6.13434 8.93122 7.375 7.40625 7.375C5.88128 7.375 4.64062 6.13434 4.64062 4.60938ZM1.2815 14.1562C1.59566 11.0541 4.22259 8.625 7.40625 8.625C10.5899 8.625 13.2168 11.0541 13.531 14.1562H1.2815Z" fill="white" /> </svg> Follow</button>
		</div>
		<div class="my-3 d-flex flex-wrap mt-4">
			<div class="d-flex align-items-center  me-3 mb-lg-0 mb-lg-0 mb-3">
				<div class="bg-white px-4 py-2 rounded-pill d-inline-block me-2">
					<h6 class="mb-0 f-600">5K+</h6></div>
				<h5 class="mb-0 f-600">Items Sold</h5> </div>
			<div class="d-flex align-items-center  me-3 mb-lg-0 mb-lg-0 mb-3">
				<div class="bg-white px-4 py-2 rounded-pill d-inline-block me-2">
					<h6 class="mb-0 f-600">{{ $followers }}</h6></div>
				<h5 class="mb-0 f-600">Followers</h5> </div>
			<div class="d-flex align-items-center  me-3 mb-lg-0 mb-3">
				<div class="bg-white px-4 py-2 rounded-pill d-inline-block me-2">
					<h6 class="mb-0 f-600">{{ $followings }}</h6></div>
				<h5 class="mb-0 f-600">Following</h5> </div>
		</div>
		<div class="mb-3">
			<a class="text-dark text-decoration-none f-600 " href="#">
				<svg class="me-1" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M7.04764 12.9576L5.04449 14.9607C4.21402 15.7912 2.86914 15.7912 2.03937 14.9609C1.20944 14.131 1.20944 12.7859 2.03921 11.9562L6.04621 7.94916C6.87598 7.11935 8.22099 7.11935 9.05076 7.94916C9.32737 8.22577 9.77588 8.22577 10.0525 7.94916C10.3291 7.67255 10.3291 7.22404 10.0525 6.94743C8.66946 5.5644 6.42751 5.5644 5.04449 6.94743L1.03751 10.9544C-0.345513 12.3375 -0.345513 14.5794 1.03751 15.9625C2.42038 17.3462 4.66249 17.3462 6.04625 15.9625L8.0494 13.9593C8.32601 13.6827 8.32601 13.2342 8.0494 12.9576C7.77279 12.681 7.32425 12.681 7.04764 12.9576Z" fill="#000" />
					<path d="M15.9623 6.04527C17.3453 4.66224 17.3453 2.42029 15.9623 1.03727C14.5793 -0.345728 12.3374 -0.345728 10.9537 1.0371L8.55018 3.44061C8.27357 3.71722 8.27357 4.16573 8.55018 4.44234C8.82679 4.71895 9.27529 4.71895 9.55191 4.44234L11.9553 2.03899C12.7856 1.20919 14.1307 1.20919 14.9605 2.03899C15.7903 2.86876 15.7903 4.21377 14.9605 5.04354L10.5533 9.45074C9.72353 10.2805 8.37855 10.2805 7.54879 9.45074C7.27217 9.17413 6.82367 9.17413 6.54706 9.45074C6.27045 9.72735 6.27045 10.1759 6.54706 10.4525C7.93009 11.8355 10.172 11.8355 11.5551 10.4525L15.9623 6.04527Z" fill="#000" />
					<path d="M13.2512 12.2494C12.9746 11.9728 12.5261 11.9728 12.2494 12.2494C11.9728 12.5261 11.9728 12.9746 12.2494 13.2512L14.3737 15.3754C14.6503 15.652 15.0988 15.652 15.3754 15.3754C15.652 15.0988 15.652 14.6503 15.3754 14.3737L13.2512 12.2494Z" fill="#000" />
					<path d="M3.75013 4.7516C4.02674 5.02822 4.47524 5.02822 4.75186 4.7516C5.02847 4.47499 5.02847 4.02649 4.75186 3.74988L2.62545 1.62347C2.34884 1.34686 1.90033 1.34686 1.62372 1.62347C1.34711 1.90009 1.34711 2.34859 1.62372 2.6252L3.75013 4.7516Z" fill="#000" />
					<path d="M16.2916 10.625H14.1666C13.7754 10.625 13.4583 10.9421 13.4583 11.3333C13.4583 11.7245 13.7754 12.0416 14.1666 12.0416H16.2916C16.6828 12.0416 16.9999 11.7245 16.9999 11.3333C16.9999 10.9421 16.6828 10.625 16.2916 10.625Z" fill="#000" />
					<path d="M5.66657 3.54164C6.05776 3.54164 6.37488 3.22452 6.37488 2.83332V0.708347C6.37488 0.317119 6.05776 0 5.66657 0C5.27537 0 4.95825 0.317119 4.95825 0.708314V2.83329C4.95822 3.22448 5.27537 3.54164 5.66657 3.54164Z" fill="#000" />
					<path d="M0.708314 6.37464H2.83329C3.22448 6.37464 3.5416 6.05752 3.5416 5.66632C3.5416 5.27513 3.22448 4.95801 2.83329 4.95801H0.708314C0.317119 4.95801 0 5.27513 0 5.66632C0 6.05752 0.317119 6.37464 0.708314 6.37464Z" fill="#000" />
					<path d="M11.3333 13.458C10.9421 13.458 10.625 13.7751 10.625 14.1663V16.2913C10.625 16.6825 10.9421 16.9996 11.3333 16.9996C11.7245 16.9996 12.0416 16.6825 12.0416 16.2913V14.1663C12.0417 13.7752 11.7245 13.458 11.3333 13.458Z" fill="#000" /> </svg> https://breadandbuttercollection.com
				<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M17.7071 8.70711C18.0976 8.31658 18.0976 7.68342 17.7071 7.29289L11.3431 0.928932C10.9526 0.538408 10.3195 0.538408 9.92893 0.928932C9.53841 1.31946 9.53841 1.95262 9.92893 2.34315L15.5858 8L9.92893 13.6569C9.53841 14.0474 9.53841 14.6805 9.92893 15.0711C10.3195 15.4616 10.9526 15.4616 11.3431 15.0711L17.7071 8.70711ZM0 9H17V7H0V9Z" fill="#000" /> </svg>
			</a>
		</div>
	</div>
</div>
<!-- featured-select  -->
<section class="pb-5">
	<div class="container-xl">
		<div class="row">
			<div class="col-lg-12 mb-5" data-aos="fade-up">
				<div class="d-flex justify-content-between align-items-center flex-wrap">
					<div>
						<div class="urban-title text--primary position-relative mb-2">
							<p class="mb-0">Browse through the</p>
						</div>
						<div class="urban-sub-title ust-100 mb-4">
							<p class="mb-0 pe-4">Collections</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- loadmore started  -->
		<div class="row loadmore">
			<!-- loadmore content started  -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card product-item border-0 shadow br-12 mb-5">
					<div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
						<h5 class="fw-bold">Peachy Umbrella</h5>
						<div class="d-flex my-2"> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star text--primary text-13"></i> </div>
					</div>
					<div class="card-footer bg-transparent">
						<div class="d-flex justify-content-between flex-wrap py-2">
							<h5 class="mb-0">$150.00</h5>
							<div class="d-flex align-items-center">
								<a href="#" class="mr-13 link-primary-hover"> <i class="far fa-heart text-20 text-muted"></i> </a>
								<a href="#" class=" mb-2 link-primary-hover">
									<svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M20.2812 19.4219C20.2812 19.8965 19.8965 20.2812 19.4219 20.2812H18.5625V21.1406C18.5625 21.6153 18.1778 22 17.7031 22C17.2285 22 16.8438 21.6153 16.8438 21.1406V20.2812H15.9844C15.5097 20.2812 15.125 19.8965 15.125 19.4219C15.125 18.9472 15.5097 18.5625 15.9844 18.5625H16.8438V17.7031C16.8438 17.2285 17.2285 16.8438 17.7031 16.8438C18.1778 16.8438 18.5625 17.2285 18.5625 17.7031V18.5625H19.4219C19.8965 18.5625 20.2812 18.9472 20.2812 19.4219ZM20.2812 6.01562V14.2656C20.2812 14.7403 19.8965 15.125 19.4219 15.125C18.9472 15.125 18.5625 14.7403 18.5625 14.2656V6.875H16.8438V9.45312C16.8438 9.92776 16.459 10.3125 15.9844 10.3125C15.5097 10.3125 15.125 9.92776 15.125 9.45312V6.875H6.875V9.45312C6.875 9.92776 6.49026 10.3125 6.01562 10.3125C5.54099 10.3125 5.15625 9.92776 5.15625 9.45312V6.875H3.4375V20.2812H12.5469C13.0215 20.2812 13.4062 20.666 13.4062 21.1406C13.4062 21.6153 13.0215 22 12.5469 22H2.57812C2.10349 22 1.71875 21.6153 1.71875 21.1406V6.01562C1.71875 5.54099 2.10349 5.15625 2.57812 5.15625H5.1969C5.53829 2.25685 8.01036 0 11 0C13.9896 0 16.4617 2.25685 16.8031 5.15625H19.4219C19.8965 5.15625 20.2812 5.54099 20.2812 6.01562ZM15.0674 5.15625C14.7391 3.20783 13.0403 1.71875 11 1.71875C8.95971 1.71875 7.2609 3.20783 6.93262 5.15625H15.0674Z" fill="black" /> </svg>
								</a>
							</div>
						</div>
						<div class="product-wishlist position-absolute end-0 pe-3">
							<button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card product-item border-0 shadow br-12 mb-5">
					<div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
						<h5 class="fw-bold">Peachy Umbrella</h5>
						<div class="d-flex my-2"> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star text--primary text-13"></i> </div>
					</div>
					<div class="card-footer bg-transparent">
						<div class="d-flex justify-content-between flex-wrap py-2">
							<h5 class="mb-0">$150.00</h5>
							<div class="d-flex align-items-center">
								<a href="#" class="mr-13 link-primary-hover"> <i class="far fa-heart text-20 text-muted"></i> </a>
								<a href="#" class=" mb-2 link-primary-hover">
									<svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M20.2812 19.4219C20.2812 19.8965 19.8965 20.2812 19.4219 20.2812H18.5625V21.1406C18.5625 21.6153 18.1778 22 17.7031 22C17.2285 22 16.8438 21.6153 16.8438 21.1406V20.2812H15.9844C15.5097 20.2812 15.125 19.8965 15.125 19.4219C15.125 18.9472 15.5097 18.5625 15.9844 18.5625H16.8438V17.7031C16.8438 17.2285 17.2285 16.8438 17.7031 16.8438C18.1778 16.8438 18.5625 17.2285 18.5625 17.7031V18.5625H19.4219C19.8965 18.5625 20.2812 18.9472 20.2812 19.4219ZM20.2812 6.01562V14.2656C20.2812 14.7403 19.8965 15.125 19.4219 15.125C18.9472 15.125 18.5625 14.7403 18.5625 14.2656V6.875H16.8438V9.45312C16.8438 9.92776 16.459 10.3125 15.9844 10.3125C15.5097 10.3125 15.125 9.92776 15.125 9.45312V6.875H6.875V9.45312C6.875 9.92776 6.49026 10.3125 6.01562 10.3125C5.54099 10.3125 5.15625 9.92776 5.15625 9.45312V6.875H3.4375V20.2812H12.5469C13.0215 20.2812 13.4062 20.666 13.4062 21.1406C13.4062 21.6153 13.0215 22 12.5469 22H2.57812C2.10349 22 1.71875 21.6153 1.71875 21.1406V6.01562C1.71875 5.54099 2.10349 5.15625 2.57812 5.15625H5.1969C5.53829 2.25685 8.01036 0 11 0C13.9896 0 16.4617 2.25685 16.8031 5.15625H19.4219C19.8965 5.15625 20.2812 5.54099 20.2812 6.01562ZM15.0674 5.15625C14.7391 3.20783 13.0403 1.71875 11 1.71875C8.95971 1.71875 7.2609 3.20783 6.93262 5.15625H15.0674Z" fill="black" /> </svg>
								</a>
							</div>
						</div>
						<div class="product-wishlist position-absolute end-0 pe-3">
							<button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card product-item border-0 shadow br-12 mb-5">
					<div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
						<h5 class="fw-bold">Peachy Umbrella</h5>
						<div class="d-flex my-2"> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star text--primary text-13"></i> </div>
					</div>
					<div class="card-footer bg-transparent">
						<div class="d-flex justify-content-between flex-wrap py-2">
							<h5 class="mb-0">$150.00</h5>
							<div class="d-flex align-items-center">
								<a href="#" class="mr-13 link-primary-hover"> <i class="far fa-heart text-20 text-muted"></i> </a>
								<a href="#" class=" mb-2 link-primary-hover">
									<svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M20.2812 19.4219C20.2812 19.8965 19.8965 20.2812 19.4219 20.2812H18.5625V21.1406C18.5625 21.6153 18.1778 22 17.7031 22C17.2285 22 16.8438 21.6153 16.8438 21.1406V20.2812H15.9844C15.5097 20.2812 15.125 19.8965 15.125 19.4219C15.125 18.9472 15.5097 18.5625 15.9844 18.5625H16.8438V17.7031C16.8438 17.2285 17.2285 16.8438 17.7031 16.8438C18.1778 16.8438 18.5625 17.2285 18.5625 17.7031V18.5625H19.4219C19.8965 18.5625 20.2812 18.9472 20.2812 19.4219ZM20.2812 6.01562V14.2656C20.2812 14.7403 19.8965 15.125 19.4219 15.125C18.9472 15.125 18.5625 14.7403 18.5625 14.2656V6.875H16.8438V9.45312C16.8438 9.92776 16.459 10.3125 15.9844 10.3125C15.5097 10.3125 15.125 9.92776 15.125 9.45312V6.875H6.875V9.45312C6.875 9.92776 6.49026 10.3125 6.01562 10.3125C5.54099 10.3125 5.15625 9.92776 5.15625 9.45312V6.875H3.4375V20.2812H12.5469C13.0215 20.2812 13.4062 20.666 13.4062 21.1406C13.4062 21.6153 13.0215 22 12.5469 22H2.57812C2.10349 22 1.71875 21.6153 1.71875 21.1406V6.01562C1.71875 5.54099 2.10349 5.15625 2.57812 5.15625H5.1969C5.53829 2.25685 8.01036 0 11 0C13.9896 0 16.4617 2.25685 16.8031 5.15625H19.4219C19.8965 5.15625 20.2812 5.54099 20.2812 6.01562ZM15.0674 5.15625C14.7391 3.20783 13.0403 1.71875 11 1.71875C8.95971 1.71875 7.2609 3.20783 6.93262 5.15625H15.0674Z" fill="black" /> </svg>
								</a>
							</div>
						</div>
						<div class="product-wishlist position-absolute end-0 pe-3">
							<button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card product-item border-0 shadow br-12 mb-5">
					<div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
						<h5 class="fw-bold">Peachy Umbrella</h5>
						<div class="d-flex my-2"> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star text--primary text-13"></i> </div>
					</div>
					<div class="card-footer bg-transparent">
						<div class="d-flex justify-content-between flex-wrap py-2">
							<h5 class="mb-0">$150.00</h5>
							<div class="d-flex align-items-center">
								<a href="#" class="mr-13 link-primary-hover"> <i class="far fa-heart text-20 text-muted"></i> </a>
								<a href="#" class=" mb-2 link-primary-hover">
									<svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M20.2812 19.4219C20.2812 19.8965 19.8965 20.2812 19.4219 20.2812H18.5625V21.1406C18.5625 21.6153 18.1778 22 17.7031 22C17.2285 22 16.8438 21.6153 16.8438 21.1406V20.2812H15.9844C15.5097 20.2812 15.125 19.8965 15.125 19.4219C15.125 18.9472 15.5097 18.5625 15.9844 18.5625H16.8438V17.7031C16.8438 17.2285 17.2285 16.8438 17.7031 16.8438C18.1778 16.8438 18.5625 17.2285 18.5625 17.7031V18.5625H19.4219C19.8965 18.5625 20.2812 18.9472 20.2812 19.4219ZM20.2812 6.01562V14.2656C20.2812 14.7403 19.8965 15.125 19.4219 15.125C18.9472 15.125 18.5625 14.7403 18.5625 14.2656V6.875H16.8438V9.45312C16.8438 9.92776 16.459 10.3125 15.9844 10.3125C15.5097 10.3125 15.125 9.92776 15.125 9.45312V6.875H6.875V9.45312C6.875 9.92776 6.49026 10.3125 6.01562 10.3125C5.54099 10.3125 5.15625 9.92776 5.15625 9.45312V6.875H3.4375V20.2812H12.5469C13.0215 20.2812 13.4062 20.666 13.4062 21.1406C13.4062 21.6153 13.0215 22 12.5469 22H2.57812C2.10349 22 1.71875 21.6153 1.71875 21.1406V6.01562C1.71875 5.54099 2.10349 5.15625 2.57812 5.15625H5.1969C5.53829 2.25685 8.01036 0 11 0C13.9896 0 16.4617 2.25685 16.8031 5.15625H19.4219C19.8965 5.15625 20.2812 5.54099 20.2812 6.01562ZM15.0674 5.15625C14.7391 3.20783 13.0403 1.71875 11 1.71875C8.95971 1.71875 7.2609 3.20783 6.93262 5.15625H15.0674Z" fill="black" /> </svg>
								</a>
							</div>
						</div>
						<div class="product-wishlist position-absolute end-0 pe-3">
							<button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card product-item border-0 shadow br-12 mb-5">
					<div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
						<h5 class="fw-bold">Peachy Umbrella</h5>
						<div class="d-flex my-2"> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star text--primary text-13"></i> </div>
					</div>
					<div class="card-footer bg-transparent">
						<div class="d-flex justify-content-between flex-wrap py-2">
							<h5 class="mb-0">$150.00</h5>
							<div class="d-flex align-items-center">
								<a href="#" class="mr-13 link-primary-hover"> <i class="far fa-heart text-20 text-muted"></i> </a>
								<a href="#" class=" mb-2 link-primary-hover">
									<svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M20.2812 19.4219C20.2812 19.8965 19.8965 20.2812 19.4219 20.2812H18.5625V21.1406C18.5625 21.6153 18.1778 22 17.7031 22C17.2285 22 16.8438 21.6153 16.8438 21.1406V20.2812H15.9844C15.5097 20.2812 15.125 19.8965 15.125 19.4219C15.125 18.9472 15.5097 18.5625 15.9844 18.5625H16.8438V17.7031C16.8438 17.2285 17.2285 16.8438 17.7031 16.8438C18.1778 16.8438 18.5625 17.2285 18.5625 17.7031V18.5625H19.4219C19.8965 18.5625 20.2812 18.9472 20.2812 19.4219ZM20.2812 6.01562V14.2656C20.2812 14.7403 19.8965 15.125 19.4219 15.125C18.9472 15.125 18.5625 14.7403 18.5625 14.2656V6.875H16.8438V9.45312C16.8438 9.92776 16.459 10.3125 15.9844 10.3125C15.5097 10.3125 15.125 9.92776 15.125 9.45312V6.875H6.875V9.45312C6.875 9.92776 6.49026 10.3125 6.01562 10.3125C5.54099 10.3125 5.15625 9.92776 5.15625 9.45312V6.875H3.4375V20.2812H12.5469C13.0215 20.2812 13.4062 20.666 13.4062 21.1406C13.4062 21.6153 13.0215 22 12.5469 22H2.57812C2.10349 22 1.71875 21.6153 1.71875 21.1406V6.01562C1.71875 5.54099 2.10349 5.15625 2.57812 5.15625H5.1969C5.53829 2.25685 8.01036 0 11 0C13.9896 0 16.4617 2.25685 16.8031 5.15625H19.4219C19.8965 5.15625 20.2812 5.54099 20.2812 6.01562ZM15.0674 5.15625C14.7391 3.20783 13.0403 1.71875 11 1.71875C8.95971 1.71875 7.2609 3.20783 6.93262 5.15625H15.0674Z" fill="black" /> </svg>
								</a>
							</div>
						</div>
						<div class="product-wishlist position-absolute end-0 pe-3">
							<button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card product-item border-0 shadow br-12 mb-5">
					<div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
						<h5 class="fw-bold">Peachy Umbrella</h5>
						<div class="d-flex my-2"> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star text--primary text-13"></i> </div>
					</div>
					<div class="card-footer bg-transparent">
						<div class="d-flex justify-content-between flex-wrap py-2">
							<h5 class="mb-0">$150.00</h5>
							<div class="d-flex align-items-center">
								<a href="#" class="mr-13 link-primary-hover"> <i class="far fa-heart text-20 text-muted"></i> </a>
								<a href="#" class=" mb-2 link-primary-hover">
									<svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M20.2812 19.4219C20.2812 19.8965 19.8965 20.2812 19.4219 20.2812H18.5625V21.1406C18.5625 21.6153 18.1778 22 17.7031 22C17.2285 22 16.8438 21.6153 16.8438 21.1406V20.2812H15.9844C15.5097 20.2812 15.125 19.8965 15.125 19.4219C15.125 18.9472 15.5097 18.5625 15.9844 18.5625H16.8438V17.7031C16.8438 17.2285 17.2285 16.8438 17.7031 16.8438C18.1778 16.8438 18.5625 17.2285 18.5625 17.7031V18.5625H19.4219C19.8965 18.5625 20.2812 18.9472 20.2812 19.4219ZM20.2812 6.01562V14.2656C20.2812 14.7403 19.8965 15.125 19.4219 15.125C18.9472 15.125 18.5625 14.7403 18.5625 14.2656V6.875H16.8438V9.45312C16.8438 9.92776 16.459 10.3125 15.9844 10.3125C15.5097 10.3125 15.125 9.92776 15.125 9.45312V6.875H6.875V9.45312C6.875 9.92776 6.49026 10.3125 6.01562 10.3125C5.54099 10.3125 5.15625 9.92776 5.15625 9.45312V6.875H3.4375V20.2812H12.5469C13.0215 20.2812 13.4062 20.666 13.4062 21.1406C13.4062 21.6153 13.0215 22 12.5469 22H2.57812C2.10349 22 1.71875 21.6153 1.71875 21.1406V6.01562C1.71875 5.54099 2.10349 5.15625 2.57812 5.15625H5.1969C5.53829 2.25685 8.01036 0 11 0C13.9896 0 16.4617 2.25685 16.8031 5.15625H19.4219C19.8965 5.15625 20.2812 5.54099 20.2812 6.01562ZM15.0674 5.15625C14.7391 3.20783 13.0403 1.71875 11 1.71875C8.95971 1.71875 7.2609 3.20783 6.93262 5.15625H15.0674Z" fill="black" /> </svg>
								</a>
							</div>
						</div>
						<div class="product-wishlist position-absolute end-0 pe-3">
							<button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card product-item border-0 shadow br-12 mb-5">
					<div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
						<h5 class="fw-bold">Peachy Umbrella</h5>
						<div class="d-flex my-2"> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star text--primary text-13"></i> </div>
					</div>
					<div class="card-footer bg-transparent">
						<div class="d-flex justify-content-between flex-wrap py-2">
							<h5 class="mb-0">$150.00</h5>
							<div class="d-flex align-items-center">
								<a href="#" class="mr-13 link-primary-hover"> <i class="far fa-heart text-20 text-muted"></i> </a>
								<a href="#" class=" mb-2 link-primary-hover">
									<svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M20.2812 19.4219C20.2812 19.8965 19.8965 20.2812 19.4219 20.2812H18.5625V21.1406C18.5625 21.6153 18.1778 22 17.7031 22C17.2285 22 16.8438 21.6153 16.8438 21.1406V20.2812H15.9844C15.5097 20.2812 15.125 19.8965 15.125 19.4219C15.125 18.9472 15.5097 18.5625 15.9844 18.5625H16.8438V17.7031C16.8438 17.2285 17.2285 16.8438 17.7031 16.8438C18.1778 16.8438 18.5625 17.2285 18.5625 17.7031V18.5625H19.4219C19.8965 18.5625 20.2812 18.9472 20.2812 19.4219ZM20.2812 6.01562V14.2656C20.2812 14.7403 19.8965 15.125 19.4219 15.125C18.9472 15.125 18.5625 14.7403 18.5625 14.2656V6.875H16.8438V9.45312C16.8438 9.92776 16.459 10.3125 15.9844 10.3125C15.5097 10.3125 15.125 9.92776 15.125 9.45312V6.875H6.875V9.45312C6.875 9.92776 6.49026 10.3125 6.01562 10.3125C5.54099 10.3125 5.15625 9.92776 5.15625 9.45312V6.875H3.4375V20.2812H12.5469C13.0215 20.2812 13.4062 20.666 13.4062 21.1406C13.4062 21.6153 13.0215 22 12.5469 22H2.57812C2.10349 22 1.71875 21.6153 1.71875 21.1406V6.01562C1.71875 5.54099 2.10349 5.15625 2.57812 5.15625H5.1969C5.53829 2.25685 8.01036 0 11 0C13.9896 0 16.4617 2.25685 16.8031 5.15625H19.4219C19.8965 5.15625 20.2812 5.54099 20.2812 6.01562ZM15.0674 5.15625C14.7391 3.20783 13.0403 1.71875 11 1.71875C8.95971 1.71875 7.2609 3.20783 6.93262 5.15625H15.0674Z" fill="black" /> </svg>
								</a>
							</div>
						</div>
						<div class="product-wishlist position-absolute end-0 pe-3">
							<button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card product-item border-0 shadow br-12 mb-5">
					<div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
						<h5 class="fw-bold">Peachy Umbrella</h5>
						<div class="d-flex my-2"> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star text--primary text-13"></i> </div>
					</div>
					<div class="card-footer bg-transparent">
						<div class="d-flex justify-content-between flex-wrap py-2">
							<h5 class="mb-0">$150.00</h5>
							<div class="d-flex align-items-center">
								<a href="#" class="mr-13 link-primary-hover"> <i class="far fa-heart text-20 text-muted"></i> </a>
								<a href="#" class=" mb-2 link-primary-hover">
									<svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M20.2812 19.4219C20.2812 19.8965 19.8965 20.2812 19.4219 20.2812H18.5625V21.1406C18.5625 21.6153 18.1778 22 17.7031 22C17.2285 22 16.8438 21.6153 16.8438 21.1406V20.2812H15.9844C15.5097 20.2812 15.125 19.8965 15.125 19.4219C15.125 18.9472 15.5097 18.5625 15.9844 18.5625H16.8438V17.7031C16.8438 17.2285 17.2285 16.8438 17.7031 16.8438C18.1778 16.8438 18.5625 17.2285 18.5625 17.7031V18.5625H19.4219C19.8965 18.5625 20.2812 18.9472 20.2812 19.4219ZM20.2812 6.01562V14.2656C20.2812 14.7403 19.8965 15.125 19.4219 15.125C18.9472 15.125 18.5625 14.7403 18.5625 14.2656V6.875H16.8438V9.45312C16.8438 9.92776 16.459 10.3125 15.9844 10.3125C15.5097 10.3125 15.125 9.92776 15.125 9.45312V6.875H6.875V9.45312C6.875 9.92776 6.49026 10.3125 6.01562 10.3125C5.54099 10.3125 5.15625 9.92776 5.15625 9.45312V6.875H3.4375V20.2812H12.5469C13.0215 20.2812 13.4062 20.666 13.4062 21.1406C13.4062 21.6153 13.0215 22 12.5469 22H2.57812C2.10349 22 1.71875 21.6153 1.71875 21.1406V6.01562C1.71875 5.54099 2.10349 5.15625 2.57812 5.15625H5.1969C5.53829 2.25685 8.01036 0 11 0C13.9896 0 16.4617 2.25685 16.8031 5.15625H19.4219C19.8965 5.15625 20.2812 5.54099 20.2812 6.01562ZM15.0674 5.15625C14.7391 3.20783 13.0403 1.71875 11 1.71875C8.95971 1.71875 7.2609 3.20783 6.93262 5.15625H15.0674Z" fill="black" /> </svg>
								</a>
							</div>
						</div>
						<div class="product-wishlist position-absolute end-0 pe-3">
							<button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card product-item border-0 shadow br-12 mb-5">
					<div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
						<h5 class="fw-bold">Peachy Umbrella</h5>
						<div class="d-flex my-2"> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star text--primary text-13"></i> </div>
					</div>
					<div class="card-footer bg-transparent">
						<div class="d-flex justify-content-between flex-wrap py-2">
							<h5 class="mb-0">$150.00</h5>
							<div class="d-flex align-items-center">
								<a href="#" class="mr-13 link-primary-hover"> <i class="far fa-heart text-20 text-muted"></i> </a>
								<a href="#" class=" mb-2 link-primary-hover">
									<svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M20.2812 19.4219C20.2812 19.8965 19.8965 20.2812 19.4219 20.2812H18.5625V21.1406C18.5625 21.6153 18.1778 22 17.7031 22C17.2285 22 16.8438 21.6153 16.8438 21.1406V20.2812H15.9844C15.5097 20.2812 15.125 19.8965 15.125 19.4219C15.125 18.9472 15.5097 18.5625 15.9844 18.5625H16.8438V17.7031C16.8438 17.2285 17.2285 16.8438 17.7031 16.8438C18.1778 16.8438 18.5625 17.2285 18.5625 17.7031V18.5625H19.4219C19.8965 18.5625 20.2812 18.9472 20.2812 19.4219ZM20.2812 6.01562V14.2656C20.2812 14.7403 19.8965 15.125 19.4219 15.125C18.9472 15.125 18.5625 14.7403 18.5625 14.2656V6.875H16.8438V9.45312C16.8438 9.92776 16.459 10.3125 15.9844 10.3125C15.5097 10.3125 15.125 9.92776 15.125 9.45312V6.875H6.875V9.45312C6.875 9.92776 6.49026 10.3125 6.01562 10.3125C5.54099 10.3125 5.15625 9.92776 5.15625 9.45312V6.875H3.4375V20.2812H12.5469C13.0215 20.2812 13.4062 20.666 13.4062 21.1406C13.4062 21.6153 13.0215 22 12.5469 22H2.57812C2.10349 22 1.71875 21.6153 1.71875 21.1406V6.01562C1.71875 5.54099 2.10349 5.15625 2.57812 5.15625H5.1969C5.53829 2.25685 8.01036 0 11 0C13.9896 0 16.4617 2.25685 16.8031 5.15625H19.4219C19.8965 5.15625 20.2812 5.54099 20.2812 6.01562ZM15.0674 5.15625C14.7391 3.20783 13.0403 1.71875 11 1.71875C8.95971 1.71875 7.2609 3.20783 6.93262 5.15625H15.0674Z" fill="black" /> </svg>
								</a>
							</div>
						</div>
						<div class="product-wishlist position-absolute end-0 pe-3">
							<button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card product-item border-0 shadow br-12 mb-5">
					<div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
						<h5 class="fw-bold">Peachy Umbrella</h5>
						<div class="d-flex my-2"> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star text--primary text-13"></i> </div>
					</div>
					<div class="card-footer bg-transparent">
						<div class="d-flex justify-content-between flex-wrap py-2">
							<h5 class="mb-0">$150.00</h5>
							<div class="d-flex align-items-center">
								<a href="#" class="mr-13 link-primary-hover"> <i class="far fa-heart text-20 text-muted"></i> </a>
								<a href="#" class=" mb-2 link-primary-hover">
									<svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M20.2812 19.4219C20.2812 19.8965 19.8965 20.2812 19.4219 20.2812H18.5625V21.1406C18.5625 21.6153 18.1778 22 17.7031 22C17.2285 22 16.8438 21.6153 16.8438 21.1406V20.2812H15.9844C15.5097 20.2812 15.125 19.8965 15.125 19.4219C15.125 18.9472 15.5097 18.5625 15.9844 18.5625H16.8438V17.7031C16.8438 17.2285 17.2285 16.8438 17.7031 16.8438C18.1778 16.8438 18.5625 17.2285 18.5625 17.7031V18.5625H19.4219C19.8965 18.5625 20.2812 18.9472 20.2812 19.4219ZM20.2812 6.01562V14.2656C20.2812 14.7403 19.8965 15.125 19.4219 15.125C18.9472 15.125 18.5625 14.7403 18.5625 14.2656V6.875H16.8438V9.45312C16.8438 9.92776 16.459 10.3125 15.9844 10.3125C15.5097 10.3125 15.125 9.92776 15.125 9.45312V6.875H6.875V9.45312C6.875 9.92776 6.49026 10.3125 6.01562 10.3125C5.54099 10.3125 5.15625 9.92776 5.15625 9.45312V6.875H3.4375V20.2812H12.5469C13.0215 20.2812 13.4062 20.666 13.4062 21.1406C13.4062 21.6153 13.0215 22 12.5469 22H2.57812C2.10349 22 1.71875 21.6153 1.71875 21.1406V6.01562C1.71875 5.54099 2.10349 5.15625 2.57812 5.15625H5.1969C5.53829 2.25685 8.01036 0 11 0C13.9896 0 16.4617 2.25685 16.8031 5.15625H19.4219C19.8965 5.15625 20.2812 5.54099 20.2812 6.01562ZM15.0674 5.15625C14.7391 3.20783 13.0403 1.71875 11 1.71875C8.95971 1.71875 7.2609 3.20783 6.93262 5.15625H15.0674Z" fill="black" /> </svg>
								</a>
							</div>
						</div>
						<div class="product-wishlist position-absolute end-0 pe-3">
							<button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card product-item border-0 shadow br-12 mb-5">
					<div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
						<h5 class="fw-bold">Peachy Umbrella</h5>
						<div class="d-flex my-2"> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star text--primary text-13"></i> </div>
					</div>
					<div class="card-footer bg-transparent">
						<div class="d-flex justify-content-between flex-wrap py-2">
							<h5 class="mb-0">$150.00</h5>
							<div class="d-flex align-items-center">
								<a href="#" class="mr-13 link-primary-hover"> <i class="far fa-heart text-20 text-muted"></i> </a>
								<a href="#" class=" mb-2 link-primary-hover">
									<svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M20.2812 19.4219C20.2812 19.8965 19.8965 20.2812 19.4219 20.2812H18.5625V21.1406C18.5625 21.6153 18.1778 22 17.7031 22C17.2285 22 16.8438 21.6153 16.8438 21.1406V20.2812H15.9844C15.5097 20.2812 15.125 19.8965 15.125 19.4219C15.125 18.9472 15.5097 18.5625 15.9844 18.5625H16.8438V17.7031C16.8438 17.2285 17.2285 16.8438 17.7031 16.8438C18.1778 16.8438 18.5625 17.2285 18.5625 17.7031V18.5625H19.4219C19.8965 18.5625 20.2812 18.9472 20.2812 19.4219ZM20.2812 6.01562V14.2656C20.2812 14.7403 19.8965 15.125 19.4219 15.125C18.9472 15.125 18.5625 14.7403 18.5625 14.2656V6.875H16.8438V9.45312C16.8438 9.92776 16.459 10.3125 15.9844 10.3125C15.5097 10.3125 15.125 9.92776 15.125 9.45312V6.875H6.875V9.45312C6.875 9.92776 6.49026 10.3125 6.01562 10.3125C5.54099 10.3125 5.15625 9.92776 5.15625 9.45312V6.875H3.4375V20.2812H12.5469C13.0215 20.2812 13.4062 20.666 13.4062 21.1406C13.4062 21.6153 13.0215 22 12.5469 22H2.57812C2.10349 22 1.71875 21.6153 1.71875 21.1406V6.01562C1.71875 5.54099 2.10349 5.15625 2.57812 5.15625H5.1969C5.53829 2.25685 8.01036 0 11 0C13.9896 0 16.4617 2.25685 16.8031 5.15625H19.4219C19.8965 5.15625 20.2812 5.54099 20.2812 6.01562ZM15.0674 5.15625C14.7391 3.20783 13.0403 1.71875 11 1.71875C8.95971 1.71875 7.2609 3.20783 6.93262 5.15625H15.0674Z" fill="black" /> </svg>
								</a>
							</div>
						</div>
						<div class="product-wishlist position-absolute end-0 pe-3">
							<button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card product-item border-0 shadow br-12 mb-5">
					<div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
						<h5 class="fw-bold">Peachy Umbrella</h5>
						<div class="d-flex my-2"> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star text--primary text-13"></i> </div>
					</div>
					<div class="card-footer bg-transparent">
						<div class="d-flex justify-content-between flex-wrap py-2">
							<h5 class="mb-0">$150.00</h5>
							<div class="d-flex align-items-center">
								<a href="#" class="mr-13 link-primary-hover"> <i class="far fa-heart text-20 text-muted"></i> </a>
								<a href="#" class=" mb-2 link-primary-hover">
									<svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M20.2812 19.4219C20.2812 19.8965 19.8965 20.2812 19.4219 20.2812H18.5625V21.1406C18.5625 21.6153 18.1778 22 17.7031 22C17.2285 22 16.8438 21.6153 16.8438 21.1406V20.2812H15.9844C15.5097 20.2812 15.125 19.8965 15.125 19.4219C15.125 18.9472 15.5097 18.5625 15.9844 18.5625H16.8438V17.7031C16.8438 17.2285 17.2285 16.8438 17.7031 16.8438C18.1778 16.8438 18.5625 17.2285 18.5625 17.7031V18.5625H19.4219C19.8965 18.5625 20.2812 18.9472 20.2812 19.4219ZM20.2812 6.01562V14.2656C20.2812 14.7403 19.8965 15.125 19.4219 15.125C18.9472 15.125 18.5625 14.7403 18.5625 14.2656V6.875H16.8438V9.45312C16.8438 9.92776 16.459 10.3125 15.9844 10.3125C15.5097 10.3125 15.125 9.92776 15.125 9.45312V6.875H6.875V9.45312C6.875 9.92776 6.49026 10.3125 6.01562 10.3125C5.54099 10.3125 5.15625 9.92776 5.15625 9.45312V6.875H3.4375V20.2812H12.5469C13.0215 20.2812 13.4062 20.666 13.4062 21.1406C13.4062 21.6153 13.0215 22 12.5469 22H2.57812C2.10349 22 1.71875 21.6153 1.71875 21.1406V6.01562C1.71875 5.54099 2.10349 5.15625 2.57812 5.15625H5.1969C5.53829 2.25685 8.01036 0 11 0C13.9896 0 16.4617 2.25685 16.8031 5.15625H19.4219C19.8965 5.15625 20.2812 5.54099 20.2812 6.01562ZM15.0674 5.15625C14.7391 3.20783 13.0403 1.71875 11 1.71875C8.95971 1.71875 7.2609 3.20783 6.93262 5.15625H15.0674Z" fill="black" /> </svg>
								</a>
							</div>
						</div>
						<div class="product-wishlist position-absolute end-0 pe-3">
							<button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card product-item border-0 shadow br-12 mb-5">
					<div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
						<h5 class="fw-bold">Peachy Umbrella</h5>
						<div class="d-flex my-2"> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star text--primary text-13"></i> </div>
					</div>
					<div class="card-footer bg-transparent">
						<div class="d-flex justify-content-between flex-wrap py-2">
							<h5 class="mb-0">$150.00</h5>
							<div class="d-flex align-items-center">
								<a href="#" class="mr-13 link-primary-hover"> <i class="far fa-heart text-20 text-muted"></i> </a>
								<a href="#" class=" mb-2 link-primary-hover">
									<svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M20.2812 19.4219C20.2812 19.8965 19.8965 20.2812 19.4219 20.2812H18.5625V21.1406C18.5625 21.6153 18.1778 22 17.7031 22C17.2285 22 16.8438 21.6153 16.8438 21.1406V20.2812H15.9844C15.5097 20.2812 15.125 19.8965 15.125 19.4219C15.125 18.9472 15.5097 18.5625 15.9844 18.5625H16.8438V17.7031C16.8438 17.2285 17.2285 16.8438 17.7031 16.8438C18.1778 16.8438 18.5625 17.2285 18.5625 17.7031V18.5625H19.4219C19.8965 18.5625 20.2812 18.9472 20.2812 19.4219ZM20.2812 6.01562V14.2656C20.2812 14.7403 19.8965 15.125 19.4219 15.125C18.9472 15.125 18.5625 14.7403 18.5625 14.2656V6.875H16.8438V9.45312C16.8438 9.92776 16.459 10.3125 15.9844 10.3125C15.5097 10.3125 15.125 9.92776 15.125 9.45312V6.875H6.875V9.45312C6.875 9.92776 6.49026 10.3125 6.01562 10.3125C5.54099 10.3125 5.15625 9.92776 5.15625 9.45312V6.875H3.4375V20.2812H12.5469C13.0215 20.2812 13.4062 20.666 13.4062 21.1406C13.4062 21.6153 13.0215 22 12.5469 22H2.57812C2.10349 22 1.71875 21.6153 1.71875 21.1406V6.01562C1.71875 5.54099 2.10349 5.15625 2.57812 5.15625H5.1969C5.53829 2.25685 8.01036 0 11 0C13.9896 0 16.4617 2.25685 16.8031 5.15625H19.4219C19.8965 5.15625 20.2812 5.54099 20.2812 6.01562ZM15.0674 5.15625C14.7391 3.20783 13.0403 1.71875 11 1.71875C8.95971 1.71875 7.2609 3.20783 6.93262 5.15625H15.0674Z" fill="black" /> </svg>
								</a>
							</div>
						</div>
						<div class="product-wishlist position-absolute end-0 pe-3">
							<button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card product-item border-0 shadow br-12 mb-5">
					<div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
						<h5 class="fw-bold">Peachy Umbrella</h5>
						<div class="d-flex my-2"> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star text--primary text-13"></i> </div>
					</div>
					<div class="card-footer bg-transparent">
						<div class="d-flex justify-content-between flex-wrap py-2">
							<h5 class="mb-0">$150.00</h5>
							<div class="d-flex align-items-center">
								<a href="#" class="mr-13 link-primary-hover"> <i class="far fa-heart text-20 text-muted"></i> </a>
								<a href="#" class=" mb-2 link-primary-hover">
									<svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M20.2812 19.4219C20.2812 19.8965 19.8965 20.2812 19.4219 20.2812H18.5625V21.1406C18.5625 21.6153 18.1778 22 17.7031 22C17.2285 22 16.8438 21.6153 16.8438 21.1406V20.2812H15.9844C15.5097 20.2812 15.125 19.8965 15.125 19.4219C15.125 18.9472 15.5097 18.5625 15.9844 18.5625H16.8438V17.7031C16.8438 17.2285 17.2285 16.8438 17.7031 16.8438C18.1778 16.8438 18.5625 17.2285 18.5625 17.7031V18.5625H19.4219C19.8965 18.5625 20.2812 18.9472 20.2812 19.4219ZM20.2812 6.01562V14.2656C20.2812 14.7403 19.8965 15.125 19.4219 15.125C18.9472 15.125 18.5625 14.7403 18.5625 14.2656V6.875H16.8438V9.45312C16.8438 9.92776 16.459 10.3125 15.9844 10.3125C15.5097 10.3125 15.125 9.92776 15.125 9.45312V6.875H6.875V9.45312C6.875 9.92776 6.49026 10.3125 6.01562 10.3125C5.54099 10.3125 5.15625 9.92776 5.15625 9.45312V6.875H3.4375V20.2812H12.5469C13.0215 20.2812 13.4062 20.666 13.4062 21.1406C13.4062 21.6153 13.0215 22 12.5469 22H2.57812C2.10349 22 1.71875 21.6153 1.71875 21.1406V6.01562C1.71875 5.54099 2.10349 5.15625 2.57812 5.15625H5.1969C5.53829 2.25685 8.01036 0 11 0C13.9896 0 16.4617 2.25685 16.8031 5.15625H19.4219C19.8965 5.15625 20.2812 5.54099 20.2812 6.01562ZM15.0674 5.15625C14.7391 3.20783 13.0403 1.71875 11 1.71875C8.95971 1.71875 7.2609 3.20783 6.93262 5.15625H15.0674Z" fill="black" /> </svg>
								</a>
							</div>
						</div>
						<div class="product-wishlist position-absolute end-0 pe-3">
							<button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card product-item border-0 shadow br-12 mb-5">
					<div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
						<h5 class="fw-bold">Peachy Umbrella</h5>
						<div class="d-flex my-2"> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star text--primary text-13"></i> </div>
					</div>
					<div class="card-footer bg-transparent">
						<div class="d-flex justify-content-between flex-wrap py-2">
							<h5 class="mb-0">$150.00</h5>
							<div class="d-flex align-items-center">
								<a href="#" class="mr-13 link-primary-hover"> <i class="far fa-heart text-20 text-muted"></i> </a>
								<a href="#" class=" mb-2 link-primary-hover">
									<svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M20.2812 19.4219C20.2812 19.8965 19.8965 20.2812 19.4219 20.2812H18.5625V21.1406C18.5625 21.6153 18.1778 22 17.7031 22C17.2285 22 16.8438 21.6153 16.8438 21.1406V20.2812H15.9844C15.5097 20.2812 15.125 19.8965 15.125 19.4219C15.125 18.9472 15.5097 18.5625 15.9844 18.5625H16.8438V17.7031C16.8438 17.2285 17.2285 16.8438 17.7031 16.8438C18.1778 16.8438 18.5625 17.2285 18.5625 17.7031V18.5625H19.4219C19.8965 18.5625 20.2812 18.9472 20.2812 19.4219ZM20.2812 6.01562V14.2656C20.2812 14.7403 19.8965 15.125 19.4219 15.125C18.9472 15.125 18.5625 14.7403 18.5625 14.2656V6.875H16.8438V9.45312C16.8438 9.92776 16.459 10.3125 15.9844 10.3125C15.5097 10.3125 15.125 9.92776 15.125 9.45312V6.875H6.875V9.45312C6.875 9.92776 6.49026 10.3125 6.01562 10.3125C5.54099 10.3125 5.15625 9.92776 5.15625 9.45312V6.875H3.4375V20.2812H12.5469C13.0215 20.2812 13.4062 20.666 13.4062 21.1406C13.4062 21.6153 13.0215 22 12.5469 22H2.57812C2.10349 22 1.71875 21.6153 1.71875 21.1406V6.01562C1.71875 5.54099 2.10349 5.15625 2.57812 5.15625H5.1969C5.53829 2.25685 8.01036 0 11 0C13.9896 0 16.4617 2.25685 16.8031 5.15625H19.4219C19.8965 5.15625 20.2812 5.54099 20.2812 6.01562ZM15.0674 5.15625C14.7391 3.20783 13.0403 1.71875 11 1.71875C8.95971 1.71875 7.2609 3.20783 6.93262 5.15625H15.0674Z" fill="black" /> </svg>
								</a>
							</div>
						</div>
						<div class="product-wishlist position-absolute end-0 pe-3">
							<button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card product-item border-0 shadow br-12 mb-5">
					<div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
						<h5 class="fw-bold">Peachy Umbrella</h5>
						<div class="d-flex my-2"> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star text--primary text-13"></i> </div>
					</div>
					<div class="card-footer bg-transparent">
						<div class="d-flex justify-content-between flex-wrap py-2">
							<h5 class="mb-0">$150.00</h5>
							<div class="d-flex align-items-center">
								<a href="#" class="mr-13 link-primary-hover"> <i class="far fa-heart text-20 text-muted"></i> </a>
								<a href="#" class=" mb-2 link-primary-hover">
									<svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M20.2812 19.4219C20.2812 19.8965 19.8965 20.2812 19.4219 20.2812H18.5625V21.1406C18.5625 21.6153 18.1778 22 17.7031 22C17.2285 22 16.8438 21.6153 16.8438 21.1406V20.2812H15.9844C15.5097 20.2812 15.125 19.8965 15.125 19.4219C15.125 18.9472 15.5097 18.5625 15.9844 18.5625H16.8438V17.7031C16.8438 17.2285 17.2285 16.8438 17.7031 16.8438C18.1778 16.8438 18.5625 17.2285 18.5625 17.7031V18.5625H19.4219C19.8965 18.5625 20.2812 18.9472 20.2812 19.4219ZM20.2812 6.01562V14.2656C20.2812 14.7403 19.8965 15.125 19.4219 15.125C18.9472 15.125 18.5625 14.7403 18.5625 14.2656V6.875H16.8438V9.45312C16.8438 9.92776 16.459 10.3125 15.9844 10.3125C15.5097 10.3125 15.125 9.92776 15.125 9.45312V6.875H6.875V9.45312C6.875 9.92776 6.49026 10.3125 6.01562 10.3125C5.54099 10.3125 5.15625 9.92776 5.15625 9.45312V6.875H3.4375V20.2812H12.5469C13.0215 20.2812 13.4062 20.666 13.4062 21.1406C13.4062 21.6153 13.0215 22 12.5469 22H2.57812C2.10349 22 1.71875 21.6153 1.71875 21.1406V6.01562C1.71875 5.54099 2.10349 5.15625 2.57812 5.15625H5.1969C5.53829 2.25685 8.01036 0 11 0C13.9896 0 16.4617 2.25685 16.8031 5.15625H19.4219C19.8965 5.15625 20.2812 5.54099 20.2812 6.01562ZM15.0674 5.15625C14.7391 3.20783 13.0403 1.71875 11 1.71875C8.95971 1.71875 7.2609 3.20783 6.93262 5.15625H15.0674Z" fill="black" /> </svg>
								</a>
							</div>
						</div>
						<div class="product-wishlist position-absolute end-0 pe-3">
							<button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card product-item border-0 shadow br-12 mb-5">
					<div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
						<h5 class="fw-bold">Peachy Umbrella</h5>
						<div class="d-flex my-2"> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star text--primary text-13"></i> </div>
					</div>
					<div class="card-footer bg-transparent">
						<div class="d-flex justify-content-between flex-wrap py-2">
							<h5 class="mb-0">$150.00</h5>
							<div class="d-flex align-items-center">
								<a href="#" class="mr-13 link-primary-hover"> <i class="far fa-heart text-20 text-muted"></i> </a>
								<a href="#" class=" mb-2 link-primary-hover">
									<svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M20.2812 19.4219C20.2812 19.8965 19.8965 20.2812 19.4219 20.2812H18.5625V21.1406C18.5625 21.6153 18.1778 22 17.7031 22C17.2285 22 16.8438 21.6153 16.8438 21.1406V20.2812H15.9844C15.5097 20.2812 15.125 19.8965 15.125 19.4219C15.125 18.9472 15.5097 18.5625 15.9844 18.5625H16.8438V17.7031C16.8438 17.2285 17.2285 16.8438 17.7031 16.8438C18.1778 16.8438 18.5625 17.2285 18.5625 17.7031V18.5625H19.4219C19.8965 18.5625 20.2812 18.9472 20.2812 19.4219ZM20.2812 6.01562V14.2656C20.2812 14.7403 19.8965 15.125 19.4219 15.125C18.9472 15.125 18.5625 14.7403 18.5625 14.2656V6.875H16.8438V9.45312C16.8438 9.92776 16.459 10.3125 15.9844 10.3125C15.5097 10.3125 15.125 9.92776 15.125 9.45312V6.875H6.875V9.45312C6.875 9.92776 6.49026 10.3125 6.01562 10.3125C5.54099 10.3125 5.15625 9.92776 5.15625 9.45312V6.875H3.4375V20.2812H12.5469C13.0215 20.2812 13.4062 20.666 13.4062 21.1406C13.4062 21.6153 13.0215 22 12.5469 22H2.57812C2.10349 22 1.71875 21.6153 1.71875 21.1406V6.01562C1.71875 5.54099 2.10349 5.15625 2.57812 5.15625H5.1969C5.53829 2.25685 8.01036 0 11 0C13.9896 0 16.4617 2.25685 16.8031 5.15625H19.4219C19.8965 5.15625 20.2812 5.54099 20.2812 6.01562ZM15.0674 5.15625C14.7391 3.20783 13.0403 1.71875 11 1.71875C8.95971 1.71875 7.2609 3.20783 6.93262 5.15625H15.0674Z" fill="black" /> </svg>
								</a>
							</div>
						</div>
						<div class="product-wishlist position-absolute end-0 pe-3">
							<button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card product-item border-0 shadow br-12 mb-5">
					<div class="card-body "> <img class="img-fluid br-12 mb-3" src="../assets/images/garbage/1.png" alt="">
						<h5 class="fw-bold">Peachy Umbrella</h5>
						<div class="d-flex my-2"> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star me-2 text--primary text-13"></i> <i class="fas fa-star text--primary text-13"></i> </div>
					</div>
					<div class="card-footer bg-transparent">
						<div class="d-flex justify-content-between flex-wrap py-2">
							<h5 class="mb-0">$150.00</h5>
							<div class="d-flex align-items-center">
								<a href="#" class="mr-13 link-primary-hover"> <i class="far fa-heart text-20 text-muted"></i> </a>
								<a href="#" class=" mb-2 link-primary-hover">
									<svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M20.2812 19.4219C20.2812 19.8965 19.8965 20.2812 19.4219 20.2812H18.5625V21.1406C18.5625 21.6153 18.1778 22 17.7031 22C17.2285 22 16.8438 21.6153 16.8438 21.1406V20.2812H15.9844C15.5097 20.2812 15.125 19.8965 15.125 19.4219C15.125 18.9472 15.5097 18.5625 15.9844 18.5625H16.8438V17.7031C16.8438 17.2285 17.2285 16.8438 17.7031 16.8438C18.1778 16.8438 18.5625 17.2285 18.5625 17.7031V18.5625H19.4219C19.8965 18.5625 20.2812 18.9472 20.2812 19.4219ZM20.2812 6.01562V14.2656C20.2812 14.7403 19.8965 15.125 19.4219 15.125C18.9472 15.125 18.5625 14.7403 18.5625 14.2656V6.875H16.8438V9.45312C16.8438 9.92776 16.459 10.3125 15.9844 10.3125C15.5097 10.3125 15.125 9.92776 15.125 9.45312V6.875H6.875V9.45312C6.875 9.92776 6.49026 10.3125 6.01562 10.3125C5.54099 10.3125 5.15625 9.92776 5.15625 9.45312V6.875H3.4375V20.2812H12.5469C13.0215 20.2812 13.4062 20.666 13.4062 21.1406C13.4062 21.6153 13.0215 22 12.5469 22H2.57812C2.10349 22 1.71875 21.6153 1.71875 21.1406V6.01562C1.71875 5.54099 2.10349 5.15625 2.57812 5.15625H5.1969C5.53829 2.25685 8.01036 0 11 0C13.9896 0 16.4617 2.25685 16.8031 5.15625H19.4219C19.8965 5.15625 20.2812 5.54099 20.2812 6.01562ZM15.0674 5.15625C14.7391 3.20783 13.0403 1.71875 11 1.71875C8.95971 1.71875 7.2609 3.20783 6.93262 5.15625H15.0674Z" fill="black" /> </svg>
								</a>
							</div>
						</div>
						<div class="product-wishlist position-absolute end-0 pe-3">
							<button type="button" class="btn btn--primary btn-sm fw-bold">Add to Wishlist</button>
						</div>
					</div>
				</div>
			</div>
			<!-- loadmore content end    -->
			<!-- loadmore end  -->
		</div>
		<div class="border-bottom py-5 mt-3"></div>
	</div>
</section>
<!-- offers  -->
<section class="pt-5">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 text-center mb-5 -custom-guest-buyers" data-aos="fade-up">
				<h6 class="display-6 fw-bold">Offers by Chloye</h6>
				<h3 class="text-muted">Login now and avail these super offers</h3> </div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6" data-aos="fade-up">
				<a href="#" class="text-decoration-none"> <img class="img-fluid" src="../assets/images/guest-buyers/offer-1.png" alt=""> </a>
			</div>
			<div class="col-lg-6" data-aos="fade-up">
				<a href="#" class="text-decoration-none"> <img class="img-fluid" src="../assets/images/guest-buyers/offer-2.png" alt=""> </a>
			</div>
		</div>
		<div class="border-bottom py-5 mt-5"></div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 mb-5 aos-init aos-animate" data-aos="fade-left">
				<div class="sec-7-header">
					<div class="urban-title text--primary position-relative mb-2">
						<p class="mb-0">Meet Other</p>
					</div>
					<div class="urban-sub-title mb-4">
						<p class="mb-0">Pro Sellers</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
	@if(count($pro_sellers) > 0)
		<div class="center-guest-buyers ">
		@foreach($pro_sellers as $seller)
			<div class="my-4 mx-4">
				<a style="text-decoration: none;color: #212529;" href="{{ route('pro-seller', ['id' => $seller->id]) }}">
				<div class="card border-0 shadow br-20">
					<div class="card-body d-flex align-items-center flex-wrap p-5"> <img class="me-3" src="../{{$seller->profile_pic}}" alt=""><br>
						<div class="text-24 fw-bold">{{$seller->first_name}}</div>
					</div>
				</div>
				</a>
			</div>
		@endforeach	
		</div>
	@else
		<div class="row text-center">
			<h2>No pro seller here!</h2>
		</div>
    @endif
	</div>
</section>
 
  
@endsection

