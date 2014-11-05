<?php

namespace App\Controllers;

use App\Models\Variablecost;

class ProjectController extends \BaseController {

	public function getIndex(){
		
	}
	
	public function getOpen($id){
		$project = \App\Models\Project::find($id);
		$vars = Variablecost::whereRaw('variable_cost.id not in (select variablecost_id from project_variable_cost as pvc where pvc.variablecost_id )')->get();
		foreach($vars as $var){
			$varSel[$var->id] = $var->nama;
		}
		$myvars = \DB::table('project_variable_cost')->where('project_id',$id)->get();
		return \View::make('project.index',array(
			'project' => $project,
			'varsel' =>$varSel,
			'vars'=>$myvars
		));
	}
	
	public function postSave(){
		$project = \App\Models\Project::find(\Input::get('projectId'));
		$project->nama_project = \Input::get('nama_project');
		$project->nama_client = \Input::get('nama_client');
		$project->alamat = \Input::get('alamat');
		$project->cp = \Input::get('cp');
		$project->status = \Input::get('status');
		$project->margin = \Input::get('margin');
		$project->desc = \Input::get('desc');
		$project->save();
		
		return \Redirect::to('project/open/'.$project->id);
	}
	
	public function postAddvariablecost(){
		$variableId = \Input::get('variableId');
		$cost = \Input::get('cost');
		$id = \DB::tableGetId('project_variable_cost')->insert(array(
			'variablecost_id' =>$variableId,
			'cost' => $cost
		));
		return $id;
	}
	

}
