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
    numberInput.innerHTML = value-1;
  }