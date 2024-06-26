<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    public $timestamps = false;
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_id', 'product_name', 'product_description', 'product_size', 
        'product_color','amount', 'product_price', 'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id', 'product_id');
    }
    
}
