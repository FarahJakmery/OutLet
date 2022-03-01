<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'subcategory_name',
        'description',
        'photo_name',
        'mcategory_id'
    ];

    /**
     * Get the mcategory that owns the subcategory.
     */
    public function mcategory()
    {
        return $this->belongsTo(Mcategory::class);
    }

    /**
     * Get the branches for the subcategory.
     */
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
