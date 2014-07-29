App.UserModel = App.BaseModel.extend({ 

	element: {},
	list: {},
	
	getList: function() {
		var self = this;
		
		Backbone.ajax({
			type: 'GET',
			url: WS_URL + 'user?' + this.getCallerParams(),
			dataType: 'json',
			success: function (data) {
				if(!data.response.error) {					
					self.list = data.response.users;
					self.trigger('listOK');					
				}
				else {
					alert(data.response.error.description);
					self.trigger('listKO');
				}				
			}
		});
	},
	
	getElement: function(id) {
		var self = this;
		
		Backbone.ajax({
			type: 'GET',
			url: WS_URL + 'user/' + id + '?' + this.getCallerParams(),
			dataType: 'json',
			success: function (data) {
				if(!data.response.error) {					
					self.element = data.response.user;
					self.trigger('elementOK');					
				}
				else {
					alert(data.response.error.description);
					self.trigger('elementKO');
				}				
			}
		});
	},
	
	update: function(id, params) {
		var self = this;
		
		Backbone.ajax({
			type: 'PUT',
			url: WS_URL + 'user/' + id + '?' + this.getCallerParams(),
			dataType: 'json',
			data: JSON.stringify(params),
			success: function (data) {
				if(!data.response.error) {
					console.log(data.response);
					self.trigger('updateOK');
					alert('update OK');
				}
				else {
					alert(data.response.error.description);
					self.trigger('updateKO');
					alert('no update');
				}				
			}
		});
	}
	
}); 