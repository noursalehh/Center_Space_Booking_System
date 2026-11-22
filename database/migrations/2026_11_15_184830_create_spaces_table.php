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
        Schema::create('spaces', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->text('description');
            $table->string('type');

            $table->foreignId('center_id')->constrained('centers')->restrictOnDelete();

            $table->unsignedInteger('maximum_capacity');

            $table->decimal('hourly_price', 10, 2);

            $table->enum('status', ['available', 'maintenance'])->default('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spaces');
    }
};
