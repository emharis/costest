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
class Modul extends \Eloquent{
    
    protected $table = 'modul';
    
    public function project(){
         return $this->belongsTo('App\Models\Project');
    }
    
    public function fiturs(){
        return $this->hasMany('App\Models\Fitur');
    }
    
}
