/*
 * Main script functions
 */

// Unrestricts same origin policy for acton iframes
document.domain = "hodgesmace.com";

(function($) {

  // Mobile Menu toggle
    $('.mobile-menu-toggle').click(function() {
      $('.header_nav').toggle();
    })

  // Portal Menu toggle
    var hidePortalMenu = function() {
      $('#top-header .menu-item-has-children').removeClass('active');
      $('#top-header .menu-item-has-children .sub-menu').hide()
    }
    // toggle menu when you click
    $('#top-header .menu-item-has-children').click(function() {
      $(this).toggleClass('active');
      $(this).find('.sub-menu').toggle();
    })
    // hide menu when you click off
    $('body').click( function(e) {
      if($(e.target).parents('.portal-toggle').length === 0) {
        hidePortalMenu();
      }
    });
    // reset menu on resize
    $(window).resize(function(){
        hidePortalMenu();
    });

  // Internal What You Can Expect
    var getWhatYouExpectContent = function(activeBox) {
      var hoverContent = '.hover-content-'+$('.hover').index(activeBox);
      $('.hover').removeClass('hover-active');
      $(activeBox).addClass('hover-active');
      $('.hover-content').hide();
      return(hoverContent);
    }

    // Desktop - Internal What You Can Expect
      $('.hover').hover(function(e){
        var hoverContent = getWhatYouExpectContent(this);
        console.log(hoverContent);
        $(hoverContent).show();
        }
      );

    // Mobile - Internal What You Can Expect
      $('.hover').click(function(e){
        var hoverContent = getWhatYouExpectContent(this);
        $(hoverContent).show();
        }
      );

  // Anchor Buttons
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
    });

  // Even Column Height
    var setEvenColHeight = function() {
      $('.even-col-row').each(function() {
        var colHeight = 0;
        $('.even-col-row .even-col').each(function() {
          $(this).css('height', 'auto');
          thisHeight = $(this).height();
          colHeight = (thisHeight > colHeight) ? thisHeight : colHeight;
        });
        $('.even-col').each(function(){
          $(this).height(colHeight);
        });
      });
    }

    // onLoad - Even Column Height
      setEvenColHeight();

    // onResize - Even Column Height
      $(window).resize(function() {
        setEvenColHeight();
      });

    $(document).bind('gform_confirmation_loaded', function(event, formId) {
        dataLayer.push({
            'event' : 'formSubmit',
            'formName' : formId
        });
    });

})(jQuery);

// ActOn Iframe sizing

function resizeIframe(obj) {
  try {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  } catch {}
}
