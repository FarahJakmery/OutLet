<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    protected $fillable = [];

    /**
     * Get the order that owns the orderitem.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
