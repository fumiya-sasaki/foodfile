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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/foodfile.js":
/*!**********************************!*\
  !*** ./resources/js/foodfile.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

function initMap() {
  //マップ初期表示の位置設定
  var target = document.getElementById('target');
  var centerp = {
    lat: 35.681236,
    lng: 139.767125
  }; //マップ表示

  map = new google.maps.Map(target, {
    center: centerp,
    zoom: 15
  });
}

;
var markerD = []; // DB情報の取得

$(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    type: "POST",
    url: "/admin/shop/mapmarker",
    dataType: "json",
    success: function success(data) {
      markerD = data;
      setMarker(markerD);
    },
    error: function error(XMLHttpRequest, textStatus, errorThrown) {
      alert('Error : ' + errorThrown);
    }
  });
});
var map;
var marker = [];
var infoWindow = [];

function setMarker(markerData) {
  // console.log(markerData);
  // console.log(markerData.length);
  //マーカー生成
  var sidebar_html = "";
  var icon;

  for (var i = 0; i < markerData.length; i++) {
    var latNum = parseFloat(markerData[i]['latitude']);
    var lngNum = parseFloat(markerData[i]['longitube']); // マーカー位置セット

    var markerLatLng = new google.maps.LatLng({
      lat: latNum,
      lng: lngNum
    }); // マーカーのセット

    marker[i] = new google.maps.Marker({
      position: markerLatLng,
      // マーカーを立てる位置を指定
      map: map,
      // マーカーを立てる地図を指定
      icon: icon // アイコン指定

    });
    infoWindow[i] = new google.maps.InfoWindow({
      // 吹き出しの追加
      content: markerData[i]['name'] // 吹き出しに表示する内容

    });
    markerEvent(i);
  }
}

function markerEvent(i) {
  marker[i].addListener('click', function () {
    // マーカーをクリックしたとき
    infoWindow[i].open(map, marker[i]); // 吹き出しの表示
  });
}

/***/ }),

/***/ 2:
/*!****************************************!*\
  !*** multi ./resources/js/foodfile.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/ec2-user/environment/foodfile/resources/js/foodfile.js */"./resources/js/foodfile.js");


/***/ })

/******/ });