@extends('layouts.buyer')
@section('title','Addess List')
@section('content')
	<section class="mt-90">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <span class="float-right">
                	<a href="{{route('buyerAddAddress')}}" class="btn btn-dark mb-3 rounded-pill fw-bold px-5 py-3 mb-1 aos-init aos-animate" data-aos="fade-up">Add Address 
                  </a>
                  <h4 class="f-600 mb-0">Address</h4>
                </span>
            </div>

            <div class="col-lg-12 mb-5">
                <div class="bg-chat p-3 br-12">
                    <div class="d-flex justify-content-center flex-wrap">
                        <div class="custom-form-group-search  position-relative col-12 ">
                        	<form class="d-flex" method="get" action="{{ route('buyerAddress') }}">
	                            <input type="text" class="form-control mw-100" placeholder="Search Address" name="search">
	                            <button type="submit" class="border-0"><i class="fas fa-search text--primary"></i></button>
                          </form>
                        </div>
                        
                    </div>
                </div>
            </div>

            @if(count($address) > 0)
            <div class="col-lg-12">
              <div class="table-responsive">
                <table class="table table-borderless">
                  <thead class="bg-chat">
                    <tr>
                      <th scope="col" class="fw-normal py-3">Sr No.</th>
                      <th scope="col" class="fw-normal py-3">City</th>
                      <th scope="col" class="fw-normal py-3">State</th>
                      <th scope="col" class="fw-normal py-3">Country</th>
                      <th scope="col" class="fw-normal py-3">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
                  	@foreach($address as $key => $addrs)
                    <tr>
                      <th scope="row" class="py-3 align-middle f-400">{{ $key + 1  }}</th>
                      <th scope="row" class="py-3 align-middle f-400">{{ $addrs['city']}}</th>
                      <td class="py-3 align-middle">{{ $addrs['state'] }}</td>
                      <td class="py-3 align-middle ">{{ $addrs['country'] }}</td>
                      <td>
                      	<div class="d-flex align-items-center">
                          <a class="text-decoration-none text-dark me-2" href="{{ route('buyerEditAddress', \Illuminate\Support\Facades\Crypt::encrypt($addrs['id'])) }}">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21.746 2.87692L19.1229 0.253846C18.7845 -0.0846154 18.2768 -0.0846154 17.9383 0.253846L16.3306 1.86154L10.0691 8.12308C9.98447 8.20769 9.98447 8.29231 9.89986 8.37692C9.89986 8.37692 9.89986 8.37692 9.89986 8.46154L8.54601 12.4385C8.4614 12.7769 8.54601 13.1154 8.71524 13.2846C8.88447 13.4538 9.0537 13.5385 9.30755 13.5385C9.39217 13.5385 9.47678 13.5385 9.5614 13.4538L13.5383 12.1C13.5383 12.1 13.5383 12.1 13.6229 12.1C13.7076 12.1 13.7922 12.0154 13.8768 11.9308L21.746 4.06154C22.0845 3.72308 22.0845 3.21538 21.746 2.87692ZM19.9691 3.46923L19.546 3.89231L18.1076 2.45385L18.5306 2.03077L19.9691 3.46923ZM13.2845 10.1538L12.6076 9.47692L11.846 8.71538L16.9229 3.63846L18.3614 5.07692L13.2845 10.1538ZM10.6614 11.3385L10.9999 10.3231L11.6768 11L10.6614 11.3385Z" fill="black"></path>
                                <path d="M17.7692 11.8463C17.2615 11.8463 16.9231 12.1848 16.9231 12.6925V18.6155C16.9231 19.5463 16.1615 20.3078 15.2308 20.3078H3.38462C2.45385 20.3078 1.69231 19.5463 1.69231 18.6155V6.76938C1.69231 5.83861 2.45385 5.07707 3.38462 5.07707H9.30769C9.81538 5.07707 10.1538 4.73861 10.1538 4.23092C10.1538 3.72323 9.81538 3.38477 9.30769 3.38477H3.38462C1.52308 3.38477 0 4.90784 0 6.76938V18.6155C0 20.4771 1.52308 22.0002 3.38462 22.0002H15.2308C17.0923 22.0002 18.6154 20.4771 18.6154 18.6155V12.6925C18.6154 12.1848 18.2769 11.8463 17.7692 11.8463Z" fill="black"></path>
                              </svg>
                          </a>

                          <a class="text-decoration-none text-dark fs-5" href="{{ route('buyerDeleteAddress',  \Illuminate\Support\Facades\Crypt::encrypt($addrs['id'])) }}"><i class="fas fa-trash-alt"></i></a>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                    
                   
                    
                  </tbody>
                </table>
              </div>
             
            </div>
            @else
            <section class="p-0 vh-80 d-flex justify-content-center">
			    <div class="d-flex justify-content-center align-items-center">
			      <div class="text-center">
			        <img class="img-fluid" src="../assets/images/no-data.png" alt="">
			        <h2 class="fw-bold mb-3">No Data Here.</h2>
			        <!-- <p class="text-muted">Go make an awesome <a href="#" class="text-decoration-none text-red-2 f-600">Profile</a>. This place should be as busy as <a href="#" class=" text-red-2 f-600">Ringroad</a> very soon.</p> -->
			      </div>
			    </div>
			  </section>
            @endif
        </div>
    </div>
  </section>
@endsection