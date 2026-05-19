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
        Schema::table('alerts', function ($table) {

            $table->foreignId(
                'resource_meter_id'
            )->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alerts', function ($table) {

            $table->dropForeign([
                'resource_meter_id'
            ]);

            $table->dropColumn(
                'resource_meter_id'
            );
        });
    }
};
