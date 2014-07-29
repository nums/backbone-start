App.BaseModel = Backbone.Model.extend({ 

	urlRoot: '/', 
	
	toUrl: function(params) {
		var urlArray = new Array();
		for(var i in params)
			urlArray.push(i+'='+params[i])
		return urlArray.join('&');
	},
	
	getCallerParams: function() {
	    return '';
		//return 'udid=' + App.caller.udid + '&token=' + App.caller.token + '&timezoneOffset=' + App.timezoneOffset;
	}
	
}); 