/**
 * 
 */
(function(){
	
	var configItemServices = angular.module('configItemServices',['ngResource']);
	
	configItemServices.factory('Items', ['$resource',
	    function($resource){
	    	return $resource('configuration/:getJSON', {}, {
	      query: {method:'GET', params:{}, isArray:true}
	    });
	  }]);
		
	var app = angular.module('configuration',['ngRoute','configItemServices','ConfigurationController']);
	
	app.controller('ConfigurationController', function($scope, $http){

		$scope.config_item = {};
		
		$http.get('configuration/getJSON')
	       .then(function(res){
	          $scope.items = res.data;                
	        });
		
		this.addItem = function ()
		{
			alert($scope.config_item);
		};
		
	});
	
	app.controller('PanelController', function(){
		this.tab = 1;
		this.selectTab = function(setTab){
			this.tab = setTab;
		};
		this.isSelected = function(checkTab){
			return this.tab === checkTab;
		};
			
	});
	
})();


