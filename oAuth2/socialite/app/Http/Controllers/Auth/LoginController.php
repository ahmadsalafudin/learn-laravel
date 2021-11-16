<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $user['provider'] = 'google';
        $this->registerOrLoginUser($user);
        return redirect('home');
    }

    public function redirectToFB()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFBCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        $user['provider'] = 'facebook';
        $this->registerOrLoginUser($user);
        return redirect('home');
    }

    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        $user = Socialite::driver('github')->stateless()->user();
        $user['provider'] = 'github';
        $this->registerOrLoginUser($user);
        return redirect('home');
    }

    public function registerOrLoginUser($data)
    {
        $user = User::where('email', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->avatar = $data->avatar;
            $user->provider_id = $data['provider'];
            $user->save();
        }

        Auth::login($user);
    }
}
