<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id'); // Primary key (INT UNSIGNED AUTO_INCREMENT)

            // Foreign key → bookings.booking_id
            $table->foreignId('booking_id')
                  ->constrained('bookings', 'booking_id')
                  ->onDelete('cascade');

            // Amounts
            $table->decimal('amount', 9, 2);         // total paid
            $table->decimal('room_amount', 9, 2);    // room portion
            $table->decimal('service_amount', 9, 2); // service portion

            // Payment method (Card / UPI / Wallet / Cash)
            $table->enum('payment_method', ['C','U','W','H'])
                  ->comment('C=Card, U=UPI, W=Wallet, H=Cash');

            // Payment date
            $table->timestamp('payment_date')->useCurrent();

            // Status (Successful / Failed / Pending)
            $table->enum('status', ['S','F','P'])
                  ->default('P')
                  ->comment('S=Successful, F=Failed, P=Pending');

            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void {
        Schema::dropIfExists('payments');
    }
};
