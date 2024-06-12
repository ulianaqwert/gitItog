<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PromoRequest;
use App\Models\Promotions;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $promotions = Promotions::orderBy('id', 'DESC')->get();
                return view('admin.promotion.index', compact('promotions'));
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
                return view('admin.promotion.create');
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function store(PromoRequest $request)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                // $request->validate([
                //     'name' => 'required',
                //     'description' => 'required',
                // ]);
                $promotion = new Promotions();
                $promotion->name = $request->name;
                $promotion->description = $request->description;
                if (!empty($_FILES)) {
                    move_uploaded_file(
                        $_FILES['img']['tmp_name'],
                        'image/promo/' . $_FILES['img']['name']
                    );
                    $promotion->photo = '/image/promo/' . $_FILES['img']['name'];
                }
                if ($_FILES['img']['name'] == '')
                    return redirect()->route('promotion.create')->withInput()->withErrors(['img' => 'Загрузите файл']);
                $promotion->save();
                return redirect()->back()->withSuccess('Новость успешно добавлена');
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }


    public function edit(string $id)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $promotion = Promotions::find($id);
                return view('admin.promotion.edit', compact('promotion'));
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function update(PromoRequest $request, Promotions $promotion)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $promotion->name = $request->name;
                $promotion->description = $request->description;
                if (!empty($_FILES)) {
                    move_uploaded_file(
                        $_FILES['imgRed']['tmp_name'],
                        'image/promo/' . $_FILES['imgRed']['name']
                    );
                    $promotion->photo = '/image/promo/' . $_FILES['imgRed']['name'];
                }
                if ($_FILES['imgRed']['name'] == '') {
                    $promotion->photo = $request->imgHidden;
                }
                $promotion->save();
                return Redirect()->back()->withSuccess('Новость была успешно обновлена');
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function destroy(string $id)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $promo = Promotions::find($id);
                $promo->delete();
                return Redirect()->back()->withSuccess('Новость была успешно удалена');
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }
}
