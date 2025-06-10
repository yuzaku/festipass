<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Org extends Model
{
    use HasFactory;

    // Mass assignable fields
    protected $fillable = [
        'title',
        'date',
        'status',
        'location',
        'image_url',
    ];

    // Example: you can also add custom accessors if needed
}
