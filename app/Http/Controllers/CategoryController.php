<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Category;
use \App\Lesson;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    public function showCreate(){
        return view('create_category');
    }

    public function createCategory(CategoryRequest $request){

        Category::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect('/categories');
    }

    public function showCategory(){
        $categories = Category::paginate(10);
        return view('categories',compact('categories'));
    }

    public function showUserCategory(Request $request){
        if($request->id == 1){
            $categories = Category::all();
            $number = $request->id;
            return view('user_categories',compact('categories','number'));
        }elseif($request->id == 2){
            $cate = Lesson::where('user_id',Auth::user()->id)->get();
            $categories = $cate->groupBy('category_id');
            $number = $request->id;
            return view('user_categories',compact('categories','number'));
        }else{
            $cate = Lesson::where('user_id',Auth::user()->id)->get();
            $categories = $cate->groupBy('category_id');
            $number = $request->id;
            $others = Category::all();
            return view('user_categories',compact('categories','number','others'));
        }
    }

    public function edit(Request $request){
        $edits = Category::find($request->id);
        return view('edit_category', compact('edits') );
    }

    public function update(CategoryRequest $request){

        $update = Category::find($request->id);
        $update->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect('/categories');
    }

    public function delete(Request $request){
        Category::destroy($request->id);
        return redirect('/categories');
    }

}
