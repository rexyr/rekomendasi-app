<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cafe extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'photo',
        'address',
        'open',
        'close',
        'price'
    ];

    protected $casts = [
        'open' => 'datetime:H:i',
        'close' => 'datetime:H:i'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function capsters(): HasMany
    {
        return $this->hasMany(Capster::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function facilities(): HasMany
    {
        return $this->hasMany(Facility::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
