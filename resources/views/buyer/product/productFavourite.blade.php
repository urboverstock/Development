@extends('layouts.buyer')
@section('title','Product Favourite')

@section('styles')
  <style type="text/css">
    .productSuggestionModal{
      cursor: pointer;
    }
  </style>
@endsection

@section('content')
	<section class="mt-90">
    <div class="container mt-5">
        <div class="row">

            <div class="col-lg-12 mb-5">
                <div class="bg-chat p-3 br-12">
                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="custom-form-group-search  position-relative col-12 ">
                        	<form class="d-flex" method="get" action="{{ route('buyerFavouriteProduct') }}">
	                            <input type="text" class="form-control mw-100" placeholder="Search Favourite" name="search">
	                            <button type="submit" class="border-0"><i class="fas fa-search text--primary"></i></button>
                          </form>
                        </div>
                    </div>
                </div>
            </div>

            @if(count($favourites) > 0)
            <div class="col-lg-12">
              <div class="table-responsive">
                <table class="table table-borderless">
                  <thead class="bg-chat">
                    <tr>
                      <th scope="col" class="fw-normal py-3">Sr No.</th>
                      <th scope="col" class="fw-normal py-3">User Name</th>
                      <th scope="col" class="fw-normal py-3">Product Name</th>
                      <th scope="col" class="fw-normal py-3">Date</th>
                      <th scope="col" class="fw-normal py-3">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
                  	@foreach($favourites as $key => $favourite)
                    <tr>
                      <th scope="row" class="py-3 align-middle f-400">{{ $key + 1  }}</th>
                      <th scope="row" class="py-3 align-middle f-400">{{ $favourite['get_user_detail']['full_name']}}</th>
                      <td class="py-3 align-middle">{{ $favourite['get_product_detail']['name'] }}</td>
                      <td class="py-3 align-middle">{{ date('d M, Y', strtotime($favourite['created_at']) ) }}</td>
                      <td class="py-3 align-middle">
                      <a class="text-decoration-none text-dark fs-5" href="{{ route('buyerDeleteFavourite',  \Illuminate\Support\Facades\Crypt::encrypt($favourite['id'])) }}"><i class="fas fa-trash-alt"></i></a>
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