<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'employee_id';
    public $timestamps = false;
    

    public function orders()
    {
        return $this->hasMany(Order::class, 'employee_id', 'employee_id');
    }
}


