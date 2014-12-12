<?php

class ConfigurationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$items = Configuration::all();
		return View::make('configuration', array('items' => $items));
	}
	
	public function getJSON()
	{
		$items = Configuration::all();
		return $items;
	}
	
	public function getJSONById($id)
	{
		$item = Configuration::find($id);
		return $item;
	}
	

	public function createJSON()
	{
		$item = new Configuration();
		$this->saveJSON($item);
		
		$items = Configuration::all();
		
		return Response::json(array(
				'error' => false),
				200
		);
	}
	
	public function updateJSON()
	{
		$item = $this->getJSONById(Input::get('id'));
		$this->saveJSON($item);
	
		return Response::json(array(
				'error' => false),
				200
		);
	}
	
	private function saveJSON($item)
	{
		$item->configID = Input::get('configID');
		$item->configValue = Input::get('configValue');
		$item->save();
	}

	public function deleteJSON()
	{
		
		$item = $this->getJSONById(Input::get('id'));
		
		if(isset($item))
		{
			$item->delete();
			
			return Response::json(array(
					'error' => false),
					200
			);
		}
		else
		{
			return Response::json(array(
					'error' => true,
					'message' => 'Empty or invalid item Id!'
			),
					500
			);
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	
	public function missingMethod($parameters = array())
	{
		print_r($parameters);
	}


}
