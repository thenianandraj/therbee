<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table='products';

    protected $fillable = [
        'product_name',
        'original_rate',
        'discount_rate',
        'keywords',
        'description',
        'image',
        'category',
        'add_product',
        'subcategory',
        'files1',
        'files2',
        'files3',
        'files4',
        'files5',
        'files6',
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
