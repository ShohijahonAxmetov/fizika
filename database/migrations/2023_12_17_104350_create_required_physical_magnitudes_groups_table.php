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
        Schema::create('required_physical_magnitudes_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('physical_magnitude_id')->constrained(); // example 1
            $table->text('required_physical_magnitude_ids'); // [2,3]
            $table->text('action'); // Length / Time
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('required_physical_magnitudes_groups');
    }
};
