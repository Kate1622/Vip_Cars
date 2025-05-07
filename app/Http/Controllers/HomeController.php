<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index()
    {
        return view('menu.home');
    }
    public function inicio()
    {
        return view('inicio');
    }
    public function welcome()
    {
        return view('welcome');
    }

    public function salir()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
