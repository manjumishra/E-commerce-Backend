<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_order_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'useremail',
        'productname',
        'product_id',
        'price',
        'total',
        'quantity',
        
      
    ];
}

