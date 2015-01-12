<?php

class EmployeeController extends \DBObjectController {

	
protected function getObjectName(){
		return 'Employee';
	}
	
	protected function saveJSON($object)
	{
		$active = Input::get('active');
		$object->active = isset($active)?$active:0;
		$object->address = Input::get('address');
		$object->comment = Input::get('comment');
		$object->email = Input::get('email');
		$object->name = Input::get('name');
		$object->phone = Input::get('phone');			
		
		$object->save();
	}


}
