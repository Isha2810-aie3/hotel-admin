<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->dateTime('arrival');
            $table->dateTime('departure');
            $table->integer('adults');
            $table->integer('kids')->default(0);
            $table->string('payment');
            $table->json('rooms')->nullable();
            $table->json('services')->nullable();
            $table->decimal('total_amount', 10, 2);
            $table->text('requests')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
