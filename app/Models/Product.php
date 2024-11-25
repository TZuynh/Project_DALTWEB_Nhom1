<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'name',
        'price',
        'description',
    ];

    /**
     * Relationship: A Product belongs to one Category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relationship: A Product has many ProductDetails.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
    
}
