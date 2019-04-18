(function($) {
  Drupal.behaviors.stickynav = {
    breakpoint: 0,
    compensation: 0,
    originalPadding: 0,
    attach : function(context) {
      var selector = Drupal.settings.stickynav.selector;
      //only getting the first elmenet in the dom
      var $menu = $(selector).eq(0);
      if ($menu.length) {
        $menu.once('stickynav', function() {
          // Save original padding on top. 0 timeout to get correct padding.
          setTimeout(function() {
            Drupal.behaviors.stickynav.originalPadding = $('body').css('paddingTop');
          }, 0);
          Drupal.behaviors.stickynav.breakpoint = $menu.offset().top;
          //we need to compensate the element so that the content does not jump up.
          Drupal.behaviors.stickynav.compensation = $menu.outerHeight();
          $(window).scroll(function () {
            //if ($(window).scrollTop() > Drupal.behaviors.stickynav.breakpoint) {
              //$menu.addClass('stickynav-active');
              //$('body').addClass('extra-padding');
           // }
            //else {
             // $menu.removeClass('stickynav-active');
             // $('body').removeClass('extra-padding');
           // }
            //if ($(window).scrollTop() != 0) {
              //$('body').addClass('shink');
            //}
            //else {
             // $('body').removeClass('shink');
           // }
          });
        });
      }
    }
  }
})(jQuery);
