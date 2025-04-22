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
        Schema::create('centros', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('codcen')->unique();
            $table->string('dencen', 255);
            $table->char('titularidad',1);
            $table->string('domcen')->nullable();
            $table->integer('cpcen');
            $table->string('loccen', 50);
            $table->string('muncen', 50);
            $table->string('telcen', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centros');
    }
};
