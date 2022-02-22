@extends('layouts.admin')
@section('title','Advertisements List')
@section('content')

<section class="admin-body">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 mt-3">
    
        <div class="card border-0 shadow-sm br-10">
          <div class="card-body">
            
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
                        <th class="fw-normal">Banner</th>
                        <th class="fw-normal">Description</th>
                        <th class="fw-normal">Created At</th>
                        <th class="fw-normal">Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($advertisements) > 0)
                    @foreach($advertisements as $key => $advertisement)
                    <tr>
                        <td>
                          
                        </td>
                        <td>
                          <div class="d-flex align-items-center">
                            <span class="text-dark-admin text-truncate product-list-text">{{ $advertisement['get_user_detail']['first_name'] }} {{ $advertisement['get_user_detail']['last_name'] }}</span>
                          </div>
                        </td>
                        <td scope="row" class="py-3 align-middle f-400"><img class="avatar" src="{{ url('/') . $advertisement['banner'] }}" class="img-fluid" width="200"></td>
                        <td>{{ $advertisement['description'] }}</td>
                        <td>{{ date('d M, Y', strtotime($advertisement['created_at']) ) }}</td>
                        <td>{{ $advertisement['status'] == 1 ? 'Active' : 'Inactive' }}</td>
                        <td>
                          
                            @if($advertisement['status'] == 1)
                    
                                  <a class="btn btn--primary " href="{{route('admin.advertisement.status',[base64_encode($advertisement['id']), base64_encode(0)])}}" onClick="return confirm('Are you sure you want to deactivate this advertisements?')">Deactivate</a>
                            
                              @else
                                  <a class="btn btn--primary " href="{{route('admin.advertisement.status',[base64_encode($advertisement['id']), base64_encode(1)])}}" onClick="return confirm('Are you sure you want to activate this advertisements?')">Activate</a>
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