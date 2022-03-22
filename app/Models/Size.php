<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table = 'sizes';
    protected $fillable = ['size_name'];

    /**
     * The colors that belong to the size.
     */
    public function colors()
    {
        return $this->belongsToMany(Size::class);
    }
}
