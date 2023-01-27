<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return 'Home';
    }

    public function terms()
    {
        return 'Terms';
    }

    public function policy()
    {
        return 'Policy';
    }
}
