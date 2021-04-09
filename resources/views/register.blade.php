<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   @include('includes.title')
  <!-- <link rel="shortcut icon" href="favicon.png" type="image/png"> -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('assets/stylesheet/css/sessions.min.css') }}">
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
</head>
<body>
  
  <section class="us-session-form min-vh-100 d-flex justify-content-center align-items-center position-relative">
   
    <div class="container-lg ">
      <div class="row align-items-center">
        <div class="col-lg-4 offset-lg-1">
          <img class="img-fluid my-4" src="{{ asset('assets/images/logo.png') }}" alt="">
        </div>
        <div class="col-lg-1">
          <img class="d-none d-lg-block" src="{{ asset('assets/images/line2.png') }}" alt="">
        </div>
        <div class="col-lg-5">
          
          <div class="row">
            <div class="col-lg-6">
              <input class="form-control form-control-lg mb-4 py-3" type="text" placeholder="First Name" aria-label="">
            </div>
            <div class="col-lg-6">
              <input class="form-control form-control-lg mb-4 py-3" type="text" placeholder="Last Name" aria-label="">
            </div>
            <div class="col-lg-12">
              <input class="form-control form-control-lg mb-4 py-3" type="password" placeholder="Password" aria-label="">
            </div>
            <div class="col-lg-12">
              <input class="form-control form-control-lg mb-4 py-3" type="password" placeholder="Confirm Password" aria-label="">
            </div>
            
            <div class="col-lg-12">
                <select class="form-select mb-4 py-3 form-select-lg mb-3" aria-label=".form-select-lg example">
                   <option selected>Select location</option>
                   <option value="1">One</option>
                   <option value="2">Two</option>
                   <option value="3">Three</option>
                </select>
            </div>
            <div class="col-lg-12">
                <select class="form-select mb-4 py-3 form-select-lg mb-3" aria-label=".form-select-lg example">
                   <option class="us-selected" >Select Gender</option>
                   <option value="1">Male</option>
                   <option value="2">Female</option>
                   <option value="3">Other</option>
                </select>
            </div>
            <div class="col-4">
              <input class="form-control form-control-lg mb-4 py-3" type="text" value="+244" aria-label="Email@address.com" readonly>
            </div>
            <div class="col-8">
              <input class="form-control form-control-lg mb-4 py-3" type="text" placeholder="number" aria-label="Email@address.com">
            </div>

          </div>
          <div class="d-grid mb-3">
            <button type="button" class="btn btn-dark shadow py-3 fw-bold btn-lg">Sign up</button>
          </div>
          
          <a href="#" class="d-flex text-decoration-none text-dark align-items-center">
            <i class="fas fa-caret-right me-2 mb-0"></i>
            <p class="mb-0 fw-bold">Need Help ?</p>
          </a>
          
          
        </div>
      </div>
    </div>
  </section>
  
</body>
</html>