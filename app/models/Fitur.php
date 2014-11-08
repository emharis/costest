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
class Fitur extends \Eloquent{
    
    protected $table = 'fitur';
    
    public function modul(){
         return $this->belongsTo('App\Models\Modul');
    }
    
}
