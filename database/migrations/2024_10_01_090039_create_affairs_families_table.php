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
        Schema::create('affairs_families', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->string('description');
            $table->dateTime('date_create');
            $table->dateTime('date_finish');
            $table->integer('user_id_created');
            $table->integer('user_id_working');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affairs_families');
    }
};
