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
        Schema::table('bai_viet_binh_luans', function (Blueprint $table) {
            $table->foreign('bai_viet_id')->references('id')->on('dia_diems');
            $table->foreign('nguoi_dung_id')->references('id')->on('nguoi_dungs');
            $table->foreign('binh_luan_id')->references('id')->on('bai_viet_binh_luans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bai_viet_binh_luans', function (Blueprint $table) {
            $table->dropForeign('bai_viet_binh_luans_bai_Viet_id_foreign');
            $table->dropForeign('bai_viet_binh_luans_nguoi_dung_id_foreign');
            $table->dropForeign('bai_viet_binh_luans_binh_luan_id_foreign');
        });
    }
};
