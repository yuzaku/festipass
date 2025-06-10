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
        Schema::table('event_reviews', function (Blueprint $table) {
            $table->foreign(['event_id'], 'fk_event_reviews_event')->references(['id'])->on('events')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['user_id'], 'fk_event_reviews_user')->references(['id'])->on('users')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_reviews', function (Blueprint $table) {
            $table->dropForeign('fk_event_reviews_event');
            $table->dropForeign('fk_event_reviews_user');
        });
    }
};
