<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Product;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $productsCountZero = Products::where('count', 0)->orderBy('id', 'DESC')->get();
                $products = Products::where('count', '!=', 0)->orderBy('id', 'DESC')->get();
                return view('admin.product.index', ['products' => $products, 'productsCountZero' => $productsCountZero]);
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function create()
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $categories = Categories::orderBy('id', 'DESC')->get();
                return view('admin.product.create', ['categories' => $categories]);
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function store(ProductRequest $request)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $product = new Products();
                $product->name = $request->title;
                $product->count = $request->count;
                $product->price = $request->price;
                $product->info = $request->text;
                $product->category_id = $request->category_id;
                $product->structure = $request->structure;
                $product->top = $request->top;
                $product->medium = $request->medium;
                $product->base = $request->base;

                if (!empty($_FILES)) {
                    move_uploaded_file(
                        $_FILES['img']['tmp_name'],
                        'image/img_product/' . $_FILES['img']['name']
                    );
                    $product->photo = '/image/img_product/' . $_FILES['img']['name'];
                }
                if ($_FILES['img']['name'] == '')
                    return redirect()->route('product.create')->withInput()->withErrors(['img' => 'Загрузите файл']);
                $product->save();
                return Redirect()->back()->withSuccess('Товар был успешно добавлен');
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function edit($product)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $product = Products::find($product);
                $categories = Categories::orderBy('id', 'DESC')->get();
                return view('admin.product.edit', [
                    'categories' => $categories,
                    'product' => $product
                ]);
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function update(ProductRequest $request, Products $product)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $product->name = $request->title;
                $product->count = $request->count;
                $product->price = $request->price;
                $product->info = $request->text;
                $product->category_id = $request->category_id;
                $product->structure = $request->structure;
                $product->top = $request->top;
                $product->medium = $request->medium;
                $product->base = $request->base;
                if (!empty($_FILES)) {
                    move_uploaded_file(
                        $_FILES['imgRed']['tmp_name'],
                        'image/img_product/' . $_FILES['imgRed']['name']
                    );
                    $product->photo = '/image/img_product/' . $_FILES['imgRed']['name'];
                }
                if ($_FILES['imgRed']['name'] == '') {
                    $product->photo = $request->imgHidden;
                }
                $product->save();
                return Redirect()->back()->withSuccess('Товар был успешно обновлен');
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function destroy($product)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $product = Products::find($product);
                $product->delete();
                return Redirect()->back()->withSuccess('Товар был успешно удален');
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }
}
