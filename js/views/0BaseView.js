/*global Backbone:false */

// instance vars
App.BaseView = function (options) {
	"use strict";
	this.renderParams = {};
	Backbone.View.apply(this, [options]);
	
};

_.extend(App.BaseView.prototype, Backbone.View.prototype, {
	
	className: 'wrapper container',
	
	loadTemplate: function () {	
		this.templateHTML = $('#tpl_' + this.template).html();
		this.templateContent = _.template(this.templateHTML);
		this.parseTpl();
		this.trigger('render');
	},
	
	process: function () {
	},
	
	parseTpl: function (vars) {
		this.$el.html(this.templateContent(this.renderParams));
	},

	render: function (renderParams) {
		this.templateHTML;
		this.templateContent;
		this.renderParams = renderParams;
		this.loadTemplate();
		
		return this;
	},
	
	render2: function (renderParams) {
		this.trigger('render');		
		return this;
	}
});

App.BaseView.extend = Backbone.View.extend;