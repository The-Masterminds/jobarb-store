/******/ (() => { // webpackBootstrap
/*!*****************************************************!*\
  !*** ./platform/themes/iori/assets/js/ecommerce.js ***!
  \*****************************************************/
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var Ecommerce = /*#__PURE__*/function () {
  function Ecommerce() {
    _classCallCheck(this, Ecommerce);
    _defineProperty(this, "$body", $(document.body));
    _defineProperty(this, "$productsFilter", this.$body.find('#products-filter-form'));
    _defineProperty(this, "$quickViewModal", this.$body.find('#product-quick-view-modal'));
  }
  return _createClass(Ecommerce, [{
    key: "init",
    value: function init() {
      var _this = this;
      this.$body.on('click', '.add-to-cart', function (event) {
        _this.addToCart(event);
      }).on('click', 'form.cart-form button[type=submit]', function (event) {
        _this.addToCarts(event);
      }).on('click', '.remove-cart-item', function (event) {
        _this.removeItemCart(event);
      }).on('click', '.remove-cart-item-sidebar', function (event) {
        _this.removeItemCartSidebar(event);
      }).on('click', '.quantity .increase, .quantity .decrease', function (event) {
        _this.productQuantity(event);
      }).on('keyup', '.quantity .qty', function (event) {
        _this.onKeyUpProductQuantity(event);
      }).on('click', '.add-to-compare', function (event) {
        _this.addToCompare(event);
      }).on('click', '.remove-compare-item', function (event) {
        _this.removeCompareItem(event);
      }).on('click', '.add-to-wishlist', function (event) {
        _this.addToWishlist(event);
      }).on('click', '.remove-wishlist-item', function (event) {
        _this.removeWishlistItem(event);
      }).on('click', '.product-quick-view-button', function (event) {
        _this.handleProductQuickView(event);
      }).on('submit', '#products-filter-form', function (event) {
        _this.filterProducts(event);
      }).on('change', '.box-sortby select[name="sort-by"]', function (event) {
        _this.handleProductsSorting(event);
      }).on('change', '.product-area .tp-shop-selector select[name="per-page"]', function (event) {
        _this.handleProductsPerPage(event);
      }).on('change', '#products-filter-form select, input', function () {
        _this.$productsFilter.trigger('submit');
      }).on('click', '.product-list .box-pagination ul li a', function (event) {
        _this.handleProductsPagination(event);
      }).on('click', '.filter-layout', function (event) {
        event.preventDefault();
        var currentTarget = event.target;
        _this.$productsFilter.find('input[name=layout').val($(currentTarget).closest('.filter-link').data('layout'));
        _this.$productsFilter.trigger('submit');
        $('.filter-link').removeClass('active');
        $(currentTarget).closest('.filter-link').addClass('active');
      }).on('click', '.box-quantity .button-up, .box-quantity .button-down', function (event) {
        event.preventDefault();
        var $currentTarget = $(event.currentTarget);
        var inputQuantity = $('.box-quantity').find('.input-quantity');
        if ($currentTarget.data('type') === 'increase') {
          inputQuantity.val(parseInt(inputQuantity.val()) + 1);
        } else {
          if (parseInt(inputQuantity.val()) > 1) {
            inputQuantity.val(parseInt(inputQuantity.val()) - 1);
          }
        }
        $('.cart-form').find('input[name="qty"]').val(inputQuantity.val());
      }).on('change', '.box-quantity .input-quantity', function (event) {
        event.preventDefault();
        $('.cart-form').find('input[name="qty"]').val($(event.currentTarget).val());
      }).on('click', '.btn-apply-coupon-code', function (event) {
        _this.applyCouponCode(event);
      }).on('click', '.btn-remove-coupon-code', function (event) {
        _this.removeCouponCode(event);
      });
      this.filterSlider();
    }
  }, {
    key: "addToCart",
    value: function addToCart(event) {
      var _this2 = this;
      event.preventDefault();
      var $currentTarget = $(event.currentTarget);
      $.ajax({
        url: $currentTarget.prop('href'),
        method: 'POST',
        data: {
          id: $currentTarget.data('id')
        },
        dataType: 'json',
        beforeSend: function beforeSend() {
          $currentTarget.addClass('button-loading');
        },
        success: function success(response) {
          if (response.error) {
            ioriTheme.showError(response.message);
          } else {
            _this2.loadAjaxCount();
            _this2.loadAjaxCartSidebar();
          }
        },
        error: function error(_error) {
          ioriTheme.handleError(_error);
        },
        complete: function complete() {
          $currentTarget.removeClass('button-loading');
        }
      });
    }
  }, {
    key: "addToCarts",
    value: function addToCarts(event) {
      var _this3 = this;
      event.preventDefault();
      var $btn = $(event.currentTarget);
      var $form = $btn.closest('form.cart-form');
      var data = $form.serializeArray();
      data.push({
        name: 'checkout',
        value: $btn.prop('name') === 'checkout' ? 1 : 0
      });
      $.ajax({
        type: 'POST',
        url: $form.prop('action'),
        data: data,
        beforeSend: function beforeSend() {
          $btn.addClass('button-loading');
        },
        success: function success(_ref) {
          var error = _ref.error,
            message = _ref.message,
            data = _ref.data;
          if (error) {
            ioriTheme.showError(message);
          } else {
            if (data.next_url !== undefined) {
              window.location.href = data.next_url;
              return;
            }
            _this3.$quickViewModal.modal('hide');
            _this3.loadAjaxCount();
            _this3.loadAjaxCartSidebar();
          }
        },
        error: function error(_error2) {
          ioriTheme.handleError(_error2);
        },
        complete: function complete() {
          $btn.removeClass('button-loading');
        }
      });
    }
  }, {
    key: "removeItemCart",
    value: function removeItemCart(event) {
      var _this4 = this;
      event.preventDefault();
      var $currentTarget = $(event.currentTarget);
      var $cartContent = $('.cart-page-content');
      $.ajax({
        url: $currentTarget.prop('href'),
        method: 'GET',
        beforeSend: function beforeSend() {
          $currentTarget.addClass('button-loading');
          $cartContent.find('.loading').show();
        },
        success: function success(response) {
          if (response.error) {
            $cartContent.find('loading').hide();
            ioriTheme.showError(response.message);
          } else {
            var _window$siteConfig;
            ioriTheme.showSuccess(response.message);
            if ($cartContent.length && (_window$siteConfig = window.siteConfig) !== null && _window$siteConfig !== void 0 && _window$siteConfig.cartUrl) {
              $cartContent.load(window.siteConfig.cartUrl + ' .cart-page-content > *', function () {});
            }
            _this4.loadAjaxCount();
          }
        },
        complete: function complete() {
          $cartContent.find('.loading').hide();
        }
      });
    }
  }, {
    key: "removeItemCartSidebar",
    value: function removeItemCartSidebar(event) {
      var _this5 = this;
      event.preventDefault();
      var $currentTarget = $(event.currentTarget);
      var $cartContent = $('.cart-page-content');
      $.ajax({
        url: $currentTarget.prop('href'),
        method: 'GET',
        beforeSend: function beforeSend() {
          $cartContent.find('.loading').show();
        },
        success: function success(response) {
          if (response.error) {
            $cartContent.find('loading').hide();
            ioriTheme.showError(response.message);
          } else {
            var _window$siteConfig2;
            ioriTheme.showSuccess(response.message);
            if ($cartContent.length && (_window$siteConfig2 = window.siteConfig) !== null && _window$siteConfig2 !== void 0 && _window$siteConfig2.cartUrl) {
              $cartContent.load(window.siteConfig.cartUrl + ' .cart-page-content > *', function () {});
            }
            _this5.loadAjaxCount();
            _this5.loadAjaxCartSidebar();
          }
        },
        complete: function complete() {
          $cartContent.find('.loading').hide();
        }
      });
    }
  }, {
    key: "productQuantity",
    value: function productQuantity(event) {
      event.preventDefault();
      var $this = $(event.currentTarget),
        $qty = $this.siblings('.qty'),
        step = parseInt($qty.attr('step'), 10),
        current = parseInt($qty.val(), 10),
        min = parseInt($qty.attr('min'), 10),
        max = parseInt($qty.attr('max'), 10);
      min = min || 1;
      max = max || current + 1;
      if ($this.hasClass('decrease') && current > min) {
        $qty.val(current - step);
        $qty.trigger('change');
      }
      if ($this.hasClass('increase') && current < max) {
        $qty.val(current + step);
        $qty.trigger('change');
      }
      this.processUpdateCart($this);
    }
  }, {
    key: "onKeyUpProductQuantity",
    value: function onKeyUpProductQuantity(event) {
      event.preventDefault();
      var $this = $(event.currentTarget),
        $wrapperBtn = $this.closest('.product-button'),
        $btn = $wrapperBtn.find('.quantity_button'),
        $price = $this.closest('.quantity').siblings('.box-price').find('.price-current'),
        $priceFirst = $price.data('current'),
        current = parseInt($this.val(), 10),
        min = parseInt($this.attr('min'), 10),
        max = parseInt($this.attr('max'), 10);
      var min_check = min ? min : 1;
      var max_check = max ? max : current + 1;
      if (current <= max_check && current >= min_check) {
        $btn.attr('data-quantity', current);
        var $total = ($priceFirst * current).toFixed(2);
        $price.html($total);
      }
      this.processUpdateCart($this);
    }
  }, {
    key: "addToCompare",
    value: function addToCompare(event) {
      var _this6 = this;
      event.preventDefault();
      var $currentTarget = $(event.currentTarget);
      $.ajax({
        url: $currentTarget.prop('href'),
        method: 'POST',
        beforeSend: function beforeSend() {
          $currentTarget.addClass('button-loading');
        },
        success: function success(response) {
          var error = response.error,
            message = response.message;
          if (error) {
            ioriTheme.showError(message);
          } else {
            ioriTheme.showSuccess(message);
            _this6.loadAjaxCount();
          }
        },
        error: function error(_error3) {
          ioriTheme.handleError(_error3);
        },
        complete: function complete() {
          $currentTarget.removeClass('button-loading');
        }
      });
      this.loadAjaxCount();
    }
  }, {
    key: "removeCompareItem",
    value: function removeCompareItem(event) {
      var _this7 = this;
      event.preventDefault();
      var $currentTarget = $(event.currentTarget);
      $.ajax({
        url: $currentTarget.prop('href'),
        method: 'POST',
        data: {
          _method: 'DELETE'
        },
        beforeSend: function beforeSend() {
          $currentTarget.addClass('button-loading');
        },
        success: function success(res) {
          if (res.error) {
            ioriTheme.showError(res.message);
          } else {
            ioriTheme.showSuccess(res.message);
            _this7.loadAjaxCount();
            $('.compare-page-content').load(window.siteConfig.compareUrl + ' .compare-page-content > *');
          }
        },
        error: function error(_error4) {
          ioriTheme.handleError(_error4);
        },
        complete: function complete() {
          $currentTarget.removeClass('button-loading');
        }
      });
    }
  }, {
    key: "addToWishlist",
    value: function addToWishlist(event) {
      var _this8 = this;
      event.preventDefault();
      var $currentTarget = $(event.currentTarget);
      $.ajax({
        url: $currentTarget.prop('href'),
        method: 'POST',
        beforeSend: function beforeSend() {
          $currentTarget.addClass('button-loading');
        },
        success: function success(response) {
          var error = response.error,
            message = response.message,
            data = response.data;
          if (error) {
            ioriTheme.showError(message);
          } else {
            ioriTheme.showSuccess(message);
            _this8.loadAjaxCount();
            if (data.added) {
              $currentTarget.find('i').removeClass('fal').addClass('fas');
            } else {
              $currentTarget.find('i').removeClass('fas').addClass('fal');
            }
          }
        },
        error: function error(_error5) {
          ioriTheme.handleError(_error5);
        },
        complete: function complete() {
          $currentTarget.removeClass('button-loading');
        }
      });
    }
  }, {
    key: "removeWishlistItem",
    value: function removeWishlistItem(event) {
      var _this9 = this;
      event.preventDefault();
      var $currentTarget = $(event.currentTarget);
      $.ajax({
        url: $currentTarget.prop('href'),
        method: 'POST',
        data: {
          _method: 'DELETE'
        },
        beforeSend: function beforeSend() {
          $currentTarget.addClass('button-loading');
        },
        success: function success(res) {
          if (res.error) {
            ioriTheme.showError(res.message);
          } else {
            ioriTheme.showSuccess(res.message);
            _this9.loadAjaxCount();
            $('.wishlist-page-content').load(window.siteConfig.wishlistUrl + ' .wishlist-page-content > *');
          }
        },
        error: function error(_error6) {
          ioriTheme.handleError(_error6);
        },
        complete: function complete() {
          $currentTarget.removeClass('button-loading');
        }
      });
    }
  }, {
    key: "processUpdateCart",
    value: function processUpdateCart($this) {
      var _this0 = this;
      var $cartPage = $this.closest('.cart-page-content');
      var $form = $cartPage.find('.form--shopping-cart');
      var $loading = $cartPage.find('.loading');
      if (!$form.length) {
        return false;
      }
      $.ajax({
        type: 'POST',
        cache: false,
        url: $form.prop('action'),
        data: new FormData($form[0]),
        contentType: false,
        processData: false,
        beforeSend: function beforeSend() {
          $loading.addClass('d-none');
        },
        success: function success(res) {
          $cartPage.load(window.siteConfig.cartUrl + ' .cart-page-content > *');
          if (res.error) {
            ioriTheme.showError(res.message);
            return false;
          }
          ioriTheme.showSuccess(res.message);
          _this0.loadAjaxCount();
          _this0.loadAjaxCartSidebar(false);
        },
        error: function error(_error7) {
          $loading.removeClass('d-none');
          ioriTheme.handleError(_error7);
        },
        complete: function complete() {
          $loading.removeClass('d-none');
        }
      });
    }
  }, {
    key: "handleProductsSorting",
    value: function handleProductsSorting(event) {
      var $currentTarget = $(event.currentTarget);
      this.$productsFilter.find('input[name="sort-by"]').val($currentTarget.val()).change();
    }
  }, {
    key: "handleProductsPerPage",
    value: function handleProductsPerPage(event) {
      var $currentTarget = $(event.currentTarget);
      this.$productsFilter.find('input[name="per-page"]').val($currentTarget.val()).change();
    }
  }, {
    key: "handleProductsPagination",
    value: function handleProductsPagination(event) {
      event.preventDefault();
      var url = new URL($(event.currentTarget).attr('href'));
      var page = url.searchParams.get('page');
      this.$productsFilter.find('input[name="page"]').val(page).change();
    }
  }, {
    key: "handleProductQuickView",
    value: function handleProductQuickView(event) {
      var _this1 = this;
      event.preventDefault();
      var url = new URL($(event.currentTarget).attr('href'));
      $.ajax({
        url: url,
        type: 'GET',
        beforeSend: function beforeSend() {
          _this1.$quickViewModal.find('.modal-loading').show();
          _this1.$quickViewModal.modal('show');
        },
        success: function success(response) {
          if (!response.error) {
            _this1.$quickViewModal.find('.product-modal-content').html(response.data);
          }
        },
        complete: function complete() {
          _this1.$quickViewModal.find('.modal-loading').hide();
        }
      });
    }
  }, {
    key: "filterProducts",
    value: function filterProducts(event) {
      var _this10 = this;
      event.preventDefault();
      var $form = $(event.currentTarget);
      $.ajax({
        url: $form.prop('action') + '?' + $form.serialize(),
        type: 'GET',
        beforeSend: function beforeSend() {
          _this10.$body.find('.loading-spinner-wrapper').show();
          $('html, body').animate({
            scrollTop: $('.product-area').offset().top - 100
          });
          var priceStep = _this10.$productsFilter.find('.nonlinear');
          if (priceStep.length) {
            priceStep[0].noUiSlider.set([_this10.$productsFilter.find('input[name=min_price]').val(), _this10.$productsFilter.find('input[name=max_price]').val()]);
          }
        },
        success: function success(response) {
          var error = response.error,
            message = response.message,
            data = response.data;
          _this10.$body.find('.product-list').html(data);
          _this10.$body.find('.show-information-product').html(_this10.$body.find('.product-list').find('.showing-product').html());
          if (!error) {
            window.history.pushState({}, '', "".concat(window.location.pathname, "?").concat($form.serialize()));
          } else {
            ioriTheme.showError(message || 'Opp!');
          }
        },
        error: function error(_error8) {
          ioriTheme.handleError(_error8);
        },
        complete: function complete() {
          _this10.$body.find('.loading-spinner-wrapper').hide();
        }
      });
    }
  }, {
    key: "applyCouponCode",
    value: function applyCouponCode(event) {
      event.preventDefault();
      var $currentTarget = $(event.currentTarget);
      $.ajax({
        url: $currentTarget.data('url'),
        type: 'POST',
        data: {
          coupon_code: $currentTarget.closest('.form-coupon-wrapper').find('.coupon-code').val()
        },
        beforeSend: function beforeSend() {
          $currentTarget.addClass('button-loading');
        },
        success: function success(res) {
          if (!res.error) {
            $('.cart-page-content').load(window.location.href + '?applied_coupon=1 .cart-page-content > *', function () {
              $currentTarget.prop('disabled', false).removeClass('button-loading');
              ioriTheme.showSuccess(res.message);
            });
          } else {
            ioriTheme.showError(res.message);
          }
        },
        error: function error(_error9) {
          ioriTheme.handleError(_error9);
          $currentTarget.removeClass('button-loading');
        },
        complete: function complete() {
          $currentTarget.removeClass('button-loading');
        }
      });
    }
  }, {
    key: "removeCouponCode",
    value: function removeCouponCode(event) {
      event.preventDefault();
      var $currentTarget = $(event.currentTarget);
      var buttonText = $currentTarget.text();
      $currentTarget.text($currentTarget.data('processing-text'));
      $.ajax({
        url: $currentTarget.data('url'),
        type: 'POST',
        success: function success(res) {
          if (!res.error) {
            ioriTheme.showSuccess(res.message);
            $('.cart-page-content').load(window.location.href + ' .cart-page-content > *', function () {
              $currentTarget.text(buttonText);
            });
          } else {
            ioriTheme.showError(res.message);
          }
        },
        error: function error(_error0) {
          ioriTheme.handleError(_error0);
        }
      });
    }
  }, {
    key: "loadAjaxCount",
    value: function loadAjaxCount() {
      var _window$siteConfig3;
      var headerTopRight = $('.header-top').find('.header-top-right');
      if ((_window$siteConfig3 = window.siteConfig) !== null && _window$siteConfig3 !== void 0 && _window$siteConfig3.ajaxCount) {
        $.ajax({
          url: window.siteConfig.ajaxCount,
          method: 'GET',
          success: function success(_ref2) {
            var data = _ref2.data,
              error = _ref2.error;
            if (error) {
              return;
            }
            var _data$count = data.count,
              cart = _data$count.cart,
              wishlist = _data$count.wishlist,
              compare = _data$count.compare;
            headerTopRight.find('.cart-counter').text(cart);
            headerTopRight.find('.wishlist-counter').text(wishlist);
            headerTopRight.find('.compare-counter').text(compare);
          }
        });
      }
    }
  }, {
    key: "loadAjaxCartSidebar",
    value: function loadAjaxCartSidebar() {
      var _window$siteConfig4;
      var showCart = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : true;
      if (!((_window$siteConfig4 = window.siteConfig) !== null && _window$siteConfig4 !== void 0 && _window$siteConfig4.ajaxCartSidebar)) {
        return;
      }
      $.ajax({
        url: window.siteConfig.ajaxCartSidebar,
        method: 'GET',
        beforeSend: function beforeSend() {
          $('.cart-main').find('.cart-content').addClass('loading');
        },
        success: function success(_ref3) {
          var data = _ref3.data;
          $('.cart-content').html(data.cart_content);
          $('.cart-footer').html(data.cart_footer);
          if (!$('.cart-sidebar').hasClass('active') && showCart) {
            $('.cart-sidebar').addClass('active');
            $('.cart-main').find('.backdrop').show();
            $('body').css({
              overflow: 'hidden'
            });
          }
        },
        complete: function complete() {
          $('.cart-main').find('.cart-content').removeClass('loading');
        }
      });
    }
  }, {
    key: "filterSlider",
    value: function filterSlider() {
      $('.nonlinear').each(function (index, element) {
        var $element = $(element);
        var min = $element.data('min');
        var max = $element.data('max');
        var $wrapper = $(element).closest('.nonlinear-wrapper');
        noUiSlider.create(element, {
          connect: true,
          behaviour: 'tap',
          start: [$wrapper.find('.product-filter-item-price-0').val(), $wrapper.find('.product-filter-item-price-1').val()],
          range: {
            min: min,
            '10%': max * 0.1,
            '20%': max * 0.2,
            '30%': max * 0.3,
            '40%': max * 0.4,
            '50%': max * 0.5,
            '60%': max * 0.6,
            '70%': max * 0.7,
            '80%': max * 0.8,
            '90%': max * 0.9,
            max: max
          }
        });
        var nodes = [$wrapper.find('.slider__min'), $wrapper.find('.slider__max')];
        element.noUiSlider.on('update', function (values, handle) {
          nodes[handle].html(Ecommerce.numberFormat(values[handle]));
        });
        element.noUiSlider.on('change', function (values, handle) {
          $wrapper.find('.product-filter-item-price-' + handle).val(Math.round(values[handle])).trigger('change');
        });
      });
    }
  }], [{
    key: "numberFormat",
    value: function numberFormat(number, decimals, dec_point, thousands_sep) {
      var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = typeof thousands_sep === 'undefined' ? ',' : thousands_sep,
        dec = typeof dec_point === 'undefined' ? '.' : dec_point,
        toFixedFix = function toFixedFix(n, prec) {
          // Fix for IE parseFloat(0.55).toFixed(0) = 0;
          var k = Math.pow(10, prec);
          return Math.round(n * k) / k;
        },
        s = (prec ? toFixedFix(n, prec) : Math.round(n)).toString().split('.');
      if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
      }
      if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
      }
      return s.join(dec);
    }
  }]);
}();
new Ecommerce().init();
$(function () {
  window.onBeforeChangeSwatches = function (data, $attrs) {
    var $product = $attrs.closest('.product-details');
    var $form = $product.find('.cart-form');
    $product.find('.error-message').hide();
    $product.find('.success-message').hide();
    $product.find('.number-items-available').html('').hide();
    var $submit = $form.find('button[type=submit]');
    if (data && data.attributes) {
      $submit.prop('disabled', true);
    }
  };
  window.onChangeSwatchesSuccess = function (res, $attrs) {
    var $product = $attrs.closest('.product-details');
    var $form = $product.find('.cart-form');
    var $footerCartForm = $('.footer-cart-form');
    $product.find('.error-message').hide();
    $product.find('.success-message').hide();
    if (res) {
      var $submit = $form.find('button[type=submit]');
      if (res.error) {
        $submit.prop('disabled', true);
        $product.find('.number-items-available').html('<span class="text-danger">(' + res.message + ')</span>').show();
        $form.find('.hidden-product-id').val('');
        $footerCartForm.find('.hidden-product-id').val('');
      } else {
        var data = res.data;
        var $price = $product.find('.box-price');
        var $salePrice = $price.find('.price');
        var $originalPrice = $price.find('.price-old');
        if (data.sale_price !== data.price) {
          $originalPrice.removeClass('d-none');
        } else {
          $originalPrice.addClass('d-none');
        }
        $salePrice.text(data.display_sale_price);
        $originalPrice.text(data.display_price);
        if (data.sku) {
          $product.find('.meta-sku .meta-value').text(data.sku);
          $product.find('.meta-sku').removeClass('d-none');
        } else {
          $product.find('.meta-sku').addClass('d-none');
        }
        $form.find('.hidden-product-id').val(data.id);
        $footerCartForm.find('.hidden-product-id').val(data.id);
        $submit.prop('disabled', false);
        if (data.error_message) {
          $submit.prop('disabled', true);
          $product.find('.number-items-available').html('<span class="text-danger">(' + data.error_message + ')</span>').show();
        } else if (data.success_message) {
          $product.find('.number-items-available').html(res.data.stock_status_html).show();
        } else {
          $product.find('.number-items-available').html('').hide();
        }
        var unavailableAttributeIds = data.unavailable_attribute_ids || [];
        $product.find('.attribute-swatch-item').removeClass('pe-none');
        $product.find('.product-filter-item option').prop('disabled', false);
        if (unavailableAttributeIds && unavailableAttributeIds.length) {
          unavailableAttributeIds.map(function (id) {
            var $item = $product.find('.attribute-swatch-item[data-id="' + id + '"]');
            if ($item.length) {
              $item.addClass('pe-none');
              $item.find('input').prop('checked', false);
            } else {
              $item = $product.find('.product-filter-item option[data-id="' + id + '"]');
              if ($item.length) {
                $item.prop('disabled', 'disabled').prop('selected', false);
              }
            }
          });
        }
        var $gallery = $product.find('.detail-gallery');
        if ($gallery.length) {
          if (!data.image_with_sizes.origin.length) {
            data.image_with_sizes.origin.push(siteConfig.default_image);
          }
          if (!data.image_with_sizes.thumb.length) {
            data.image_with_sizes.thumb.push(siteConfig.img_placeholder);
          }
          var imageHtml = '';
          data.image_with_sizes.origin.forEach(function (item) {
            imageHtml += "<figure class=\"border-radius-10\">\n                                    <img src=\"".concat(item, "\" alt=\"").concat(data.name, "\">\n                                </figure>");
          });
          $gallery.find('.product-image-slider').slick('unslick').html(imageHtml);
          var thumbHtml = '';
          data.image_with_sizes.thumb.forEach(function (item) {
            thumbHtml += "<div>\n                            <div class=\"item-thumb\"><img src=\"".concat(item, "\" alt=\"").concat(data.name, "\"></div>\n                        </div>");
          });
          $gallery.find('.slider-nav-thumbnails').slick('unslick').html(thumbHtml);
          productGallery(true, $gallery.find('.product-image-slider'));
        }
      }
    }
  };
  function productGallery(destroy, $gallery) {
    if (!$gallery || !$gallery.length) {
      $gallery = $('.product-image-slider');
    }
    var nav = $gallery.data('nav');
    if ($gallery.length && destroy) {
      if ($gallery.hasClass('slick-initialized')) {
        $gallery.slick('unslick');
      }
      if ($(nav).length && $(nav).hasClass('slick-initialized')) {
        $(nav).slick('unslick');
      }
    }
    $gallery.slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: false,
      asNavFor: nav,
      rtl: window.isRtl
    });
    var options = {
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: $gallery.data('main'),
      dots: false,
      focusOnSelect: true,
      vertical: true,
      prevArrow: '<button type="button" class="slick-prev"><i class="fi-rs-arrow-small-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="fi-rs-arrow-small-right"></i></button>',
      responsive: [{
        breakpoint: 768,
        settings: {
          vertical: false,
          adaptiveHeight: true
        }
      }],
      rtl: window.isRtl
    };
    $(nav).slick(options);
  }
});
/******/ })()
;