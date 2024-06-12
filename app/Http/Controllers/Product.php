<?php

namespace App\Http\Controllers;

use App\Models\BasketModel;
use App\Models\Categories;
use App\Models\Favourites;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Product extends Controller
{
    public function index($categoryId = 0)
    {
        $products = Products::orderBy('id', 'DESC')->cursorPaginate(8);
        $categories = Categories::all();
        if ($categoryId) {
            $products = Products::where('category_id', $categoryId)->orderBy('id', 'DESC')->cursorPaginate(8);
        }
        if (auth()->user() != null) {
            $baskets = BasketModel::select('product_id')->where('user_id', auth()->user()->id)->get();
            $arrBasket = $baskets->toArray();
            $arr = [];
            foreach ($arrBasket as $basket) {
                array_push($arr, $basket['product_id']);
            }
            $productsInfavourite = Favourites::where('user_id', auth()->user()->id)->get();
            $fav = [];
            foreach ($productsInfavourite as $product) {
                array_push($fav, $product->product_id);
            }
            return view('catalog', compact(
                'products',
                'categories',
                'categoryId',
                'arr',
                'fav'
            ));
        } else
            return view('catalog', compact('products', 'categories', 'categoryId'));
    }

    public function product(Request $request)
    {
        $product = Products::query()->find($request->id);

        $countReviews = DB::select('SELECT count(*) as count FROM `products`
        inner join reviews on products.id=reviews.product_id
        WHERE product_id=' . $request->id.' AND moderation="true"');
        $similarProducts = Products::where('category_id', $product->category_id)->where('id', '<>', $product->id)->orderBy('id', 'DESC')->get();
        if (auth()->user() != null) {
            $productInBasket = Products::join('baskets', 'product_id', 'products.id')->where('product_id', $product->id)->where('user_id', auth()->user()->id)->get();
            $productInFav = Products::join('favourites', 'product_id', 'products.id')->where('product_id', $product->id)->where('user_id', auth()->user()->id)->get();
            $baskets = BasketModel::select('product_id')->where('user_id', auth()->user()->id)->get();
            $arrBasket = $baskets->toArray();
            $arr = [];
            foreach ($arrBasket as $basket) {
                array_push($arr, $basket['product_id']);
            }
            $productsInfavourite = Favourites::where('user_id', auth()->user()->id)->get();
            $fav = [];
            foreach ($productsInfavourite as $favourite) {
                array_push($fav, $favourite->product_id);
            }
            return view('product', compact('product', 'similarProducts', 'productInBasket', 'countReviews', 'arr', 'fav', 'productInFav'));
        } else
            return view('product', compact('product', 'similarProducts', 'countReviews'));
    }
}
