<?php


Blade::setContentTags('[[', ']]'); // for variables and all things Blade
Blade::setEscapedContentTags('[[[', ']]]'); // for escaped data

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/bacon', function()
{
	return 'Bacon High!';
}
);

Route::get('install', 'InstallController@installDatabase');

Route::get('configuration/getJSON','ConfigurationController@getJSON');
Route::get('configuration/getJSON/{id}','ConfigurationController@getJSONById');
Route::post('configuration/getJSON','ConfigurationController@createJSON');
Route::put('configuration/getJSON','ConfigurationController@updateJSON');
Route::delete('configuration/getJSON','ConfigurationController@deleteJSON');
Route::resource('configuration', 'ConfigurationController');

