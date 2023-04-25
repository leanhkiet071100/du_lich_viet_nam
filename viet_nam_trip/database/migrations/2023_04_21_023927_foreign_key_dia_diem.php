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
        Schema::table('dia_diems', function ($table) {      
            $table->foreign('loai_dia_diem_id')->references('id')->on('loai_dia_diems');
            $table->foreign('tinh_id')->references('id')->on('tinh_huyen_xas');
            $table->foreign('huyen_id')->references('id')->on('tinh_huyen_xas');
            $table->foreign('xa_id')->references('id')->on('tinh_huyen_xas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dia_diems', function (Blueprint $table) {
            $table->dropForeign('dia_diems_loai_dia_diem_id_foreign');
            $table->dropForeign('dia_diems_tinh_foreign');
            $table->dropForeign('dia_diems_huyen_foreign');
            $table->dropForeign('dia_diems_xa_foreign');
        });
    }
};
