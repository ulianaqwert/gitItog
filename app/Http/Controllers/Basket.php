<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BasketModel;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class Basket extends Controller
{
    public function index()
    {

        if (auth()->user() == null) {
            return view('/notUserOrAdmin');
        } else
            $productsInBasket = DB::select('SELECT products.id, name, price, photo, baskets.count as count, products.count as countProduct FROM baskets INNER JOIN products ON baskets.product_id=products.id WHERE user_id=' . auth()->user()->id . ' ORDER BY id DESC');
        $price = DB::select('SELECT sum(price*baskets.count) as sum FROM baskets
            inner join products on baskets.product_id=products.id
            inner join users on baskets.user_id=users.id
            where user_id=' . auth()->user()->id);
        $productsInfavourite = DB::select('SELECT product_id FROM favourites WHERE user_id=' . auth()->user()->id);
        $fav = [];
        foreach ($productsInfavourite as $product) {
            array_push($fav, $product->product_id);
        }
        return view('user/basket', compact('productsInBasket', 'price', 'fav'));
    }

    public function add($id)
    {
        $productInBasket = BasketModel::where('user_id', '=', auth()->user()->id)->where('product_id', '=', $id)->get();
        $user_basket = json_decode(json_encode($productInBasket), true);
        if (count($user_basket) == 0) {
            $productInBasket = new BasketModel;
            $productInBasket->count = 1;
            $productInBasket->product_id = $id;
            $productInBasket->user_id = auth()->user()->id;
            $productInBasket->save();
        };
        return back();
    }

    public function minus($id)
    {
        $productInBasket = BasketModel::where('user_id', '=', auth()->user()->id)->where('product_id', '=', $id)->get();
        $user_basket = json_decode(json_encode($productInBasket), true);
        if ($user_basket[0]['count'] > 1) {
            BasketModel::where('user_id', '=', auth()->user()->id)->where('product_id', '=', $id)->update(['count' => $user_basket[0]['count'] - 1]);
            $price = DB::select('SELECT sum(price*baskets.count) as sum FROM baskets
        inner join products on baskets.product_id=products.id
        inner join users on baskets.user_id=users.id
        where user_id=' . auth()->user()->id);
            return response()->json([
                'count' => $user_basket[0]['count'] - 1,
                'price' => $price[0]->sum
            ]);
        } else {
            BasketModel::where('user_id', '=', auth()->user()->id)->where('product_id', '=', $id)->delete();
            $price = DB::select('SELECT sum(price*baskets.count) as sum FROM baskets
        inner join products on baskets.product_id=products.id
        inner join users on baskets.user_id=users.id
        where user_id=' . auth()->user()->id);
            $count = BasketModel::where('user_id', '=', auth()->user()->id)->count();
            return response()->json([
                'count' => $user_basket[0]['count'] - 1,
                'price' => $price[0]->sum,
                'countAllProduct' => $count
            ]);
        }
    }

    public function plus($id)
    {
        $productInBasket = BasketModel::where('user_id', '=', auth()->user()->id)->where('product_id', '=', $id)->get();
        $user_basket = json_decode(json_encode($productInBasket), true);
        $productCount = Products::where('id', $id)->get();
        if ($user_basket[0]['count'] < $productCount[0]->count) {
            BasketModel::where('user_id', '=', auth()->user()->id)->where('product_id', '=', $id)->update(['count' => $user_basket[0]['count'] + 1]);
            $price = DB::select('SELECT sum(price*baskets.count) as sum FROM baskets
        inner join products on baskets.product_id=products.id
        inner join users on baskets.user_id=users.id
        where user_id=' . auth()->user()->id);
            return response()->json([
                'count' => $user_basket[0]['count'] + 1,
                'price' => $price[0]->sum
            ]);
        }
        return back();
    }

    public function delete($id)
    {
        BasketModel::where('user_id', '=', auth()->user()->id)->where('product_id', '=', $id)->delete();
        $price = DB::select('SELECT sum(price*baskets.count) as sum FROM baskets
        inner join products on baskets.product_id=products.id
        inner join users on baskets.user_id=users.id
        where user_id=' . auth()->user()->id);
        $count = BasketModel::where('user_id', '=', auth()->user()->id)->count();
        return response()->json([
            'price' => $price[0]->sum,
            'countAllProduct' => $count
        ]);
    }
}
