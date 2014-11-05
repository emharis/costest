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
class Variablecost extends \Eloquent{
    
    protected $table = 'variable_cost';
    
    public function projects(){
         return $this->belongsToMany('App\Models\Project', 'project_variable_cost', 'project_id', 'variablecost_id')
                        ->withPivot(array('cost'))
                        ->withTimestamps();
    }
    
}
