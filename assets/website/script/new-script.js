// brands slider
jQuery(function($){
    $('.slider-con').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    infinite:false,
    autoplay: false,
    autoplaySpeed: 700,
    arrows: false,
    dots: true,
    pauseOnHover: true,
    adaptiveHeight: true,
    prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
    responsive: [{
    breakpoint: 980,
    settings: {
    slidesToShow: 4.5,
    }
    },
    {
    breakpoint: 480,
    settings: {
    slidesToShow: 2,
    }
    }
    ]
    });
    });
// video slider
jQuery(function($){
    $('.vid-slider-con').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite:false,
    autoplay: false,
    autoplaySpeed: 700,
    arrows: true,
    dots: false,
    pauseOnHover: true,
    adaptiveHeight: true,
    prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
    responsive: [{
    breakpoint: 980,
    settings: {
    slidesToShow: 1,
    }
    },
    {
    breakpoint: 480,
    settings: {
    slidesToShow: 1,
    }
    }
    ]
    });
    });
// accommodation images slider
jQuery(function($){
    $('.card-img-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: false,
    dots: false,
    pauseOnHover: false,
    adaptiveHeight: true,
    prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
    responsive: [{
    breakpoint: 980,
    settings: {
    slidesToShow: 1,
    }
    },
    {
    breakpoint: 480,
    settings: {
    slidesToShow: 1,
    }
    }
    ]
    });
    });


// const elements = document.querySelectorAll('.slider_vid');

// elements.forEach(element => {
//   const width = element.offsetWidth;
//   element.style.height = `${width}px`; // Set the height equal to the width
//   console.log(`Height of element: ${width}px`);
// });
