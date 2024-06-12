<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasketModel extends Model
{
    use HasFactory;

    protected $table = 'baskets';

    public $timestamps = false;
    
}
