<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function city(){
        return $this->belongsTo(Cities::class);
    }

    public function order(){
        return $this->hasOne(Orders::class);
    }
}
