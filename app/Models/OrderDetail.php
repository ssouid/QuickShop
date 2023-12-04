<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable=[
        'order_id',
        'product_id',
        'quantity',
        'subtotal',
    ];
    public function order(): BelongsTo
    {
        return $this-> belongsTo(Order::class);
    }
    public function product(): belongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
