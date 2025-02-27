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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('reservation_code');
            $table->foreignId('tour_id');
            $table->foreignId('passenger_id');
            $table->boolean('status')->default(1);
            $table->string('payment_method');
            $table->integer('currency');
            $table->integer('children_count');
            $table->integer('adult_count');
            $table->integer('third_age_count');
            $table->timestamps();


            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');
            $table->foreign('passenger_id')->references('id')->on('passengers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
