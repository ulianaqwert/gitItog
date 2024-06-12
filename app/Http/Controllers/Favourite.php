<?php

namespace App\Http\Controllers;

use App\Models\Favourites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Favourite extends Controller
{
    public function index()
    {
        if (auth()->user() != null) {
            $favourites = DB::select('SELECT products.id, name, price, photo, products.count as countProduct FROM favourites INNER JOIN products ON favourites.product_id=products.id Where user_id=' . auth()->user()->id . ' ORDER BY id DESC');
            $productsInBasket = DB::select('SELECT product_id FROM baskets WHERE user_id=' . auth()->user()->id);
            $baskets = [];
            foreach ($productsInBasket as $product) {
                array_push($baskets, $product->product_id);
            }
            return view('user/favourite', compact('favourites', 'baskets'));
        } else
            return view('/notUserOrAdmin');
    }

    public function deleteFromFav($id)
    {
        Favourites::where('user_id', '=', auth()->user()->id)->where('product_id', '=', $id)->delete();
        $count = Favourites::where('user_id', '=', auth()->user()->id)->count();
        return response()->json([
            'countAllProduct' => $count
        ]);
    }

    public function addFav($id)
    {
        $favourites = Favourites::where('user_id', '=', auth()->user()->id)->where('product_id', '=', $id)->get();
        $user_fav = json_decode(json_encode($favourites), true);
        if (count($user_fav) == 0) {
            $fav = new Favourites();
            $fav->product_id = $id;
            $fav->user_id = auth()->user()->id;
            $fav->save();
        };
    }
}
