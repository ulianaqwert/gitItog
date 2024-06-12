<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Models\Cities;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function index()
    {
        $cities = Cities::orderBy('name')->get();
        return view('admin.city.index', compact('cities'));
    }

    public function create()
    {
        return view('admin.city.create');
    }

    public function store(AdminRequest $request)
    {
        // $request->validate([
        //     'title' => 'required'
        // ]);
        $city = new Cities();
        $city->name = $request->title;
        $city->save();
        return redirect()->back()->withSuccess('Город успешно добавлен');
    }

    public function edit(string $id)
    {
        $city = Cities::find($id);
        return view('admin.city.edit', compact('city'));
    }

    public function destroy(string $id)
    {
        $city = Cities::find($id);
        $city->delete();
        return redirect()->back()->withSuccess('Город успешно удален');
    }
}
