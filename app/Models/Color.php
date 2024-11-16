<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'color_name',
    ];

    /**
     * Relationship: A Color has many ProductDetails.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function productDetails()
    {
        return $this->belongsToMany(ProductDetail::class, 'product_detail_color');
    }
}
