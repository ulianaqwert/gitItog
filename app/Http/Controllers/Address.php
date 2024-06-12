<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\Cities;
use Illuminate\Http\Request;

class Address extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $address = new Addresses();
        $address->street = $request->street;
        $address->house = $request->house;
        $address->flat = $request->flat;
        $address->city_id = $request->city;
        $address->user_id = auth()->user()->id;
        $address->del = 'k';
        $address->save();
        $city = Cities::find($request->city);
        // dd($address);
        return response()->json([
            'id' => $address->id,
            'city' => $city->name,
            'street' => $request->street,
            'house' => $request->house,
            'flat' => $request->flat,
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $address = Addresses::find($id);
        // dd($address);
        $address->delete();
        return back();
    }
}
