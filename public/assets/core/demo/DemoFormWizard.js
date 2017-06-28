(function(namespace, $) {
    "use strict";

    var DemoFormWizard = function() {
        // Create reference to this instance
        var o = this;
        // Initialize app when document is ready
        $(document).ready(function() {
            o.initialize();
        });

    };
    var p = DemoFormWizard.prototype;

    var wizard = $('#rootwizard1');

    // =========================================================================
    // INIT
    // =========================================================================

    p.initialize = function() {
        this._initWizard1();
    };
    p._validate = function(tab, navigation, index) {
        var form = wizard.find('form');
        if(! form.hasClass('form-validation')){
            return true;
        }
        var valid = form.valid();
        
        if (!valid) {
            form.data('validator').focusInvalid();
            return false;
        }
    }

    // =========================================================================
    // WIZARD 1
    // =========================================================================

    p._initWizard1 = function() {
        var o = this;
        wizard.bootstrapWizard({
            onTabShow: function(tab, navigation, index) {
                o._handleTabShow(tab, navigation, index, wizard);
            },
            onNext: function(tab, navigation, index) {
                return o._validate(tab, navigation, index);
            },
            onLast: function(tab, navigation, index) {
                return o._validate(tab, navigation, index);
            },
            onTabClick: function(tab, navigation, index) {
                return o._validate(tab, navigation, index);
            },

        });
    };

    p._handleTabShow = function(tab, navigation, index, wizard) {
        var total = navigation.find('li').length;
        var current = index + 0;
        var percent = (current / (total - 1)) * 100;
        var percentWidth = 100 - (100 / total) + '%';

        navigation.find('li').removeClass('done');
        navigation.find('li.active').prevAll().addClass('done');

        wizard.find('.progress-bar').css({ width: percent + '%' });
        $('.form-wizard-horizontal').find('.progress').css({ 'width': percentWidth });
    };

    // =========================================================================
    namespace.DemoFormWizard = new DemoFormWizard;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):