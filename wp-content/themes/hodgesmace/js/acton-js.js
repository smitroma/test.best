<!-- doSubmit -->
<script>
    function doSubmit(form) {
        try {
            if (typeof (customSubmitProcessing) === "function")
                customSubmitProcessing();
        } catch (err) {}
        var submitButton = document.getElementById(form.id + '_ao_submit_button');
        submitButton.style.visibility = 'hidden';
        //	Check required fields
        var missingCount = 0;
        for (var i = 0; i < requiredFields.length; i++)
            missingCount += missing(requiredFields[i]);
        for (var i = 0; i < requiredFieldGroups.length; i++)
            missingCount += missingGroup(requiredFieldGroups[i][0], requiredFieldGroups[i][1]);
        if (missingCount > 0) {
            alert('Please fill all required (*) fields. ');
            submitButton.style.visibility = 'visible';
            return;
        }
        //  Validate email field
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

        for (var i = 0; i < validatedFields.length; i++) {
          var ff = validatedFields[i];
          if(ff[1] === "EMAIL") {
            var valid = excludedDomains.filter( function(d){
              return document.getElementById(ff[0]).value.indexOf(d) > -1;
            }).length === 0;
            if(!valid){
              alert('Not a valid company email address. ');
              submitButton.style.visibility = 'visible';
              return
            }
          }
        }
        //	Validate all fields
        for (var i = 0; i < validatedFields.length; i++) {
            var ff = validatedFields[i];
            if (!validateField(ff[0], ff[1], ff[2], ff[3])) {
                document.getElementById(ff[0]).focus();
                submitButton.style.visibility = 'visible';
                return;
            }
        }
        //	Make sure it is not a preview situation
        if (document.getElementById('ao_p').value === '1') {
            submitButton.style.visibility = 'visible';
            return;
        }
        // Enable the form handler
        document.getElementById('ao_bot').value = 'nope';
        try {
            // Save the parent href if the form is in an iframe
            document.getElementById('ao_iframe').value = window.parent ? window.parent.location.href : "";
        } catch (xxx) {}
        dataLayer.push({
          'event' : 'aoFormSubmit'
        });
        form.submit();
    }

</script>
<!-- doSubmit -->
