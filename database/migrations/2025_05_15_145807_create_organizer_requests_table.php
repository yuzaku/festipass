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
        Schema::create('organizer_requests', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id')->index('user_id');
            $table->enum('status', ['pending', 'approved', 'rejected'])->nullable()->default('pending');
            $table->timestamp('requested_at')->useCurrent();
            $table->timestamp('reviewed_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizer_requests');
    }
};
