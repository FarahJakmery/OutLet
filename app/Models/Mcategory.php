<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'description',
        'photo_name'
    ];

    /**
     * The brands that belong to the main_categories.
     */
    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    /**
     * The subcategories that belong to the main_categories.
     */
    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class);
    }
}
