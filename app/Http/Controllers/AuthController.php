<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ], [
            'username.required' => 'Username harus diisi!',
            'username.max' => 'Username hanya boleh diisi maksimal 255 karakter!',
            'password.required' => 'Password harus diisi!',
            'password.max' => 'Password hanya boleh diisi maksimal 255 karakter',
        ]);

        $user = User::where('username', $request->username)
            ->where('is_active', true)
            ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->route('login')->with('error', 'Username atau password tidak sesuai!');
        }

        Auth::loginUsingId($user->id);

        return redirect()->route('mgt.dashboard.index')->withSuccess("Selamat Datang, {$user->name}!");
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
