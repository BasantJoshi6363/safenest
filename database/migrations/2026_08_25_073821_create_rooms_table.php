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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();

            // Hotel relationship
            $table->foreignId('hotel_id')
                ->constrained()
                ->cascadeOnDelete();

            // Basic room information
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category');

            // Room description
            $table->text('description')->nullable();

            // Room specifications
            $table->unsignedTinyInteger('max_guests')->default(2);
            $table->string('bed_type');
            $table->decimal('size', 6, 2)->nullable();
            $table->string('size_unit')->default('m²');

            // Pricing
            $table->decimal('price_per_night', 10, 2);

            // Room image
            $table->string('image')->nullable();

            // Room features
            $table->boolean('balcony')->default(false);
            $table->boolean('wifi')->default(false);
            $table->boolean('smart_tv')->default(false);
            $table->boolean('breakfast')->default(false);
            $table->boolean('coffee_machine')->default(false);
            $table->boolean('air_conditioning')->default(false);
            $table->boolean('room_heater')->default(false);
            $table->boolean('private_bathroom')->default(false);
            $table->boolean('toiletries')->default(false);
            $table->boolean('garden_access')->default(false);
            $table->boolean('lounge_area')->default(false);
            $table->boolean('meals_included')->default(false);
            $table->boolean('safari_guidance')->default(false);
            $table->boolean('mini_bar')->default(false);
            $table->boolean('refreshments')->default(false);

            // Availability / management
            $table->unsignedInteger('total_rooms')->default(1);
            $table->unsignedInteger('available_rooms')->default(1);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};