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
        Schema::create('unified_generations', function (Blueprint $table) {
            $table->id();
            $table->timestamp('time');
            $table->float('offshore_generated')->nullable();
            $table->float('onshore_generated')->nullable();
            $table->float('pv_generated')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unified_generation');
    }
};
