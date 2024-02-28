/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/admin/main-admin.scss';
import './styles/admin/dashboard.scss';

import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

import Splide from '@splidejs/splide';

// start the Stimulus application
import './bootstrap';

// set up first Swiper
const swiper = new Swiper(".swiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    initialSlide: 3,
    loop: true,
    speed: 600,
    slidesPerView: "auto",
    coverflowEffect: {
        rotate: 10,
        stretch: 120,
        depth: 300,
        modifier: 1,
        slideShadows: false,
    },
    on: {
        click(event) {
            swiper.slideTo(this.clickedIndex);
        },
    },
    pagination: {
        el: ".swiper-pagination",
    },
});

// SETUP OPTION SLIDE SHOW
new Splide( '.splide', {
    type   : 'carousel',
    pagination: false,
    perPage: 4,
    focus: 'center',
    autoplay: false,
    arrows: false,     
    breakpoints: {
        1200: {
            perPage: 3,
        },
        767: {
            type   : 'loop',
            perPage: 1,
            autoplay: true,
        },
    },
    gap: '1.5rem',
}).mount();

// SETUP OPTION SLIDE SHOW
new Splide( '#course', {
    type   : 'carousel',
    pagination: false,
    perPage: 4,
    focus: 'center',
    autoplay: false,
    arrows: false,     
    breakpoints: {
        1200: {
            perPage: 3,
        },
        767: {
            type   : 'loop',
            perPage: 1,
            autoplay: true,
        },
    },
    gap: '1.5rem',
}).mount();