<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $fillable = ['invoice_id', 'isi_testimoni', 'rating', 'publish'];

    public function invoice()
    {
        return $this->belongsTo('App\Invoice', 'invoice_id');
    }

    public function pelanggan()
    {
        return $this->hasOneThrough('App\Pelanggan', 'App\Invoice', 'pelanggan_id', 'id');
    }
}
