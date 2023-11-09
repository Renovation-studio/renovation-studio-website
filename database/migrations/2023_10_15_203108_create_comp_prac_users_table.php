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
        Schema::create('comp_prac_users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email');
            $table->string('phoneNumber');
            $table->string('hash');
            $table->string('avatarUrl');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comp_prac_users');
    }
};
