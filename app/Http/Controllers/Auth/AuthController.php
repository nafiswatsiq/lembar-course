<?php

namespace App\Http\Controllers\Auth;

use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    protected $remember = true;

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        try{
            $remember = request('remember_me') == 1 ? true : false;

            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
 
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
 
            $role = Auth::user()->role->name;

            // try{
            //     Mail::to('nafiswatsiq@gmail.com')->send(new WelcomeEmail(Auth::user()->name));

            //     Log::info('Email berhasil dikirim');
            // }catch(\Exception $e){
            //     Log::error('Gagal mengirim email: ' . $e->getMessage());
            // }
 
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
