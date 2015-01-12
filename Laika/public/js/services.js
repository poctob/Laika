/**
 * 
 */
var configServices = angular.module('configServices', [ 'ngResource' ]);

configServices.factory('itemFactory', ['$resource', function($resource) {
	return $resource( ':pathPrefix/getJSON', {pathPrefix: '@pathPrefix'}, {
		update :  { method:'PUT', params:{pathPrefix: '@pathPrefix'}}	
	});
}]);

configServices.service('DBService', ['itemFactory', 'alertService', function(itemFactory, alertService) {
	
	this.getNewItem = function ()
	{
		return new itemFactory();
	}
				
	this.saveItem = function(item,path) {
		if (typeof item.id != "undefined" && item.id > 0) {
			itemFactory.update({pathPrefix : path}, item, saveSuccess, saveFailed);
		} else {
			itemFactory.save({pathPrefix : path}, item, saveSuccess, saveFailed);
		}		
	};
	
	this.deleteItem = function(selection,path) {
		if (typeof selection != "undefined" && selection.id > 0) {
			this.currentItem = selection;
			this.currentItem.$delete({
				pathPrefix : path,
				id : selection.id
			}, deleteSuccess, saveFailed);			
		}
	};		
	
	this.loadItems = function(path) {
		return itemFactory.query({
			pathPrefix : path
		});
	}
	
	this.getAlerts = function () {
		return alertService.alerts;
	}
	
	this.closeAlert = function(id)
	{
		alertService.closeAlert();
	}
	
	function deleteSuccess(value, responseHeaders) {
		index = alertService.addAlert('success', 'Item Deleted!');
	}

	function saveSuccess(value, responseHeaders) {
		index = alertService.addAlert('success', 'Item Saved!');
	}

	function saveFailed(httpResponse) {
		alertService.addAlert('danger', 'Error! Server responded with: '
				+ httpResponse.data.error.message);
	}
}]);


configServices.service('alertService', function($timeout) {

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
