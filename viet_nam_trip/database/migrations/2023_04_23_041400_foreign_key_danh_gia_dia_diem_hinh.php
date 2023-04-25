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
        Schema::table('danh_gia_dia_diem_hinhs', function (Blueprint $table) {
            $table->foreign('danh_gia_dia_diem_id')->references('id')->on('danh_gia_dia_diems');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('danh_gia_dia_diem_hinhs', function (Blueprint $table) {
            $table->dropForeign('danh_gia_dia_diem_hinhs_danh_gia_dia_diem_id_foreign');
        });
    }
};
