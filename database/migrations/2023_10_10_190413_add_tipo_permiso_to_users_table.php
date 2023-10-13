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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('fk_permiso')->constrained('permisos')->references('id_permiso')->onDelete('cascade');
            /*$table->foreign('fk_permiso')->references('id_permiso')->on('permisos');*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['permiso_id']);
            $table->dropColumn('permiso_id');
        });
    }
};
