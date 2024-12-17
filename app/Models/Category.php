<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table= 'categories';

    protected $fillable = [
        'name',
        'description',
        'image',
        'subcategories', // JSON field
    ];

    // Cast subcategories to array for easy handling
    protected $casts = [
        'subcategories' => 'array', // Automatically handles JSON conversion
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
