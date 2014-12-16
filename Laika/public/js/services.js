/**
 * 
 */
var configServices = angular.module('configServices', [ 'ngResource' ]);

configServices.factory('itemFactory', function($resource) {
	return $resource('configuration/getJSON', null, {
		update : {
			method : 'PUT'
		}

	});
});

configServices.service('alertFactory', function($timeout) {

	this.alerts = [];

	this.addAlert = function(p_type, p_msg) {
		this.alerts[0] = {
			type : p_type,
			msg : p_msg
		};
	}

	this.closeAlert = function() {
		if (this.alerts.length > 0) {
			this.alerts.splice(0, 1);
		}

	}

});
