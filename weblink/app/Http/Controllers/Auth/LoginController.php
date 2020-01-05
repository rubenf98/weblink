<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\User;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $provider_user = Socialite::driver('github')->user();
        //dd($provider_user);
        
        if ($provider_user->name == null) {
            $name = $provider_user->nickname;
        } else {
            $name=$provider_user->name;
        }
    
        $user = User::where('provider_id', $provider_user->id)->first();

        if (!$user) {
            //add user to database
            $user = User::create([
            'name'=>$name,
            'email'=>$provider_user->email,
            'image'=>$provider_user->avatar,
            'description'=>$provider_user->user['bio'],
            'country'=>$provider_user->user['location'],
            'provider_id'=>$provider_user->id,
            //'provider'=>$provider
        ]);
        }
        //loginUser
        Auth::login($user, true);

        return redirect('');
    }
}