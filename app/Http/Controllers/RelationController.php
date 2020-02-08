<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use \App\User;
use \App\Activity;

class RelationController extends Controller
{
    public function followUser(Request $request)
    { 
        $follow = User::find($request->follower_id);
        Auth::user()->following()->attach($follow);

        Activity::create([
            'user_id' => Auth::user()->id,
            'activityable_id' =>  $follow->id,
            'activityable_type' => 'App\User',
        ]);
        
        return back();
    }

    public function unfollowUser(Request $request)
    {
        $follow = User::find($request->follower_id);
        Auth::user()->following()->detach($follow);

        return back();
    }

    public function followers(Request $request)
    {
        $user = User::find($request->id);
        $followers = $user->followers()->get();

        return view('followers',compact('followers','user'));
    }
 
     public function following(Request $request)
     {
         $user = User::find($request->id);
         $following = $user->following()->get();
 
         return view('following', compact('following', 'user'));
     }
 
}
