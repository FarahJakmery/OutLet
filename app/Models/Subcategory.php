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
    ];

    /**
     * The mcategories that belong to the subcategories.
     */
    public function mcategories()
    {
        return $this->belongsToMany(Mcategory::class);
    }

    /**
     * Get the branches for the subcategory.
     */
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
