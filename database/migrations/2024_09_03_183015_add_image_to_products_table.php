<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This method is used to apply the migration, adding the 'image' column to the 'products' table.
     */
    public function up(): void
    {
        // Check if the column already exists
        if (!Schema::hasColumn('products', 'image')) {
            Schema::table('products', function (Blueprint $table) {
                $table->string('image')->nullable(); // Add the image column
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * This method is used to roll back the migration, removing the 'image' column from the 'products' table.
     */
    public function down(): void
    {
        // Check if the column exists before attempting to drop it
        if (Schema::hasColumn('products', 'image')) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn('image'); // Drop the image column if rolling back
            });
        }
    }
};