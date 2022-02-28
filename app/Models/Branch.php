<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_name',
        'subcategory_id',
    ];

    /**
     * Get the subcategory that owns the branch.
     */
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
