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
    var windowWidth = $(window).innerWidth() * 2 / 3;
    var videoWidth = (windowWidth < 400) ? 400 : windowWidth;
    var videoHeight = videoWidth * (225 / 400);
    if ($.fancybox) {
        $('.watchVideoBtn a').fancybox({
            width: videoWidth
            , height: videoHeight
            , type: 'iframe'
            , fitToView: false
        });
    }
    // StickyNav
    function getScroll() {
        if ($(window).scrollTop() > $('#top-header').height()) {
            if (!$('#header').hasClass('sticky')) {
                $('#header').addClass('sticky');
                $('#top-header').css('marginBottom', $('#header').height() + 'px');
            }
        }
        else {
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
            }
            else if ($(this).val() == 'Broker' || $(this).val() == 'Carrier') {
                $('.contact-footer #field_1_8 .gf_placeholder').text('Average Client Size');
            }
            else {
                $('.contact-footer #field_1_8').addClass('d-n');
            }
        })
        //var makes it so cannot mouseover after
    var hoverCooldown = [];
    var buttonIsClicked = function (name) {
        var buttonElement = document.getElementById(name + "-button");
        var buttonPath = buttonElement.getElementsByClassName("infographic-button-path")[0];
        var classString = buttonPath.getAttribute("class");
        return classString.indexOf(" clicked") != -1;
    };
    var showText = function (name) {
        var textElement = document.getElementById(name + "-text-detail");
        var classString = textElement.getAttribute("class");
        if (classString.indexOf(" hide") != -1) {
            var newClass = classString.replace(" hide", "");
            textElement.setAttribute("class", newClass);
        }
    };
    var hideText = function (name) {
        var textElement = document.getElementById(name + "-text-detail");
        var classString = textElement.getAttribute("class");
        if (classString.indexOf(" hide") == -1 && !buttonIsClicked(name)) {
            var newClass = classString + " hide";
            textElement.setAttribute("class", newClass);
        }
    };
    var unhighlightText = function (name) {
        var textElement = document.getElementById(name + "-text-detail");
        var classString = textElement.getAttribute("class");
        if (classString.indexOf(" unhighlight") == -1 && !buttonIsClicked(name)) {
            var newClass = classString + " unhighlight";
            textElement.setAttribute("class", newClass);
        }
    };
    var highlightText = function (name) {
        var textElement = document.getElementById(name + "-text-detail");
        var classString = textElement.getAttribute("class");
        if (classString.indexOf(" unhighlight") != -1) {
            var newClass = classString.replace(" unhighlight", "");
            textElement.setAttribute("class", newClass);
        }
    };
    var activateButton = function (buttonName) {
        var buttonElement = document.getElementById(buttonName + "-button");
        var buttonPath = buttonElement.getElementsByClassName("infographic-button-path")[0];
        var classString = buttonPath.getAttribute("class");
        if (classString.indexOf(" active") == -1) {
            var newClass = classString + " active";
            buttonPath.setAttribute("class", newClass);
        }
    };
    var deactivateButton = function (buttonName) {
        var buttonElement = document.getElementById(buttonName + "-button");
        var buttonPath = buttonElement.getElementsByClassName("infographic-button-path")[0];
        var classString = buttonPath.getAttribute("class");
        if (classString.indexOf(" active") != -1 && !buttonIsClicked(buttonName)) {
            var newClass = classString.replace(" active", "");
            buttonPath.setAttribute("class", newClass);
        }
    };
    var selectButton = function (name) {
        var tl = new TimelineLite();
        var buttonElement = document.getElementById(name + "-button");
        var buttonPath = buttonElement.getElementsByClassName("infographic-button-path")[0];
        var buttonPathSelected = buttonElement.getElementsByClassName("infographic-button-path-selected")[0];
        var buttonTextPath = buttonElement.getElementsByClassName("infographic-button-text-path")[0];
        var buttonTextPathSelected = buttonElement.getElementsByClassName("infographic-button-text-path-selected")[0];
        var buttonText = buttonElement.getElementsByClassName("st1")[0];
        tl.to(buttonText, 0.5, {
            fontSize: 15
            , autoRound: false
        });
        tl.to(buttonPath, 0.5, {
            morphSVG: buttonPathSelected
        }, 0);
        tl.to(buttonTextPath, 0.5, {
            morphSVG: buttonTextPathSelected
        }, 0);
    };
    var deselectButton = function (name) {
        var tl = new TimelineLite();
        var buttonElement = document.getElementById(name + "-button");
        var buttonPath = buttonElement.getElementsByClassName("infographic-button-path")[0];
        var buttonPathSelected = buttonElement.getElementsByClassName("infographic-button-path-original")[0];
        var buttonTextPath = buttonElement.getElementsByClassName("infographic-button-text-path")[0];
        var buttonTextPathSelected = buttonElement.getElementsByClassName("infographic-button-text-path-original")[0];
        var buttonText = buttonElement.getElementsByClassName("st1")[0];
        tl.to(buttonText, 0.5, {
            fontSize: 18
            , autoRound: false
        });
        tl.to(buttonPath, 0.5, {
            morphSVG: buttonPathSelected
        }, 0);
        tl.to(buttonTextPath, 0.5, {
            morphSVG: buttonTextPathSelected
        }, 0);
    };
    var clickedButton = function (buttonName) {
        var buttonElement = document.getElementById(buttonName + "-button");
        var buttonPath = buttonElement.getElementsByClassName("infographic-button-path")[0];
        var classString = buttonPath.getAttribute("class");
        if (classString.indexOf(" clicked") == -1) {
            var newClass = classString + " clicked";
            buttonPath.setAttribute("class", newClass);
            selectButton(buttonName);
            activateButton(buttonName);
            showText(buttonName);
        }
        else {
            var newClass = classString.replace(" clicked", "");
            buttonPath.setAttribute("class", newClass);
            deselectButton(buttonName);
        }
    };
    var enrollmentPulse = new TimelineLite();
    var intervalRef = setInterval(function () {
        var path = document.getElementById("enrollment-button").getElementsByTagName("path")[0];
        enrollmentPulse.clear();
        enrollmentPulse.to(path, 1, {
            scale: 1.1
            , transformOrigin: "center center"
        });
        enrollmentPulse.to(path, 1, {
            scale: 1
            , transformOrigin: "center center"
        }, 1.1);
    }, 2200);
    var enrollmentClicked = function () {
        clearInterval(intervalRef);
        enrollmentPulse.clear();
        var path = document.getElementById("enrollment-button").getElementsByTagName("path")[0];
        enrollmentPulse.to(path, 0.1, {
            scale: 1
            , transformOrigin: "center center"
        });
        var instructionText = document.getElementById("infographic-enrollment-instructions");
        instructionText.setAttribute("style", "fill:#8EC449; text-decoration: underline;");
        setTimeout(function () {
            showText('personalization');
            showText('eligibility');
            showText('compliance');
            showText('education');
            showText('decision-support');
        }, 1200);
    };
    var buttonMouseOver = function (element) {
        var name = element.getAttribute("id").replace("-button", "");
        activateButton(name);
        highlightText(name);
    };
    var buttonMouseOut = function (element) {
        var name = element.getAttribute("id").replace("-button", "");
        deactivateButton(name);
        unhighlightText(name);
    };
    var buttonClicked = function (element) {
        var name = element.getAttribute("id").replace("-button", "");
        clickedButton(name);
        enrollmentClicked();
    };
})(jQuery);