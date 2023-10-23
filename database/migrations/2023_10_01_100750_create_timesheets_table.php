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
        Schema::create('timesheets', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:database/migrations/2023_10_01_100750_create_timesheets_table.php
            $table->integer('hour');
        $table->integer('minutes');
        $table->boolean('is_active')->default(true);
=======
            $table->string('hour');
            $table->string('minutes');
            $table->boolean('is_active');
>>>>>>> 5e0b1eb5a1612717e697f128308455cb2f7625f3:database/migrations/2023_09_22_163249_create_timesheets_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timesheets');
    }
};
