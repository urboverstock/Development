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
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <link rel="stylesheet" href="{{ asset('assets/stylesheet/css/developer.css') }}">

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>

    <body>
        @yield('content')
        
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
    </body>
</html>