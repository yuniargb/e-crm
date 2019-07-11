<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $primaryKey   = 'id';
    protected $keyType      = 'string';
    protected $fillable     = ['id', 'tgl_inv', 'total_hrg', 'pelanggan_id'];
    public $incrementing    = false;

    public function testimoni()
    {
        return $this->hasOne('App\Testimoni', 'invoice_id');
    }
    public function pelanggan()
    {
        return $this->belongsTo('App\Pelanggan', 'pelanggan_id');
    }
    public function peserta()
    {
        return $this->hasMany('App\Peserta', 'invoice_id');
    }
    public function paket()
    {
        return $this->hasManyThrough('App\Peserta', 'App\Paket');
    }
}
