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
    var idx = $('.hover').index(this);
    $('.hover').removeClass('hover-active');
    $(this).addClass('.hover-active');
    $('.hover-content').hide();
    $('.hover-content-'+idx).show();
  }, function(e) {
  });

})(jQuery);
