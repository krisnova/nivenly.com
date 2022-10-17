var renderUNCRReCaptcha = function() {

    var ReCaptchaData = {
        'sitekey'   : UNCR.site_key,
        'theme'     : UNCR.theme, 
        'type'      : UNCR.type
    };

    

    for (var i = 0; i < document.forms.length; ++i) {
        var form = document.forms[i];
        var holder = form.querySelector('.uncr-g-recaptcha');

        if (null === holder) continue;
        holder.innerHTML = '';
            
        (function(frm){
            
            if ( UNCR.key_type == 'invisible' ) {

                ReCaptchaData.size = 'invisible';
                ReCaptchaData.badge = 'inline';
                ReCaptchaData.callback = function (recaptchaToken) { HTMLFormElement.prototype.submit.call(frm); };
                ReCaptchaData["expired-callback"] = function(){grecaptcha.reset(holderId);};

            }else if ( UNCR.submit_button == 'yes' ) {
                var submit_button = form.querySelector('input[type="submit"]');
                if ( submit_button ) {
                    submit_button.setAttribute('disabled','disabled');
                    ReCaptchaData.callback = function (recaptchaToken) { submit_button.removeAttribute('disabled'); };
                }
            }

            var holderId = grecaptcha.render(holder, ReCaptchaData );

             if ( UNCR.key_type == 'invisible' ) {
                frm.onsubmit = function (evt){evt.preventDefault();grecaptcha.execute(holderId);};
            }

        })(form);
    }

};
