<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'product_detail_id',
        'shipment_status_id',
        'voucher_id',
        'price',
        'quality',
        'total_value',
    ];

    /**
     * Relationship: An OrderDetail belongs to one ProductDetail.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productDetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function shipmentStatus()
    {
        return $this->belongsTo(ShipmentStatus::class);
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }
}