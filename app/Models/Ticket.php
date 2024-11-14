<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'ticket_name',
        'ticket_description',
        'price',
        'stock',
        'sell_start_date',
        'sell_end_date',
        'sell_start_time',
        'sell_end_time',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function transactions()
    {
        return $this->hasManyThrough(Transaction::class, Order::class);
    }
}
