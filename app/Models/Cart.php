<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\user;




class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'total_quality',
        'total_amount',
    ];

    /**
     * Relationship: A Cart belongs to one User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ProductDetail()
{
    return $this->belongsTo(ProductDetail::class, 'product_id', 'id');
}

    public function Product()
    {
        return $this->belongsTo(Product::class,'product_id', 'id');
    }
}
