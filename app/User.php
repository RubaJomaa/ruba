<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userTopics()
    {
      return $this->hasMany('App\User_topic')
                  ->join('topics', 'topics.id', '=', 'users_topics.topic_id')
                  ->select('topics.id', 'topics.topic_name');
    }

}
