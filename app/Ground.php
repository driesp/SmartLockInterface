<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ground extends Model
{
  protected $fillable = [
      'name','filename',
  ];

  public function buildings()
  {
    return $this->hasMany('App\Building');
  }
}
