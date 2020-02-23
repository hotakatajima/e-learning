<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Lesson;
use \App\LessonWord;
use \App\Word;
use \App\WordAnswer;
use \App\Category;
use \App\Activity;

class LessonController extends Controller
{
    public function createLesson(Request $request){

        $lesson = Lesson::create([
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id
        ]);

        Activity::create([
            'user_id' => Auth::user()->id,
            'activityable_id' =>  $lesson->id,
            'activityable_type' => 'App\Lesson',
        ]);

        $word = Word::where('category_id', $request->category_id )->first();
        
        return redirect('/lesson/'.$lesson->id.'/category/'.$request->category_id.'?id=1');
    }

    public function allWordsAnswers(Request $request){
        
        $lesson_id = $request->lesson_id;
        $category_id = $request->category_id;

        $categories = Category::find($category_id);

        return view('lesson_word',compact('lesson_id','category_id','categories'));
    }


    public function createLeassonWord(Request $request){

        LessonWord::create([
            'lesson_id' => $request->lesson_id,
            'word_id' => $request->word_id,
            'word_answer' => $request->word_answer,
        ]);

        $ints = $request->number;
        $int = $ints + 1;

        return redirect('/lesson/'.$request->lesson_id.'/category/'.$request->category_id.'?id='.$int);
    }

    public function createLeassonWords(Request $request){

        LessonWord::create([
            'lesson_id' => $request->lesson_id,
            'word_id' => $request->word_id,
            'word_answer' => $request->word_answer,
        ]);

        $word_count = $request->word_count;

        return redirect('/lesson/'.$request->lesson_id.'/finish/'.$word_count);
    }

    public function showResult(Request $request){

        $word_count = $request->word_count;

        $lesson_results = LessonWord::where('lesson_id', $request->lesson_id)->limit($word_count)->get();

        return view('lesson_result',compact('lesson_results','word_count'));
    }

    public function showResults(Request $request){

        $word_count = $request->word_count;

        $lesson_results = LessonWord::where('lesson_id', $request->lesson_id)->limit($word_count)->get();

        return view('lesson_result_one',compact('lesson_results','word_count'));
    }

    public function showResultAll(Request $request){

        $all_results = Lesson::where('user_id', $request->id )->get();

        return view('all_learned',compact('all_results'));
    }

    public function showResultAllLesson(Request $request){

        $all_results = Lesson::where('user_id',$request->id)->get();
        return view('all_learned_lesson',compact('all_results'));
    }

}
