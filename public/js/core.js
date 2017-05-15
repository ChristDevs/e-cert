(function ($) {
	"use strict";

	var App = function () {
		var o = this; // Create reference to this instance
		$(document).ready(function () {
			o.initialize();
		}); // Initialize app when document is ready

	};
	var p = App.prototype;

	// =========================================================================
	// MEMBERS
	// =========================================================================

	// Constant
	App.SCREEN_XS = 480;
	App.SCREEN_SM = 768;
	App.SCREEN_MD = 992;
	App.SCREEN_LG = 1200;

	// Private
	p._callFunctions = null;
	p._resizeTimer = null;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function () {
		// Init events
		this._enableEvents();

		// Init base
		this._initBreakpoints();

		// Init components
		this._initInk();

		// Init accordion
		this._initAccordion();
	};

	// =========================================================================
	// EVENTS
	// =========================================================================

	// events
	p._enableEvents = function () {
		var o = this;

		// Window events
		$(window).on('resize', function (e) {
			clearTimeout(o._resizeTimer);
			o._resizeTimer = setTimeout(function () {
				o._handleFunctionCalls(e);
			}, 300);
		});
	};

	// =========================================================================
	// JQUERY-KNOB
	// =========================================================================

	p.getKnobStyle = function (knob) {
		var holder = knob.closest('.knob');
		var options = {
			width: Math.floor(holder.outerWidth()),
			height: Math.floor(holder.outerHeight()),
			fgColor: holder.css('color'),
			bgColor: holder.css('border-top-color'),
			draw: function () {
				if (knob.data('percentage')) {
					$(this.i).val(this.cv + '%');
				}
			}
		};
		return options;
	};

	// =========================================================================
	// ACCORDION
	// =========================================================================

	p._initAccordion = function () {
		$('.panel-group .card .in').each(function () {
			var card = $(this).parent();
			card.addClass('expanded');
		});


		$('.panel-group').on('hide.bs.collapse', function (e) {
			var content = $(e.target);
			var card = content.parent();
			card.removeClass('expanded');
		});

		$('.panel-group').on('show.bs.collapse', function (e) {
			var content = $(e.target);
			var card = content.parent();
			var group = card.closest('.panel-group');

			group.find('.card.expanded').removeClass('expanded');
			card.addClass('expanded');
		});
	};

	// =========================================================================
	// INK EFFECT
	// =========================================================================

	p._initInk = function () {
		var o = this;

		$('.ink-reaction').on('click', function (e) {
			var bound = $(this).get(0).getBoundingClientRect();
			var x = e.clientX - bound.left;
			var y = e.clientY - bound.top;

			var color = o.getBackground($(this));
			var inverse = (o.getLuma(color) > 183) ? ' inverse' : '';
			
			var ink = $('<div class="ink' + inverse + '"></div>');
			var btnOffset = $(this).offset();
			var xPos = e.pageX - btnOffset.left;
			var yPos = e.pageY - btnOffset.top;

			ink.css({
				top: yPos,
				left: xPos
			}).appendTo($(this));

			window.setTimeout(function () {
				ink.remove();
			}, 1500);
		});
	};

	p.getBackground = function (item) {
		// Is current element's background color set?
		var color = item.css("background-color");
		var alpha = parseFloat(color.split(',')[3], 10);

		if ((isNaN(alpha) || alpha > 0.8) && color !== 'transparent') {
			// if so then return that color if it isn't transparent
			return color;
		}

		// if not: are you at the body element?
		if (item.is("body")) {
			// return known 'false' value
			return false;
		} else {
			// call getBackground with parent item
			return this.getBackground(item.parent());
		}
	};

	p.getLuma = function (color) {
		var rgba = color.substring(4, color.length - 1).split(',');
		var r = rgba[0];
		var g = rgba[1];
		var b = rgba[2];
		var luma = 0.2126 * r + 0.7152 * g + 0.0722 * b; // per ITU-R BT.709
		return luma;
	};

	// =========================================================================
	// DETECT BREAKPOINTS
	// =========================================================================

	p._initBreakpoints = function (alias) {
		var html = '';
		html += '<div id="device-breakpoints">';
		html += '<div class="device-xs visible-xs" data-breakpoint="xs"></div>';
		html += '<div class="device-sm visible-sm" data-breakpoint="sm"></div>';
		html += '<div class="device-md visible-md" data-breakpoint="md"></div>';
		html += '<div class="device-lg visible-lg" data-breakpoint="lg"></div>';
		html += '</div>';
		$('body').append(html);
	};

	p.isBreakpoint = function (alias) {
		return $('.device-' + alias).is(':visible');
	};
	p.minBreakpoint = function (alias) {
		var breakpoints = ['xs', 'sm', 'md', 'lg'];
		var breakpoint = $('#device-breakpoints div:visible').data('breakpoint');
		return $.inArray(alias, breakpoints) < $.inArray(breakpoint, breakpoints);
	};

	// =========================================================================
	// UTILS
	// =========================================================================

	p.callOnResize = function (func) {
		if (this._callFunctions === null) {
			this._callFunctions = [];
		}
		this._callFunctions.push(func);
		func.call();
	};

	p._handleFunctionCalls = function (e) {
		if (this._callFunctions === null) {
			return;
		}
		for (var i = 0; i < this._callFunctions.length; i++) {
			this._callFunctions[i].call();
		}
	};

	// =========================================================================
	// DEFINE NAMESPACE
	// =========================================================================

	window.materialadmin = window.materialadmin || {};
	window.materialadmin.App = new App;
}(jQuery)); // pass in (jQuery):

