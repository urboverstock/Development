@extends('layouts.master')
@if(isset($userPost))
@section('title','Edit User Post')
@else
@section('title','Add User Post')
@endif


@section('styles')
  <style type="text/css">
  #result div, .result div {
    width: 200px;
    padding: 5px;
    float: left;
}
  #result div img, .result div img{
    width: 100%;
  }

  .error{
    color: red;
  }

  .uppy-Dashboard-files{
    display: flex;
  }
</style>
@endsection

@section('content')


<section class="mt-90 ">
  <div class="container">
    @if(!isset($userPost))
    <form method="post" action="{{ route('sellerStoreUserPost') }}" enctype="multipart/form-data" id="add_user_post_form">
      @else
      <form method="post" action="{{ route('sellerUpdateUserPost') }}" enctype="multipart/form-data" id="add_user_post_form">
        <input type="hidden" name="id" value="{{ $userPost->id }}">
        @endif
        {{ csrf_field() }}
        <div class="row">
          <div class="col-lg-12">
            

            <h3 class="mt-5 mb-4 fw-bold ">{{ isset($userPost) ? 'Edit Post' : 'Add Post' }}</h3>
          </div>
          <div class="col-lg-8">
            <div class="card border-0 mb-5 shadow br-16">
              <div class="card-body">
                <div class="mb-4">
                  <label for="exampleFormControlInput1" class="form-label">Title</label>
                  <div class="custom-urban-form">
                    <input class="form-control" type="text" placeholder="Name" name="title" value="{{ @$userPost->title ?: old('title') }}">
                    <i class="fas fa-pen input-icon"></i>
                  </div>
                  <span class="error">{{ $errors->first('title') }}</span>
                </div>

                <div class="mb-4">
                  <label for="exampleFormControlTextarea1" class="form-label ">Description</label>
                  <div class="custom-urban-form">
                    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Description" rows="5" name="description">{{ @$userPost->description ?: old('description') }}</textarea>
                    <i class="fas fa-pen textarea-icon"></i>
                  </div>
                  <span class="error">{{ $errors->first('description') }}</span>
                </div>

                <div class="card border-0 mb-5 shadow br-16">
                  <div class="card-body">
                    <h3 class="mb-4 fw-bold ">Media</h3>

                    <label for="urbanFile" class="border-dashed-gray cursor-pointer br-8 p-5 d-flex flex-column justify-content-center align-items-center">
                      <!-- <div class="bg--primary p-3 d-inline-flex rounded-circle mb-3">

                        <i class="fas fa-plus fs-3 text-white"></i>
                      </div>
                      <input type="file" class="urbanUploadFileProduct" name="file[]" id="urbanFile" accept="image/*" multiple="">
                      <label for="urbanFile" class="btn btn-outline-primary px-5 py-3 br-8 mb-2"><span class="text-dark f-600">Add Image</span></label>

                      <output id="result" /> -->

                      <div id="drag-drop-area" class="w-100"></div>
                      <div class="urbon-files"></div>
                    </label>

                      @if(@$userPost->getUserPostFile)
                        @foreach($userPost->getUserPostFile as $key => $image)

                        <?php 
                          $ext = pathinfo($image, PATHINFO_EXTENSION);
                        ?>

                        
                          <div class="result">
                            <div>
                              <a href="{{ route('sellerDeleteUserPostFile', \Illuminate\Support\Facades\Crypt::encrypt( $image->id)) }}"><i class="fas fa-trash-alt"></i>

                              <?php 
                                $ext = pathinfo($image->file, PATHINFO_EXTENSION);
                              ?>

                              <?php 
                                if ($ext == "mp4" || $ext == "mov" || $ext == "vob" || $ext == "mpeg" || $ext == "3gp" || $ext == "avi" || $ext == "wmv" || $ext == "mov" || $ext == "amv" || $ext == "svi" || $ext == "flv" || $ext == "mkv" || $ext == "webm" || $ext == "gif" || $ext == "asf") {
                              ?>

                                <video controls autoplay style="width: 200px;vertical-align: middle;">
                                  <source src="{{url('/') . $image->file}}" type="video/ogg">
                                  <source src="{{url('/') . $image->file}}" type="video/{{ $ext }}">
                                </video>
                              <?php } else { ?>
                            <img src="{{ asset('/') .$image->file }}" width="100" style="float: left;"></a>
                          <?php } ?>
                          </div>
                          </div>
                        @endforeach
                      @endif
                  </div>
                  <span class="error">{{ $errors->first('image') }} </span>
                </div>

                <div class="col-lg-12">
                  <button type="submit" class="btn btn-dark px-5 py-3 rounded-pill">Save</button>
                </div>

              </div>
            </div>                  
          </div>
          <div class="col-lg-4">
            <div class="card border-0 mb-5 shadow br-16">
              <img class="w-100 h-100"  src="{{ asset('assets/images/edit-seller-form-right.png') }}" alt="">
            </div>                  
          </div>              
        </div>
      </form>
    </div>
  </section>



  @endsection

  @section('scripts')

  <script>
  var uppy = Uppy.Core()
    .use(Uppy.Dashboard, {
      inline: true,
      target: '#drag-drop-area'
    })
    .use(Uppy.Tus, {endpoint: 'https://master.tus.io/files/'}) //you can put upload URL here, where you want to upload images
  uppy.on('complete', (result) => {

      $.each(result.successful, function (key, val) {
          // alert(key + val.uploadURL);
          $('.urbon-files').append("<input type='hidden' value='"+val.uploadURL+"' name='image[]'>");
      });

    console.log('Upload complete! We’ve uploaded these files:', result.successful)
  })
