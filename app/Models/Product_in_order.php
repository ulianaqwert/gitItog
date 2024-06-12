<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_in_order extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'product_in_order';
}
