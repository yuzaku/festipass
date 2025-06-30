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
        'poster', // Sudah kita tambahkan sebelumnya
        'location',
        'event_date',
    ];

    // PERUBAHAN: Tambahkan properti $casts di sini
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'event_date' => 'datetime',
    ];

    /**
     * Relasi ke tiket-tiket dari event ini.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'event_id');
    }

    /**
     * Relasi ke organizer.
     */
    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    /**
     * Relasi ke ulasan-ulasan dari event ini.
     */
    public function reviews()
    {
        return $this->hasMany(EventReview::class, 'event_id');
    }
}