<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $fillable = ['nama_paket', 'harga', 'gambar', 'kategori'];

    public function fasilitas()
    {
        return $this->hasMany('App\Fasilitas', 'paket_id');
    }

    public function promo()
    {
        return $this->hasMany('App\Promo', 'paket_id');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'id');
    }
}
