<?php

namespace App\Http\Controllers\Laika;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


abstract class DBObjectController extends Controller {

	abstract protected function getObjectName();
	abstract protected function saveJSON(Request $request, $object);
	
	public function getJSON()
	{
		$object = $this->getObjectName();
		$items = $object::all();
		return $items;
	}
	
	public function getJSONById($id)
	{
		$object = $this->getObjectName();
		$item = $object::find($id);
		return $item;
	}
	

	public function createJSON(Request $request)
	{
		$object = $this->getObjectName();
		$item = new $object();
		$this->saveJSON($request, $item);
		
		$items = $object::all();
		
		return response()->json([
				'error' => false,
				'data' => $items->toArray()]);
	}
	
	public function updateJSON(Request $request)
	{		
		$item = $this->getJSONById($request->input('id'));
		$this->saveJSON($request, $item);
	
		return response()->json([
				'error' => false,
				'data' => $items->toArray()]);
	}

	public function deleteJSON(Request $request)
	{
		
		$item = $this->getJSONById($request->input('id'));
		
		if(isset($item))
		{
			$item->delete();
			
			return response()->json([
					'error' => false,
                                        'data' => $item->toArray()]);
		}
		else
		{
			return response()->json([
					'error' => true,
					'message' => 'Empty or invalid item Id!',
                                        'id' => $request->input('id')
			]);
		}
	}


}
