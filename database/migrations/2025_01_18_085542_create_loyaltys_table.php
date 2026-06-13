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
        Schema::create('loyaltys', function (Blueprint $table) {
            $table->id();
            $table->string('nama_program', 50);
            $table->string('benefit', 255);
            $table->date('expired');
            $table->string('tipe_loyalty', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loyaltys');
    }
};
