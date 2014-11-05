<?php

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

Route::get('/',
	function()
	{
		return Redirect::to('home');
	});

Route::controller('home','App\Controllers\HomeController');
Route::controller('project','App\Controllers\ProjectController');

Route::group(array('prefix'=> 'master'),
	function()
	{
		Route::controller('variable','App\Controllers\VariableController');		
		Route::controller('employee','App\Controllers\EmployeeController');		
	}
);
