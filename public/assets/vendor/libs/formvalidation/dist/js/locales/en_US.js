(function webpackUniversalModuleDefinition(root, factory) {
	if(typeof exports === 'object' && typeof module === 'object')
		module.exports = factory();
	else if(typeof define === 'function' && define.amd)
		define([], factory);
	else {
		var a = factory();
		for(var i in a) (typeof exports === 'object' ? exports : root)[i] = a[i];
	}
})(self, function() {
return /******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/vendor/libs/formvalidation/dist/js/locales/en_US.js":
/*!******************************************************************************!*\
  !*** ./resources/assets/vendor/libs/formvalidation/dist/js/locales/en_US.js ***!
  \******************************************************************************/
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
(function (global, factory) {
  ( false ? 0 : _typeof(exports)) === 'object' && "object" !== 'undefined' ? module.exports = factory() :  true ? !(__WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
		__WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : (0);
})(this, function () {
  'use strict';

  /**
   * English language package
   * Translated by @nghuuphuoc
   */
  var en_US = {
    base64: {
      "default": 'Please enter a valid base 64 encoded'
    },
    between: {
      "default": 'Please enter a value between %s and %s',
      notInclusive: 'Please enter a value between %s and %s strictly'
    },
    bic: {
      "default": 'Please enter a valid BIC number'
    },
    callback: {
      "default": 'Please enter a valid value'
    },
    choice: {
      between: 'Please choose %s - %s options',
      "default": 'Please enter a valid value',
      less: 'Please choose %s options at minimum',
      more: 'Please choose %s options at maximum'
    },
    color: {
      "default": 'Please enter a valid color'
    },
    creditCard: {
      "default": 'Please enter a valid credit card number'
    },
    cusip: {
      "default": 'Please enter a valid CUSIP number'
    },
    date: {
      "default": 'Please enter a valid date',
      max: 'Please enter a date before %s',
      min: 'Please enter a date after %s',
      range: 'Please enter a date in the range %s - %s'
    },
    different: {
      "default": 'Please enter a different value'
    },
    digits: {
      "default": 'Please enter only digits'
    },
    ean: {
      "default": 'Please enter a valid EAN number'
    },
    ein: {
      "default": 'Please enter a valid EIN number'
    },
    emailAddress: {
      "default": 'Please enter a valid email address'
    },
    file: {
      "default": 'Please choose a valid file'
    },
    greaterThan: {
      "default": 'Please enter a value greater than or equal to %s',
      notInclusive: 'Please enter a value greater than %s'
    },
    grid: {
      "default": 'Please enter a valid GRId number'
    },
    hex: {
      "default": 'Please enter a valid hexadecimal number'
    },
    iban: {
      countries: {
        AD: 'Andorra',
        AE: 'United Arab Emirates',
        AL: 'Albania',
        AO: 'Angola',
        AT: 'Austria',
        AZ: 'Azerbaijan',
        BA: 'Bosnia and Herzegovina',
        BE: 'Belgium',
        BF: 'Burkina Faso',
        BG: 'Bulgaria',
        BH: 'Bahrain',
        BI: 'Burundi',
        BJ: 'Benin',
        BR: 'Brazil',
        CH: 'Switzerland',
        CI: 'Ivory Coast',
        CM: 'Cameroon',
        CR: 'Costa Rica',
        CV: 'Cape Verde',
        CY: 'Cyprus',
        CZ: 'Czech Republic',
        DE: 'Germany',
        DK: 'Denmark',
        DO: 'Dominican Republic',
        DZ: 'Algeria',
        EE: 'Estonia',
        ES: 'Spain',
        FI: 'Finland',
        FO: 'Faroe Islands',
        FR: 'France',
        GB: 'United Kingdom',
        GE: 'Georgia',
        GI: 'Gibraltar',
        GL: 'Greenland',
        GR: 'Greece',
        GT: 'Guatemala',
        HR: 'Croatia',
        HU: 'Hungary',
        IE: 'Ireland',
        IL: 'Israel',
        IR: 'Iran',
        IS: 'Iceland',
        IT: 'Italy',
        JO: 'Jordan',
        KW: 'Kuwait',
        KZ: 'Kazakhstan',
        LB: 'Lebanon',
        LI: 'Liechtenstein',
        LT: 'Lithuania',
        LU: 'Luxembourg',
        LV: 'Latvia',
        MC: 'Monaco',
        MD: 'Moldova',
        ME: 'Montenegro',
        MG: 'Madagascar',
        MK: 'Macedonia',
        ML: 'Mali',
        MR: 'Mauritania',
        MT: 'Malta',
        MU: 'Mauritius',
        MZ: 'Mozambique',
        NL: 'Netherlands',
        NO: 'Norway',
        PK: 'Pakistan',
        PL: 'Poland',
        PS: 'Palestine',
        PT: 'Portugal',
        QA: 'Qatar',
        RO: 'Romania',
        RS: 'Serbia',
        SA: 'Saudi Arabia',
        SE: 'Sweden',
        SI: 'Slovenia',
        SK: 'Slovakia',
        SM: 'San Marino',
        SN: 'Senegal',
        TL: 'East Timor',
        TN: 'Tunisia',
        TR: 'Turkey',
        VG: 'Virgin Islands, British',
        XK: 'Republic of Kosovo'
      },
      country: 'Please enter a valid IBAN number in %s',
      "default": 'Please enter a valid IBAN number'
    },
    id: {
      countries: {
        BA: 'Bosnia and Herzegovina',
        BG: 'Bulgaria',
        BR: 'Brazil',
        CH: 'Switzerland',
        CL: 'Chile',
        CN: 'China',
        CZ: 'Czech Republic',
        DK: 'Denmark',
        EE: 'Estonia',
        ES: 'Spain',
        FI: 'Finland',
        HR: 'Croatia',
        IE: 'Ireland',
        IS: 'Iceland',
        LT: 'Lithuania',
        LV: 'Latvia',
        ME: 'Montenegro',
        MK: 'Macedonia',
        NL: 'Netherlands',
        PL: 'Poland',
        RO: 'Romania',
        RS: 'Serbia',
        SE: 'Sweden',
        SI: 'Slovenia',
        SK: 'Slovakia',
        SM: 'San Marino',
        TH: 'Thailand',
        TR: 'Turkey',
        ZA: 'South Africa'
      },
      country: 'Please enter a valid identification number in %s',
      "default": 'Please enter a valid identification number'
    },
    identical: {
      "default": 'Please enter the same value'
    },
    imei: {
      "default": 'Please enter a valid IMEI number'
    },
    imo: {
      "default": 'Please enter a valid IMO number'
    },
    integer: {
      "default": 'Please enter a valid number'
    },
    ip: {
      "default": 'Please enter a valid IP address',
      ipv4: 'Please enter a valid IPv4 address',
      ipv6: 'Please enter a valid IPv6 address'
    },
    isbn: {
      "default": 'Please enter a valid ISBN number'
    },
    isin: {
      "default": 'Please enter a valid ISIN number'
    },
    ismn: {
      "default": 'Please enter a valid ISMN number'
    },
    issn: {
      "default": 'Please enter a valid ISSN number'
    },
    lessThan: {
      "default": 'Please enter a value less than or equal to %s',
      notInclusive: 'Please enter a value less than %s'
    },
    mac: {
      "default": 'Please enter a valid MAC address'
    },
    meid: {
      "default": 'Please enter a valid MEID number'
    },
    notEmpty: {
      "default": 'Please enter a value'
    },
    numeric: {
      "default": 'Please enter a valid float number'
    },
    phone: {
      countries: {
        AE: 'United Arab Emirates',
        BG: 'Bulgaria',
        BR: 'Brazil',
        CN: 'China',
        CZ: 'Czech Republic',
        DE: 'Germany',
        DK: 'Denmark',
        ES: 'Spain',
        FR: 'France',
        GB: 'United Kingdom',
        IN: 'India',
        MA: 'Morocco',
        NL: 'Netherlands',
        PK: 'Pakistan',
        RO: 'Romania',
        RU: 'Russia',
        SK: 'Slovakia',
        TH: 'Thailand',
        US: 'USA',
        VE: 'Venezuela'
      },
      country: 'Please enter a valid phone number in %s',
      "default": 'Please enter a valid phone number'
    },
    promise: {
      "default": 'Please enter a valid value'
    },
    regexp: {
      "default": 'Please enter a value matching the pattern'
    },
    remote: {
      "default": 'Please enter a valid value'
    },
    rtn: {
      "default": 'Please enter a valid RTN number'
    },
    sedol: {
      "default": 'Please enter a valid SEDOL number'
    },
    siren: {
      "default": 'Please enter a valid SIREN number'
    },
    siret: {
      "default": 'Please enter a valid SIRET number'
    },
    step: {
      "default": 'Please enter a valid step of %s'
    },
    stringCase: {
      "default": 'Please enter only lowercase characters',
      upper: 'Please enter only uppercase characters'
    },
    stringLength: {
      between: 'Please enter value between %s and %s characters long',
      "default": 'Please enter a value with valid length',
      less: 'Please enter less than %s characters',
      more: 'Please enter more than %s characters'
    },
    uri: {
      "default": 'Please enter a valid URI'
    },
    uuid: {
      "default": 'Please enter a valid UUID number',
      version: 'Please enter a valid UUID version %s number'
    },
    vat: {
      countries: {
        AT: 'Austria',
        BE: 'Belgium',
        BG: 'Bulgaria',
        BR: 'Brazil',
        CH: 'Switzerland',
        CY: 'Cyprus',
        CZ: 'Czech Republic',
        DE: 'Germany',
        DK: 'Denmark',
        EE: 'Estonia',
        EL: 'Greece',
        ES: 'Spain',
        FI: 'Finland',
        FR: 'France',
        GB: 'United Kingdom',
        GR: 'Greece',
        HR: 'Croatia',
        HU: 'Hungary',
        IE: 'Ireland',
        IS: 'Iceland',
        IT: 'Italy',
        LT: 'Lithuania',
        LU: 'Luxembourg',
        LV: 'Latvia',
        MT: 'Malta',
        NL: 'Netherlands',
        NO: 'Norway',
        PL: 'Poland',
        PT: 'Portugal',
        RO: 'Romania',
        RS: 'Serbia',
        RU: 'Russia',
        SE: 'Sweden',
        SI: 'Slovenia',
        SK: 'Slovakia',
        VE: 'Venezuela',
        ZA: 'South Africa'
      },
      country: 'Please enter a valid VAT number in %s',
      "default": 'Please enter a valid VAT number'
    },
    vin: {
      "default": 'Please enter a valid VIN number'
    },
    zipCode: {
      countries: {
        AT: 'Austria',
        BG: 'Bulgaria',
        BR: 'Brazil',
        CA: 'Canada',
        CH: 'Switzerland',
        CZ: 'Czech Republic',
        DE: 'Germany',
        DK: 'Denmark',
        ES: 'Spain',
        FR: 'France',
        GB: 'United Kingdom',
        IE: 'Ireland',
        IN: 'India',
        IT: 'Italy',
        MA: 'Morocco',
        NL: 'Netherlands',
        PL: 'Poland',
        PT: 'Portugal',
        RO: 'Romania',
        RU: 'Russia',
        SE: 'Sweden',
        SG: 'Singapore',
        SK: 'Slovakia',
        US: 'USA'
      },
      country: 'Please enter a valid postal code in %s',
      "default": 'Please enter a valid postal code'
    }
  };
  return en_US;
});

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module is referenced by other modules so it can't be inlined
/******/ 	var __webpack_exports__ = __webpack_require__("./resources/assets/vendor/libs/formvalidation/dist/js/locales/en_US.js");
/******/ 	
/******/ 	return __webpack_exports__;
/******/ })()
;
});