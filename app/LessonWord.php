<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonWord extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'lesson_id', 'word_id', 'word_answer'
    ];

    public function word()
    {
        return $this->belongsTo('App\Word');
    }
    
    public function word_answers()
    {
        return $this->belongsTo('App\WordAnswer', 'word_answer'); //デフォルトのkeyは 'word_answer_id' だが、'word_answer' にしてしまったため、第二引数で指定している
    }
    
}
