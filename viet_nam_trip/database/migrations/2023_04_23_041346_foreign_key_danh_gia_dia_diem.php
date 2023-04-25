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
        Schema::table('danh_gia_dia_diems', function (Blueprint $table) {
            $table->foreign('dia_diem_id')->references('id')->on('dia_diems');
            $table->foreign('nguoi_dung_id')->references('id')->on('nguoi_dungs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('danh_gia_dia_diems', function (Blueprint $table) {
            $table->dropForeign('danh_gia_dia_diems_dia_diem_id_foreign');
            $table->dropForeign('danh_gia_dia_diems_nguoi_dung_id_foreign');
        });
    }
};
