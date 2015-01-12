<?php

class PrivilegeController extends \DBObjectController {

	
protected function getObjectName(){
		return 'Privilege';
	}
	
	protected function saveJSON($object)
	{
		$object->name = Input::get('name');
			
		$object->save();
	}


}
