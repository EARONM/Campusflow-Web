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
        Schema::table(
            'resource_meters',
            function (Blueprint $table) {

                $table->decimal(
                    'min_threshold',
                    12,
                    2
                )->nullable();

                $table->decimal(
                    'max_threshold',
                    12,
                    2
                )->nullable();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(
            'resource_meters',
            function (Blueprint $table) {

                $table->dropColumn([
                    'min_threshold',
                    'max_threshold',
                ]);
            }
        );
    }
};
