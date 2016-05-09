<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  public function question()
  {
    
    return $this->belongsTo('App\Question');
  }

    protected $table = 'groups';
}
