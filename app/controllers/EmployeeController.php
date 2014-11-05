<?php

namespace App\Controllers;

use App\Models\Employee;

class EmployeeController extends \BaseController {

	public function getIndex(){
		$emps = \App\Models\Employee::all();
		return \View::make('master.employee.index',array(
			'emps' => $emps
		));
	}
	
	public function getNew(){
		return \View::make('master.employee.new');
	}
	
	public function postNew(){
		$var = new Employee();
		$var->nama = \Input::get('nama');
		$var->save();
		
		return \Redirect::to('master/employee');
	}
	
	public function getEdit($id){
		return \View::make('master.employee.edit',array(
			'var' => Employee::find($id)
		));
	}
	
	public function postEdit(){
		$var = Employee::find(\Input::get('employeeId'));
		$var->nama = \Input::get('nama');
		$var->save();
		
		return \Redirect::to('master/employee');
	}
	

}
