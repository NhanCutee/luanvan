<?php

namespace App\Http\Controllers;

use App\Models\StoreManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'manager_username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::guard('store_manager')->attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'username' => 'Thông tin đăng nhập không đúng.',
        ]);
    }

    public function logout()
    {
        Auth::guard('store_manager')->logout();
        return redirect('/welcome');
    }
}
