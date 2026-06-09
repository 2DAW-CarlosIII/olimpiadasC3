<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('resultados_olimpiadas_cache', function (Blueprint $table) {
            $table->id();
            $table->string('grado', 2)->nullable();
            $table->string('last_name', 100)->default('');
            $table->string('first_name', 100)->default('');
            $table->decimal('maxpuntuacion', 10, 5)->nullable();
            $table->dateTime('MomentoConsecucion')->nullable();
            $table->bigInteger('penalizaciones')->default(0);
            $table->dateTime('TiempoFinal')->nullable();
            $table->bigInteger('id_prueba')->default(0)->foreign('id_prueba')->references('id')->on('pruebas')->onDelete('cascade');
            $table->string('nombrePrueba',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultados_olimpiadas_cache');
    }
};
