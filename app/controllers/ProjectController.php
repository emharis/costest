<?php

namespace App\Controllers;

use App\Models\Variablecost;
use App\Models\Employee;

class ProjectController extends \BaseController {

    public function getIndex() {
        
    }

    public function getOpen($id) {
        $project = \App\Models\Project::find($id);
        $vars = Variablecost::whereRaw('variable_cost.id not in (select variablecost_id from project_variable_cost as pvc where pvc.project_id = ' . $id . ')')->get();
        $varSel = array();
        foreach ($vars as $var) {
            $varSel[$var->id] = $var->nama;
        }

        $emps = Employee::whereRaw('employee.id not in (select employee_id from project_employees as pe where  pe.project_id = ' . $id . ')')->get();
        $empSel = array();
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
        $project->margin_2 = \Input::get('margin_2');
        $project->desc = \Input::get('desc');
        $project->hour_per_month = \Input::get('hour_per_month');
        $project->pph = \Input::get('pph');
        $project->ppn = \Input::get('ppn');
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

    public function postRemovevariablecost() {
        $variableId = \Input::get('variableId');
        $projectId = \Input::get('projectId');
        $project = \App\Models\Project::find($projectId);
        $project->variablecosts()->detach(array($variableId));
        return $project->toJson();
    }

    public function postUpdatevariablecost() {
        $variableId = \Input::get('variableId');
        $projectId = \Input::get('projectId');
        $cost = \Input::get('cost');
        $project = \App\Models\Project::with('variablecosts')->whereId($projectId)->first();
        $project->variablecosts()->updateExistingPivot($variableId, array('cost' => $cost));

        return $project->variablecosts()->sum('cost');
    }

    public function postAddemployee() {
        $employeeId = \Input::get('employeeId');
        $costpermonth = \Input::get('costpermonth');
        $projectId = \Input::get('projectId');
        //get project object from db
        $project = \App\Models\Project::find($projectId);
        //attach new employee
        $project->employees()->attach($employeeId, array('cost_per_month' => $costpermonth));

        return Employee::find($employeeId);
    }

    public function postDeleteemployee() {
        $employeeId = \Input::get('employeeId');
        $projectId = \Input::get('projectId');
        //get project object from db
        $project = \App\Models\Project::find($projectId);
        //delete employee
        $project->employees()->detach(array($employeeId));
        return $project->toJson();
    }

    public function postUpdateemployee() {
        $employeeId = \Input::get('employeeid');
        $projectId = \Input::get('projectid');
        $costpermonth = \Input::get('cost');
        $project = \App\Models\Project::with('employees')->whereId($projectId)->first();
        $project->employees()->updateExistingPivot($employeeId, array('cost_per_month' => $costpermonth));
        return $project->toJson();
    }

    public function postAddmodul() {
        $modul = new \App\Models\Modul();
        $modul->nama = \Input::get('nama');
        $modul->desc = \Input::get('desc');
        $modul->project_id = \Input::get('projectid');
        $modul->save();

        return $modul->toJson();
    }

    public function postUpdatemodul() {
        $modul = \App\Models\Modul::find(\Input::get('modulid'));
        $modul->nama = \Input::get('nama');
        $modul->desc = \Input::get('desc');
        $modul->save();

        return $modul->toJson();
    }

    public function postDeletemodul() {
        $modul = \App\Models\Modul::find(\Input::get('modulid'));
        $modul->delete();

        return $modul->toJson();
    }

    public function getModuls($id) {
        return \App\Models\Modul::where('project_id', $id)->get()->toJson();
    }

    public function getFiturs($modulId, $projectId = 0) {
        if ($modulId == -1) {
            return \App\Models\Fitur::whereIn('modul_id', \App\Models\Modul::select(array('id'))->where('project_id',$projectId)->get()->toArray())->get()->toJson();
        } else {
            return \App\Models\Fitur::where('modul_id', $modulId)->get()->toJson();
        }
    }

    public function postAddfitur() {
//        $modul = \App\Models\Modul::find(\input::get('modulid'));
        $fitur = new \App\Models\Fitur();
        $fitur->modul_id = \Input::get('modulid');
        $fitur->nama = \Input::get('nama');
        $fitur->bobot = \Input::get('bobot');
        $fitur->save();

        return $fitur->toJson();
    }

    public function postUpdatefitur() {
        $fitur = \App\Models\Fitur::find(\Input::get('fiturid'));
        $fitur->nama = \Input::get('nama');
        $fitur->bobot = \Input::get('bobot');
        $fitur->save();

        return $fitur->toJson();
    }

    public function postDeletefitur() {
        $fitur = \App\Models\Fitur::find(\Input::get('fiturid'));
        $fitur->delete();

        return $fitur->toJson();
    }

    public function getCostest($projectId) {
        $project = \App\Models\Project::find($projectId);

        return \View::make('project.costest', array(
                    'project' => $project
        ));
    }

}
