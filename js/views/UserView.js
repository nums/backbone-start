App.UserView = App.BaseView.extend({	
	
	id: 'page_user',
	
	template: 'user',
	
	events:{
		'click #submit' : 'onSubmit'
    },
	
	process: function () {
		console.log('process user view');
	},
	
	onSubmit: function (e) {
	    console.log('onSubmit');
		this.trigger(
			'onSubmit', 
			this.$('#user_form').serialize()
		);	
	}
	
});