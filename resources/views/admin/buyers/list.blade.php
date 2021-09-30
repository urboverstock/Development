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
                          <div class="dropdown admin-btn-dropdown">
                            <button
                              class="btn"
                              type="button"
                              id="dropdownMenuButton1"
                              data-bs-toggle="dropdown"
                              aria-expanded="false"
                            >
                              <svg
                                width="20"
                                height="5"
                                viewBox="0 0 20 5"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <path
                                  fill-rule="evenodd"
                                  clip-rule="evenodd"
                                  d="M2.72053 0.64153C3.89903 0.64153 4.85439 1.59689 4.85439 2.77539C4.85439 3.95389 3.89903 4.90925 2.72053 4.90925C1.54203 4.90925 0.58667 3.95389 0.58667 2.77539C0.58667 1.59689 1.54203 0.64153 2.72053 0.64153ZM10.1887 0.641555C11.3672 0.641555 12.3226 1.59692 12.3226 2.77541C12.3226 3.95391 11.3672 4.90927 10.1887 4.90927C9.01023 4.90927 8.05487 3.95391 8.05487 2.77541C8.05487 1.59692 9.01023 0.641555 10.1887 0.641555ZM19.7911 2.77541C19.7911 1.59692 18.8357 0.641555 17.6572 0.641555C16.4787 0.641555 15.5234 1.59692 15.5234 2.77541C15.5234 3.95391 16.4787 4.90927 17.6572 4.90927C18.8357 4.90927 19.7911 3.95391 19.7911 2.77541Z"
                                  fill="#92929D"
                                />
                              </svg>
                            </button>
                            <ul
                              class="
                                dropdown-menu
                                border-0
                                br-10
                                table-dropdown
                              "
                              aria-labelledby="dropdownMenuButton1"
                            >
                              <!--li>
                                <a class="dropdown-item" href="#">
                                  <svg
                                    width="12"
                                    height="12"
                                    viewBox="0 0 12 12"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                  >
                                    <path
                                      fill-rule="evenodd"
                                      clip-rule="evenodd"
                                      d="M5.99999 9.63075L3.02528 11.1838C2.59709 11.4073 2.09828 11.0434 2.18049 10.5674L2.74768 7.28342L0.344274 4.95697C-0.00398681 4.61986 0.186951 4.0297 0.666677 3.96048L3.99146 3.48072L5.47761 0.490391C5.69212 0.0587652 6.30785 0.0587652 6.52237 0.490391L8.00851 3.48072L11.3333 3.96048C11.813 4.0297 12.004 4.61986 11.6557 4.95697L9.2523 7.28342L9.81949 10.5674C9.9017 11.0434 9.40289 11.4073 8.9747 11.1838L5.99999 9.63075ZM5.73002 8.4556C5.89917 8.36729 6.10081 8.36729 6.26996 8.4556L8.46911 9.60373L8.05017 7.17807C8.01733 6.98793 8.08063 6.79385 8.21927 6.65965L9.9902 4.94543L7.53902 4.59172C7.34936 4.56436 7.18523 4.44558 7.09995 4.27398L5.99999 2.06071L4.90003 4.27398C4.81474 4.44558 4.65062 4.56436 4.46096 4.59172L2.00977 4.94543L3.7807 6.65965C3.91934 6.79385 3.98265 6.98793 3.94981 7.17807L3.53087 9.60373L5.73002 8.4556Z"
                                      fill="currentColor"
                                    />
                                  </svg>

                                  Wishlist this Product</a
                                >
                              </li-->
                              @if($buyer['status'] == 1)
                                <li>
                                  <a class="dropdown-item" href="{{route('admin.buyer.status',[base64_encode($buyer['id']), base64_encode(0)])}}" onClick="return confirm('Are you sure you want to deactivate this user?')">Deactivate</a>
                                </li>
                              @else
                                <li><a class="dropdown-item" href="{{route('admin.buyer.status',[base64_encode($buyer['id']), base64_encode(1)])}}" onClick="return confirm('Are you sure you want to activate this user?')">Activate</a></li>
                              @endif
                            </ul>
                          </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>No data
                    </tr>
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