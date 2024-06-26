<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'order_id';
    public $timestamps = false;
    
    // Định nghĩa quan hệ với bảng Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    // Định nghĩa quan hệ với bảng Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    // Định nghĩa quan hệ với bảng DeliveryStatus
    public function deliveryStatus()
    {
        return $this->hasOne(DeliveryStatus::class, 'order_id', 'order_id');
    }

    // Định nghĩa quan hệ với bảng ProductOrder
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_order', 'order_id', 'product_id')
                    ->withPivot('product_order_quantity');
    }
}

