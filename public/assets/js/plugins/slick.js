$('.three-item').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 3,
  arrows: true,
  // prevArrow:"<i class='fas fa-chevron-left'></i>", 
  prevArrow:"<i class='fas fa-chevron-left --arrow-left cursor-pointer '></i>", 
  nextArrow:"<i class='fas fa-chevron-right --arrow-right cursor-pointer '></i>",
  
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 900,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
$('.four-item').slick({
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  arrows: true,
  // prevArrow:"<i class='fas fa-chevron-left'></i>", 
  prevArrow:"<i class='fas fa-chevron-left --arrow-left cursor-pointer '></i>", 
  nextArrow:"<i class='fas fa-chevron-right --arrow-right cursor-pointer '></i>",
  
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 900,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});


$('.center-slick').slick({
  centerMode: true,
  centerPadding: '0px',
  slidesToShow: 3,
  autoplay: true,
  prevArrow:"<i class='fas fa-chevron-left --arrow-left cursor-pointer '></i>", 
  nextArrow:"<i class='fas fa-chevron-right --arrow-right cursor-pointer '></i>",
  responsive: [
    {
      breakpoint: 1400,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 1250,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});
$('.center-slick').slick({
  centerMode: true,
  centerPadding: '0px',
  slidesToShow: 3,
  autoplay: true,
  responsive: [
    {
      breakpoint: 1400,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 1250,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});

let guestBuyers = document.querySelector('.center-guest-buyers');

if(guestBuyers){
  $('.center-guest-buyers').slick({
    centerMode: true,
    centerPadding: '60px',
    slidesToShow: 3,
    autoplay: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 3
        }
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 1
        }
      }
    ]
  });
  
}

let orders = document.querySelector('.orders')
if(orders){
  $('.orders').slick({
    dots: false,
    infinite: false,
    arrows: true,
    // prevArrow:"<i class='fas fa-chevron-left'></i>", 
    prevArrow:"<i class='fas fa-chevron-left --arrow-left cursor-pointer '></i>", 
    nextArrow:"<i class='fas fa-chevron-right --arrow-right cursor-pointer '></i>",
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
           dots: true
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
           dots: true
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
}

// let guestBuyers = document.querySelector('.center-guest-buyers');


// let orders = document.querySelector('.orders')
// if(orders){
//   $('.orders').slick({
//     dots: false,
//     infinite: false,
//     arrows: true,
//     // prevArrow:"<i class='fas fa-chevron-left'></i>", 
//     prevArrow:"<i class='fas fa-chevron-left --arrow-left cursor-pointer '></i>", 
//     nextArrow:"<i class='fas fa-chevron-right --arrow-right cursor-pointer '></i>",
//     slidesToShow: 4,
//     slidesToScroll: 1,
//     responsive: [
//       {
//         breakpoint: 1024,
//         settings: {
//           slidesToShow: 3,
//           slidesToScroll: 3,
//           infinite: true,
//           dots: true
//         }
//       },
//       {
//         breakpoint: 600,
//         settings: {
//           slidesToShow: 2,
//           slidesToScroll: 2,
//            dots: true
//         }
//       },
//       {
//         breakpoint: 480,
//         settings: {
//           slidesToShow: 1,
//           slidesToScroll: 1,
//            dots: true
//         }
//       }
//       // You can unslick at a given breakpoint now by adding:
//       // settings: "unslick"
//       // instead of a settings object
//     ]
//   });
// }

// if(guestBuyers){
//   $('.center-guest-buyers').slick({
//     centerMode: true,
//     centerPadding: '60px',
//     slidesToShow: 3,
//     autoplay: true,
//     responsive: [
//       {
//         breakpoint: 768,
//         settings: {
//           arrows: false,
//           centerMode: true,
//           centerPadding: '40px',
//           slidesToShow: 3,
//           arrows: false,
//           centerMode: true,
//           centerPadding: '40px',
//           slidesToShow: 1
//         }
//       }
//     ]
//   });
  
// }