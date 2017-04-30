<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        \phpCAS::client(CAS_VERSION_2_0, config('cas.host'), config('cas.port'), config('cas.context'));
        \phpCAS::setNoCasServerValidation();
    }

    public function login()
    {
        \phpCAS::forceAuthentication();
        $username = \phpCAS::getUser();
        $user = User::where('name', $username)->first();
        if (!$user) {
            return response('You are not authorized.', 403);
        }
        Auth::login($user);
        return redirect($this->redirectTo);
    }

    public function logout()
    {
        Auth::guard()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        session_unset();
        session_destroy();
        return redirect(\phpCAS::getServerLogoutURL() . '?service=' . urlencode(action('IndexController@index')));
    }
}
