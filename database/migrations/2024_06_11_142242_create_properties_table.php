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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->string('address');
            $table->decimal('price', 10, 2);
            $table->text('description');
            $table->enum('property_type', ['flat', 'house', 'commercial']);
            $table->integer('rooms');
            $table->integer('area');
            $table->integer('floor');
            $table->integer('total_floors');
            $table->boolean('furnished');
            $table->boolean('parking');
            $table->boolean('internet');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
