<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staf extends Authenticatable
{
    use Notifiable;

    protected $guard = 'staf';

    protected $fillable = ['nama_staf', 'username', 'avatar'];

    protected $hidden = ['password'];

    public function keluhan()
    {
        return $this->hasMany('App\Komplain', 'staf_id');
    }
}
