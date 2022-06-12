<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['order_number', 'order_date', 'total_price', 'order_status', 'user_id'];

    // ================================ Order Items Relationship ================================
    /**
     * Get the orderitems for the order.
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // ================================ User Relationship ================================
    /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
