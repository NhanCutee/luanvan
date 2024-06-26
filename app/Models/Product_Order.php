<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    protected $table = 'product_order';
    protected $primaryKey = null; // Bảng product_order sử dụng khóa chính là sự kết hợp của 2 cột product_id và order_id
    public $incrementing = false; // Không sử dụng khóa tự tăng
    public $timestamps = false;
    
    // Khai báo các cột không cần quan tâm đến việc gán giá trị khi thêm mới
    protected $guarded = [];
    
    // Định nghĩa quan hệ với bảng Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
    
    // Định nghĩa quan hệ với bảng Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}
