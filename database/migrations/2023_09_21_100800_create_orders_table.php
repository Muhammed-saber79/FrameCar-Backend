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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // $table->string('phoneNumber');
            $table->string('carType');
            $table->string('carCategory');
            $table->string('carModel');
            $table->string('glassType');
            $table->enum('glassPosition', ['front', 'back', 'left-side', 'right-side', 'mirrors']);
            // $table->string('brokenGlassImage');
            $table->enum('status', ['pending','replied' , 'approved', 'rejected', 'canceled', 'completed'])->default('pending');
            $table->string('longitude');
            $table->string('latitude');
            $table->boolean('isPaid')->default(false);
            $table->string('locationLink');
            $table->timestamps();

            $table->foreignId('user_id')->constrained('users', 'id')->cascadeOnDelete()->default(1);
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
