<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'main_address',
        'location',
        'phone',
        'secondary_address',
        'secondary_location',
        'secondary_phone',
        // ... other attributes to be mass assignable
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}