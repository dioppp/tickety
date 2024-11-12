<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_name',
        'category',
        'event_description',
        'location',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function cheapestTicketPrice()
    {
        return $this->tickets->sortBy('price')->first()->price ?? null;
    }
}
