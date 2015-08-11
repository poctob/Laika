<?php

class PositionController extends \DBObjectController {

	
protected function getObjectName(){
		return 'Position';
	}
	
	protected function saveJSON($object)
	{
		$object->comment = Input::get('comment');
		$object->name = Input::get('name');
			
		$object->save();
	}


}
