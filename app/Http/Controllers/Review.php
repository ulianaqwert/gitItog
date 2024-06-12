<?php

namespace App\Http\Controllers;

use App\Models\Product_in_order;
use App\Models\Reviews;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Review extends Controller
{
    public function index($id)
    {
        $product = DB::select('SELECT id, name, photo FROM products WHERE id=' . $id);
        $reviews = DB::select('SELECT products.id as id, photo, products.name as productName, price, users.name as user, date_making, text FROM `reviews` 
    inner join products on reviews.product_id=products.id
    inner join users on reviews.user_id=users.id
    WHERE product_id=' . $id . '
    AND moderation = "true" ORDER BY date_making desc');
        if (auth()->user() != null) {
            $leaveAReview = Product_in_order::join('orders', 'product_in_order.order_id', 'orders.id')->where('orders.user_id', auth()->user()->id)->where('product_in_order.product_id', $id)->where('orders.status_id', 3)->get();
            return view('review', compact('reviews', 'product', 'leaveAReview'));
        } else {
            return view('review', compact('reviews', 'product'));
        }
    }

    public function addReview(Request $request)
    {
        $review = new Reviews();
        $user = User::where('id', $request->user)->get();
        $date = date('Y-m-d');
        $review->text = $request->text;
        $review->user_id = $request->user;
        $review->product_id = $request->product;
        $review->date_making = date('Y-m-d');
        $review->save();
        return response()->json([
            'user' => $user[0]->name,
            'text' => $request->text,
            'date' => $date,
        ]);
    }
}
