<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotion';
    protected $primaryKey = 'promotion_id';
    public $timestamps = false;

    protected $fillable = [
        'promotion_name',
        'promotion_description',
        'promotion_start_date',
        'promotion_end_date',
        'promotion_created_date',
        'product_id',
        'discount_percentage' // Thêm discount_percentage vào fillable
    ];

    // Định nghĩa quan hệ với bảng Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
