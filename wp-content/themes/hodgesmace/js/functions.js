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

(function() {

  function resizeIframe(obj) {
    try {
      obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';

      var iframe = document.getElementsByClassName('act-on-form');
      var form = (iframe.length > 0) ? iframe.contentDocument.getElementsByTagName('form')[0] : false;
      var inputs = (form) ? form.getElementsByTagName('input') : [];

      if(form) {
        form.addEventListener( 'submit', function(e){
          e.preventDefault();
          console.log('submit');
        }, false );
      }
      
    } catch(e) { return }
  }

  // form.addEventListener( 'change', validateForm(this), true );

  // Act-On Validation

  var excludedDomains = [
    /* Default domains included */
    "aol.com", "att.net", "comcast.net", "facebook.com", "gmail.com", "gmx.com", "googlemail.com",
    "google.com", "hotmail.com", "hotmail.co.uk", "mac.com", "me.com", "mail.com", "msn.com",
    "live.com", "sbcglobal.net", "verizon.net", "yahoo.com", "yahoo.co.uk",

    /* Other global domains */
    "email.com", "games.com" /* AOL */, "gmx.net", "hush.com", "hushmail.com", "icloud.com", "inbox.com",
    "lavabit.com", "love.com" /* AOL */, "outlook.com", "pobox.com", "rocketmail.com" /* Yahoo */,
    "safe-mail.net", "wow.com" /* AOL */, "ygm.com" /* AOL */, "ymail.com" /* Yahoo */, "zoho.com", "fastmail.fm",

    /* United States ISP domains */
    "bellsouth.net", "charter.net", "comcast.net", "cox.net", "earthlink.net", "juno.com",

    /* British ISP domains */
    "btinternet.com", "virginmedia.com", "blueyonder.co.uk", "freeserve.co.uk", "live.co.uk",
    "ntlworld.com", "o2.co.uk", "orange.net", "sky.com", "talktalk.co.uk", "tiscali.co.uk",
    "virgin.net", "wanadoo.co.uk", "bt.com",

    /* Domains used in Asia */
    "sina.com", "qq.com", "naver.com", "hanmail.net", "daum.net", "nate.com", "yahoo.co.jp", "yahoo.co.kr", "yahoo.co.id", "yahoo.co.in", "yahoo.com.sg", "yahoo.com.ph",

    /* French ISP domains */
    "hotmail.fr", "live.fr", "laposte.net", "yahoo.fr", "wanadoo.fr", "orange.fr", "gmx.fr", "sfr.fr", "neuf.fr", "free.fr",

    /* German ISP domains */
    "gmx.de", "hotmail.de", "live.de", "online.de", "t-online.de" /* T-Mobile */, "web.de", "yahoo.de",

    /* Russian ISP domains */
    "mail.ru", "rambler.ru", "yandex.ru", "ya.ru", "list.ru",

    /* Belgian ISP domains */
    "hotmail.be", "live.be", "skynet.be", "voo.be", "tvcablenet.be", "telenet.be",

    /* Argentinian ISP domains */
    "hotmail.com.ar", "live.com.ar", "yahoo.com.ar", "fibertel.com.ar", "speedy.com.ar", "arnet.com.ar",

    /* Domains used in Mexico */
    "hotmail.com", "gmail.com", "yahoo.com.mx", "live.com.mx", "yahoo.com", "hotmail.es", "live.com", "hotmail.com.mx", "prodigy.net.mx", "msn.com"
  ];

  function validateForm(obj) {

    console.log('validate');

    var form = document.getElementsByClassName('act-on-form')[0].contentDocument;
    var inputs = form.getElementsByTagName('input');
    var submit = form.find('input[name=Submit]');
    var submitAction = submit.onclick;

    console.log('vars: ',form,submit,submitAction);

    // Disable submit
    submit.css('opacity', 0.8);
    submit.onclick = '';

    return validateFields(obj);
  }

  function validateFields(form) {

    console.log('validateFields');

    var notEmpty = false;
    var excludesDomain = true;

    // form.find('input').foreach( function() {
    //   // Empty ?
    //   notEmpty = !!($(this).value());
    //
    //   // Email
    //   if($(this).attr('type')==='email'){
    //
    //     console.log('validateEmail');
    //
    //     var validDomain = excludedDomains.foreach(function(v) {
    //
    //       console.log(v);
    //       var excludesDomain = (excludesDomain) ? !($(this).value().indexOf(v) > -1 ) : excludesDomain;
    //
    //     }).bind(this)
    //   }
    // });
    //
    // console.log(notEmpty && excludesDomain);

  }

})();
