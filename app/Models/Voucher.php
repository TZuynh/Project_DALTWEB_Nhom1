<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'voucher_type_id',
        'status_name',
        'content',
        'money_minimum',
        'money_discount',
        'quality',
        'start_date',
        'end_date',
        'status',
    ];

    /**
     * Relationship: A Voucher belongs to one VoucherType.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function voucherType()
    {
        return $this->belongsTo(VoucherType::class);
    }
}
