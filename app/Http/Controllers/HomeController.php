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
        $user = Auth::user();
        return response()->json(["user"=>$user]);
    }

    public function checkStatus(){
        $user = Auth::user();
        if(!is_null($user)){
            return response()->json(["user"=>$user,"status"=>200]);
        }else{
            return response()->json(["user"=>$user,"status"=>400]);
        }

    }
}
