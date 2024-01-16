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
            $table->string('carModel');
            $table->string('carMadeYear');
            $table->string('servicePlace');
            $table->date('date');
            $table->integer('time');
            $table->string('glassType')->nullable();
            $table->string('paymentMethod');
            $table->text('car_front_image')->nullable();
            $table->text('car_back_image')->nullable();
            $table->text('camera_image')->nullable();
            $table->enum('glassPosition', ['front', 'back', 'front-left-door', 'front-right-door', 'back-left-door', 'back-right-door', 'left-side', 'right-side', 'front-left-air', 'front-right-air', 'back-left-air', 'back-right-air', 'upper', 'mirrors-left', 'mirrors-right'])->nullable();
            $table->enum('serviceType', ['process', 'change', 'upRepair', 'machine']);
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('locationLink')->nullable();
            $table->integer('cost')->nullable();
            $table->timestamps();

            // $table->string('brokenGlassImage');
            $table->enum('status', ['pending','replied' , 'approved', 'rejected', 'canceled', 'completed','cheat'])->default('pending');
            $table->boolean('isPaid')->default(false);

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
