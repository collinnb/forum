<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'topic_title','topic_text','theme_id','user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function theme(){
        return $this->belongsTo('App\Theme');
    }
    public function replies(){
        return $this->hasMany('App\Reply');
    }
}
