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
        Schema::create('pincode', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('product_id');
            $table->string('origin_city');
            $table->string('origin_state');
            $table->string('origin_region');
            $table->string('origin_zone');
            $table->string('dest_pincode');
            $table->string('dest_city');
            $table->string('dest_state');
            $table->string('dest_region');
            $table->string('dest_zone');
            $table->string('product');
            $table->integer('dox_line_haul_tat');
            $table->integer('dox_end_mile_tat');
            $table->integer('dox_tat');
            $table->integer('non_dox_line_haul_tat');
            $table->integer('non_dox_end_mile_tat');
            $table->integer('non_dox_tat');
            $table->string('cut_off_time');
            $table->timestamps();

          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pincode');
    }
};