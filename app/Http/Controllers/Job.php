<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;

class Job extends Controller
{
    public function index(){
        $jobs = Jobs::orderBy('id', 'DESC')->get();
        return view('job', compact('jobs'));
    }
}
