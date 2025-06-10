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
        Schema::create('event_reviews', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id')->index('fk_event_reviews_user');
            $table->integer('event_id')->index('fk_event_reviews_event');
            $table->tinyInteger('rating');
            $table->text('review')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_reviews');
    }
};
