<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKomplain extends Model
{
    protected $fillable = ['sender', 'read', 'pesan', 'keluhan_id'];

    public function keluhan()
    {
        return $this->belongsTo('App\Keluhan', 'keluhan_id');
    }
}
