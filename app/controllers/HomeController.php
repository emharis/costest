<?php

namespace App\Controllers;

class HomeController extends \BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex(){
		$projects = \App\Models\Project::all();
		return \View::make('home.index',array(
			'projects' => $projects
		));
	}
	
	public function getNewproject(){
		return \View::make('home.new');
	}
	
	public function postNewproject(){
		$project = new \App\Models\Project();
		$project->nama_project = \Input::get('nama');
		$project->icon_str = \Input::get('icon_str');
		$project->save();
		
		return \Redirect::to('home');
	}

}
