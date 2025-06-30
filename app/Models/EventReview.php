<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'rating',
        'review',
    ];

    /**
     * Mendefinisikan bahwa ulasan ini dimiliki oleh satu User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mendefinisikan bahwa ulasan ini adalah untuk satu Event.
     */
    public function event()
    {
        // Pastikan nama model Event Anda adalah 'Events'
        return $this->belongsTo(Events::class);
    }
}