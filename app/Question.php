<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
     protected $table = 'questions';

    public function topic()
    {
        return $this->belongTo
        ('\App\User_Topic','topic_id','topic_id');  // topic_id (foreign key in question) and third one is the key i will compare with (topic_id in users_topics table)
    }

}
