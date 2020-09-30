// ===============================
//            Index Page
// ================================

// Toggle Sidemenu
function openSlideMenu() {
    document.getElementById('side-menu').style.width = '250px';
    // document.getElementById('main').style.marginLeft = '250px';
}
function closeSlideMenu() {
    document.getElementById('side-menu').style.width = '0';
    // document.getElementById('main').style.marginLeft = '0';
}

// First Slider
$('.slider-one')
    .not("slick-initialized")
    .slick({
        prevArrow: ".site-slider-one .prev",
        nextArrow: ".site-slider-one .next",
        slidesToShow: 7,
        slidesToScroll: 7,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 6,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

// Second Slider
$('.slider-two')
    .not("slick-initialized")
    .slick({
        dots: true,
        prevArrow: ".site-slider-two .slider-btn .prev",
        nextArrow: ".site-slider-two .slider-btn .next",
        autoplay: true,
        autoplaySpeed: 3000,
    });

/* =========================================
                product_single
============================================ */
$('.slider')
    .not("slick-initialized")
    .slick({
        dots: true,
        prevArrow: ".singleProductCarousel .slider-btn .prev",
        nextArrow: ".singleProductCarousel .slider-btn .next",
        autoplay: true,
        autoplaySpeed: 3000,
    });


/* =========================================
                Brn Back to Top
============================================ */

/* Show & Hide Button */
$(function () {

    // show/hide nav on page load
    // showHideNav();

    $(window).scroll(function () {
        // show/hide nav on window's scroll
        showHideNav();
    });

    function showHideNav() {
        if ($(window).scrollTop() > 50) {

            // Show back to top button
            $("#back-to-top").fadeIn();

        } else {
            // Hide back to top button
            $("#back-to-top").fadeOut();
        }
    }
});

// Smooth Scrolling
$(function () {

    $("a.smooth-scroll").click(function (event) {

        event.preventDefault();

        // get section id like #about, #servcies, #work, #team and etc.
        var section_id = $(this).attr("href");

        $("html, body").animate({
            scrollTop: $(section_id).offset().top - 64
        }, 1250);

    });

});

// single product

// Category
// $(function () {
//     $(".category a").click(function (event) {
//         $(".category a").attr("href", "category.html");
//     });
//     $("#side-menu a").click(function () {
//         $("#side-menu a").attr("href", "category.html");
//     })
// });




// Required Tooltip
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});