var App = {
	Models: {},
	Collections: {},
	Views: {},
	Routers: {},
	router: '',
	init: function() {
		App.router = new App.Router();
		Backbone.history.start({pushState: true, root: FRONT_URL});	
	},
	link: function(url) {	
		App.router.navigate(url, {trigger: true});
	}
};

$(document).ajaxStart(function() {
	$('#loading').show();
});

$(document).ajaxStop(function() {
	$('#loading').hide();
});

$(document).ready(function(){
	
	App.init();
	
	$(document).on('click', '.link', function(e) {
		App.link($(e.currentTarget).attr('data-url'));
	});
	
}); 