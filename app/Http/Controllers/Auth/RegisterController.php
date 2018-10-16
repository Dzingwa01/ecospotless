<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'contact_number'=>'required',
            'password' => 'required|string|min:6|confirmed',
            'roles' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'contact_number' => $data['contact_number'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'verification_token'=>base64_encode($data['email']),
            'verified'=>0
        ]);

        $user->assignRole($data('roles'));
    }

    public function register(Request $request)
    {
        DB::beginTransaction();
        try{
            $this->validator($request->all())->validate();
            $user = $this->create($request->all());
            event(new Registered($user));
            DB::commit();
            return response()->json(["user"=>$user,"message"=>"Account registered successfully, please check your email to activate"]);
        }catch(\Exception $e){
            return response()->json(["message"=>$e->getMessage()]);
        }

    }
}
