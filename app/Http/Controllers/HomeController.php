<?php

namespace App\Http\Controllers;

use App\Models\BasketModel;
use App\Models\Contacts;
use App\Models\Favourites;
use App\Models\Products;
use App\Models\Promo;
use App\Models\Promotions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $promotions = Promotions::orderBy('id', 'DESC')->limit(6)->get();
        $contacts = Contacts::all();
        $newProducts = Products::orderBy('id', 'DESC')->limit(4)->get();
        $arr = [];
        foreach ($newProducts as $new) {
            array_push($arr, $new['id']);
        }
        $popularProducts = Favourites::join('products', 'product_id', '=', 'products.id')->whereNotIn('product_id', $arr)->groupBy('product_id')->orderBy('product_id', 'DESC')->limit(4)->get();
        if (auth()->user() != null) {
            $baskets = BasketModel::select('product_id')->where('user_id', auth()->user()->id)->get();
            $arrBasket = $baskets->toArray();
            $arr = [];
            foreach ($arrBasket as $basket) {
                array_push($arr, $basket['product_id']);
            }
            $productsInfavourite = DB::select('SELECT product_id FROM favourites WHERE user_id=' . auth()->user()->id);
            $fav = [];
            foreach ($productsInfavourite as $product) {
                array_push($fav, $product->product_id);
            }
            return view('index', compact('newProducts', 'popularProducts', 'arr', 'fav', 'promotions', 'contacts'));
        }
        return view('index', compact('newProducts', 'popularProducts', 'promotions', 'contacts'));
    }

    public function login()
    {
        if (Auth::check())
            return view('user.profile');
        return view('auth.login');
    }

    public function register()
    {
        if (Auth::check())
            return view('user.profile');
        return view('auth.register');
    }

    public function politic()
    {
        return view('politic');
    }

    public function deliveryInfo()
    {
        return view('deliveryInfo');
    }
}
