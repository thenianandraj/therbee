<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table='product';

    protected $fillable = [
        'product_name',
        'original_rate',
        'discount_rate',
        'keywords',
        'description',
        'image',
        'category',
        'add_product',
    ];

}
