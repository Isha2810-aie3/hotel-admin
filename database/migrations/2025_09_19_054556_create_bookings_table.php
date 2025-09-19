<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        if (!Schema::hasTable('bookings')) {
            Schema::create('bookings', function (Blueprint $table) {
                $table->id('booking_id'); // use booking_id instead of id
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
                $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade');
                $table->date('check_in');
                $table->date('check_out');
                $table->decimal('room_total', 8, 2);
                $table->text('service_details');
                $table->decimal('service_total', 8, 2);
                $table->decimal('total_price', 8, 2);
                $table->enum('status', ['pending','confirmed','completed']);
                $table->enum('payment', ['paid','unpaid']);
                $table->timestamps();
            });
        }
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
