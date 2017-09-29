<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{
    public function patient(){
        return $this->belongsTo('Patient', 'patient_id');
    }
}
