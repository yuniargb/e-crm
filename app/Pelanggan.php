<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = ['nama_pelanggan', 'no_telp', 'email'];

    public function invoice()
    {
        return $this->hasMany('App\Invoice', 'pelanggan_id');
    }
}
