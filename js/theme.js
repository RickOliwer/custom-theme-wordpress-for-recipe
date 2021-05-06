/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/theme.js":
/*!*************************!*\
  !*** ./src/js/theme.js ***!
  \*************************/
/***/ (() => {

/*--------------------------------------------------------------
>>> TABLE OF CONTENTS:
----------------------------------------------------------------
1.  Temporary Header
2.  Theme
--------------------------------------------------------------*/

/*--------------------------------------------------------------
1. Temporary Header
--------------------------------------------------------------*/
jQuery(document).ready(function ($) {
  // Offcanvas
  // Workaround icon in offcanvas toggler https://github.com/twbs/bootstrap/issues/33457
  $('.navbar-toggler').addClass('position-relative');
  $('.navbar-toggler').append('<div class="toggler-overlay position-absolute top-0 end-0 bottom-0 start-0" data-bs-target="#offcanvas-navbar"></div>'); // Check if navbar fixed-top component exists

  if ($(".navbar.fixed-top")[0]) {
    // Add body class to hide default .offcanvas-backdrop::before if .navbar.fixed-top exists
    $("body").addClass("navbar-fixed-top-offcanvas");
  } // Data attribute to hide offcanvas and enable body scroll on resize through the breakpoints


  $(window).on('resize', function () {
    $('[data-bs-hideresize="true"]').offcanvas('hide');
  }); // Close offcanvas on click a, keep .dropdown-menu open

  $('.offcanvas a:not(.dropdown-toggle):not(a.remove_from_cart_button), a.dropdown-item').on('click', function () {
    $('.offcanvas').offcanvas('hide');
  }); // Dropdown menu animation

  $('.dropdown-menu').addClass('invisible'); //FIRST TIME INVISIBLE
  // Add slideup animation to dropdown open

  $('.dropdown').on('show.bs.dropdown', function (e) {
    $('.dropdown-menu').removeClass('invisible');
    $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
  }); // Add slideup animation to dropdown close

  $('.dropdown').on('hide.bs.dropdown', function (e) {
    $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
  }); // Mobile search button hide if empty

  if ($('.searchform').length != 1) {
    $('.top-nav-search-md, .top-nav-search-lg').addClass('hide');
  }

  if ($('.searchform').length != 0) {
    $('.top-nav-search-md, .top-nav-search-lg').removeClass('hide');
  } // Active menu item workaround, check navwalker when ready


  var url = window.location.pathname,
      urlRegExp = new RegExp(url.replace(/\/$/, '') + "$"); // create regexp to match current url pathname and remove trailing slash if present as it could collide with the link in navigation in case trailing slash wasn't present there
  // now grab every link from the navigation

  $('.nav-link').each(function () {
    // and test its normalized href against the url pathname regexp
    if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
      $(this).addClass('active');
    }
  }); // Remove active on frontpage

  if ($('body.home').length) {
    $('.nav-link').removeClass('active');
  } // Add active to nav-link if menu-item is active


  if ($('.current_page_item').hasClass('active')) {
    $('.current_page_item.active .nav-link').addClass('active');
  }

  if ($('.current-menu-item').hasClass('active')) {
    $('.current-menu-item.active .nav-link').addClass('active');
  }

  if ($('.current-post-ancestor').hasClass('active')) {
    $('.current-post-ancestor .nav-link').addClass('active');
  }

  if ($('.current_page_parent').hasClass('active')) {
    $('.current_page_parent .nav-link').addClass('active');
  } // Remove active on search page


  if ($('body').hasClass('search')) {
    $('.nav-link').removeClass('active');
  } // Active menu item workaround End

}); // jQuery End

/*--------------------------------------------------------------
2. Theme
--------------------------------------------------------------*/

jQuery(document).ready(function ($) {
  // Smooth Scroll
  $(function () {
    $('a[href*="#"]:not([href="#"]):not(a.comment-reply-link):not([href="#tab-reviews"]):not([href="#tab-additional_information"]):not([href="#tab-description"]):not([href="#reviews"]):not([href="#carouselExampleIndicators"]):not([data-smoothscroll="false"])').click(function () {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

        if (target.length) {
          $('html, body').animate({
            // Change your offset according to your navbar height
            scrollTop: target.offset().top - 55
          }, 1000);
          return !1;
        }
      }
    });
  }); // Scroll to ID from external url

  if (window.location.hash) scroll(0, 0);
  setTimeout(function () {
    scroll(0, 0);
  }, 1);
  $(function () {
    $('.scroll').on('click', function (e) {
      e.preventDefault();
      $('html, body').animate({
        // Change your offset according to your navbar height
        scrollTop: $($(this).attr('href')).offset().top - 55
      }, 1000, 'swing');
    });

    if (window.location.hash) {
      $('html, body').animate({
        // Change your offset according to your navbar height
        scrollTop: $(window.location.hash).offset().top - 55
      }, 1000, 'swing');
    }
  }); // Scroll to top Button

  $(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 500) {
      $(".top-button").addClass("visible");
    } else {
      $(".top-button").removeClass("visible");
    }
  }); // div height, add class to your content

  $(".height-50").css("height", 0.5 * $(window).height());
  $(".height-75").css("height", 0.75 * $(window).height());
  $(".height-85").css("height", 0.85 * $(window).height());
  $(".height-100").css("height", 1.0 * $(window).height()); // Forms

  $('select, #billing_state').addClass('form-select'); // Alert links

  $('.alert a').addClass('alert-link');
}); // jQuery End

/***/ }),

/***/ "./src/sass/theme.scss":
/*!*****************************!*\
  !*** ./src/sass/theme.scss ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


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
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					result = fn();
/******/ 				}
/******/ 			}
/******/ 			return result;
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
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/theme": 0,
/******/ 			"css/theme": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			for(moduleId in moreModules) {
/******/ 				if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 					__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 				}
/******/ 			}
/******/ 			if(runtime) var result = runtime(__webpack_require__);
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkbootscore_5"] = self["webpackChunkbootscore_5"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/theme"], () => (__webpack_require__("./src/js/theme.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/theme"], () => (__webpack_require__("./src/sass/theme.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;