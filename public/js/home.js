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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/home.js":
/*!******************************!*\
  !*** ./resources/js/home.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

// require('./bootstrap');
// Vue.component(
//     'example-component',
//     require('./components/ExampleComponent.vue').default
// );
// sezione home Emanuele
var app = new Vue({
  el: '#home',
  data: {
    nextCounter: 1,
    host: 'http://localhost:8000/',
    // host: 'http://localhost:8080/marzo/progetto-boolbnb/public',
    baseUrl: '',
    // baseUrl: '/marzo/progetto-boolbnb/public,'
    counter: 0,
    sponsored: [],
    destinations: [{
      cover: 'https://a0.muscache.com/im/pictures/e8d3d6de-40b1-4341-89f2-afb2a1a4f71f.jpg?im_q=medq&im_w=240',
      city: 'Milano',
      description: 'ciao2'
    }, {
      cover: 'https://a0.muscache.com/im/pictures/90dcb9c8-2e6a-4ce3-9acb-86d90d335314.jpg?im_q=medq&im_w=240',
      city: 'Bologna',
      description: 'ciao2'
    }, {
      cover: 'https://a0.muscache.com/im/pictures/3849e3f1-d275-43fb-8957-4c90f26e14db.jpg?im_q=medq&im_w=240',
      city: 'Napoli',
      description: 'ciao2'
    }, {
      cover: 'https://a0.muscache.com/im/pictures/0445ba36-5684-4cca-9cb1-418a0ffdcd2f.jpg?im_q=medq&im_w=240',
      city: 'Palermo',
      description: 'ciao2'
    }, {
      cover: 'https://a0.muscache.com/im/pictures/ce6c498b-b069-401d-84c8-412bb4a4601e.jpg?im_q=medq&im_w=240',
      city: 'Verona',
      description: 'ciao2'
    }, {
      cover: 'https://a0.muscache.com/im/pictures/7d80bee1-a510-4950-a1a0-07a4fb25ec2e.jpg?im_q=medq&im_w=240',
      city: 'Catania',
      description: 'ciao2'
    }, {
      cover: 'https://a0.muscache.com/im/pictures/847cfb7f-788d-42dc-9148-f375348dde76.jpg?im_q=medq&im_w=240',
      city: 'Venezia',
      description: 'ciao2'
    }, {
      cover: 'https://a0.muscache.com/im/pictures/82293cc1-ba0b-4167-85a6-ed133d478c20.jpg?im_q=medq&im_w=240',
      city: 'Roma',
      description: 'ciao2'
    }],
    types: [{
      cover: "https://a0.muscache.com/im/pictures/7d82ca14-56e5-4465-8218-dcfa7d69b6ac.jpg?im_w=320",
      type: "case intere"
    }, {
      cover: "https://a0.muscache.com/im/pictures/36f53e61-db8d-403c-9122-5b761c0e4264.jpg?im_w=320",
      type: "spazi unici"
    }, {
      cover: "https://a0.muscache.com/im/pictures/7f254627-3922-4880-b8fa-545b8551117e.jpg?im_w=320",
      type: "fattorie e natura"
    }, {
      cover: "https://a0.muscache.com/im/pictures/10a638e1-6aff-4313-8033-1275cec83987.jpg?im_w=320",
      type: "animali domestici ammessi"
    }],
    experiences: [{
      cover: 'https://a0.muscache.com/im/pictures/a6b08861-feb8-4a01-a76d-b33d2867b441.jpg?im_w=480',
      title: 'esperienze online',
      type: 'attività interattive dal vivo gestite dagli host'
    }, {
      cover: 'https://a0.muscache.com/im/pictures/ad109d56-2421-40cd-98e6-e114160dc85b.jpg?im_w=480',
      title: 'esperienze',
      type: 'Attività locali a cui partecipare ovunque ti trovi'
    }, {
      cover: 'https://a0.muscache.com/im/pictures/b9adfc39-6e2a-4e5f-b6f3-681b306fae5c.jpg?im_w=480',
      title: 'avventure',
      type: 'gite di più giorni con vitto e alloggio'
    }]
  },
  methods: {
    next: function next() {
      this.counter++;
      this.nextCounter++;

      if (this.counter == this.types.length) {
        this.counter = 0;
      }

      if (this.nextCounter == this.types.length) {
        this.nextCounter = 0;
      }
    },
    prev: function prev() {
      if (this.nextCounter == 0) {
        this.nextCounter = this.types.length;
      }

      if (this.counter == 0) {
        this.counter = this.types.length;
      }

      this.counter--;
      this.nextCounter--;
    }
  },
  mounted: function mounted() {
    var _this = this;

    axios.get('http://127.0.0.1:8000/api/sponsored').then(function (result) {
      _this.sponsored = result.data.response;
    });
  }
});

/***/ }),

/***/ 3:
/*!************************************!*\
  !*** multi ./resources/js/home.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /opt/lampp/htdocs/laravel-project/BoolBnb/resources/js/home.js */"./resources/js/home.js");


/***/ })

/******/ });