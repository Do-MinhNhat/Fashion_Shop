<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    /** @use HasFactory<\Database\Factories\OrderDetailFactory> */
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }
    protected static function booted()
    {
        static::created(function ($detail) {
            $detail->variant->decrement('quantity', $detail->quantity);
        });
        static::created(function ($detail) {
            $detail->order->increment('total_price', $detail->price * $detail->quantity);
        });
    }
}
