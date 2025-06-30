<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_date',
        'status'
    ];

    public function order_items()
    {
        return $this->hasMany(OrderItems::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
