// --------------------------------------------------------------------------
// stickyNav.js
// --------------------------------------------------------------------------
// Sticks the nav when it hits the top of the browser
// --------------------------------------------------------------------------

RN.stickyNav = function() {

  'use strict';

  var nav, header, win;

  function init() {
    nav = byBehaviour('sticky-nav');
    header = $('.site-header');
    win = $(window);
    win.scroll(checkNavPosition);
  }

  function checkNavPosition() {
    var scrollPos = win.scrollTop(),
        headerHeight = header.outerHeight() + header.offset().top,
        isSticky = scrollPos > headerHeight;

    nav.toggleClass('site-navigation--is-fixed', isSticky);
  }

  return {
    init: init
  };

}();