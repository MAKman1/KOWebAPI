<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HashTag extends Model
{
    public function challenges(){
        return $this->belongsToMany('App\Challenge', 'hashtags_challenges', 'hashtag_id', 'challenge_id');
    }
}
