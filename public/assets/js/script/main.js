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

if (menuIcon) {
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
}

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

// button add to cart
function increaseValue(button, limit) {
    const numberInput = button.parentElement.querySelector(".number");
    var value = parseInt(numberInput.innerHTML, 10);
    if (isNaN(value)) value = 0;
    if (limit && value >= limit) return;
    numberInput.innerHTML = value + 1;
}

function decreaseValue(button) {
    const numberInput = button.parentElement.querySelector(".number");
    var value = parseInt(numberInput.innerHTML, 10);
    if (isNaN(value)) value = 0;
    if (value < 1) return;
    numberInput.innerHTML = value - 1;
}

// datatables
oTable = $("#myTable").DataTable(); //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
$("#myInputTextField").keyup(function () {
    oTable.search($(this).val()).draw();
});

$(document).ready(function () {
    let myTable = $("#myTable").DataTable({
        scrollX: true,
        bDestroy: true,
        responsive: true,
        columnDefs: [
            {
                orderable: false,
                className: "select-checkbox",
                targets: 0,
                // render: function(data, type) {
                //   return type === 'display' ? '<input class="form-check-input" type="checkbox">' : '';
                // }
            },
        ],
        select: {
            style: "multi", // 'single', 'multi', 'os', 'multi+shift'
            selector: "td:first-child",
        },
        order: [[0, "asc"]],
        language: {
            paginate: {
                first: "asd",
                last: "Préédent",
                next: '<svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.52674 6.63373L0.94653 2.05352C0.529868 1.63686 0.529868 0.961318 0.94653 0.544656C1.36319 0.127995 2.03873 0.127995 2.4554 0.544656L7.79004 5.8793C8.2067 6.29596 8.2067 6.97151 7.79004 7.38817L2.4554 12.7228C2.03873 13.1395 1.36319 13.1395 0.94653 12.7228C0.529868 12.3062 0.529868 11.6306 0.94653 11.2139L5.52674 6.63373Z" fill="currentColor"></path></svg>',
                previous:
                    '<svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.00109 6.63384L7.5813 11.2141C7.99796 11.6307 7.99796 12.3063 7.5813 12.7229C7.16464 13.1396 6.4891 13.1396 6.07243 12.7229L0.737789 7.38828C0.321128 6.97161 0.321128 6.29607 0.737789 5.87941L6.07243 0.544766C6.4891 0.128104 7.16464 0.128104 7.5813 0.544766C7.99796 0.961427 7.99796 1.63697 7.5813 2.05363L3.00109 6.63384Z" fill="currentColor"></path></svg>',
            },
            sLengthMenu: " _MENU_",
        },
    });

    myTable.on("select deselect draw", function () {
        var all = myTable.rows({ search: "applied" }).count(); // get total count of rows
        var selectedRows = myTable
            .rows({ selected: true, search: "applied" })
            .count(); // get total count of selected rows

        // if (selectedRows < all) {
        //     $('#MyTableCheckAllButton i').attr('class', 'fa fa-square');
        // } else {
        //     $('#MyTableCheckAllButton i').attr('class', 'fa fa-check-square');
        // }
    });

    $("#MyTableCheckAllButton").click(function () {
        var all = myTable.rows({ search: "applied" }).count(); // get total count of rows
        var selectedRows = myTable
            .rows({ selected: true, search: "applied" })
            .count(); // get total count of selected rows

        if (selectedRows < all) {
            //Added search applied in case user wants the search items will be selected
            myTable.rows({ search: "applied" }).deselect();
            myTable.rows({ search: "applied" }).select();
        } else {
            myTable.rows({ search: "applied" }).deselect();
        }
    });
});

// select first color change
$(document).ready(function () {
    $("select").css("color", "gray");
    $("select").change(function () {
        var current = $("select").val();
        if (current != "null") {
            $("select").css("color", "black");
        } else {
            $("select").css("color", "gray !important");
        }
    });
});

// var el = document.getElementById("date");
// var date = document.querySelectorAll(".date");
// if (date) {
//     date.forEach((e) => {
//         e.onchange = function () {
//             if (e.value === "") {
//                 e.classList.add("empty-date");
//             } else {
//                 console.log(e);
//                 e.classList.remove("empty-date");
//             }
//         };
//     });
// }
//  test date color change
// el.onchange = function () {
//     if (el.value === "") {
//         el.classList.add("empty-date");
//     } else {
//         console.log(el);
//         el.classList.remove("empty-date");
//     }
// };
