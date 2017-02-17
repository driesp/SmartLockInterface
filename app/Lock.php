<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lock extends Model
{
  protected $fillable = [
      'room', 'password', 'address',
  ];
  public function users()
  {
    return $this->belongsToMany('App\User')->withTimestamps();
  }
}
