/**
 * 
 */

var app = angular.module('configurationApp', ['ui.bootstrap','ui.bootstrap.modal', 'ngRoute',
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

app.directive('parseInt', [function () {
    return {
        restrict: 'A',
        require: 'ngModel',
        link: function (scope, elem, attrs, controller) {
            controller.$formatters.push(function (modelValue) {
                console.log('model', modelValue, typeof modelValue);
                return '' + modelValue;
            });

            controller.$parsers.push(function (viewValue) {
                console.log('view', viewValue, typeof viewValue);
                return parseInt(viewValue,10);
            });
        }
    }
} ])
