<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
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
        'url',
    ];

    /**
     * Relationship: A ProductImage belongs to one ProductDetail.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    public function productDetail()
    {
        // return $this->belongsTo(ProductDetail::class, 'product_detail_id');
        // Quan hệ với bảng product_detail, so sánh với 'product_id' và 'color_id'
        return $this->belongsTo(ProductDetail::class, 'product_id', 'product_id')
            ->where('color_id', $this->color_id);
    }
}