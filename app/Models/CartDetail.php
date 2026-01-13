<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    /** @use HasFactory<\Database\Factories\CartDetailFactory> */
    use HasFactory;

    protected $fillable = [
        "user_id",
        "variant_id",
        "quantity"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
