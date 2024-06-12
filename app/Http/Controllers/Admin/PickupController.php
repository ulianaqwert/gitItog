<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PickUpRequest;
use App\Models\Pickups;
use Illuminate\Http\Request;

class PickupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pickups = Pickups::orderBy('street')->get();
        return view('admin.pickup.index', compact('pickups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pickup.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PickUpRequest $request)
    {
        // $request->validate([
        //     'street' => 'required',
        //     'house' => 'required'
        // ]);
        $pickup = new Pickups();
        $pickup->street = $request->street;
        $pickup->house = $request->house;
        $pickup->save();
        return redirect()->back()->withSuccess('Пункт успешно добавлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pickup = Pickups::find($id);
        return view('admin.pickup.edit', compact('pickup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PickUpRequest $request, string $id)
    {
        $pickup = Pickups::find($id);
        $pickup->street = $request->street;
        $pickup->house = $request->house;
        $pickup->save();
        return redirect()->back()->withSuccess('Пункт выдачи успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pickup = Pickups::find($id);
        $pickup->delete();
        return redirect()->back()->withSuccess('Пункт выдачи успешно удален');
    }
}
