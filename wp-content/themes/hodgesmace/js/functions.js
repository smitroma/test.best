/*
 * Main script functions
 */
(function ($) {
    // Mobile Menu toggle
    $('.mobile-menu-toggle').click(function () {
            $('.header_nav').toggle();
        })
        // Portal Menu toggle
    var hidePortalMenu = function () {
            $('#top-header .menu-item-has-children').removeClass('active');
            $('#top-header .menu-item-has-children .sub-menu').hide()
        }
        // toggle menu when you click
    $('#top-header .menu-item-has-children').click(function () {
            $(this).toggleClass('active');
            $(this).find('.sub-menu').toggle();
        })
        // hide menu when you click off
    $('body').click(function (e) {
        if ($(e.target).parents('.portal-toggle').length === 0) {
            hidePortalMenu();
        }
    });
    // reset menu on resize
    $(window).resize(function () {
        hidePortalMenu();
    });
    // Internal What You Can Expect
    var getWhatYouExpectContent = function (activeBox) {
            var hoverContent = '.hover-content-' + $('.hover').index(activeBox);
            $('.hover').removeClass('hover-active');
            $(activeBox).addClass('hover-active');
            $('.hover-content').hide();
            return (hoverContent);
        }
        // Desktop - Internal What You Can Expect
    $('.hover').hover(function (e) {
        var hoverContent = getWhatYouExpectContent(this);
        console.log(hoverContent);
        $(hoverContent).show();
    });
    // Mobile - Internal What You Can Expect
    $('.hover').click(function (e) {
        var hoverContent = getWhatYouExpectContent(this);
        $(hoverContent).show();
    });
    // Anchor Buttons
    $('.anchor-bttn').click(function () {
            var anchorTarget = $(this).attr('data-target');
            $('html, body').animate({
                scrollTop: $('#' + anchorTarget).offset().top
            }, 1000);
        })
        // SmartBen Boxes
    $('.smartben-box').click(function () {
        $('.smartben-hover-content').hide();
        $(this).find('.smartben-hover-content').show();
    });
    // Even Column Height
    var setEvenColHeight = function () {
            $('.even-col-row').each(function () {
                var colHeight = 0;
                $('.even-col-row .even-col').each(function () {
                    $(this).css('height', 'auto');
                    thisHeight = $(this).height();
                    colHeight = (thisHeight > colHeight) ? thisHeight : colHeight;
                });
                $('.even-col').each(function () {
                    $(this).height(colHeight);
                });
            });
        }
        // onLoad - Even Column Height
    setEvenColHeight();
    // onResize - Even Column Height
    $(window).resize(function () {
        setEvenColHeight();
    });
    // Client / Broker Popup
    $('.requestDemoBtn').click(function () {
        $.fancybox({
            'content': $("#requestPopUp").html()
        });
    });
    // Watch Video Popup
    var windowWidth = $(window).innerWidth() * 1 / 3;
    var videoWidth = (windowWidth < 400) ? 400 : windowWidth;
    var videoHeight = videoWidth * (225 / 400);
    if ($.fancybox) {
        $('.watchVideoBtn a').fancybox({
            width: videoWidth,
            height: videoHeight,
            type: 'iframe',
            fitToView: false
        });
    }
    // StickyNav
    function getScroll() {
        if ($(window).scrollTop() > $('#top-header').height()) {
            if (!$('#header').hasClass('sticky')) {
                $('#header').addClass('sticky');
                $('#top-header').css('marginBottom', $('#header').height() + 'px');
            }
        } else {
            if ($('#header').hasClass('sticky')) {
                $('#header').removeClass('sticky');
                $('#top-header').css('marginBottom', '0px');
            }
        }
    }
    // onload - StickyNav
    getScroll();
    // onScroll - StickyNav
    $(window).scroll(function () {
        getScroll();
    });
    // Contact show employee rang on business type select
    $('.contact-footer #input_1_7').change(function () {
            console.log($(this).val());
            $('.contact-footer #field_1_8').removeClass('d-n');
            if ($(this).val() == 'Employer') {
                $('.contact-footer #field_1_8 .gf_placeholder').text('Company Size');
            } else if ($(this).val() == 'Broker' || $(this).val() == 'Carrier') {
                $('.contact-footer #field_1_8 .gf_placeholder').text('Average Client Size');
            } else {
                $('.contact-footer #field_1_8').addClass('d-n');
            }
        })
        //Input fields start at beginning
    $('input').each(function () {
        if (this.createTextRange) {
            var r = this.createTextRange();
            r.collapse(true);
            r.select();
        }
    });
})(jQuery);