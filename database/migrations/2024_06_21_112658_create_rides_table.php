<?php

use App\Enums\RideStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->string('car_id');
            $table->foreign('car_id')
                ->references('id')
                ->on('cars')
                ->references('id')
                ->onDelete('cascade');
            $table->string('from_latitude');
            $table->string('from_longitude');
            $table->string('to_latitude');
            $table->string('to_longitude');
            $table->string('status')->default(RideStatus::PENDING);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rides');
    }
};
