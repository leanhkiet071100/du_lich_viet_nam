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
        Schema::table('bai_viet_binh_luan_hinhs', function (Blueprint $table) {
            $table->foreign('bai_viet_binh_luan_id')->references('id')->on('bai_viet_binh_luans');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bai_viet_binh_luan_hinhs', function (Blueprint $table) {
            $table->dropForeign('bai_viet_binh_luan_hinhs_bai_Viet_binh_luan_id_foreign');
        });
    }
};
