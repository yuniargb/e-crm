<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKomplain extends Model
{
    protected $fillable = ['sender', 'read', 'pesan', 'komplain_id'];

    public function keluhan()
    {
        return $this->belongsTo('App\Keluhan', 'komplain_id');
    }
}
