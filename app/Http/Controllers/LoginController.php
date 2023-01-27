<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return 'Login';
    }

    public function redirect()
    {
        return 'Redirect';
    }

    public function callback()
    {
        return 'Callback';
    }

    public function logout()
    {
        return 'Logout';
    }
}
