<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return View::make('login');
    }

    public function signup()
    {
        return View::make('signup');
    }

    public function post(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($validated)) {
            return redirect()->intended();
        }

        return back()->withErrors($validated)->withInput();

    }

    public function signup_post(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required'
        ]);

        if ($validated->fails()) {
            return back()->withErrors($validated)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($user);
        
        return redirect()->intended();
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

        return redirect()->intended();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
