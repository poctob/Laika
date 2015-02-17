<?php
use App\Util\DateTimeUtil;
class ConfigurationController extends \DBObjectController {

	protected function getObjectName(){
		return 'Configuration';
	}
	
	protected function saveJSON($object)
	{
		$object->configID = Input::get('configID');
		$object->configValue = Input::get('configValue');
		$object->save();
	}
	
	protected function getTimeIntervals()
	{
		$object = $this->getObjectName();
		$items = $object::all();
	}
	
}
