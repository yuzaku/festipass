<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class OrderItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'ticket_id',
        'quantity',
        'total_price',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    public function orders()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }

}
