<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();

            $table->foreignId('hotel_id')->constrained()->cascadeOnDelete();
            $table->foreignId('room_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            // Guest details (works even without auth)
            $table->string('guest_name');
            $table->string('guest_email');
            $table->string('guest_phone')->nullable();

            $table->date('check_in');
            $table->date('check_out');
            $table->unsignedSmallInteger('guests')->default(1);
            $table->unsignedSmallInteger('nights');

            $table->decimal('price_per_night', 10, 2);
            $table->decimal('total_price', 10, 2);

            $table->enum('status', ['pending', 'confirmed', 'checked_in', 'checked_out', 'cancelled'])
                ->default('pending');
            $table->enum('payment_status', ['unpaid', 'paid', 'refunded'])
                ->default('unpaid');

            $table->text('special_requests')->nullable();

            $table->timestamps();

            $table->index(['room_id', 'check_in', 'check_out']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};