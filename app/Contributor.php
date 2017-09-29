<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{
    protected $fillable = ["phoneNumber", "amount", "patient_id"];
    public function patient(){
        return $this->belongsTo('Patient', 'patient_id');
    }
}
