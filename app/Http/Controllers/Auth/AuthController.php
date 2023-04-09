<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        try{
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            $role = Auth::user()->role->name;
 
            return redirect()->route( $role.'.dashboard');
            // if ($role == 'admin') {
            //     return redirect()->route('admin.dashboard');
            // } elseif ($role == 'user') {
            //     return redirect()->route('user.dashboard');
            // }
        }
 
        return back()->withInput($request->all())->with('error', 'Email atau password salah');
    }

    public function logout(Request $request)
    {
       Auth::logout();

       $request->session()->invalidate();

       $request->session()->regenerateToken();

       return redirect('/');
    }
}
