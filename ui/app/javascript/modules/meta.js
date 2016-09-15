// --------------------------------------------------------------------------
// meta.js
// --------------------------------------------------------------------------
// Provides a method for updating meta tags
// --------------------------------------------------------------------------

RN.meta = function() {

    'use strict';

    var metas = {};
    var defaults = {};

    function init() {
        metas.doc = $('title');
        metas.docdescription = $('[name="description"]');
        metas.title = $('[property="og:title"]');
        metas.description = $('[property="og:description"]');
        metas.url = $('[property="og:url"]');
        metas.image = $('[property="og:image"]');

        defaults.title = metas.title.attr('content');
        defaults.description = metas.description.attr('content');
        defaults.url = metas.url.attr('content');
        defaults.image = metas.image.attr('content');
    }

    function reset() {
        metas.doc.html(defaults.title);
        metas.docdescription.attr('content', defaults.description);
        metas.title.attr('content', defaults.title);
        metas.description.attr('content', defaults.description);
        metas.url.attr('content', defaults.url);
        metas.image.attr('content', defaults.image);
    }

    function update(opts) {
        if(opts.title) {
            metas.doc.html(opts.title);
            metas.title.attr('content', opts.title); 
        }
        if(opts.description) {
            metas.docdescription.attr('content', opts.description);
            metas.description.attr('content', opts.description); 
        }
        if(opts.url) {
           metas.url.attr('content', opts.url); 
        }
        if(opts.image) {
           metas.image.attr('content', opts.image); 
        }
    }

    function getCurrent() {
        return {
            title: metas.title.attr('content'),
            description: metas.description.attr('content'),
            url: metas.url.attr('content'),
            image: metas.image.attr('content')
        };
    }

    return {
        init: init,
        update: update,
        reset: reset,
        getCurrent: getCurrent
    };

}();