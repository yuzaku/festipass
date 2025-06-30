<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Concert Model
 * 
 * Currently using the existing 'events' table.
 * Ticket-related functionality is disabled until teammates create the ticket tables.
 * When tickets, orders, and order_items tables are created, uncomment the relationships
 * and update the helper methods accordingly.
 */
class Concert extends Model
{
    use HasFactory;

    protected $table = 'events'; // Using existing events table

    protected $fillable = [
        'organizer_id',
        'title',
        'artist',
        'description',
        'poster',
        'location',
        'event_date',
        'status',
    ];

    protected $casts = [
        'event_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $dates = [
        'event_date',
        'created_at', 
        'updated_at'
    ];

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function scopeByOrganizer($query, $organizerId)
    {
        return $query->where('organizer_id', $organizerId);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('event_date', '>', now());
    }

    // Relationships
    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    // Note: These relationships will be activated when teammates create the ticket tables
    public function tickets()
    {
        // return $this->hasMany(Ticket::class, 'event_id');
        return collect(); // Return empty collection for now
    }

    public function orders()
    {
        // return $this->hasManyThrough(Orders::class, Ticket::class, 'event_id', 'id', 'id', 'id');
        return collect(); // Return empty collection for now
    }

    public function orderItems()
    {
        // return $this->hasManyThrough(OrderItems::class, Ticket::class, 'event_id', 'ticket_id', 'id', 'id');
        return collect(); // Return empty collection for now
    }

    // Accessors
    public function getFormattedDateAttribute()
    {
        return $this->event_date ? $this->event_date->format('F j, Y') : null;
    }

    public function getFormattedTimeAttribute()
    {
        return $this->event_date ? $this->event_date->format('H:i') : null;
    }

    public function getDateInputAttribute()
    {
        return $this->event_date ? $this->event_date->format('Y-m-d') : null;
    }

    public function getTimeInputAttribute()
    {
        return $this->event_date ? $this->event_date->format('H:i') : null;
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'draft' => '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800"><i class="fas fa-circle text-gray-400 mr-2 text-xs"></i>Draft</span>',
            'published' => '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800"><i class="fas fa-circle text-green-400 mr-2 text-xs"></i>Published</span>',
            'cancelled' => '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800"><i class="fas fa-circle text-red-400 mr-2 text-xs"></i>Cancelled</span>'
        ];

        return $badges[$this->status] ?? $badges['draft'];
    }

    public function getPosterUrlAttribute()
    {
        if ($this->poster && file_exists(public_path('storage/' . $this->poster))) {
            return asset('storage/' . $this->poster);
        }
        
        // Default concert images based on artist - dapat diganti sesuai kebutuhan
        $defaultImages = [
            'ADO' => 'https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?w=400&h=250&fit=crop&q=80', // Colorful concert stage
            'Yorushika' => 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=400&h=250&fit=crop&q=80', // Indie concert vibe
            'yanaginagi' => 'https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?w=400&h=250&fit=crop&q=80', // Acoustic performance
            'Phantom Siita' => 'https://images.unsplash.com/photo-1571266028243-d220bc5b1d52?w=400&h=250&fit=crop&q=80', // Electronic/DJ setup
        ];
        
        return $defaultImages[$this->artist] ?? 'https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?w=400&h=250&fit=crop';
    }

    // Mutators are handled in the controller for better control

    // Helper methods
    public function isUpcoming()
    {
        return $this->event_date && $this->event_date->isFuture();
    }

    public function isPast()
    {
        return $this->event_date && $this->event_date->isPast();
    }

    public function isPublished()
    {
        return $this->status === 'published';
    }

    public function isDraft()
    {
        return $this->status === 'draft';
    }

    public function isCancelled()
    {
        return $this->status === 'cancelled';
    }

    public function getTicketsSoldCount()
    {
        // TODO: Will be implemented when ticket tables are created by teammates
        // For now, return sample data only for seeded concerts (ID 1-3)
        if ($this->status === 'draft') return 0;
        
        // Only generate sample data for the original seeded concerts
        if ($this->id <= 3) {
            // Specific tickets sold per artist
            $ticketsSoldByArtist = [
                'ADO' => 241,
                'Yorushika' => 206,
                'yanaginagi' => 100,
            ];
            
            return $ticketsSoldByArtist[$this->artist] ?? 0;
        }
        
        // Return 0 for manually created concerts
        return 0;
    }

    public function getTotalRevenue()
    {
        // TODO: Will be implemented when ticket tables are created by teammates  
        // For now, return sample revenue only for seeded concerts (ID 1-3)
        if ($this->status === 'draft') return 0;
        
        $ticketsSold = $this->getTicketsSoldCount();
        
        // Only generate sample revenue for the original seeded concerts
        if ($this->id <= 3 && $ticketsSold > 0) {
            // Specific average ticket prices per artist (in IDR)
            $ticketPriceByArtist = [
                'ADO' => 450000,        // ADO: 241 tickets x 450K = 108.45M
                'Yorushika' => 350000,  // Yorushika: 206 tickets x 350K = 72.1M  
                'yanaginagi' => 300000, // yanaginagi: 100 tickets x 300K = 30M
            ];
            
            $ticketPrice = $ticketPriceByArtist[$this->artist] ?? 0;
            return $ticketsSold * $ticketPrice;
        }
        
        // Return 0 for manually created concerts
        return 0;
    }

    public function getAvailableTicketsCount()
    {
        // TODO: Will be implemented when ticket tables are created by teammates
        return 0; // Return 0 for now
    }
}