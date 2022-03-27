<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'statuses';
    protected $fillable = ['status'];

    /**
     * The orders that belong to the status.
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
