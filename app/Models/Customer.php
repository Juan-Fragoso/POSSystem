<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'folio',
        'name',
        'last_name',
        'legal_name',
        'rfc',
        'fiscal_address_zip',
        'tax_regime',
        'phone',
        'email',
        'address',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Método de ayuda para saber si es un usuario
    public function hasLoginAccess()
    {
        return ! is_null($this->user_id);
    }
}
