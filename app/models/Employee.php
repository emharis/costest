<?php

namespace App\Models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of takad
 *
 * @author Eries
 */
class Employee extends \Eloquent{
    
    protected $table = 'employee';
    
    public function projects(){
         return $this->belongsToMany('App\Models\Project', 'project_employees', 'employee_id', 'project_id')
                        ->withPivot(array('cost_per_month','cost_per_hour'))
                        ->withTimestamps();
    }
    
}
