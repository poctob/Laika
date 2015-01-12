<?php

class TimeOffStatusController extends \DBObjectController {

	
protected function getObjectName(){
		return 'TimeOffStatus';
	}
	
	protected function saveJSON($object)
	{
		$object->name = Input::get('name');
			
		$object->save();
	}


}
