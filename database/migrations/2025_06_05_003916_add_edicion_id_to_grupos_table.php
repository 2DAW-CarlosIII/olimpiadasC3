<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Edicion;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('grupos', function (Blueprint $table) {
            $table->unsignedBigInteger('edicion_id')->after('categoria_id');
            $table->foreign('edicion_id')->references('id')->on('ediciones')->onDelete('cascade')->onUpdate('cascade');
        });
        $ultimaEdicion = Edicion::latest()->first();
        if($ultimaEdicion) {
            DB::table('grupos')->update(['edicion_id' => $ultimaEdicion->id]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('grupos', function (Blueprint $table) {
            $table->dropForeign('grupos_edicion_id_foreign');
            $table->dropColumn('edicion_id');
        });
    }
};
