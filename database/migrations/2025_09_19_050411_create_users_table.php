<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id')->unsigned();  // Primary Key
            $table->string('name', 80);
            $table->string('email', 120)->unique();
            $table->string('phone', 12)->unique();
            $table->char('password', 60);  // Store hashed passwords
            $table->enum('role', ['A', 'U'])->default('U');  // Admin or User role
            $table->timestamps(0);  // Automatically add created_at and updated_at
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
