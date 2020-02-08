<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use \App\User;
use Hash; // または use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function allUsers()
    {
        $all = User::all();
        return view('member',compact('all'));
    }

    public function showUser(Request $request)
    {
        $show_one = User::find($request->id);
        return view('useredit', compact('show_one') );
    }

    public function showUsers(Request $request)
    {
        $show_one = User::find($request->id);
        return view('userprofile', compact('show_one') );
    }

    public function updateUser(Request $request)
    {
        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $update = User::find($request->id);
        $update->update([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $request->image,
            'user' => $request->status,
        ]);
        return back();
    }

}
