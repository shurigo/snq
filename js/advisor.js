
(function () {

    var s = document.getElementsByTagName('script')[0];

    /**
     * Loads the advisor kit
     */
    function loadsmart() {
        var src = '//js.advisor.smartfocus.com/advisor-core.min.js';
        if (/advisordebug=[Yy]/.test(document.URL) === true) {
            src = '//js.advisor.smartfocus.com/advisor-core.js';
        }
        var sr = document.createElement('script');
        sr.type = 'text/javascript';
        sr.async = true;
        sr.src = src;
        s.parentNode.insertBefore(sr, s);
    }

    /**
     * Checks the currently loaded version of JQuery against a min supported version
     *
     * @return {boolean}    true if we should update to the latest
     */
    function update() {
        var version = jQuery.fn.jquery.split('.');
        var minver = [1, 7, 0];
        var idx;

        if (version.length !== minver.length) {
            return true;
        }


        for (idx = 0; idx < minver.length; idx++) {
            if (parseInt(version[idx], 10) < minver[idx]) {
                return true;
            }
        }

        return false;

    }

    /**
     * Loads jquery with an optional callback after load is completed
     *
     * @param {function=} callback
     */
    function loadquery(callback) {
        var jq = document.createElement('script');
        jq.type = 'text/javascript';
        jq.async = true;
        jq.src = '//code.jquery.com/jquery-1.10.1.min.js';

        if (jq.readyState) {
            jq.onreadystatechange = function() {
                if (jq.readyState === "loaded" || jq.readyState === "complete") {
                    jq.onreadystatechange = null;
                    if (typeof callback === 'function') {
                        callback();
                    }
                }
            };
        } else {
            jq.onload = function() {
                if (typeof callback === 'function') {
                    callback();
                }
            };
        }

        s.parentNode.insertBefore(jq, s);
    }

    if (!window.jQuery) {
        var $old = window.$;
        loadquery(function() {
            window.$.noConflict();
            if ($old) {
                window.$ = $old;
            }
            loadsmart();
        });
    } else {
        if (update() === true) {
            loadquery(function() {
                window._sfajq = $.noConflict(true);
                loadsmart();
            });
        } else {
            loadsmart();
        }
    }
}());