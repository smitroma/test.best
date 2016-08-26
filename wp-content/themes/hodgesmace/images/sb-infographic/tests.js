<script type="text/javascript">
    //var makes it so cannot mouseover after
    var hoverCooldown = [];


    var buttonIsClicked = function(name) {
      var buttonElement = document.getElementById(name+"-button");
      var buttonPath = buttonElement.getElementsByClassName("infographic-button-path")[0];
      var classString = buttonPath.getAttribute("class");
      return classString.indexOf(" clicked") != -1;
    };

    var showText = function(name) {
      var textElement = document.getElementById(name+"-text-detail");
      var classString = textElement.getAttribute("class");
      if(classString.indexOf(" hide") != -1) {
        var newClass = classString.replace(" hide", "");
        textElement.setAttribute("class", newClass);
      }
    };

    var hideText = function (name) {
      var textElement = document.getElementById(name+"-text-detail");
      var classString = textElement.getAttribute("class");
      if(classString.indexOf(" hide") == -1 && !buttonIsClicked(name)) {
        var newClass = classString + " hide";
        textElement.setAttribute("class", newClass);
      }
    };

    var unhighlightText = function(name) {
      var textElement = document.getElementById(name+"-text-detail");
      var classString = textElement.getAttribute("class");
      if(classString.indexOf(" unhighlight") == -1 && !buttonIsClicked(name)) {
        var newClass = classString + " unhighlight";
        textElement.setAttribute("class", newClass);
      }
    };

    var highlightText = function(name) {
      var textElement = document.getElementById(name+"-text-detail");
      var classString = textElement.getAttribute("class");
      if(classString.indexOf(" unhighlight") != -1) {
        var newClass = classString.replace(" unhighlight", "");
        textElement.setAttribute("class", newClass);
      }
    };

    var activateButton = function (buttonName) {
      var buttonElement = document.getElementById(buttonName+"-button");
      var buttonPath = buttonElement.getElementsByClassName("infographic-button-path")[0];
      var classString = buttonPath.getAttribute("class");
      if(classString.indexOf(" active") == -1) {
        var newClass = classString + " active";
        buttonPath.setAttribute("class", newClass);
      }
    };

    var deactivateButton = function (buttonName) {
      var buttonElement = document.getElementById(buttonName+"-button");
      var buttonPath = buttonElement.getElementsByClassName("infographic-button-path")[0];
      var classString = buttonPath.getAttribute("class");
      if(classString.indexOf(" active") != -1 && !buttonIsClicked(buttonName)) {
        var newClass = classString.replace(" active", "");
        buttonPath.setAttribute("class", newClass);
      }
    };

    var selectButton = function (name) {
      var tl = new TimelineLite();
      var buttonElement = document.getElementById(name+"-button");
      var buttonPath = buttonElement.getElementsByClassName("infographic-button-path")[0];
      var buttonPathSelected = buttonElement.getElementsByClassName("infographic-button-path-selected")[0];
      var buttonTextPath = buttonElement.getElementsByClassName("infographic-button-text-path")[0];
      var buttonTextPathSelected = buttonElement.getElementsByClassName("infographic-button-text-path-selected")[0];

      var buttonText = buttonElement.getElementsByClassName("st1")[0];

      tl.to(buttonText, 0.5, { fontSize: 15, autoRound: false});
      tl.to(buttonPath, 0.5, {morphSVG:buttonPathSelected}, 0);
      tl.to(buttonTextPath, 0.5, {morphSVG:buttonTextPathSelected}, 0);
    };

    var deselectButton = function (name) {
      var tl = new TimelineLite();
      var buttonElement = document.getElementById(name+"-button");
      var buttonPath = buttonElement.getElementsByClassName("infographic-button-path")[0];
      var buttonPathSelected = buttonElement.getElementsByClassName("infographic-button-path-original")[0];
      var buttonTextPath = buttonElement.getElementsByClassName("infographic-button-text-path")[0];
      var buttonTextPathSelected = buttonElement.getElementsByClassName("infographic-button-text-path-original")[0];

      var buttonText = buttonElement.getElementsByClassName("st1")[0];

      tl.to(buttonText, 0.5, { fontSize: 18, autoRound: false});
      tl.to(buttonPath, 0.5, {morphSVG:buttonPathSelected}, 0);
      tl.to(buttonTextPath, 0.5, {morphSVG:buttonTextPathSelected}, 0);
    };

    var clickedButton = function (buttonName) {
      var buttonElement = document.getElementById(buttonName+"-button");
      var buttonPath = buttonElement.getElementsByClassName("infographic-button-path")[0];
      var classString = buttonPath.getAttribute("class");
      if(classString.indexOf(" clicked") == -1) {
        var newClass = classString + " clicked";
        buttonPath.setAttribute("class", newClass);
        selectButton(buttonName);
        activateButton(buttonName);
        showText(buttonName);
      } else {
        var newClass = classString.replace(" clicked", "");
        buttonPath.setAttribute("class", newClass);
        deselectButton(buttonName);
      }
    };
    var enrollmentPulse = new TimelineLite();
    var intervalRef = setInterval (function () {

      var path = document.getElementById("enrollment-button").getElementsByTagName("path")[0];
      enrollmentPulse.clear();
      enrollmentPulse.to(path, 1, { scale: 1.1 , transformOrigin: "center center" });
      enrollmentPulse.to(path, 1, { scale: 1 , transformOrigin: "center center" }, 1.1);
    }, 2200);

    var enrollmentClicked = function () {
      clearInterval(intervalRef);
      enrollmentPulse.clear();
      var path = document.getElementById("enrollment-button").getElementsByTagName("path")[0];
      enrollmentPulse.to(path, 0.1, { scale: 1 , transformOrigin: "center center" });
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


    var buttonMouseOver = function(element) {
      var name = element.getAttribute("id").replace("-button", "");
      activateButton(name);
      highlightText(name);
    };

    var buttonMouseOut = function(element) {
      var name = element.getAttribute("id").replace("-button", "");
      deactivateButton(name);
      unhighlightText(name);
    };

    var buttonClicked = function(element) {
      var name = element.getAttribute("id").replace("-button", "");
      clickedButton(name);
      enrollmentClicked();
    };

if(navigator.userAgent.toLowerCase().indexOf('firefox') > -1){
     // Do Firefox-related activities
     document.getElementById("personalizationTextPath").setAttribute("startOffset", "-1%");
     document.getElementById("educationTextPath").setAttribute("startOffset", "86.2%");
     document.getElementById("eligibilityTextPath").setAttribute("startOffset", "2%");
     document.getElementById("complianceTextPath").setAttribute("startOffset", "2%");
     document.getElementById("decisionTextPath").setAttribute("startOffset", "-.8%");
};
</script>