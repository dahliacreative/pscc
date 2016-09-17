// --------------------------------------------------------------------------
// application.js
// --------------------------------------------------------------------------
// This file imports and initialises modules.
//
// Add module names to the modules array for automatic initialisation.
//
// No specific javascript should be placed in this file.
// --------------------------------------------------------------------------

$(function() {

    'use strict';

    // DETECT TOUCH
    RN.isTouch = false;
    $(document).on('touchstart', function() {
        RN.isTouch = true;
        $('html').removeClass('no-touch').addClass('touch');
        $(document).off('touchstart');
    });

    // LOAD MODULES
    var modules = [
        'meta',
        'gallery',
        'history',
        'stickyNav',
        'scrollTo',
        'form'
    ];

    for(var i = 0; i < modules.length; i++) {
        RN[modules[i]].init();
    }

    // CUSTOM SELECTS
    byElement('custom-select')
        .selectron();

    // MODAL
    byBehaviour('launch-modal')
        .fancybox({
            padding: 0
        });

    // SLICK SLIDER
    byElement('banner-slider')
        .slick({ 
            arrows: false,
            dots: true,
            fade: true,
            autoplay: true,
            autoplaySpeed: 5000,
            speed: 2000,
            pauseOnDotsHover: true,
            pauseOnHover: false,
            puaseOnFocus: false
        });

    // SOCIAL ICONS
    byBehaviour('sharetastic-social')
        .sharetastic({
            sprite: '/application/themes/rawnet/app/images/vendor/sharetastic.svg',
            popup: false,
            services: {
                instagram: {
                    href: 'https://www.instagram.com/peggysuesconfectioneryco/'
                },
                facebook: {
                    href: 'https://www.facebook.com/PeggySuesConfectioneryCo/'
                },
                twitter: false,
                pinterest: false,
                googleplus: false,
                linkedin: false,
                tumblr: false,
                email: false,
                print: false
            }
        });

});