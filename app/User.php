<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    protected $fillable = [
        'name', 'email', 'password','status','image',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }

    public function lesson_words()
    {
        return $this->hasManyThrough('App\LessonWord', 'App\Lesson','user_id','lesson_id');
    } 

     public function followers()
     {
         return $this->belongsToMany('App\User', 'relations' , 'follower_id','user_id');
     }
 
     public function following()
     {
         return $this->belongsToMany('App\User', 'relations' ,'user_id', 'follower_id');
     }
      
     public function is_following($id)
     {
         if ($this->following()->where('follower_id', $id)->count() > 0) {
             return true;
         } else {
             return false;
         }
     }

     public function activities()
     {
         return $this->hasMany('App\Activity')->latest();
     }
}
