<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders'; 

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerNumber');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'orderNumber');
    }}
