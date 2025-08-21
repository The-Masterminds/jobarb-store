/******/ (() => { // webpackBootstrap
/*!*********************************************************!*\
  !*** ./platform/themes/iori/assets/js/featured-post.js ***!
  \*********************************************************/
$(function () {
  'use strict';

  var Loading = $('.loading-featured-blog');
  $('.featured-post').on('click', '.btn-category', function () {
    $.ajax({
      url: $(this).data('action'),
      method: 'GET',
      beforeSend: function beforeSend() {
        Loading.show();
      },
      success: function success(res) {
        $('.box-list-blogs').html(res.data);
        Loading.hide();
      },
      complete: function complete() {
        Loading.hide();
      }
    });
  });
});
/******/ })()
;