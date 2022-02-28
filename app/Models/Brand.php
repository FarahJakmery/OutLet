<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_name',
        'description',
        'logo_name'
    ];

    /**
     * The main_categories that belong to the brand.
     */
    public function mcategories()
    {
        return $this->belongsToMany(Mcategory::class);
    }
}
