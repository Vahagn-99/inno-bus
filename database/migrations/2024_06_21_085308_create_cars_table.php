<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('name');
            $table->string('marca');
            $table->string('model');
            $table->string('year')->nullable();
            $table->string('color')->nullable();
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
