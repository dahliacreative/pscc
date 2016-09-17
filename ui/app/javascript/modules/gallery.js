// --------------------------------------------------------------------------
// gallery.js
// --------------------------------------------------------------------------
// Isotope gallery with filters
// --------------------------------------------------------------------------

RN.gallery = function() {

    'use strict';

    var gallery, filter, galleryImage, metaDefaults;
    var fbtpl = '<div class="gallery__full"><img class="fancybox-image" src="{href}" alt="" /><div class="gallery__content"><div><h4 class="gallery__title"></h4><p class="gallery__description"></p></div><div data-element="sharetastic-share"><label class="sharetastic__label">Share this:</label></div></div></div>';

    function init() {
        gallery = byBehaviour('gallery');
        filter = byBehaviour('filter-gallery');
        galleryImage = byBehaviour('show-gallery-image');

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

        galleryImage
            .fancybox({
                beforeShow: handleGalleryNavigation,
                beforeClose: resetUrl,
                fitToView: true,
                padding: 0,
                tpl: {
                    image: fbtpl,
                }
            });
    }

    function filterGallery() {
        var selection = '.' + filter.val();
        gallery
            .isotope({
                filter: selection
            });
    }

    function urlify(a) {
        return a.toLowerCase().replace(/[^a-z0-9]+/g, "-").replace(/^-+|-+$/g, "-").replace(/^-+|-+$/g, '');
    }

    function handleGalleryNavigation() {
        metaDefaults = RN.meta.getCurrent();
        var el = this.element,
            url = el.data('url');
        RN.history.update(url);
        RN.meta.update({
            title: "Peggy Sue's Confectionery Company : " + el.data('title'),
            url: 'http://www.peggysuesconfectionery.co.uk/' + url,
            description: el.data('description'),
            image: el.attr('href')
        });
        $('.gallery__title').html(el.data('title'));
        $('.gallery__description').html(el.data('description'));
        byElement('sharetastic-share')
            .sharetastic({
                sprite: '/application/themes/rawnet/app/images/vendor/sharetastic.svg',
                services: {
                    print: false
                }
            });
    }

    function resetUrl() {
        RN.history.update('/#/gallery');
        RN.meta.update({
            title: metaDefaults.title,
            url: metaDefaults.url,
            description: metaDefaults.description,
            image: metaDefaults.image
        });
    }

  return {
    init: init
  };

}();