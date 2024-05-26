<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(){
        return view('components.login');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'max:255'],
            'password'=> 'required'
        ]);
    
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
    
            return redirect('/students');
        }
    
        return back()->withError([
            'email' => "Invalid credentials",
        ])->onlyInput('email');
    }
    

    public function logout(Request $request){
                auth()->logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect('/login');
    }
}
