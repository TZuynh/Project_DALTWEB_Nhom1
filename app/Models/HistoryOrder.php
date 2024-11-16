<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryOrder extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'shipment_status_id',
    ];

    /**
     * Relationship: A HistoryOrder belongs to one Order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relationship: A HistoryOrder has many ShipmentStatuses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipmentStatuses()
    {
        return $this->hasMany(ShipmentStatus::class);
    }
}
