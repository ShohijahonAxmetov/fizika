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
        Schema::create('physical_magnitudes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')->nullable()->costrained(); // единица измерения
            $table->text('name'); // example: Длина
            $table->string('designation'); // ["l","s"]
            $table->string('uniqueDesignation')->unique(); // Length
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physical_magnitudes');
    }
};
