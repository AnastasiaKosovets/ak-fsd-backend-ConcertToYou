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
        Schema::create('concerts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->string('image');
            $table->string('title');
            $table->date('date');
            $table->string('groupName');
            $table->string('description');
            $table->string('programm');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concerts');
    }
};
