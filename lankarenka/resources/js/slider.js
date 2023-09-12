import Swiper from 'swiper';

window.onload = function () {

    // Home Page Swiper
    var homeSwiper = new Swiper('.home-swiper', {

        loop: true,
        speed: 700,
        parallax: true,
        autoplay: {
            delay: 3500
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        }
        
    });

    // Arrival Swiper
    var arrivalSwiper = new Swiper('.arrival-container', {

        slidesPerView: 2,
        loop: true,
        speed: 700,
        autoplay: {
            delay: 3500
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
              slidesPerView: 3
            },
            768: {
              slidesPerView: 3
            },
            1024: {
              slidesPerView: 4
            },
          }
        
    });

};
