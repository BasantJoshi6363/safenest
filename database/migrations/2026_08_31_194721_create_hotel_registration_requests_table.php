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
    Schema::create('hotel_registration_requests', function (Blueprint $table) {
        $table->id();
        $table->string('owner_name');
        $table->string('email');
        $table->string('phone');
        $table->string('hotel_name');
        $table->string('city');
        $table->text('message')->nullable();
        $table->string('status')->default('pending'); // pending, approved, rejected
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_registration_requests');
    }
};
