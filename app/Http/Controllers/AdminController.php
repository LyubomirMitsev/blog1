<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){

            if(Auth::user()->hasRole('admin')){
                return redirect()->route('admin.dashboard');
            }

            session()->flash('message', 'Sorry! You do not have the right roles for this page.');
            
            Auth::logout();
        }

        return redirect()->back()->with('danger', 'Error! These credentials do not match our records.');
    }

    public function index()
    {
        return view('admin.dashboard');
    }
}
