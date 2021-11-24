@extends('layouts.admin')
@section('title','Pages List')
@section('content')

<section class="admin-body">
  <div class="container">
    <div class="row">
  
      <div class="col-lg-12 mt-3">
        <div class="card border-0 shadow-sm br-10">
          <div class="card-body">
            <div class="d-flex justify-content-between flex-wrap mb-3">
              <div class="d-flex align-items-center flex-wrap">
                <h4 class="mb-0 me-4">Page List</h4>
                
              </div>

              <div class="col-lg-2 text-start text-sm-end">
                <button type="button" class="btn btn--primary">
                  <a href="{{ route('admin.page.create') }}" style="text-decoration:none;"><span class="text-white d-flex align-items-center"
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
                      New Page</span
                    ></a>
                  </button>
              </div>
              
            </div>
            
            <div class="table-responsivessss">
              <table id="pageTable" class="display product-table" style="width:100%">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>TITLE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                  @if(count($pages) > 0)
                    @foreach($pages as $key => $product)
                    <tr>
                        <td>
                          {{ $key + 1 }}
                        </td>
                        <td>
                          <div class="d-flex align-items-center">
                            <span class="text-dark-admin text-truncate product-list-text">{{ $product['title'] }}</span>
                          </div>
                        </td>
                        <td>
                          <a href="{{ route('admin.page.edit', \Illuminate\Support\Facades\Crypt::encrypt($product['id'])) }}">Edit</a>
                          <!-- <a href="{{ route('admin.page.show', \Illuminate\Support\Facades\Crypt::encrypt($product['id'])) }}">Show</a> -->
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

@section('scripts')
  <script type="text/javascript">
    $('#pageTable').DataTable();
  </script>
@endsection