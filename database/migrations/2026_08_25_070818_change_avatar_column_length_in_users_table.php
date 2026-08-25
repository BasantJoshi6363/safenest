<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if the column exists before trying to modify it
        if (Schema::hasColumn('users', 'avatar')) {
            // For MySQL/MariaDB
            if (DB::connection()->getDriverName() === 'mysql') {
                // Use text type for maximum compatibility with long URLs
                Schema::table('users', function (Blueprint $table) {
                    $table->text('avatar')->nullable()->change();
                });
            } else {
                // For other databases (PostgreSQL, SQLite, etc.)
                Schema::table('users', function (Blueprint $table) {
                    $table->string('avatar', 2048)->nullable()->change();
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('users', 'avatar')) {
            // Revert back to original length (255)
            Schema::table('users', function (Blueprint $table) {
                $table->string('avatar', 255)->nullable()->change();
            });
        }
    }
};