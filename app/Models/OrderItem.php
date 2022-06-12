<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    protected $fillable = ['item_name', 'item_photo', 'quantity', 'current_price', 'fastproduct_id', 'order_id'];

    // ================================ Order Items Relationship ================================

    /**
     * Get the order that owns the orderitem.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // ================================ Fast Product Relationship ================================

    /**
     * Get the Product that owns the orderitem.
     */
    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
