<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('tagline')->nullable();
            $table->text('description')->nullable();
            $table->string('destination')->nullable();

            // Location
            $table->string('city')->nullable();
            $table->string('address')->nullable(); // Kept single nullable instance
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            // Contact Info
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();

            // Media
            $table->string('featured_image')->nullable();
            $table->json('gallery_images')->nullable();

            // Property Policies & Ratings
            $table->unsignedTinyInteger('star_rating')->default(3);
            $table->time('check_in_time')->default('14:00');
            $table->time('check_out_time')->default('12:00');
            $table->text('cancellation_policy')->nullable();

            // Hotel-wide Amenities
            $table->boolean('free_wifi')->default(true);
            $table->boolean('swimming_pool')->default(false);
            $table->boolean('spa_wellness')->default(false);
            $table->boolean('fitness_center')->default(false);
            $table->boolean('restaurant')->default(false);
            $table->boolean('bar_lounge')->default(false);
            $table->boolean('parking')->default(true);
            $table->boolean('airport_shuttle')->default(false);
            $table->boolean('pet_friendly')->default(false);
            $table->boolean('room_service')->default(false);

            // Statuses
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};