<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'folio',
        'sale_date',
        'user_id',
        'customer_id',
        'total_qty',
        'total_subtotal',
        'total_taxes',
        'total_amount',
        'payment_method',
        'status',
    ];

    protected $casts = [
        'sale_date' => 'datetime',
        'total_qty' => 'decimal:2',
        'total_subtotal' => 'decimal:2',
        'total_taxes' => 'decimal:2',
        'total_amount' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
