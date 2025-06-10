<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $fillable = [
        'organizer_id',
        'title',
        'description',
        'location',
        'event_date',
    ];

    protected $dates = ['event_date', 'created_at', 'updated_at'];

    /**
     * Relasi ke tiket-tiket dari event ini.
     */
    public function tickets()
    {
    return $this->hasMany(Ticket::class, 'event_id');
    }

    /**
     * (Opsional) Relasi ke organizer, jika kamu punya model User atau Organizer.
     */
    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }
}
