AOS.init();
/* CUSTOM ON LOAD FUNCTIONS */
function documentCustomLoad() {
    "use strict";
    console.log('Functions Correctly Loaded');

    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 3000,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        }
    });

}

document.addEventListener("DOMContentLoaded", documentCustomLoad, false);
