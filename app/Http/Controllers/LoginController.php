<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{
    public function index()
    {
        return View::make('login', [
            'google_link' => route('third_party_login', ['provider_name' => 'google']),
            'facebook_link' => route('third_party_login', ['provider_name' => 'facebook']),
        ]);
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
