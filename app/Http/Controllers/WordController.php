<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Word;
use \App\WordAnswer;
use App\Http\Requests\WordRequest;

class WordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function allWords(Request $request){
        $num = $request->id;
        $words = Word::where('category_id', $request->id )->get();
        return view('words',compact('num','words'));
    }

    public function showWord(Request $request){
        $num = $request->id;
        return view('create_words',compact('num'));
    }

    public function createWord(WordRequest $request){

        $word = Word::create([
            'category_id' => $request->id,
            'text' => $request->word
        ]);

        for($i=0;$i<=2;$i++){
            WordAnswer::create([
                'word_id' => $word->id,
                'text' => $request->choice[$i],
                'is_correct' => $request->correct == $i
            ]);
        }
        return back();
    }

    public function edit(Request $request){
        $edits = Word::find($request->word_id);
        return view('edit_word', compact('edits') );
    }

    public function update(WordRequest $request){

        $update = Word::find($request->word_id);
        $update->update([
            'category_id' => $request->category_id,
            'text' => $request->text
        ]);

        for($i=0;$i<=2;$i++){
            $updates = WordAnswer::find($request->{'word_answer_num_'.$i});
            $updates->update([
                'word_id' => $request->word_id,
                'text' => $request->$i,
                'is_correct' => $request->correct == $i
            ]);
        }

        return back();
    }

    public function delete(Request $request){
        Word::destroy($request->word_id);
        return back();
    }

}
