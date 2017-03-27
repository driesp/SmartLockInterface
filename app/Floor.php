<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
  protected $fillable = [
      'name','filename',
  ];

  public function Building()
  {
    return $this->belongsTo('App\Building');
  }

  public function Locks()
  {
    return $this->hasMany('App\Lock');
  }
}
