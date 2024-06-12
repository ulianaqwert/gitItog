<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\BasketModel;
use App\Models\Cities;
use App\Models\Deliveries;
use App\Models\Orders;
use App\Models\Pickups;
use App\Models\Product_in_order;
use App\Models\Products;
use App\Models\Statuses;
use Hamcrest\Core\IsTypeOf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Order extends Controller
{
    public function index()
    {
        if (auth()->user() != null) {
            $orders = Addresses::join('orders', 'addresses.id', 'orders.address_id')->where('orders.user_id', auth()->user()->id)->orderBy('orders.id', 'DESC')->get();
            $deliveries = Deliveries::all();
            $statuses = Statuses::all();
            return view('user/order', compact('orders', 'deliveries', 'statuses'));
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function productsInOrderUser($id)
    {
        if (auth()->user() != null) {
            $products = DB::select('SELECT product_in_order.order_id, products.id, product_in_order.count, products.name, products.photo, products.price FROM product_in_order
        inner join products on product_in_order.product_id=products.id
        inner join orders on product_in_order.order_id=orders.id
        WHERE orders.id=' . $id);
            $count = DB::select('SELECT sum(count) as count FROM `product_in_order` WHERE order_id=' . $id);
            $price = DB::select('SELECT SUM(products.price*product_in_order.count) as sum FROM product_in_order
        INNER JOIN products ON product_in_order.product_id=products.id
        WHERE order_id=' . $id);
            return view('user.productsInOrderUser', compact('products', 'count', 'price'));
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function makingOrder()
    {
        if (auth()->user() != null) {
            $baskets = BasketModel::select('products.id', 'photo', 'name', 'price', 'baskets.count')->join('products', 'product_id', 'products.id')->where('user_id', auth()->user()->id)->where('products.count', '>', 0)->get();
            $price = DB::select('SELECT sum(price*baskets.count) as sum FROM baskets
            inner join products on baskets.product_id=products.id
            inner join users on baskets.user_id=users.id
            where user_id=' . auth()->user()->id);
            $addresses = Addresses::where('user_id', auth()->user()->id)->where('del', 'k')->orderBy('id', 'DESC')->groupBy('street')->get();
            $pickups = Pickups::all();
            $deliveries = Deliveries::all();
            return view('user.makingOrder', compact('baskets', 'price', 'addresses', 'pickups', 'deliveries'));
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function finishOrder(Request $request)
    {
        if (auth()->user() != null) {
            $new_order = new Orders();
            $new_order->user_id = auth()->user()->id;
            $new_order->status_id = 1;
            $new_order->date_making = date('Y-m-d');
            $new_order->delivery_id = $request->delivery;
            if ($request->delivery == 1) {
                if ($request->address == null) {
                    return redirect()->back()->withErrors(['address' => 'Необходимо выбрать адрес доставки']);
                }
                $findAddress = Addresses::find($request->address);
                $new_order->address_id = $findAddress->id;
            } else {
                $findAddress = Pickups::find($request->pick);
                $find = Addresses::where('street', $findAddress->street)->where('house', $findAddress->house)->where('user_id', auth()->user()->id)->get();
                if (count($find) == 0) {
                    $address = new Addresses();
                    $address->city = 'Челябинск';
                    $address->street = $findAddress->street;
                    $address->house = $findAddress->house;
                    $address->user_id = auth()->user()->id;
                    $address->del = 's';
                    $address->save();
                    $new_order->address_id = $address->id;
                }else
                $new_order->address_id = $find[0]['id'];
            }
            $new_order->save();
            $baskets = BasketModel::select('product_id', 'baskets.count as count')->join('products', 'baskets.product_id', 'products.id')->where('user_id', auth()->user()->id)->where('products.count', '>', 0)->get();
            foreach ($baskets as $details) {
                Product_in_order::insert(
                    array(
                        'order_id' => $new_order->id,
                        'product_id' => $details['product_id'],
                        'count' => $details['count']
                    )
                );
                $product = Products::find($details['product_id']);
                $product->count = $product->count - $details['count'];
                $product->save();
            };
            DB::delete("DELETE FROM baskets WHERE user_id=" . auth()->user()->id);
            $coincidence = 0;
            return redirect()->route('orderUser');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function addAddress(Request $request, $id)
    {
        $address = new Addresses();
        $address->street = $request->street;
        $address->house = $request->house;
        $address->flat = $request->flat;
        $address->city = 'Челябинск';
        $address->user_id = auth()->user()->id;
        $address->del = 'k';
        $address->save();
        return response()->json([
            'id' => $address->id,
            'city' => 'Челябинск',
            'street' => $request->street,
            'house' => $request->house,
            'flat' => $request->flat,
        ]);
    }

    public function deleteAddress($id)
    {
        $address = Addresses::find($id);
        $address->delete();
        return back();
    }
}
