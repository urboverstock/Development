<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
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
  
  <section class="us-session-form  min-vh-100 d-flex justify-content-center align-items-center position-relative">
   
    <div class="container-fluid ">
      <div class="row align-items-center">
        <div class="col-lg-5 p-0 d-lg-block d-none">
        
          <img class="img-fluid vh-100" src="{{ asset('assets/images/session.png') }}" alt="">
        </div>
        
        <div class="offset-lg-1 col-lg-5">
          <input class="form-control form-control-lg mb-4 py-3" type="email" placeholder="Email@address.com" aria-label="Email@address.com">
          <input class="form-control form-control-lg mb-5 py-3" type="password" placeholder="Password" aria-label="password">
          <div class="d-grid mb-3">
            <button type="button" class="btn btn-dark shadow py-3 fw-bold btn-lg">Log in</button>
          </div>
          
          <a href="#" class="d-flex text-decoration-none text-dark align-items-center">
            <i class="fas fa-caret-right me-2 mb-0"></i>
            <p class="mb-0 fw-bold">Need Help ?</p>
          </a>
          <div class="d-flex justify-content-end">
            <a href="{{ route('signup') }}" class="mb-0 fw-bold fs-3 text-decoration-none text-dark">Join Us ?</a>
          </div>
          
        </div>
      </div>
    </div>
  </section>
  
</body>
</html>