<?php

use App\Models\Role;
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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignIdFor(Role::class);
            $table->string('phone');
            $table->boolean('gender')->default(1);
            $table->string('address')->nullable();
            $table->boolean('review')->default(1)->index();
            $table->boolean('status')->default(1)->index();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('gender');
            $table->dropColumn('address');
            $table->dropColumn('review');
            $table->dropColumn('status');
        });
    }
};
