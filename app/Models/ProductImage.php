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
        'product_detail_id',
        'url',
    ];

    /**
     * Relationship: A ProductImage belongs to one ProductDetail.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productDetail()
    {
        return $this->belongsTo(ProductDetail::class, 'product_detail_id');
    }
}
