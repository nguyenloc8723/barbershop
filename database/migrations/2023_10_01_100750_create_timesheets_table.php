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
            $table->integer('hour');
<<<<<<< HEAD
        $table->integer('minutes');
        $table->boolean('is_active')->default(true);
=======
            $table->integer('minutes');
            $table->boolean('is_active')->default(true);

>>>>>>> ec98a023376472cdb7c089fd242fb55b29feb35d
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
