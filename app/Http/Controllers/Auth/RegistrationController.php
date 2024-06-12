<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function registration(RegistrationRequest $request)
    {
        
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->role_id = 0;
        $user->save();
        if ($user) {
            Auth::login($user);
            return redirect(route('profile'));
        }
        return redirect()->back()->withInput()->withErrors(['user'=>'Произошла ошибка, попробуйте еще раз']);
    }
}
