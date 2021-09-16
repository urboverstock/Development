<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <!-- <link rel="shortcut icon" href="favicon.png" type="image/png"> -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css"/>
  <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" href="{{ asset('assets/stylesheet/css/developer.css') }}">

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

    @include('includes.admin.admin_header')
    @yield('content')
    @include('includes.admin.admin_footer')

    <div class="logout-screen" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="text-50 f-600">Are you sure you want to logout?</div>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn  py-4 rounded-pill px-5rem me-3 fw-bold border-logout-screen cancel_logout_btn">Go Back </button>
                        <button type="button" class="btn btn-danger py-4 rounded-pill confirm_logout_btn px-5rem">Logout </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('assets/js/vendor/btnloadmore.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/slick.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>-->

    <!--<script src="{{ asset('assets/js/script/apexChart.js') }}"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
    <script src="{{ asset('assets/js/script/main.js') }}"></script>
    <script src="{{ asset('assets/js/script/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/js/script/jquery.validate.js') }}"></script>
    <script src="{{ asset('assets/js/script/form_validation.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            <?php if (\Session::has('success')){ ?>
                toastr.success("{{ \Session::get('success') }}", "Success");
            <?php
                }elseif (\Session::has('error')) {
            ?>
                toastr.error("{{ \Session::get('error') }}", "Error");
            <?php
                }elseif (\Session::has('warning')) {
            ?>
                toastr.warning("{{ \Session::get('warning') }}", "Warning");
            <?php }elseif (\Session::has('info')) { ?>
                toastr.info("{{ \Session::get('info') }}", "Info");
            <?php } ?>
        });
    </script>

    @yield('scripts')
  
</body>
</html>