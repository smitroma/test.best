jQuery(document).ready(function ($) {
    if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
        // Do Firefox-related activities
        document.getElementById("personalizationTextPath").setAttribute("startOffset", "-1%");
        document.getElementById("educationTextPath").setAttribute("startOffset", "86.2%");
        document.getElementById("eligibilityTextPath").setAttribute("startOffset", "2%");
        document.getElementById("complianceTextPath").setAttribute("startOffset", "2%");
        document.getElementById("decisionTextPath").setAttribute("startOffset", "-.8%");
    }
})(jQuery);