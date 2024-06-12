<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Order;
use App\Http\Controllers\User as ControllersUser;
use App\Models\Categories;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class Admin extends Controller
{
    public function index()
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $categoriesCount = Categories::all()->count();
                $productsCount = Products::all()->count();
                $usersCount = User::all()->count();
                $ordersCount = Orders::all()->count();
                return view('admin.home.index', compact('categoriesCount', 'productsCount', 'usersCount', 'ordersCount'));
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function user()
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $users = User::orderBy('id', 'DESC')->get();
                $roles = Role::all();
                return view('admin.user.index', compact('users', 'roles'));
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }
}
