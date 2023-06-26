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
        Schema::table('bai_viets', function (Blueprint $table) {
            $table->foreign('nguoi_dung_id')->references('id')->on('nguoi_dungs');
            $table->foreign('dia_diem_id')->references('id')->on('dia_diems');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bai_viets', function (Blueprint $table) {
            $table->dropForeign('bai_viets_nguoi_dung_id_foreign');
            $table->dropForeign('bai_viets_dia_diem_id_foreign');
        });
    }
};
