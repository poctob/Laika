<html class="ng-scope" lang="en" ng-app="configurationApp">
<head>
<title>Configuration Data</title>
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="bower_components/angular/angular.js"></script>
<script src="bower_components/angular-route/angular-route.js"></script>
<script src="bower_components/angular-resource/angular-resource.js"></script>
<script src="bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>
<script src="js/angular-ui-bootstrap-modal.js"></script>
<script src="js/app.js"></script>
<script src="js/controllers.js"></script>
<script src="js/services.js"></script>
. [[ HTML::style('css/bootstrap.css') ]]

</head>
<body>

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-10">
			
			<div ng-controller="GeneralCtrl">
  				<alert ng-repeat="alert in alertFactory.alerts" type="{{alert.type}}" close="alertFactory.closeAlert($index)">{{alert.msg}}</alert>  				
			</div>
			
			<div class="page-header">
				<h2>System Configuration</h2>		
			</div>
			<secion ng-controller="MainPanelCtrl as panel">
			<ul class="nav nav-pills">
				<li ng-class="{ active:panel.isSelected(1) }"><a href
					ng-click="panel.selectTab(1)">General</a></li>
				<li ng-class="{ active:panel.isSelected(2) }"><a href
					ng-click="panel.selectTab(2)">Employees</a></li>
				<li ng-class="{ active:panel.isSelected(3) }"><a href
					ng-click="panel.selectTab(3)">Positions</a></li>
				<li ng-class="{ active:panel.isSelected(4) }"><a href
					ng-click="panel.selectTab(4)">Privileges</a></li>
				<li ng-class="{ active:panel.isSelected(5) }"><a href
					ng-click="panel.selectTab(5)">Time Off Status</a></li>
			</ul>
			@include('general_form') </secion>
		</div>
	</div>




</body>
</html>
