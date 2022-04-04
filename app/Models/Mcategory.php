<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Mcategory extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $table = 'mcategories';
    protected $fillable = ['photo_name'];
    public $translatedAttributes = ['category_name', 'description'];


    /**
     * The brands that belong to the main_categories.
     */
    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    /**
     * Get the subcategories for the blog post.
     */
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    /**
     * Get the products for the MainCategory.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
