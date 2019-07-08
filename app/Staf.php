<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staf extends Model
{
    protected $fillable = ['nama_staf', 'username','password','avatar'];

    public function keluhan(){
        return $this->hasMany('App\Komplain','staf_id');
    }
}
