<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ["user_id","phoneNumber", "description", "amount", "image"];
    public function contribution(){
        return $this->hasMany('App\Contributor', 'memeber_id', 'id');
    }
}
