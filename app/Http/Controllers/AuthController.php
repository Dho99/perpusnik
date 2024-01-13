<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('pages.Auth.login', [
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
            $level = auth()->user()->level;
            switch($level){
                case 'Administrator':
                    return redirect()->intended('admin/home');
                    break;
                case 'Petugas':
                    return redirect()->intended('petugas/home');
                    break;
                case 'Peminjam':
                    return redirect()->intended('/');
                    break;
                default:
                    return back()->with('loginFailed', 'Anda tidak terdaftar sebagai anggota');
                break;
            };
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
