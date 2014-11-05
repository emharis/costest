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
class Project extends \Eloquent{
    
    protected $table = 'project';
    
    public function variablecosts(){
         return $this->belongsToMany('App\Models\Variablecost', 'project_variable_cost', 'project_id', 'variablecost_id')
                        ->withPivot(array('cost'))
                        ->withTimestamps();
    }
    
    public function employees(){
         return $this->belongsToMany('App\Models\Employee', 'project_employees', 'project_id', 'employee_id')
                        ->withPivot(array('cost_per_month','cost_per_hour'))
                        ->withTimestamps();
    }
    
    public function moduls(){
        return $this->hasMany('App\Models\Modul');
    }
    
}
