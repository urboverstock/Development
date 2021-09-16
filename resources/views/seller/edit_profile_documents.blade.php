@extends('layouts.master')
@section('title','Edit Profile Documents')
@section('content')

<div class="mt-96 inner-profile-header bg-edit-buyer-profile  pb-3 ">
  <img class="logged-wave-img position-absolute" src="{{ $user->profile_img }}" alt="" style="display:none;">
  <div class="header-big-avatar d-inline-flex mb-lg-0 mb-4">
      <img class="rounded-circle" data-aos="zoom-in-up" src="{{ $user->profile_img }}" alt="" style="max-width:300px; height: 300px;">
  </div>
  
  <div class="inner-profile-header-content --ver-2">
      <h1 class="display-5 f-600 me-3">{{ $user->full_name }}</h1>

        @if(!empty($user->about))
          <h6 class="f-600 mb-2">Bio : {{ $user->about }}</h6>
        @endif

        <div class="small-line mb-2"></div>
        <p class="text-15 f-600">Member Since - {{ date('d M, Y', strtotime($user->created_at)) }}</p>
  </div>
</div>
<section class="bg-edit-buyer-profile">
  <div class="container">
    <form method="post" action="" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
          <div class="col-lg-12">
            <div class="card br-24 border-0 shadow h-100">
              <div class="card-header bg-transparent py-4">
                <div class="d-flex flex-wrap justify-content-between">
                  <h3 class="mb-0 fw-bold py-4 px-md-5 px-0">Verification Details</h3>
                  <h3 class="mb-0 fw-bold py-4 px-md-5 px-0">2/2</h3>
                </div>
              </div>
              <div class="card-body px-md-5 px-3">
                <h4 class="mt-5 mb-5 f-600">Submit your KYC Documents</h4>
                <div class="row">
                  <div class="col-lg-6 mb-4">
                    <div>
                      <div class="border-primary-1 d-flex flex-wrap align-items-start br-5 ps-4 py-18 mb-4 col-lg-11">
                          <img class="img-fluid me-4" src="{{ asset('assets/images/icon/id.png') }}" alt="">
                          <p class="text-16 col-lg-8">International passport , Intercontinental travel Licence.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                    <div class="d-flex justify-content-end">
                      @if(!empty($doc_1))
                        <div class="show_doc_name">
                          <div class="d-flex align-items-center">
                            <h6 class="text-16 mb-0 fw-bold me-2">{{ $doc_1->doc_original_name }}</h6>
                            <a href="javascript:;" class="text-decoration-none text-dark " >
                              <img src="{{ asset('assets/images/icon/close.png') }}" class="remove_doc_btn" doc="doc_1" alt="">
                            </a>
                          </div>
                          @if($doc_1->verified == '1')
                            <p class="text-14 text-green">Verified</p>
                          @else
                            <p class="text-14 text-muted">Awaiting Verification</p>
                          @endif
                        </div>
                      @else
                        <input type="file" name="doc_1" class="doc_btn">
                      @endif
                    </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                    <div>
                      <div class="border-primary-1 d-flex flex-wrap align-items-start br-5 ps-4 py-18 mb-4 col-lg-11">
                          <img class="img-fluid me-4" src="{{ asset('assets/images/icon/id-2.png') }}" alt="">
                          <p class="text-16 col-lg-8">National Identification card.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                    <div class="d-flex justify-content-end">
                      @if(!empty($doc_2))
                        <div class="show_doc_name">
                          <div class="d-flex align-items-center">
                            <h6 class="text-16 mb-0 fw-bold me-2">{{ $doc_2->doc_original_name }}</h6>
                            <a href="javascript:;" class="text-decoration-none text-dark " >
                              <img src="{{ asset('assets/images/icon/close.png') }}" class="remove_doc_btn" doc="doc_2" alt="">
                            </a>
                          </div>
                          @if($doc_2->verified == '1')
                            <p class="text-14 text-green">Verified</p>
                          @else
                            <p class="text-14 text-muted">Awaiting Verification</p>
                          @endif
                        </div>
                      @else
                        <input type="file" name="doc_2" class="doc_btn">
                      @endif
                    </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                    <div>
                      <div class="border-primary-1 d-flex flex-wrap align-items-start br-5 ps-4 py-18 mb-4 col-lg-11">
                          <img class="img-fluid me-4" src="{{ asset('assets/images/icon/id-3.png') }}" alt="">
                          <p class="text-16 col-lg-8">Identity Card, Passport of Driving Licence for the UK, USA or Canada.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                    <div class="d-flex justify-content-end">
                      <!-- <button type="button" class="btn border br-8">upload document</button> -->
                      @if(!empty($doc_3))
                        <div class="show_doc_name">
                          <div class="d-flex align-items-center">
                            <h6 class="text-16 mb-0 fw-bold me-2">{{ $doc_3->doc_original_name }}</h6>
                            <a href="javascript:;" class="text-decoration-none text-dark " >
                              <img src="{{ asset('assets/images/icon/close.png') }}" class="remove_doc_btn" doc="doc_3" alt="">
                            </a>
                          </div>
                          @if($doc_3->verified == '1')
                            <p class="text-14 text-green">Verified</p>
                          @else
                            <p class="text-14 text-muted">Awaiting Verification</p>
                          @endif
                        </div>
                      @else
                        <input type="file" name="doc_3" class="doc_btn">
                      @endif
                    </div>
                  </div>
                  <div class="col-12 mb-5">
                    <button type="submit" class="btn btn-dark px-5 py-2 rounded-pill">Done</button>
                  </div>
                </div>
              </div>
            </div>
          </div>  
      </div>
    </form>
  </div>
</section>

@endsection
@section('scripts')

<script>
  $(document).on('change', ".doc_btn", function() {
    var filepath = this.value;
    var m = filepath.match(/([^\/\\]+)$/);
    var filename = m[1];

    if(filename != '' && filename != null)
    {
      var img_arr = filename.split('.');
      var ext = img_arr.pop();
      ext = ext.toLowerCase();

      if(ext != 'jpeg' && ext != 'jpg' && ext != 'png' && ext != 'doc' && ext != 'docx' && ext != 'pdf')
      {
        $(this).val('');
        alert("Please select .png, .jpg, .jpeg, .doc, .docx or .pdf file");
      }
    }
  });

  $(document).on('click', '.remove_doc_btn', function(){
    var doc_name = $(this).attr('doc');
    $(this).closest('.show_doc_name').html('<input type="file" name="'+doc_name+'" class="doc_btn">');
  });
</script>

@stop