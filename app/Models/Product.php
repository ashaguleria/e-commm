<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'cat_id', 'name', 'price', 'category', 'description', 'product_image', 'deleted_at',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }
}