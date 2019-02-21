<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

class ApiLoginController extends Controller
{
    use AuthenticatesUsers {
        attemptLogin as attemptLoginAtAuthenticatesUsers;
//        sendLoginResponse as sendLoginResponse;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
//        dd($request->all());
        $user = User::where('email', $request->all()['email'])->whereNull('users.deleted_at')->first();
        if ($user != null) {
            $verified = $user->email_verified_at;
//            dd($verified);
            if (is_null($verified)) {
                return false;
            } else {
                return $this->guard()->attempt(
                    $this->credentials($request), $request->filled('remember')
                );
            }
        }
        return false;
    }

    /**
     * Attempt to log the user into application using username as an email.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attempLoginUsingUsernameAsAnEmail(Request $request)
    {

        return $this->guard()->attempt(
            ['email' => $request->input('user_name'), 'password' => $request->input('password')],
            $request->has('remember'));

    }


    public function login(Request $request)
    {
        $input = $request->all();
//        dd($input);
        $this->validateLogin($request);
        if ($this->attemptLogin($request)) {
            $user = User::with('roles')->where('email',$input['email'])
                ->first();
            return response()->json(
                $user
            );
        } else {
            try {
                $user = User::where('email', $input['email'])->first();

                if ($user != null) {
                    $verified = $user->email_verified_at;
                    if (is_null($verified)) {
                        return response()->json(
                            ['id' => '700', 'message' => 'Your Account has not be verified, please check your email address ' . $user->email]
                        );
                    } else {
                        return response()->json(
                            ['id' => '701', 'message' => trans('auth.failed')]
                        );
                    }
                } else {
                    return response()->json(
                        ['id' => '702', 'message' => 'Your Account does not exist, please create an account ']
                    );
                }
            } catch (\ErrorException $error) {
//                dd($error);
                return response()->json(
                    ['id' => '701', 'message' => trans('auth.failed')]
                );
            }

        }

        return response()->json(
            ['_id' => '701', 'message' => trans('auth.failed')]
        );
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
}
