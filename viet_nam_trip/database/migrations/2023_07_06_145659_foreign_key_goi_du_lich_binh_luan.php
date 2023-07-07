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
         Schema::table('goi_du_lich_binh_luans', function (Blueprint $table) {
            $table->foreign('goi_du_lich_id')->references('id')->on('goi_du_liches');
            $table->foreign('nguoi_dung_id')->references('id')->on('nguoi_dungs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('goi_du_lich_binh_luans', function (Blueprint $table) {
            $table->dropForeign('goi_du_lich_binh_luans_goi_du_lich_id_foreign');
        });
    }
};
