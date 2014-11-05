<?php

namespace App\Controllers;

use App\Models\Variablecost;

class VariableController extends \BaseController {

	public function getIndex(){
		$vars = \App\Models\Variablecost::all();
		return \View::make('master.variable.index',array(
			'vars' => $vars
		));
	}
	
	public function getNew(){
		return \View::make('master.variable.new');
	}
	
	public function postNew(){
		$var = new Variablecost();
		$var->nama = \Input::get('nama');
		$var->save();
		
		return \Redirect::to('master/variable');
	}
	
	public function getEdit($id){
		return \View::make('master.variable.edit',array(
			'var' => Variablecost::find($id)
		));
	}
	
	public function postEdit(){
		$var = Variablecost::find(\Input::get('variableId'));
		$var->nama = \Input::get('nama');
		$var->save();
		
		return \Redirect::to('master/variable');
	}
	

}
