/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/test.js ***!
  \******************************/
fetch('/api/test').then(function (response) {
  return response.json();
}).then(function (users) {
  return console.log('users', users);
});
$.ajax({
  url: '/api/test',
  dataType: 'json',
  data: {
    id: 1
  },
  success: function success(user) {
    console.log('user', user);
  },
  error: function error(response) {
    console.log(response);
  }
});
var arr = [1, 2, 3];

for (var _i = 0, _arr = arr; _i < _arr.length; _i++) {
  value = _arr[_i];
  console.log(value);
}
/******/ })()
;