<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'category_id', 'user_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function lesson_words()
    {
        return $this->hasMany('App\LessonWord');
    }
}
