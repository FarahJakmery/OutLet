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

    /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the orderitems for the order.
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
