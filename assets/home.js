/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/home/hero.scss';
import './styles/home/formation.scss';
import './styles/home/card-dis.scss';
import './styles/home/intro-main.scss';
import './styles/home/std-review.scss';
import './styles/home/card-review.scss';



import Splide from '@splidejs/splide';

// start the Stimulus application
import './bootstrap';



// SETUP OPTION SLIDE SHOW
new Splide( '.splide', {
    type   : 'carousel',
    pagination: true,
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

// SETUP OPTION SECOND SLIDE

new Splide( '#splide2', {
    type   : 'loop',
    autoplay: true,
    pagination: false,
    perPage: 5,
    focus: 'center',
    breakpoints: {
        1200: {
            perPage: 4,
        },
        767: {
            perPage: 1,
        },
    },
    gap: '1.5rem',
    arrows: true,     

}).mount();