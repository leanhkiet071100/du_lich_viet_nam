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
        Schema::table('lich_trinhs', function (Blueprint $table) {
            $table->foreign('goi_du_lich_id')->references('id')->on('goi_du_liches');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lich_trinhs', function (Blueprint $table) {
            $table->dropForeign('lich_trinhs_goi_du_lich_id_foreign');
        });
    }
};
