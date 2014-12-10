var _advisorq = _advisorq || [];

_advisorq.push({
    _setAccount: {
        endpoint: '@ENDPOINT@',
        username: '@USERNAME@',
        accid: '@ACCID@'
    }
});

(function() {
    var s = document.getElementsByTagName('script')[0];
    var sr = document.createElement('script');
    sr.type = 'text/javascript';
    sr.async = true;
    sr.src = '//js.advisor.smartfocus.com/advisor.min.js';
    s.parentNode.insertBefore(sr, s);
}());


