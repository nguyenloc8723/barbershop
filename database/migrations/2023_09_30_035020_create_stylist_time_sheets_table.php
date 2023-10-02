<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stylist_time_sheets', function (Blueprint $table) {
            $table->id();
            $table->integer('stylist_id');
            $table->integer('timesheet_id');
            $table->boolean('is_active');
            $table->boolean('is_block');

//            $table->foreign('stylist_id')->references('id')->on('stylists');
//            $table->foreign('timesheet_id')->references('id')->on('timesheet');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stylist_time_sheets');
    }
};
