<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $hidden = ['created_at','updated_at'];

    public function bank()
    {
        return $this->hasOne('App\Models\Bank','user_id');
    }
}
