$('.slider-nav').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: false,
  arrows: true,
  vertical: false,
  centerMode: false,
  focusOnSelect: true,
  prevArrow:'<svg xmlns="http://www.w3.org/2000/svg" height="36px" class="prevArrow" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>',
  nextArrow:'<svg xmlns="http://www.w3.org/2000/svg" height="36px" class="nextArrow" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>',
  responsive: [
  {
    breakpoint: 420,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      infinite: true,
      dots: false
    }
  },

  ]
});
$('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  vertical: false,
  fade: true,
  asNavFor: '.slider-nav',

});



  // button add to cart
  function increaseValue(button, limit) {
    const numberInput = button.parentElement.querySelector('.number');
    var value = parseInt(numberInput.innerHTML, 10);
    if(isNaN(value)) value = 0  ;
    if(limit && value >= limit) return;
    numberInput.innerHTML = value+1;
  }


  function decreaseValue(button) {
    const numberInput = button.parentElement.querySelector('.number');
    var value = parseInt(numberInput.innerHTML, 10);
    if(isNaN(value)) value = 0;  
    if(value < 1) return;
    // console.log(value);
    if(value != 1)
      numberInput.innerHTML = value-1;
  }

  $(document).on('click', '.decrease', function()
  {
    var cart_id = $(this).data('cart_id');
    var p_price = $(this).data('p_price');
    var url = $(this).data('url');
    var numberInput = $('#qty'+cart_id).html();
    var qty = parseInt(numberInput);
    console.log(numberInput);
   
    if (qty != 1)
    {
        qty--;
        $("#qty" + cart_id).html(qty);
   
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type : 'get',
        url: url,
        data: { cart_id : cart_id, quantity : qty },
        //async: false,
      }).done(function(response) {
        if(response.status == 1) {
          var total_price = $('.total_price').html();
          var parse_total_price = parseFloat(total_price) - parseFloat(p_price);

          $('.total_price').html(parse_total_price);

          $('#p_total_price'+ cart_id).html(response.p_total_price);
        }
      }).fail(function() {
        ajaxrequestTime = false;
        toastr.error("Something went wrong!", "Error");
      });
    }
  });

  $(document).on('click', '.increase', function()
  {
    var cart_id = $(this).data('cart_id');
    var p_price = $(this).data('p_price');
    var url = $(this).data('url');
    var product_total_quantity = $(this).data('product_total_quantity');
    var numberInput = $('#qty'+cart_id).html();
    var qty = parseInt(numberInput);
    
    if(qty < product_total_quantity){
      qty++;
      $("#qty" + cart_id).html(qty)
    
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type : 'get',
        url: url,
        data: { cart_id : cart_id, quantity : qty },
        //async: false,
      }).done(function(response) {
        if(response.status == 1) {
          var total_price = $('.total_price').html();
          var parse_total_price = parseFloat(total_price) + parseFloat(p_price);

          $('.total_price').html(parse_total_price);

          $('#p_total_price'+ cart_id).html(response.p_total_price);
        }
      }).fail(function() {
        ajaxrequestTime = false;
        toastr.error("Something went wrong!", "Error");
      });
    }
  });

  $(document).on('click', '.cart-remove', function()
  {
    var url = $(this).data('url');
    var cart_id = $(this).data('cart');
    var p_total_price = $("#p_total_price"+cart_id).html();

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type : 'get',
        url: url,
        
        //async: false,
      }).done(function(response) {
        if(response.status == 1) {
            var total_price = $('.total_price').html();
            var parse_total_price = parseFloat(total_price) - parseFloat(p_total_price);
            
            $('.total_price').html(parse_total_price);

            $('#cart-section'+cart_id).remove();
            toastr.success(response.message, "Success");
          }else{
            toastr.error(response.message, "Error");
          }
      }).fail(function() {
        ajaxrequestTime = false;
        toastr.error("Something went wrong!", "Error");
      });
  });

  // Check all 
$('#checkall').click(function(){
  if($(this).is(':checked')){
     $('.delete_check').prop('checked', true);
  }else{
     $('.delete_check').prop('checked', false);
  }
});

  $('#delete_all_cart').click(function(){

  var deleteids_arr = [];
  // Read all checked checkboxes
  $(".delete_check:checked").each(function () {
     deleteids_arr.push($(this).val());
  });

  console.log(deleteids_arr);
  // Check checkbox checked or not
  if(deleteids_arr.length > 0){

     // Confirm alert
     var confirmdelete = confirm("Are you sure");
     if (confirmdelete == true) {
        $.ajax({
           method: 'get',
           url: base_url +'/remove-all-cart',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data: {deleteids_arr: deleteids_arr},
           success: function(response){
              if(response.status == 1) {
                toastr.success(response.message, "Success");
              }else{
                toastr.error(response.message, "Error");
              }
            
              location.reload(true);
           
           }
        });
     }
   }
});