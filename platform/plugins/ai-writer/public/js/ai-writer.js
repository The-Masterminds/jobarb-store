/******/ (() => { // webpackBootstrap
/*!**************************************************************!*\
  !*** ./platform/plugins/ai-writer/resources/js/ai-writer.js ***!
  \**************************************************************/
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _createForOfIteratorHelper(r, e) { var t = "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (!t) { if (Array.isArray(r) || (t = _unsupportedIterableToArray(r)) || e && r && "number" == typeof r.length) { t && (r = t); var _n = 0, F = function F() {}; return { s: F, n: function n() { return _n >= r.length ? { done: !0 } : { done: !1, value: r[_n++] }; }, e: function e(r) { throw r; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var o, a = !0, u = !1; return { s: function s() { t = t.call(r); }, n: function n() { var r = t.next(); return a = r.done, r; }, e: function e(r) { u = !0, o = r; }, f: function f() { try { a || null == t["return"] || t["return"](); } finally { if (u) throw o; } } }; }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var AiWriter = /*#__PURE__*/function () {
  function AiWriter() {
    _classCallCheck(this, AiWriter);
    this.$body = $('body');
    this.promptForm = $('#setup-prompt');
    this.spinForm = $('#setup-spin');
    this.generateModal = $('#ai-writer-generator-modal');
    this.spinModal = $('#ai-writer-spin-modal');
    this.handleGenerateEvents();
    if (typeof $spinTemplates !== 'undefined') {
      this.handleSpinEvents();
    }
  }
  return _createClass(AiWriter, [{
    key: "updateModalState",
    value: function updateModalState(modal, isLoading) {
      var $content = modal.find('.modal-content');
      if (!$content.length) {
        return;
      }
      if (isLoading) {
        Botble.showLoading($content[0]);
      } else {
        Botble.hideLoading($content[0]);
      }
    }
  }, {
    key: "pushContentToTarget",
    value: function pushContentToTarget($contentValue, $targetName) {
      var $generateModal = this.generateModal;
      if (!$targetName) {
        return;
      }
      $contentValue = $contentValue.replace(/(?:\r\n|\r|\n)/g, '<br>');
      var $contentTarget = $('form').find('[name="' + $targetName + '"]');
      $contentTarget.each(function (index, element) {
        var id = element.id || '';
        if (EDITOR.CKEDITOR[id]) {
          EDITOR.CKEDITOR[id].setData($contentValue);
        } else {
          element.value = $contentValue;
        }
        Botble.showSuccess($('[data-bb-toggle="ai-writer-push-content"]').data('bb-message'));
        $generateModal.modal('hide');
      });
    }
  }, {
    key: "handleGenerateEvents",
    value: function handleGenerateEvents() {
      var $self = this;
      var $promptForm = $self.promptForm;
      var $previewEditor = $promptForm.find('#preview_content');
      var $targetField = $promptForm.find('#target_field');
      var $promptEditor = $promptForm.find('#prompt');
      var $promptLanguage = $promptForm.find('select[name="language"]');
      var $btnGenerate = $self.generateModal.find('[data-bb-toggle="ai-writer-generate"]');
      var $btnPush = $self.generateModal.find('[data-bb-toggle="ai-writer-push-content"]');
      var renderPrompt = function renderPrompt() {
        var index = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
        if ($promptTemplates[index]) {
          $promptEditor.val($promptTemplates[index].content);
        }
      };
      $(document).on('click', '[data-bb-toggle="ai-writer-generate-modal"]', function (event) {
        event.preventDefault();
        var targetFieldId = $(this).closest('.card-body').find('textarea').prop('id');
        $self.generateModal.find('#target_field').val(targetFieldId);
        $self.generateModal.modal('show');
      }).on('change', '#prompt_type', function () {
        renderPrompt($(this).val());
      });
      $btnGenerate.on('click', function (event) {
        event.preventDefault();
        var $current = $(event.currentTarget);
        var $generateUrl = $current.data('generate-url');
        var $promptValue = $promptEditor.val();
        $.ajax({
          url: $generateUrl,
          type: 'POST',
          data: {
            prompt: $promptValue,
            language: $promptLanguage.val()
          },
          beforeSend: function beforeSend() {
            $self.updateModalState($self.generateModal, true);
          },
          success: function success(res) {
            if (res.error) {
              Botble.showError(res.message);
            } else {
              var editor = window.EDITOR.CKEDITOR[$previewEditor.prop('id')];
              editor.setData(res.data.content);
            }
          },
          error: function error(data) {
            Botble.handleError(data);
          },
          complete: function complete() {
            $self.updateModalState($self.generateModal, false);
          }
        });
      });
      $btnPush.on('click', function (event) {
        event.preventDefault();
        var editor = window.EDITOR.CKEDITOR[$previewEditor.prop('id')];
        var $contentValue = editor.getData();
        var $targetName = $targetField.val();
        $self.pushContentToTarget($contentValue, $targetName);
        editor.setData('');
      });
      renderPrompt(0);
    }
  }, {
    key: "handleSpinEvents",
    value: function handleSpinEvents() {
      var $self = this;
      var $targetField = $self.spinForm.find('#target_spin_field');
      var $spinTemplateTitle = $self.spinForm.find('#spin_template_title');
      var $spinEditor = $self.spinForm.find('#spin');
      var $previewEditor = $self.spinForm.find('#preview_spin_content');
      var $btnSpin = $self.spinModal.find('[data-bb-toggle="ai-writer-spin"]');
      var $btnPush = $self.spinModal.find('[data-bb-toggle="ai-writer-push-content"]');
      var $btnOpenSpin = $('[data-bb-toggle="ai-writer-spin-content-modal"]');
      $self.spinModal.find('.modal-body .loading-spinner').hide();
      var renderSpinTemplate = function renderSpinTemplate() {
        var index = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
        if ($spinTemplates[index]) {
          var _$spinTemplates$index;
          $spinEditor.val((_$spinTemplates$index = $spinTemplates[index]) === null || _$spinTemplates$index === void 0 ? void 0 : _$spinTemplates$index.content);
        }
      };
      var pushTargetContentToSpin = function pushTargetContentToSpin() {
        var $targetName = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
        var $contentValue = '';
        var $previewId = $previewEditor.prop('id');
        if (!$targetName) {
          return;
        }
        var $contentTarget = $('form').find("[name=\"".concat($targetName, "\"]"));
        $contentTarget.each(function (index, element) {
          var id = element.id || '';
          if (EDITOR.CKEDITOR[id]) {
            $contentValue = EDITOR.CKEDITOR[id].getData($contentValue);
          } else {
            $contentValue = element.value;
          }
        });
        if (EDITOR.CKEDITOR[$previewId]) {
          EDITOR.CKEDITOR[$previewId].setData($contentValue);
        } else {
          $previewEditor.val($contentValue);
        }
      };
      var getSpinTemplate = function getSpinTemplate() {
        var $spinValue = $spinEditor.val();
        $spinValue = $spinValue.split(/\r?\n/).filter(function (element) {
          return element;
        }).map(function (parents) {
          var _parents$slice;
          var elements = parents === null || parents === void 0 || (_parents$slice = parents.slice(1, -1)) === null || _parents$slice === void 0 ? void 0 : _parents$slice.split('|');
          elements = elements.filter(function (element) {
            var _element;
            element = (_element = element) === null || _element === void 0 ? void 0 : _element.trim();
            return element.length;
          }).map(function (element) {
            return element === null || element === void 0 ? void 0 : element.trim();
          });
          return elements;
        });
        return $spinValue;
      };
      $btnOpenSpin.on('click', function (event) {
        event.preventDefault();
        var $targetName = $targetField.val();
        pushTargetContentToSpin($targetName);
        $self.spinModal.modal('show');
      });
      $btnSpin.on('click', function (e) {
        e.preventDefault();
        var $spinValue = getSpinTemplate();
        var $previewValue = $previewEditor.val();
        var $previewId = $previewEditor.prop('id');
        var _iterator = _createForOfIteratorHelper($spinValue),
          _step;
        try {
          for (_iterator.s(); !(_step = _iterator.n()).done;) {
            var words = _step.value;
            var _iterator2 = _createForOfIteratorHelper(words),
              _step2;
            try {
              for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
                var item = _step2.value;
                var regex = new RegExp(item, 'gi');
                if ($previewValue.match(regex)) {
                  var randomWord = words[Math.floor(Math.random() * words.length)];
                  $previewValue = $previewValue.replace(regex, randomWord);
                }
              }
            } catch (err) {
              _iterator2.e(err);
            } finally {
              _iterator2.f();
            }
          }
        } catch (err) {
          _iterator.e(err);
        } finally {
          _iterator.f();
        }
        if (EDITOR.CKEDITOR[$previewId]) {
          EDITOR.CKEDITOR[$previewId].setData($previewValue);
        } else {
          $previewEditor.val($previewValue);
        }
      });
      $btnPush.on('click', function (e) {
        e.preventDefault();
        var $contentValue = $previewEditor.val();
        var $targetName = $targetField.val();
        $self.pushContentToTarget($contentValue, $targetName);
        $self.spinModal.modal('hide');
      });
      $targetField.on('change', function (event) {
        var $targetName = event.currentTarget.value;
        pushTargetContentToSpin($targetName);
      });
      $spinTemplateTitle.on('change', function () {
        renderSpinTemplate($(this).val());
      });
      renderSpinTemplate();
    }
  }]);
}();
$(document).ready(function () {
  new AiWriter();
});
/******/ })()
;