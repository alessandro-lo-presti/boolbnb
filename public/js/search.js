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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/search.js":
/*!********************************!*\
  !*** ./resources/js/search.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var cordsAddress = '';
var search = new Vue({
  el: '#advanced-search',
  data: {
    apartments: [],
    searchInput: '',
    suggests: [],
    baseUrl: '',
    // baseUrl: '/marzo/progetto-boolbnb/public,'
    host: 'http://localhost:8000',
    // host: 'http://localhost:8080/marzo/progetto-boolbnb/public',
    rooms: 1,
    beds: 1,
    bathrooms: 1,
    mq: 40,
    radius: 20,
    arrayBounds: [],
    dropdownBox: 'hidden',
    dropdownAngle: 'down',
    WiFi: false,
    PostoAuto: false,
    Piscina: false,
    Portineria: false,
    Sauna: false,
    VistaMare: false,
    apiKey: 'GNSLhVGN7KNDGb9SFVEjknBWIKpB1HjX',
    inputAddress: '' // cordsAddress: ''

  },
  methods: {
    search: function search() {
      var _this = this;

      axios.get('http://127.0.0.1:8000/api/search?title=' + this.searchInput).then(function (result) {
        _this.apartments = result.data.response;
        _this.searchInput = '';
      });
    },
    autocomplete: function autocomplete() {
      var _this2 = this;

      axios.get('http://127.0.0.1:8000/api/autocomplete?title=' + this.searchInput).then(function (result) {
        _this2.suggests = result.data.response;
      });
    },
    changeSearchInput: function changeSearchInput(suggest) {
      this.searchInput = suggest;
      this.search();
    },
    addRoom: function addRoom() {
      this.rooms++;
    },
    removeRoom: function removeRoom() {
      if (this.rooms > 1) {
        this.rooms--;
      }
    },
    addBed: function addBed() {
      this.beds++;
    },
    removeBed: function removeBed() {
      if (this.beds > 1) {
        this.beds--;
      }
    },
    addBathroom: function addBathroom() {
      this.bathrooms++;
    },
    removeBathroom: function removeBathroom() {
      if (this.bathrooms > 1) {
        this.bathrooms--;
      }
    },
    addMq: function addMq() {
      this.mq += 5;
    },
    removeMq: function removeMq() {
      if (this.mq > 5) {
        this.mq -= 5;
      }
    },
    addRadius: function addRadius() {
      this.radius += 5;
    },
    removeRadius: function removeRadius() {
      if (this.radius > 5) {
        this.radius -= 5;
      }
    },
    dropdown: function dropdown() {
      if (this.dropdownBox == 'hidden') {
        this.dropdownBox = 'active';
        this.dropdownAngle = 'up';
      } else {
        this.dropdownBox = 'hidden';
        this.dropdownAngle = 'down';
      }
    },
    getCordsAddress: function getCordsAddress() {
      tt.services.fuzzySearch({
        key: this.apiKey,
        query: this.inputAddress
      }).then(function (response) {
        cordsAddress = response.results[0].position;
      });
    },
    addressFilter: function addressFilter() {
      console.log(cordsAddress); // let distance = new tt.LngLat(this.cordsAddress.lng, this.cordsAddress.lat);
      // this.arrayBounds = distance.toBounds(this.radius).toArray();
    },
    checkBound: function checkBound(latitude, longitude) {
      var value = true;

      if (this.arrayBounds.length) {
        if (longitude <= this.arrayBounds[1][0] && longitude >= this.arrayBounds[0][0] && latitude <= this.arrayBounds[1][1] && latitude >= this.arrayBounds[0][1]) {
          value = true;
        } else {
          value = false;
        }
      }

      return value;
    }
  }
});

/***/ }),

/***/ 4:
/*!**************************************!*\
  !*** multi ./resources/js/search.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

<<<<<<< HEAD
module.exports = __webpack_require__(/*! /opt/lampp/htdocs/laravel-project/BoolBnb/resources/js/search.js */"./resources/js/search.js");
=======
module.exports = __webpack_require__(/*! C:\Users\user\Documents\Boolean\mamp_public\boolbnb-proj\resources\js\search.js */"./resources/js/search.js");
>>>>>>> simo-2


/***/ })

/******/ });