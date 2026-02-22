<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'barcode',
        'name',
        'cost_price',
        'sale_price',
        'stock_qty',
        'min_stock_alert',
        'tax_object',
        'fiscal_product_code',
        'fiscal_unit_code',
    ];

    /**
     * Convierte los tipos de datos automáticamente
     */
    protected $casts = [
        'cost_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'stock_qty' => 'decimal:3',
        'min_stock_alert' => 'decimal:3',
    ];
}
