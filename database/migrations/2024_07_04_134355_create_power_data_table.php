<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('power_data', function (Blueprint $table) {
            $table->id();
            $table->timestamp('time');
            $table->float('offshore_wind_electricity');
            $table->float('offshore_wind_speed');
            $table->float('offshore_mwh');
            $table->float('onshore_wind_electricity');
            $table->float('onshore_wind_speed');
            $table->float('onshore_mwh');
            $table->float('sun_electricity');
            $table->float('irradiance_direct');
            $table->float('irradiance_diffuse');
            $table->float('temperature');
            $table->float('sun_mwh');
            $table->float('total_supply');
            $table->float('peak_demand');
            $table->float('load_percentage');
            $table->float('demand_mwh');
            $table->float('surplus_shortage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('power_data');
    }
};
