/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./public/assets/module.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./public/assets/module.js":
/*!*********************************!*\
  !*** ./public/assets/module.js ***!
  \*********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _scss_base_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./scss/base.scss */ \"./public/assets/scss/base.scss\");\n/* harmony import */ var _scss_base_scss__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_scss_base_scss__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _scripts_welcome_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./scripts/welcome.js */ \"./public/assets/scripts/welcome.js\");\n/* Style */\n\n/* Scripts */\n\n\n/* Use Scripts */\n\nObject(_scripts_welcome_js__WEBPACK_IMPORTED_MODULE_1__[\"default\"])(3.8);\n\n//# sourceURL=webpack:///./public/assets/module.js?");

/***/ }),

/***/ "./public/assets/scripts/helpers/encodeQueryData.js":
/*!**********************************************************!*\
  !*** ./public/assets/scripts/helpers/encodeQueryData.js ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* Transforme un objet, en une http query */\nvar encodeQueryData = function encodeQueryData(data) {\n  var ret = [];\n\n  for (var d in data) {\n    ret.push(encodeURIComponent(d) + '=' + encodeURIComponent(data[d]));\n  }\n\n  return ret.join('&');\n};\n\n/* harmony default export */ __webpack_exports__[\"default\"] = (encodeQueryData);\n\n//# sourceURL=webpack:///./public/assets/scripts/helpers/encodeQueryData.js?");

/***/ }),

/***/ "./public/assets/scripts/welcome.js":
/*!******************************************!*\
  !*** ./public/assets/scripts/welcome.js ***!
  \******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _helpers_encodeQueryData__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./helpers/encodeQueryData */ \"./public/assets/scripts/helpers/encodeQueryData.js\");\n\n\nvar welcome = function welcome(second) {\n  /* Desktop or mobile */\n  getMobileVersion();\n  /* Home first aninamtion */\n\n  fullStarkWelcome(second);\n  /* Manage of scrollButton */\n\n  scrollTopAndBottom();\n  /* Scrolling effect */\n\n  scrollHomeModule();\n  /* Contact form */\n\n  contactForm();\n};\n\nvar getMobileVersion = function getMobileVersion() {\n  var body = document.querySelector('body');\n  var width = body.style.maxWidth;\n  var height = body.style.maxHeight;\n};\n/* FullStark aninamtion on welcome page */\n\n\nvar fullStarkWelcome = function fullStarkWelcome(second) {\n  var div = document.querySelector('.welcome-animation');\n  setTimeout(function (event) {\n    div.style.display = \"none\";\n  }, second * 1000);\n};\n/* Manage of scrollButton */\n\n\nvar scrollTopAndBottom = function scrollTopAndBottom() {\n  var up = document.querySelector('aside .up');\n  var ask = document.querySelector('.ask');\n  var down = document.querySelector('aside .down');\n  var aside = document.querySelector('aside');\n  var article = document.querySelector('article');\n  aside.addEventListener('click', function (event) {\n    // Up button opacity\n    article.scrollTop > 0 ? up.style.opacity = 1 : up.style.opacity = 0; // Down button opacity\n\n    if (article.scrollTop === article.scrollHeight - article.clientHeight) {\n      ask.style.opacity = 0;\n      down.style.opacity = 0;\n    } else {\n      ask.style.opacity = 1;\n      down.style.opacity = 1;\n    }\n  });\n};\n/* Traitement of contact form */\n\n\nvar contactForm = function contactForm() {\n  /* Définition du bouton de soumission */\n  var result = document.querySelector('form .result');\n  var submit = document.querySelector('form .submit');\n  /* Traitement de la soumission du formulaire */\n\n  submit.addEventListener('click', function (event) {\n    var host = window.location.host;\n    var params = {\n      \"fullname\": document.querySelector('form .fullname').value,\n      \"email\": document.querySelector('form .email').value,\n      \"phone\": document.querySelector('form .phone').value,\n      \"message\": document.querySelector('form .message').value,\n      \"token\": document.querySelector('form .token').value\n    };\n    var qerry = Object(_helpers_encodeQueryData__WEBPACK_IMPORTED_MODULE_0__[\"default\"])(params);\n    var http = new XMLHttpRequest();\n    http.open('POST', 'http://www.local.adebayo.me:8888/home/contactForm', false);\n    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');\n    http.send(qerry);\n\n    if (http.status === 200) {\n      result.innerHTML = \"Message envoyé avec succès\";\n      result.style.marginTop = \"5px\";\n      result.style.marginBottom = \"15px\";\n      result.style.color = \"#439E41\";\n      result.style.fontSize = \"18px\";\n    } else {}\n  });\n};\n/* Manage article aninamtion */\n\n\nvar scrollHomeModule = function scrollHomeModule() {\n  /* Définition des constantes */\n  var up = document.querySelector('.up');\n  var down = document.querySelector('.down');\n  var article = document.querySelector('article');\n  var message = document.querySelector('.ask');\n  /* On monte d'une div */\n\n  up.addEventListener('click', function (event) {\n    var value = article.scrollTop - article.offsetHeight;\n    article.scrollTop = value;\n  });\n  /* On descend d'une div */\n\n  down.addEventListener('click', function (event) {\n    var value = article.scrollTop + article.offsetHeight;\n    article.scrollTop = value;\n  }); // On descend jusqu'au formuliare de contact\n\n  message.addEventListener('click', function (event) {\n    article.scrollTo(0, article.scrollHeight);\n  });\n};\n\n/* harmony default export */ __webpack_exports__[\"default\"] = (welcome);\n\n//# sourceURL=webpack:///./public/assets/scripts/welcome.js?");

/***/ }),

/***/ "./public/assets/scss/base.scss":
/*!**************************************!*\
  !*** ./public/assets/scss/base.scss ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("// extracted by mini-css-extract-plugin\n\n//# sourceURL=webpack:///./public/assets/scss/base.scss?");

/***/ })

/******/ });