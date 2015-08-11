<?php

class InstallController extends BaseController
{
	public function installDatabase()
	{
		echo 'Creating Schema!';
		$dbman = new DBManager();
		$dbman->createSchema();
		echo 'Schema created!';
	}	
}