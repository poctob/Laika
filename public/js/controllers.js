/**
 * Schedule controllers 
 */
var scheduleControllers = angular.module('scheduleControllers', []);

scheduleControllers.controller('ScheduleCtrl', function($scope, DBService) {
	
});
/**
 * Configration controllers 
 */
var configurationControllers = angular.module('configurationControllers', []);


configurationControllers.controller('ConfigCtrl', function($scope, DBService) {

	$scope.init = function(path)
	{
		$scope.path = path;
		$scope.items = DBService.loadItems(path);
		
		$scope.save = function(item)
		{
			DBService.saveItem(item, path);					
			$scope.myModal = false;
			$scope.items = DBService.loadItems(path);	
		};
		
		$scope.delete = function(item)
		{
			DBService.deleteItem(item, path);
			$scope.items = DBService.loadItems(path);
		};
		
		$scope.close = function()
		{
			$scope.myModal = false;
			$scope.items = DBService.loadItems(path);
		};
		
		$scope.open = function(selection) {
			if (typeof selection != "undefined") {
				$scope.item = selection;
				$scope.dialogTitle = "Edit Item";
			} else {
				$scope.item = DBService.getNewItem();
				$scope.dialogTitle = "Add Item";
			}
			$scope.myModal = true;
		};	
	}

});

configurationControllers.controller('AlertCtrl', function($scope, alertService){
	$scope.alerts = alertService;
});


var panelControllers = angular.module('panelControllers', []);

panelControllers.controller('MainPanelCtrl', [ '$scope', function() {
	this.tab = 1;
	this.selectTab = function(setTab) {
		this.tab = setTab;
	};
	this.isSelected = function(checkTab) {
		return this.tab === checkTab;
	};

} ]);
