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
        Schema::table('chi_tiet_phieu_dats', function (Blueprint $table) {
            $table->foreign('phieu_dat_id')->references('id')->on('phieu_dats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chi_tiet_phieu_dats', function (Blueprint $table) {
            $table->dropForeign('chi_tiet_phieu_dats_phieu_dat_id_foreign');
        });
    }
};
