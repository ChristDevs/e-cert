(function (namespace, $) {
	"use strict";

	var DemoDashboard = function () {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function () {
			o.initialize();
		});

	};
	var p = DemoDashboard.prototype;

	// =========================================================================
	// MEMBERS
	// =========================================================================

	p.rickshawSeries = [[], []];
	p.rickshawGraph = null;
	p.rickshawRandomData = null;
	p.rickshawTimer = null;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function () {
		this._initFlotVisitors();
	};
	
	// =========================================================================
	// FLOT
	// =========================================================================

	p._initFlotVisitors = function () {
		var o = this;
		var chart = $("#flot-visitors");
		
		// Elements check
		if (!$.isFunction($.fn.plot) || chart.length === 0) {
			return;
		}
		
		// Chart data
		var data = [
			{
				label: 'Pageviews',
				data: [
					[moment().subtract(168, 'hours').valueOf(), 50],
					[moment().subtract(144, 'hours').valueOf(), 620],
					[moment().subtract(108, 'hours').valueOf(), 380],
					[moment().subtract(70, 'hours').valueOf(), 880],
					[moment().subtract(30, 'hours').valueOf(), 450],
					[moment().subtract(12, 'hours').valueOf(), 600],
					[moment().valueOf(), 20]
				],
				last: true
			},
			{
				label: 'Visitors',
				data: [
					[moment().subtract(168, 'hours').valueOf(), 50],
					[moment().subtract(155, 'hours').valueOf(), 520],
					[moment().subtract(132, 'hours').valueOf(), 200],
					[moment().subtract(36, 'hours').valueOf(), 800],
					[moment().subtract(12, 'hours').valueOf(), 150],
					[moment().valueOf(), 20]
				],
				last: true
			}
		];
		
		// Chart options
		var labelColor = chart.css('color');
		var options = {
			colors: chart.data('color').split(','),
			series: {
				shadowSize: 0,
				lines: {
					show: true,
					lineWidth: false,
					fill: true
				},
				curvedLines: {
					apply: true,
					active: true,
					monotonicFit: false
			   }
			},
			legend: {
				container: $('#flot-visitors-legend')
			},
			xaxis: {
				mode: "time",
				timeformat: "%d %b",
				font: {color: labelColor}
			},
			yaxis: {
				font: {color: labelColor}
			},
			grid: {
				borderWidth: 0,
				color: labelColor,
				hoverable: true
			}
		};
		chart.width('100%');
		
		// Create chart
		var plot = $.plot(chart, data, options);

		// Hover function
		var tip, previousPoint = null;
		chart.bind("plothover", function (event, pos, item) {
			if (item) {
				if (previousPoint !== item.dataIndex) {
					previousPoint = item.dataIndex;

					var x = item.datapoint[0];
					var y = item.datapoint[1];
					var tipLabel = '<strong>' + $(this).data('title') + '</strong>';
					var tipContent = Math.round(y) + " " + item.series.label.toLowerCase() + " on " + moment(x).format('dddd');

					if (tip !== undefined) {
						$(tip).popover('destroy');
					}
					tip = $('<div></div>').appendTo('body').css({left: item.pageX, top: item.pageY - 5, position: 'absolute'});
					tip.popover({html: true, title: tipLabel, content: tipContent, placement: 'top'}).popover('show');
				}
			}
			else {
				if (tip !== undefined) {
					$(tip).popover('destroy');
				}
				previousPoint = null;
			}
		});
	};

	

	// =========================================================================
	namespace.DemoDashboard = new DemoDashboard;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):
