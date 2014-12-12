/**
 * 
 */

var configurationControllers = angular.module('configurationControllers', []);

configurationControllers.controller('GeneralCtrl', [ '$scope', 'Item',
		function($scope, Item) {
	
			
			$scope.open = function(selection) {
				if (typeof selection != "undefined") {
					$scope.item = selection;
					$scope.dialogTitle = "Edit Item";
				}
				else {
					$scope.item = new Item();
					$scope.dialogTitle = "Add Item";
				}
				$scope.myModal = true;
			};

			$scope.cancel = function() {
				$scope.myModal = false;
			};
			
			$scope.updateView = function (){
				Item.query( function (data){
					$scope.items = data;
				});
			};
			
			$scope.saveItem = function() {
				if(typeof $scope.item.id != "undefined" && $scope.item.id > 0){
					$scope.item.$update();
				}
				else {
					$scope.item.$save();
				}
				
				$scope.updateView();
				$scope.myModal = false;
			};
			
			$scope.deleteItem = function(selection){
				if (typeof selection != "undefined" && selection.id > 0) {
					$scope.item = selection;
					$scope.item.$delete({id: selection.id});
					$scope.updateView();
					$scope.item = new Item();
				}
			};
			
			$scope.updateView();
		} ]);

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
