// --------------------------------------------------------------------------
// scrollTo.js
// --------------------------------------------------------------------------
// Smooth scroll for anchors
// --------------------------------------------------------------------------

RN.scrollTo = function() {

  'use strict';

  function init() {
    byBehaviour('scroll-to')
        .on('click', scrollTo);
  }

  function scrollTo() {
    var trigger = $(this),
        url = trigger.data('url');

    RN.history.update(url);
    anchor(trigger);
    return false;
  }

  function anchor(trigger) {
    var target = $(trigger.attr('href')),
        distance = target.offset().top - 102,
        url = trigger.data('url');

    $('.site-navigation__link--is-active')
        .removeClass('site-navigation__link--is-active')
        .blur();

    if(trigger.hasClass('site-navigation__link')) {
        trigger
            .addClass('site-navigation__link--is-active');
    }

    $('html, body')
        .animate({
            scrollTop: distance
        });

    RN.meta.update({
        title: "Peggy Sue's Confectionery Company :: " + trigger.text(),
        url: 'http://www.peggysuesconfectionery.co.uk/' + url
    });
  }

  return {
    init: init,
    anchor: anchor
  };

}();