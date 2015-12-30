/*
 * Main script functions
 */

(function($) {

  // Mobile Menu toggle
  $('.mobile-menu-toggle').click(function() {
    $('.header_nav').toggle();
  })

  // Internal What You Can Expect

  $('.hover').hover(function(e){
    debugger;
    var idx = $('.hover').index(this);
    $('.hover-content').hide();
    $('.hover-content-'+idx).show();
  });

})(jQuery);
