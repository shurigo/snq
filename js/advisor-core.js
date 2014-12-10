(function($) {

'use strict';


// ----------------------------------------------------------------------------------------
// Prototypes - http://javascript.crockford.com/remedial.html
// ----------------------------------------------------------------------------------------

if (!String.prototype.trim) {
    String.prototype.trim = function () {
        return this.replace(/^\s*(\S*(?:\s+\S+)*)\s*$/, "$1");
    };
}

if (!String.prototype.entityify) {
    String.prototype.entityify = function () {
        return this.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
    };
}

if (!Array.prototype.indexOf) {
    Array.prototype.indexOf = function (searchElement /*, fromIndex */ ) {
        'use strict';
        if (this === null) {
            throw new TypeError();
        }
        var n, k, t = Object(this),
            len = t.length >>> 0;

        if (len === 0) {
            return -1;
        }
        n = 0;
        if (arguments.length > 1) {
            n = Number(arguments[1]);
            if (n != n) { // shortcut for verifying if it's NaN
                n = 0;
            } else if (n != 0 && n != Infinity && n != -Infinity) {
                n = (n > 0 || -1) * Math.floor(Math.abs(n));
            }
        }
        if (n >= len) {
            return -1;
        }
        for (k = n >= 0 ? n : Math.max(len - Math.abs(n), 0); k < len; k++) {
            if (k in t && t[k] === searchElement) {
                return k;
            }
        }
        return -1;
    };
}

// ----------------------------------------------------------------------------------------
// Console patch - noop implementation for IE
// ----------------------------------------------------------------------------------------
if (window.console === undefined) {
    window.console = {};

    var noop = function() {};

    window.console.assert = noop;
    window.console.clear = noop;
    window.console.count = noop;
    window.console.debug = noop;
    window.console.dir = noop;
    window.console.dirxml = noop;
    window.console.error = noop;
    window.console.group = noop;
    window.console.groupCollapsed = noop;
    window.console.groupEnd = noop;
    window.console.info = noop;
    window.console.log = noop;
    window.console.profile = noop;
    window.console.profileEnd = noop;
    window.console.time = noop;
    window.console.timeEnd = noop;
    window.console.timeStamp = noop;
    window.console.trace = noop;
    window.console.warn = noop;
}

var console = window.console;

/**
 * Utility functions and classes.
 *
 * @module utils
 * @namespace utils
 */
var utils = utils || {};

/**param {configLang}
 * Gets the parameter as user's specified language in _setConfig tag.Returns the same or if not specified returns  user's preferred value in browser *
   It is adding a new attribute in request as 'lastViewedLanguage'
 * @returns String 
 *
 * @memberof utils
 */
utils.getLanguage=function(configLang){
	var userLang=configLang;
	
	if (userLang === undefined && navigator != null)
		{          	
	      userLang = navigator.userLanguage|| navigator.language ||navigator.browserLanguage || navigator.systemLanguage;		  
		  
		  if(!utils.isNil(userLang))	{             		  
	         userLang= userLang.trim();
		  }
	    }
		return userLang;
		
};

/**
 * value is String here.Returns true when 'value' is empty or has spaces in it otherwise false.
 * This method not checking for null or undefined.
 * @returns boolean 
 *
 * @memberof utils
 */
utils.isEmpty=function(value) {
		return value.length === 0 || !value.trim();		
 };	

/**
	* Gets the value of a cookie provided the cookie name as parameter.
	* Used by abandon cart to get the value of cookie for showing pop up.
	 * @returns String 
	 *
	 * @memberof utils
 */
utils.readCookie=function(cookieName){   
		var nameEQ = cookieName + "=";
		var cookieArr = document.cookie.split(';');	
		for(var i=0;i < cookieArr.length;i++) {
			var propStr = cookieArr[i];		
			while (propStr.charAt(0)==' ') 
			{
				propStr = propStr.substring(1,propStr.length);
			}
			if (propStr.indexOf(nameEQ) == 0)
	        {		
			return propStr.substring(nameEQ.length,propStr.length);
		     }
		}
		return null;
	};

/**
	 * Creates cookie provided parameters:
	 * (cookieName,cookieValue,config,days)
	 * 
	 * @memberof utils
*/
utils.createCookie=function(cookieName,cookieValue,config,days){	 
		 var expires;
		 if (days) {
				var date = new Date();
				date.setTime(date.getTime()+(parseInt(days)*24*60*60*1000));
				expires = "; expires="+date.toGMTString();
			}
			else{ 
				expires = "";
			}
			 
	 document.cookie=cookieName+'='+cookieValue+expires+';path=' + config.cookiePath() + '; domain=' + config.cookieDomain();
};

/**
 * Gets the list of query parameters from the URL.
 *
 * @returns {Object}    Key/Value pairs from the query string. If no query/search string is found returns an empty
 * object.
 *
 * @memberof utils
 */
utils.getQueryParams = function (query) {

    var qparams = {};
    var aItKey, nKeyId, aCouples, sval;

    query = query || window.location.search;

    if (query.length <= 1) {
        return {};
    }

    if (query.charAt(0) === '?') {
        query = query.substr(1);
    }

    for (nKeyId = 0, aCouples = query.split("&"); nKeyId < aCouples.length; nKeyId++) {
        aItKey = aCouples[nKeyId].split("=");

        if (aItKey.length < 1) {
            qparams[decodeURIComponent(aItKey[0])] = undefined;
        } else {
            qparams[decodeURIComponent(aItKey[0])] = decodeURIComponent(aItKey[1]);
        }
    }

    return qparams;

};

/**
 * Checks for null or undefined values
 *
 * @param {*} value
 * @returns {boolean}   true if the value is either undefined or null
 */
utils.isNil = function(value) {
    return value === undefined || utils.typeOf(value) === 'null';
};

/**
 * Determines if a given number is finite
 *
 * @param num
 * @returns {boolean}
 */
utils.isFinite = function(num) {
    return isFinite(num) && !isNaN(num);
};

/**
 * Determines if the current user agent is a bot (spider).
 *
 * @return {boolean}    <code>true</code> if this is a known bot.
 *
 * @memberof utils
 */
utils.isBot = function () {

    if (navigator.userAgent === undefined || navigator.userAgent.length <= 0) {
        return false;
    }

    // Valid UA Patterns for bots
    var botPatterns = [
        /AdsBot-Google/, /agbot\//, /Baiduspider\+/, /BlogPulseLive/, /Googlebot/, /008\//,
        /abby\//, /Ask Jeeves\//, /Butterfly\//, /DotBot\//, /Exabot\//, /mxbot\//, /ScoutJet/,
        /spbot\//, /Yahoo\! Slurp/, /YandexBot\//, /YoudaoBot\//, /Twiceler/, /Speedy Spider/,
        /msnbot/, /R6_/, /SBIder\//, /Sosospider\+/, /Surphace Scout/, /TinEye\//
    ];

    var patternCount = botPatterns.length;
    var idx;

    for (idx = 0; idx < patternCount; idx++) {
        if (botPatterns[idx].test(navigator.userAgent) === true) {
            return true;
        }
    }

    return false;
};


/**
 * Better 'typeof' function that returns 'array' for arrays and 'null' for null.
 *
 * @param {*}   value    The value to test
 *
 * @returns {string} The object type - this is basically the same return as 'typeof' but checks properly for
 * <code>null</code> and <code>array</code> types
 *
 * @memberof utils
 */
utils.typeOf = function (value) {
    var s = typeof value;
    if (s === 'object') {
        if (value) {
            if (value instanceof Array || Object.prototype.toString.call(value) === '[object Array]') {
                s = 'array';
            }
        } else {
            s = 'null';
        }
    }
    return s;
};

/**
 * Loops through each property on the given object applying the callback with a name and its value:
 * <p/>
 * <code>callback(key,value) {...}</code>
 *
 * @param {!Object}        obj                      The object whose properties to loop over
 * @param {!function(string, Object)}  callback     Callback function of the form: <code>callback(key,value) {...}</code>. The callback
 *                                                  function should return <code>true</code> or <code>false</code> to either continue
 *                                                  looping or break.
 *
 * @memberof utils
 */
utils.forEach = function (obj, callback) {
    if (utils.typeOf(callback) !== "function" || obj === undefined) {
        return;
    }

    var prop;

    for (prop in obj) {
        if (obj.hasOwnProperty(prop) && callback(prop, obj[prop]) === false) {
            break;
        }
    }
};

/**
 * Utility method used to extract a function from an object. This weill return the first function found.
 *
 * @param obj   The object to extract the function from
 *
 * @returns {function|undefined}
 */
utils.getFunc = function (obj) {

    if (obj === undefined) {
        return undefined;
    }

    var fun;

    utils.forEach(obj, function (key, value) {
        if (utils.typeOf(key) !== "string") {
            return true;
        }

        if (utils.typeOf(value) !== "object" && utils.typeOf(value) !== "function") {
            return true;
        }

        fun = key;
        return false;
    });

    return fun;


};

/**
 * Pretty prints an object
 *
 * @param {*} obj   The object to print
 *
 * @return  {string}    Pretty print version of the object
 */
utils.pretty = function (obj) {
    var str = utils.typeOf(obj);
    var idx;

    if (utils.typeOf(obj) === 'null' || obj === undefined) {
        return str;
    }

    str += ' ';

    if (utils.typeOf(obj) === 'array') {
        str += '[';

        for (idx = 0; idx < obj.length; idx++) {
            str += '' + obj[idx] + ',';
        }

        if (str.charAt(str.length - 1) === ',') {
            str = str.substr(0, str.length - 1);
        }

        str += ']';

        return str;
    }

    if (utils.typeOf(obj) === 'object') {
        str += '{';
        utils.forEach(obj, function (k, v) {
            str += k + ':' + v + ',';
            return true;
        });

        if (str.charAt(str.length - 1) === ',') {
            str = str.substr(0, str.length - 1);
        }
        str += '}';

        return str;
    }

    if (utils.typeOf(obj === 'string')) {
        return str + '\'' + obj + '\'';
    }

    return str + '[' + obj + ']';
};

/**
 * Gets the window location. The returned location value can be customized based on the various config parameters. If no
 * configuration is provided the default is the entire URL string.
 *
 *  @param {Object} [config]    Configuration options for getting the location.
 *
 *  @property {boolean} config.stripSearch - Whether to strip the search(query) part of the URL.
 */
utils.getLocation = function (config) {
    if (config && config['stripSearch'] === true) {
        return window.location.protocol + '//' + window.location.hostname + window.location.pathname;
    }

    return window.location.toString();

};

/**
 * List of search engine query URLs
 *
 * @type {{bing: RegExp, yahoo: RegExp, google: RegExp, ask: RegExp}}
 */
utils.sengines = {
    bing:   /www\.bing\.com\/search.*\?.*q=(.*?)(?:&.*)$/,
    yahoo:  /.*yahoo\..*\/search.*\?.*p=(.*?)(?:&.*)$/,
    google:  /.*google\..*\?.*q=(.*?)(?:&.*)$/,
    ask:  /.*ask\..*\?.*q=(.*?)(?:&.*)$/
};

/**
 * Utility function that is used to parse the <code>document.referrer</code>
 *
 *  @returns ({{provider: string, query: string}}|undefined)
 */
utils.parseReferer = function(referrer) {
    if (utils.typeOf(referrer) !== 'string') {
        return undefined;
    }

    var provider;
    var matches;

    utils.forEach(utils.sengines, function(k, v) {
        matches = v.exec(referrer);

        if (matches === undefined || matches === null || matches.length !== 2) {
            return true;
        }

        provider = {provider: k, query: decodeURIComponent(matches[1].replace(/\+/g, ' '))};

        return false;
    });

    return provider;

};

/**
 * Filters an array based on the return value of the <code>filter</code> function.
 *
 * @param arr   The array to filter
 *
 * @param {function(*):boolean} filter  Filter function to determine if a parsed parameter should be accepted or not
 *
 * @returns {Array}
 */
utils.filterArray = function(arr, filter) {

    var idx;
    var filtered = [];

    if (utils.typeOf(arr) !== 'array' || utils.typeOf(filter) !== 'function') {
        return arr;
    }

    for (idx = 0; idx < arr.length; idx++) {
        if (filter(arr[idx]) === true) {
            filtered.push(arr[idx]);
        }
    }

    return filtered;
};

/**
 * Safe join method that can be used for any type. If <code>arr</code> is an array, this method calls <code>join</code> otherwise
 * it returns te argument unchanged.
 * @param {*}       arr     The object to join
 * @param {string=} sep     The seperator to use, defaults to <code>','</code>
 * @returns {string|*}  The joined array or the unmodified arr argument
 */
utils.join = function(arr, sep) {
    if (utils.typeOf(arr) !== 'array') {
        return arr;
    }

    if (sep === undefined) {
        sep = ',';
    }

    return arr.join(sep);

};

/**
 * Check if email is valid
 * @param {string}      email     email address
 * @returns {boolean}
 */
utils.isEmail = function (email) {
    var valid = false;
    
    // email shouldn't be empty or contain only the space
    if (email != '' && email != null && !/^\s+$/.test(email)) {
        // check if email is valid
        if (/^([a-z0-9,!\#\$%&'\*\+\/=\?\^_`\{\|\}~-]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z0-9,!\#\$%&'\*\+\/=\?\^_`\{\|\}~-]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*@([a-z0-9-]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z0-9-]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*\.(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]){2,})$/i.test(email)){
            valid = true;
        }
    }

    return valid;
};var utils = utils || {};

/**
 * Creates a new Config instance
 *
 * @returns {{set: Function, get: Function, sku: Function, autoDefer: Function, cartChargesName: Function, supressAutoNotification: Function, tag: Function, stores: Function, debug: Function, visitorQueryParam: Function, emailQueryParam: Function, currentPath: Function, exclusionSkus: Function, observeIncomingSearchTerm: Function, cookieName: Function, cookieDomain: Function, cookiePath: Function, sku: Function}}
 *
 * @constructor
 * @struct
 *
 * @memberOf utils
 */
utils.Config = function () {


    /**
     * Filter function for arrays which accepts strings and numbers only
     * @param arg   The array element
     *
     * @returns {boolean}   true if the argument is a string or a number
     *
     * @private
     */
    var nsfilter = function (arg) {
        return typeof arg === 'string' || typeof arg === 'number';
    };

    /**
     * Gets the default cookie domain to use
     *
     * @returns {string}    Default cookie domain
     *
     * @private
     */
    var getDefaultCookieDomain = function () {
        if (/^(\d+)(?:\.(\d+)){3}$/.test(window.location.hostname)) {
            return window.location.hostname;
        }

        return '.' + window.location.hostname;

    };

    /**
     * The internal options object
     *
     * @type {{cookieName: string, cookieDomain: string, cookiePath: string, sku: undefined, observeIncomingSearchTerm: boolean, supressAutoNotification: boolean, exclusionSkus: undefined, currentPath: undefined, emailQueryParam: string, visitorQueryParam: undefined, debug: boolean, tag: string, stores: string, cartChargesName: string, autoDefer: boolean}}
     *
     */
    var opts = {
        cookieName: 'advisor',
        cookieDomain: getDefaultCookieDomain(),
        cookiePath: '/',
        sku: undefined,
        observeIncomingSearchTerm: true,
        supressAutoNotification: false,
        exclusionSkus: undefined,
        currentPath: undefined,
        emailQueryParam: 'email',
        visitorQueryParam: undefined,
        debug: false,
        tag: '1',
        stores: '1',
        cartChargesName: 'cartCharges',
        autoDefer: true,
        contentType:undefined,
        contentOrigin : undefined,
        numberOfPopupToShowAbandoncart:'1',
		cookieNameForAbandonCart: 'advisorAbandoncart',
		currentPreferedLanguage:undefined
    };


    /**
     * Gets or sets the <code>opts.autoDefer<code> option.
     *
     * @param {boolean|undefined}   autoDefer    The new value or undefined to reset to default value
     */
    var autoDefer = function (autoDefer) {
        if (arguments.length === 0) {
            return opts.autoDefer;
        }

        if (utils.isNil(autoDefer) || autoDefer === true) {
            opts.autoDefer = true;
        } else if (autoDefer === false) {
            opts.autoDefer = false;
        }
    };

    /**
     * Gets or sets the <code>opts.cartChargesName<code> option.
     *
     * @param {string|undefined}   cartChargesName    The new value or undefined to reset to default value
     *
     */
    var cartChargesName = function (cartChargesName) {
        if (arguments.length === 0) {
            return opts.cartChargesName;
        }

        if (utils.isNil(cartChargesName)) {
            opts.cartChargesName = 'cartCharges';
        } else if (typeof cartChargesName === 'string' && cartChargesName.trim()) {
            opts.cartChargesName = cartChargesName;
        }

    };

    /**
     * Gets or sets the <code>opts.supressAutoNotification<code> option.
     *
     * @param {boolean|undefined}   supressAutoNotification    The new value or undefined to reset to default value
     *
     * @returns {boolean}
     */
    var supressAutoNotification = function (supressAutoNotification) {
        if (arguments.length === 0) {
            return opts.supressAutoNotification;
        }

        if (supressAutoNotification === true) {
            opts.supressAutoNotification = true;
        } else if (utils.isNil(supressAutoNotification) || supressAutoNotification === false) {
            opts.supressAutoNotification = false;
        }
    };

    /**
     * Gets or sets the <code>opts.tag<code> option.
     *
     * @param {string|undefined}   tag    The new value or undefined to reset to default value
     */
    var tag = function (tag) {
        if (arguments.length === 0) {
            return opts.tag;
        }

        if (utils.isNil(tag)) {
            opts.tag = '1';
        } else if (typeof tag === 'string' && tag.trim().length > 0) {
            opts.tag = tag.trim();
        }
    };

    /**
     * Gets or sets the <code>opts.stores<code> option.
     *
     * @param {string|Array.<string>|undefined}   stores    The new value or undefined to reset to default value
     */
    var stores = function (stores) {
        if (arguments.length === 0) {
            return opts.stores;
        }

        if (utils.isNil(stores)) {
            opts.stores = '1';
        } else if (typeof stores === 'string' && stores.trim().length > 0) {
            opts.stores = stores.trim();
        } else if (utils.typeOf(stores) === 'array' && stores.length > 0) {
            opts.stores = utils.join(utils.filterArray(stores, nsfilter), ',');
        }
    };

    /**
     * Gets or sets the <code>opts.debug<code> option.
     *
     * @param {boolean|undefined}   debug    The new value or undefined to reset to default value
     */
    var debug = function (debug) {
        if (arguments.length === 0) {
            return opts.debug;
        }

        if (utils.isNil(debug) || debug === false) {
            opts.debug = false;
        } else if (debug === true) {
            opts.debug = true;
        }
    };

    /**
     *
     * @param visitorQueryParam
     * @returns {*}
     */
    var visitorQueryParam = function (visitorQueryParam) {
        if (arguments.length === 0) {
            return opts.visitorQueryParam;
        }

        if (utils.isNil(visitorQueryParam)) {
            opts.visitorQueryParam = undefined;
        } else if (typeof visitorQueryParam === 'string' && visitorQueryParam.trim().length > 0) {
            opts.visitorQueryParam = visitorQueryParam.trim();
        }
    };

    /**
     *  Gets or sets the email query parameter
     *
     *  @emailQueryParam {string=} emailQueryParam   The URL query parameter corresponding to the email value
     *
     *  @returns {string|undefined}  The URL email query parameter
     */
    var emailQueryParam = function (emailQueryParam) {
        if (arguments.length === 0) {
            return opts.emailQueryParam;
        }

        if (utils.isNil(emailQueryParam)) {
            opts.emailQueryParam = 'email';
        } else if (utils.typeOf(emailQueryParam) === 'string' && emailQueryParam.trim().length > 0) {
            opts.emailQueryParam = emailQueryParam.trim();
        }
    };

    /**
     * Gets or sets the <code>currentPath</code> option.
     *
     * @param {array|function():array}    [currentPath] Optional parameter to set the new value
     *
     * @returns {(array|undefined)} Current currentPath value which can be an empty array
     */
    var currentPath = function (currentPath) {
        if (arguments.length === 0) {
            return opts.currentPath;
        }

        if (utils.isNil(currentPath)) {
            opts.currentPath = undefined;
        } else if (utils.typeOf(currentPath) === 'array' && currentPath.length > 0) {
            opts.currentPath = currentPath;
        }
    };

    /**
     * Gets or sets the exlusion opts.skus.
     *
     * @param {string|number|array}    exclusionSkus Optional parameter to set the new value
     *
     * @returns {array|undefined}
     */
    var exclusionSkus = function (exclusionSkus) {
        if (arguments.length === 0) {
            return opts.exclusionSkus;
        }

        if (utils.isNil(exclusionSkus)) {
            opts.exclusionSkus = undefined;
        } else if (utils.typeOf(exclusionSkus) === 'array') {
            opts.exclusionSkus = utils.filterArray(exclusionSkus, nsfilter);
        } else if (utils.typeOf(exclusionSkus) === 'string' && exclusionSkus.trim().length > 0) {
            opts.exclusionSkus = [exclusionSkus.trim()];
        } else if (utils.typeOf(exclusionSkus) === 'number') {
            opts.exclusionSkus = [exclusionSkus.toString()];
        }
    };

    /**
     * Gets or sets the <code>opts.observeIncomingSearchTerm<code> option.
     *
     * @param {boolean|undefined}   observeIncomingSearchTerm    The new value or undefined to reset to default value
     *
     * @returns {boolean}
     */
    var observeIncomingSearchTerm = function (observeIncomingSearchTerm) {
        if (arguments.length === 0) {
            return opts.observeIncomingSearchTerm;
        }

        if (observeIncomingSearchTerm === false) {
            opts.observeIncomingSearchTerm = false;
        } else if (utils.isNil(observeIncomingSearchTerm) || observeIncomingSearchTerm === true) {
            opts.observeIncomingSearchTerm = true;
        }
    };

    /**
     * Gets or sets the <code>opts.cookieName<code> option.
     *
     * @param {string|undefined}   cookieName    The new value or undefined to reset to default value
     *
     * @returns {string}
     */
    var cookieName = function (cookieName) {

        if (arguments.length === 0) {
            return opts.cookieName;
        }

        if (utils.typeOf(cookieName) === 'string') {
            if (cookieName.trim().length === 0) {
                opts.cookieName = 'advisor';
            } else {
                opts.cookieName = cookieName.trim();
            }
        } else if (utils.isNil(cookieName)) {
            opts.cookieName = 'advisor';
        }

    };

    /**
     * Gets or sets the <code>opts.cookieName<code> option.
     *
     * @param {string|undefined}   cookieDomain    The new value or undefined to reset to default value
     *
     * @returns {string}
     */
    var cookieDomain = function (cookieDomain) {
        if (arguments.length === 0) {
            return opts.cookieDomain;
        }

        if (utils.typeOf(cookieDomain) === 'string') {
            if (cookieDomain.trim().length === 0) {
                opts.cookieDomain = getDefaultCookieDomain();
            } else {
                opts.cookieDomain = cookieDomain.trim();
            }
        } else if (utils.isNil(cookieDomain)) {
            opts.cookieDomain = getDefaultCookieDomain();
        }
    };

    /**
     * Gets or sets the <code>opts.cookiePath<code> option.
     *
     * @param {string|undefined}   cookiePath    The new value or undefined to reset to default value
     *
     * @returns {string}
     */
    var cookiePath = function (cookiePath) {
        if (arguments.length === 0) {
            return opts.cookiePath;
        }

        if (utils.typeOf(cookiePath) === 'string') {
            if (cookiePath.trim().length === 0) {
                opts.cookiePath = '/';
            } else {
                opts.cookiePath = cookiePath.trim();
            }
        } else if (utils.isNil(cookiePath)) {
            opts.cookiePath = '/';
        }
    };

    /**
     * Gets or sets the <code>opts.sku<code> option.
     *
     * @param {string|number|array|undefined}   sku    The new value or undefined to unset it.
     *
     * @returns {array|undefined}
     */
    var sku = function (sku) {
        if (arguments.length === 0) {
            return opts.sku;
        }

        if (utils.isNil(sku)) {
            opts.sku = undefined;
        } else if (utils.typeOf(sku) === 'string') {
            if (sku.trim().length === 0) {
                opts.sku = undefined;
            } else {
                opts.sku = sku.trim();
            }
        } else if (utils.typeOf(sku) === 'number' && utils.isFinite(sku)) {
            opts.sku = sku.toString();
        } else if (utils.typeOf(sku) === 'array') {
            opts.sku = utils.filterArray(sku, nsfilter);
        }

    };

    /**
     * Gets or sets the <code>opts.contentType<code> option.
     *
     * @param {string|undefined}   tag    The new value or undefined to reset to default value
     */
    var contentType = function (contentType) {
        if (arguments.length === 0) {
            return opts.contentType;
        }

        if (typeof contentType === 'string' && contentType.trim().length > 0) {
            opts.contentType = contentType.trim();
        }
    };
    
    var contentOrigin = function (contentOrigin) {
        if (arguments.length === 0) {
            return opts.contentOrigin;
        }

        if (typeof contentOrigin === 'string' && contentOrigin.trim().length > 0) {
            opts.contentOrigin = contentOrigin.trim();
        }
    }
    
    /**
     * Gets or sets the <code>opts.numberOfPopupToShowAbandoncart<code> option.
     *
     * @param {string|undefined|integer} Default is set as 1.
     * 
     *  */ 
    var numberOfPopupToShowAbandoncart = function (numberOfPopupToShowAbandoncart) {       
        if (arguments.length === 0) {
            return opts.numberOfPopupToShowAbandoncart;
        }
         
        if (utils.isNil(numberOfPopupToShowAbandoncart)) {
             opts.numberOfPopupToShowAbandoncart = '1';
            
        }  else if (utils.typeOf(numberOfPopupToShowAbandoncart) === 'number' && utils.isFinite(numberOfPopupToShowAbandoncart)) {		  
            opts.numberOfPopupToShowAbandoncart = numberOfPopupToShowAbandoncart.toString();
        }
        
        else if (utils.typeOf(numberOfPopupToShowAbandoncart) === 'string') {		
             opts.numberOfPopupToShowAbandoncart = '1';
        }
		
    };
    
    /**
     * Gets or sets the <code>opts.cookieNameForAbandonCart<code> option.
     *
     * @param {string|undefined} Name of cookie for Abandon Cart
     * 
     *      */
    var cookieNameForAbandonCart = function (cookieNameForAbandonCart) {
        if (arguments.length === 0) {
            return opts.cookieNameForAbandonCart;
        }       
        
        if (utils.typeOf(cookieNameForAbandonCart) === 'string') {
            if (cookieNameForAbandonCart.trim().length === 0) {
                opts.cookieNameForAbandonCart = 'advisorAbandoncart';
            } else {
                opts.cookieNameForAbandonCart = cookieNameForAbandonCart.trim();
            }
        } else if (utils.isNil(cookieNameForAbandonCart)) {
            opts.cookieNameForAbandonCart = 'advisorAbandoncart';
        }
		
    };
    
    /**Gets the user's current language in which site is browsed which is provided in _setConfig tag in RDK.
    * @param {string|undefined|null|empty string} currentPreferedLanguage
    * @returns {*}
    */
	var currentPreferedLanguage=function(currentPreferedLanguage){
		
	 if (arguments.length === 0) {	        
           return opts.currentPreferedLanguage;
       }		
	if (utils.isNil(currentPreferedLanguage) || utils.typeOf(currentPreferedLanguage) === 'number' || utils.typeOf(currentPreferedLanguage) === 'array') {	         
           opts.currentPreferedLanguage = undefined;
       } else if (typeof currentPreferedLanguage === 'string' && currentPreferedLanguage.trim().length > 0) {		    
           opts.currentPreferedLanguage = currentPreferedLanguage.trim();
       }
		else if(utils.isEmpty(currentPreferedLanguage)){
		   opts.currentPreferedLanguage = undefined;
		}
	};
	

    /**
     * Gets the current raw configuration object
     *
     * @returns {{cookieName: string, cookieDomain: string, cookiePath: string, sku: undefined, observeIncomingSearchTerm: boolean, supressAutoNotification: boolean, exclusionSkus: undefined, currentPath: undefined, emailQueryParam: string, visitorQueryParam: undefined, debug: boolean, tag: string, stores: string, cartChargesName: string, autoDefer: boolean}}
     */
    var get = function () {
        return opts;
    };

    /**
     * Bulk set for the config options
     *
     * @param {object.<string,*>} config   Config object
     */
    var set = function (config) {
        if (utils.typeOf(config) !== 'object') {
            return;
        }

        var self = this;

        utils.forEach(config, function (k, v) {

            var func = self[k];

            if (utils.typeOf(func) !== 'function') {
                return;
            }

            if (utils.typeOf(v) === 'function') {
                v = v.apply(window);
            }


            func.apply(self, [v]);
        });
    };

    return {
        set: set,
        get: get,
        sku: sku,
        autoDefer: autoDefer,
        cartChargesName: cartChargesName,
        supressAutoNotification: supressAutoNotification,
        tag: tag,
        stores: stores,
        debug: debug,
        visitorQueryParam: visitorQueryParam,
        emailQueryParam: emailQueryParam,
        currentPath: currentPath,
        exclusionSkus: exclusionSkus,
        observeIncomingSearchTerm: observeIncomingSearchTerm,
        cookieName: cookieName,
        cookieDomain: cookieDomain,
        cookiePath: cookiePath,
        contentType: contentType,
        contentOrigin : contentOrigin,
        numberOfPopupToShowAbandoncart : numberOfPopupToShowAbandoncart,		
        cookieNameForAbandonCart : cookieNameForAbandonCart,
        currentPreferedLanguage :currentPreferedLanguage
    };

};
var utils = utils || {};

/**
 * Implementation of the localStorage interface based on cookies
 *
 * @returns {{length:int, key:Function, getItem:Function, setItem:Function, removeItem:Function, clear:Function}}
 * @constructor
 */
utils.CookieStorage = function() {

    var self = {};


    var k;
    var keys = [];
    var cookies = (function() {

        if (document.cookie === undefined || document.cookie.length === 0) {
            return {};
        }

        var cookies = {};
        var parts = document.cookie.split(';');
        var pieces;
        var idx;
        var key, val;
        for (idx = 0; idx < parts.length; idx++) {

            pieces = parts[idx].split('=');

            if (!pieces || pieces.length < 2) {
                continue;
            }

            key = pieces[0].trim();
            val = pieces[1].trim();

            if (!key || !val || key.indexOf('sacm.') !== 0) {
                continue;
            }

            cookies[decodeURIComponent(key)] = decodeURIComponent(val);
        }

        return cookies;
    }());

    for (k in cookies) {
        if (cookies.hasOwnProperty(k)) {
            keys.push(k);
        }
    }

    self.length = keys.length;

    self.key = function(n) {
        if (n < 0 || n >= keys.length) {
            return undefined;
        }

        return keys[n];
    };

    self.getItem = function(name) {
        return cookies[name];
    };


    self.setItem = function(name, value) {

        if (typeof name !== 'string' || typeof value !== 'string') {
            return;
        }

        if (name.trim().length === 0) {
            return;
        }


        if (cookies[name] === undefined) {
            keys.push(name);
            self.length += 1;
        }

        cookies[name] = value;

        document.cookie = encodeURIComponent('sacm.' + name) + '=' + encodeURIComponent(value) + '; path=/';

    };

    self.removeItem = function(name) {
        if (typeof name !== 'string' || name.trim().length === 0 || cookies[name] === undefined) {
            return;
        }

        delete cookies[name];

        keys.splice(keys.indexOf(name), 1);

        self.length--;

        document.cookie = encodeURIComponent('sacm.' + name) + '=; expires=' + (new Date(0)).toUTCString() + '; path=/';

    };

    self.clear = function() {
        var expires = (new Date(0)).toUTCString();
        var idx = keys.length;

        while (idx --> 0) {
            document.cookie = 'sacm.' + keys[idx] + '=; expires=' + expires + '; path=/';
        }

        cookies = {};
        keys = [];
        self.length = 0;
    };

    return self;

};

/**
 * Reference to the storage implementation which provides a facade over the actual local storage implemenation, poviding
 * some polyfill for those browsers which don't support it.
 */
utils.Storage = (function() {


    if (window.sessionStorage) {
        console.log("Using local storage for process queue");
        return window.sessionStorage;
    }


    console.log("Using cookie storage for process queue");
    return utils.CookieStorage();
}());

var utils = utils || {};

/**
 * User ID cookie management. Sets 1st party cookie with a given or generated user ID.
 *
 * @param {utils.Config} [config] Global configuration object as set on the _setConfig commands
 *
 * @returns {{getUser: function, setUser: function}}
 *
 * @constructor
 * @struct
 */
utils.UserManager = function(config) {

    /**
     * Default expiry date.
     *
     * @const
     * @type {string}
     */
    var expiry = 'Fri, 31 Dec 9999 23:59:59 UTC';

    /**
     * Gets the user ID associated with the current cookie config.
     *
     *  @return {string|undefined}    The current user ID
     */
    var getUser = function () {


        if (document.cookie === undefined) {
            return undefined;
        }

        var searchName = config.cookieName() + '=';
        var parts = document.cookie.split(';');
        var stored;
        var idx;

        for (idx = 0; idx < parts.length; idx++) {
            if (parts[idx].trim().indexOf(searchName) === 0) {
                stored = parts[idx].trim().substring(searchName.length);
                return decodeURIComponent(stored);

            }
        }

        return undefined;

    };

    /**
     * Stores the given user ID in a cookie. If no user is specified, a generated one is used.
     *
     * @param {string=}   user      The user ID to store. If undefined a generated one is used.
     */
    var setUser = function(user) {

        user = user || (new Date()).getTime() + "-" + Math.round((Math.random() * 999999999) + 1);
        document.cookie = config.cookieName() + '=' + encodeURIComponent(user) + '; expires=' + expiry + '; path=' + config.cookiePath() + '; domain=' + config.cookieDomain();

    };

    /**
     * Removes the user data from the cookie.
     */
    var eraseUser = function() {
        document.cookie = config.cookieName() + '=; expires=' + (new Date(0)).toUTCString() + '; path=' + config.cookiePath() + ' ; domain=' + config.cookieDomain();
    };

    return {
        getUser: getUser,
        setUser: setUser,
        eraseUser: eraseUser
    };

};
// jquery extension to allow simple draggable interface
// taken from: http://css-tricks.com/snippets/jquery/draggable-without-jquery-ui/
(function($) {
    $.fn.drags = function(opt) {

        opt = $.extend({handle: '', cursor: 'move'}, opt);

        var $el;
        var $drag;

        if (opt.handle === '') {
            $el = this;
        } else {
            $el = this.find(opt.handle);
        }

        return $el.css('cursor', opt.cursor).on('mousedown', function(e) {
            if (opt.handle === '') {
                $drag = $(this).addClass('draggable');
            } else {
                $drag = $(this).addClass('active-handle').parent().addClass('draggable');
            }
            var z_idx = $drag.css('z-index'),
                drg_h = $drag.outerHeight(),
                drg_w = $drag.outerWidth(),
                pos_y = $drag.offset().top + drg_h - e.pageY,
                pos_x = $drag.offset().left + drg_w - e.pageX;

            $drag.css('z-index', 1000).parents().on('mousemove', function(e) {
                $('.draggable').offset({
                    top: e.pageY + pos_y - drg_h,
                    left: e.pageX + pos_x - drg_w
                }).on('mouseup', function() {
                    $(this).removeClass('draggable').css('z-index', z_idx);
                });
            });
            e.preventDefault(); // disable selection
        }).on('mouseup', function() {
            if (opt.handle === '') {
                $(this).removeClass('draggable');
            } else {
                $(this).removeClass('active-handle').parent().removeClass('draggable');
            }
        });

    };
}(jQuery));


var debug = debug || {};

/**
 * Creates a new Debugger instance
 *
 * @returns {{t: Function, d: Function, i: Function, w: Function, e: Function, log: Function}}
 * @constructor
 * @struct
 * @memberOf    debug
 */
debug.Debugger = function() {

    var cons =  $('<div id="__advisor__console_log"></div>').css({
        position: 'absolute',
        right: '1em',
        top: '1em',
        width: '25%',
        height: '25%',
        padding: '0.25em',
        margin: 0,
        'z-index': 2147483645,
        visibility: 'visible',
        'background-color': '#222222',
        border: '1px solid #ccc',
        'font-size': '12px',
        'font-family': 'monospace',
        'overflow': 'scroll',
        'padding-top': '16px',
        'zoom': 1,
        '-ms-filter': 'progid:DXImageTransform.Microsoft.Alpha(Opacity=75)',
        'filter': 'alpha(opacity=50)',
        '-moz-opacity': 0.75,
        '-khtml-opacity': 0.75,
        'opacity': 0.75
    });

    $('body').append(cons);

    cons.drags();

    // levels
    var TRACE = 'TRACE';
    var DEBUG = 'DEBUG';
    var INFO = 'INFO';
    var WARN = 'WARN';
    var ERROR = 'ERROR';



    /**
     * Logs a message at an optional level to the debug console if available. The available log levels are:
     *
     *  <ol>
     *  <li>TRACE</li>
     *  <li>DEBUG</li>
     *  <li>INFO</li>
     *  <li>WARN</li>
     *  <li>ERROR</li>
     *  <ol>
     *
     *  Note that the level names are case sensitive.
     *
     * @param {string} message        The message to log
     * @param {string} [level]        The message log level. if not specified, defaults to 'INFO'
     */
    var log = function(message, level) {
        if (cons === undefined) {
            return;
        }

        if (level === undefined) {
            level = INFO;
        }

        var bg;
        if (level === TRACE) {
            bg = '#7f8c8d';
        } else if (level === DEBUG) {
            bg = '#27ae60';
        } else if (level === INFO) {
            bg = '#2c3e50';
        } else if (level === WARN) {
            bg = '#d35400';
        } else {
            bg = '#c0392b';
        }


        cons.append($('<p></p>').css({
            'background-color': bg,
            'color': '#ecf0f1',
            'width': 1000,
            'margin': "0 0 1px 0",
            'padding': 0,
            'float': 'left',
            'text-align': 'left'
        }).text('[' + level + '] ' + message));
    };

    /**
     * Logs a trace message
     *
     * @param    {string}    message        The message to log
     */
    var t = function(message) {
        log(message, TRACE);
    };

    /**
     * Logs a debug message
     *
     * @param    {string}    message        The message to log
     */
    var d = function(message) {
        log(message, DEBUG);
    };

    /**
     * Logs an info message
     *
     * @param    {string}    message        The message to log
     */
    var i = function(message) {
        log(message, INFO);
    };

    /**
     * Logs a warn message
     *
     * @param    {string}    message        The message to log
     * @public
     */
    var w = function(message) {
        log(message, WARN);
    };

    /**
     * Logs an error message
     *
     * @param    {string}    message        The message to log
     */
    var e = function(message) {
        log(message, ERROR);
    };

    return {
        t: t,
        d: d,
        i: i,
        w: w,
        e: e,
        log: log
    };
};

var response = response || {};

/**
 * Creates a new Suggestion instance which holds a single suggestion as part of a larger response from the Smart Recs server.
 *
 * @param {{suggestionLocalisations: Array.<Object.<string,*>>, itemCode:string}}  data      The suggestion data
 *
 * @returns {{getItemCode: function(), getLocales: function()}}  Creates a new Suggestion type or undefined if the data is empty
 *
 * @constructor
 * @constructs Suggestion
 *
 * @memberOf response
 */
response.Suggestion = function(data) {
    data = data || {};
    var itemCode = data.itemCode;
    var locales = {};
    var idx;
    var next;

    if (utils.typeOf(data.suggestionLocalisations) === 'array') {

        for (idx = 0; idx < data.suggestionLocalisations.length; idx++) {
            next = data.suggestionLocalisations[idx];

            if (next.key && next.value) {
                locales[next.key] = next.value;
            }
        }
    }

    /**
     * Gets the item's code
     *
     * @returns {string}    The item code for this suggestion
     */
    var getItemCode = function() {
        return itemCode;
    };

    /**
     * Gets the item's display metadata
     *
     * @returns {Object.<string,*>} The key/value map of this item's suggestion metadata
     */
    var getLocales = function() {
        return locales;
    };


    return {
        getItemCode: getItemCode,
        getLocales: getLocales
    };

};

// #include utils.js
// #include Debugger.js

var response = response || {};

/**
 * Creates new instances of SuggestionResponse
 *
 * @classdesc SuggestionResponse instances decorate the respone of a suggestion request providing utility functions to help traverse the response
 * @constructs SuggestionResponse
 * @constructor
 *
 * @param {{response: {suggestions: Array.<Object>}}}  data      The suggestion response data
 *
 * @return {{count:function,getSuggestions:function}}
 *
 * @memberof response
 */
response.SuggestionResponse = function(data) {

    data = data || {};

    var suggestions = [];
    var idx;
    var slist;
    var next;

    if (data.response !== undefined && utils.typeOf(data.response.suggestions) === 'array') {
        slist = data.response.suggestions;
        for (idx = 0; idx < slist.length; idx++) {
            next = response.Suggestion(slist[idx]);

            if (next !== undefined) {
                suggestions.push(next);
            }

        }
    }

    /**
     * Gets the number of suggestions returned as part of the response
     *
     * @returns {number}
     */
    var count = function() {
        return suggestions.length;
    };

    /**
     * Gets the list of suggestions returned from the response. Each element of the array is a Suggestion instance.
     *
     * @returns {Array.<Suggestion>}
     */
    var getSuggestions = function() {
        return suggestions;
    };

    return {
        count: count,
        getSuggestions: getSuggestions
    };

};

var ui = ui || {};

/**
 *
 *
 * Creates new instances of Grid
 *
 * @classdesc The Grid class is used to create a gid layout for suggestible data.
 * @constructs Grid
 *
 * @param {{debug: Object, rows: number, cols:number, insert:string, id:string, selector:string, title:string}}    config        The Grid config.
 *
 * @property {Object}   [config.debug]      Instance of Debugger to write logs etc to
 * @property {number}   [config.rows]       Number of rows in the grid, default is 3
 * @property {number}   [config.cols]       Number of cols in the grid, default is 3
 * @property {string}   [config.insert]     The type of insert to perform: one of <code>after|before|into</code>. Default is <code>after</code>
 * @property {string}   [config.id]         Optional ID for the container element
 * @property {string}   [config.title]      Optional title header for the suggestions
 * @property {string}   config.selector     The JQuery selector expression used to find the element for insert
 *
 * @memberOf ui
 */
ui.Grid = function (config) {

    var debug = config.debug,
        rows = config.rows || 1,
        cols = config.cols || 3,
        total = rows * cols,
        containerid = config.id || Math.floor((Math.random() * 100000000) + 1).toString(),
        selector = config.selector,
        insert = config.insert || 'after',
        title = config.title;

    if (config.selector === undefined || utils.typeOf(config.selector) !== 'string' || config.selector.trim().length === 0) {
        if (debug) {
            debug.w('No selector specified to Grid');
        }

        return undefined;
    }

    if (config.insert) {
        if (utils.typeOf(config.insert) !== 'string') {
            config.insert = 'after';
        } else if (!/(after|before|into)/.test(config.insert)) {
            if (debug) {
                debug.w('No selector specified to Grid');
            }

            return undefined;
        }
    }

    /**
     * Builds the grid using the configuration
     *
     * @param {response.SuggestionResponse}  response    The IPS response
     */
    var build = function(response) {

        // do nothing if there ar eno suggestions
        if (response.count() === 0) {
            return;
        }

        var container = $('<div class="advisor_suggestion_container"></div>').attr('id', containerid);

        if (typeof title === 'string' && title.trim()) {
            container.append($('<h1></h1>').text(title));
        }

        var suggests = response.getSuggestions();

        var nextline = false;
        var suggest;
        var limit = suggests.length <= total ? suggests.length : total;
        var elm;
        var idx;

        /** @type {{clickURL:string=,imageURL:string=,text:string=}} */
        var locales;

        for (idx = 0; idx < limit; idx++) {
            suggest = suggests[idx];
            locales = suggest.getLocales();

            elm = $('<div></div>').addClass('item').attr('id', '__advisor_item_elm_' + suggest.getItemCode()).attr('itemcode', suggest.getItemCode()).append(
                $('<a></a>').attr('href', locales.clickURL).addClass('item_link').append(
                    $('<img/>').addClass('item_image').attr('src', locales.imageURL),
                    $('<p></p>').addClass('item_text').text(locales.text)
                )
            );

            if (nextline) {
                elm.addClass('newrow');
                nextline = false;
            }

            container.append(elm);

            if (cols === 1 || (idx > 0 && (idx + 1) % cols === 0)) {
                nextline = true;
            }
        }


        if ($(selector).length === 0) {
            return;
        }

        if (insert === 'into') {
            $(selector).append(container);
        } else if (insert === 'before') {
            container.insertBefore($(selector));
        } else {
            container.insertAfter($(selector));
        }

        var clearBoth = $('<div></div>').attr('style','clear:both');
        if (idx) {
            clearBoth.insertAfter($(container));
        }
    };

    /**
     * Gets the totoal number of items to be shown in this grid
     *
     * @returns {number}    The number of items to be shown in the grid
     */
    var size = function() {
        return total;
    };

    return {build: build, size: size};

};// #include utils.js
// #include debug/Debugger.js


var net = net || {};

/**
 * Creates a remote instance used to make requests to an endpoint. This provides a wrapper around AJAX calls.
 *
 * @param {Config}      config      Config instance
 * @param {Debugger=}   debug       Optional debug instance
 *
 *
 * @returns {{get: Function}}
 *
 * @struct
 * @constructor
 *
 * @memberOf net
 */
net.Remote = function (config, debug) {

    var push = function (url) {
        utils.Storage.setItem(new Date().getTime().toString(), url);
        console.log("Pushed request: url = " + url + ", queue size = " + utils.Storage.length);
    };

    var pull = function (url) {

        var idx, time;
        for (idx = 0; idx < utils.Storage.length; idx++) {
            time = utils.Storage.key(idx);
            if (url === utils.Storage.getItem(time)) {
                utils.Storage.removeItem(time);
            }
        }

        console.log("Pulled request: url = " + url + ", queue size = " + utils.Storage.length);
    };

    // -----------------------------------------------------------------------------------------------------

    /**
     * Defers the sending of the URl until the next time the Remote loads
     *
     * @param url   The URL to defer
     */
    var defer = function(url) {
        utils.Storage.setItem('d' + new Date().getTime().toString(), url);
        console.log("Deferred request: url = " + url + ", queue size = " + utils.Storage.length);
    };

    /**
     * Sends an async GET request to the specified URL
     *
     * @param    {string}       url            The URL to send the GET to
     * @param    {function(string,string,jQuery.jqXHR)}     [success]    The success callback function
     * @param    {function(jQuery.jqXHR, string, string)}     [failure]    The failure callback function
     * @param    {boolean=}                                    [nrn]        No response needed - useful to suppress errors when no resposne is sent from the server on JSONP GETs
     * @param    {boolean=}                                     [track]     Whether to track the request so that it can be 'waited on'
     *
     */
    var get = function (url, success, failure, nrn, track) {

        if (debug !== undefined) {
            debug.t("Sending GET request: url = " + url);
        }

        try {
            $.ajax(url, {
                async: true,
                cache: false,
                crossDomain: true,
                global: false,
                type: 'GET',
                dataType: 'jsonp',
                success: function (data, status, xhr) {

                    if (track) {
                        pull(url);
                    }

                    if (debug !== undefined) {
                        debug.t('Request success: url = ' + url
                            + ", data = " + (data === undefined ? "unknown" : utils.pretty(data))
                            + ", status = " + status
                            + ", response text = " + (xhr === undefined ? "unknown" : xhr.responseText)
                            + ", response header = " + (xhr === undefined ? "unknown" : xhr.getAllResponseHeaders())
                        );
                    }

                    if (success !== undefined && utils.typeOf(success) === "function") {
                        success(data, status, xhr);
                    }
                },
                error: function (xhr, status, err) {

                    if (track) {
                        pull(url);
                    }

                    if (nrn === true && /jQuery.+ was not called/.test(err) === true) {

                        if (debug !== undefined) {
                            debug.t('Request success (empty JSONP response): url = ' + url);
                        }

                        return;
                    }

                    if (debug !== undefined) {
                        debug.e('Request failure: url = ' + url
                            + ", error = " + err
                            + ", status = " + status
                            + ", response text = " + (xhr === undefined ? "unknown" : xhr.responseText)
                            + ", response header = " + (xhr === undefined ? "unknown" : xhr.getAllResponseHeaders())
                        );

                    }

                    if (failure !== undefined && utils.typeOf(failure) === "function") {
                        failure(xhr, status, err);
                    }
                }

            });

            if (track) {
                push(url);
            }
        } catch (e) {
            console.error("Error thrown making ajax request: url = " + url + ", error = " + e);
        }


    };

    // ---------------------------------------------------------------
    // Handles the unload case where we still have pending requests
    // ---------------------------------------------------------------
    $(window).unload(function () {
        var idx, time, delta, now = (new Date()).getTime();

        // check those which are likely to have been sent
        for (idx = 0; idx < utils.Storage.length; idx++) {
            time = utils.Storage.key(idx);

            if (time.charAt(0) === 'd') {
                continue;
            }

            delta = now - parseInt(time, 10);

            if (delta > 1000) {
                console.log("URL delta [" + delta + " ms] exceeds time limit [1000 ms] - removing: " + utils.Storage.getItem(time));
                utils.Storage.removeItem(time);
            }

        }

    });

    // ---------------------------------------------------------------
    // kick off any pending requests
    // ---------------------------------------------------------------
    var idx, time, url;


    for (idx = 0; idx < utils.Storage.length; idx++) {
        time = utils.Storage.key(idx);
        url = utils.Storage.getItem(time);

        get(url, undefined, undefined, true, true);

        utils.Storage.removeItem(time);

    }


    return {
        get: get,
        defer: defer
    };
};
var async = async || {};

/**
 * Classes and functions related to async queue management and processing.
 *
 * @module comparators
 * @namespace async.comparators
 */
async.comparators = async.comparators || {};

/**
 * Sort function designed for command objects based upon precendence. The sort orders from largest to smallest.
 *
 * @param {async.Command}     a       First instance
 * @param {async.Command}     b       Second instance
 */
async.comparators.precedence = function(a, b) {
    var pa, pb;
    if (a.getPrecedence() === undefined || a.getPrecedence() < 0) {
        pa = 0;
    } else {
        pa = a.getPrecedence();
    }

    if (b.getPrecedence() === undefined || b.getPrecedence() < 0) {
        pb = 0;
    } else {
        pb = b.getPrecedence();
    }


    return pb - pa;
};

/**
 * Sort function designed for command objects based upon index. The sort orders from smallest to largest index
 *
 * @param {async.Command}     a       First instance
 * @param {async.Command}     b       Second instance
 */
async.comparators.index = function(a, b) {
    var pa, pb;
    if (a.getIndex() === undefined || a.getIndex() < 0) {
        pa = 0;
    } else {
        pa = a.getIndex();
    }

    if (b.getIndex() === undefined || b.getIndex() < 0) {
        pb = 0;
    } else {
        pb = b.getIndex();
    }


    return pa - pb;
};

/**
 * This function processes the queue and filters targets using precedence and index. Each item on the queue should follow the specification:
 *
 * <code>
 *     {_cmdName:(Object|function()), precedence: number}
 * </code>
 *
 * Command names are prefixed with <code>'_'</code>.
 *
 * <h2>Merging</h2>
 *
 * Certain commands (as specified by the optional <code>mergeNames</code> parameter or the default set) will have their command arguments
 * merged. If the command arg is a function, it is evaluated within the global scope - if this function returns an object it's merged otherwise
 * it's result is ignored.
 *
 * For commands which are not merged, duplicates are sorted based on index found in the orignal command array.
 *
 * @param {Array.<Object.<string,*>>}    queue      A basic command array queue. This is typically the one set on the global object _advisorq.
 * @param {Array.<string>=}  [mergeNames]   Optional array of names to consider merge targets
 *
 * @return {Object}     The result of the filtering - keys in the struct are command names and values ar either the merged Command or a sorted array of Command objects.
 */
async.comparators.filter = function(queue, mergeNames) {

    var merges = mergeNames || ['_setAccount', '_setConfig', '_browse', '_subscribe', '_unsubscribe', '_404page'];

    var cmd;
    var mappings = {};
    var popped;

    while (queue.length > 0) {

        popped = queue.pop();

        if (popped === undefined) {
            continue;
        }

        cmd = async.Command(popped);

        if (cmd === undefined) {
            continue;
        }

        if (mappings[cmd.getCommand()] === undefined) {
            mappings[cmd.getCommand()] = [cmd];
        } else {
            mappings[cmd.getCommand()].push(cmd);
        }
    }

    // loop the mappings and merge/sort:
    //    + Merge - targets are sorted by precedence and merged down (starting at the back - hisgest precedence first)
    //    + Sort - targets ae sorted by index if they are not merge targets
    utils.forEach(mappings, function(k, v) {
        if (merges.indexOf(k) === -1) {
            // sort
            if (v.length !== 1) {
                v.sort(async.comparators.index);
            }
        } else {
            // merge
            if (v.length === 1) {
                mappings[k] = v[0];
            } else {
                v.sort(async.comparators.precedence);

                var last = v.pop();
                var current = v.pop();

                while (current !== undefined) {
                    last.merge(current.getArgs());
                    current = v.pop();
                }

                mappings[k] = last;
            }
        }
    });

    return mappings;
};var async = async || {};

/**
 * Command objects are use by the queue implementation to abstract the raw pushed object.
 *
 *
 * @param {Object.<string,*>}   cmd         The command object pushed onto the queue
 * @param {number=}             [index]     The index of the command object
 *
 * @returns {{getCommand:function,getArgs:function,getIndex:function, getPrecedence:function, merge:function}}|undefined
 * @constructor
 * @struct
 */
async.Command = function (cmd, index) {

    var func = utils.getFunc(cmd);

    // can't process this object - no function name
    if (func === undefined) {
        return undefined;
    }

    var args = cmd[func] || {};
    var precedence = cmd.precedence || 0;
    var idx = index || 0;

    /**
     * Merges the incoming data with this command's args
     *
     * @param {(Object|function():Object)}data
     */
    var merge = function (data) {

        // if its a function we replace - considered a deferred function
        if (utils.typeOf(data) === 'function') {
            args = data;
            return;
        }

        if (utils.typeOf(data) === 'object') {
            utils.forEach(data, function (k, v) {
                args[k] = v;
            });
        }

    };

    /**
     * Gets the command function/object
     *
     * @returns {Function|Object}
     */
    var getCommand = function () {
        return func;
    };

    /**
     * Gets the arguments for this command
     *
     * @returns {{}}
     */
    var getArgs = function () {
        return args;
    };

    /**
     * Gets the index of this command  if set
     *
     * @returns {number=}
     */
    var getIndex = function () {
        return idx;
    };

    /**
     * Gets the precedence of this command if set
     *
     * @returns {number=}
     */
    var getPrecedence = function () {
        return precedence;
    };

    /**
     * The string representation of tis command
     * 
     * @returns {string}
     */
    var toString = function () {
        return func + "[" + precedence + "]";
    };

    return {
        getCommand: getCommand,
        getArgs: getArgs,
        getIndex: getIndex,
        getPrecedence: getPrecedence,
        toString: toString,
        merge: merge
    };

};
/**
 * Creates new instances of Connector
 *
 * @param   {net.Remote}            remote      Remote instance used to make AJAX calls
 * @param   {utils.Config}          config      Global configuration options passed in the on the _setConfig commands
 * @param   {debug.Debugger=}       debug       Debugger instance
 * @param   {{endpoint: string, username: string, accid: string}}    args        Configuration arguments for the Connector instance passed in on the command object _Account
 *
 * @classdesc Connector instances are used for sending args to and receiving from the advisor endpoint.
 * @constructs Connector
 * @struct
 */
var Connector = function(remote, args, config, debug) {

    if (remote === undefined) {
        throw "Remote adapter is not set";
    }

    var endpoint = args.endpoint;
    var username = args.username;
    var accid = args.accid;
    var umgr = utils.UserManager(config);

    // set up default cookie - this will get reset by the advisor server
    // if we already have a value
    if (!umgr.getUser()) {
        umgr.setUser();
    }

    if (endpoint === undefined) {
        throw "setAccount requires a valid service endpoint";
    }

    if (username === undefined) {
        throw "setAccount requires a valid username";
    }

    if (accid === undefined) {
        throw "setAccount requires a valid accid";
    }

    if ('https:' === document.location.protocol) {
        endpoint = endpoint.replace(/^http:/, 'https:');
    } else {
        endpoint = endpoint.replace(/^https:/, 'http:');
    }

    var notifyEndpoint = endpoint + "/services/cred/" + username + "/" + (new Date().getTime()) + "/2.1.0/notify/" + accid;
    var suggestEndpoint = endpoint + "/services/cred/" + username + "/" + (new Date().getTime()) + "/2.1.0/suggest/" + accid;
    var subscribeEdpoint = endpoint + "/services/cred/" + username + "/" + (new Date().getTime()) + "/2.1.0/subscribe/" + accid;
    var unsubscribeEdpoint = endpoint + "/services/cred/" + username + "/" + (new Date().getTime()) + "/2.1.0/unsubscribe/" + accid;
    var trxemailEndpoint = endpoint + "/services/cred/" + username + "/" + (new Date().getTime()) + "/3.0/trxemail/" + accid;

    var identifyEndpoint = endpoint + "/services/cred/" + username + "/" + (new Date().getTime()) + "/3.0/notify/" + accid;
    var identicheckEndpoint = endpoint + "/services/cred/" + username + "/" + (new Date().getTime()) + "/3.0/identityCheck/" + accid;

    var qparams = utils.getQueryParams();

    var conn = {};

    // --------- Private functions

    /**
     * Sets all the common parameters on a request URL
     *
     * @param {string}              base    The base URL
     * @param {Object.<string,*>}   data    Data to add to the URL query params
     *
     * @return {string}     The composed URL string
     */
    var buildURL = function(base, data) {

        data = data || {};

        var user = umgr.getUser();

        if (user !== undefined) {
            data.cookieid = user;
        }

        var hasEmail = (data.email || data.email1 || data.emailAddress || data.emailAddress1);

        if (!hasEmail && config.emailQueryParam() && qparams[config.emailQueryParam()] && qparams[config.emailQueryParam()].trim()) {
            data.email = qparams[config.emailQueryParam()].trim();
        }

        if (!data.visitorid && config.visitorQueryParam() && qparams[config.visitorQueryParam()] && qparams[config.visitorQueryParam()].trim()) {
            data.visitorid = qparams[config.visitorQueryParam()].trim();
        }

        if (!data.stores && config.stores()) {
            data.stores = config.stores();
        }

        if (!data.cbtt && qparams.cbtt) {
            data.cbtt = qparams.cbtt;
        }

        var url = base + "?fmt=jsonp&";

        utils.forEach(data, function(k, v) {
            if (v === undefined) {
                return true;
            }

            url +=  encodeURIComponent(k) + "=" +  encodeURIComponent(v) + "&";
            return true;
        });

        if (url.charAt(url.length - 1) === '&') {
            url = url.slice(0, -1);
        }

        return url;

    };

    /**
     * Handles the management of selector callback functionality. Data object can contain one of the following:
     *
     * 1. Synchronous field access
     * <pre>
     * {
     *     selector: ''
     * }
     * </pre>
     *
     * JQuery selector: this is a direct extraction of a field - in this case this method will return the value contained
     * within the field or undefined if the selector does not point to a valid element
     *
     * 2. Callback selector
     * <pre>
     * {
     *      selector: '',
     *      event: '',
     *      source: ''
     * }
     * </pre>
     *
     * This function registers a callback which is passed to the <code>callback<code> function. When the event is triggered on the source
     * the value is obtained from the selector and passed back to the <code>callback</code> function.
     *
     * @param {string}  selector    JQuery selector identifying the element to get the data from
     * @param {string}  event     Optional event parameter to listen for - defaults to 'click' if not specified
     * @param {string}  source    JQuery selector identifying an event source
     * @param {function(string)} callback    Callback function if running async
     */
    var buildSelector = function(selector, event, source, callback) {
        if (!selector) {
            return;
        }

        var elm = $(selector);

        if (event && source && callback) {

            // element doesn't exist
            if (elm.length <= 0) {
                // delegated event in case the element doesn't exist yet
                $(document).on(event, source, function() {
                    callback(getValue(elm));
                });
            } else {
                $(source).on(event, function() {
                    callback(getValue(elm));
                });
            }


        } else {
            return getValue(elm);
        }
    };

    var send = function(url, defer) {
        if (defer === true) {
            remote.defer(url);
        } else {
            remote.get(url, function(data) {
                if (data.id) {
                    umgr.setUser(data.id);
                }
            }, undefined, true, true);
        }
    };

    /**
     * Gets the value from a JQuery element
     *
     * @param {string}  selector    JQuery selector
     *
     * @returns {string|undefined}
     */
    var getValue = function(selector) {
        var val = selector.val();

        if (val === undefined) {
            val = selector.text();
        }

        return val;
    };

    /**
     * Given a SKU value, this method will parse it to make sure it's correct, returning the default
     * value on failure - e.g. if a number is non finite, or a string is empty etc.
     *
     * @param {*}       sku         The sku value
     * @param {string}  defvalue    Default string to return to the calling function
     */
    var parseSku = function(sku, defvalue) {
        if (typeof sku === 'function') {
            try {
                sku = sku.apply(window);
            } catch (e) {
                console.error("Error thrown applying sku function in '_browse'", e);
                // remove and have it pick up the default
                return defvalue;
            }
        }

        if (utils.isNil(sku)) {
            if (utils.isNil(config.sku())) {
                return defvalue;
            }

            sku =  utils.join(config.sku());

        }

        // check here to make sure tat the value assigned from the config
        // isn't wrong somehow
        if (typeof sku === 'string') {
            sku = sku.trim();

            if (sku.length === 0) {
                return defvalue;
            }

            return sku;
        }


        if (typeof sku === 'number') {
            if (!utils.isFinite(sku)) {
                return defvalue;
            }

        }

        return sku;
    };

    // --------- Exported functions

    /**
     * Sends a debug message on this connector. The log message is prefixed with the connectors name (<code>_</code> signifying
     * the default connector instance).
     *
     * @param {{msg: string, level: string}}    data        The debug configuration.
     *
     * @property {string} args.msg        The message to be logged
     * @property {string} [args.level]    The level to log the message at - default is 'TRACE'.
     *
     */
    var _debug = function(data) {
        if (debug !== undefined) {
            debug.log(data.msg, data.level);
        }
    };

    /**
     * A general event notification function to be used by advanced integrations. This is the most basic way to send
     * an event notification to the configured advisor endpoint. The args to be sent as part of the notification is not processed
     * in anyway, unlike the more specific {@link _browse} and {@link _buy} calls.
     *
     * @param    {string}    name        The event code - e.g. <code>browse<code>
     * @param    {Object.<string,*>}    data        The args to be sent as part of the event notification.
     * @param    {boolean=}    defer        Whether te notification should be deferred until next time the SDK loads.
     *
     */
    var _notify = function(name, data, defer) {
        defer = defer === true || false;
        delete data.defer;
        send(buildURL(notifyEndpoint + "/" + name, data), defer);
    };

    /**
     * Handle a subscription event
     *
     * @param {boolean} subscribe   If <code>true</code> this is a new subscribe event otherwise it's considered as <code>unsubscribe</code>
     * @param {Object}  data        Data to pass as part of the event.
     *
     */
    var _subscription = function(subscribe, data) {
        if (!data) {
            return;
        }

        var base =  (subscribe ? subscribeEdpoint : unsubscribeEdpoint);

        if (data.email) {
            send(buildURL(base, data));
            return;
        }

        if (data.selector) {
            if (data.event && data.source) {
                buildSelector(data.selector, data.event, data.source, function(value) {

                    if (value && value.trim()) {
                        data.email = value;

                        delete data.event;
                        delete data.source;
                        delete data.selector;

                        send(buildURL(base, data), config.autoDefer());
                    }
                });
            } else {
                var value = buildSelector(data.selector);

                if (value && value.trim()) {
                    data.email = value;
                    delete data.selector;

                    send(buildURL(base, data), config.autoDefer());
                }
            }
        }
    };

    /**
     * Utility method to delegate a subscribe event
     *
     * @param {Object}  data    Event data
     *
     */
    var _subscribe = function(data) {
        _subscription(true, data);
    };

    /**
     *  Utility method to delegate a unsubscribe event
     *
     *  @param {Object} data    Event data
     *
     */
    var _unsubscribe = function(data) {
        _subscription(false, data);
    };


    /**
     *
     * @param {{selector: string, query: string=}} data
     */
    var _search = function(data) {
        if (!data) {
            return;
        }

        if (!utils.isNil(data.tag)) {
            data.lang = data.tag;
            delete data.tag;
        }

        if (utils.isNil(data.lang) && utils.isNil(data.tag) && !utils.isNil(config.tag())) {
            data.lang = config.tag();
        }
        
        //Getting currently viewed /configured language from config or returning browsers language
        data.lastViewedLanguage = utils.getLanguage(config.currentPreferedLanguage());

        // use case directly passed
        if (data.query) {
            data.data = data.query;
            delete data.query;

            _notify('search', data);
            return;
        }

        if (data.selector) {

            if (data.event && data.source) {
                buildSelector(data.selector, data.event, data.source, function(value) {

                    if (value) {
                        data.data = value;
                        delete data.event;
                        delete data.source;
                        delete data.selector;

                        _notify('search', data, config.autoDefer());
                    }
                });
            } else {
                var value = buildSelector(data.selector);

                if (value) {
                    data.data = value;
                    delete data.selector;
                    _notify('search', data, config.autoDefer());
                }
            }
        }

    };

    /**
     * Bind callback to an element and an event 
     *      and remove these elements from data to avoid executing several times
     * @param {{event: string=, source: string=}} data
     * @param {function}   callback     
     */
    var _bindCallBack = function (data, callback) {
        if (data.event && data.source) {

            var s = data.source;
            var e = data.event;

            delete data.event;
            delete data.source;
			
			data.defer = true;

            if ($(s).length !== 0) {			
                $(s).on(e, function() {              			
                    callback(data);
                });
            } else {
                // delegated event
                $(document).on(e, s, function() {
                    callback(data);
                });
            }
        }
    };
    
    /**
    * Coppy  user data from source array to destination one
    *      
    * @param {{Array}} source
    * @param {Array}   dest     
    */
    var _prepareUserData = function(source, dest)
    {
        var email = '';
        if (source.email) {
            dest.email = source.email;
        } else if (source.email1) {
            dest.email = source.email1;
        } else if (source.emailAddress) {
            dest.email = source.emailAddress;
        } else if (source.emailAddress1) {
            dest.email = source.emailAddress1;
        }
    }

    /**
     * Add product to cart
     * @param {{event: string=, source: string=, sku:function|string product sku}} data
     * @param {boolean}   async       Whether we are being called as part of a callback
     */
    var _addToCart = function(data) {	    
        if (data && !utils.isNil(data.sku)) {
           if (data.event && data.source) {		  
               _bindCallBack(data, _addToCart);
               return;
           }
           
           //Getting currently viewed /configured language from config or returning browsers language
           data.lastViewedLanguage = utils.getLanguage(config.currentPreferedLanguage());
		 
           // retrieve sku thanks to a function
           if (typeof data.sku === 'function') {
               data.sku = data.sku.apply(window);
           }
           if (!utils.isNil(data.sku)) {
               var params = {
                   data : data.sku,
                   eventqty: data.quantity,
                   eventamnt: data.price,
                   contentType : 'product',
				   lastViewedLanguage : data.lastViewedLanguage
               };
               _prepareUserData(data, params);			  
               _notify('cart-add', params, data.defer && config.autoDefer());
			   
           }
       }
    };
    
    /**
     * clear the cart
     * @param {{event: string=, source: string=}} data
     * @param {boolean}   async       Whether we are being called as part of a callback
     */
    var _clearCart = function(data) {	    
	    if (data.event && data.source) {
		    _bindCallBack(data, _clearCart);
            return;
        }
		//Getting currently viewed /configured language from config or returning browsers language
		 data.lastViewedLanguage = utils.getLanguage(config.currentPreferedLanguage());
		 _notify('cart-clear', data, data.defer && config.autoDefer());		
}
    
    /**
    * Remove product from cart
    * @param {{event: string=, source: string=, sku:function|string product sku}} data
    * @param {boolean}   async       Whether we are being called as part of a callback
    */
    var _removeFromCart = function(data) {	
        if (data && !utils.isNil(data.sku)) {
            if (data.event && data.source) {
                _bindCallBack(data, _removeFromCart);
                return;
            }

          //Getting currently viewed /configured language from config or returning browsers language
            data.lastViewedLanguage = utils.getLanguage(config.currentPreferedLanguage());
            
            // retrieve sku thanks to a function
            if (typeof data.sku === 'function') {
                data.sku = data.sku.apply(window);
            }
            if (!utils.isNil(data.sku)) {
                var params = {
                    data : data.sku,
                    eventqty: data.quantity,
                    eventamnt: data.price,
                    contentType : 'product',
					lastViewedLanguage : data.lastViewedLanguage
                };
                _prepareUserData(data, params);
                _notify('cart-rmv', params, data.defer && config.autoDefer());
            }
        }
    };
    
    /**
     *
     * @param   {boolean}   async       Whether we are being called as part of a callback
     * @param {{event: string=, source: string=, currency: string=, items:function|Array.<number>, charges:function|Array<number>}} data
     */
    var _buy = function(data) {
        var idx;
        var item;
        var params;
        var charges;

        if (!data || !data.items) {
            return;
        }
        

        if (data.event && data.source) {
            _bindCallBack(data, _buy);
            return;
        }

        if (typeof data.items === 'function') {
            data.items = data.items.apply(window);
        }

        if (utils.typeOf(data.items) !== 'array' || data.items.length === 0) {
            return;
        }
        
        //Getting currently viewed /configured language from config or returning browsers language
        data.lastViewedLanguage = utils.getLanguage(config.currentPreferedLanguage());

        for (idx = 0; idx < data.items.length; idx++) {
            if (!data.items[idx]) {
                continue;
            }

            item = data.items[idx];

            if (!item.sku || !item.quantity || !item.price) {
                continue;
            }

            params = {
                data: item.sku,
                eventqty: item.quantity,
                eventamnt: item.price
            };
            _prepareUserData(data, params);

            if (data.currency) {
                params.eventamntcurr = data.currency;
            }
            
            if(data.lastViewedLanguage){
  			  params.lastViewedLanguage=data.lastViewedLanguage;
  			}

            _notify('buy', params, data.defer && config.autoDefer());
        }

        if (!data.charges) {
            return;
        }

        if (typeof data.charges === 'function') {
            data.charges = data.charges.apply(window);
        }

        if (utils.typeOf(data.charges) !== 'array' || data.charges.length === 0) {
            return;
        }

        charges = 0;

        for (idx = 0; idx < data.charges.length; idx++) {
            if (!utils.isFinite(data.charges[idx])) {
                continue;
            }

            charges += data.charges[idx];
        }

        if (charges !== 0) {
            params = {
                data: config.cartChargesName(),
                eventqty: 1,
                eventamnt: charges,
                suggestible: 'N',
                contentType: 'charge'
            };
            _prepareUserData(data, params);

            if (data.currency) {
                params.eventamntcurr = data.currency;
            }
            
            if(data.lastViewedLanguage){
  			  params.lastViewedLanguage=data.lastViewedLanguage;
  			}

            _notify('buy', params, data.defer && config.autoDefer());
        }


    };
    /**
     * Sends a refer notification
     *
     * @param {?Object.<string,*>} data     A map of key->value pairs to be sent to the service endpoint
     *
     * @property {string} [data.data]       The query string to send to the service endpoint - must be URI encoded
     */
    var _referrer = function(data) {
        if (!data || !data.data) {
            return;
        }

        if (!utils.isNil(data.tag)) {
            data.lang = data.tag;
            delete data.tag;
        }

        if (utils.isNil(data.lang) && utils.isNil(data.tag) && !utils.isNil(config.tag())) {
            data.lang = config.tag();
        }


        _notify("refer", data);
    };

    /**
     * Sends a single browse notification.
     *
     * @param    {?Object.<string,*>} data    A map of key->value pairs to be sent to the service endpoint
     *
     * @property {string|number|function} [data.sku]    The SKU to send as part of the browse. If not set this function will attempt to locate the sku from the global namespace or use the current URL.
     */
    var _browse =  function(data) {

        data = data || {};

        var url = utils.getLocation({stripSearch: true});
        data.sku = parseSku(data.sku, url);

        // don't have any sku, not in product page
        if (data.sku === url) {
            data.suggestible = 'N';
            // get contentType
            if (utils.isNil(data.contentType) && !utils.isNil(config.contentType())) {
                data.contentType = config.contentType();
            }

            // special treatment for category page
            if (
                !utils.isNil(data.contentType) && data.contentType == 'category' && utils.isNil(data.currentCategory)
            ) {
                var path = data.currentPath;
                if (utils.isNil(data.currentPath) && !utils.isNil(config.currentPath())) {
                    path = config.currentPath();
                }

                if (typeof path !== 'undefined') {
                    data.currentCategory = path[path.length - 1];
                }
            }

            if (!utils.isNil(data.currentCategory)) {
                data.data = 'CAT:' + data.currentCategory;
            }
        }

        if (utils.isNil(data.data)) {
            data.data = data.sku;
        }
         delete data.sku;

       //Getting currently viewed /configured language from config or returning browsers language
         data.lastViewedLanguage = utils.getLanguage(config.currentPreferedLanguage());
         
        _notify("browse", data);
    };

    /**
     * Sends a 404 browse notification
     *
     * @param {Object} data
     *
     */
    var _404page = function(data) {

        data = data || {};

        data.sku = parseSku(data.sku, 'advisor404page');

        if (utils.isNil(data.suggestible)) {
            data.suggestible = 'N';
        }

        data.data = data.sku;
        delete data.sku;

        _notify("browse", data);
    };

    /**
     * Makes a call for a suggestion request
     *

     * @param     {Object.<string,*>}     data        The args to send as part of the request.
     *
     * @property    {string}                data.code       The suggestion code to use in the request
     * @property    {Object|function()}     data.layout     The layout options for the grid or a handler function to receive the SuggestionResponse
     * @property    {string=}               [data.criteria] External search criteria value
     */
    var _suggest = function(data) {
        if (data === undefined) {
            return;
        }

        var requestCode = data.code;

        if (typeof requestCode !== 'string') {
            if (debug !== undefined) {
                debug.w("Invalid suggestion request code: expected a string");
            }

            return;
        }

        delete data.code;

        if (!data.criteria && config.observeIncomingSearchTerm()) {
            var query = utils.parseReferer(document.referrer);

            if (query !== undefined) {
                data.criteria =  encodeURIComponent(query.query);
            }
        }

        if (utils.isNil(data.items) && !utils.isNil(config.sku())) {
            data.items = utils.join(config.sku(), '|');

        }

        var grid;
        var handler;

        if (utils.typeOf(data.layout) === 'object') {
            grid = ui.Grid(data.layout);
            data.maxsuggs = grid.size();
        } else if (utils.typeOf(data.layout) === 'function') {
            handler = data.layout;
        }

        delete data.layout;

        if (!data.exclude) {
            if (!utils.isNil(config.exclusionSkus())) {
                data.exclude = utils.join(config.exclusionSkus());
            } else if (!utils.isNil(config.sku())) {
                data.exclude = utils.join(config.sku());
            }
        }

        if (utils.isNil(data.currentPath) && !utils.isNil(config.currentPath())) {
            var path = config.currentPath();

            data.currentPath = utils.join(path);
            data.currentCategory = path[path.length - 1];
        }

        if (!data.stores && config.stores()) {
            data.stores = config.stores();
        }

        if (data.tag && data.tag.trim()) {
            data.lang = data.tag;
            delete data.tag;
        } else if (!data.tag && config.tag()) {
            data.lang = config.tag();
        }

      //Getting currently viewed /configured language from config or returning browsers language
        data.lastViewedLanguage = utils.getLanguage(config.currentPreferedLanguage());
        
        var url = buildURL(suggestEndpoint + "/" + requestCode, data);

        var success = function(r) {
            if (grid) {
                grid.build(response.SuggestionResponse(r));
            }

            if (handler) {
                handler(response.SuggestionResponse(r));
            }
        };

        remote.get(url, success);
    };


    var _trxemail = function(data) {

        data.data.json = btoa(JSON.stringify(data.data.json));

        var url = buildURL(trxemailEndpoint + "/" + data.setting, data.data);

        var success = function(result, status, xhr) {
            if (result["com.predictiveintent.ips001.response.code"] === 'OK' ) {
                data.success(result, status, xhr);
            } else {
                data.error(result, status, xhr);
            }
        };

        var error = function(result, status, xhr) {
            // console.log("_trxemail error");
            data.error(result, status, xhr);
        };

        remote.get(url, success, error);
    };


	var _captureEmail = function (data) {
    	
    	//Calling Identify API-to store email address in db.    	
    window.submitEmail = function (email) {
        	
                var identifyUrl = buildURL(identifyEndpoint + "/identify", {"email": email});           
           
                var success = function (result, status, xhr)
                {
            	//no to do anything when reurn successfully
            	//the other way to do the same is to make success function as undefined
                };
           
               remote.get(identifyUrl, success, undefined,true,true);
       
        };
        
       
        
        var showOverlay = function (type, messages) {
            var overlayContent = '';

            switch (type) {                
                case 'prompt':
                	overlayContent = "<form><label for='sf_email_capture'>" + messages.prompt + "</label><br /><input type='text' name='sf_email_capture' id='sf_email_capture' /><br /><input type='button' value='"+ messages.cancel +"' onclick=\"jQuery('#sf_overlay').remove();\" /><input type='button' value='" + messages.submit + "' onclick=\"submitEmail(jQuery('#sf_email_capture').val());jQuery('#sf_overlay').remove();\" /></form>";
                	 break;
                case 'error':
                	overlayContent = "<form><p>" + messages.error + "</p>" + "<br /><input type='button' value='" + messages.dismiss + "' onclick=\"jQuery('#sf_overlay').remove();\" /></form>";
                    break;
                case 'thank_you':
                    overlayContent = "<form><p>" + messages.thank_you + "</p>" + "<br /><input type='button' value='" + messages.dismiss + "' onclick=\"jQuery('#sf_overlay').remove();\" /></form>";
                    break;
            }

            var overlay = "<div id='sf_overlay'>" + overlayContent + "</div>";
            

            (function ($) {

                $("#sf_overlay").remove();

                var docHeight = $(document).height();

                $("body").append(overlay);

                $("#sf_overlay")
                    .height(docHeight)
                    .css({
                    'position': 'absolute',
                    'top': 0,
                    'left': 0,
                    'background-color': 'rgba(0,0,0,0.4)',
                    'width': '100%',
                    'z-index': 5000
                });


                $("#sf_overlay form")
                    .css({
                    'position': 'relative',
                    'background-color': 'white',
                    'width': '50%',
                    'top': '40%',
                    'display': 'block',
                    'margin-left': 'auto',
                    'margin-right': 'auto',
                    'padding': '5px'
                });


            })(jQuery);

        };
        
        //Calling Identity Check API-o check if email exists or not.
        var identicheckUrl = buildURL(identicheckEndpoint + "/checkEmail", {"email": ''});

        var success = function (result, status, xhr) {        	
        	console.log("Logging Identity Check API results from IPS:");        		
		
            if (result["code"] == '40' && status=='success') { //when email not exists , code returned is 40 by API.         		 
            	//This change is done to limit the number of times popup shown to user.Parameter is provided by config or RDK calling code.
            	var numberOfPopupToShow=data.numberOfPopupToShowAbandoncart;	 
     	       
        	    if (utils.isNil(numberOfPopupToShow))
        	    {       
        	    	numberOfPopupToShow = config.numberOfPopupToShowAbandoncart();
                } 	   
        	           
        	    numberOfPopupToShow = parseInt(numberOfPopupToShow,10);        	  
        	           
        	    if(isNaN(numberOfPopupToShow))
        	    {
        	    	numberOfPopupToShow=config.numberOfPopupToShowAbandoncart();
        	    }
        	    
     		     //Read cookie value to know how many times pop up already shown to user.
        	    var numPopupAlreadyShown = utils.readCookie(config.cookieNameForAbandonCart());  
     		   
        	    if(utils.isNil(numPopupAlreadyShown))
     		    {   //To create cookie only for first time     		    
     		       utils.createCookie(config.cookieNameForAbandonCart(),0,config,null);         	 			
     		    }
     		   
     		       //Reading again the value of cookie since it has been created with 0 value
        	    numPopupAlreadyShown = utils.readCookie(config.cookieNameForAbandonCart());
 		        numPopupAlreadyShown = parseInt(numPopupAlreadyShown,10);
               
 		       if(numPopupAlreadyShown < numberOfPopupToShow)                 
  		       { //Show popup here and update cookie value by adding 1.
  		        showOverlay('prompt', data.messages); // Show prompt only if email not found but request successful   
  		        utils.createCookie(config.cookieNameForAbandonCart(),numPopupAlreadyShown+1,config,null); //Update cookie value This is same as creation because it will overdide.
  		      }   		      	
          }
        };


        remote.get(identicheckUrl, success);
     
    };

    conn._browse = _browse;
    conn._search = _search;
    conn._suggest = _suggest;
    conn._debug = _debug;
    conn._notify = _notify;
    conn._404page = _404page;
    conn._referrer = _referrer;
    conn._subscribe = _subscribe;
    conn._unsubscribe = _unsubscribe;
    conn._buy = _buy;
    conn._addToCart = _addToCart;
    conn._removeFromCart = _removeFromCart;
    conn._clearCart = _clearCart;
    conn._trxemail = _trxemail;
    conn._captureEmail = _captureEmail;
    
    return conn;

};

// #include Debug.js
// #include Connector.js

var async = async || {};

/**
 * Creates new instances of a Queue
 *
 * @param   {Config}      config     Global configuration options passed in the on the _setConfig commands
 * @param   {debug.Debugger=}       [debug]     Debugger instance
 *
 * @classdesc The queue is responsilbe for <br/> a) routing calls to an appropriate Connector instance <br/>b) Applying queued functions.
 * @constructs Queue
 * @memberof async
 */
async.Queue = function(config, debug) {
    var queue = {};
    var connector;
    var globalConfig = config;

    /**
     * Sets the Connector instance to be used by this Queue
     *
     * @param {Connector} conn  The connector instance
     *
     * @memberof Queue
     */
    queue.setConnector = function(conn) {
        connector = conn;
    };

    /**
     * Gets a reference to the connector.
     *
     * @return    The currently configured connector instance
     *
     * @memberof Queue
     */
    queue.getConnector = function() {
        return connector;
    };

    /**
     * Sets the Config instance to be used by this Queue
     *
     * @param {Config} conn  The connector instance
     *
     * @memberof Queue
     */
    queue.setConfig= function (conf) {
        globalConfig = conf;
    }

    /**
     * Gets a reference to the config instnace.
     *
     * @return {Config} The currently configured config instance
     *
     * @memberof Queue
     */
    queue.getConfig = function() {
        return globalConfig;
    }

    /**
     * Pushes a function or object onto the queue for processing. Objects are processed as soon as they are pushed
     * onto the queue (i.e. synchronous).
     *
     * Functions passed onto the queue are applied with a <code>this</code> reference of the <code>Connector</code> instance.
     *
     * @param {function()|Object|async.Command}   command     The object to process on the queue.
     *
     * @memberof Queue
     *
     */
    queue.push = function(command) {

        if (utils.typeOf(command) === "function") {
            // apply the function with the queue as the namespace
            try {
                command.apply(queue);
            } catch (e) {
                console.log("Error occured applying queue function", e);
            }

            return;
        }

        if (utils.typeOf(command) === "object") {

            // check to see if we have a command struct by looking for
            // the getArgs function
            if (utils.typeOf(command.getArgs) !== 'function') {
                command = async.Command(command);

                if (command === undefined) {
                    return;
                }
            }

            if (utils.typeOf(command.getArgs()) === 'function') {
                command.getArgs().apply(queue);
            } else {

                if (connector === undefined) {
                    // chuck a warning?
                    return;
                }

                var func = connector[command.getCommand()];

                if (func === undefined) {
                    // warning?
                    return;
                }

                func.apply(connector, [command.getArgs()]);
            }
        }

    };

    return queue;
};


/**
 * The main entry point into the Advisor application.
 *
 * @constructor
 */
var Application = function() {

    if (window.__advisor !== undefined) {
        return;
    }

    // place holder
    window.__advisor = {};

    // init jquery options
    jQuery.support.cors = true;


    // need to check here for the _advisorq type etc
    if (utils.typeOf(window._advisorq) !== 'array') {
        return;
    }

    // start the queue process
    var queue;

    // remote
    var remote;

    // connector
    var connector;

    // loop var
    var i;

    // debug reference
    var deb;

    // old queue reference - used as part of the switch'err'roo
    var oq;

    // a process queue
    var toproc = [];

    // holds any 'raw' functions that have been pushed on the queue.
    // these are processed last
    var funqueue = [];

    // configuration options
    var config = utils.Config();

    // process the queue and push all functions onto the funqueue
    for (i = window._advisorq.length - 1; i >= 0; i--) {
        if (typeof window._advisorq[i] === 'function') {
            funqueue.push(window._advisorq[i]);
            delete window._advisorq[i];
        }
    }

    // process the queue and create command object mappings
    var mappings = async.comparators.filter(window._advisorq);

    // check that we have the setAccount
    if (mappings._setAccount === undefined) {
        // nothing we can do here
        return;
    }

    // config
    if (mappings._setConfig) {
        config.set(mappings._setConfig.getArgs());
        delete mappings._setConfig;
    }


    // debug
    if (config.debug()) {
        var qparams = utils.getQueryParams();

        if (qparams.advisordebug && /[Yy]/.test(qparams.advisordebug)) {
            deb = debug.Debugger({}, config);
        }
    }

    queue = async.Queue(config);
    remote = net.Remote(config, deb);
    connector = Connector(remote, mappings._setAccount.getArgs(), config, deb);

    queue.setConnector(connector);

    delete mappings._setAccount;

    // referrer
    if (config.observeIncomingSearchTerm() === true) {
        var query = utils.parseReferer(document.referrer);

        if (query !== undefined) {
            connector._referrer({data: encodeURIComponent(query.query)});
        }
    }

    // _browse events first - note that 404 replaces browse events
    //  if nothing is setup, _browse event will be fired
    if (mappings._404page) {
        if (utils.typeOf(mappings._404Page) === 'array') {
            for (i = 0; i < mappings._404Page.length; i++) {
                queue.push(mappings._404Page[i]);
            }
        } else {
            queue.push(mappings._404Page);
        }
    } else if (mappings._browse) {
        if (utils.typeOf(mappings._browse) === 'array') {
            for (i = 0; i < mappings._browse.length; i++) {
                queue.push(mappings._browse[i]);
            }
        } else {
            queue.push(mappings._browse);
        }
    } else if (config.supressAutoNotification() === false) {
        // default browse if non are explicitly pushed
        queue.push({_browse: {}});
    }

    delete mappings._browse;

    // suggestions
    if (mappings._suggest) {
        if (utils.typeOf(mappings._suggest) === 'array') {
            for (i = 0; i < mappings._suggest.length; i++) {
                queue.push(mappings._suggest[i]);
            }
        } else {
            queue.push(mappings._suggest);
        }
    }
    delete mappings._suggest;


/*
    if (mappings._trxemail) {
        queue.push(mappings._trxemail);
    }

    delete mappings._trxemail;*/



    // eveything else

    utils.forEach(mappings, function(k, v) {
        if (utils.typeOf(v) === 'array') {

            for (i = 0; i < v.length; i++) {
                if (v[i]) {
                    toproc.push(v[i]);
                }
            }
        } else {
            toproc.push(v);
        }
    });

    toproc.sort(async.comparators.index);

    // process anything thats not been merged - e.g. functions
    for (i = 0; i < toproc.length; i++) {
        queue.push(toproc[i]);
    }

    for (i = 0; i < funqueue.length; i++) {
        queue.push(funqueue[i]);
    }

    // switch
    oq = window._advisorq;
    window._advisorq = queue;

    // capture anything thats been placed onto the queue since we started processing
    for (i = 0; i < oq.length; i++) {
        queue.push(oq[i]);
    }
};/**
 *
 * The main init function when used in a webpage
 * @private
 */
$(function() {

    try {
        if (utils.isBot()) {
            return;
        }

        Application();
    } catch (e) {
        // ignore - just make sure application exits OK without
        // affecting client page
        console.error("Error thrown during application run: " + e, e);
    }
});
})(window._sfajq || jQuery);
