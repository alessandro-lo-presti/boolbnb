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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/edit.js":
/*!******************************!*\
  !*** ./resources/js/edit.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

var edit = new Vue({
  el: '#edit',
  data: function data() {
    return {
      rooms: 0,
      beds: 0,
      bathrooms: 0,
      mq: 40,
      phpRooms: 'active',
      vueRooms: 'hidden',
      phpBeds: 'active',
      vueBeds: 'hidden',
      phpBathrooms: 'active',
      vueBathrooms: 'hidden',
      phpMq: 'active',
      vueMq: 'hidden',
      apiKey: 'GNSLhVGN7KNDGb9SFVEjknBWIKpB1HjX',
      applicationName: 'BoolBnb',
      applicationVersion: '1.0',
      form: document.getElementById('form')
    };
  },
  mounted: function mounted() {
    var _this = this;

    tt.setProductInfo(this.applicationName, this.applicationVersion);
    form.addEventListener('submit', function (event) {
      event.preventDefault();
      var address = document.getElementById('inputAddress').value;
      var city = document.getElementById('inputCity').value;
      tt.services.fuzzySearch({
        key: _this.apiKey,
        query: address + " " + city
      }).then(function (response) {
        var coords = response.results[0].position;
        document.getElementById('longitude').value = coords.lng;
        document.getElementById('latitude').value = coords.lat;
        form.submit();
      });
    });
  },
  methods: {
    addRoom: function addRoom() {
      this.phpRooms = 'hidden';
      this.vueRooms = 'active';
      this.rooms++;
    },
    removeRoom: function removeRoom() {
      this.phpRooms = 'hidden';
      this.vueRooms = 'active';

      if (this.rooms > 1) {
        this.rooms--;
      }
    },
    addBed: function addBed() {
      this.phpBeds = 'hidden';
      this.vueBeds = 'active';
      this.beds++;
    },
    removeBed: function removeBed() {
      this.phpBeds = 'hidden';
      this.vueBeds = 'active';

      if (this.beds > 1) {
        this.beds--;
      }
    },
    addBathroom: function addBathroom() {
      this.phpBathrooms = 'hidden';
      this.vueBathrooms = 'active';
      this.bathrooms++;
    },
    removeBathroom: function removeBathroom() {
      this.phpBathrooms = 'hidden';
      this.vueBathrooms = 'active';

      if (this.bathrooms > 1) {
        this.bathrooms--;
      }
    },
    addMq: function addMq() {
      this.phpMq = 'hidden';
      this.vueMq = 'active';
      this.mq += 5;
    },
    removeMq: function removeMq() {
      this.phpMq = 'hidden';
      this.vueMq = 'active';

      if (this.mq > 1) {
        this.mq -= 5;
      }
    }
  }
});

/***/ }),

/***/ 1:
/*!************************************!*\
  !*** multi ./resources/js/edit.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Volumes/PENNA/Programmazione/Corso24/mamp_public/progetto-finale/boolbnb/resources/js/edit.js */"./resources/js/edit.js");


/***/ })

/******/ });