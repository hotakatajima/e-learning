<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Activity;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $activities = Activity::orderBy('created_at' , 'desc')->paginate(5);
        return view('dashboard',['activities' => $activities]);
    }
}