<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\http\RedirectResponse;
use illuminate\Support\facades\auth;
use Illuminate\Auth\SessionGuard;

class authLoginController extends Controller
{

    public function Authenticate(Request $request):RedirectResponse {

        $credentials = $request->validate([
            'Username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->AS == "user") {
                return redirect()->intended('/')->with('alert', 'Successfully loged-in!');
            } else {
                return redirect()->intended('/dashboard/home')->with('alert', 'Hi, Admin!');
            }
        }

        return redirect()->back()->withErrors([
            'Username' => 'The Provided Credentials Doesnt Match Our Record'
        ])->onlyInput('Username');
    }

    public function index(){
        return view('auth/login');
    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/auth/login');
    }
}
