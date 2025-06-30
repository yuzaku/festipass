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
        Schema::table('events', function (Blueprint $table) {
            // Add fields that are missing from the current events table
            $table->string('artist')->after('title')->nullable();
            $table->enum('status', ['draft', 'published', 'cancelled'])->default('draft')->after('event_date');
            $table->timestamp('updated_at')->nullable()->after('created_at');
            
            // Add indexes for better performance
            $table->index('status');
            $table->index(['organizer_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['artist', 'status', 'updated_at']);
        });
    }
};