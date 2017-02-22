<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lock extends Model
{
  protected $fillable = [
      'room', 'password', 'address','x1x','x1y','x2x','x2y','x3x','x3y','x4x','x4y','active',
  ];
  public function Floor()
  {
    return $this->belongsTo('App\Floor');
  }
  public function users()
  {
    return $this->belongsToMany('App\User')->withTimestamps();
  }

}
