App.Router = Backbone.Router.extend({
	
	userModel: {},
	currentView: {},
	
	initialize: function () {
		var self = this;
		
		_(this).bindAll('loadPage');		
		
		this.userModel = new App.UserModel();
	},
	
	routes: {
		'': 'home',
		'user/': 'userList',
		'user/:id/': 'user'
	},

	home: function () {	
		console.log('home');
	},
	
	flush: function() {
	    this.userModel = new App.UserModel();
	},

	navigate: function(fragment, options) {
	    this.flush();
		return App.Router.__super__.navigate.apply(this, arguments);	
    },
    
    loadPage: function (ViewClass, opts) {
		this.currentView = (new ViewClass());
		this.currentView.render(opts);
		this.setContent(this.currentView.$el);
		this.currentView.process();
	},
	
	setContent: function(html) {
		$('#page').html(html);
	},

	userList: function() {
		var self = this;
		
		console.log('userList');
		
		this.userModel.on('listOK', function() {
		    console.log(this.list);
		    
			self.loadPage(App.UserListView, { users : this.list });
		});
		
		this.userModel.getList();
	},
	
	user: function(id) {
		var self = this;
		
		console.log('user : ' + id);
		
		this.userModel.on('elementOK', function() {
			self.loadPage(App.UserView, { user : this.element});
			
			self.currentView.on('onSubmit', function(data) {
			    console.log('onSubmit in router');
				self.userModel.update(id, data);
			});
			
		});
		
		this.userModel.getElement(id);
	}
	
});