<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variant extends Model
{
    /** @use HasFactory<\Database\Factories\VariantFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['product_id', 'size_id', 'color_id', 'price', 'sale_price', 'quantity'];

    protected static function booted()
    {
        static::saved(function ($variant) {
            $minPrice = $variant->product->variants()->min('price');
            $variant->product->update(['price' => $minPrice]);
        });
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }
}
