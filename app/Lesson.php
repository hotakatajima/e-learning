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

    public function connectCategory($id){
        Category::where('category_id',$id)->get();
        return back();
    }

    public function lesson_words()
    {
        return $this->hasMany('App\LessonWord');
    }

    public function activities()
    {
        return $this->morphMany('App\Activity', 'activityable');  
    }
}
