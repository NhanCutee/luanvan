<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'image_id';
    protected $table = 'image';
    protected $fillable = [
        'image_id', 'image_path','product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
