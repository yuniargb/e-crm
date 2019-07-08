<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $fillable = ['invoice_id', 'isi_testimoni','rating','publish'];

    public function invoice(){
        return $this->belongsTo('App\Invoice','id');
    }
}
