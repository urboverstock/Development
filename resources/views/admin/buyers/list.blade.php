@extends('layouts.admin')
@section('title','Buyer List')
@section('content')

<section class="admin-body">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 mt-3">
      
        <div class="card border-0 shadow-sm br-10">
          <div class="card-body">
            <div class="d-flex justify-content-between flex-wrap mb-3">
              <div class="d-flex align-items-center flex-wrap">
                <h4 class="mb-0 me-4">Buyer List</h4>
                
              </div>
              
            </div>
            <div class="table-responsivessss">
              <table id="myTable" class="display product-table" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">
                          <input id="MyTableCheckAllButton" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </th>
                        <th>
                          <label class="form-check-label fw-normal text-muted" for="flexCheckDefault">
                            Name
                          </label>
                        </th>
                        <th class="fw-normal">Email</th>
                        <th class="fw-normal">Phone number</th>
                        <th class="fw-normal">Gender</th>
                        <th class="fw-normal">Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($buyers) > 0)
                    @foreach($buyers as $key => $buyer)
                    <tr>
                        <td>
                          
                        </td>
                        <td>
                          <div class="d-flex align-items-center">
                            <img class="avatar-sm br-10 me-2" src="../assets/images/admin-dashboard/64.png" alt="">
                            <span class="text-dark-admin text-truncate product-list-text">{{ $buyer['first_name'] }} {{ $buyer['last_name'] }}</span>
                          </div>
                        </td>
                        <td>{{ $buyer['email'] }}</td>
                        <td>{{ $buyer['phone_number'] }}</td>
                        <td>{{ $buyer['gender'] == '1' ? 'Male' : 'Female' }}</td>
                        <td>{{ $buyer['status'] == 1 ? 'Active' : 'Inactive' }}</td>
                        <td>
                          
                          @if($buyer['status'] == 1)
                            <a class="me-2 btn btn-sm btn--primary text-decoration-none" href="{{route('admin.buyer.status',[base64_encode($buyer['id']), base64_encode(0)])}}" onClick="return confirm('Are you sure you want to deactivate this user?')">
                              Deactivate
                            </a>
                          @else
                            <a class="me-2 btn btn-sm btn--primary text-decoration-none" href="{{route('admin.buyer.status',[base64_encode($buyer['id']), base64_encode(1)])}}" onClick="return confirm('Are you sure you want to activate this user?')">
                              Activate
                            </a>
                          @endif
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