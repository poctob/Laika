/**
 * 
 */

var app = angular.module('configurationApp', [ 'ui.bootstrap.modal', 'ngRoute',
		'configServices', 'configurationControllers', 'panelControllers' ]);

app.directive('ngConfirmClick', [ function() {
	return {
		link : function(scope, element, attr) {
			var msg = attr.ngConfirmClick || "Are you sure?";
			var clickAction = attr.confirmedClick;
			element.bind('click', function(event) {
				if (window.confirm(msg)) {
					scope.$eval(clickAction)
				}
			});
		}
	};
} ]);
