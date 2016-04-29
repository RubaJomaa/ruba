<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Topic extends Model
{
    //
     protected $table = 'users_topics';

    public function questions()
    {
        return $this->belongToMany('\App\Question','topic_id','topic_id');
        // topic_id (foreign key in question)
        //and third one is the key i will compare with (topic_id in users_topics table)
    }

}
