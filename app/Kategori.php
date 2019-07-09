<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['nama_kategori'];

    public function paket()
    {
        return $this->hasMany('App\Paket', 'kategori');
    }
}
