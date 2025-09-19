<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('review_id'); // Primary key

            // Foreign keys
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade');

            $table->tinyInteger('rating')->unsigned(); // rating, e.g., 1-5
            $table->text('comment')->nullable();       // review comment
            $table->timestamp('review_date')->useCurrent(); // review date

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('reviews');
    }
};
