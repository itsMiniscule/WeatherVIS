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
        Schema::create('generators', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('bus');
            $table->float('p_nom');
            $table->string('carrier');
            $table->integer('build_year')->nullable();
            $table->integer('min_up_time')->nullable();
            $table->integer('min_down_time')->nullable();
            $table->integer('up_time_before')->nullable();
            $table->integer('down_time_before')->nullable();
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generators');
    }
};
