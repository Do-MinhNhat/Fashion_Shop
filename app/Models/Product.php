<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'slug', 'description', 'thumbnail', 'status', 'category_id', 'brand_id'];

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

    public function reviews(): HasMany{
        return $this->hasMany(Review::class);
    }

    public function variants(): HasMany
    {
        return $this->hasMany(Variant::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany {
        return $this->hasMany(Image::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->variants->min('price');
            }
        );
    }
    protected function salePrice(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->variants->where('sale_price', '>', '0')->sum('sale_price') ?? 0;
            }
        );
    }
}
