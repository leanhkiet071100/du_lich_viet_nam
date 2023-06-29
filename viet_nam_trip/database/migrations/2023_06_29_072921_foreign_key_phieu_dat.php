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
        Schema::table('phieu_dats', function (Blueprint $table) {
            $table->foreign('goi_du_lich_id')->references('id')->on('goi_du_liches');
            $table->foreign('nguoi_duyet_id')->references('id')->on('nguoi_dungs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('phieu_dats', function (Blueprint $table) {
            $table->dropForeign('phieu_dats_goi_du_lich_id_foreign');
            $table->dropForeign('phieu_dats_nguoi_duyet_id_foreign');
        });
    }
};
