<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
  protected $fillable = [
      'name','grounds_id', 'x1x','x1y','x2x','x2y','x3x','x3y','x4x','x4y',
  ];

  public function ground()
  {
    return $this->belongsTo('App\Ground');
  }

  public function floors()
  {
    return $this->hasMany('App\Floor');
  }
}
