/*
 * Main script functions
 */

(function($) {

  // Mobile Menu toggle
  $('.mobile-menu-toggle').click(function() {
    $('.header_nav').toggle();
  })

  // Internal What You Can Expect

  var getWhatYouExpectContent = function(activeBox) {
    var hoverContent = '.hover-content-'+$('.hover').index(activeBox);
    $('.hover').removeClass('hover-active');
    $(activeBox).addClass('hover-active');
    $('.hover-content').hide();
    return(hoverContent);
  }

  // Desktop
  $('.hover').hover(function(e){
    var hoverContent = getWhatYouExpectContent(this);
    console.log(hoverContent);
    $(hoverContent).show();
    }
  );

  // Mobile
  $('.hover').click(function(e){
    var hoverContent = getWhatYouExpectContent(this);
    $(hoverContent).show();
    }
  );

  // Anchor
  $('.anchor-bttn').click(function() {
    var anchorTarget = $(this).attr('data-target');
    $('html, body').animate({
        scrollTop: $('#'+anchorTarget).offset().top
    }, 1000);
  })

  // SmartBen Boxes
  $('.smartben-box').click(function() {
    $('.smartben-hover-content').hide();
    $(this).find('.smartben-hover-content').show();
  })

})(jQuery);
