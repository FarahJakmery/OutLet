<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Subcategory extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $table = 'subcategories';
    protected $fillable = ['photo_name', 'mcategory_id'];
    public $translatedAttributes = ['subcategory_name', 'description'];

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

    /**
     * Get the products for the Subcategory.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
