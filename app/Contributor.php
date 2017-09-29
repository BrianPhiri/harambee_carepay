<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{
    protected $fillable = ["phoneNumber", "amount", "member_id"];
    public function memeber(){
        return $this->belongsTo('App\Member', 'memeber_id');
    }
}
