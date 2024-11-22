<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Relationship: A Size has many ProductDetails.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    // public function productDetails()
    // {
    //     return $this->belongsToMany(ProductDetail::class, 'product_detail_size');
    // }
    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class); // Một size có thể có nhiều product_detail
    }
}