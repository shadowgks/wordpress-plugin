var modern_ecommerce_Keyboard_loop = function (elem) {
  var modern_ecommerce_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');
  var modern_ecommerce_firstTabbable = modern_ecommerce_tabbable.first();
  var modern_ecommerce_lastTabbable = modern_ecommerce_tabbable.last();
  modern_ecommerce_firstTabbable.focus();

  modern_ecommerce_lastTabbable.on('keydown', function (e) {
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      modern_ecommerce_firstTabbable.focus();
    }
  });

  modern_ecommerce_firstTabbable.on('keydown', function (e) {
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      modern_ecommerce_lastTabbable.focus();
    }
  });

  elem.on('keyup', function (e) {
    if (e.keyCode === 27) {
      elem.hide();
    };
  });
};