(function(namespace, $) {
	"use strict";

	var AppCard = function() {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function() {
			o.initialize();
		});

	};
	var p = AppCard.prototype;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function() {};

	// =========================================================================
	// CARD LOADER
	// =========================================================================

	p.addCardLoader = function (card) {
		var container = $('<div class="card-loader"></div>').appendTo(card);
		container.hide().fadeIn();
		var opts = {
			lines: 17, // The number of lines to draw
			length: 0, // The length of each line
			width: 3, // The line thickness
			radius: 6, // The radius of the inner circle
			corners: 1, // Corner roundness (0..1)
			rotate: 13, // The rotation offset
			direction: 1, // 1: clockwise, -1: counterclockwise
			color: '#000', // #rgb or #rrggbb or array of colors
			speed: 2, // Rounds per second
			trail: 76, // Afterglow percentage
			shadow: false, // Whether to render a shadow
			hwaccel: false, // Whether to use hardware acceleration
			className: 'spinner', // The CSS class to assign to the spinner
			zIndex: 2e9 // The z-index (defaults to 2000000000)
		};
		var spinner = new Spinner(opts).spin(container.get(0));
		card.data('card-spinner', spinner);
	};

	p.removeCardLoader = function (card) {
		var spinner = card.data('card-spinner');
		var loader = card.find('.card-loader');
		loader.fadeOut(function () {
			spinner.stop();
			loader.remove();
		});
	};
	
	// =========================================================================
	// CARD COLLAPSE
	// =========================================================================

	p.toggleCardCollapse = function (card, duration) {
		duration = typeof duration !== 'undefined' ? duration : 400;
		var dispatched = false;
		card.find('.nano').slideToggle(duration);
		card.find('.card-body').slideToggle(duration, function () {
			if (dispatched === false) {
				$('#COLLAPSER').triggerHandler('card.bb.collapse', [!$(this).is(":visible")]);
				dispatched = true;
			}
		});
		card.toggleClass('card-collapsed');
	};

	// =========================================================================
	// CARD REMOVE
	// =========================================================================

	p.removeCard = function (card) {
		card.fadeOut(function () {
			card.remove();
		});
	};
	
	// =========================================================================
	// DEFINE NAMESPACE
	// =========================================================================

	window.materialadmin.AppCard = new AppCard;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):

