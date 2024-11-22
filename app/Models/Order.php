<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'shipping_address_id',
        'shipment_status_id',
        'voucher_id',
        'total_product_value',
        'change',
        'total_order_value',
    ];

    /**
     * Relationship: An Order belongs to one User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * An Order has one ShippingAddress.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shippingAddress()
    {
        return $this->belongsTo(ShippingAddress::class);
    }

    /**
     * Relationship: An Order has many ShipmentStatuses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipmentStatus()
    {
        return $this->belongsTo(ShipmentStatus::class);
    }

    /**
     * Relationship: An Order has one HistoryOrder.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function historyOrder()
    {
        return $this->hasOne(HistoryOrder::class);
    }

    /**
     * Relationship: An Order has many Payments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
//     public function payments()
//     {
//         return $this->hasMany(Payment::class);
//     }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'order_id', 'id');
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'id');
    }
}
