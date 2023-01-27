<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function index()
    {
        return 'Login';
    }

    public function redirect($provider_name)
    {
        session(['provider_name' => $provider_name]);
        return Socialite::driver($provider_name)->redirect();
    }

    public function callback()
    {
        $provider_name = session('provider_name');
        $user = Socialite::driver($provider_name)->user();
        return redirect('/');
    }

    public function logout()
    {
        return 'Logout';
    }
}