(function(namespace, $) {
    "use strict";

    var AppForm = function() {
        // Create reference to this instance
        var o = this;
        // Initialize app when document is ready
        $(document).ready(function() {
            o.initialize();
        });

    };
    var p = AppForm.prototype;

    // =========================================================================
    // INIT
    // =========================================================================

    p.initialize = function() {
        // Init events
        this._enableEvents();

        this._initRadioAndCheckbox();
        this._initFloatingLabels();
        this._initValidation();
    };

    // =========================================================================
    // EVENTS
    // =========================================================================

    // events
    p._enableEvents = function() {
        var o = this;

        // Link submit function
        $('[data-submit="form"]').on('click', function(e) {
            e.preventDefault();
            var formId = $(e.currentTarget).attr('href');
            $(formId).submit();
        });

        // Init textarea autosize
        $('textarea.autosize').on('focus', function() {
            $(this).autosize({ append: '' });
        });
    };

    // =========================================================================
    // RADIO AND CHECKBOX LISTENERS
    // =========================================================================

    p._initRadioAndCheckbox = function() {
        // Add a span class the styled checkboxes and radio buttons for correct styling
        $('.checkbox-styled input, .radio-styled input').each(function() {
            if ($(this).next('span').length === 0) {
                $(this).after('<span></span>');
            }
        });
    };

    // =========================================================================
    // FLOATING LABELS
    // =========================================================================

    p._initFloatingLabels = function() {
        var o = this;

        $('.floating-label .form-control').on('keyup change', function(e) {
            var input = $(e.currentTarget);

            if ($.trim(input.val()) !== '') {
                input.addClass('dirty').removeClass('static');
            } else {
                input.removeClass('dirty').removeClass('static');
            }
        });

        $('.floating-label .form-control').each(function() {
            var input = $(this);

            if ($.trim(input.val()) !== '') {
                input.addClass('static').addClass('dirty');
            }
        });

        $('.form-horizontal .form-control').each(function() {
            $(this).after('<div class="form-control-line"></div>');
        });
    };

    // =========================================================================
    // VALIDATION
    // =========================================================================

    p._initValidation = function() {
        if (!$.isFunction($.fn.validate)) {
            return;
        }
        $.validator.setDefaults({
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function(error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else if (element.parent('label').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });

        $('.form-validation').each(function() {
            var validator = $(this).validate();
            $(this).data('validator', validator);
        });
        $('.date-picker').datepicker({ autoclose: true, todayHighlight: true, format: "yyyy-mm-dd" });
    };

    // =========================================================================
    // DEFINE NAMESPACE
    // =========================================================================

    window.materialadmin.AppForm = new AppForm;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):
(function (namespace, $) {
	"use strict";

	var AppNavSearch = function () {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function () {
			o.initialize();
		});

	};
	var p = AppNavSearch.prototype;

	// =========================================================================
	// MEMBERS
	// =========================================================================

	p._clearSearchTimer = null;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function () {
		this._enableEvents();
	};

	// =========================================================================
	// EVENTS
	// =========================================================================

	// events
	p._enableEvents = function () {
		var o = this;

		// Listen for the nav search button click
		$('.navbar-search .btn').on('click', function (e) {
			o._handleButtonClick(e);
		});

		// When the search field loses focus
		$('.navbar-search input').on('blur', function (e) {
			o._handleFieldBlur(e);
		});
	};

	// =========================================================================
	// NAV SEARCH
	// =========================================================================

	p._handleButtonClick = function (e) {
		e.preventDefault();

		var form = $(e.currentTarget).closest('form');
		var input = form.find('input');
		var keyword = input.val();

		if ($.trim(keyword) === '') {
			// When there is no keyword, just open the bar
			form.addClass('expanded');
			input.focus();
		}
		else {
			// When there is a keyword, submit the keyword
			form.addClass('expanded');
			form.submit();

			// Clear the timer that removes the keyword
			clearTimeout(this._clearSearchTimer);
		}
	};

	// =========================================================================
	// FIELD BLUR
	// =========================================================================

	p._handleFieldBlur = function (e) {
		// When the search field loses focus
		var input = $(e.currentTarget);
		var form = input.closest('form');

		// Collapse the search field
		form.removeClass('expanded');

		// Clear the textfield after 300 seconds (the time it takes to collapse the field)
		clearTimeout(this._clearSearchTimer);
		this._clearSearchTimer = setTimeout(function () {
			input.val('');
		}, 300);
	};

	// =========================================================================
	// DEFINE NAMESPACE
	// =========================================================================

	window.materialadmin.AppNavSearch = new AppNavSearch;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):

(function (namespace, $) {
	"use strict";

	var AppNavigation = function () {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function () {
			o.initialize();
		});

	};
	var p = AppNavigation.prototype;

	// =========================================================================
	// MEMBERS
	// =========================================================================

	// Constant
	AppNavigation.MENU_MAXIMIZED = 1;
	AppNavigation.MENU_COLLAPSED = 2;
	AppNavigation.MENU_HIDDEN = 3;

	// Private
	p._lastOpened = null;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function () {
		this._enableEvents();
		
		this._invalidateMenu();
		this._evalMenuScrollbar();
	};

	// =========================================================================
	// EVENTS
	// =========================================================================

	// events
	p._enableEvents = function () {
		var o = this;

		// Window events
		$(window).on('resize', function (e) {
			o._handleScreenSize(e);
		});
		
		// Menu events
		$('[data-toggle="menubar"]').on('click', function (e) {
			o._handleMenuToggleClick(e);
		});
		$('[data-dismiss="menubar"]').on('click', function (e) {
			o._handleMenubarLeave();
		});
		$('#main-menu').on('click', 'li', function (e) {
			o._handleMenuItemClick(e);
		});
		$('#main-menu').on('click', 'a', function (e) {
			o._handleMenuLinkClick(e);
		});
		$('body.menubar-hoverable').on('mouseenter', '#menubar', function (e) {
			setTimeout(function () {
				o._handleMenubarEnter();
			}, 1);
		});
	};

	// handlers
	p._handleScreenSize = function (e) {
		this._invalidateMenu();
		this._evalMenuScrollbar(e);
	};

	// =========================================================================
	// MENU TOGGLER
	// =========================================================================

	p._handleMenuToggleClick = function (e) {
		if (!materialadmin.App.isBreakpoint('xs')) {
			$('body').toggleClass('menubar-pin');
		}

		var state = this.getMenuState();

		if (state === AppNavigation.MENU_COLLAPSED) {
			this._handleMenubarEnter();
		}
		else if (state === AppNavigation.MENU_MAXIMIZED) {
			this._handleMenubarLeave();
		}
		else if (state === AppNavigation.MENU_HIDDEN) {
			this._handleMenubarEnter();
		}
	};

	// =========================================================================
	// MAIN BAR
	// =========================================================================

	p._handleMenuItemClick = function (e) {
		e.stopPropagation();

		var item = $(e.currentTarget);
		var submenu = item.find('> ul');
		var parentmenu = item.closest('ul');

		this._handleMenubarEnter(item);
		
		if (submenu.children().length !== 0) {
			this._closeSubMenu(parentmenu);
			
			var menuIsCollapsed = this.getMenuState() === AppNavigation.MENU_COLLAPSED;
			if(menuIsCollapsed || item.hasClass('expanded') === false) {
				this._openSubMenu(item);
			}
		}
	};

	p._handleMenubarEnter = function (menuItem) {
		var o = this;
		var offcanvasVisible = $('body').hasClass('offcanvas-left-expanded');
		var menubarExpanded = $('#menubar').data('expanded');
		var menuItemClicked = (menuItem !== undefined);

		// Check if the menu should open
		if ((menuItemClicked === true || offcanvasVisible === false) && menubarExpanded !== true) {
			// Add listener to close the menubar
			$('#content').one('mouseover', function (e) {
				o._handleMenubarLeave();
			});

			// Add open variables
			$('body').addClass('menubar-visible');
			$('#menubar').data('expanded', true);

			// Triger enter event
			$('#menubar').triggerHandler('enter');


			if (menuItemClicked === false) {
				// If there is a previous opened item, open it and all of its parents
				if (this._lastOpened) {
					var o = this;
					this._openSubMenu(this._lastOpened, 0);
					this._lastOpened.parents('.gui-folder').each(function () {
						o._openSubMenu($(this), 0);
					});
				}
				else {
					// Else open the active item
					var item = $('#main-menu > li.active');
					this._openSubMenu(item, 0);
				}
			}
		}
	};

	p._handleMenubarLeave = function () {
		$('body').removeClass('menubar-visible');
		
		// Don't close the menus when it is pinned on large viewports
		if (materialadmin.App.minBreakpoint('md')) {
			if ($('body').hasClass('menubar-pin')) {
				return;
			}
		}
		$('#menubar').data('expanded', false);


		// Never close the menu on extra small viewports
		if (materialadmin.App.isBreakpoint('xs') === false) {
			this._closeSubMenu($('#main-menu'));
		}
	};


	p._handleMenuLinkClick = function (e) {
		// Prevent the link from firing when the menubar isn't visible
		if (this.getMenuState() !== AppNavigation.MENU_MAXIMIZED) {
			e.preventDefault();
		}
	};

	// =========================================================================
	// OPEN / CLOSE MENU
	// =========================================================================

	p._closeSubMenu = function (menu) {
		var o = this;
		menu.find('> li > ul').stop().slideUp(170, function () {
			$(this).closest('li').removeClass('expanded');
			o._evalMenuScrollbar();
		});
	};

	p._openSubMenu = function (item, duration) {
		var o = this;
		if (typeof (duration) === 'undefined') {
			duration = 170;
		}
		
		// Remember the last opened item
		this._lastOpened = item;

		// Expand the menu
		item.addClass('expanding');
		item.find('> ul').stop().slideDown(duration, function () {
			item.addClass('expanded');
			item.removeClass('expanding');

			// Check scrollbars
			o._evalMenuScrollbar();

			// Manually remove the style, jQuery sometimes failes to remove it
			$('#main-menu ul').removeAttr('style');
		});
	};

	// =========================================================================
	// UTILS
	// =========================================================================

	p._invalidateMenu = function () {
		// Retrieve active link
		var selectedLink = $('#main-menu a.active');

		// Expand all parent submenu's of the active link so it will be visible on startup
		selectedLink.parentsUntil($('#main-menu')).each(function () {
			if ($(this).is('li')) {
				$(this).addClass('active');
				$(this).addClass('expanded');
			}
		});

		// When invalidating, dont expand the first submenu when the menu is collapsed
		if (this.getMenuState() === AppNavigation.MENU_COLLAPSED) {
			$('#main-menu').find('> li').removeClass('expanded');
		}

		// Check if the menu is visible
		if ($('body').hasClass('menubar-visible')) {
			this._handleMenubarEnter();
		}

		// Trigger event
		$('#main-menu').triggerHandler('ready');

		// Add the animate class for CSS transitions.
		// It solves the slow initiation bug in IE, 
		// wich makes the collapse visible on startup
		$('#menubar').addClass('animate');
	};

	p.getMenuState = function () {
		// By using the CSS properties, we can attach 
		// states to CSS properties and therefor control states in CSS
		var matrix = $('#menubar').css("transform");
		var values = (matrix) ? matrix.match(/-?[\d\.]+/g) : null;
			
		var menuState = AppNavigation.MENU_MAXIMIZED;
		if (values === null) {
			if ($('#menubar').width() <= 100) {
				menuState = AppNavigation.MENU_COLLAPSED;
			}
			else {
				menuState = AppNavigation.MENU_MAXIMIZED;
			}
		}
		else {
			if (values[4] === '0') {
				menuState = AppNavigation.MENU_MAXIMIZED;
			}
			else {
				menuState = AppNavigation.MENU_HIDDEN;
			}
		}

		return menuState;
	};

	p._evalMenuScrollbar = function () {
		if (!$.isFunction($.fn.nanoScroller)) {
			return;
		}
		
		// First calculate the footer height
		var footerHeight = $('#menubar .menubar-foot-panel').outerHeight();
		footerHeight = Math.max(footerHeight, 1);
		$('.menubar-scroll-panel').css({'padding-bottom': footerHeight});
		
		
		// Check if there is a menu
		var menu = $('#menubar');
		if (menu.length === 0)
			return;
		
		// Get scrollbar elements
		var menuScroller = $('.menubar-scroll-panel');
		var parent = menuScroller.parent();

		// Add the scroller wrapper
		if (parent.hasClass('nano-content') === false) {
		menuScroller.wrap('<div class="nano"><div class="nano-content"></div></div>');
		}

		// Set the correct height
		var height = $(window).height() - menu.position().top - menu.find('.nano').position().top;
		var scroller = menuScroller.closest('.nano');
		scroller.css({height: height});

		// Add the nanoscroller
		scroller.nanoScroller({preventPageScrolling: true, iOSNativeScrolling: true});
	};


	// =========================================================================
	// DEFINE NAMESPACE
	// =========================================================================

	window.materialadmin.AppNavigation = new AppNavigation;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):

(function (namespace, $) {
	"use strict";

	var AppOffcanvas = function () {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function () {
			o.initialize();
		});

	};
	var p = AppOffcanvas.prototype;
	// =========================================================================
	// MEMBERS
	// =========================================================================

	p._timer = null;
	p._useBackdrop = null;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function () {
		this._enableEvents();
	};

	// =========================================================================
	// EVENTS
	// =========================================================================

	p._enableEvents = function () {
		var o = this;

		// Window events
		$(window).on('resize', function (e) {
			o._handleScreenSize(e);
		});

		// Offcanvas events
		$('.offcanvas').on('refresh', function (e) {
			o.evalScrollbar(e);
		});
		$('[data-toggle="offcanvas"]').on('click', function (e) {
			e.preventDefault();
			o._handleOffcanvasOpen($(e.currentTarget));
		});$('[data-dismiss="offcanvas"]').on('click', function (e) {
			o._handleOffcanvasClose();
		});
		$('#base').on('click', '> .backdrop', function (e) {
			o._handleOffcanvasClose();
		});

		// Open active offcanvas buttons
		$('[data-toggle="offcanvas-left"].active').each(function () {
			o._handleOffcanvasOpen($(this));
		});
		$('[data-toggle="offcanvas-right"].active').each(function () {
			o._handleOffcanvasOpen($(this));
		});
	};

	// handlers
	p._handleScreenSize = function (e) {
		this.evalScrollbar(e);
	};

	// =========================================================================
	// HANDLERS
	// =========================================================================

	p._handleOffcanvasOpen = function (btn) {
		// When the button is active, the off-canvas is already open and sould be closed
		if (btn.hasClass('active')) {
			this._handleOffcanvasClose();
			return;
		}

		var id = btn.attr('href');

		// Set data variables
		this._useBackdrop = (btn.data('backdrop') === undefined) ? true : btn.data('backdrop');

		// Open off-canvas
		this.openOffcanvas(id);
		this.invalidate();
	};

	p._handleOffcanvasClose = function (e) {
		this.closeOffcanvas();
		this.invalidate();
	};

	// =========================================================================
	// OPEN OFFCANVAS
	// =========================================================================

	p.openOffcanvas = function (id) {
		// First close all offcanvas panes
		this.closeOffcanvas();

		// Activate selected offcanvas pane
		$(id).addClass('active');

		// Check if the offcanvas is on the left
		var leftOffcanvas = ($(id).closest('.offcanvas:first').length > 0);

		// Remove offcanvas-expanded to enable body scrollbar
		if (this._useBackdrop)
			$('body').addClass('offcanvas-expanded');

		// Define the width
		var width = $(id).width();
		if (width > $(document).width()) {
			width = $(document).width() - 8;
			$(id + '.active').css({'width': width});
		}
		width = (leftOffcanvas) ? width : '-' + width;

		// Translate position offcanvas pane
		var translate = 'translate(' + width + 'px, 0)';
		$(id + '.active').css({
			'-webkit-transform': translate,
			'-ms-transform': translate,
			'-o-transform': translate,
			'transform': translate
		});
	};

	// =========================================================================
	// CLOSE OFFCANVAS
	// =========================================================================

	p.closeOffcanvas = function () {
		// Remove expanded on all offcanvas buttons
		$('[data-toggle="offcanvas"]').removeClass('expanded');

		// Remove offcanvas active state
		$('.offcanvas-pane').removeClass('active');//.removeAttr('style');
		$('.offcanvas-pane').css({
			'-webkit-transform': '',
			'-ms-transform': '',
			'-o-transform': '',
			'transform': ''
		});
	};

	// =========================================================================
	// OFFCANVAS BUTTONS
	// =========================================================================

	p.toggleButtonState = function () {
		// Activate the active offcanvas pane
		var id = $('.offcanvas-pane.active').attr('id');
		$('[data-toggle="offcanvas"]').removeClass('active');
		$('[href="#' + id + '"]').addClass('active');
	};

	// =========================================================================
	// BACKDROP
	// =========================================================================

	p.toggleBackdropState = function () {
		// Clear the timer that removes the keyword
		if ($('.offcanvas-pane.active').length > 0 && this._useBackdrop) {
			this._addBackdrop();
		}
		else {
			this._removeBackdrop();
		}
	};

	p._addBackdrop = function () {
		if ($('#base > .backdrop').length === 0 && $('#base').data('backdrop') !== 'hidden') {
			$('<div class="backdrop"></div>').hide().appendTo('#base').fadeIn();
		}
	};

	p._removeBackdrop = function () {
		$('#base > .backdrop').fadeOut(function () {
			$(this).remove();
		});
	};

	// =========================================================================
	// BODY SCROLLING
	// =========================================================================

	p.toggleBodyScrolling = function () {
		clearTimeout(this._timer);
		if ($('.offcanvas-pane.active').length > 0 && this._useBackdrop) {
			// Add body padding to prevent visual jumping
			var scrollbarWidth = this.measureScrollbar();
			var bodyPad = parseInt(($('body').css('padding-right') || 0), 10);
			if (scrollbarWidth !== bodyPad) {
				$('body').css('padding-right', bodyPad + scrollbarWidth);
				$('.headerbar').css('padding-right', bodyPad + scrollbarWidth);
			}
		}
		else {
			this._timer = setTimeout(function () {
				// Remove offcanvas-expanded to enable body scrollbar
				$('body').removeClass('offcanvas-expanded');
				$('body').css('padding-right', '');
				$('.headerbar').removeClass('offcanvas-expanded');
				$('.headerbar').css('padding-right', '');
			}, 330);
		}
	};

	// =========================================================================
	// INVALIDATE
	// =========================================================================

	p.invalidate = function () {
		this.toggleButtonState();
		this.toggleBackdropState();
		this.toggleBodyScrolling();
		this.evalScrollbar();
	};

	// =========================================================================
	// SCROLLBAR
	// =========================================================================

	p.evalScrollbar = function () {
		if (!$.isFunction($.fn.nanoScroller)) {
			return;
		}
		
		// Check if there is a menu
		var menu = $('.offcanvas-pane.active');
		if (menu.length === 0)
			return;

		// Get scrollbar elements
		var menuScroller = $('.offcanvas-pane.active .offcanvas-body');
		var parent = menuScroller.parent();

		// Add the scroller wrapper
		if (parent.hasClass('nano-content') === false) {
			menuScroller.wrap('<div class="nano"><div class="nano-content"></div></div>');
		}
		
		// Set the correct height
		var height = $(window).height() - menu.find('.nano').position().top;
		var scroller = menuScroller.closest('.nano');
		scroller.css({height: height});

		// Add the nanoscroller
		scroller.nanoScroller({preventPageScrolling: true});
	};

	// =========================================================================
	// UTILS
	// =========================================================================

	p.measureScrollbar = function () {
		var scrollDiv = document.createElement('div');
		scrollDiv.className = 'modal-scrollbar-measure';
		$('body').append(scrollDiv);
		var scrollbarWidth = scrollDiv.offsetWidth - scrollDiv.clientWidth;
		$('body')[0].removeChild(scrollDiv);
		return scrollbarWidth;
	};

	// =========================================================================
	// DEFINE NAMESPACE
	// =========================================================================

	window.materialadmin.AppOffcanvas = new AppOffcanvas;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):

(function(namespace, $) {
	"use strict";

	var AppVendor = function() {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function() {
			o.initialize();
		});

	};
	var p = AppVendor.prototype;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function() {
		this._initScroller();
		this._initTabs();
		this._initTooltips();
		this._initPopover();
		this._initSortables();
	};

	// =========================================================================
	// SCROLLER
	// =========================================================================

	p._initScroller = function () {
		if (!$.isFunction($.fn.nanoScroller)) {
			return;
		}

		$.each($('.scroll'), function (e) {
			var holder = $(this);
			materialadmin.AppVendor.addScroller(holder);
		});

		materialadmin.App.callOnResize(function () {
			$.each($('.scroll-xs'), function (e) {
				var holder = $(this);
				if(!holder.is(":visible")) return;
				
				if (materialadmin.App.minBreakpoint('xs')) {
					materialadmin.AppVendor.removeScroller(holder);
				}
				else {
					materialadmin.AppVendor.addScroller(holder);
				}
			});

			$.each($('.scroll-sm'), function (e) {
				var holder = $(this);
				if(!holder.is(":visible")) return;
				
				if (materialadmin.App.minBreakpoint('sm')) {
					materialadmin.AppVendor.removeScroller(holder);
				}
				else {
					materialadmin.AppVendor.addScroller(holder);
				}
			});

			$.each($('.scroll-md'), function (e) {
				var holder = $(this);
				if(!holder.is(":visible")) return;
				
				if (materialadmin.App.minBreakpoint('md')) {
					materialadmin.AppVendor.removeScroller(holder);
				}
				else {
					materialadmin.AppVendor.addScroller(holder);
				}
			});

			$.each($('.scroll-lg'), function (e) {
				var holder = $(this);
				if(!holder.is(":visible")) return;
				
				if (materialadmin.App.minBreakpoint('lg')) {
					materialadmin.AppVendor.removeScroller(holder);
				}
				else {
					materialadmin.AppVendor.addScroller(holder);
				}
			});
		});
	};

	p.addScroller = function (holder) {
		holder.wrap('<div class="nano"><div class="nano-content"></div></div>');

		var scroller = holder.closest('.nano');
		scroller.css({height: holder.outerHeight()});
		scroller.nanoScroller();

		holder.css({height: 'auto'});
	};

	p.removeScroller = function (holder) {
		if (holder.parent().parent().hasClass('nano') === false) {
			return;
		}

		holder.parent().parent().nanoScroller({destroy: true});

		holder.parent('.nano-content').replaceWith(holder);
		holder.parent('.nano').replaceWith(holder);
		holder.attr('style', '');
	};
	
	// =========================================================================
	// SORTABLE
	// =========================================================================

	p._initSortables = function () {
		if (!$.isFunction($.fn.sortable)) {
			return;
		}

		$('[data-sortable="true"]').sortable({
			placeholder: "ui-state-highlight",
			delay: 100,
			start: function (e, ui) {
				ui.placeholder.height(ui.item.outerHeight() - 1);
			}
		});

	};
	
	// =========================================================================
	// TABS
	// =========================================================================

	p._initTabs = function () {
		if (!$.isFunction($.fn.tab)) {
			return;
		}
		$('[data-toggle="tabs"] a').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
		});
	};
	
	// =========================================================================
	// TOOLTIPS
	// =========================================================================

	p._initTooltips = function () {
		if (!$.isFunction($.fn.tooltip)) {
			return;
		}
		$('[data-toggle="tooltip"]').tooltip({container: 'body'});
	};

	// =========================================================================
	// POPOVER
	// =========================================================================

	p._initPopover = function () {
		if (!$.isFunction($.fn.popover)) {
			return;
		}
		$('[data-toggle="popover"]').popover({container: 'body'});
	};
	
	// =========================================================================
	// DEFINE NAMESPACE
	// =========================================================================

	window.materialadmin.AppVendor = new AppVendor;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):

(function (namespace, $) {
	"use strict";

	var Demo = function () {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function () {
			o.initialize();
		});

	};
	var p = Demo.prototype;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function () {
		this._enableEvents();

		this._initButtonStates();
		this._initIconSearch();
		this._initInversedTogglers();
		this._initChatMessage();
	};

	// =========================================================================
	// EVENTS
	// =========================================================================

	// events
	p._enableEvents = function () {
		var o = this;

		$('.card-head .tools .btn-refresh').on('click', function (e) {
			o._handleCardRefresh(e);
		});
		$('.card-head .tools .btn-collapse').on('click', function (e) {
			o._handleCardCollapse(e);
		});
		$('.card-head .tools .btn-close').on('click', function (e) {
			o._handleCardClose(e);
		});
		$('.card-head .tools .menu-card-styling a').on('click', function (e) {
			o._handleCardStyling(e);
		});
		$('.theme-selector a').on('click', function (e) {
			o._handleThemeSwitch(e);
		});
	};

	// =========================================================================
	// CARD ACTIONS
	// =========================================================================

	p._handleCardRefresh = function (e) {
		var o = this;
		var card = $(e.currentTarget).closest('.card');
		materialadmin.AppCard.addCardLoader(card);
		setTimeout(function () {
			materialadmin.AppCard.removeCardLoader(card);
		}, 1500);
	};

	p._handleCardCollapse = function (e) {
		var card = $(e.currentTarget).closest('.card');
		materialadmin.AppCard.toggleCardCollapse(card);
	};

	p._handleCardClose = function (e) {
		var card = $(e.currentTarget).closest('.card');
		materialadmin.AppCard.removeCard(card);
	};

	p._handleCardStyling = function (e) {
		// Get selected style and active card
		var newStyle = $(e.currentTarget).data('style');
		var card = $(e.currentTarget).closest('.card');

		// Display the selected style in the dropdown menu
		$(e.currentTarget).closest('ul').find('li').removeClass('active');
		$(e.currentTarget).closest('li').addClass('active');

		// Find all cards with a 'style-' class
		var styledCard = card.closest('[class*="style-"]');

		if (styledCard.length > 0 && (!styledCard.hasClass('style-white') && !styledCard.hasClass('style-transparent'))) {
			// If a styled card is found, replace the style with the selected style
			// Exclude style-white and style-transparent
			styledCard.attr('class', function (i, c) {
				return c.replace(/\bstyle-\S+/g, newStyle);
			});
		}
		else {
			// Create variable to check if a style is switched
			var styleSwitched = false;

			// When no cards are found with a style, look inside the card for styled headers or body
			card.find('[class*="style-"]').each(function () {
				// Replace the style with the selected style
				// Exclude style-white and style-transparent
				if (!$(this).hasClass('style-white') && !$(this).hasClass('style-transparent')) {
					$(this).attr('class', function (i, c) {
						return c.replace(/\bstyle-\S+/g, newStyle);
					});
					styleSwitched = true;
				}
			});

			// If no style is switched, add 1 to the main Card
			if (styleSwitched === false) {
				card.addClass(newStyle);
			}
		}
	};

	// =========================================================================
	// COLOR SWITCHER
	// =========================================================================
	
	p._handleThemeSwitch = function (e) {
		e.preventDefault();
		var newTheme = $(e.currentTarget).attr('href');
		this.switchTheme(newTheme);
	};
	
	p.switchTheme = function (theme) {
		$('link').each(function () {
			var href = $(this).attr('href');
			href = href.replace(/(assets\/css\/)(.*)(\/)/g, 'assets/css/' + theme + '/');
			$(this).attr('href', href);
		});
	};

	// =========================================================================
	// CHAT MESSAGE
	// =========================================================================
	
	p._initChatMessage = function (e) {
		var o = this;
		$('#sidebarChatMessage').keydown(function (e) {
			o._handleChatMessage(e);
		});
	};
	
	p._handleChatMessage = function (e) {
		var input = $(e.currentTarget);
		
		// Detect enter
		if (e.keyCode === 13) {
			e.preventDefault();
			
			// Get chat message
			var demoTime = new Date().getHours() + ':' + new Date().getMinutes();
			var demoImage = $('.list-chats li img').attr('src');
			
			// Create html
			var html = '';
			html += '<li>';
			html += '	<div class="chat">';
			html += '		<div class="chat-avatar"><img class="img-circle" src="' + demoImage + '" alt=""></div>';
			html += '		<div class="chat-body">';
			html += '			' + input.val();
			html += '			<small>' + demoTime + '</small>';
			html += '		</div>';
			html += '	</div>';
			html += '</li>';
			var $new = $(html).hide();
			
			// Add to chat list
			$('.list-chats').prepend($new);
			
			// Animate new inserts
			$new.show('fast');
			
			// Reset chat input
			input.val('').trigger('autosize.resize');
			
			// Refresh for correct scroller size
			$('.offcanvas').trigger('refresh');
		}
	};

	// =========================================================================
	// INVERSE UI TOGGLERS
	// =========================================================================
	
	p._initInversedTogglers = function () {
		var o = this;

		
		$('input[name="menubarInversed"]').on('change', function (e) {
			o._handleMenubarInversed(e);
		});
		$('input[name="headerInversed"]').on('change', function (e) {
			o._handleHeaderInversed(e);
		});
	};
	
	p._handleMenubarInversed = function (e) {
		if($(e.currentTarget).val() === '1') {
			$('#menubar').addClass('menubar-inverse');
		}
		else {
			$('#menubar').removeClass('menubar-inverse');
		}
	};
	p._handleHeaderInversed = function (e) {
		if($(e.currentTarget).val() === '1') {
			$('#header').addClass('header-inverse');
		}
		else {
			$('#header').removeClass('header-inverse');
		}
	};
	
	// =========================================================================
	// BUTTON STATES (LOADING)
	// =========================================================================

	p._initButtonStates = function () {
		$('.btn-loading-state').click(function () {
			var btn = $(this);
			btn.button('loading');
			setTimeout(function () {
				btn.button('reset');
			}, 3000);
		});
	};

	// =========================================================================
	// ICON SEARCH
	// =========================================================================

	p._initIconSearch = function () {
		if($('#iconsearch').length === 0) {
			return;
		}

		$('#iconsearch').focus();
		$('#iconsearch').on('keyup', function () {
			var val = $('#iconsearch').val();
			$('.col-md-3').hide();
			$('.col-md-3:contains("' + val + '")').each(function (e) {
				$(this).show();
			});

			$('.card').hide();
			$('.card:contains("' + val + '")').each(function (e) {
				$(this).show();
			});
		});
	};
		
	// =========================================================================
	namespace.Demo = new Demo;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):
