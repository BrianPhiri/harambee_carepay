<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function contribution(){
        return $this->hasMany(Contribution, 'patient_id')
    }
}
