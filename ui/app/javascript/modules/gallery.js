// --------------------------------------------------------------------------
// gallery.js
// --------------------------------------------------------------------------
// Isotope gallery with filters
// --------------------------------------------------------------------------

RN.gallery = function() {

  'use strict';

  var gallery, filter;

  function init() {
    gallery = byBehaviour('gallery');
    filter = byBehaviour('filter-gallery');

    gallery
        .imagesLoaded(function() {
            gallery
                .isotope({
                    itemSelector: '.gallery__item',
                    percentPosition: true
                });
        });

    filter
        .on('change', filterGallery);
  }

  function filterGallery() {
    var selection = '.' + filter.val();
    gallery
        .isotope({
            filter: selection
        });
  }

  return {
    init: init
  };

}();