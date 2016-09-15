// --------------------------------------------------------------------------
// history.js
// --------------------------------------------------------------------------
// Handles history api and urls
// --------------------------------------------------------------------------

RN.history = function() {

    'use strict';

    function init() {
        var hash = '/' + window.location.hash;
        if(hash === '/') {
            update('/#/home');
        } else {
            navigate();
        }
        history.scrollRestoration = 'manual';
        $(window).on('popstate', navigate);
    }

    function navigate() {
        var hash = '/' +  window.location.hash;
        if(hash === '/') {
            update('/#/home');
        } else {
            if(hash.indexOf('gallery/') > -1) {
                $('[data-url="' + hash + '"]')
                    .trigger('click');
            } else {
                var trigger = $('[data-url="' + hash + '"]');
                RN.scrollTo.anchor(trigger);
                parent.$.fancybox.close();
            }
        }
    }

    function update(url) {
        history.pushState(null, null, url);
    }

    return {
        init: init,
        update: update
    };

}();