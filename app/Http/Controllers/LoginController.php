<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return View::make('login');
    }

    public function redirect($provider_name)
    {
        session(['provider_name' => $provider_name]);
        return Socialite::driver($provider_name)->redirect();
    }

    public function callback()
    {
        $provider_name = session('provider_name');
        $user_data = Socialite::driver($provider_name)->user();

        $user = User::updateOrCreate(['email' => $user_data->email], [
            'name' => $user_data->name,
            'provider_id' => $user_data->id,
            'avatar' => $user_data->avatar,
        ]);

        Auth::login($user);

        return redirect()->intended('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
