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
            $table->id();
            $table->string('email', 255);
            $table->string('password', 255);
            $table->string('phoneNumber', 255);
            $table->string('avatarUrl', 255)->nullable();
            $table->string('surname', 255);
            $table->string('name', 255);
            $table->string('patronymic', 255)->nullable();
            $table->foreignId('service_type_id')->nullable()->constrained('service_type')->onDelete('cascade');
            $table->text('wishes')->nullable();
            $table->text('preferable_services_id')->nullable();
            $table->foreignId('interior_style_id')->nullable()->constrained('preferable_service')->onDelete('cascade');
            $table->dateTime('email_verified_at')->nullable();
            $table->rememberToken();
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
