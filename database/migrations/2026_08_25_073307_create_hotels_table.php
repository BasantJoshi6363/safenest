<?php

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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();

            // Basic hotel information
            $table->string('name');
            $table->string('slug')->unique();

            // Location
            $table->string('destination'); // Pokhara, Kathmandu, Chitwan, etc.
            $table->string('address')->nullable();

            // Hotel content
            $table->text('description')->nullable();

            // Pricing & rating
            $table->decimal('price_per_night', 10, 2);
            $table->decimal('rating', 2, 1)->default(0);

            // Image
            $table->string('image')->nullable();

            // Contact information
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            // Hotel facilities
            $table->boolean('wifi')->default(false);
            $table->boolean('pool')->default(false);
            $table->boolean('breakfast')->default(false);
            $table->boolean('air_conditioning')->default(false);
            $table->boolean('parking')->default(false);
            $table->boolean('restaurant')->default(false);
            $table->boolean('bar')->default(false);
            $table->boolean('safari')->default(false);

            // Management
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};