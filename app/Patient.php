<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ["user_id","phoneNumber", "description", "amount", "image"];
    public function contribution(){
        return $this->hasMany(Contribution, 'patient_id');
    }
}
