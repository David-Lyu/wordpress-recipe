/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

module.exports = window["React"];

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
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
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
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!***********************!*\
  !*** ./src/index.jsx ***!
  \***********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);

// alert('hello from the new js file');

//wp-blocks dependency in php will load after the blocks have been bootstrapped
//wp has wp property to the window obj
wp.blocks.registerBlockType('ourplugin/are-you-paying-attention', {
  title: "Are You Paying Attention",
  icon: "smiley",
  category: "common",
  attributes: {
    skyColor: {
      type: "string"
    },
    grassColor: {
      type: "string"
    }
  },
  //what you see in the admin post editor screen
  edit: props => {
    //uses js to show what admin should see
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
      type: "text",
      placeholder: "sky color",
      value: props.attributes.skyColor,
      onChange: e => {
        props.setAttributes({
          skyColor: e.target.value
        });
      }
    }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
      type: "text",
      placeholder: "grass color",
      value: props.attributes.grassColor,
      onChange: e => {
        props.setAttributes({
          grassColor: e.target.value
        });
      }
    }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", null));
  },
  //public will see in content
  //Difference than before is making dynamic content where block types will be updated immediately
  save: props => {
    return null;
  }
  //stores the past changes (around 3h 5mins in) so if html structures changes some errors may occur
  //not needed since we dynamically make the content
  // deprecated: [{
  //     attributes:{
  //         skyColor: {type: "string"},
  //         grassColor: {type: "string"}
  //     },
  //     save: (props) => {
  //         return <p>Today the sky is {props.attributes.skyColor} and the grass is {props.attributes.grassColor}.</p>
  //     },
  // }]
});
})();

/******/ })()
;
//# sourceMappingURL=index.js.map