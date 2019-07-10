<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $fillable = ['diskon', 'tgl_mulai', 'tgl_selesai', 'paket_id'];

    public function paket()
    {
        return $this->belongsTo('App\Paket', 'paket_id');
    }
}
