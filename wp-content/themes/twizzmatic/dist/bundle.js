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
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/js/main.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/js/main.js":
/*!************************!*\
  !*** ./src/js/main.js ***!
  \************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


(function main($) {
	$(function () {
		// Include your main JS generic code here

		/*********************
   ** Nav Menu Functions
   **********************/

		$(".nav-menu-trigger").click(function (e) {
			e.preventDefault();
			$("body").toggleClass("nav-open locked");
		});

		/*********************
   ** Main Body Functions
   **********************/

		$(window).resize(function () {
			var $headerHeight = $("#main-header").outerHeight();

			$("main,#main-header .nav-wrapper").css("padding-top", $headerHeight + 10);
		}).resize();

		/*****************************
   ** Filter News Click Function
   ******************************/

		$(".posts-filter .filter-title").click(function (e) {
			e.preventDefault();
			$(".filter-content").slideToggle(500);
		});

		/*****************************
   ** Featured Slider Functions
   ******************************/

		var slide;

		function changeSlide(slide) {
			$(".featured-slide,.slider-indicator").removeClass("active");
			$(".slider-title").removeClass("animate__animated animate__fadeInUpBig");
			$(".slider-image").removeClass("animate__animated animate__slideInRight");
			$(".slider-indicator").removeClass("animate__animated animate__fadeInUp");
			var nextSlide = $('.featured-slide[data-slide="' + slide + '"],.slider-indicator[data-slide="' + slide + '"]');

			nextSlide.addClass("active");
			nextSlide.find(".slider-title").addClass("animate__animated animate__fadeInUpBig");
			nextSlide.find(".slider-image").addClass("animate__animated animate__slideInRight");
			nextSlide.find(".slider-indicator").addClass("animate__animated animate__fadeInUp");
		}

		$("#featured-slider .slider-indicator").click(function (e) {
			e.preventDefault();
			slide = $(this).attr("data-slide");
			changeSlide(slide);
		});

		function autoSlide() {
			var currSlide = $("#featured-slider .featured-slide.active").attr("data-slide"),
			    nextSlide = $("#featured-slider .featured-slide.active").next().attr("data-slide");

			if (currSlide === $(".featured-slide:last").attr("data-slide")) {
				slide = $(".featured-slide:first").attr("data-slide");
			} else {
				slide = nextSlide;
			}
			changeSlide(slide);
		}

		setInterval(autoSlide, 4000);
	});
})(jQuery);

/***/ })

/******/ });
//# sourceMappingURL=bundle.js.map