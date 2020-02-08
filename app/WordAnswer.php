<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WordAnswer extends Model
{
    protected $guarded = [];
    
    protected $fillable = [
        'word_id','text','is_correct'
    ];

    public function word()
    {
        return $this->belongsTo('App\Word');
    }
}
