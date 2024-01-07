<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('frontend.pages.Auth.login', [
            'title' => 'Login'
        ]);
    }

    public function login(Request $request){
        $request->flashOnly('username');

        $data = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->route('home');
        }else{
            return back()->with('loginFailed', 'Username yang anda masukkan salah, Periksa kembali');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
