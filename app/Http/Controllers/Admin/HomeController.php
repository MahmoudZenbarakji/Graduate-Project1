<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function index()
    {
        if(Auth::user()->getIsAdminAttribute()){
            return view('home');
        }
        return view('home');
    }
}
