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



Route::get('install', 'InstallController@installDatabase');

Route::get('configuration/getJSON','ConfigurationController@getJSON');
Route::get('configuration/getJSON/{id}','ConfigurationController@getJSONById');
Route::post('configuration/getJSON','ConfigurationController@createJSON');
Route::put('configuration/getJSON','ConfigurationController@updateJSON');
Route::delete('configuration/getJSON','ConfigurationController@deleteJSON');


Route::get('employee/getJSON','EmployeeController@getJSON');
Route::get('employee/getJSON/{id}','EmployeeController@getJSONById');
Route::post('employee/getJSON','EmployeeController@createJSON');
Route::put('employee/getJSON','EmployeeController@updateJSON');
Route::delete('employee/getJSON','EmployeeController@deleteJSON');

Route::get('position/getJSON','PositionController@getJSON');
Route::get('position/getJSON/{id}','PositionController@getJSONById');
Route::post('position/getJSON','PositionController@createJSON');
Route::put('position/getJSON','PositionController@updateJSON');
Route::delete('position/getJSON','PositionController@deleteJSON');

Route::get('privilege/getJSON','PrivilegeController@getJSON');
Route::get('privilege/getJSON/{id}','PrivilegeController@getJSONById');
Route::post('privilege/getJSON','PrivilegeController@createJSON');
Route::put('privilege/getJSON','PrivilegeController@updateJSON');
Route::delete('privilege/getJSON','PrivilegeController@deleteJSON');

Route::get('time_off_status/getJSON','TimeOffStatusController@getJSON');
Route::get('time_off_status/getJSON/{id}','TimeOffStatusController@getJSONById');
Route::post('time_off_status/getJSON','TimeOffStatusController@createJSON');
Route::put('time_off_status/getJSON','TimeOffStatusController@updateJSON');
Route::delete('time_off_status/getJSON','TimeOffStatusController@deleteJSON');


