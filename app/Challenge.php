<?php

namespace App;
use App\Media;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    public function media(){
        return $this->hasMany(Media::class);
    }

    public function users(){
        return $this->belongsToMany('App\User', 'user_challenge', 'challenge_id', 'user_id');
    }

    public function hashtags(){
        return $this->belongsToMany('App\HashTag', 'hashtags_challenges', 'challenge_id', 'hashtag_id');
    }
}
