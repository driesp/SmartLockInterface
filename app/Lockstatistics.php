<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lockstatistics extends Model
{
  protected $fillable = [
      'accessed', 'date',
  ];
}
