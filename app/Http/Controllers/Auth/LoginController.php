<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function check(LoginRequest $request)
    {
        if (Auth::attempt($request->only(['phone', 'password']))) {
            return redirect(route('profile'));
        }
        return redirect()->back()->withErrors(['user' => 'Данного пользователя не существует']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('index'));
    }
}
