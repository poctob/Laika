<?php
namespace App\Http\Controllers\Laika;

use App\Util\DateTimeUtil;
use Illuminate\Http\Request;


class ConfigurationController extends DBObjectController {

	protected function getObjectName(){
		return 'Models\Laika\Configuration';
	}
	
	protected function saveJSON(Request $request, $object)
	{
		$object->configID = $request->input('configID');
		$object->configValue = $request->input('configValue');
		$object->save();
	}
	
	protected function getTimeIntervals()
	{
		$object = $this->getObjectName();
		$items = $object::all();
	}
	
}
