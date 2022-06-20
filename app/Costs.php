<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costs extends Model
{
    protected $fillable = [
        'name', 'total', 
    ];
}
