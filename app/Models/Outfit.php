<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outfit extends Model
{
    //
    protected $fillable = ['name', 'min_temp', 'max_temp', 'type', 'advice'];
}
