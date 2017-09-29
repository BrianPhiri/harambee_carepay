<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ["user_id","phoneNumber", "description", "amount", "image"];
    public function contribution(){
        return $this->hasMany('App\Contributor', 'member_id', 'id');
    }

    public function balance(){
        return $this->hasOne('App\amountView', 'id', 'id');
    }
}
