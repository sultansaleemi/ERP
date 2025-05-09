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

/***/ "./resources/assets/vendor/libs/formvalidation/dist/js/locales/it_IT.js":
/*!******************************************************************************!*\
  !*** ./resources/assets/vendor/libs/formvalidation/dist/js/locales/it_IT.js ***!
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
   * Italian language package
   * Translated by @maramazza
   */
  var it_IT = {
    base64: {
      "default": 'Si prega di inserire un valore codificato in Base 64'
    },
    between: {
      "default": 'Si prega di inserire un valore tra %s e %s',
      notInclusive: 'Si prega di scegliere rigorosamente un valore tra %s e %s'
    },
    bic: {
      "default": 'Si prega di inserire un numero BIC valido'
    },
    callback: {
      "default": 'Si prega di inserire un valore valido'
    },
    choice: {
      between: "Si prega di scegliere l'opzione tra %s e %s",
      "default": 'Si prega di inserire un valore valido',
      less: "Si prega di scegliere come minimo l'opzione %s",
      more: "Si prega di scegliere al massimo l'opzione %s"
    },
    color: {
      "default": 'Si prega di inserire un colore valido'
    },
    creditCard: {
      "default": 'Si prega di inserire un numero di carta di credito valido'
    },
    cusip: {
      "default": 'Si prega di inserire un numero CUSIP valido'
    },
    date: {
      "default": 'Si prega di inserire una data valida',
      max: 'Si prega di inserire una data antecedente il %s',
      min: 'Si prega di inserire una data successiva al %s',
      range: 'Si prega di inserire una data compresa tra %s - %s'
    },
    different: {
      "default": 'Si prega di inserire un valore differente'
    },
    digits: {
      "default": 'Si prega di inserire solo numeri'
    },
    ean: {
      "default": 'Si prega di inserire un numero EAN valido'
    },
    ein: {
      "default": 'Si prega di inserire un numero EIN valido'
    },
    emailAddress: {
      "default": 'Si prega di inserire un indirizzo email valido'
    },
    file: {
      "default": 'Si prega di scegliere un file valido'
    },
    greaterThan: {
      "default": 'Si prega di inserire un numero maggiore o uguale a %s',
      notInclusive: 'Si prega di inserire un numero maggiore di %s'
    },
    grid: {
      "default": 'Si prega di inserire un numero GRId valido'
    },
    hex: {
      "default": 'Si prega di inserire un numero esadecimale valido'
    },
    iban: {
      countries: {
        AD: 'Andorra',
        AE: 'Emirati Arabi Uniti',
        AL: 'Albania',
        AO: 'Angola',
        AT: 'Austria',
        AZ: 'Azerbaijan',
        BA: 'Bosnia-Erzegovina',
        BE: 'Belgio',
        BF: 'Burkina Faso',
        BG: 'Bulgaria',
        BH: 'Bahrain',
        BI: 'Burundi',
        BJ: 'Benin',
        BR: 'Brasile',
        CH: 'Svizzera',
        CI: "Costa d'Avorio",
        CM: 'Cameron',
        CR: 'Costa Rica',
        CV: 'Capo Verde',
        CY: 'Cipro',
        CZ: 'Republica Ceca',
        DE: 'Germania',
        DK: 'Danimarca',
        DO: 'Repubblica Domenicana',
        DZ: 'Algeria',
        EE: 'Estonia',
        ES: 'Spagna',
        FI: 'Finlandia',
        FO: 'Isole Faroe',
        FR: 'Francia',
        GB: 'Regno Unito',
        GE: 'Georgia',
        GI: 'Gibilterra',
        GL: 'Groenlandia',
        GR: 'Grecia',
        GT: 'Guatemala',
        HR: 'Croazia',
        HU: 'Ungheria',
        IE: 'Irlanda',
        IL: 'Israele',
        IR: 'Iran',
        IS: 'Islanda',
        IT: 'Italia',
        JO: 'Giordania',
        KW: 'Kuwait',
        KZ: 'Kazakhstan',
        LB: 'Libano',
        LI: 'Liechtenstein',
        LT: 'Lituania',
        LU: 'Lussemburgo',
        LV: 'Lettonia',
        MC: 'Monaco',
        MD: 'Moldavia',
        ME: 'Montenegro',
        MG: 'Madagascar',
        MK: 'Macedonia',
        ML: 'Mali',
        MR: 'Mauritania',
        MT: 'Malta',
        MU: 'Mauritius',
        MZ: 'Mozambico',
        NL: 'Olanda',
        NO: 'Norvegia',
        PK: 'Pachistan',
        PL: 'Polonia',
        PS: 'Palestina',
        PT: 'Portogallo',
        QA: 'Qatar',
        RO: 'Romania',
        RS: 'Serbia',
        SA: 'Arabia Saudita',
        SE: 'Svezia',
        SI: 'Slovenia',
        SK: 'Slovacchia',
        SM: 'San Marino',
        SN: 'Senegal',
        TL: 'Timor Est',
        TN: 'Tunisia',
        TR: 'Turchia',
        VG: 'Isole Vergini, Inghilterra',
        XK: 'Repubblica del Kosovo'
      },
      country: 'Si prega di inserire un numero IBAN valido per %s',
      "default": 'Si prega di inserire un numero IBAN valido'
    },
    id: {
      countries: {
        BA: 'Bosnia-Erzegovina',
        BG: 'Bulgaria',
        BR: 'Brasile',
        CH: 'Svizzera',
        CL: 'Chile',
        CN: 'Cina',
        CZ: 'Republica Ceca',
        DK: 'Danimarca',
        EE: 'Estonia',
        ES: 'Spagna',
        FI: 'Finlandia',
        HR: 'Croazia',
        IE: 'Irlanda',
        IS: 'Islanda',
        LT: 'Lituania',
        LV: 'Lettonia',
        ME: 'Montenegro',
        MK: 'Macedonia',
        NL: 'Paesi Bassi',
        PL: 'Polonia',
        RO: 'Romania',
        RS: 'Serbia',
        SE: 'Svezia',
        SI: 'Slovenia',
        SK: 'Slovacchia',
        SM: 'San Marino',
        TH: 'Thailandia',
        TR: 'Turchia',
        ZA: 'Sudafrica'
      },
      country: 'Si prega di inserire un numero di identificazione valido per %s',
      "default": 'Si prega di inserire un numero di identificazione valido'
    },
    identical: {
      "default": 'Si prega di inserire un valore identico'
    },
    imei: {
      "default": 'Si prega di inserire un numero IMEI valido'
    },
    imo: {
      "default": 'Si prega di inserire un numero IMO valido'
    },
    integer: {
      "default": 'Si prega di inserire un numero valido'
    },
    ip: {
      "default": 'Please enter a valid IP address',
      ipv4: 'Si prega di inserire un indirizzo IPv4 valido',
      ipv6: 'Si prega di inserire un indirizzo IPv6 valido'
    },
    isbn: {
      "default": 'Si prega di inserire un numero ISBN valido'
    },
    isin: {
      "default": 'Si prega di inserire un numero ISIN valido'
    },
    ismn: {
      "default": 'Si prega di inserire un numero ISMN valido'
    },
    issn: {
      "default": 'Si prega di inserire un numero ISSN valido'
    },
    lessThan: {
      "default": 'Si prega di inserire un valore minore o uguale a %s',
      notInclusive: 'Si prega di inserire un valore minore di %s'
    },
    mac: {
      "default": 'Si prega di inserire un valido MAC address'
    },
    meid: {
      "default": 'Si prega di inserire un numero MEID valido'
    },
    notEmpty: {
      "default": 'Si prega di non lasciare il campo vuoto'
    },
    numeric: {
      "default": 'Si prega di inserire un numero con decimali valido'
    },
    phone: {
      countries: {
        AE: 'Emirati Arabi Uniti',
        BG: 'Bulgaria',
        BR: 'Brasile',
        CN: 'Cina',
        CZ: 'Republica Ceca',
        DE: 'Germania',
        DK: 'Danimarca',
        ES: 'Spagna',
        FR: 'Francia',
        GB: 'Regno Unito',
        IN: 'India',
        MA: 'Marocco',
        NL: 'Olanda',
        PK: 'Pakistan',
        RO: 'Romania',
        RU: 'Russia',
        SK: 'Slovacchia',
        TH: 'Thailandia',
        US: "Stati Uniti d'America",
        VE: 'Venezuelano'
      },
      country: 'Si prega di inserire un numero di telefono valido per %s',
      "default": 'Si prega di inserire un numero di telefono valido'
    },
    promise: {
      "default": 'Si prega di inserire un valore valido'
    },
    regexp: {
      "default": 'Inserisci un valore che corrisponde al modello'
    },
    remote: {
      "default": 'Si prega di inserire un valore valido'
    },
    rtn: {
      "default": 'Si prega di inserire un numero RTN valido'
    },
    sedol: {
      "default": 'Si prega di inserire un numero SEDOL valido'
    },
    siren: {
      "default": 'Si prega di inserire un numero SIREN valido'
    },
    siret: {
      "default": 'Si prega di inserire un numero SIRET valido'
    },
    step: {
      "default": 'Si prega di inserire uno step valido di %s'
    },
    stringCase: {
      "default": 'Si prega di inserire solo caratteri minuscoli',
      upper: 'Si prega di inserire solo caratteri maiuscoli'
    },
    stringLength: {
      between: 'Si prega di inserire un numero di caratteri compreso tra  %s e %s',
      "default": 'Si prega di inserire un valore con lunghezza valida',
      less: 'Si prega di inserire meno di %s caratteri',
      more: 'Si prega di inserire piu di %s caratteri'
    },
    uri: {
      "default": 'Si prega di inserire un URI valido'
    },
    uuid: {
      "default": 'Si prega di inserire un numero UUID valido',
      version: 'Si prega di inserire un numero di versione UUID %s valido'
    },
    vat: {
      countries: {
        AT: 'Austria',
        BE: 'Belgio',
        BG: 'Bulgaria',
        BR: 'Brasiliano',
        CH: 'Svizzera',
        CY: 'Cipro',
        CZ: 'Republica Ceca',
        DE: 'Germania',
        DK: 'Danimarca',
        EE: 'Estonia',
        EL: 'Grecia',
        ES: 'Spagna',
        FI: 'Finlandia',
        FR: 'Francia',
        GB: 'Regno Unito',
        GR: 'Grecia',
        HR: 'Croazia',
        HU: 'Ungheria',
        IE: 'Irlanda',
        IS: 'Islanda',
        IT: 'Italia',
        LT: 'Lituania',
        LU: 'Lussemburgo',
        LV: 'Lettonia',
        MT: 'Malta',
        NL: 'Olanda',
        NO: 'Norvegia',
        PL: 'Polonia',
        PT: 'Portogallo',
        RO: 'Romania',
        RS: 'Serbia',
        RU: 'Russia',
        SE: 'Svezia',
        SI: 'Slovenia',
        SK: 'Slovacchia',
        VE: 'Venezuelano',
        ZA: 'Sud Africano'
      },
      country: 'Si prega di inserire un valore di IVA valido per %s',
      "default": 'Si prega di inserire un valore di IVA valido'
    },
    vin: {
      "default": 'Si prega di inserire un numero VIN valido'
    },
    zipCode: {
      countries: {
        AT: 'Austria',
        BG: 'Bulgaria',
        BR: 'Brasile',
        CA: 'Canada',
        CH: 'Svizzera',
        CZ: 'Republica Ceca',
        DE: 'Germania',
        DK: 'Danimarca',
        ES: 'Spagna',
        FR: 'Francia',
        GB: 'Regno Unito',
        IE: 'Irlanda',
        IN: 'India',
        IT: 'Italia',
        MA: 'Marocco',
        NL: 'Paesi Bassi',
        PL: 'Polonia',
        PT: 'Portogallo',
        RO: 'Romania',
        RU: 'Russia',
        SE: 'Svezia',
        SG: 'Singapore',
        SK: 'Slovacchia',
        US: "Stati Uniti d'America"
      },
      country: 'Si prega di inserire un codice postale valido per %s',
      "default": 'Si prega di inserire un codice postale valido'
    }
  };
  return it_IT;
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
/******/ 	var __webpack_exports__ = __webpack_require__("./resources/assets/vendor/libs/formvalidation/dist/js/locales/it_IT.js");
/******/ 	
/******/ 	return __webpack_exports__;
/******/ })()
;
});