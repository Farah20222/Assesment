<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'orderdetails'; // specify the table name

    public function order()
    {
        return $this->belongsTo(Order::class, 'orderNumber');
    }
}
