/**
 * 
 */
var configServices = angular.module('configServices', [ 'ngResource' ]);

configServices.factory('Item', [ '$resource', function($resource) {
	return $resource('configuration/getJSON/:Id', {Id: '@_id'}, {
		update : {
			method : 'PUT'
		}

	});
} ]);