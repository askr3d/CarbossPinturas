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
        Schema::table('productos_en_orden', function (Blueprint $table) {
            $table->foreignId('fk_orden')->constrained('ordenes')->references('id_orden')->onDelete('cascade');
            $table->foreignId('fk_producto')->constrained('productos')->references('id_producto')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos_en_orden', function (Blueprint $table) {
            $table->dropForeign(['fk_orden']);
            $table->dropColumn('fk_orden');
            $table->dropForeign(['fk_producto']);
            $table->dropColumn('fk_producto');
        });
    }
};
