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
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true); // auto increment primary key
            $table->string('email', 255)->unique();
            $table->string('password_hash', 255);
            $table->string('name', 100);
            $table->tinyInteger('is_organizer')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->string('tel_num', 15)->nullable();
            
            // Tambahan untuk Laravel Auth
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
