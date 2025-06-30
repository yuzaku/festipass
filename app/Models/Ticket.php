<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'ticket_type',
        'price',
        'stock',
        'sold', // <-- TAMBAHKAN INI
    ];

    /**
     * Relasi ke event yang memiliki tiket ini.
     */
    public function event()
    {
        return $this->belongsTo(Events::class, 'event_id');
    }

    public function order_items()
    {
        return $this->belongsTo(OrderItems::class,'id');
    }

    /**
     * (Opsional) Menampilkan sisa stok secara dinamis.
     * Tambahkan kolom 'sold' jika ingin melacak berapa yang sudah terjual.
     */
    public function getRemainingStockAttribute()
    {
        return $this->stock; // jika kamu tidak menyimpan sold, maka ini tetap = stock
    }
}
