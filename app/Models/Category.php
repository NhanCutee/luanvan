<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'category_id';
    protected $table = 'category';
    protected $fillable = [
        'category_id',
        'category_name',
        'product_id',
    ];
}
