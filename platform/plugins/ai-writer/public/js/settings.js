/******/ (() => { // webpackBootstrap
/*!*************************************************************!*\
  !*** ./platform/plugins/ai-writer/resources/js/settings.js ***!
  \*************************************************************/
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var SettingManagement = /*#__PURE__*/function () {
  function SettingManagement() {
    _classCallCheck(this, SettingManagement);
    this.$modelWrapper = $('#openai-model-wrapper');
    this.$spinTemplateWrapper = $('#spin-template-wrapper');
    this.$promptTemplateWrapper = $('#prompt-template-wrapper');
    if (this.$modelWrapper.length) {
      this.handleMultipleModels();
    }
    if (this.$spinTemplateWrapper.length && Array.isArray($spinTemplates)) {
      this.handleMultiSpinTemplate();
    }
    if (this.$promptTemplateWrapper.length && Array.isArray($promptTemplates)) {
      this.handleMultiPromptTemplate();
    }
  }
  return _createClass(SettingManagement, [{
    key: "handleMultipleModels",
    value: function handleMultipleModels() {
      var $addBtn = this.$modelWrapper.find('#add-model');
      var $defaultModels = this.$modelWrapper.data('default');
      var $apiModels = this.$modelWrapper.data('models');
      if (!$apiModels.length) {
        $apiModels = [''];
      }
      var addModel = function addModel() {
        var value = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
        var $newModel = $("<div class=\"d-flex mt-2 more-model align-items-center\">\n          <input type=\"radio\" name=\"ai_writer_openai_default_model\" class=\"setting-selection-option default-model\" value=\"".concat(value, "\" ").concat(value === $defaultModels ? 'checked' : '', ">\n          <input class=\"next-input item-model\" placeholder=\"").concat($addBtn.data('placeholder'), "\" name=\"ai_writer_openai_models[]\" value=\"").concat(value, "\" />\n          <a class=\"btn btn-link text-danger\"><i class=\"fas fa-minus\"></i></a>\n        </div>"));
        $addBtn.before($newModel);
      };
      var render = function render() {
        $apiModels.forEach(function (model) {
          addModel(model);
        });
      };
      this.$modelWrapper.on('click', '.more-model > a', function () {
        $(this).parents('.more-model').remove();
        var $models = $('.more-model');
        if (!$models.length) {
          addModel();
        }
      });
      this.$modelWrapper.on('change', '.more-model > input.item-model', function () {
        var value = $(this).val();
        $(this).siblings('.default-model').val(value);
      });
      $addBtn.on('click', function (e) {
        e.preventDefault();
        addModel();
      });
      render();
    }
  }, {
    key: "handleMultiSpinTemplate",
    value: function handleMultiSpinTemplate() {
      this.handleMultiTemplate('spin');
    }
  }, {
    key: "handleMultiPromptTemplate",
    value: function handleMultiPromptTemplate() {
      this.handleMultiTemplate('prompt');
    }
  }, {
    key: "handleMultiTemplate",
    value: function handleMultiTemplate(templateType) {
      var $self = this;
      var $templateWrapper = templateType === 'spin' ? this.$spinTemplateWrapper : this.$promptTemplateWrapper;
      var $addBtn = $templateWrapper.find('.add-template');
      var $template = $(templateType === 'spin' ? '#spin-html-template' : '#prompt-html-template').get(0);
      var index = 0;
      var addTemplate = function addTemplate() {
        var title = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
        var content = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
        var $newItem = $($template.innerHTML);
        $newItem.find('.item-title').attr('name', "ai_writer_".concat(templateType, "_template[").concat(index, "][title]")).val(title);
        $newItem.find('.item-content').attr('name', "ai_writer_".concat(templateType, "_template[").concat(index, "][content]")).val(content);
        index++;
        $addBtn.before($newItem);
      };
      var render = function render() {
        var $templates = templateType === 'spin' ? $spinTemplates : $promptTemplates;
        $templates.forEach(function (_ref) {
          var title = _ref.title,
            content = _ref.content;
          addTemplate(title, content);
        });
      };
      $templateWrapper.on('click', '.more-template .remove-template', function (e) {
        e.preventDefault();
        $(this).parents('.more-template').remove();
        var $templates = $templateWrapper.find('.more-template');
        if (!$templates.length) {
          addTemplate();
        }
      });
      $addBtn.on('click', function (e) {
        e.preventDefault();
        addTemplate();
      });
      render();
    }
  }]);
}();
$(document).ready(function () {
  new SettingManagement();
});
/******/ })()
;