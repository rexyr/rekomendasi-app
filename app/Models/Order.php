<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    const STATUS_WAITING = 0;
    const STATUS_CONFIRM = 1;
    const STATUS_DONE = 2;
    const STATUS_CANCEL = 3;
    const STATUS_REJECTED = 4;
    const STATUS_REVIEWED = 5;

    protected $fillable = [
        'user_id',
        'cafe_id',
        'capster_id',
        'order_date',
        'order_time',
        'status',
        'review_text',
        'review_star'
    ];

    protected $casts = [
        'order_date' => 'date',
        'order_time' => 'datetime:h:i d-m-Y'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cafe(): BelongsTo
    {
        return $this->belongsTo(Cafe::class);
    }

    public function capster(): BelongsTo
    {
        return $this->belongsTo(Capster::class);
    }
}
