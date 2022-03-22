<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Color extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $table = 'colors';
    protected $fillable = ['color', 'product_id'];
    public $translatedAttributes = ['name'];

    /**
     * Get the product that owns the color.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * The sizes that belong to the color.
     */
    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }
}
