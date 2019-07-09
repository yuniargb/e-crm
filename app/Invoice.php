<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $primaryKey   = 'id';
    public $incrementing   = false;
    protected $fillable     = ['id', 'tgl_inv', 'total_hrg', 'user_id'];

    public function testimoni()
    {
        return $this->hasOne('App\Testimoni', 'invoice_id');
    }
    public function pelanggan()
    {
        return $this->belongsTo('App\Pelanggan', 'id');
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
