<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Category;

class CategoryController extends Controller
{

    public function showCreate(){
        return view('create_category');
    }

    public function createCategory(Request $request){

        $validator = $request->validate([
            'title' => ['required', 'string', 'max:280'],
            'description' => ['required', 'string', 'max:280'],
        ]);

        Category::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect('/categories');
    }

    public function showCategory(){

        $categories = Category::all();
        return view('categories',compact('categories'));
    }

    public function showUserCategory(){

        $categories = Category::all();
        return view('user_categories',compact('categories'));
    }

    public function edit(Request $request){
        $edits = Category::find($request->id);
        return view('edit_category', compact('edits') );
    }

    public function update(Request $request){

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
