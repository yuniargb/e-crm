<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komplain extends Model
{
    protected $fillable = ['staf_id', 'solved'];

    public function staf(){
        return $this->belongsTo('App\Staf','id');
    }

    public function detail_komplain(){
        return $this->hasMany('App\DetailKomplain','komplain_id');
    }
}
