<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('car_id');
            $table->foreign('car_id')
                ->references('id')
                ->on('cars')
                ->onDelete('cascade');
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamp('registered_at')->useCurrent();
//            $table->unique(['car_id', 'registered_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
