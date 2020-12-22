<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $hidden = ['created_at','updated_at','user_id','id'];
}