</script>

  <script>
      //Preview Mutliple Images
  window.onload = function(){
        
        //Check File API support
        if(window.File && window.FileList && window.FileReader)
        {
            var filesInput = document.getElementById("urbanFile");
            
            filesInput.addEventListener("change", function(event){     

                var fileSize = filesInput.files[0];
                var sizeInMb = fileSize.size/1024;
                var sizeLimit= 1024*2;
                if (sizeInMb > sizeLimit) {
                  alert('please upload image less than 2MB');
                  $(this).val('');
                }else {

                  var files = event.target.files; //FileList object
                  var output = document.getElementById("result");
                  
                  for(var i = 0; i< files.length; i++)
                  {
                      var file = files[i];
                      
                      //Only pics
                      if(file.type.match('image'))
                      {
                      
                        var picReader = new FileReader();
                        
                        picReader.addEventListener("load",function(event){
                            
                            var picFile = event.target;
                            
                            var div = document.createElement("div");
                            
                            div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                                    "title='" + picFile.name + "'/>";
                            
                            output.insertBefore(div,null);            
                        
                        });
                        
                        //Read the image
                        picReader.readAsDataURL(file);
                      }

                      else
                      {
                        var fileReader = new FileReader();
                        // var files = event.target.files;
                        // var file = files[i];

                        fileReader.onload = function() {
                        var blob = new Blob([fileReader.result], {type: file.type});
                        var url = URL.createObjectURL(blob);
                        var video = document.createElement('video');
                        var timeupdate = function() {
                          if (snapImage()) {
                            video.removeEventListener('timeupdate', timeupdate);
                            video.pause();
                          }
                        };
                        video.addEventListener('loadeddata', function() {
                          if (snapImage()) {
                            video.removeEventListener('timeupdate', timeupdate);
                          }
                        });
                        var snapImage = function() {
                          var canvas = document.createElement('canvas');
                          canvas.width = video.videoWidth;
                          canvas.height = video.videoHeight;
                          canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                          var image = canvas.toDataURL();
                          var success = image.length > 100000;
                          if (success) {
                            var img = document.createElement('img');
                            img.src = image;
                            var div = document.createElement("div");
                            div.innerHTML = "<img class='thumbnail' src='" + img.src + "'/>";
                            output.insertBefore(div, null);
                            // URL.revokeObjectURL(url);
                          }
                            // fileReader.readAsArrayBuffer(file);
                          return success;
                        };
                        video.addEventListener('timeupdate', timeupdate);
                        video.preload = 'metadata';
                        video.src = url;
                        // Load video in Safari / IE11
                        video.muted = true;
                        video.playsInline = true;
                        video.play();
                      };
                      fileReader.readAsArrayBuffer(file);
                      }
                  }

                }                              
               
            });
        }
        else
        {
            console.log("Your browser does not support File API");
        }
    }
  </script>

  @stop