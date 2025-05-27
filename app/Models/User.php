<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password_hash',
        'is_organizer',
        'tel_num',
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password_hash' => 'hashed',
            'is_organizer' => 'boolean',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Get the password for the user.
     */
    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    /**
     * Set the password attribute.
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password_hash'] = Hash::make($value);
    }

    /**
     * Check if user is organizer.
     */
    public function isOrganizer(): bool
    {
        return (bool) $this->is_organizer;
    }

    /**
     * Get user role name.
     */
    public function getRoleName(): string
    {
        return $this->isOrganizer() ? 'Organizer' : 'User';
    }

   /**
     * Get formatted phone number.
     */
    public function getFormattedPhoneAttribute(): string
    {
        if (!$this->tel_num) return '';
        
        // Format nomor Indonesia
        $phone = preg_replace('/[^0-9]/', '', $this->tel_num);
        if (substr($phone, 0, 1) === '0') {
            return '+62' . substr($phone, 1);
        }
        return '+62' . $phone;
    }

    /**
     * Scope untuk organizer saja.
     */
    public function scopeOrganizers($query)
    {
        return $query->where('is_organizer', 1);
    }

    /**
     * Scope untuk user biasa saja.
     */
    public function scopeRegularUsers($query)
    {
        return $query->where('is_organizer', 0);
    }

}
