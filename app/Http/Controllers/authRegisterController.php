<?php

namespace App\Http\Controllers  ;

use Illuminate\Http\Request;
Use App\Models\User;

class authRegisterController extends Controller
{
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required | string | max:50 | min:3',
            'Username' => 'required | string | max:20 | min:3 | unique:users',
            'password' => 'required | string | max:100 | min:5',
            'email' => 'required | email | unique:users',
            'image' => 'image | mimes:jpeg,png,jpg | nullable',    
        ]);

        $user = new User([
            'name' => $request->name,
            'Username' => $request->Username,
            'password' => $request->password,
            'email' => $request->email, 
        ]);
        if ($request->hasFile('image')) {
            $user->updateProfileImage($request);
        }
        $user->save();

        $validatedData['password'] = bcrypt($validatedData['password']);

        return redirect()->route('auth.login')->with('alert', 'User registered successfully');

    }

    public function index() {
        return view('auth.register');
    }
}
