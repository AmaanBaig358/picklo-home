<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginProcess()
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|exists:users,email|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (Auth::attempt(['email' => request()->email, 'password' => request()->password, 'is_active' => 1])) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withInput()->with('error', 'Incorrect email or password.');
    }

    public function authLogout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
