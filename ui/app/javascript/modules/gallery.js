// --------------------------------------------------------------------------
// gallery.js
// --------------------------------------------------------------------------
// Isotope gallery with filters
// --------------------------------------------------------------------------

RN.gallery = function() {

  'use strict';

  function init() {
    var gallery = byBehaviour('gallery');
    console.log(gallery)
    gallery
        .imagesLoaded(function() {
            gallery
                .isotope({
                    itemSelector: '.gallery__item',
                    percentPosition: true
                });
        });
        
  }

  return {
    init: init
  };

}();