<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'location',
        'image_url',
        'price_min',
        'price_max',
        'status', // now_showing / coming_soon
    ];

    // Accessor untuk format harga
    public function getPriceRangeAttribute()
    {
        if ($this->price_min == 0 && $this->price_max == 0) {
            return 'Free';
        }

        return number_format($this->price_min, 0, ',', '.') . ' - ' . number_format($this->price_max, 0, ',', '.');
    }
}
