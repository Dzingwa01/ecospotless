<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->load('roles');
//        dd($user->roles);
        if($user->roles[0]->name=='client'){
            return view('home');
        }else if($user->roles[0]->name=='app-admin'){
            return view('admin-home');
        }else{
            return view('valet-home');
        }

    }
}
