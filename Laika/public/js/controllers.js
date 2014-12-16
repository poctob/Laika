/**
 * 
 */

var configurationControllers = angular.module('configurationControllers', []);

configurationControllers.controller('GeneralCtrl', 
		function($scope, $timeout, itemFactory, alertFactory) {
	
			loadItems();
			$scope.alertFactory = alertFactory;			
			
			$scope.open = function(selection) {
				if (typeof selection != "undefined") {
					$scope.item = selection;
					$scope.dialogTitle = "Edit Item";
				}
				else {
					$scope.item = new itemFactory();
					$scope.dialogTitle = "Add Item";
				}
				$scope.myModal = true;
			};

			$scope.cancel = function() {
				$scope.myModal = false;
			};
			
			$scope.saveItem = function() {
				if(typeof $scope.item.id != "undefined" && $scope.item.id > 0){
										
					itemFactory.update($scope.item, saveSuccess, saveFailed);
				}
				else {
					itemFactory.save($scope.item, saveSuccess, saveFailed);
				}
				$scope.myModal = false;
			};
			
			$scope.deleteItem = function(selection){
				if (typeof selection != "undefined" && selection.id > 0) {
					$scope.item = selection;
					$scope.item.$delete({id: selection.id}, deleteSuccess, saveFailed);
					$scope.item = new itemFactory();
				}
			};
			
			$scope.saveSuccess = saveSuccess;
			$scope.deleteSuccess = deleteSuccess;
			$scope.saveFailed = saveFailed;
			
			function deleteSuccess(value, responseHeaders)
			{
				index = $scope.alertFactory.addAlert('success', 'Item Deleted!');
				loadItems();				
			}
			
			function saveSuccess(value, responseHeaders)
			{
				index = $scope.alertFactory.addAlert('success', 'Item Saved!');
				loadItems();				
				
			}
			
			function saveFailed(httpResponse)
			{
				$scope.alertFactory.addAlert('danger', 'Error! Server responded with: '+httpResponse);
			}
			
			function loadItems(){
				$scope.items = itemFactory.query();
			}
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

