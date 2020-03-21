<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use \App\User;
use \App\Activity;
use Hash; // または use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allUsers()
    {
        $all = User::paginate(4);
        return view('member',compact('all'));
    }

    public function showUser(Request $request)
    {
        $show_one = User::find($request->id);
        return view('useredit', compact('show_one') );
    }

    public function showUsers($id)
    {
        $show_one = User::find($id);
        $activities = $show_one->orderlatest()->paginate(5);
        return view('userprofile', compact('show_one', 'activities') );
    }

    public function updateUser(UserRequest $request)
    {
        $imageName = time().".".$request->avatar->getClientOriginalExtension();
        $path = "/avatars/".$imageName;
        $request->avatar->move(public_path('avatars'), $imageName);
        
        $update = User::find($request->id);
        $update->update([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $request->image,
            'user' => $request->status,
            'image' => $path,
        ]);
        return back();
    }

}
