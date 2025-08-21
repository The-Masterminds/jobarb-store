/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./platform/plugins/announcement/resources/js/js.cookie.js":
/*!*****************************************************************!*\
  !*** ./platform/plugins/announcement/resources/js/js.cookie.js ***!
  \*****************************************************************/
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
/*! js-cookie v3.0.5 | MIT */
;
(function (global, factory) {
  ( false ? 0 : _typeof(exports)) === 'object' && "object" !== 'undefined' ? module.exports = factory() :  true ? !(__WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
		__WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : (0);
})(this, function () {
  'use strict';

  /* eslint-disable no-var */
  function assign(target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i];
      for (var key in source) {
        target[key] = source[key];
      }
    }
    return target;
  }
  /* eslint-enable no-var */

  /* eslint-disable no-var */
  var defaultConverter = {
    read: function read(value) {
      if (value[0] === '"') {
        value = value.slice(1, -1);
      }
      return value.replace(/(%[\dA-F]{2})+/gi, decodeURIComponent);
    },
    write: function write(value) {
      return encodeURIComponent(value).replace(/%(2[346BF]|3[AC-F]|40|5[BDE]|60|7[BCD])/g, decodeURIComponent);
    }
  };
  /* eslint-enable no-var */

  /* eslint-disable no-var */

  function init(converter, defaultAttributes) {
    function set(name, value, attributes) {
      if (typeof document === 'undefined') {
        return;
      }
      attributes = assign({}, defaultAttributes, attributes);
      if (typeof attributes.expires === 'number') {
        attributes.expires = new Date(Date.now() + attributes.expires * 864e5);
      }
      if (attributes.expires) {
        attributes.expires = attributes.expires.toUTCString();
      }
      name = encodeURIComponent(name).replace(/%(2[346B]|5E|60|7C)/g, decodeURIComponent).replace(/[()]/g, escape);
      var stringifiedAttributes = '';
      for (var attributeName in attributes) {
        if (!attributes[attributeName]) {
          continue;
        }
        stringifiedAttributes += '; ' + attributeName;
        if (attributes[attributeName] === true) {
          continue;
        }

        // Considers RFC 6265 section 5.2:
        // ...
        // 3.  If the remaining unparsed-attributes contains a %x3B (";")
        //     character:
        // Consume the characters of the unparsed-attributes up to,
        // not including, the first %x3B (";") character.
        // ...
        stringifiedAttributes += '=' + attributes[attributeName].split(';')[0];
      }
      return document.cookie = name + '=' + converter.write(value, name) + stringifiedAttributes;
    }
    function get(name) {
      if (typeof document === 'undefined' || arguments.length && !name) {
        return;
      }

      // To prevent the for loop in the first place assign an empty array
      // in case there are no cookies at all.
      var cookies = document.cookie ? document.cookie.split('; ') : [];
      var jar = {};
      for (var i = 0; i < cookies.length; i++) {
        var parts = cookies[i].split('=');
        var value = parts.slice(1).join('=');
        try {
          var found = decodeURIComponent(parts[0]);
          jar[found] = converter.read(value, found);
          if (name === found) {
            break;
          }
        } catch (e) {}
      }
      return name ? jar[name] : jar;
    }
    return Object.create({
      set: set,
      get: get,
      remove: function remove(name, attributes) {
        set(name, '', assign({}, attributes, {
          expires: -1
        }));
      },
      withAttributes: function withAttributes(attributes) {
        return init(this.converter, assign({}, this.attributes, attributes));
      },
      withConverter: function withConverter(converter) {
        return init(assign({}, this.converter, converter), this.attributes);
      }
    }, {
      attributes: {
        value: Object.freeze(defaultAttributes)
      },
      converter: {
        value: Object.freeze(converter)
      }
    });
  }
  var api = init(defaultConverter, {
    path: '/'
  });
  /* eslint-enable no-var */

  return api;
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
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry needs to be wrapped in an IIFE because it needs to be in strict mode.
(() => {
"use strict";
/*!********************************************************************!*\
  !*** ./platform/plugins/announcement/resources/js/announcement.js ***!
  \********************************************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _js_cookie__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./js.cookie */ "./platform/plugins/announcement/resources/js/js.cookie.js");
/* harmony import */ var _js_cookie__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_js_cookie__WEBPACK_IMPORTED_MODULE_0__);
function _toConsumableArray(r) { return _arrayWithoutHoles(r) || _iterableToArray(r) || _unsupportedIterableToArray(r) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _iterableToArray(r) { if ("undefined" != typeof Symbol && null != r[Symbol.iterator] || null != r["@@iterator"]) return Array.from(r); }
function _arrayWithoutHoles(r) { if (Array.isArray(r)) return _arrayLikeToArray(r); }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }

'use strict';
document.addEventListener('DOMContentLoaded', function () {
  var wrapper = document.querySelector('.ae-anno-announcement-wrapper');
  if (!wrapper) {
    return;
  }
  var announcements = wrapper.querySelectorAll('.ae-anno-announcement');
  var nextBtn = document.querySelector('.ae-anno-announcement__next-button');
  var prevBtn = document.querySelector('.ae-anno-announcement__previous-button');
  var dismissButton = document.querySelector('.ae-anno-announcement__dismiss-button');
  var autoplay = wrapper.getAttribute('data-announcement-autoplay') !== null;
  var autoplayDelay = parseInt(wrapper.getAttribute('data-announcement-autoplay-delay') || 5000);
  var dismissedAnnouncements = JSON.parse(_js_cookie__WEBPACK_IMPORTED_MODULE_0___default().get('ae-anno-dismissed-announcements') || '[]');
  var currentIndex = 1;
  var autoplayInterval = null;
  var autoplayAnnouncement = function autoplayAnnouncement() {
    if (autoplay && autoplayDelay) {
      if (autoplayInterval) {
        clearInterval(autoplayInterval);
      }
      autoplayInterval = setInterval(function () {
        currentIndex++;
        showAnnouncement(currentIndex);
      }, autoplayDelay);
    }
  };
  var showAnnouncement = function showAnnouncement() {
    if (currentIndex > announcements.length) {
      currentIndex = 1;
    } else if (currentIndex < 1) {
      currentIndex = announcements.length;
    }
    announcements.forEach(function (announcement) {
      announcement.style.display = 'none';
    });
    announcements[currentIndex - 1].style.display = 'block';
    autoplayAnnouncement();
  };
  showAnnouncement(currentIndex);
  if (nextBtn) {
    nextBtn.addEventListener('click', function () {
      currentIndex++;
      showAnnouncement(currentIndex);
    });
  }
  if (prevBtn) {
    prevBtn.addEventListener('click', function () {
      showAnnouncement(currentIndex--);
    });
  }
  if (dismissButton) {
    dismissButton.addEventListener('click', function () {
      var ids = JSON.parse(dismissButton.getAttribute('data-announcement-ids'));
      dismissedAnnouncements.push.apply(dismissedAnnouncements, _toConsumableArray(ids));
      _js_cookie__WEBPACK_IMPORTED_MODULE_0___default().set('ae-anno-dismissed-announcements', JSON.stringify(dismissedAnnouncements), {
        expires: 365
      });
      wrapper.parentNode.removeChild(wrapper);
    });
  }
  autoplayAnnouncement();
});
})();

/******/ })()
;