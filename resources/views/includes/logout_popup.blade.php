@section('scripts')

  <script>
    $('.logout_btn').on('click', function(){
      $('.logout-screen').show();
    });

    $('.cancel_logout_btn').on('click', function(){
      $('.logout-screen').hide();
    });

    $('.confirm_logout_btn').on('click', function(){
      window.location.href = "{{ route('logout') }}";
    });
  </script>

@endsection