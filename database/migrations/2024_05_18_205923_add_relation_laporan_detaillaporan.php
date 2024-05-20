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
        Schema::table('detail_laporans', function (Blueprint $table) {
            $table->foreign('id_laporan')->references('id')->on('laporans')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_laporans', function (Blueprint $table) {
            $table->dropForeign(['id_laporan', 'id_user']);
        });
    }
};
