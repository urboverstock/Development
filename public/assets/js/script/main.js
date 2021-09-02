// focus form input gr4oup text
let focusInput = document.querySelector(".input-group-urban-focus");
let urbanGroupText = document.querySelector(".urban-group-text");
// hamburger
const menuIcon = document.querySelector(".hamburger-menu");
let body = document.body;

// box-wrapper
let boxWrapper = document.querySelector(".box-wrapper");
let boxSidebar = document.querySelector(".box-sidebar");
let boxBtnClose = document.querySelector(".box-btn-close");
let boxBtnOpen = document.querySelector(".box-open-btn");

AOS.init({
  offset: 300,
});

if (scroll) {
  var scroll = new SmoothScroll('a[href*="#z-"]', {
    speed: 300,
    speedAsDuration: true,
  });
}

// Change Navigation Bar Styles After Scrolling
$(function () {
  $(document).scroll(function () {
    var $nav = $(".navbar-fixed-top");
    $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
  });
});

// hamburger

menuIcon.addEventListener("click", () => {
  // navbar.classList.toggle('change');
  // if (body.classList) {
  //   body.classList.toggle("hamburger-menu-change");
  // } else {
  // For IE9
  var classes = body.className.split(" ");
  var i = classes.indexOf("hamburger-menu-change");

  if (i >= 0) classes.splice(i, 1);
  else classes.push("hamburger-menu-change");
  body.className = classes.join(" ");
  // }
});

let loadmore = document.querySelector(".loadmore");

if (loadmore) {
  $(".loadmore").btnLoadmore({
    showItem: 12,

    textBtn: "Load More Products",
    classBtn: "btn btn-dark rounded-pill px-4 py-3 d-flex m-auto",
  });
}

let focusGroupText = document.querySelector(".--focus-urban-group-text");
if (focusInput) {
  focusInput.addEventListener("click", function () {
    urbanGroupText.classList.add("--focus-urban-group-text");
  });
}

if (boxWrapper) {
  boxBtnOpen.addEventListener("click", function () {
    boxSidebar.classList.add("open");
  });
  boxBtnClose.addEventListener("click", function () {
    boxSidebar.classList.remove("open");
  });
}

$(".dropdown-follow").click(function (e) {
  e.stopPropagation();
});
