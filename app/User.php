<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function themes(){
        return $this->hasMany('App\Theme');
    }

    public function topics(){
        return $this->hasMany('App\Topic');
    }

    public function replies(){
        return $this->hasMany('App\Reply');
    }
    public function IsAdmin()
    {
        return (Auth::user()->role_id == 2);
    }
    public function IsUser()
    {
        return (Auth::user()->role_id == 1);
    }
}
