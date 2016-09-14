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

    RN.isTouch = false;
    $(document).on('touchstart', function() {
        RN.isTouch = true;
        $('html').removeClass('no-touch').addClass('touch');
        $(document).off('touchstart');
    });

    var modules = [
        'stickyNav',
        'scrollTo'
    ];

    for(var i = 0; i < modules.length; i++) {
        RN[modules[i]].init();
    }

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

    byBehaviour('sharetastic-social')
        .sharetastic({
            sprite: '/application/themes/rawnet/app/images/vendor/sharetastic.svg',
            popup: false,
            services: {
                instagram: {
                    enabled: true,
                    href: 'https://www.instagram.com/peggysuesconfectioneryco/'
                },
                facebook: {
                    href: 'https://www.facebook.com/PeggySuesConfectioneryCo/'
                },
                twitter: {
                    enabled: false
                },
                pinterest: {
                    enabled: false
                },
                googleplus: {
                    enabled: false
                },
                linkedin: {
                    enabled: false
                },
                tumblr: {
                    enabled: false
                },
                email: {
                    enabled: false
                },
                print: {
                    enabled: false
                }
            }
        });

});