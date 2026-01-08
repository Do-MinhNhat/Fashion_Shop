<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    // Tự động thêm Slug khi thêm name
    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => [
                'name' => $value,
                'slug' => str($value)->slug(),
            ],
        );
    }

    // Cho phép Laravel tìm kiếm Model qua cột slug thay vì ID
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tags(): BelongsToMany {
        return $this->belongsToMany(Tag::class);
    }
}
