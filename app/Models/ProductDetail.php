<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'color_id',
        'size_id',
        'quality',
        'status',
    ];

    /**
     * Relationship: A ProductDetail belongs to one Product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
   
    
    /**
     * Relationship: A ProductDetail has many Sizes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    // public function sizes()
    // {
    //     return $this->belongsToMany(Size::class, 'product_detail_size');
    // }

    public function size()
    {
        return $this->belongsTo(Size::class);
        // Một product_detail thuộc về một size
    }

    /**
     * Relationship: A ProductDetail has many Colors.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    /**
     * Relationship: A ProductDetail has many Comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Relationship: A ProductDetail has many Rates.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    /**
     * Relationship: A ProductDetail has many ProductImages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
     public function images()
     {
        return $this->hasMany(ProductImage::class, 'product_id');
     }

    public function productImages()
    {
        // return $this->hasMany(ProductImage::class, 'product_detail_id');
        // // Quan hệ với bảng product_images
        return $this->hasMany(ProductImage::class, 'product_id', 'product_id')
            ->where('color_id', $this->color_id);
    }

    /**
     * Relationship: A ProductDetail has one OrderDetail.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orderDetail()
    {
        return $this->hasOne(OrderDetail::class);
    }
}
