@extends('layouts.master')
@section('title','Product Wishlist')

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
                <div class="bg-chat p-3">
                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="custom-form-group-search position-relative col-lg-8 d-lg-block d-none ">
                        	<form method="get" action="{{ route('sellerOfferListing', $productId) }}">
	                            <input type="text" class="form-control" placeholder="Search Orders" name="search">
	                            <button type="submit"><i class="fas fa-search text--primary"></i></button>
                            </form>
                        </div>                        
                    </div>
                </div>
            </div>

            @if(count($offers) > 0)
            <div class="col-lg-12">
              <div class="table-responsive">
                <table class="table table-borderless">
                  <thead class="bg-chat">
                    <tr>
                      <th scope="col" class="fw-normal py-3">Sr No.</th>
                      <th scope="col" class="fw-normal py-3">User Name</th>
                      <th scope="col" class="fw-normal py-3">Product Name</th>
                      <th scope="col" class="fw-normal py-3">Offer (Percentage)</th>
                      <th scope="col" class="fw-normal py-3">Any Description</th>
                      <th scope="col" class="fw-normal py-3">Created At</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
                  	@foreach($offers as $key => $offer)
                    <tr>
                      <th scope="row" class="py-3 align-middle f-400">{{ $key + 1  }}</th>
                      <th scope="row" class="py-3 align-middle f-400">{{ $offer['user']['full_name']}}</th>
                      <td class="py-3 align-middle">{{ $offer['get_product_details']['name'] }}</td>
                      <td class="py-3 align-middle">{{ $offer['offer_percentage'] }}</td>
                      <td class="py-3 align-middle">{{ $offer['description'] }}</td>
                      <td class="py-3 align-middle">{{ date('d M, Y', strtotime($offer['created_at']) ) }}</td>
                      
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

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Send Offer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                <div class="modal-body">
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
        </div>

  </section>
@endsection


@section('scripts')
  
@stop