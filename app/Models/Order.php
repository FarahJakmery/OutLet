<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['order_number', 'order_date', 'total_price', 'customer_id', 'seller_id'];

    /**
     * The statuses that belong to the order.
     */
    public function statuses()
    {
        return $this->belongsToMany(Status::class);
    }
}
