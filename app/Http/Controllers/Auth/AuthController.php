<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * 
     * 
     */
    public function login()
    {
        if(Auth::check()){
            return redirect('/users')->with('success', 'Already logged in');
        }
        return view('Auth.login');
    }

    /**
     * 
     * 
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=> 'required',
        ]);

        $user = User::findByUsername($request->input('username'));

        if ($user && $request->input('password') === $user->password) {
            Auth::login($user);
            return redirect('/users')->with('success', 'Login successful');
        }
        return redirect('/auth/login')->with('error', 'Invalid credentials');
    }

    /**
     * 
     * 
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth/login')->with('success', 'Logout successful');
    }

}
