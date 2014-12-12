<div class="panel" ng-show="panel.isSelected(1)" ng-controller="GeneralCtrl">
	<hr />
	<div>
		<button type="button" class="btn btn-success" ng-click="open()">
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New
		</button>

		<div class="modal fade" id="generalFormModal" modal="myModal" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel" aria-hidden="true" close="cancel()">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" ng-click="cancel()">
							<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">{{dialogTitle}}</h4>
					</div>
					<div class="modal-body">
						<form role="form" ng-submit="saveItem()">
							<div class="form-group">
								<label for="configID"></label> <input class="form-control"
									id="configID" placeholder="Configuration Item ID" ng-model="item.configID">
							</div>
							<div class="form-group">
								<label for="configValue"></label> <input class="form-control"
									id="configValue" placeholder="Configuration Item Value" ng-model="item.configValue">
							</div>
					
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" ng-click="cancel()">Close</button>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
					</form>
				</div>
			</div>
		</div>


	</div>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Config ID</th>
				<th>Config Value</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody ng-repeat="item in items">

			<tr>
				<td>{{item.configID}}</td>
				<td>{{item.configValue}}</td>		
				<td>
				
				<button type="button" class="btn btn-info" ng-click="open(item)">
				<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit
				</button>
				
				<button type="button" class="btn btn-danger" confirmed-click="deleteItem(item)" 
    				ng-confirm-click="Are you sure you want to delete this item?">
				<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete
				</button>
				
				</td>		
			</tr>			

		</tbody>

	</table>

</div>

