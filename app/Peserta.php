<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $fillable = ['invoice_id', 'paket_id', 'no_dokumen', 'nama_peserta', 'tgl_berangkat'];

    public function invoice()
    {
        return $this->belongsToMany('App\Invoice', 'invoice_id');
    }

    public function paket()
    {
        return $this->belongsToMany('App\Paket', 'paket_id');
    }
}
