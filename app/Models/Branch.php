<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Branch extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $table = 'branches';
    protected $fillable = ['subcategory_id'];
    public $translatedAttributes = ['branch_name'];

    /**
     * Get the subcategory that owns the branch.
     */
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    /**
     * Get the products for the Branch.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
