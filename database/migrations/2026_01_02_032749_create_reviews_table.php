<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->tinyInteger('rating')->default(0)->index();
            $table->text('comment')->nullable();
            $table->foreignIdFor(User::class)->constrained()->onDelete('set null');
            $table->foreignIdFor(Product::class)->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['user_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
