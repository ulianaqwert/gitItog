<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $categories = Categories::orderBy('id', 'desc')->get();
                return view('admin.category.index', ['categories' => $categories]);
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
                return view('admin.category.create');
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function store(AdminRequest $request)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                // $request->validate([
                //     'title' => 'required'
                // ]);
                $new_category = new Categories();
                $new_category->name = $request->title;
                $new_category->save();
                return redirect()->back()->withSuccess('Категория успешно добавлена');
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function edit($categories)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $category = Categories::find($categories);
                return view('admin.category.edit', ['category' => $category]);
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function update(AdminRequest $request, Categories $categories)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $categories = Categories::find($request->id);
                $categories->name = $request->title;
                $categories->save();
                return redirect()->back()->withSuccess('Категория была успешно обновлена');
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function destroy($categories)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $categories = Categories::find($categories);
                $categories->delete();
                return redirect()->back()->withSuccess('Категория была успешно удалена');
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }
}
