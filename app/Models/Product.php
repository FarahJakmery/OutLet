<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class Product extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $table = 'products';
    protected $fillable = ['product_number', 'max_price', 'min_price', 'decreasing_value', 'minutes', 'quantity', 'return_option', 'value_status', 'brand_id', 'mcategory_id', 'subcategory_id', 'branch_id'];
    public $translatedAttributes = ['product_name', 'description', 'status'];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }


    /**
     * Get the colors for the product.
     */
    public function colors()
    {
        return $this->hasMany(ProductColor::class);
    }
}
