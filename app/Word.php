<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $guarded = [];
    
    protected $fillable = [
        'category_id','text'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function word_answers()
    {
        return $this->hasMany('App\WordAnswer');
    }

    public function answer()
    {
        return $this->word_answers->where("is_correct", 1)->first();
    }

}
