<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'invoice_ref',
        'products',
        'status',
    ];

    protected $casts = [
        'products' => 'array',
    ];

    const STATUS_PENDING = 0;
    const STATUS_SUCCESS = 1;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
