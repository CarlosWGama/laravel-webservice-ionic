<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //

    protected $fillable = ['email', 'senha'];

    protected $hidden = ['senha'];
}
