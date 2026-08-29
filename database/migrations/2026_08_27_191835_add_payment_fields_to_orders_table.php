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
    Schema::table('orders', function (Blueprint $table) {
        $table->enum('payment_method', ['esewa', 'card', 'pay_at_checkin'])
            ->nullable()->after('payment_status');
        $table->string('transaction_id')->nullable()->after('payment_method');
        $table->json('payment_meta')->nullable()->after('transaction_id');
    });
}   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
