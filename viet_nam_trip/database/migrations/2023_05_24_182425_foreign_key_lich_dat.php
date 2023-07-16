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
        // Schema::table('lich_dats', function (Blueprint $table) {
        //     $table->foreign('goi_du_lich_id')->references('id')->on('goi_du_liches');
        //     $table->foreign('nguoi_dung_id')->references('id')->on('nguoi_dungs');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lich_dats', function (Blueprint $table) {
            $table->dropForeign('lich_trinhs_goi_du_lich_id_foreign');
            $table->dropForeign('lich_trinhs_nguoi_dung_id_foreign');
        });
    }
};
