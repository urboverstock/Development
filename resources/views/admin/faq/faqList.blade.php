@extends('layouts.admin')
@section('title','Faq List')
@section('content')
<section class="admin-body">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 mt-3">
        <div class="card border-0 shadow-sm br-10">
          <div class="card-body">
            <div class="d-flex justify-content-between flex-wrap mb-3">
              <div class="d-flex align-items-center flex-wrap">
                <h4 class="mb-0 me-4">FAQ List</h4>
                
              </div>
              <div class="col-lg-2 text-start text-sm-end">
                  <button type="button" class="btn btn--primary">
                    <a href="{{route('adminAddFaq')}}" style="text-decoration:none;"><span class="text-white d-flex align-items-center"
                        ><svg
                          width="14"
                          class="me-2"
                          height="14"
                          viewBox="0 0 18 18"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M10 8H17C17.5523 8 18 8.44771 18 9C18 9.55229 17.5523 10 17 10H10V17C10 17.5523 9.55229 18 9 18C8.44771 18 8 17.5523 8 17V10H1C0.447715 10 0 9.55229 0 9C0 8.44771 0.447715 8 1 8H8V1C8 0.447715 8.44771 0 9 0C9.55229 0 10 0.447715 10 1V8Z"
                            fill="white"
                          />
                        </svg>
                        New Faq</span
                      ></a>
                    </button>
                </div>
            </div>
            <div class="table-responsivessss">
              <table id="myTable" class="display product-table" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">
                          <input id="MyTableCheckAllButton" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </th>
                        <th class="fw-normal">Sr No.</th>
                        <th class="fw-normal">Question</th>
                        <th class="fw-normal">Answer</th>
                        <th class="fw-normal">Action</th>
                        <!--th></th-->
                    </tr>
                </thead>
                <tbody>
                  @if(count($faqs) > 0)
                    @foreach($faqs as $key => $faq)
                    <tr>
                        <td>
                          
                        </td>
                        <td class="py-3 align-middle">{{ $key + 1  }}</td>
                        <td class="py-3 align-middle">{{ $faq['question']}}</td>
                        <td class="py-3 align-middle">{{ $faq['answer'] }}</td>
                        <td class="py-3 align-middle">
                          <div class="d-flex align-items-center">
                            <a class="text-decoration-none text-dark me-2" href="{{ route('adminEditFaq', \Illuminate\Support\Facades\Crypt::encrypt($faq['id'])) }}">
                              <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M21.746 2.87692L19.1229 0.253846C18.7845 -0.0846154 18.2768 -0.0846154 17.9383 0.253846L16.3306 1.86154L10.0691 8.12308C9.98447 8.20769 9.98447 8.29231 9.89986 8.37692C9.89986 8.37692 9.89986 8.37692 9.89986 8.46154L8.54601 12.4385C8.4614 12.7769 8.54601 13.1154 8.71524 13.2846C8.88447 13.4538 9.0537 13.5385 9.30755 13.5385C9.39217 13.5385 9.47678 13.5385 9.5614 13.4538L13.5383 12.1C13.5383 12.1 13.5383 12.1 13.6229 12.1C13.7076 12.1 13.7922 12.0154 13.8768 11.9308L21.746 4.06154C22.0845 3.72308 22.0845 3.21538 21.746 2.87692ZM19.9691 3.46923L19.546 3.89231L18.1076 2.45385L18.5306 2.03077L19.9691 3.46923ZM13.2845 10.1538L12.6076 9.47692L11.846 8.71538L16.9229 3.63846L18.3614 5.07692L13.2845 10.1538ZM10.6614 11.3385L10.9999 10.3231L11.6768 11L10.6614 11.3385Z" fill="black"></path>
                                  <path d="M17.7692 11.8463C17.2615 11.8463 16.9231 12.1848 16.9231 12.6925V18.6155C16.9231 19.5463 16.1615 20.3078 15.2308 20.3078H3.38462C2.45385 20.3078 1.69231 19.5463 1.69231 18.6155V6.76938C1.69231 5.83861 2.45385 5.07707 3.38462 5.07707H9.30769C9.81538 5.07707 10.1538 4.73861 10.1538 4.23092C10.1538 3.72323 9.81538 3.38477 9.30769 3.38477H3.38462C1.52308 3.38477 0 4.90784 0 6.76938V18.6155C0 20.4771 1.52308 22.0002 3.38462 22.0002H15.2308C17.0923 22.0002 18.6154 20.4771 18.6154 18.6155V12.6925C18.6154 12.1848 18.2769 11.8463 17.7692 11.8463Z" fill="black"></path>
                                </svg>
                            </a>

                            <a class="text-decoration-none text-dark fs-5" href="{{ route('adminDeleteFaq',  \Illuminate\Support\Facades\Crypt::encrypt($faq['id'])) }}"><i class="fas fa-trash-alt"></i></a>
                          </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr><td class="py-3 align-middle"><div>No Records</div></td></tr>
                    @endif
                    
                </tbody>
                
            </table>
            </div>
            
          </div>
          
        </div>
      </div>
    </div>
  </div>
</section>
@endsection