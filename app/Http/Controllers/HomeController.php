<?php

namespace App\Http\Controllers;

use App\User;
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

        $users = User::all();
        $car_onwers = [];
        $car_valets = [];
        $franchisees = [];
//        foreach ($users as $user){
//            $cur = $user->load('roles');
//            if($cur->roles[0]->name == 'client'){
//                array_push($car_onwers,$cur);
//            }
//            else if($cur->roles[0]->name == 'car-valet'){
//                array_push($car_valets,$cur);
//            }else if($cur->roles[0]->name == 'franchisee'){
//                array_push($franchisees,$cur);
//            }
//        }
//        dd($car_valets);
        if($user->roles[0]->name=='client'){
            return view('home');
        }else if($user->roles[0]->name=='app-admin'){
            return view('admin-home',compact('users','car_onwers','car_valets','franchisees'));
        }else{
            return view('valet-home');
        }

    }
}
