<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebAuthController extends Controller
{
    public function loginForm(){
        return view('auth.login');
    }
    
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {

            if (!in_array(Auth::user()->type, ['super_admin', 'employee'])) {

                Auth::logout();

                return back()->withErrors([
                    'email' => 'You are Customer that isnot allowed to access the dashboard',
                ])->onlyInput('email');
            }

            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Your credentials are incorrect',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {   
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

