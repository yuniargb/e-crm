<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $fillable = ['nama_fasilitas', 'paket_id'];

    public function paket(){
        return $this->belongsTo('App\Paket','id');
    }
}
