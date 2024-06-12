<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Addresses;
use App\Models\Deliveries;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Statuses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index($statusId = 0)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $orders = DB::select('SELECT * FROM orders ORDER BY id desc');
                $addresses = Addresses::all();
                $users = User::all();
                $statuses = Statuses::all();
                $deliveries = Deliveries::all();
                if ($statusId) {
                    $orders = Orders::where('status_id', $statusId)->orderBy('id', 'DESC')->get();
                }
                return view('admin.order.index', compact('orders', 'users', 'statuses', 'deliveries', 'statusId', 'addresses'));
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function productsInOrder($id)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $products = Products::join('product_in_order', 'products.id', 'product_in_order.product_id')->join('orders', 'product_in_order.order_id', 'orders.id')->where('product_in_order.order_id', $id)->get();
                $sum = DB::select('SELECT sum(price*product_in_order.count) as sum from products 
        inner join product_in_order on products.id=product_in_order.product_id
        INNER join orders on product_in_order.order_id=orders.id
        where order_id = ' . $id . '
        GROUP by order_id');
                return view('admin.order.productsInOrder', compact('products', 'sum'));
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function accept($id)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                Orders::where('id', '=', $id)->update(['status_id' => 2]);
                return back();
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function finish($id)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                DB::select('UPDATE orders SET date_arrival=CURRENT_DATE(), status_id=3
        WHERE id=' . $id);
                return back();
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function reject($id)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                Orders::where('id', '=', $id)->update([
                    'status_id' => 4,
                    'reason_cancel' => 'Заказ отклонен по одной из причин: технический сбой; отсутствие товара на складе. Приносим свои извинения!'
                ]);
                return back();
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }
}
