<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserAdmin extends Controller
{
    public function userAdmin($id)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 3) {
                User::where('id', '=', $id)->update(['role_id' => 1]);
                return back();
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function userGenAdmin($id)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 3) {
                User::where('id', '=', $id)->update(['role_id' => 3]);
                // $user = User::where('id', '=', $id)->get();
                // dd($user);
                return back();
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function adminUser($id)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 3) {
                User::where('id', '=', $id)->update(['role_id' => 0]);
                // $user = User::where('id', '=', $id)->get();
                // dd($user);
                return back();
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }
}
