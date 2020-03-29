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
        if($request->avatar == null)
        {
            $update = User::find($request->id);
            $update->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }else{
            $imageName = time().".".$request->avatar->getClientOriginalExtension();
            $path = "/avatars/".$imageName;
            $request->avatar->move(public_path('avatars'), $imageName);

            // $image = $request->avatar;
            // $image = str_replace('data:image/png;base64,', '', $image);
            // $image = str_replace('', '+', $image);
            // $imageName = str_random(10).'.'.'png';
            // \File::put(storage_path(). '/' . $imageName, base64_decode($image));
            
            $update = User::find($request->id);
            $update->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'image' => $path,
            ]);
        }
        return back();
    }

}
