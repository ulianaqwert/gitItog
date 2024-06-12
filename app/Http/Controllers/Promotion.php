<?php

namespace App\Http\Controllers;

use App\Models\Promotions;
use Illuminate\Http\Request;

class Promotion extends Controller
{
    public function index()
    {
        $promotions = Promotions::orderBy('id','DESC')->get();
        return view('promotions', compact('promotions'));
    }

    public function promo($id)
    {
        $promo = Promotions::find($id);
        return view('promo', compact('promo'));
    }
}
