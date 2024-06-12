<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reviews;
use Illuminate\Http\Request;

class Moderation extends Controller
{
    public function index(){
        $reviews = Reviews::orderBy('id', 'DESC')->get();
        // dd($reviews);
        return view('admin.moderation.index', compact('reviews'));
    }

    public function moderationTrue($id){
        $review = Reviews::find($id);
        // dd($review);
        $review->moderation = 'true';
        $review->save();
        return back();
    }

    public function moderationFalse($id){
        $review = Reviews::find($id);
        // dd($review);
        $review->moderation = 'false';
        $review->save();
        return back();
    }
}
