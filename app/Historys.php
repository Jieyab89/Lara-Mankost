<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historys extends Model
{
  protected $fillable = [
      'name_bank', 'total',
  ];
}
