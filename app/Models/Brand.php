<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Brand extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $table = 'brands';
    protected $fillable = ['logo_name'];
    public $translatedAttributes = ['brand_name', 'description'];

    /**
     * The main_categories that belong to the brand.
     */
    public function mcategories()
    {
        return $this->belongsToMany(Mcategory::class);
    }
}
