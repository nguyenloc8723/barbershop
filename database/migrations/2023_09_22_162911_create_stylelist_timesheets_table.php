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
        Schema::create('stylelist_timesheets', function (Blueprint $table) {
            $table->unsignedBigInteger('stylist_id');
            $table->unsignedBigInteger('timesheet_id');
            $table->boolean('is_active');
            $table->boolean('is_block');

            $table->foreign('stylist_id')->references('id')->on('stylelists');
            $table->foreign('timesheet_id')->references('id')->on('timesheet');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stylelist_timesheets');
    }
};
