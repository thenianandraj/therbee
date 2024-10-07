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
        'file_paths',
        'image',
        'category',
        'add_product',
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
