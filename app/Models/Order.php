<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'order_at',
        'status',
        'total_amount',
        'payment_method',
        
    ];

    public function user(): BelongsTo
    {
        return $this-> belongsTo(User::class);
    }
    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }
}
