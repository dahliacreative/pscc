// --------------------------------------------------------------------------
// form.js
// --------------------------------------------------------------------------
// Submits form via ajax
// --------------------------------------------------------------------------

RN.form = function() {

  'use strict';

  function init() {
    byBehaviour('ajax-form')
        .on('submit', submitForm);
  }

  function submitForm() {
    var form = $(this),
        action = form.attr('action'),
        method = form.attr('method'),
        data = form.serialize();

    $.ajax({
        url: encodeURI(action),
        type: method,
        data: data,
        success: function(response) {
            var form = $(response).find('.ccm-block-type-form');
            $('.modal').html(form);
        }
    });

    return false;
  }

  return {
    init: init
  };

}();