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
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('abreviatura', 20);
            $table->string('password', 20);
            $table->foreignId('tutor')->constrained('users');
            $table->foreignId('centro_id')->constrained();
            $table->foreignId('ciclo_id')->constrained();
            $table->foreignId('categoria_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
