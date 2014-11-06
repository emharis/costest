<?php

namespace App\Controllers;

use App\Models\Variablecost;
use App\Models\Employee;

class ProjectController extends \BaseController {

    public function getIndex() {
        
    }

    public function getOpen($id) {
        $project = \App\Models\Project::find($id);
        $vars = Variablecost::whereRaw('variable_cost.id not in (select variablecost_id from project_variable_cost as pvc where pvc.variablecost_id )')->get();
        $varSel=array();
        foreach ($vars as $var) {
            $varSel[$var->id] = $var->nama;
        }
        
        $emps = Employee::whereRaw('employee.id not in (select employee_id from project_employees as pe where pe.employee_id )')->get();
        $empSel=array();
        foreach ($emps as $emp) {
            $empSel[$emp->id] = $emp->nama;
        }
                
        return \View::make('project.index', array(
                    'project' => $project,
                    'varsel' => $varSel,
                    'empsel' => $empSel
        ));
    }

    public function postSave() {
        $project = \App\Models\Project::find(\Input::get('projectId'));
        $project->nama_project = \Input::get('nama_project');
        $project->nama_client = \Input::get('nama_client');
        $project->alamat = \Input::get('alamat');
        $project->cp = \Input::get('cp');
        $project->status = \Input::get('status');
        $project->margin = \Input::get('margin');
        $project->desc = \Input::get('desc');
        $project->save();

        return \Redirect::to('project/open/' . $project->id);
    }

    public function postAddvariablecost() {
        $variableId = \Input::get('variableId');
        $cost = \Input::get('cost');
        $projectId = \Input::get('projectId');
        $id = \DB::table('project_variable_cost')->insertGetId(array(
            'project_id' => $projectId,
            'variablecost_id' => $variableId,
            'cost' => $cost,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));
        return $id;
    }
    
    public function postRemovevariablecost(){
        $variableId = \Input::get('variableId');
        $projectId = \Input::get('projectId');
        $project = \App\Models\Project::find($projectId);
        $project->variablecosts()->detach(array($variableId));
        return $project->toJson();
    }
    
    public function postUpdatevariablecost(){
        $variableId = \Input::get('variableId');
        $projectId = \Input::get('projectId');
        $cost = \Input::get('cost');
        $project = \App\Models\Project::with('variablecosts')->whereId($projectId)->first();
        $project->variablecosts()->updateExistingPivot($variableId, array('cost'=>$cost));
        
        return $project->variablecosts()->sum('cost');
    }
    
    public function postAddemployee(){
        $employeeId = \Input::get('employeeId');
        $costpermonth = \Input::get('costpermonth');
        $projectId = \Input::get('projectId');
        //get project object from db
        $project = \App\Models\Project::find($projectId);
        //attach new employee
        $project->employees()->attach($employeeId,array('cost_per_month'=>$costpermonth));
        
        return Employee::find($employeeId);
    }
    
    public function postDeleteemployee(){
        $employeeId = \Input::get('employeeId');
        $projectId = \Input::get('projectId');
        //get project object from db
        $project = \App\Models\Project::find($projectId);
        //delete employee
        $project->employees()->detach(array($employeeId));
        return $project->toJson();
    }
    
    public function postUpdateemployee(){
        $employeeId = \Input::get('employeeid');
        $projectId = \Input::get('projectid');
        $costpermonth = \Input::get('cost');
        $project = \App\Models\Project::with('employees')->whereId($projectId)->first();
        $project->employees()->updateExistingPivot($employeeId, array('cost_per_month'=>$costpermonth));
        return $project->toJson();
    }
    
    public function postAddmodul(){
        $modul = new \App\Models\Modul();
        $modul->nama = \Input::get('nama');
        $modul->desc = \Input::get('desc');
        $modul->project_id = \Input::get('projectid');
        $modul->save();
        
        return $modul->toJson();
    }
    
    public function postUpdatemodul(){
        $modul = \App\Models\Modul::find(\Input::get('modulid'));
        $modul->nama = \Input::get('nama');
        $modul->desc = \Input::get('desc');
        $modul->save();
        
        return $modul->toJson();
    }
    
    public function postDeletemodul(){
        $modul = \App\Models\Modul::find(\Input::get('modulid'));
        $modul->delete();
        
        return $modul->toJson();
    }

}
